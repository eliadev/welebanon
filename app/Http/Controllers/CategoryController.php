<?php

namespace App\Http\Controllers;

use DB;
use App\Service;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategories;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$services = Service::all();     
		//$categories = Category::whereIn('service_id', $services)->get();
		$categories = Category::with('service')->get();

		//dd($categories[0]->service);
		return view('category.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $service = DB::table('services')->get();
        return view('category.create', ['services' => $service]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategories $request)
    {
        $input = $request->all();
        $input['service_id']= $request->service_id;
		
        $category = Category::create($input);

		session()->flash('message', 'Your have been added successfully');
		return redirect(route('category.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $services = DB::table('services')->get();
        return view('category.edit', compact('category', 'services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategories $request, Category $category)
    {
        $category->update($request->all());
		session()->flash('message', 'Your have been updated successfully');
		return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
		$category->delete();
		session()->flash('message', 'Your have been deleted successfully');
		return redirect(route('category.index'));
    }
}
