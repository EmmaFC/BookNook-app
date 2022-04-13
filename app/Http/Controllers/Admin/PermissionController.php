<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index ()
    {
        $permissions = Permission::all();
        return view('pages.admin.permissions.index', compact('permissions'));
    }


    public function create ()
    {
        return view('pages.admin.permissions.create');
    }


    public function store (Request $request)
    {
        $validated = $request->validate(['name' => ['required', 'min:3']]);
        // $validated['guard_name'] = $request->name; 
        Permission::create($validated);
        Artisan::call('cache:clear');
        return redirect()->route('pages.admin.permissions.index');
    }

    public function edit (Permission $permission)
    {
        $roles = Role::all();
        return view('pages.admin.permissions.edit', compact('permission', 'roles'));
    }


    public function update (Request $request, Permission $permission)
    {
        $validated = $request->validate(['name' => ['required', 'min:3']]);
        $permission->update($validated);
        return redirect()->route('pages.admin.permissions.index');
    }


    public function destroy (Permission $permission)
    {
        $permission->delete();
        return redirect()->back();
    }

    public function assignRole (Request $request, Permission $permission)
    {
        if ($permission->hasRole($request->role)){
            return redirect()->back();
        }
        $permission->assignRole($request->role);
        return redirect()->back();
    }

    public function removeRole (Permission $permission, Role $role)
    {
        if ($permission->hasRole($role)){
            $permission->removeRole($role);
            return redirect()->back();
        }
        return redirect()->back();
    }

}
