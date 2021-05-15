<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('id', '!=', 1)->where('id', '!=', auth()->user()->id)->paginate();
        return view('dashboard.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        $roles = Role::all();
        return view('dashboard.users.create', compact('permissions', 'roles'));
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
            'phone'     => ['required' , 'string', 'unique:users'],
            'email'     => ['required' , 'email', 'unique:users'],
            'password'  => ['required' , 'string'],
        ]);

        $user = User::create($request->all());

        $user->roles()->attach($request->roles);

        $user->permissions()->attach($request->permissions);

        return back()->with('success', 'تمت العملية');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('dashboard.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $permissions = Permission::all();
        $roles = Role::all();

        // find the permissions of user
        $user_permissions = [];
        $user_permissions = array_column($user->permissions->toArray(), 'id');
        
        
        return view('dashboard.users.edit', compact('user', 'permissions', 'roles', 'user_permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'phone'         => ['required' , 'string', 'unique:users,phone,'.$user->id],
            'password'      => ['nullable' , 'string'],
        ]);

        $data = $request->except('password');

        if($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);


        $user->roles()->sync($request->roles);

        $user->permissions()->sync($request->permissions);

        return back()->with('success', 'تمت العملية');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function profile(Request $request)
    {
        $data = $request->except('password');

        if($request->password) {
            $data['password'] = Hash::make($request->password);
        }
        
        auth()->user()->update($data);
        return back()->with('success', 'تمت العملية');
    }
}
