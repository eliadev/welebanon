<?php

namespace App\Http\Controllers\Admin;

use App\User;
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
    public function destroy(User $user)
    {
        $user->delete();
		session()->flash('message', 'Your record has been deleted successfully');
		return redirect(route('clients.index'));
    }
}
