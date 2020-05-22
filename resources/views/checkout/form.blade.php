@extends('layout.app')
@section('content')

<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <form id="checkout-form" class="clearfix" method="post" action="{{ route('checkout.store') }}" >
                @csrf
                <div class="col-md-6">
                    <div class="billing-details">
                        
                        <!-- ADDRESS MODAL -->
                        <div class="section-title">
                            <h3 class="title">Billing Details</h3>
                        </div>
                    
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input class="input" type="text" name="address" value="{{ auth()->user()->address }}" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input class="input" type="tel" name="phone" value="{{ auth()->user()->number }}" required>
                        </div>

                        <!-- <div class="product-btns">
                            <button type="submit" value="Submit" class="btn btn-primary">Submit</button>
                        </div> -->
                        
                    </div>
                </div>

                <div class="col-md-6">

                    <div class="payments-methods">
                        <div class="section-title">
                            <h4 class="title">Payments Methods</h4>
                        </div>
                        <div class="input-checkbox">
                            <label for="payments-1">Cash on Delivery</label>
                            <div class="caption">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    <p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="order-summary clearfix">
                        <div class="section-title">
                            <h3 class="title">Order Review</h3>
                        </div>
                        <table class="shopping-cart-table table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th></th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-right"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total = 0 ?>
                                <?php $final_total = 0 ?>
                                @if(session('cart'))
                                @foreach(session('cart') as $id => $details)
                                <?php $total += (int)$details['price'] * (int)$details['quantity'] ?>
                                <?php $temp_total = $total ?>
                                <?php $final_total += $temp_total++?>
                                <tr>
                                    <td class="thumb"><img src="./img/thumb-product01.jpg" alt=""></td>
                                    <td class="details">
                                        <a href="#">{{ $details['name'] }}</a>
                                    </td>
                                    <td class="price text-center"><strong>Rs. {{ $details['price'] }}</strong></td>
                                    <td class="qty text-center">{{ $details['quantity'] }}</td>
                                    <td class="total text-center"><strong class="primary-color">
                                            Rs. {{$total}}
                                        </strong></td>
                                    <td class="text-right">
                                        <a href="/remove-from-cart" method="DELETE">
                                            <button class="main-btn icon-btn">
                                                <i class="fa fa-close"></i>
                                            </button>

                                        </a>
                                        <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i class="fa fa-trash-o"></i></button>
                                    </td>
                                </tr>

                            </tbody>
                            @endforeach
                            @endif
                            <tfoot>
                                <tr>
                                    <th class="empty" colspan="3"></th>
                                    <th>TOTAL</th>
                                    <th colspan="2" class="total">Rs. {{$final_total}}</th>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="pull-right">
                            <button type="submit" class="primary-btn">Place Order</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->



@endsection
