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
        <a href="{{url('user/create')}}" class="btn btn-primary float-end"><i class="fa-solid fa-user-plus"></i> Crear </a>
        <br>
        <br>

        <table class="table table-striped container shadow-lg p-3 mb-5 bg-body rounded-4 w-75 ">
            <thead class="thead-light">
            <tr>
                <th>#</th>
                {{--                <th>Foto</th>--}}
                <th class="col-2"><i class="fas fa-user "></i> name</th>
                <th class="col-2"><i class="fa-regular fa-at"></i> email</th>
                <th class="col-4"><i class="fa-regular fa-at"></i> roles</th>

                <th><i class="fa-solid fa-screwdriver-wrench"></i> Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr class="" >
                    <td >{{$user->id}}</td>
                    <td class="col-2 cursor-pointer"><a href="{{url('/users/'.$user->id)}}" class="font-weight-bold cursor-pointer" style="color: black; text-decoration: none;">{{$user->name}}</a></td>
                    <td class="col-2">{{$user->email}} </td>
                    <td class="col-4">
                        @foreach ($user->roles as $rol)

                            <label>{{$rol->name}}</label>
                        @endforeach
                    </td>
                    <td>
                        <div class="dropdown">
                            <a href="#" class="nav-link pe-0  dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown">
                                <i class="fa-solid fa-ellipsis"></i>
                            </a>
                            <div class="dropdown-menu  dropdown-menu-arrow animated" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item d-flex cursor-pointer" href="{{url('/users/'.$user->id.'/edit')}}">
                                    <i class="fa-solid fa-pencil d-flex align-items mr-10"></i>
                                    <div class="fs-13"> Editarx</div>
                                </a>

                                <a class="dropdown-item d-flex cursor-pointer" href="{{url('/users/'.$user->id)}}">
                                    <i class="fa-solid fa-circle-info d-flex align-items mr-10"></i>
                                    <div class="fs-13"> Detalle</div>
                                </a>



                                <form class="dropdown-item d-flex cursor-pointer " action="{{url('/users/'.$user->id)}}" method="post" class="d-inline">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    {{--<input class="btn btn-danger" type="submit"
                                           onclick="return confirm('¿quieres borrar deveras?')" value="Borrar">--}}
                                    <button type="submit" class="btn  bg-transparent p-0" onclick="return confirm('¿quieres borrar deveras?')" value="Borrar" >
                                        <i class="fa-solid fa-trash-can"></i> Borrar
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
