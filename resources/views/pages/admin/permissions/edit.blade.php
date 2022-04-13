@extends('layouts.admin')
@section('content')

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('admin.permissions.update', $permission) }}" method="POST" {{-- enctype="multipart/form-data" --}}>
                @csrf
                @method('PATCH')
                <div class="container-second">
                    <div class="container-second">
                        <input id="name" class="input-dark" type="text" name="name" value="{{ $permission->name }}" placeholder="{{ __('nombre de permiso') }}" @error('name') is-invalid @enderror" required autocomplete="current-name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="container-second mt-4 mb-4 d-flex justify-content-between align-content-center">
                        <a class="px-4 py-2 rounded-md bg-gray-400" href="{{ route('admin.permissions.index') }}">Volver a Permisos</a>
                        <button type="submit" class="px-4 py-2 rounded-md bg-gray-400"><h4 class="text-link-dark">Guardar Cambios</h4></button>
                    </div>
                </div>
            </form>  
            <div>
                @if ($permission->roles)
                    @foreach ($permission->roles as $permission_role)
                    <form  method="POST" action="{{ route('admin.permissions.roles.remove', [$permission->id, $permission_role->id]) }}" onsubmit="return confirm('¿Quieres desvincular este rol?');">
                        @csrf
                        @method('DELETE')
                        <button class="text-gray-600 px-4 py-2 rounded-md bg-gray-300 hover:text-gray-100" type="submit"> <i class="material-icons-round text-base">{{ $permission_role->name }}  x</i> 
                        </button>
                    </form>
                    @endforeach
                @endif
            </div>
            <form action="{{ route('admin.permissions.roles', $permission) }}" method="POST" {{-- enctype="multipart/form-data" --}}>
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
                        <button type="submit" class="px-4 py-2 rounded-md bg-gray-400"><h4 class="text-link-dark">Asignar roles a permiso</h4></button>
                    </div>
                </div>
            </form>      
        </div>
    </div>


@endsection