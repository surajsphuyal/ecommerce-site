@extends('layout.app')

@section('content')

<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!--  Product Details -->
            <div class="product product-details clearfix">
                <div class="col-md-6">
                    <div id="product-main-view">
                        <div class="product-view">
                            <img src="{{asset('/images/'.$product_details->image)}}" alt="">
                        </div>
                        <!-- <div class="product-view">
                            <img src="{{asset('/img/main-product01.jpg')}}" alt="">
                        </div> -->
                        
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="product-body">
                        
                        <h2 class="product-name">{{$product_details->title}}</h2>
                        <h3 class="product-price">Rs. {{$product_details->price}}</h3>
                        
                        <p><strong>Availability:</strong>{{$product_details->stock}}</p>
                        <p>{!! $product_details->description !!}</p>
                        <div class="product-options">
                            <ul class="size-option">
                                <li><span class="text-uppercase">Size:</span></li>
                                <li><a href="#">{{$product_details->size}}</a></li>
                            </ul>
                        </div>

                        <div class="product-btns">
                            <form action="" method="post">
                                <div class="qty-input">
                                    <span class="text-uppercase">QTY: </span>
                                    <input class="input" type="number" required>
                                </div>
                                <button type="submit" class="primary-btn add-to-cart"><i
                                        class="fa fa-shopping-cart"></i> Add to
                                    Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="product-tab">
                        <ul class="tab-nav">
                            <li class="active"><a data-toggle="tab" href="#tab1" style="color:black;">Description</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab1" class="tab-pane fade in active">
                                <p>{!! $product_details->description !!}</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /Product Details -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->

<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h2 class="title">Picked For You</h2>
                </div>
            </div>
            <!-- section title -->
            @foreach($product as $post)
            <!-- Product Single -->
            <a href="/product_details/{{$post->slug}}">
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="product product-single">
                        <div class="product-thumb">
                            <img src="{{asset('/images/'.$post->image)}}" alt="">
                        </div>
                        <div class="product-body">
                            <h3 class="product-price">Rs. {{$post->price}}</h3>
                            <h2 class="product-name"><a href="/product_details/{{$post->slug}}">{{str_limit($post->title, 25)}}</a></h2>
                            <div class="product-btns">
                            <a href="{{ url('add-to-cart/'.$post->id) }}"><button class="primary-btn add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>Add to
                                        Cart</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <!-- /Product Single -->
            @endforeach
            <!-- /Product Single -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->


@endsection