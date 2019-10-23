<nav class="navbar-mobile">
    <div class="container-fluid">
        <ul class="navbar-mobile__list list-unstyled">
            @if(Auth::user()->isAdmin())
            <li>
              <a href="{{ route('admin.dashboard') }}">
                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
            </li>
            <li>
              <a href="{{ url('') }}">
                <i class="fas fa-globe"></i>Go to website</a>
            </li>
            <li class="active has-sub">
                <a class="js-arrow" href="#">
                    <i class="fab fa-product-hunt"></i>Product</a>
                <ul class="list-unstyled navbar__sub-list js-sub-list">
                    <li>
                        <a href="{{ route('product.index') }}">Product</a>
                    </li>
                    <li>
                        <a href="index2.html">Category</a>
                    </li>
                </ul>
            </li>
            <li class="active has-sub">
                <a class="js-arrow" href="#">
                    <i class="fas fa-file-alt"></i>Order</a>
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
                    <i class="fas fa-users"></i>User
                  </a>
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
                  <i class="fas fa-tachometer-alt"></i>Dashboard</a>
              </li>
              <li class="active has-sub">
                  <a class="js-arrow" href="#">
                      <i class="fab fa-product-hunt"></i>Product</a>
                  <ul class="list-unstyled navbar__sub-list js-sub-list">
                      <li>
                          <a href="{{ route('product.index') }}">Product</a>
                      </li>
                      <li>
                          <a href="index2.html">Category</a>
                      </li>
                  </ul>
              </li>
              <li class="active has-sub">
                  <a class="js-arrow" href="#">
                      <i class="fas fa-file-alt"></i>Order</a>
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
                      <i class="fas fa-users"></i>User
                    </a>
              </li>
              @else
              <li>
                <a href="{{ route('user.dashboard') }}">
                  <i class="fas fa-tachometer-alt"></i>Dashboard</a>
              </li>
              <li>
                  <a href="{{ route('order.index_user') }}">
                      <i class="fas fa-file-alt"></i>Order
                    </a>
              </li>
              @endif
              <li>
                <a href="{{ url('') }}">
                  <i class="fas fa-globe"></i>Go to website</a>
              </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->
