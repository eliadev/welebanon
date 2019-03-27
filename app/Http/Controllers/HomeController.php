<?php

namespace App\Http\Controllers;

use App;
use Session;
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

    public function search(Request $request)
    {
    	$activeLanguage = Session::get('applocale', 'en');
    	$input =  '%'.$request->search_input.'%';

    	$providers = Provider::where('name_'.$activeLanguage, 'LIKE', $input)
    		->orWhere('description_'.$activeLanguage, 'LIKE', $input )->get();

    	return view('front.search_results', ['providers' => $providers, 'input' => $request->search_input]);
    }
}
