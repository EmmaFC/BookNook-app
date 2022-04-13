@extends('layouts.admin')
@section('content')

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('admin.roles.update', $role) }}" method="POST" {{-- enctype="multipart/form-data" --}}>
                @csrf
                @method('PATCH')
                <div class="container-second">
                    <div class="container-second">

                        <input id="name" class="input-dark" type="text" name="name" value="{{ $role->name }}" placeholder="{{ __('nombre de rol') }}" @error('name') is-invalid @enderror" required autocomplete="current-name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        
                    </div>
                    <div class="container-second mt-4 mb-4 d-flex justify-content-between align-content-center">
                        <a class="px-4 py-2 rounded-md bg-gray-400" href="{{ route('admin.roles.index') }}">Volver a Roles</a>
                        <button type="submit" class="px-4 py-2 rounded-md bg-gray-400"><h4 class="text-link-dark">Guardar Cambios</h4></button>
                    </div>
                </div>
            </form>     
            <div>
                @if ($role->permissions)
                    @foreach ($role->permissions as $role_permission)
                    <form  method="POST" action="{{ route('admin.roles.permissions.revoke', [$role->id, $role_permission->id]) }}" onsubmit="return confirm('¿Quieres desasignar este permiso?');">
                        @csrf
                        @method('DELETE')
                        <button class="text-gray-600 px-4 py-2 rounded-md bg-gray-300 hover:text-gray-100" type="submit"> <i class="material-icons-round text-base">{{ $role_permission->name }}  x</i> 
                        </button>
                    </form>
                    @endforeach
                @endif
            </div>
            <form action="{{ route('admin.roles.permissions', $role) }}" method="POST" {{-- enctype="multipart/form-data" --}}>
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
                        <button type="submit" class="px-4 py-2 rounded-md bg-gray-400"><h4 class="text-link-dark">Asignar permisos a rol</h4></button>
                    </div>
                </div>
            </form>       
        </div>
    </div>


@endsection