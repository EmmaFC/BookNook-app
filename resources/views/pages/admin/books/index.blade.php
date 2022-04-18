@extends('layouts.admin')
@section('content')
   
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg"> --}}
                <input class="w-full p-4 mb-6" type="text" placeholder="Buscar...">
               <a class="px-4 py-2 rounded-md bg-gray-400" href="{{ route('admin.books.create') }}">Añadir Libro</a>
                <link
                href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
                rel="stylesheet">
                {{-- <div class="flex items-center justify-center min-h-screen bg-gray-900">
                <div class="col-span-12"> --}}
                    {{-- <div class="overflow-auto lg:overflow-visible "> --}}
                        <table class="w-full table text-gray-400 border-separate {{-- space-y-6  --}} text-sm">
                            <thead class="bg-gray-800 text-gray-500">
                                <tr>
                                    <th class="p-3 text-left">Portada</th>
                                    <th class="p-3 text-left">Título</th>
                                    <th class="p-3 text-left">Autor</th>
                                    <th class="p-3 text-left">Año</th>
                                    <th class="p-3 text-left">Género</th>
                                    <th class="p-3 text-left">Descripción</th>
                                    <th class="p-3 text-left">Páginas</th>
                                    <th class="p-3 text-left">Edición</th> 
                                    <th class="p-3 text-left">Categorías</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books as $book)
                                <tr>
                                    <td class="p-3">
                                        <div class="flex align-items-center">
                                            <img class="h-16 w-16  object-cover" src=" {{ $book->cover}}" alt="{{ $book->title}}">
                                        </div>
                                    </td>
                                    <td class="p-3"> {{ $book->title}} </td>
                                    <td class="p-3"> {{ $book->author}} </td>
                                    <td class="p-3"> {{ $book->year}} </td>
                                    <td class="p-3"> {{ $book->genre}} </td>
                                    <td class="p-3"> {{ $book->description}} </td>
                                    <td class="p-3"> {{ $book->pages}} </td>
                                    <td class="p-3"> {{ $book->edition}} </td>
                                    @if ($book->categories)
                                      @foreach ($book->categories as $book_category)
                                        <td class="p-3"> {{ $book_category->name}} </td>
                                      @endforeach
                                    @endif 

                                    <td class="p-3 ">
                                        <a href="{{ route('admin.books.edit', $book->id) }}" class="text-gray-400 hover:text-gray-100  mx-2">
                                            <i class="material-icons-outlined text-base">edit</i>
                                        </a>  
                                        <form class="text-gray-400 hover:text-gray-100  ml-2" method="POST" action="{{ route('admin.books.destroy', $book->id) }}" onsubmit="return confirm('¿Quieres eliminar este libro?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"> <i class="material-icons-round text-base">delete_outline</i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    {{-- </div> --}}
               {{--  </div>
                </div> --}}
                

            {{-- </div> --}}
        </div>
    </div>


@endsection