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
	
    	$user_providers = $user->providers->filter(function ($value, $key){
    		return $value->pivot->is_confirmed === 0;
    	});
		
		$pointSum = $this->getCheckoutPoints();

        // check if the user reached the maximum plan
        if($user->plan && $user->points == $user->plan->points)
        {
            $user->points = 0;
            $user->plan_id = null;
            $user->save();
            $resetPlan = true;
        }
        else
            $resetPlan = false;

    	return view('front.user_show', [
    		'user' => $user,
    		'user_providers' => $user_providers,
			'pointSum' => $pointSum,
            'resetPlan' => $resetPlan
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

        // check if the total points are greater than the plan points.
        $totalPoints = $this->getCheckoutPoints() + $user->points;

        if($totalPoints > $user->plan->points)
            return redirect()->route('front.profile')->with('danger', 'You have exceeded your plan points!');
        
        // update the user providers:
        // 1. set is confirmed on provider_user records to 1 (they will be history)
        // 2. update user total points
        // 3. send email
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

    protected function getCheckoutPoints()
    {
        $user = Auth::user();
        $user_providers = $user->providers->filter(function ($value, $key){
            return $value->pivot->is_confirmed === 0;
        });
        
       return number_format($user_providers->sum('points'));
    }

    public function history()
    {
		$user = Auth::user();
        $userProviders = UserProvider::where('is_confirmed', 1)
                        ->where('user_id', $user->id)
                        ->get();
		//dd($userProviders->toArray());
		return view('front.history', ['userProviders' => $userProviders]);
    }
	

}
