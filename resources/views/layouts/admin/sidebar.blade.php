<nav class="navbar-mobile">
    <div class="container-fluid">
        <ul class="navbar-mobile__list list-unstyled">
            <li class="has-sub">
                <a class="js-arrow" href="#">
                    <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                    <li>
                        <a href="index.html">Dashboard 1</a>
                    </li>
                    <li>
                        <a href="index2.html">Dashboard 2</a>
                    </li>
                    <li>
                        <a href="index3.html">Dashboard 3</a>
                    </li>
                    <li>
                        <a href="index4.html">Dashboard 4</a>
                    </li>
                </ul>
            </li>
            @if(Auth::user()->isAdmin())
            <li>
                <a href="{{ route('product.index') }}">
                    <i class="fas fa-chart-bar"></i>Products</a>
            </li>
            @endif
        </ul>
    </div>
</nav>
</header>
<!-- END HEADER MOBILE-->


<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img src="images/icon/logo.png" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="active has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="index.html">Dashboard 1</a>
                        </li>
                        <li>
                            <a href="index2.html">Dashboard 2</a>
                        </li>
                        <li>
                            <a href="index3.html">Dashboard 3</a>
                        </li>
                        <li>
                            <a href="index4.html">Dashboard 4</a>
                        </li>
                    </ul>
                </li>
                @if(Auth::user()->isAdmin())
                <li>
                    <a href="{{ route('product.index') }}">
                        <i class="fas fa-chart-bar"></i>Products</a>
                </li>

                <li class="active has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-tachometer-alt"></i>Order</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="index.html">Record Order</a>
                        </li>
                        <li>
                            <a href="index2.html">Order Index</a>
                        </li>
                    </ul>
                </li>
                @endif

            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->
