<?php

namespace App\Http\Controllers;

use App\Provider;
use Illuminate\Http\Request;

class ProvidersController extends Controller
{

	public function show($id)
    {
		$provider = Provider::with(['tags'])->find($id);
		return view('front.providers', ['provider' => $provider]);
    }
}
