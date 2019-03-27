<?php

namespace App\Http\Controllers;

use App\Provider;
use Illuminate\Http\Request;

class ProvidersController extends Controller
{

	public function show($id)
    {
		$providers = Provider::with(['tags'])->find($id);
		return view('front.providers', ['providers' => $providers]);
    }
}
