@extends('layouts.admin')
@section('content')

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('admin.users.store') }}" method="POST" {{-- enctype="multipart/form-data" --}}>
                @csrf
                <div class="container-second">
                    <div class="container-second">
                       {{--  <div class="card">
                            @if (isset($user->image ))
                            <img class="profile-image-m" src="{{asset('/storage/images/'.Auth::user()->image)}}" alt="Card image cap">
                            @else
                            <img class="profile-image-m" src="https://picsum.photos/200/300" alt="Card image cap">
                            @endif
                        </div> 
                        
                        <input id="image" class="input-dark" type="text" name="image" value="https://picsum.photos/200/300" placeholder="{{ __('imagen de perfil') }}" @error('image') is-invalid @enderror" required autocomplete="current-image">
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror --}}

                        <input id="name" type="text" class="input-dark" placeholder="{{ __('nombre') }}" @error('name') is-invalid @enderror 
                        name="name" placeholder="{{ __('Name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                 
                        <input id="description" class="input-dark" type="text" name="description" placeholder="{{ __('descripción') }}" @error('description') is-invalid @enderror required autocomplete="current-description">
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <input id="email" type="email" class="input-dark" @error('email') is-invalid @enderror 
                        placeholder="{{ __('email') }}" name="email" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                
                        <input id="password" type="password" class="input-dark" @error('password') is-invalid @enderror
                        placeholder="{{ __('contraseña') }}" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    
                        <input id="password-confirm" type="password" class="input-dark" 
                        placeholder="{{ __('confirmar contraseña') }}" name="password_confirmation" required autocomplete="new-password">
                        

                    </div>
                    <div class="container-second mt-4 mb-4 d-flex justify-content-between align-content-center">
                        <a class="px-4 py-2 rounded-md bg-gray-400" href="{{ route('admin.roles.index') }}">Volver a Usuarios</a>
                        <button type="submit" class="px-4 py-2 rounded-md bg-gray-400"><h4 class="text-link-dark">Guardar</h4></button>
                    </div>
                </div>
            </form>       
        </div>
    </div>



@endsection