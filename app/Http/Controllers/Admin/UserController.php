<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    protected $permissions;

    public function __construct()
    {
        $this->permissions = Permission::all();
    }
	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::whereHas('permissions')->orWhere('is_superadmin', 1)->get();
		return view('admin.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create', ['permissions' => $this->permissions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //dd($request->all());
        $input = $request->all();
        $input['password'] = Hash::make($request->get('password'));
        $user = User::create($input);
		$user->permissions()->sync($request->get('permission'));
		
		//Add Image
        if ($request->image) {
            $user->addMedia($request->image)->toMediaCollection('user');
        }
        
		session()->flash('message', 'Your record has been added successfully');
		return redirect(route('users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', [ 'user' => $user, 'permissions' => $this->permissions ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        if($request->has('delete_existing_image'))
            $user->clearMediaCollection('user');
        
        if (isset($request->image)) {
            $user->addMedia($request->image)->toMediaCollection('user');
        }
        $input = $request->all();
        $input['password'] = Hash::make($request->get('password'));
        $user->update($input);
        $user->permissions()->sync($request->get('permission'));
        
		session()->flash('message', 'Your record has been updated successfully');
		return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
		session()->flash('message', 'Your record has been deleted successfully');
		return redirect(route('users.index'));
    }
}
