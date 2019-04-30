<?php

namespace App\Http\Controllers;

use App;
use Auth;
use Session;
use App\User;
use App\Service;
use App\Category;
use App\Provider;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('front.services', ['services' => $services]); 
    }
	
	public function show($id)
    {
        $services = Service::all();
        $service = Service::with(['category', 'category.providers'])->find($id);
        return view('front.service', ['services' => $services, 'service' => $service]); 
    }
	
	public function search(Request $request)
    {
    	$activeLanguage = Session::get('applocale', 'en');
        $input_name =  '%'.$request->input_name.'%';
    	$input_address =  '%'.$request->input_address.'%';

    	$query = Provider::query();

        if($request->input_name)
            $query->where('name_'.$activeLanguage, 'LIKE', $input_name);

         if($request->input_address)
    		$query->where('address_'.$activeLanguage, 'LIKE', $input_address );

		$providers = $query->get();
        //dd($providers->toArray());
		
    	return view('front.search_results', [
					'providers' => $providers, 
					'input_name' => $request->input_name,
					'input_address' => $request->input_address
        ]);
    }
}
