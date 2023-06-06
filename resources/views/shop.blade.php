@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 1px">
        <div class="row">
            <div class="col-lg-12 bg-success ">
                <h4 class="mb-2 mt-1 p-1">Productos</h4>

            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <hr>
                <div class="row">
                    @foreach($products as $pro)
                        <div class="col-lg-3">
                            <div class="card" style="margin-bottom: 20px; height: auto;">

                                <div class="h-50 mt-2">
                                    @if(isset($pro->image_path))

                                         <img
                                            class="card-img-top mx-auto"
                                            style="height: 120px; width: 120px;display: block;"
                                            src="{{asset($pro->image_path)}}" alt="Foto del producto">
                                        {{--<img
                                            class="card-img-top mx-auto"
                                            style="height: 120px; width: 120px;display: block;"
                                            src="{{asset('/public/storage'.'/'.$pro->image_path)}}"
                                            alt="Foto del producto">--}}
                                    @endif
                                </div>
                                <div class="card-body">
                                    <a href=""><h6 class="card-title">{{ $pro->name }}</h6></a>
                                    <p>${{ $pro->price }}</p>
                                    <p>Stock:{{ $pro->stock }} Unid.</p>
                                    <p>Peso:{{ $pro->weight }}kg</p>
                                    <form action="{{ route('cart.store') }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" value="{{ $pro->id }}" id="id" name="id">
                                        <input type="hidden" value="{{ $pro->name }}" id="name" name="name">
                                        <input type="hidden" value="{{ $pro->price }}" id="price" name="price">
                                        <input type="hidden" value="{{ $pro->image_path }}" id="img" name="img">
                                        <input type="hidden" value="{{ $pro->slug }}" id="slug" name="slug">
                                        <input type="hidden" value="{{ $pro->reference }}" id="reference"
                                               name="reference">
                                        <input type="hidden" value="{{ $pro->weight }}" id="weight" name="weight">
                                        <input type="hidden" value="{{ $pro->category_id }}" id="category_id"
                                               name="category_id">
                                        <input type="hidden" value="{{ $pro->stock }}" id="stock" name="stock">
                                        <input type="hidden" value="1" id="quantity" name="quantity">

                                        <div class="card-footer" style="background-color: white;">
                                            <div class="row">
                                                <button class="btn btn-secondary btn-sm" class="tooltip-test"
                                                        title="add to cart">
                                                    <i class="fa fa-shopping-cart"></i> agregar al carrito
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
