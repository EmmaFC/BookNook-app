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
            <a href="{{ route('home') }}">
                <button type="submit" class="btn text">
                    {{ __('Login') }}
                </button>
            </a>
        </div>
    </form>

@endsection

