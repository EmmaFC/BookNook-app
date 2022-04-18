@extends('layouts.admin')
@section('content')
   
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg"> --}}
                <input class="w-full p-4 mb-6" type="text" placeholder="Buscar...">
               <a class="px-4 py-2 rounded-md bg-gray-400" href="{{ route('admin.users.create') }}">Crear Usuario</a>
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
                                    <th class="p-3">Usuarios</th>
                                    <th class="p-3">Roles asignados</th>
                                   {{--  <th class="p-3 text-left">Autor</th>
                                    <th class="p-3 text-left">Año</th>
                                    <th class="p-3 text-left"></th>
                                    <th class="p-3 text-left">Páginas</th>--}}
                                    <th class="p-3 text-left">Edición</th> 
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr class="bg-gray-800">
                                    {{-- <td class="p-3">
                                        <div class="flex align-items-center">
                                            <img class="h-16 w-16  object-cover" src="https://images.unsplash.com/photo-1613588718956-c2e80305bf61?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=634&q=80" alt="unsplash image">
                                            <div class="ml-3">
                                                <div class="">Appple</div>
                                                <div class="text-gray-500">mail@rgmail.com</div>
                                            </div>
                                        </div>
                                    </td> --}}
                                    <td class="p-3"> {{ $user->name}} </td>

                                    @if ($user->roles)
                                      @foreach ($user->roles as $user_role)
                                        <td class="p-3"> {{ $user_role->name}} </td>
                                      @endforeach
                                    @endif 

                                    <td class="p-3 ">
                                        <a href="{{ route('admin.users.edit', $user->id) }}" class="text-gray-400 hover:text-gray-100  mx-2">
                                            <i class="material-icons-outlined text-base">edit</i>
                                        </a>  
                                        <form class="text-gray-400 hover:text-gray-100  ml-2" method="POST" action="{{ route('admin.users.destroy', $user->id) }}" onsubmit="return confirm('¿Quieres eliminar este usuario?');">
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