<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-head/>
    <body class="body-dark">
        <div class="flex flex-col min-h-screen">   
            <x-header  />
                <main class="main flex flex-grow justify-center items-center">
                    @yield('content')
                </main>
            <x-footer />
        </div>
    @livewireScripts
</body>