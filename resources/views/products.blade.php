@extends('layout.app')

@section('content')
<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- MAIN -->
            <div id="main" class="col-md-12">
                <!-- store top filter -->
                <ul class="store-pages pull-right">
                    <li class="active">{{ $product->links() }}</li>
                </ul>
                <!-- /store top filter -->

                <!-- STORE -->
                <div id="store">
                    <!-- row -->
                    <div class="row">


                        <!-- Product Single -->
                        @foreach($product as $post)
                        <a href="/product_details/{{$post->slug}}">
                            <div class="col-md-3 col-sm-6 col-xs-6">
                                <div class="product product-single">
                                    <div class="product-thumb">
                                        <div class="product-label">
                                        </div>
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
                        @endforeach
                        <!-- /Product Single -->
                        <div class="clearfix visible-sm visible-xs"></div>
                    </div>
                    <!-- /row -->
                </div>
                <!-- /STORE -->

                <!-- store bottom filter -->
                <ul class="store-pages pull-right">
                    <li class="active">{{ $product->links() }}</li>
                </ul>
                <!-- /store bottom filter -->
            </div>
            <!-- /MAIN -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->

@endsection