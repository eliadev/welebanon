<?php

namespace App\Http\Controllers;

use App\StaticPage;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
		$staticPage = StaticPage::find(1);
        return view('front.about', ['staticPage' => $staticPage]);
    }
}
