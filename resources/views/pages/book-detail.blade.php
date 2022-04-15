
    @extends('layouts.app')
    @section('content')

     
    <div class="w-full">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">     
        <div class="  flex justify-evenly fluid mt-6">

            <div class="cover-overflow-hidden">
              <img class="book-cover-detail" src="{{ $book->cover }}" alt="{{ $book->title }}"/>    
            </div>
            <div class="flex flex-col specify-with">
                <h1 class="title">{{ $book->title }}</h1>
                <h3 class="subtitle">{{ $book->author }}</h3>
                <p class="text">{{ $book->description }}</p>
                <div class="mt-6 book-ranking flex flex-row justify-between align-center">
                  
            
                @if ($stars_number > 0)
                
                    @for ($i = 0; $i < $stars_number; $i++)
                    <a href="/checkranking/{{$book->id}}/{{$i+1}}stars">
                      <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 1024 1024"><path fill="currentColor" d="m908.1 353.1l-253.9-36.9L540.7 86.1c-3.1-6.3-8.2-11.4-14.5-14.5c-15.8-7.8-35-1.3-42.9 14.5L369.8 316.2l-253.9 36.9c-7 1-13.4 4.3-18.3 9.3a32.05 32.05 0 0 0 .6 45.3l183.7 179.1l-43.4 252.9a31.95 31.95 0 0 0 46.4 33.7L512 754l227.1 119.4c6.2 3.3 13.4 4.4 20.3 3.2c17.4-3 29.1-19.5 26.1-36.9l-43.4-252.9l183.7-179.1c5-4.9 8.3-11.3 9.3-18.3c2.7-17.5-9.5-33.7-27-36.3z"/></svg>                  
                    </a> 
                    @endfor
                    @for ($i = 0; $i < 5 - $stars_number; $i++)
                    <a href="/checkranking/{{$book->id}}/{{$i+$stars_number+1}}stars">
                      <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 1024 1024"><path fill="currentColor" d="m908.1 353.1l-253.9-36.9L540.7 86.1c-3.1-6.3-8.2-11.4-14.5-14.5c-15.8-7.8-35-1.3-42.9 14.5L369.8 316.2l-253.9 36.9c-7 1-13.4 4.3-18.3 9.3a32.05 32.05 0 0 0 .6 45.3l183.7 179.1l-43.4 252.9a31.95 31.95 0 0 0 46.4 33.7L512 754l227.1 119.4c6.2 3.3 13.4 4.4 20.3 3.2c17.4-3 29.1-19.5 26.1-36.9l-43.4-252.9l183.7-179.1c5-4.9 8.3-11.3 9.3-18.3c2.7-17.5-9.5-33.7-27-36.3zM664.8 561.6l36.1 210.3L512 672.7L323.1 772l36.1-210.3l-152.8-149L417.6 382L512 190.7L606.4 382l211.2 30.7l-152.8 148.9z"/></svg>
                    </a> 
                    @endfor
                    {{-- {{dd($stars_number);}} --}}
                
               
                @else
                    @for ($i = 0; $i < 5; $i++)
                      <a href="/checkranking/{{$book->id}}/{{$i+1}}stars">
                        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 1024 1024"><path fill="currentColor" d="m908.1 353.1l-253.9-36.9L540.7 86.1c-3.1-6.3-8.2-11.4-14.5-14.5c-15.8-7.8-35-1.3-42.9 14.5L369.8 316.2l-253.9 36.9c-7 1-13.4 4.3-18.3 9.3a32.05 32.05 0 0 0 .6 45.3l183.7 179.1l-43.4 252.9a31.95 31.95 0 0 0 46.4 33.7L512 754l227.1 119.4c6.2 3.3 13.4 4.4 20.3 3.2c17.4-3 29.1-19.5 26.1-36.9l-43.4-252.9l183.7-179.1c5-4.9 8.3-11.3 9.3-18.3c2.7-17.5-9.5-33.7-27-36.3zM664.8 561.6l36.1 210.3L512 672.7L323.1 772l36.1-210.3l-152.8-149L417.6 382L512 190.7L606.4 382l211.2 30.7l-152.8 148.9z"/></svg>
                      </a> 
                      @endfor
                      {{-- {{dd('0 estrellas');}} --}}
                @endif
                         
                </div>  
            </div>
        </div>
        <div class="container-2 mt-2 flex justify-between align-center">
            <a href="{{ route('home') }}"><h4 class="text-link">Volver</h4></a>
            @if ($book->users->contains( Auth::user()->id ))
              @foreach ($book->users as $fav_book)
                  @if ($fav_book->pivot["is_favorite_book"] == 0)
                    <a href="/checkfavorite/{{$book->id}}" name="addfavorite">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                        <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                      </svg>
                    </a> 
                  @else
                    <a href="/checkfavorite/{{$book->id}}" name="addfavorite">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                      </svg>
                    </a> 
                  @endif
              @endforeach
            @else
              <a href="/checkfavorite/{{$book->id}}" name="addfavorite">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                  <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                </svg>
              </a> 
            @endif

        </div>      
      </div>   
    </div>
      
    @endsection


    {{-- 
    <i id="like{{$post->id}}" 
    class="glyphicon glyphicon-heart {{ $post->favoriters()->count() > 0  ? 'like-post' : '' }}"></i>
    
    
    <span class="like-btn">
    <i id="like{{$post->id}}" class="glyphicon glyphicon-heart {{ $post->favoriters()->count() > 0  ? 'like-post' : '' }}"></i>
    </span>
     --}}
     
    

 {{-- <a href="/checkfavorite/{{$book->id}}" name="addfavorite">
                    <i class="fa-solid fa-heart"></i>
                </a> --}}