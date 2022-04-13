<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function index ()
    {
        $all_users = User::all();
        $users = array();
        foreach ($all_users as $user) {
            if ($user->hasRole('user')) {
                array_push($users, $user);
            }
        }
        return view('pages.admin.users.index', compact('users'));
    }


    public function create ()
    {
        return view('pages.admin.users.create');
    }


    public function store (Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'min:3'],
            // 'image' => ['required', 'min:3'],
            'description' => ['required', 'min:3'],
            'email' => ['required', 'min:3'],
            'password' => ['required', 'min:8'],
        ]);
        
        User::create($validated);
        return redirect()->route('pages.admin.users.index');
    }

    public function edit (User $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('pages.admin.users.edit', compact('user', 'roles', 'permissions'));
    }

    public function profile_edit (User $user)
    {
        return view('pages.edit-profile', compact('user'));
    }

    public function profile_update (Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => ['required', 'min:3'],
            // 'image' => ['required', 'min:3'],
            'description' => ['required', 'min:3'],
            'email' => ['required', 'min:3'],
        ]);
        $user->update($validated);
        return $this->show($user->id);
    }

    public function password_edit (User $user)
    {
        return view('pages.edit-password', compact('user'));
    }

    public function password_update (Request $request, User $user)
    {
        $validated = $request->validate(['password' => ['required', 'min:8']]);
        $user->update($validated);
        return $this->show($user->id);
    }

    public function update (Request $request, User $user)
    {
        $validated = $request->validate(['name' => ['required', 'min:3']]);
        $user->update($validated);
        return redirect()->route('pages.admin.users.index');
    }


    public function destroy (User $user)
    {
        $user->delete();
        return redirect()->back();
    }

    public function assignRole (Request $request, User $user)
    {
        if ($user->hasRole($request->role)){
            return redirect()->back();
        }
        $user->assignRole($request->role);
        return redirect()->back();
    }

    public function removeRole (User $user, Role $role)
    {
        if ($user->hasRole($role)){
            $user->removeRole($role);
            return redirect()->back();
        }
        return redirect()->back();
    }

    public function givePermission (Request $request, User $user)
    {
        if ($user->hasPermissionTo($request->permission)){
            return redirect()->back();
        }
        $user->givePermissionTo($request->permission);
        return redirect()->back();
    }

    public function revokePermission (User $user, Permission $permission)
    {
        if ($user->hasPermissionTo($permission)){
            $user->revokePermissionTo($permission);
            return redirect()->back();
        }
        return redirect()->back();
    }

    /* public function show (User $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.users.role', compact('user', 'roles', 'permissions'));
    } */

    public function admin()
    {
        return view('auth.admin-login');
    }

    public function show($id)
    {   
        $user = User::findOrFail($id);
        $fav_books = array ();
     
        foreach($user->books as $fav_book)
        {
            $book_id = $fav_book->pivot->book_id; // Correctly gets the book_id
            $fav_book = Book::where('id', '=', $book_id)->first();
            array_push($fav_books, $fav_book); 
        }
        return view('pages.profile', [
            'id' => User::findOrFail($id),
            'fav_books' => $fav_books,
        ]);

    }
}
