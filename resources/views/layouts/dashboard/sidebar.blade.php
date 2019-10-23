<nav class="navbar-mobile">
    <div class="container-fluid">
        <ul class="navbar-mobile__list list-unstyled">
            @if(Auth::user()->isAdmin())
            <li>
              <a href="{{ route('admin.dashboard') }}">
                <i class="fas fa-chart-bar"></i>Dashboard</a>
              </li>
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
            <li>
                <a href="{{ route('user.indexadmin') }}">
                    <i class="fas fa-chart-bar"></i>User</a>
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
            <img src="{{ asset('img/icon/logo.png') }}" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">

              @if(Auth::user()->isAdmin())
              <li>
                <a href="{{ route('admin.dashboard') }}">
                  <i class="fas fa-chart-bar"></i>Dashboard</a>
                </li>
              <li>
                  <a href="{{ route('product.index') }}">
                      <i class="fas fa-chart-bar"></i>Products</a>
              </li>
              <li class="active has-sub">
                  <a class="js-arrow" href="#">
                      <i class="fas fa-tachometer-alt"></i>Order</a>
                  <ul class="list-unstyled navbar__sub-list js-sub-list">
                      <li>
                          <a href="{{ route('order.record') }}">Record Order</a>
                      </li>
                      <li>
                          <a href="{{ route('order.index') }}">Order Index</a>
                      </li>
                  </ul>
              </li>
              <li>
                  <a href="{{ route('user.indexadmin') }}">
                      <i class="fas fa-chart-bar"></i>Users</a>
              </li>
              @endif

            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->
