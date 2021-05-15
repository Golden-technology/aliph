<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::get();
        return view('dashboard.users.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::get();
        return view('dashboard.users.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required | unique:roles,name'
        ]);

        $role = Role::create([
            'name' => $request->name
        ]);

        if ($request->has('permissions')) {
            $role->attachPermissions($request->permissions);
        }

        session()->flash('success', 'تمت العملية بنجاح');


        if($request->next == 'back') {
            return back();
        }else {
            return redirect()->route('roles.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('dashboard.users.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        if($role->id == 1){
            return back()->with('error', 'لا يمكنك تعديل الدور الرئيسي');
        }
        $permissions = Permission::all();
        return view('auth::roles.edit', compact('permissions', 'role', 'modules'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => ['required', Rule::unique('roles', 'name')->ignore($role)]
        ]);

        if($role->id == 1){
            return back()->with('error', 'لا يمكنك تعديل الدور الرئيسي');
        }

        $role->update([
            'name' => $request->name
        ]);

        $role->permissions()->sync($request->permissions);

        session()->flash('success', 'تمت العملية بنجاح');

        if($request->next == 'back') {
            return back();
        }else {
            return redirect()->route('roles.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        if($role->id == 1){
            return back()->with('error', 'لا يمكنك حذف الدور الرئيسي');
        }
        $role->delete();

        session()->flash('success', 'تمت العملية بنجاح');

        return redirect()->route('roles.index');

    }
}
