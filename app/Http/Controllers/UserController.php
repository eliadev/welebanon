<?php

namespace App\Http\Controllers;

use Auth;
use App\UserProvider;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show()
    {
		if(!Auth::check())
        {
            return redirect()->route('front.login')->with('status', 'Login before chosing a plan!');
        }
		
		$user = Auth::user();
    	$user_providers = collect($user->providers)->filter(function ($value, $key){
    		return $value->pivot->is_confirmed === 0;
    	});
		
		$pointSum = number_format(($user->providers)->sum('points'));
    	return view('front.user_show', [
    		'user' => $user,
    		'user_providers' => $user_providers,
			'pointSum' => $pointSum,
    	]);
    }

    public function remove($userProviderId)
    {
        $user = Auth::user();
        $userProvider = UserProvider::find($userProviderId);
        $userProvider->delete();
        return redirect( route('front.profile') );
    }
	

}
