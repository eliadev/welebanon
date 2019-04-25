<?php

namespace App\Http\Controllers\Admin;

use App\StaticPage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StaticPageRequest;

class StaticPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staticPages = StaticPage::all();
		return view('admin.staticPages.index', ['staticPages' => $staticPages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.staticPages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StaticPageRequest $request)
    {
        $staticPage = StaticPage::create($request->all());
		
		//Add Image
        if ($request->image) {
            $staticPage->addMedia($request->image)->toMediaCollection('staticPage');
        }
        
		session()->flash('message', 'Your record has been added successfully');
		return redirect(route('staticPages.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StaticPage  $staticPage
     * @return \Illuminate\Http\Response
     */
    public function show(StaticPage $staticPage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StaticPage  $staticPage
     * @return \Illuminate\Http\Response
     */
    public function edit(StaticPage $staticPage)
    {
        return view('admin.staticpages.edit', compact('staticPage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StaticPage  $staticPage
     * @return \Illuminate\Http\Response
     */
    public function update(StaticPageRequest $request, StaticPage $staticPage)
    {
        if($request->has('delete_existing_image'))
            $staticPage->clearMediaCollection('staticPage');
        
        if (isset($request->image)) {
            $staticPage->addMedia($request->image)->toMediaCollection('staticPage');
        }
		$staticPage->update($request->all());
		session()->flash('message', 'Your record has been updated successfully');
		return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StaticPage  $staticPage
     * @return \Illuminate\Http\Response
     */
    public function destroy(StaticPage $staticPage)
    {
        $staticPage->delete();
		session()->flash('message', 'Your record has been deleted successfully');
		return redirect(route('staticPages.index'));
    }
}
