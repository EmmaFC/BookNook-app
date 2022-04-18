<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-head/>
    <div style="background-image: url('{{ $random_book/* ->cover */ }}'); background-repeat:no-repeat; background-size:cover;">
        <body>
            <div class="flex flex-col min-h-screen landing-page-bg">   
                <x-header  />
                <main class="main flex flex-grow justify-center items-center">
                    @yield('content')
                </main>
                <x-footer />
            </div>
            @livewireScripts
        </body>
    </div>
</html>
