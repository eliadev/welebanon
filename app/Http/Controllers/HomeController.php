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
        return view('front.home.index', ['services' => $services, 'providers' => $providers]);
    }

    //ToDo in other way
    public function categories($id)
    {
        $services = Service::all();
        $service = Service::with(['category', 'category.providers'])->find($id);
        return view('front.home.getaways', ['services' => $services, 'service' => $service]); 
    }
}
