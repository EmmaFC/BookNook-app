@extends('layouts.admin')
@section('content')

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('admin.permissions.store') }}" method="POST" {{-- enctype="multipart/form-data" --}}>
                @csrf
                <div class="container-second">
                    <div class="container-second">
                        <input id="name" class="input-dark" type="text" name="name" placeholder="{{ __('nombre de permiso') }}" @error('name') is-invalid @enderror" required autocomplete="current-name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="container-second mt-4 mb-4 d-flex justify-content-between align-content-center">
                        <a class="px-4 py-2 rounded-md bg-gray-400" href="{{ route('admin.permissions.index') }}">Volver a Permisos</a>
                        <button type="submit" class="px-4 py-2 rounded-md bg-gray-400"><h4 class="text-link-dark">Guardar</h4></button>
                    </div>
                </div>
            </form>       
        </div>
    </div>


@endsection