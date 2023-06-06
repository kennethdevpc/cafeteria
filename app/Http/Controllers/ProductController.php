<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data['products'] = Product::all(); //el nombre products lo puedo acceder desde las vistas
        return view('product.index', $data);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('product.create',);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $campos = [
            'name' => 'required|string|max:255|unique:products',
            'reference' => 'required|string|max:255',
            'price' => 'required|integer',
            'weight' => 'required|integer|max:255',
            'category_id' => 'required|integer|max:255',
            'stock' => 'required|integer|max:255',
            'image_path' => 'required',
        ];
        $mensaje = [
            'required' => 'El :attribute es requerido',
            'image_path.required' => 'La foto es requerida',
            'name.required' => 'El nombre es requerido',
            'name.unique' => 'El nombre ya ha sido tomado',
            'reference.required' => 'La Descripcion es requerida',
            'price.required' => 'El precio es requerido',
            'price.integer' => 'El precio debe ser un numero',
            'weight.required' => 'El peso es requerido',
            'category_id.required' => 'La categoria es requerida',
            'stock.required' => 'El stock es requerido',
        ];
        $this->validate($request, $campos, $mensaje);

        $dataProduct = request()->except('_token', 'opcion');
        if ($request->hasFile('image_path')) {
            $nombreArchivoOriginal = $request->file('image_path')->getClientOriginalName();
            $nuevoNombre = Carbon::now()->timestamp . "_" . $nombreArchivoOriginal;
            $carpetaDestino = './uploads/';
            $destino = $request->file('image_path')->move($carpetaDestino, $nuevoNombre);
            $dataProduct['image_path'] = ltrim($carpetaDestino, './') . $nuevoNombre;
            //$dataProduct['image_path'] = $request->file('image_path')->store('/uploads', 'public');
        } else { //guarda imagen desde descargas
            $urlImagen = $request->image_path;
            $nombreArchivo = basename($urlImagen);
            $rutaImagen = ('./images/' . Carbon::now()->timestamp . "_" . $nombreArchivo);
            $imageContent = file_get_contents($urlImagen);
            $path = Storage::disk('public')->put($rutaImagen, $imageContent);
            $rutaImagenEditada = substr($rutaImagen, 2);
            $dataProduct['image_path'] = $rutaImagenEditada;
        }

        $product = new Product();
        $product->fill($dataProduct);
        $product->save();
        return redirect('product')->with('mensaje', '¡producto agregado con exito!');


    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $product = Product::findOrFail($id);
        return view('product.detail', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //

        $product = Product::findOrFail($id);
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $camposx = [
            'name' => 'required|string|max:255|unique:products',
            'reference' => 'required|string|max:255',
            'price' => 'required|integer',
            'weight' => 'required|integer|max:255',
            'category_id' => 'required|integer|max:255',
            'stock' => 'required|integer|max:255',
        ];
        $mensaje = [
            'required' => 'El :attribute es requerido',
            'image_path.required' => 'La foto es requerida',
            'name.required' => 'El nombre es requerido',
            'name.unique' => 'El nombre ya ha sido tomado',
            'reference.required' => 'La Descripcion es requerida',
            'price.required' => 'El precio es requerido',
            'price.integer' => 'El precio debe ser un numero',
            'weight.required' => 'El peso es requerido',
            'weight.integer' => 'El peso debe ser un numero',
            'category_id.required' => 'La categoria es requerida',
            'stock.required' => 'El stock es requerido',
            'stock.integer' => 'El stock debe ser un numero',
        ];
        $this->validate($request, $camposx, $mensaje);
        $dataProduct = request()->except('_token', '_method', 'opcion');

        if ($request->hasFile('image_path')) {
            $product = Product::findOrFail($id);

            //++++
            $rutaArchivo = $product->image_path;
            if (file_exists($rutaArchivo)) {
                unlink($rutaArchivo);// borra ruta de ese archivo
            }
            $nombreArchivoOriginal = $request->file('image_path')->getClientOriginalName();
            $nuevoNombre = Carbon::now()->timestamp . "_" . $nombreArchivoOriginal;
            $carpetaDestino = './uploads/';
            $destino = $request->file('image_path')->move($carpetaDestino, $nuevoNombre);
            $dataProduct['image_path'] = ltrim($carpetaDestino, './') . $nuevoNombre;
            //++++
            //Storage::delete('public/'.$product->image_path);
            //$dataProduct['image_path'] = $request->file('image_path')->store('/uploads', 'public');

        } else {
            //guarda imagen desde descargas
            $url = $request->image_path;
            if (filter_var($url, FILTER_VALIDATE_URL)) {
                $product = Product::findOrFail($id);
                Storage::delete('public/' . $product->image_path);
                $urlImagen = $request->image_path;
                $nombreArchivo = basename($urlImagen);
                $rutaImagen = ('./images/' . Carbon::now()->timestamp . "_" . $nombreArchivo);
                $imageContent = file_get_contents($urlImagen);
                $path = Storage::disk('public')->put($rutaImagen, $imageContent);

                $rutaImagenEditada = substr($rutaImagen, 2);
                $dataProduct['image_path'] = $rutaImagenEditada;

            } else {
                echo "$url no es una URL válida";
            }
        }
        Product::where('id', '=', $id)->update($dataProduct);
        return redirect('product')->with('mensaje', '!se actualizo el product correctamente¡');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $product = Product::findOrFail($id);
        if ($product == null) {
            return $data = ["id" => $id, "error" => "Elemento no existe en database"];
        } else {
            $rutaArchivo = $product->image_path;
            if (file_exists($rutaArchivo)) {
                unlink($rutaArchivo);// borra ruta de ese archivo
            }
            /* $rutaArchivo =('public/') . $product->image_path;
             if (Storage::exists($rutaArchivo)) {
                 Storage::delete('public/'.$product->image_path); // borra el archivo
             }*/
        }

        Product::destroy($id);
        return redirect('product')->with('mensaje', '!se elimino el product correctamente¡');
    }

    /**
     * @param Request $request
     * @param Product $product
     * @return RedirectResponse
     */
    public function updateStock(Request $request, Product $product)
    {
        //
        $productos = $request->all();
        $cartCollection = json_decode($productos['cartcollection'], true);

        foreach ($cartCollection as $item) {

            $producto = Product::find(intval($item['id']));
            if ($producto->stock == 0) {
                return redirect()->route('cart.index')->with('success_msg', 'No es posible ejecutar la venta, Hay un producto con stock insuficiente, revice la cantidad o elimine el producto de su carrito de compras!');

            }

            $productoStockOperation = $producto->stock - $item['quantity'];
            if ($productoStockOperation < 0) {
                return redirect()->route('cart.index')->with('success_msg', 'No es posible ejecutar la venta, Hay un producto con stock insuficiente, revice la cantidad o elimine el producto de su carrito de compras!');

            }

            $producto->stock = $productoStockOperation;
            $producto->sold = $producto->sold + $item['quantity'];
            $producto->save();
        }
        \Cart::clear();
        return redirect()->route('cart.index')->with('success_msg', 'Producto comprado!');
        //falta ejecutar pasarela de pago y validar si se ejecuto el pago correctamente
        //si se ejecuta pago entonces si se procede a bajar el Stock
    }

    public function showPropierties($id)
    {
        //
        $product = Product::findOrFail($id);
        $showPropierties = true;
        return view('product.detail', compact('product', 'showPropierties'));
    }
}
