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

    	$user->notify( new UserBooking(
    		$provider->name_en,
			$user = Auth::user()->first_name.' '.Auth::user()->last_name,
    		//'Elie Andraos', // this will be the auth user object
    		$request->only(['checkin', 'checkout', 'adult', 'children'])
    	));

    	return redirect()->route('front.providers.show', $id)->with('status', 'Booking Reserved!');
    }
}
