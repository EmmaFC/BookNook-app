@extends('layouts.admin')
@section('content')
   
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg"> --}}
               <a class="px-4 py-2 rounded-md bg-gray-400" href="{{ route('admin.categories.create') }}">Crear Categoría</a>
               <!-- component -->
                <link
                href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
                rel="stylesheet">
                {{-- <div class="flex items-center justify-center min-h-screen bg-gray-900">
                <div class="col-span-12"> --}}
                    {{-- <div class="overflow-auto lg:overflow-visible "> --}}
                        <table class="w-full table text-gray-400 border-separate {{-- space-y-6  --}} text-sm">
                            <thead class="bg-gray-800 text-gray-500">
                                <tr>
                                    <th class="p-3">Categorías</th>
                                   {{--  <th class="p-3 text-left">Autor</th>
                                    <th class="p-3 text-left">Año</th>
                                    <th class="p-3 text-left"></th>
                                    <th class="p-3 text-left">Páginas</th>--}}
                                    <th class="p-3 text-left">Edición</th> 
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                <tr class="bg-gray-800">
                                    <td class="p-3"> {{ $category->name}} </td>
                                    <td class="p-3 ">
                                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="text-gray-400 hover:text-gray-100  mx-2">
                                            <i class="material-icons-outlined text-base">edit</i>
                                        </a>  
                                        <form class="text-gray-400 hover:text-gray-100  ml-2" method="POST" action="{{ route('admin.categories.destroy', $category->id) }}" onsubmit="return confirm('¿Quieres eliminar esta categoría?');">
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
                <style>

            {{-- </div> --}}
        </div>
    </div>


@endsection