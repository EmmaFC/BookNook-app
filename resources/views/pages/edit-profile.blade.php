@extends('layouts.dark-mode')
@section('content')

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <form  action="{{ route('profile.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="container-second">
                    <div class="container-second fluid"> 
                    <div class="card-box">
                        <div class="card-box">
                            @if (isset($user->image ))
                            <img class="profile-image-m" src="{{ $user->image }}" alt="Card image cap">
                            @else
                            <img class="profile-image-m" src="https://picsum.photos/200/300" alt="Card image cap">
                            @endif
                        </div> 
                        
                        <input id="image" class="input-dark mt-6" type="file" name="image" value="https://picsum.photos/200/300" placeholder="{{ __('imagen de perfil') }}" @error('image') is-invalid @enderror" required autocomplete="current-image">
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror 
                    </div>
                    <div class="card-box">
                       <input id="name" type="text" class="input-dark" value="{{ $user->name }}" placeholder="{{ __('nombre') }}" @error('name') is-invalid @enderror 
                        name="name" 
                        placeholder="{{ __('Name') }}"
                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                 
                        <input id="description" class="input-dark" type="textarea" name="description" value="{{ $user->description }}" placeholder="{{ __('descripción') }}" @error('description') is-invalid @enderror required autocomplete="current-description">
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <input id="email" type="email" class="input-dark" @error('email') is-invalid @enderror
                        placeholder="{{ __('email') }}" name="email" 
                        value="{{ $user->email }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                
                    </div>

                </div>
            </div>
            <div class="container-2 mt-4 flex justify-between align-center">
                <a class="px-4 py-2 text-link-dark" href="{{  route('profile', $user->id) }}" >Volver a mi perfil</a>
                <a class="text-link-dark hover:text-white transition duration-200 ease-linear" href="{{ route('password.reset', Auth::user() )}}">Cambiar contraseña</a>
                <button type="submit" class="px-4 py-2 rounded-md bg-gray-400"><h4 class="text-dark">Guardar Cambios</h4></button>
            </div>
            </form>      
            
        </div>
    </div>

@endsection