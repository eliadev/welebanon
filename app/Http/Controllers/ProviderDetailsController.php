<?php

namespace App\Http\Controllers;

use App;
use App\Service;
use App\Tag;
use App\Category;
use App\Provider;
use Illuminate\Http\Request;

class ProviderDetailsController extends Controller
{

	public function index($id)
    {
		$providers = Provider::with(['tags'])->find($id);
		return view('front.home.providers', ['providers' => $providers]);
    }
}
