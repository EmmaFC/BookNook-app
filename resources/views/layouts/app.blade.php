<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <x-head/>

    <body>
        <div class="flex flex-col min-h-screen">   
            <x-header  />
            <main class="main flex-grow justify-center items-center">
                @yield('content')
            </main>
            <x-footer />
        </div>
        @livewireScripts
    </body>

</html>

{{-- 
    $routes = Route::orderBy("id", "desc")->paginate(6);
        // $routes = Route::all();

        //la variable $routes va al rutas.blade y tiene todas las rutas
        return view('rutas', ['routes'=>$routes]);
 --}}
