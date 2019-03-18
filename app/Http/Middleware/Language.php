<?php

namespace App\Http\Middleware;

use Session;
use App;
use Closure;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $activeLanguage = Session::get('applocale', 'en');
        
        if ($activeLanguage && in_array($activeLanguage, ['en', 'ar'])) {
            App::setLocale($activeLanguage);
        }

       // App::getLocale() == ['en']{

       // }
        
        return $next($request);
    }
}
