
@extends('backend.layout.app')
@section('content')

    <div class="col-md-10 display-area">
        <div class="row text-center">
            <div class="col-md-12">
                <div class="content-box-large">
                    <div class="row justify-content-center">
                        <ol class="breadcrumb content-breadcrumb" style="">
                            <li>
                                <a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i>Dashboard</a>
                            </li>
                            <li class="active">All Order</li>
                        </ol>
                        <div class="col-md-8" style="background-color:#f2f2f2; margin:0 auto; width: 915px!important; float: none; padding-bottom:27px; padding-top:10px;">
                            
                            <!-- <div class="pull-left">
                                <a href="#" class="btn btn-primary">Add Product</a>
                            </div> -->

                            @if (! $order->count())
                                <div class="col-md-7 alert alert-danger" style="margin-left:30px;">
                                    <strong> No record found !</strong>
                                </div>
                            @else

                                <div class="card">
                                    
                                    <div class="col-md-8 card-header">
                                        <h3 >All Order</h3>
                                    </div>

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 col-md-offset-1" style="margin-left:0px;">
                                                <table class="table table-striped table-hover">
                                                    <thead>
                                                        <tr>
                                                        <!-- <th scope="col">Action</th> -->
                                                        <th class="text-center" scope="col">User Name</th>
                                                        <th class="text-center" scope="col">Address</th>
                                                        <th class="text-center" scope="col">Phone</th>
                                                        <th class="text-center" scope="col">Product </th>
                                                        
                                                        <th class="text-center" scope="col">Paid_amt</th>
                                                        <th class="text-center" scope="col">Order_at</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($order as $post)
                                                            <tr>
                                                            
                                                            <td>{!! str_limit($post->user->name, 20, '....') !!}</td>
                                                            <td>{!! str_limit($post->address, 20, '....') !!}</td>
                                                            <td>{{ $post->phone}}</td>
                                                        
                                                            <td><?php  $cart_val = unserialize($post->cart) ; echo (array_slice($cart_val, 0)[0]['name']);  ?>(<?php echo (array_slice($cart_val, 0)[0]['quantity']); ?>)</td>
                                                            
                                                            <td>{{ $post->paid_amt }}</td>
                                                            <td>{{ $post->created_at }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-footer clearfix">
                                        <div class="pull-left">
                                            {{ $order->render() }}
                                        </div>
                                    </div>

                                    <div class="pull-right">
                                        <strong>Total: </strong><small>{{ $order_count }} {{ str_plural('Item', $order_count) }}</small>
                                    </div>

                                </div>

                            @endif    
                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/Display area after sidenav-->

@endsection
