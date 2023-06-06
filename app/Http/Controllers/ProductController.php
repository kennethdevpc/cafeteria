<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
        $productos = $request->all();
        $cartCollection = json_decode($productos['cartcollection'], true);

        foreach ($cartCollection as $item) {
            $producto = Product::find(intval($item['id']));
            $productoStockOperation = $producto->stock-$item['quantity'];
            $producto->stock=$productoStockOperation;
            $producto->save();
            \Cart::clear();
            return redirect()->route('cart.index')->with('success_msg', 'Producto comprado!');
            //falta ejecutar pasarela de pago y validar si se ejecuto el pago correctamente
            //si se ejecuta pago entonces si se procede a bajar el Stock

        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
