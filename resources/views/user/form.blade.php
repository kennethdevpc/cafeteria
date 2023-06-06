<div class="container shadow-lg p-1 mb-2 bg-body rounded">

    <div class="container shadow p-2 mb-3 bg-body rounded">
        <div class="shadow mb-5 pe-3 py-3 d-flex justify-content-between rounded-4">

            <h1 class="  mt-1 bg-body rounded  px-3 ">{{$modo}} usuario</h1>
            <div class="  mt-0 bg-body rounded  px-0 ">
                @if(Session('success-update'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        {{Session::get('success-update')}}
                        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                            <span arial-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>

        </div>
{{--        @if(Session::has('mensaje'))--}}
{{--        @if(Session::has('success-update'))--}}



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



        <div class="form-group d-flex flex-row">
            <label class="col-lg-2 px-3 text-lg-end " for="id">id</label>
            <input class="form-control" type="text" name="id" id="id"
                   value="{{isset($user->id)?$user->id:old('nombre')}}">
        </div>
        <div class="form-group d-flex flex-row">
            <label class="col-lg-2 px-3 text-lg-end " for="name">Nombre completo</label>
            <input class="form-control" type="text" name="name" id="name"
                   value="{{isset($user->name)?$user->name:old('nombre')}}">
        </div>
        <br>

        <div class="form-group d-flex flex-row">
            <label class="col-lg-2 px-3 text-lg-end" for="email">Correo electrónico</label>
            <input class="form-control " type="text" name="email" id="email"
                   value="{{isset($user->email)?$user->email:old('email')}}">
        </div>
        <br>


        <br>
        <div class="form-group d-flex flex-row">
            <label class="col-lg-2 px-3 text-lg-end" for="role">Roles</label>
            <div class="form-check d-flex flex-wrap justify-content-between">

                @foreach ($roles as $rol)
                    @if (!empty($rol))
                        <div class="form-check col-lg-4 ">
                            {{-- <input class="form-check-input" name="role[]" type="checkbox" value="{{$rol->id}}"   >--}}
                            @if(!isset($user->roles))
                                <input class="form-check-input" type="checkbox" name="role[]"
                                       value="{{ $rol->id}}" {{ in_array($rol->id, old('role', [])) ? 'checked' : '' }}>
                            @endif
                            @if(isset($user->roles))

                                <input class="form-check-input" type="checkbox" name="role[]"
                                       value="{{ $rol->id}}" {{ in_array($rol->id, $user->roles->pluck('id')->toArray())  ? 'checked' : '' }}>
                            @endif
                            {{--<input class="form-check-input" type="checkbox" name="role[]"
                                   value="{{ $rol->id}}" {{ $user->roles->contains($rol->id)  ? 'checked' : '' }}>
--}}

                            <label class="form-check-label" for="flexCheckDefault">
                                {{$rol->name}}
                            </label>
                            <label class="form-check-label" for="flexCheckDefault">
                                {{$rol->id}}
                            </label>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>


        <hr>

        <div class="d-flex flex-row justify-content-between">
            <a class="btn btn-primary" href="{{url('users')}}"><i class="fas fa-arrow-left"></i> Regresar</a>
            <button type="submit" class="btn btn-success">
                <i class="fas fa-pencil-alt"></i> {{$modo}} datos
            </button>
        </div>
    </div>

</div>
