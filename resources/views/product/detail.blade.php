@extends('layouts.app')

@section('content')
    <div class="container shadow rounded  p-3 mb-5">
        <form action="{{url('/product/'.$product->id)}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="container shadow-lg p-3 mb-5  rounded-4">

                <div class="container rounded">
                    <div class="shadow  d-flex flex-row align-items-center fw-bold w-50 rounded-bottom">

                        <h6>{{$product->id}}-</h6>  <h1>{{$product->name }} </h1>

                    </div>
                    <br>
                    <div class="form-group d-flex flex-row row">
                        <div class="col-4">


                            <div class="h-75">
                                @if(isset($product->image_path))
                                    <img class="img-thumbnail img-fluid mh-100 " src="{{asset('storage'.'/'.$product->image_path)}}" alt="image_path product" >
                                @endif
                            </div>
                        </div>
                        <div class="col-8">
                            <table class="table   ">
                                <thead class="thead-light">
                                <tr>
                                    <th>Caracateristica</th>
                                    <th>Informarion</th>
                                </tr>
                                </thead>
                                <tbody>

                                <tr class="">
                                    <td>Nombre</td>
                                    <td>{{$product->name}}</td>
                                </tr>
                                <tr class="">
                                    <td>Referencia</td>
                                    <td>{{$product->reference}}</td>
                                </tr>
                                <tr class="">
                                    <td>Precio</td>
                                    <td>{{$product->price}}</td>
                                </tr>
                                <tr class="">
                                    <td>Peso</td>
                                    <td>{{$product->weight}}</td>
                                </tr>
                                <tr class="">
                                    <td>Category_id</td>
                                    <td>{{$product->category_id}}</td>
                                </tr>
                                <tr class="">
                                    <td>Stock</td>
                                    <td>{{$product->stock}}</td>
                                </tr>

                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>


            </div>


        </form>
        @if(isset($showPropierties))
            <a class="btn btn-primary" href="{{ route('cart.index') }}">Regresar</a>
        @else
        <a class="btn btn-primary" href="{{url('product')}}">Regresar</a>
        @endif
            <hr>
    </div>
@endsection
