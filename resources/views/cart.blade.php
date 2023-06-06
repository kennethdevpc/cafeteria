@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 10px">
        <nav aria-label="">
            <div class="shadow mb-1 pe-1 py-1 justify-content-between rounded-4">
                <h1 class="  mt-1 bg-body rounded  px-1 ">Elementos a comprar</h1>
                <div>
                    @if(session()->has('success_msg'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session()->get('success_msg') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    @endif
                    @if(session()->has('alert_msg'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            {{ session()->get('alert_msg') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    @endif
                    @if(count($errors) > 0)
                        @foreach($errors0>all() as $error)
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ $error }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </nav>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <br>
                @if(\Cart::getTotalQuantity()>0)
                    <h4>{{ \Cart::getTotalQuantity()}} Producto(s) en el carrito</h4><br>
                @else
                    <h4>No hay productos para comprar</h4><br>
                    <a href="/" class="btn btn-dark">Regresar a la Tienda</a>
                @endif

                @foreach($cartCollection as $item)
                    <div class="row">
                        <div class="col-lg-3">
                            <img src="/images/{{ $item->attributes->image }}" class="img-thumbnail" width="200"
                                 height="200">
                        </div>
                        <div class="col-lg-5">
                            <p>
                                <b><a href="/shop/{{ $item->attributes->slug }}">{{ $item->name }}</a></b><br>
                                <b>Precio: </b>${{ $item->price }}<br>
                                <b>Sub Total: </b>${{ \Cart::get($item->id)->getPriceSum() }}<br>
                            </p>
                        </div>
                        <div class="col-lg-4">
                            <div class="row">
                                <form action="{{ route('cart.update') }}" method="POST" class="align-content-end">
                                    {{ csrf_field() }}
                                    <div class="form-group row">
                                        <input type="hidden" value="{{ $item->id}}" id="id" name="id">
                                        <input type="number" class="form-control form-control-sm w-50"
                                               value="{{ $item->quantity }}"
                                               id="quantity" name="quantity" style="width: 70px; margin-right: 10px;">
                                        <button class="btn btn-secondary btn-sm w-50" style="margin-right: 25px;"><i
                                                class="fa fa-edit"></i>Actualizar cantidad
                                        </button>
                                    </div>
                                </form>

                                <form action="{{ route('cart.remove') }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" value="{{ $item->id }}" id="id" name="id">
                                    <button class="btn btn-dark btn-sm" style="margin-right: 10px;"><i
                                            class="fa fa-trash"></i> Eliminar Producto
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach
                @if(count($cartCollection)>0)
                    <form action="{{ route('cart.clear') }}" method="POST">
                        {{ csrf_field() }}
                        <button class="btn btn-secondary btn-md">Borrar Carrito</button>
                    </form>
                @endif
            </div>
            @if(count($cartCollection)>0)
                <div class="col-lg-2">
                    <div class="card">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><b>Total: </b>${{ \Cart::getTotal() }}</li>
                        </ul>
                    </div>
                    <br>

                    {{--                    <a href="/checkout" class="btn btn-success">Proceder a comprar</a>--}}
                    <div class="mx-3 ">
                        <form action="{{ route('product.updateStock') }}" method="POST" class="">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <input type="hidden" value="{{ $cartCollection}}" id="cartcollection" name="cartcollection">
                                <button class="btn btn-success btn-sm w-100" style="margin-right: 25px;"><i
                                        class="fa fa-edit"></i>Proceder a comprar
                                </button>
                            </div>
                        </form>
                    </div>
                    <hr>
                    <a class="btn btn-dark btn-sm btn-block" href="{{ route('shop') }}">
                        Regresara a la tienda <i class="fa fa-arrow-left"></i>
                    </a>
{{--                    <a href="/" class="btn btn-dark">Regresara a la tienda</a>--}}
                </div>
            @endif
        </div>
        <br><br>
    </div>
@endsection
