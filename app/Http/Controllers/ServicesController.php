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
	
	public function search(Request $request)
    {
    	$activeLanguage = Session::get('applocale', 'en');
    	$input =  '%'.$request->input_name.'%';

    	$providers = Provider::where('name_'.$activeLanguage, 'LIKE', $input)
    		->orWhere('description_'.$activeLanguage, 'LIKE', $input )->get();

    	return view('front.search_results', ['providers' => $providers, 'input' => $request->input_name]);
    }
}
