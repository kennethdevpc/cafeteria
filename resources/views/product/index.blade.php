@extends('layouts.app')

@section('content')
    <div class="container">

        @if(Session::has('mensaje'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{Session::get('mensaje')}}
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                    <span arial-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <a href="{{url('product/create')}}" class="btn btn-primary float-end"><i class="fa-solid fa-user-plus"></i>
            Crear </a>
        <br>
        <br>

        <table class="table table-striped container shadow-lg p-3 mb-5 bg-body rounded-4">
            <thead class="thead-light">
            <tr>
                <th>#</th>
                {{--                <th>Foto</th>--}}
                <th class="col-"><i class="fa fa-user"></i> name</th>
                <th class="col-"><i class="fa fa-file-waveform"></i> reference</th>
                <th class="col-1"><i class="fa regular fa-at"></i>price</th>
                <th class="col-2"><i class="fa regular fa-at"></i> weight</th>
                <th class="col-2"><i class="fa solid fa-briefcase "></i> category</th>
                <th class="col-2"><i class="fa solid fa-envelope "></i> stock</th>
                <th class="col-1"><i class="fa fa-user "></i> image_path</th>
                <th><i class="fa-solid fa-screwdriver-wrench"></i> Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr class="">
                    <td>{{$product->id}}</td>
                    <td class="col-2 cursor-pointer"><a href="{{url('/product/'.$product->id)}}"
                                                        class="font-weight-bold cursor-pointer"
                                                        style="color: black; text-decoration: none;">{{$product->name}}</a>
                    </td>
                    <td class="col-1">{{$product->reference}} </td>
                    <td class="col-1">{{$product->price}} </td>
                    <td class="col-2">{{$product->weight}} </td>
                    <td class="col-2">{{$product->category_id}} </td>
                    <td class="col-1">{{$product->stock}} </td>
                    <td class="col-4">
                        <div class="h-75">
                            @if(isset($product->image_path))
                                <img class="img-thumbnail img-fluid w-50 "
                                     src="{{asset('storage'.'/'.$product->image_path)}}" alt="Foto del producto">
                            @endif
                        </div>
                    </td>
                    <td>
                        <div class="dropdown">
                            <a href="#" class="nav-link pe-0  dropdown-toggle" role="button" id="dropdownMenuLink"
                               data-bs-toggle="dropdown">
                                <i class="fa-solid fa-ellipsis"></i>
                            </a>
                            <div class="dropdown-menu  dropdown-menu-arrow animated" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item d-flex cursor-pointer"
                                   href="{{url('/product/'.$product->id.'/edit')}}">
                                    <i class="fa solid fa-pencil d-flex align-items mr-10"></i>
                                    <div class="fs-13"> Editar</div>
                                </a>

                                <a class="dropdown-item d-flex cursor-pointer" href="{{url('/product/'.$product->id)}}">
                                    <i class="fa solid fa-info  d-flex align-items mr-10"></i>
                                    <div class="fs-13"> Detalle</div>
                                </a>


                                <form class="dropdown-item d-flex cursor-pointer "
                                      action="{{url('/product/'.$product->id)}}" method="post" class="d-inline">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    {{--<input class="btn btn-danger" type="submit"
                                           onclick="return confirm('¿quieres borrar deveras?')" value="Borrar">--}}
                                    <button type="submit" class="btn  bg-transparent p-0"
                                            onclick="return confirm('¿quieres borrar deveras?')" value="Borrar">
                                        <i class="fa light fa-trash  "></i>
                                        Borrar
                                    </button>
                                </form>

                            </div>
                        </div>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection
