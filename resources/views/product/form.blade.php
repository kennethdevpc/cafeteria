<div class="container shadow-lg p-1 mb-2 bg-body rounded">

    <div class="container shadow p-2 mb-3 bg-body rounded">
        <div class="shadow mb-5 pe-3 py-3 d-flex justify-content-between rounded-4">

            <h1 class="  mt-1 bg-body rounded  px-3 ">{{$modo}} Producto</h1>
            @if(isset($product->image_path))
               {{-- <img class="img-thumbnail img-fluid  vh-25 " src="{{asset('storage'.'/'.$product->Foto)}}"
                     alt="Sin Foto de product!"
                     width="100px">--}}
                <img
                    class="img-thumbnail img-fluid  vh-25 "
                    style="height: 100px; width: 120px;display: block;"
                    src="{{asset($product->image_path)}}"
                    width="75px"
                    alt="Sin Foto de product!">

            @endif
        </div>

        @if(count($errors)>0)
            <h1>Error en el formulario</h1>
            <div class="alert alert-danger " role="alert">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>
                            {{$error}}
                        </li>
                    @endforeach
                </ul>
            </div>

        @endif

        <div class=" form-group d-flex flex-row col-lg-6">
            <h4 class="col-lg-2 px-1 text-lg-end " for="image_path">Foto:</h4>
            <input class="form-control bg-success border-dark text-dark" type="file" name="image_path" id="image_path" title="seleccionar archivo"
                   value="{{isset($product->image_path)?$product->image_path:old('image_path')}}" >
            {{--<input class="form-control" type="text" name="image_path" id="image_path"
                   value="{{isset($product->image_path)?$product->image_path:old('image_path')}}">--}}
        </div>
        <br>


        <br>
        <div class=" form-group d-flex flex-row px-3">
            <div class="form-group d-flex flex-row col-4">
                <label class="px-2" for="name">Nombre </label>
                <input class="form-control" type="text" name="name" id="name"
                       value="{{isset($product->name)?$product->name:old('name')}}">
            </div>
            <div class="form-group d-flex flex-row col-4">
                <label class="px-2 " for="reference">Referencia</label>
                <input class="form-control" type="text" name="reference" id="reference"
                       value="{{isset($product->reference)?$product->reference:old('reference')}}">
            </div>
            <div class="form-group d-flex flex-row col-4">
                <label class=" px-2" for="name">$Precio</label>
                <input class="form-control" type="text" name="price" id="price"
                       value="{{isset($product->price)?$product->price:old('price')}}">
            </div>

        </div>

        <div class=" form-group d-flex flex-row px-3">
            <div class="form-group d-flex flex-row  col-4">
                <label class="px-2" for="weight">Peso</label>
                <input class="form-control" type="text" name="weight" id="weight"
                       value="{{isset($product->weight)?$product->weight:old('weight')}}">
            </div>
            <div class="form-group d-flex flex-row col-4">
                <label class="px-2" for="category_id">CategoriaId</label>
                <input class="form-control" type="text" name="category_id" id="category_id"
                       value="{{isset($product->category_id)?$product->category_id:old('category_id')}}">
            </div>
            <div class="form-group d-flex flex-row col-4">
                <label class="px-2" for="stock">Stock</label>
                <input class="form-control" type="text" name="stock" id="stock"
                       value="{{isset($product->stock)?$product->stock:old('stock')}}">
            </div>

        </div>

        <div class=" form-group d-flex flex-row px-3">
            <div class="form-group d-flex flex-row col-4">
                <label class="px-2" for="shipping_cost">$Envío </label>
                <input class="form-control" type="text" name="shipping_cost" id="shipping_cost"
                       value="{{isset($product->shipping_cost)?$product->shipping_cost:old('shipping_cost')}}">
            </div>
            <div class="form-group d-flex flex-row col-4">
                <label class="px-2" for="slug">slug</label>
                <input class="form-control" type="text" name="slug" id="slug"
                       value="{{isset($product->slug)?$product->slug:old('slug')}}">
            </div>
            <div class="form-group d-flex flex-row col-4">
                <label class="px-2" for="details">details</label>
                <input class="form-control" type="text" name="details" id="details"
                       value="{{isset($product->details)?$product->details:old('details')}}">
            </div>
        </div>

        <div class=" form-group d-flex flex-row px-3">

            <div class="form-group d-flex flex-row col-6">
                <label class="px-2" for="description">description</label>
                <input class="form-control" type="text" name="description" id="description"
                       value="{{isset($product->description)?$product->description:old('description')}}">
            </div>
            <div class="form-group d-flex flex-row col-6">
                <label class="px-2" for="brand_id">brand_id</label>
                <input class="form-control" type="text" name="brand_id" id="brand_id"
                       value="{{isset($product->brand_id)?$product->brand_id:old('brand_id')}}">
            </div>
        </div>


        <br>


        <br>

        <div class="d-flex flex-row justify-content-between">
            <a class="btn btn-primary" href="{{url('product')}}"><i class="fas fa-arrow-left"></i> Regresar</a>
            <button type="submit" class="btn btn-success">
                <i class="fas fa-pencil-alt"></i> {{$modo}} datos
            </button>
        </div>
    </div>

</div>
