@extends('layouts.dark-mode')
@section('content')

<div class="py-12 w-full">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <div>
                <div class=" fluid"> 
            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            <div class="container fluid"> 
                <div class="card-box">
                    <div class="card-box">
                        @if (isset($user->image ))
                        <img class="profile-image-m" src="{{ $user->image }}" alt="Card image cap">
                        @else
                        <img class="profile-image-m" src="https://picsum.photos/200/300" alt="Card image cap">
                        @endif
                    </div> 
                
                </div>
                <div class="card-box ">
            <!-- Email Address -->
            <div>
                <x-input id="email" class="block mt-1 w-full" :placeholder="__('Email')" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input id="password" class="block mt-1 w-full" :placeholder="__('Password')" type="password" name="password" required />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input id="password_confirmation" :placeholder="__('Confirm Password')" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />
            </div>
        </div> </div>
    </div>
            
             <div class="container-2 mt-4 flex justify-between align-center">

                <a class="px-4 py-2 text-link-dark" href="{{ URL::previous() }}" >Volver a editar perfil</a>
          
                <x-button class="text-dark px-4 py-2 rounded-md bg-gray-400" >
                    {{ __('Reset Password') }}
                </x-button>
            </div>
            
        </form>
    </div>  
</div>

@endsection