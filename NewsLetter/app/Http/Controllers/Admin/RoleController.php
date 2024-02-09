<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

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


    
    
}
