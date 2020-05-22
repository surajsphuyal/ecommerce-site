<?php

namespace App\Http\Controllers;

use App\categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $limit = 5;

    public function index()
    {
        $data = categories::latest()->paginate($this->limit);
        $data_count = categories::count();
        return view("backend.category.index", compact('data', 'data_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(categories $post)
    {
        return view('backend.category.create', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $category = new categories([
            'title' => $request->get('title'),
        ]);

        $category->save();
        return redirect('/backend/category')->with('message', 'Your category added sucessfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = categories::find($id);
        // dd($category);
        return view('/backend/category/edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $category = categories::find($id);
        $category->title = $request->get('title');
        $category->save();

        return redirect('/backend/category')->with('message', 'Your category updated sucessfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $category = categories::find($id);
        $category->delete();

        return redirect('/backend/category')->with('message', 'Your category deleted sucessfully.');
    }
}
