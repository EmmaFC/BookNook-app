<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index ()
    {
        $categories = Category::all();
        return view('pages.admin.categories.index', compact('categories'));
    }

    
    public function create ()
    {
        return view('pages.admin.categories.create');
    }


    public function store (Request $request)
    {
        $validated = $request->validate(['name' => ['required', 'min:3']]);
        // $validated['guard_name'] = $request->name; 
        Category::create($validated);
        return redirect()->route('pages.admin.categories.index');
    }


    public function edit (Category $category)
    {
        $books = Book::all();
        return view('pages.admin.categories.edit', compact('category', 'books'));
    }


    public function update (Request $request, Category $category)
    {
        $validated = $request->validate(['name' => ['required', 'min:3']]);
        $category->update($validated);
        return redirect()->route('pages.admin.categories.index');
    }


    public function destroy (Category $category)
    {
        $category->delete();
        return redirect()->back();
    }

    
   /*  public function givePermission (Request $request, Category $category)
    {
        if ($category->hasPermissionTo($request->permission)){
            return redirect()->back();
        }
        $category->givePermissionTo($request->permission);
        return redirect()->back();
    }

    public function revokePermission (Category $category, Book $book)
    {
        if ($category->hasPermissionTo($permission)){
            $category->revokePermissionTo($permission);
            return redirect()->back();
        }
        return redirect()->back();
    } */
    
}
