<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/nouislider.css')}}">
    <link rel="stylesheet" href="{{asset('/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('/css/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">


    <!--Get your own code at fontawesome.com-->

    <title>OnNepa</title>
</head>

<body>
    <!-- HEADER -->
    <header>
        <!-- header -->
        <div id="header">
            <div class="container">
                <div class="pull-left">
                    <!-- Logo -->
                    <div class="header-logo">
                        <a class="logo" href="#">
                            <img src="./img/logo.png" alt="">
                        </a>
                    </div>
                    <!-- /Logo -->


                </div>
                <div class="pull-right">
                    <ul class="header-btns">
                        <!-- Account -->
                        <li class="header-account dropdown default-dropdown">
                            <div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
                                <div class="header-btns-icon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <strong class="text-uppercase">Profile</strong>
                            </div>
                            @guest
                            <a href="/login" class="text-uppercase">Login</a>
                            <ul class="custom-menu">
                                <li><a href="{{ route('checkout.create') }}"><i class="fa fa-check"></i> Checkout</a>
                                </li>
                                <li><a href="/login"><i class="fa fa-unlock-alt"></i> Login</a></li>
                                <li><a href="/register"><i class="fa fa-user-plus"></i> Create Account</a></li>
                            </ul>
                            @else
                            <a href="#" class="text-uppercase">{{ auth()->user()->name }}</a>
                            <ul class="custom-menu">
                                <!-- <li><a href="#"><i class="fa fa-user"></i> My Account</a></li> -->
                                <li><a href="{{ route('checkout.create') }}"><i class="fa fa-check"></i> Checkout</a>
                                </li>

                                <li><a href="{{ url('signout') }}"><i class="fa fa-unlock-alt"></i> Logout</a></li>


                            </ul>
                            @endguest

                        </li>
                        <!-- /Account -->

                        <!-- Cart -->
                        <?php 
                
                            $count = session()->get('cart');
                            if(!$count == NULL){
                                $value = count($count);
                                $totalprice = session()->get('paid_amt');
                            }else{
                                $value = 0;
                                $totalprice = 0;
                            }
                            

                        ?>
                        <li class="header-cart dropdown default-dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <div class="header-btns-icon">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span class="qty">{{ $value }}</span>
                                </div>
                                <strong class="text-uppercase">My Cart:</strong>
                                <br>
                                <span>Rs.{{ $totalprice }}</span>
                            </a>
                            <div class="custom-menu">
                                <div id="shopping-cart">
                                    <div class="shopping-cart-list">
                                        @if($count)
                                        @foreach($count as $id => $details)
                                        

                                        <div class="product product-widget">
                                            <div class="product-thumb">
                                                <img src="{{ asset('/images/'.$details['photo']) }}" alt="">
                                            </div>
                                            <div class="product-body">
                                                <h3 class="product-price">Rs. {{ $details['price'] }} <span
                                                        class="qty">x{{ $details['quantity'] }}</span></h3>
                                                <h2 class="product-name"><a href="#">{{ $details['name'] }}</a></h2>
                                            </div>
                                            
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                    <div class="shopping-cart-btns">
                                        <a href="/cart"><button class="main-btn">View Cart</button></a>
                                        <a href="{{ route('checkout.create') }}"><button class="primary-btn">Checkout <i
                                                    class="fa fa-arrow-circle-right"></i></button></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- /Cart -->

                        <!-- Mobile nav toggle-->
                        <li class="nav-toggle">
                            <button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
                        </li>
                        <!-- / Mobile nav toggle -->
                    </ul>
                </div>
            </div>
            <!-- header -->
        </div>
        <!-- container -->
    </header>
    <!-- /HEADER -->

    <!-- NAVIGATION -->
    <div id="navigation">
        <!-- container -->
        <div class="container">
            <div id="responsive-nav">
                <!-- category nav -->
                <div class="category-nav show-on-click">
                    <span class="category-header">Categories <i class="fa fa-list"></i></span>
                    <ul class="category-list">
                        @foreach(App\categories::all() as $post)
                        <li class="dropdown side-dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">{{$post->title}} <i
                                    class="fa fa-angle-right"></i></a>
                            <!-- <div class="custom-menu">
								<div class="row">
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Categories</h3></li>
											<li><a href="#">Women’s Clothing</a></li>
											<li><a href="#">Men’s Clothing</a></li>
											<li><a href="#">Phones & Accessories</a></li>
											<li><a href="#">Jewelry & Watches</a></li>
											<li><a href="#">Bags & Shoes</a></li>
										</ul>
										<hr class="hidden-md hidden-lg">
									</div>
								<div class="row hidden-sm hidden-xs">
									<div class="col-md-12">
										<hr>
										<a class="banner banner-1" href="#">
											<img src="./img/banner05.jpg" alt="">
											<div class="banner-caption text-center">
												<h2 class="white-color">NEW COLLECTION</h2>
												<h3 class="white-color font-weak">HOT DEAL</h3>
											</div>
										</a>
									</div>
								</div>
							</div> -->
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!-- /category nav -->

                <!-- menu nav -->
                <div class="menu-nav">
                    <span class="menu-header">Menu <i class="fa fa-bars"></i></span>
                    <ul class="menu-list">
                        <li><a href="/">Home</a></li>
                        
                        <li><a href="/products">Products</a></li>

                        <!-- <li class="dropdown mega-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Women <i class="fa fa-caret-down"></i></a>
							<div class="custom-menu">
								<div class="row">
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Categories</h3></li>
											<li><a href="#">Women’s Clothing</a></li>
											<li><a href="#">Men’s Clothing</a></li>
											<li><a href="#">Phones & Accessories</a></li>
											<li><a href="#">Jewelry & Watches</a></li>
											<li><a href="#">Bags & Shoes</a></li>
										</ul>
										<hr class="hidden-md hidden-lg">
									</div>
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Categories</h3></li>
											<li><a href="#">Women’s Clothing</a></li>
											<li><a href="#">Men’s Clothing</a></li>
											<li><a href="#">Phones & Accessories</a></li>
											<li><a href="#">Jewelry & Watches</a></li>
											<li><a href="#">Bags & Shoes</a></li>
										</ul>
										<hr class="hidden-md hidden-lg">
									</div>
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Categories</h3></li>
											<li><a href="#">Women’s Clothing</a></li>
											<li><a href="#">Men’s Clothing</a></li>
											<li><a href="#">Phones & Accessories</a></li>
											<li><a href="#">Jewelry & Watches</a></li>
											<li><a href="#">Bags & Shoes</a></li>
										</ul>
									</div>
								</div>
								<div class="row hidden-sm hidden-xs">
									<div class="col-md-12">
										<hr>
										<a class="banner banner-1" href="#">
											<img src="./img/banner05.jpg" alt="">
											<div class="banner-caption text-center">
												<h2 class="white-color">NEW COLLECTION</h2>
												<h3 class="white-color font-weak">HOT DEAL</h3>
											</div>
										</a>
									</div>
								</div>
							</div> -->
                        </li>
                        
                        <!-- Search -->
                        <!-- <div class="header-search pull-right">
                            <form>
                                <input class="input search-input" type="text" placeholder="Enter your keyword">
                                <button class="search-btn"><i class="fa fa-search"></i></button>
                            </form>
                        </div> -->
                        <!-- /Search -->
                    </ul>
                </div>
                <!-- menu nav -->
            </div>
        </div>
        <!-- /container -->
    </div>
    <!-- /NAVIGATION -->

    <!-- BREADCRUMB -->
    <!-- <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Blank</li>
            </ul>
        </div>
    </div> -->
    <!-- /BREADCRUMB -->

    <!-- section -->
    @yield('content')
    <!-- /section -->

    <!-- FOOTER -->
    <footer id="footer" class="section section-grey">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- footer widget -->
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="footer">
                        <!-- footer logo -->
                        <div class="footer-logo">
                            <a class="logo" href="#">
                                <img src="{{asset('/img/logo.png')}}" alt="">
                            </a>
                        </div>
                        <!-- /footer logo -->

                        <p>We are a online product seller.</p>

                        <!-- footer social -->
                        <ul class="footer-social">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                        <!-- /footer social -->
                    </div>
                </div>
                <!-- /footer widget -->

                <!-- footer widget -->
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-header">My Account</h3>
                        <ul class="list-links-footer">
                            <li><a href="#">Checkout</a></li>
                            @guest
                            <li><a href="/login">Login</a></li>
                            @endguest
                        </ul>
                    </div>
                </div>
                <!-- /footer widget -->

                <div class="clearfix visible-sm visible-xs"></div>

                <!-- footer widget -->
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-header">Customer Service</h3>
                        <ul class="list-links-footer">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">FAQ</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /footer widget -->

                <!-- footer subscribe -->
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-header">Contact Us</h3>
                        <p>Please Contact Us for any query about our website in onnepa@gmail.com</p>
                        
                    </div>
                </div>
                <!-- /footer subscribe -->
            </div>
            <!-- /row -->
            <hr>
            <!-- row -->
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <!-- footer copyright -->
                    <div class="footer-copyright">
                        Copyright &copy;<script>
                        document.write(new Date().getFullYear());
                        </script> All rights reserved
                    </div>
                    <!-- /footer copyright -->
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </footer>
    <!-- /FOOTER -->

    <!-- jQuery Plugins -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/slick.min.js')}}"></script>
    <script src="{{asset('js/nouislider.min.js')}}"></script>
    <script src="{{asset('js/jquery.zoom.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <script type="text/javascript">
$(".update-cart").click(function(e) {
    e.preventDefault();

    var ele = $(this);

    $.ajax({
        url: '{{ url('update-cart') }}',
        method: "patch",
        data: {
            _token: '{{ csrf_token() }}',
            id: ele.attr("data-id"),
            quantity: ele.parents("tr").find(".quantity").val()
        },
        success: function(response) {
            window.location.reload();
        }
    });
});

$(".remove-from-cart").click(function(e) {
    e.preventDefault();

    var ele = $(this);

    if (confirm("Are you sure")) {
        $.ajax({
            url: '{{ url('remove-from-cart ') }}',
            method: "DELETE",
            data: {
                _token: '{{ csrf_token() }}',
                id: ele.attr("data-id")
            },
            success: function(response) {
                window.location.reload();
            }
        });
    }
});
</script>
    

</body>

</html>