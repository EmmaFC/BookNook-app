<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index ()
    {
        $roles = Role::whereNotIn('name', ['superadmin'])->get();
        return view('pages.admin.roles.index', compact('roles'));
    }

    
    public function create ()
    {
        return view('pages.admin.roles.create');
    }


    public function store (Request $request)
    {
        $validated = $request->validate(['name' => ['required', 'min:3']]);
        // $validated['guard_name'] = $request->name; 
        Role::create($validated);
        return redirect()->route('pages.admin.roles.index');
    }


    public function edit (Role $role)
    {
        $permissions = Permission::all();
        return view('pages.admin.roles.edit', compact('role', 'permissions'));
    }


    public function update (Request $request, Role $role)
    {
        $validated = $request->validate(['name' => ['required', 'min:3']]);
        $role->update($validated);
        return redirect()->route('pages.admin.roles.index');
    }


    public function destroy (Role $role)
    {
        $role->delete();
        return redirect()->back();
    }

    

    public function givePermission (Request $request, Role $role)
    {
        if ($role->hasPermissionTo($request->permission)){
            return redirect()->back();
        }
        $role->givePermissionTo($request->permission);
        return redirect()->back();
    }

    public function revokePermission (Role $role, Permission $permission)
    {
        if ($role->hasPermissionTo($permission)){
            $role->revokePermissionTo($permission);
            return redirect()->back();
        }
        return redirect()->back();
    }

    
}
