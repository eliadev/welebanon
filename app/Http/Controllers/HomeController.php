<?php

namespace App\Http\Controllers;

use DB;
use App;
use Auth;
use Session;
use App\User;
use App\Slider;
use App\Service;
use App\Category;
use App\Provider;
use Illuminate\Http\Request;
use App\Http\Requests\GuestLoginRequest;

class HomeController extends Controller
{
    public function index()
    {
		$sliders = Slider::inRandomOrder()->limit(1)->get();
		//$sliders = Slider::orderBy('order', 'DESC')->limit(1)->get();
		$services = Service::all();
        $providers = Provider::where('featured', 1)->get();
        return view('front.index', ['sliders' => $sliders, 'services' => $services, 'providers' => $providers]);
    }

    public function search(Request $request)
    {
    	$activeLanguage = Session::get('applocale', 'en');
    	$input =  '%'.$request->search_input.'%';

    	$providers = Provider::where('name_'.$activeLanguage, 'LIKE', $input)
    		->orWhere('description_'.$activeLanguage, 'LIKE', $input )->get();

    	return view('front.search_results', ['providers' => $providers, 'input' => $request->search_input]);
    }

    public function login()
    {
        return view('front.login');
    }

    public function doLogin(GuestLoginRequest $request)
    {
        $valid =  Auth::guard()->attempt(
            $request->only('email', 'password')
        );
        
        if($valid)
        {
            $user = User::where('email', $request->email)->first();
            Auth::login($user, true);
            return redirect('/');
        }

        return redirect()->route('front.login')->with('status', 'Invalid login credentials');
    }

    /**
     * Logout the user
     * 
     * @return type
     */
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
