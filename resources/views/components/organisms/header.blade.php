<header x-data="{ open: true }" class="w-full px-12 py-6 flex flex-row text-gray-700 dark-mode:text-gray-200 dark-mode:bg-gray-800">

    @guest
    <a class="content-center self-center"  href="/">
        <h1 class="nav-title">Book Nook</h1>
    </a>
    @endguest
    @auth
    <a class="content-center self-center"  href="{{ route('home')}}">
        <h1 class="nav-title">Book Nook</h1>
    </a>
    @endauth

        {{--  <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
            <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
            <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
            <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
        </button> --}}

        {{-- <nav class="flex flex-row justify-end"> --}}
    <nav :class="{'flex': !open, 'hidden': !open}" class="flex-col flex-grow hidden md:flex md:justify-end md:flex-row">
        @guest
            @if (Route::has('login') || Route::has('register'))
            <a class="px-4 nav-text-dark focus:outline-none focus:shadow-outline" href="{{ route('admin-login') }}">
                <p class="nav-text-dark">{{ __('admin acces') }}</p>
            </a>
            <a class="px-4 nav-text-dark focus:outline-none focus:shadow-outline" href="{{ route('login') }}">
                <p class="nav-text-dark">{{ __('Login') }}</p>
            </a>
            <a class="px-4 nav-text-dark focus:outline-none focus:shadow-outline" href="{{ route('register') }}">
                <p class="nav-text-dark">{{ __('Register') }}</p>
            </a>          
            @endif
        @endguest
        @auth
            <a class="nav-text-dark self-center hover:text-gray-900 focus:text-gray-900  focus:outline-none focus:shadow-outline"  href="{{ route('home') }}">
            @if (Auth::user()->hasRole('user'))
                {{ __('Inicio') }}         
            @else
                {{ __('Panel de control') }}
            @endif
            </a>
            <div @click.away="open = false" class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="flex flex-row content-center justify-between align- focus:outline-none focus:shadow-outline">   
                    <p class="nav-text-dark px-8 self-center">{{ $profile_name }}</p>
                    <img class="profile-image-s" src="{{ $profile_image }}" alt="{{ $profile_name }}">  
                    {{-- <div class="px-8">            
                        <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </div>  --}}
                </button>

                <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 md:max-w-screen-sm mt-2 origin-top-right">
                    <div class="bg-white rounded-md shadow-lg dark-mode:bg-gray-700 w-40">
                        <div class="grid grid-cols-1">
                        
                        <a class="flex flex-row items-start rounded-lg bg-transparent p-4 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/profile/{{ $id }}" onclick="event.preventDefault(); 
                        document.getElementById('profile-form').submit();">
                        {{ __('Mi Perfil') }}
                        </a>
                        <form id="profile-form" action="/profile/{{ $id }}" method="GET" class="d-none">
                            @csrf
                        </form>

                        <a class="flex flex-row items-start rounded-lg bg-transparent p-4 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                        </div>
                    </div>
                </div>
            </div>  
        @endauth  
    </nav>
    

</header>