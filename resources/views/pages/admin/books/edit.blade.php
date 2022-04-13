@extends('layouts.admin')
@section('content')

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           <form action="{{ route('admin.books.update', $book) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="container-second">
                    <div class="container-second">  

                {{-- <div class="card">
                    @if (isset($book->cover ))
                    <img class="card-img-top" src="{{ $book->cover }}" alt="Card cover cap">
                    @else
                    <img class="card-img-top" src="https://picsum.photos/200/300" alt="Card cover cap">
                    @endif
                </div> --}}
                
                <input id="cover" class="input-dark" type="file" name="cover" value="{{ isset($book->cover)? $book->cover : '' }}" placeholder="{{ __('imagen de portada') }}" @error('cover') is-invalid @enderror" required autocomplete="current-cover">
                @error('cover')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input id="title" class="input-dark" type="text" name="title" value="{{ isset($book->title)? $book->title : ''  }}" placeholder="{{ __('título') }}" @error('title') is-invalid @enderror" required autocomplete="current-title">
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input id="author" class="input-dark" type="text" name="author" value="{{ isset($book->author)? $book->author : ''  }}" placeholder="{{ __('autor/a') }}" @error('author') is-invalid @enderror" required autocomplete="current-author">
                @error('author')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input id="year" class="input-dark" type="text" name="year" value="{{ isset($book->year)? $book->year : ''  }}" placeholder="{{ __('año de publicación') }}" @error('year') is-invalid @enderror" required autocomplete="current-year">
                @error('year')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                
                <input id="genre" class="input-dark" type="text" name="genre" value="{{ isset($book->genre)? $book->genre : ''  }}" placeholder="{{ __('género') }}" @error('genre') is-invalid @enderror" required autocomplete="current-genre">
                @error('genre')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input id="pages" class="input-dark" type="text" name="pages" value="{{ isset($book->pages)? $book->pages : ''  }}" placeholder="{{ __('páginas') }}" @error('pages') is-invalid @enderror" required autocomplete="current-pages">
                @error('pages')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input id="description" class="input-dark" type="text" name="description" value="{{ isset($book->description)? $book->description : ''  }}" placeholder="{{ __('descripción') }}" @error('description') is-invalid @enderror" required autocomplete="current-description">
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input id="collection" class="input-dark" type="text" name="collection" value="{{ isset($book->collection)? $book->collection : ''  }}"  placeholder="{{ __('colección') }}" @error('collection') is-invalid @enderror" required autocomplete="collection" autofocus>
                @error('collection')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            
                <input id="publishing_house" class="input-dark" type="text" name="publishing_house" value="{{ isset($book->publishing_house)? $book->publishing_house : ''  }}" placeholder="{{ __('editorial') }}" @error('publishing_house') is-invalid @enderror" required autocomplete="current-publishing_house">
                @error('publishing_house')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input id="edition" class="input-dark" type="text" name="edition" value="{{ isset($book->edition)? $book->edition : ''  }}" placeholder="{{ __('edition') }}" @error('edición') is-invalid @enderror" required autocomplete="current-edition">
                @error('edition')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
            </form>      
           
            <div>
                @if ($book->categories)
                    @foreach ($book->categories as $book_category)
                    <form  method="POST" action="{{ route('admin.books.categories.detach', [$book->id, $book_category->id]) }}" onsubmit="return confirm('¿Quieres desvincular esta categoría?');">
                        @csrf
                        @method('DELETE')
                        <button class="text-gray-600 px-4 py-2 rounded-md bg-gray-300 hover:text-gray-100" type="submit"> <i class="material-icons-round text-base">{{ $book_category->name }}  x</i> 
                        </button>
                    </form>
                    @endforeach
                @endif
            </div>
            <form action="{{ route('admin.books.categories', $book->id) }}" method="POST">
                @csrf
                @method('POST')
                <div class="container-second">
                    <div class="container-second">
                        <select name="category" id="category" class="input-dark" autocomplete="category-name">
                            @foreach ($categories as $category)
                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="container-second mt-4 mb-4 d-flex justify-content-between align-content-center">
                        <a class="px-4 py-2 rounded-md bg-gray-400" href="{{ route('admin.books.index') }}">Volver a Libros</a>
                        <button type="submit" class="px-4 py-2 rounded-md bg-gray-400"><h4 class="text-link-dark">Asignar categorías a libros</h4></button>
                    </div>
                </div>
            </form>          
        </div>
    </div>

@endsection

{{-- 
    
    
    
    
    class RoutesController extends Controller
{

    public function __construct()
    {
        $this->middleware('isAdmin');
    }


//muestra listado de registros...GET
    public function index()
    {
        $routes = Route::orderBy("id", "desc")->paginate(6);
        return view('routes.index', compact('routes'));  //puedo usar la $routes en la vista index
    }

//muestra formulario para insertar nuevo registro...GET
    public function create()
    {
        return view('routes.create');
    }


    //cualquier cosa que se envie en el formulario se almacena en $request....POST
    public function store(Request $request)
    {
        //dd($request->all());
        // dd($request->["distance"]);
        // return $request->all();

        $route = new Route();
        $route->name = $request->name;
        $route->altitude = $request->altitude;
        $route->distance = $request->distance;
        $route->elevationgain = $request->elevationgain;
        $route->time = $request->time;
        $route->difficulty = $request->difficulty;
        $route->location = $request->location;
        $route->description = $request->description;
        $route->image = $request->image;

        if($request->hasFile('image')){
            $route['image']=$request->File('image')->store('storage','public');
        }

        $route->save();
        return redirect()->route('routes.index', $route);

        // return $routes;    
    }

//recupera datos de un registro en particular....GET
    public function show(Route $route)
    {
        return view('routes.show', compact('route'));
    }


//muestra formulario para modificar un registro...GET
    public function edit(Route $route)
    {  
        return view('routes.edit', compact('route'));
    }

    //modifica un registro ...PUT
    public function update(Request $request, Route $route)
    {
        $route->name = $request->name;
        $route->altitude = $request->altitude;
        $route->distance = $request->distance;
        $route->elevationgain = $request->elevationgain;
        $route->time = $request->time;
        $route->difficulty = $request->difficulty;
        $route->location = $request->location;
        $route->description = $request->description;
        $route->image = $request->image;

        if($request->hasFile('image')){
            $route['image']=$request->File('image')->store('storage','public');
        }
        
        $route->save();
        
        return redirect()->route('routes.index', $route);
    }


//elimina un registro ...DELETE
    public function destroy(Route $route)
    {
        $route->delete();
        return redirect()->route('routes.index');
    }
}



    --}}