<?php

namespace App\Http\Controllers;

use App;
use App\Service;
use App\Category;
use App\Provider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::all();
        $providers = Provider::where('featured', 1)->get();
        return view('front.index', ['services' => $services, 'providers' => $providers]);
    }
}
