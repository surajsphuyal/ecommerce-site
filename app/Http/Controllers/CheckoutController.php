<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Order;
use Session;


class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::with('user')->latest()->paginate(10);
        $order_count = Order::count();

        // return $product;

        return view("checkout.index", compact('order', 'order_count'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $order = Order::all();
        
        if(Auth::check()){
            return view('checkout.form', compact('order'));
        }

        return redirect('/login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // return session()->get('paid_amt');

        // return $request;
        
        $this->validate($request,[
            'address' => 'required',
            'phone' => 'required|integer',
        ]);

        $data = $request->all();
        $data['paid_amt'] = session()->get('paid_amt');
        
        $data['cart'] = serialize(session()->get('cart'));

        Auth::user()->orders()->create($data);

        Session::forget('cart');
        Session::forget('paid_amt');
        
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
