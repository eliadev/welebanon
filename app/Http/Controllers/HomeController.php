<?php

namespace App\Http\Controllers;

use App;
use App\Service;
use App\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('front.home.index', ['services' => $services]);
    }

    public function categories()
    {
        $categories = Category::with('service')->get();
		return view('front.home.getaways', ['categories' => $categories]);
    }
}
