<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show()
    {
    	$user = Auth::user();
    	$user_providers = collect($user->providers)->filter(function ($value, $key){
    		return $value->pivot->is_confirmed === 0;
    	});

    	return view('front.user_show', [
    		'user' => $user,
    		'user_providers' => $user_providers
    	]);
    }
}
