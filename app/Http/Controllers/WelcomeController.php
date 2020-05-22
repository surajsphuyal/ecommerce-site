<?php

namespace App\Http\Controllers;
use App\Product;
use App\categories;
use Auth;
use Redirect;
use App\Order;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $cart = session()->get('cart');

        // return serialize($cart);

        $product= Product::latest()->take(10)->get();
        $categories= categories::latest()->get();

        return view('welcome', compact('product','categories'));
    }

    public function signout()
    {
        Auth::logout();
        return Redirect::to('/');
    }

    public function cart()
    {
        
        return view('cart'); 
        
        
    }

    public function addToCart($id)
    {
        if(Auth::check()){
            $product = Product::find($id);
 
            if(!$product) {
    
                abort(404);
    
            }
    
            $cart = session()->get('cart');

            // return $cart;
    
            // if cart is empty then this the first product
            if(!$cart) {
    
                $cart = [
                        $id => [
                            "name" => $product->title,
                            "quantity" => 1,
                            "price" => (int)$product->price,
                            "photo" => $product->image
                        ]
                ];
    
                session()->put('cart', $cart);
    
                // return redirect('/cart')->with('success', 'Product added to cart successfully!');
            }
    
            // if cart not empty then check if this product exist then increment quantity
            if(isset($cart[$id])) {
    
                $cart[$id]['quantity']++;
    
                session()->put('cart', $cart);
    
                // return redirect()->back()->with('success', 'Product added to cart successfully!');
    
            }
    
            // if item not exist in cart then add to cart with quantity = 1
            $cart[$id] = [
                "name" => $product->title,
                "quantity" => 1,
                "price" => $product->price,
                "photo" => $product->image
            ];
    
            session()->put('cart', $cart);
            
            //dd($cart);
            return redirect('/cart')->with('success', 'Product added to cart successfully!');

        }else{
            return redirect('/login');
        }
            
    }

    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');
 
            $cart[$request->id]["quantity"] = $request->quantity;
 
            session()->put('cart', $cart);
 
            session()->flash('success', 'Cart updated successfully');
        }
    }
 
    public function remove(Request $request)
    {
        if($request->id) {
 
            $cart = session()->get('cart');
 
            if(isset($cart[$request->id])) {
 
                unset($cart[$request->id]);
 
                session()->put('cart', $cart);
            }
 
            session()->flash('success', 'Product removed successfully');
        }
    }

    
}
