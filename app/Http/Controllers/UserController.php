<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show()
    {
    	return view('front.user_show', ['user' => Auth::user()]);
    }
}
