<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Provider;
use Illuminate\Http\Request;
use App\Notifications\UserBooking;

class ProvidersController extends Controller
{

		public function show($id)
    {
		$provider = Provider::with(['tags'])->find($id);
		return view('front.providers', ['provider' => $provider]);
    }

    public function book(Request $request, $id)
    {
    	$user = User::where('email', 'sarah@bridgeofmind.com')->firstOrFail();
    	$provider = Provider::findOrFail($id);

			if(Auth::check()){
				$user->notify( new UserBooking(
					$provider->name_en,
					$user = Auth::user()->first_name.' '.Auth::user()->last_name,
					$request->only(['checkin', 'checkout', 'adult', 'children'])
				));
				return redirect()->route('front.providers.show', $id)->with('status', 'Booking Reserved!');
			}
			else{	
				return redirect()->route('front.login')->with('status', 'Login Before Booking!');
			}
    }
}
