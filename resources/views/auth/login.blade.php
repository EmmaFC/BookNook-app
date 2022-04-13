@extends('layouts.dark-mode')
@section('content')

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
   
    <form class="card-box" method="POST" action="{{ route('login') }}">
                            
        <div class="container-second">
            @csrf

            <div class="container-second">
                <input id="email" type="email" class="input-dark" @error('email') is-invalid @enderror" name="email" 
                placeholder="{{ __('Email Address') }}"
                value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        
                <input id="password" type="password" class="input-dark" @error('password') is-invalid @enderror" name="password" 
                placeholder="{{ __('Password') }}"
                required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="fluid mt-4 mb-4 flex justify-between">
                <div class="flex flex-row align-center"> 
                    <input class="mr-2 form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember">
                        <h4 class="text-dark">{{ __('Remember Me') }}</h4>
                    </label>
                </div> 
                    @if (Route::has('password.request'))
                    <div> 
                        <a href="{{ route('password.request') }}">
                            <h4 class="text-dark">{{ __('Forgot Your Password?') }}</h4>
                        </a>
                    </div>
                    @endif
            </div>
        </div>
        
        <div class="container-second mt-4 mb-4 flex justify-between align-center">
            <a href="{{ route('welcome') }}"><h4 class="text-link-dark">Volver</h4></a>
            <a href="{{ route('register') }}"><h4 class="text-link-dark">Registro</h4></a>
            <a href="{{ route('home') }}"><button type="submit" class="btn">
                {{ __('Login') }}
            </button></a>

        </div>
    </form>

@endsection

{{-- <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="input-dark" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
  --}}
