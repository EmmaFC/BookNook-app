  
    @extends('layouts.app')
    @section('content')

        <div class="container-fluid col-12 d-flex flex-wrap">
            <input class="w-full p-4 mb-6" type="text" placeholder="Buscar...">

            @foreach ($books as $book) 
            <x-card-book  
            :book='$book'
            :cover='$book->cover'
            :id='$book->id'
            />        
            @endforeach
                   
        </div>
        
    @endsection
