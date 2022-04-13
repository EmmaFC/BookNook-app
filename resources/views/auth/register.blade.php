@extends('layouts.dark-mode')
@section('content')

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form class="card-box" method="POST" action="{{ route('register') }}" {{-- enctype="multipart/form-data" --}}>
        @csrf
        <div class="container-second">

        <div  class="container-second">
        
            {{-- 
            <div class="card">
                @if (isset($user->image ))
                <img class="profile-image-m" src="{{asset('/storage/images/'.Auth::user()->image)}}" alt="Card image cap">
                @else
                <img class="profile-image-m" src="https://picsum.photos/200/300" alt="Card image cap">
                @endif
            </div> --}}
            
            <input id="image" class="input-dark" type="text" name="image" value="https://picsum.photos/200/300" {{-- placeholder="{{ __('imagen de perfil') }}" --}} @error('image') is-invalid @enderror" required autocomplete="current-image">
            @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <input id="name" type="text" class="input-dark" @error('name') is-invalid @enderror" 
            name="name" 
            placeholder="{{ __('Name') }}"
            value="{{ old('name') }}" required autocomplete="name" autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        
            <input id="description" class="input-dark" type="text" name="description" value="{{ __('description') }}" placeholder="{{ __('description') }}" @error('description') is-invalid @enderror" required autocomplete="current-description">
            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <input id="email" type="email" class="input-dark" @error('email') is-invalid @enderror" 
            placeholder="{{ __('Email Address') }}" name="email" 
            value="{{ old('email') }}" required autocomplete="email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    
            <input id="password" type="password" class="input-dark" @error('password') is-invalid @enderror" 
            placeholder="{{ __('Password') }}" name="password" required autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        
            <input id="password-confirm" type="password" class="input-dark" 
            placeholder="{{ __('Confirm Password') }}" name="password_confirmation" required autocomplete="new-password">
            
            <input id="admin_key" type="password" class="input-dark" name="admin_key" value="null">     

        </div>
            
        <div class="fluid mt-4 mb-4 flex justify-between">
                <div> 
                    <a href="{{ route('login') }}">
                        <h4 class="text-dark">{{ __('¿Ya tienes cuenta?') }}</h4>
                    </a>
                </div>
        </div>
            
        </div>
        <div class="container-second mt-4 mb-4 flex justify-between align-center">
            <a href="{{ route('welcome') }}"><h4 class="text-link-dark">Volver</h4></a>
            <a href="{{ route('home') }}"><button type="submit" class="btn">
                {{ __('Register') }}
            </button></a>
        </div>
    </form>

@endsection

{{-- <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form> --}}