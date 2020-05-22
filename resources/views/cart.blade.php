@extends('layout.app')
@section('content')
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="order-summary clearfix">
                    <div class="section-title">
                        <h3 class="title">Order Review</h3>
                    </div>

                    <table id="cart" class="table table-hover table-condensed">
                        <thead>
                            <tr>
                                <th style="width:50%">Product</th>
                                <th style="width:10%">Price</th>
                                <th style="width:8%">Quantity</th>
                                <th style="width:22%" class="text-center">Subtotal</th>
                                <th style="width:10%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total = 0 ?>

                            @if(session('cart'))
                            @foreach(session('cart') as $id => $details)

                            <?php $total += (int)$details['price'] * (int)$details['quantity'] ?>

                            <tr>
                                <td data-th="Product">
                                    <div class="row">
                                        <div class="col-sm-3 hidden-xs"><img
                                                src="{{ asset('/images/'.$details['photo']) }}" width="100" height="100"
                                                class="img-responsive" /></div>
                                        <div class="col-sm-9">
                                            <h4 class="nomargin">{{ $details['name'] }}</h4>
                                        </div>
                                    </div>
                                </td>
                                <td data-th="Price">Rs.{{ $details['price'] }}</td>
                                <td data-th="Quantity">
                                    <input type="number" value="{{ $details['quantity'] }}"
                                        class="form-control quantity" />
                                </td>
                                <td data-th="Subtotal" class="text-center">
                                    Rs.{{ (int)$details['price'] * (int)$details['quantity'] }}</td>
                                <td class="actions" data-th="">
                                    <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}"><i
                                            class="fa fa-refresh"></i></button>
                                    <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i
                                            class="fa fa-trash-o"></i></button>
                                </td>
                            </tr>
                            @endforeach
                            @endif

                        </tbody>
                        <tfoot>
                            <!-- <tr class="visible-xs">
                                <td class="text-center"><strong>Total {{ $total }}</strong></td>
                            </tr> -->
                            <tr>

                                <td class="text-right pull-right" style="position: relative; left: 100%;"><strong>Total Rs.{{ $total }}</strong></td>
                                <?php 
                                  session()->put('paid_amt', $total);
                                ?>
                            </tr>
                        </tfoot>

                    </table>
                    <div class="pull-left">
                        <a href="{{ url('/') }}">
                            <button class="primary-btn"><i class="fa fa-arrow-circle-left"></i> Continue
                                Shopping</button>
                        </a>

                        <a href="{{ route('checkout.create') }}">
                            <button class="primary-btn">Checkout <i class="fa fa-arrow-circle-right"></i> </button>
                        </a>
                    </div>
                </div>

            </div>

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->



@endsection