{{-- Side Navigation --}}
<div class="col-md-2">
    <div class="sidebar content-box" style="display: block;">
        <ul class="nav">

            <!-- Main menu -->
            <li class="current"><a href="/home"><i class="glyphicon glyphicon-home"></i>
                    Dashboard</a>
            </li>

            <li class="submenu">
                <a href="#">
                    <i class="glyphicon glyphicon-list"></i> Category
                    <span class="caret pull-right"></span>
                </a>
                <!-- Sub menu -->
                <ul>
                    <li><a href="{{ route('backend.category.index') }}">Category List</a></li>
                </ul>
            </li>

            <li class="submenu">
                <a href="#">
                    <i class="glyphicon glyphicon-list"></i> Products
                    <span class="caret pull-right"></span>
                </a>
                <!-- Sub menu -->
                <ul>
                    <li><a href="{{ route('backend.product.index') }}">Product List</a></li>
                </ul>
            </li>

            <li class="submenu">
                <a href="#">
                    <i class="glyphicon glyphicon-list"></i> Orders
                    <span class="caret pull-right"></span>
                </a>

                <!-- Sub menu -->
                <ul>
                    
                    <li><a href="{{ route('checkout.index') }}">All Orders</a></li>
                </ul>

            </li>

            <!-- <li>
                <a href="{{ route('register') }}">
                    <i class="glyphicon glyphicon-book"></i> Register    
                </a>
            </li> -->

            <li>
                <a href="{{ route('backend.user.index') }}">
                    <i class="glyphicon glyphicon-user"></i> User    
                </a>
            </li>
                     
               
        </ul>
    </div>
</div> <!-- ADMIN SIDE NAV-->