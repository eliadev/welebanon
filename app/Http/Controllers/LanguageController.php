<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function index($lang)
    {
    	Session::put('applocale', $lang);
    	return redirect()->intended();
    }
}
