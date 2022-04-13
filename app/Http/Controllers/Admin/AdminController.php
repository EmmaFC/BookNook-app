<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
    public function index ()
    {
        $users = User::all();
        $admins = array();
        foreach ($users as $user) {
            if (!$user->hasRole('user')) {
                array_push($admins, $user);
            }
        }
        return view('pages.admin.admins.index', compact('admins'));
    }


    public function create ()
    {
        return view('pages.admin.admins.create');
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
        return redirect()->route('pages.admin.admins.index');
    }

    public function edit (User $admin)
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('pages.admin.admins.edit', compact('admin', 'roles', 'permissions'));
    }

    public function profile_edit (User $admin)
    {
        return view('pages.edit-profile', compact('admin'));
    }

    public function profile_update (Request $request, User $admin)
    {
        $validated = $request->validate([
            'name' => ['required', 'min:3'],
            // 'image' => ['required', 'min:3'],
            'description' => ['required', 'min:3'],
            'email' => ['required', 'min:3'],
        ]);
        $admin->update($validated);
        return $this->show($admin->id);
    }

    public function password_edit (User $admin)
    {
        return view('pages.edit-password', compact('admin'));
    }

    public function password_update (Request $request, User $admin)
    {
        $validated = $request->validate(['password' => ['required', 'min:8']]);
        $admin->update($validated);
        return $this->show($admin->id);
    }

    public function update (Request $request, User $admin)
    {
        $validated = $request->validate(['name' => ['required', 'min:3']]);
        $admin->update($validated);
        return redirect()->route('pages.admin.admins.index');
    }


    public function destroy (User $admin)
    {
        $admin->delete();
        return redirect()->back();
    }

    public function assignRole (Request $request, User $admin)
    {
        if ($admin->hasRole($request->role)){
            return redirect()->back();
        }
        $admin->assignRole($request->role);
        return redirect()->back();
    }

    public function removeRole (User $admin, Role $role)
    {
        if ($admin->hasRole($role)){
            $admin->removeRole($role);
            return redirect()->back();
        }
        return redirect()->back();
    }

    public function givePermission (Request $request, User $admin)
    {
        if ($admin->hasPermissionTo($request->permission)){
            return redirect()->back();
        }
        $admin->givePermissionTo($request->permission);
        return redirect()->back();
    }

    public function revokePermission (User $admin, Permission $permission)
    {
        if ($admin->hasPermissionTo($permission)){
            $admin->revokePermissionTo($permission);
            return redirect()->back();
        }
        return redirect()->back();
    }

    /* public function show (admin $admin)
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.admins.role', compact('admin', 'roles', 'permissions'));
    } */

  

   
}
