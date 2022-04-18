@extends('layouts.admin')
@section('content')
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           <form action="{{ route('admin.admins.update', $admin) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="container-second">
                    <div class="container-second">  

                        {{--      {{-- <div class="card">
                            @if (isset($admin->image ))
                            <img class="profile-image-m" src="{{asset('/storage/images/'.Auth::admin()->image)}}" alt="Card image cap">
                            @else
                            <img class="profile-image-m" src="https://picsum.photos/200/300" alt="Card image cap">
                            @endif
                        </div>  --}}
                        
                        {{-- <input id="image" class="input-dark" type="text" name="image" value="https://picsum.photos/200/300" placeholder="{{ __('imagen de perfil') }}" @error('image') is-invalid @enderror" required autocomplete="current-image">
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror --}}

                       <input id="name" type="text" class="input-dark" value="{{ $admin->name }}" placeholder="{{ __('nombre') }}" @error('name') is-invalid @enderror 
                        name="name" 
                        placeholder="{{ __('Name') }}"
                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                 
                        <input id="description" class="input-dark" type="textarea" name="description" value="{{ $admin->description }}" placeholder="{{ __('descripción') }}" @error('description') is-invalid @enderror required autocomplete="current-description">
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <input id="email" type="email" class="input-dark" @error('email') is-invalid @enderror
                        placeholder="{{ __('email') }}" name="email" 
                        value="{{ $admin->email }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                
                        <input id="password" type="password" class="input-dark" @error('password') is-invalid @enderror
                        placeholder="{{ __('contraseña') }}" name="password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    
                        <input id="password-confirm" type="password" class="input-dark"
                        placeholder="{{ __('confirmar contraseña') }}" name="password_confirmation">
                        
                    </div>
                    <div class="container-second mt-4 mb-4 d-flex justify-content-between align-content-center">
                        <a class="px-4 py-2 rounded-md bg-gray-400" href="{{ route('admin.admins.index') }}">Volver a Usuarios</a>
                        <button type="submit" class="px-4 py-2 rounded-md bg-gray-400"><h4 class="text-link-dark">Guardar Cambios</h4></button>
                    </div>
                </div>
            </form>       
            <div>
                @if ($admin->roles)
                    @foreach ($admin->roles as $admin_role)
                    <form  method="POST" action="{{ route('admin.admins.roles.remove', [$admin->id, $admin_role->id]) }}" onsubmit="return confirm('¿Quieres desasignar este rol?');">
                        @csrf
                        @method('DELETE')
                        <button class="text-gray-600 px-4 py-2 rounded-md bg-gray-300 hover:text-gray-100" type="submit"> <i class="material-icons-round text-base">{{ $admin_role->name }}  x</i> 
                        </button>
                    </form>
                    @endforeach
                @endif
            </div>
            <form action="{{ route('admin.admins.roles', $admin->id) }}" method="POST">
                @csrf
                @method('POST')
                <div class="container-second">
                    <div class="container-second">
                        <select name="role" id="role" class="input-dark" autocomplete="role-name">
                            @foreach ($roles as $role)
                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="container-second mt-4 mb-4 d-flex justify-content-between align-content-center">
                        <button type="submit" class="px-4 py-2 rounded-md bg-gray-400"><h4 class="text-link-dark">Asignar roles a admins</h4></button>
                    </div>
                </div>
            </form>  
            <div>
                @if ($admin->permissions)
                    @foreach ($admin->permissions as $admin_permission)
                    <form  method="POST" action="{{ route('admin.admins.permissions.revoke', [$admin->id, $admin_permission->id]) }}" onsubmit="return confirm('¿Quieres desasignar este permiso?');">
                        @csrf
                        @method('DELETE')
                        <button class="text-gray-600 px-4 py-2 rounded-md bg-gray-300 hover:text-gray-100" type="submit"> <i class="material-icons-round text-base">{{ $admin_permission->name }}  x</i> 
                        </button>
                    </form>
                    @endforeach
                @endif
            </div>
            <form action="{{ route('admin.admins.permissions', $admin->id) }}" method="POST">
                @csrf
                @method('POST')
                <div class="container-second">
                    <div class="container-second">
                        <select name="permission" id="permission" class="input-dark" autocomplete="permission-name">
                            @foreach ($permissions as $permission)
                            <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="container-second mt-4 mb-4 d-flex justify-content-between align-content-center">
                        <button type="submit" class="px-4 py-2 rounded-md bg-gray-400"><h4 class="text-link-dark">Asignar permisos a admins</h4></button>
                    </div>
                </div>
            </form>          
        </div>
    </div>



@endsection