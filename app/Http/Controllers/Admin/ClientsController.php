<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Plan;
use App\UserProvider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientsController extends Controller
{
    public function index()
    {
        $users = User::whereDoesntHave('permissions')->where('is_superadmin', 0)->get();
		return view('admin.clients.index', ['users' => $users]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$user = User::find($id);
        $user->delete();
		session()->flash('message', 'Your record has been deleted successfully');
		return redirect(route('clients.index'));
    }
	
	/**
     * Display the specified resource.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
			//dd($user->toArray());
		$userProviders = UserProvider::where('is_confirmed', 1)
                        ->where('user_id', $user->id)
                        ->get();
		//dd($userProviders->toArray());
		return view('admin.clients.show', ['user' => $user, 'userProviders' => $userProviders]);
    }
}
