<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Provider;
use Carbon\Carbon;
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
    	$provider = Provider::findOrFail($id);
    	
			if(Auth::check()){
				auth()->user()->providers()->attach([
					$provider->id => [
						'nb_children' => $request->get('children'),
						'nb_adults' => $request->get('adult'),
						'from_date' => Carbon::createFromFormat('d/m/Y', $request->get('checkin'))->format('Y-m-d'),
						'to_date' => Carbon::createFromFormat('d/m/Y', $request->get('checkout'))->format('Y-m-d'),
					]
				]);
				return redirect()->route('front.profile');
			}
			else{	
				return redirect()->route('front.login')->with('status', 'Login Before Booking!');
			}
    }
}
