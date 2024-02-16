<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    public function destroy(Role $role)
    {
       
        $role->delete();

        return redirect()->route('admin.roles.index')->with('success', 'Role deleted successfully');
    }


    public function create()
    {
        return view('admin.roles.create');
    }

   
    public function store(Request $request)
{
    $validated = $request->validate(['name' => ['required', 'min:3']]);
    Role::create($validated);

    return redirect()->route('admin.roles.index')->with('success', 'Role Created successfully.');
}

public function edit(Role $role){
    $permissions = Permission::all();
    return view('admin.roles.edit', compact('role', 'permissions'));
}
public function update(Request $request, Role $role){
    $validated = $request->validate(['name' => ['required']]);
    $role->update($validated);

    return to_route('admin.roles.index');
}
public function givePermission(Request $request, Role $role){
    // Assuming `$request->permission` is the ID of the permission.
    $permissionId = $request->permission;
    $permission = Permission::findById($permissionId, 'web'); // 'web' is the guard name, change if you use a different guard.

    if (!$permission) {
        return back()->with('error', 'Permission does not exist.');
    }

    if($role->hasPermissionTo($permission->name)){
        return back()->with('message', 'Permission already assigned to this role.');
    }

    $role->givePermissionTo($permission->name);
    return back()->with('message', 'Permission assigned successfully.');
}
    
}
