<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\UserProvider;
use Illuminate\Http\Request;
use App\Notifications\UserBooking;

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

    public function checkout(Request $request)
    {
        $user = Auth::user();
        $userProviders = UserProvider::where('is_confirmed', 0)
                        ->where('user_id', $user->id)
                        ->get();

        $currentUserPoints = $user->points;
        $updatedUserPoints = $currentUserPoints;
        $adminUser = User::where('email', 'sarah@bridgeofmind.com')->firstOrFail();

        foreach($userProviders as $userProvider) {
            
            $userProvider->is_confirmed = 1;
            $userProvider->save();
    
            $updatedUserPoints += $userProvider->provider->points;

             $adminUser->notify( new UserBooking(
                 $userProvider->provider->name_en,
                 $user->first_name.' '.$user->last_name,
                 $request->only(['checkin', 'checkout', 'adult', 'children'])
             ));

        }

        $user->update(['points' => $updatedUserPoints]);
        return redirect(route('front.profile'))->with('status', 'Thank you for you reservation. we will contact you very soon!');
    }
	

}
