<?php

namespace App\Http\Controllers;

use App\Product;
use App\categories;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        $product = Product::with('category')->latest()->paginate(10);
        $product_count = Product::count();

        // return $product;

        return view("backend.product.index", compact('product', 'product_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = categories::pluck('title','id');
        return view('backend.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formInput = $request->except('image');

        $this->validate($request,[
            'title' => 'required',
            // 'slug' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg|max:20000'
        ]);

        $image = $request->image;
        if($image)
        {
            $imageName = $image->getClientOriginalName();
            $image->move('images', $imageName);
            $formInput['image'] = $imageName;
        }

        $formInput['slug'] =  str_slug($request->title);

        Product::create($formInput);
        return redirect('/backend/product')->with('message', 'Your product added sucessfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = categories::pluck('title','id');
        $product = Product::find($id);
        
        return view('/backend/product/edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $formInput = $request->except('image');

        $this->validate($request,[
            'title' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg|max:20000'
        ]);

        $image = $request->image;
        if($image)
        {
            $imageName = $image->getClientOriginalName();
            $image->move('images', $imageName);
            $formInput['image'] = $imageName;
        }

        $product = Product::findOrFail($id);
        

        $product->fill($formInput)->save();
        return redirect('/backend/product')->with('message', 'Your product updated sucessfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect('/backend/product')->with('message', 'Your product deleted sucessfully.');
    }

    public function product_details(Product $product_details){
        $product= Product::latest()->take(4)->get();

        return view('product_details',compact('product_details','product'));
    }
    
    public function products(){
        $product= Product::paginate(12);

        return view('products',compact('product'));
    }
}
