<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function show($id)
    {
        $services = Service::all();
        $service = Service::with(['category', 'category.providers'])->find($id);
        return view('front.services', ['services' => $services, 'service' => $service]); 
    }
}
