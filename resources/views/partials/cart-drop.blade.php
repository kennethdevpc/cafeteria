@if(count(\Cart::getContent()) > 0)
    @foreach(\Cart::getContent() as $item)
        <li class="list-group-item">
            <div class="row">

                <div class="h-100 col-lg-3">
                    @if(($item->attributes->image))

                        <img class="img-thumbnail img-fluid mh-100  "
                             style="width: 50px; height: 50px;"
                             src="{{asset('storage'.'/'.$item->attributes->image)}}" alt="image_path product" >
                    @endif
                </div>
                <div class="col-lg-6">
                    <b>{{$item->name}}</b>
                    <br><small>Cantidad: {{$item->quantity}}</small>
                </div>
                <div class="col-lg-3">
                    <p>${{ \Cart::get($item->id)->getPriceSum() }}</p>
                </div>
                <br>
            </div>
            <hr>
        </li>
    @endforeach
    <br>
    <li class="list-group-item">
        <div class="row">
            <div class="col-lg-8">
                <b>Total: </b>${{ \Cart::getTotal() }}
            </div>
            <div class="col-lg-4">
                <form action="{{ route('cart.clear') }}" method="POST">
                    {{ csrf_field() }}
                    <button class="btn btn-secondary btn-sm"><i class="fa fa-trash"></i>Vaciar carrito</button>
                </form>
            </div>
        </div>
    </li>
    <br>
    <div class="row" style="margin: 0px;">
        <a class="btn btn-dark btn-sm btn-block" href="{{ route('shop') }}">
            TIENDA <i class="fa fa-arrow-left"></i>
        </a>

    </div>
@else
    <li class="list-group-item">Tu carrito esta vacío</li>
@endif
