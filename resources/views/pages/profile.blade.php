  @extends('layouts.app')
  @section('content')

          <div>         
              <div class="flex justify-start"><h1 class="section-title">{{ __('Tu perfil') }}</h1></div>
                <div id="user_section" class="flex justify-evenly fluid mb-6"> 
 
                        {{--  @if(Auth::user()->image)
                        <img class="profile-image-m" src="{{asset('/storage/images/'.Auth::user()->image)}}">
                        @endif --}}
                        <img class="profile-image-m" src="{{ Auth::user()->image }}" />
             
                    <div class="text-less-width self-center flex flex-row ml-14"> 
                        <div class=" flex flex-col ">
                            <div class="title mb-4">{{ Auth::user()->name }}</div>
                            <button class="px-6 py-2 rounded-md flex flex-row bg-gray-400 hover:text-gray-100" type="submit"> 
                                <a class="text-button-dark  hover:text-white transition duration-200 ease-linear" href="{{ route('profile.users.edit', Auth::user()->id )}}">Editar perfil</a>
                            </button>
                        </div>
                        <div class="ml-14 mt-6">
                            <div class="text">{{ Auth::user()->description }}</div>
                        </div>
                    </div>
                </div>

              <div id="fav_user_books_section">
                  <div class="flex flex-col">
                      @if (Auth::user()->hasRole('user'))
                        <div class="container-2 flex justify-start">
                            <h1 class="title">{{ __('Tus favoritos') }}</h1>
                        </div>
                    
                        <div class="container-fluid container-2 col-12 flex flex-wrap">
                            @foreach ($fav_books as $fav_book) 
                                @if ($fav_book->users->contains( Auth::user()->id ))
                                    @foreach ($fav_book->users as $these_book) 
                                        @if ($these_book->pivot["is_favorite_book"] == 1)
                                            <x-card-book  
                                            :book='$fav_book'
                                            :cover='$fav_book->cover'
                                            :id='$fav_book->id'
                                            />
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach

                        @endif
                        </div>
                    </div>
                </div>
            </div>
        
  @endsection
