@extends('layout.app')

@section('content')
<div class="container">
    <!-- home wrap -->
    <div class="home-wrap">
        <!-- home slick -->
        <div id="home-slick">
            <!-- banner -->
            <div class="banner banner-1">
                <img src="./img/banner01.jpg" alt="">
                <div class="banner-caption text-center">
                    <h1>Bags sale</h1>
                    <h3 class="white-color font-weak">Up to 50% Discount</h3>
                    <button class="primary-btn">Shop Now</button>
                </div>
            </div>
            <!-- /banner -->

            <!-- banner -->
            <div class="banner banner-1">
                <img src="./img/banner02.jpg" alt="">
                <div class="banner-caption">
                    <h1 class="primary-color">HOT DEAL<br><span class="white-color font-weak">Up to 50% OFF</span></h1>
                    <button class="primary-btn">Shop Now</button>
                </div>
            </div>
            <!-- /banner -->

            <!-- banner -->
            <div class="banner banner-1">
                <img src="./img/banner03.jpg" alt="">
                <div class="banner-caption">
                    <h1 class="white-color">New Product <span>Collection</span></h1>
                    <button class="primary-btn">Shop Now</button>
                </div>
            </div>
            <!-- /banner -->
        </div>
        <!-- /home slick -->
    </div>
    <!-- /home wrap -->
    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title">Latest Products</h2>
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
                                <h2 class="product-name"><a
                                        href="/product_details/{{$post->slug}}">{{str_limit($post->title, 25)}}</a></h2>
                                <div class="product-btns">
                                    <a href="{{ url('add-to-cart/'.$post->id) }}">
                                        <button class="primary-btn add-to-cart">
                                            <i class="fa fa-shopping-cart"></i> Add to Cart
                                        </button>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <!-- /Product Single -->
                @endforeach
            </div>
            <!-- /row -->

            <!-- row -->
            <div class="row">
                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title">Categories</h2>
                    </div>
                </div>
                <!-- section title -->
                @foreach($categories->take(10) as $post)
                <!-- /Product Single -->
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="product product-single">
                        <div class="product-thumb"><img src="./images/macbook.jpg" alt="" wi>
                        </div>
                        <div class="product-body">
                            <h2 class="product-name"><a href="#">{{str_limit($post->title, 25)}}</a></h2>
                        </div>
                    </div>
                </div>
                <!-- /Product Single -->
                @endforeach
            </div>
            <!-- /row -->

            <!-- row -->
            <div class="row">
                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title">Recommended</h2>
                    </div>
                </div>
                <!-- section title -->
                @foreach($product->take(4) as $post)
                <!-- Product Single -->
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
                <!-- /Product Single -->
                @endforeach

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
</div>
@endsection