<?php

namespace App\Http\Controllers\Admin;

use App\Provider;
use App\Service;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProviderRequest;

class ProviderController extends Controller
{
    protected $categories;

    public function __construct()
    {
        $this->categories = Category::all();
    }
	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providers = Provider::with('category')->get();
		return view('admin.providers.index', ['providers' => $providers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.providers.create', ['categories' => $this->categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProviderRequest $request)
    {
        $request->has('featured') ? true : false;
        //dd($request->has('featured'));
        $provider = Provider::create($request->all());

		//Tags
        $tags = explode(",", $request['tags']);
        $tagIds = [];
        foreach($tags as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);
            array_push($tagIds, $tag->id);
        }
        $provider->tags()->sync($tagIds);      

		//Add Image
        if ($request->image) {
            $provider->addMedia($request->image)->toMediaCollection('provider');
        }
		
		session()->flash('message', 'Your record has been added successfully');
		return redirect(route('providers.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function show(Provider $provider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function edit(Provider $provider)
    {
        return view('admin.providers.edit', [ 'provider' => $provider, 'categories' => $this->categories ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function update(ProviderRequest $request, Provider $provider)
    {
		if($request->has('delete_existing_image'))
            $provider->clearMediaCollection('provider');
        
        if (isset($request->image)) {
            $provider->addMedia($request->image)->toMediaCollection('provider');
        }

		$tags = explode(",", $request['tag_list']);
        $tagIds = [];
        foreach($tags as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);
            array_push($tagIds, $tag->id);
        }
       // dd($tagIds);
        // attach tags to Provider
        $provider->tags()->sync($tagIds);    
		
        $provider->update($request->all());
		session()->flash('message', 'Your record has been updated successfully');
		return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provider $provider)
    {
        $provider->delete();
		session()->flash('message', 'Your record has been deleted successfully');
		return redirect(route('providers.index'));
    }
}
