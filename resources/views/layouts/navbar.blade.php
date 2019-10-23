<!--::header part start::-->
<header class="main_menu home_menu">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="index.html"> <img src="{{ asset('img/logo.png') }}" alt="logo"> </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="menu_icon"><i class="fas fa-bars"></i></span>
                    </button>

                    <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('product.shop') }}">Shop</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                            </li>
                        </ul>
                    </div>
                    <div class="hearer_icon d-flex">
                        <div class="dropdown cart">
                          <a class="dropdown-toggle" href="{{ route('cart.index') }}">
                            <i class="fas fa-cart-plus" style="content: '2';"></i>
                          </a>

                        </div>
                        @if(!\Auth::check())
                        <a href="{{ route('login') }}" class="genric-btn success-border circle small">Sign in or Sign up</a>
                        @else
                        <div class="dropdown">
                          <a class="dropdown-toggle" href="#" id="navbarDropdown3" role="button"
                          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <h6 class="dropdown-header">{{ Auth::user()->username }}</h6>
                            @if(Auth::user()->isAdmin())
                              <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
                            @else
                              <a class="dropdown-item" href="{{ route('user.dashboard') }}">Dashboard</a>
                              <a class="dropdown-item" href="{{ route('order.index_user')}}">Order</a>
                            @endif
                            <a class="dropdown-item" href="{{ route('user.account') }}">Account</a>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"  onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                            </form>
                        </div>

                      </div>
                      @endif
                    </div>

                </nav>
            </div>
        </div>
    </div>
    <div class="search_input" id="search_input_box">
        <div class="container ">
            <form class="d-flex justify-content-between search-inner">
                <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                <button type="submit" class="btn"></button>
                <span class="ti-close" id="close_search" title="Close Search"></span>
            </form>
        </div>
    </div>
</header>
<!-- Header part end-->
