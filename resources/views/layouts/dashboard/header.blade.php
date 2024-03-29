<!-- HEADER DESKTOP-->
<header class="header-desktop">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap">
                <form class="form-header" action="" method="POST">
                    <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                    <button class="au-btn--submit" type="submit">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                </form>
                <div class="header-button">
                    <div class="noti-wrap">

                        <div class="noti__item js-item-menu">
                            <i class="zmdi zmdi-notifications"></i>
                            <span class="quantity">3</span>
                            <div class="notifi-dropdown js-dropdown">
                                <div class="notifi__title">
                                    <p>You have 3 Notifications</p>
                                </div>
                                <div class="notifi__item">
                                    <div class="bg-c1 img-cir img-40">
                                        <i class="zmdi zmdi-email-open"></i>
                                    </div>
                                    <div class="content">
                                        <p>You got a email notification</p>
                                        <span class="date">April 12, 2018 06:50</span>
                                    </div>
                                </div>
                                <div class="notifi__item">
                                    <div class="bg-c2 img-cir img-40">
                                        <i class="zmdi zmdi-account-box"></i>
                                    </div>
                                    <div class="content">
                                        <p>Your account has been blocked</p>
                                        <span class="date">April 12, 2018 06:50</span>
                                    </div>
                                </div>
                                <div class="notifi__item">
                                    <div class="bg-c3 img-cir img-40">
                                        <i class="zmdi zmdi-file-text"></i>
                                    </div>
                                    <div class="content">
                                        <p>You got a new file</p>
                                        <span class="date">April 12, 2018 06:50</span>
                                    </div>
                                </div>
                                <div class="notifi__footer">
                                    <a href="#">All notifications</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">
                            <div class="image">
                                <img src="{{ (!\Auth::user()->photo) ? asset('img/profile/pict.png') : asset('img/profile/'. \Auth::user()->photo)  }}" alt="404" />
                            </div>
                            <div class="content">
                                <a class="js-acc-btn" href="#">{{ \Auth::user()->username }}</a>
                            </div>
                            <div class="account-dropdown js-dropdown">
                                <div class="info clearfix">
                                    <div class="image">
                                        <a href="#">
                                          <img src="{{ (!\Auth::user()->photo) ? asset('img/profile/pict.png') : asset('img/profile/'. \Auth::user()->photo)  }}" alt="404" />
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h5 class="name">
                                            <a href="#">{{ \Auth::user()->name }}</a>
                                        </h5>
                                        <span class="email">{{ \Auth::user()->email }}</span>
                                        <span class="font-weight">{{ \Auth::user()->role->role_name }}</span>
                                    </div>
                                </div>
                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        @if(Auth::user()->isAdmin())
                                        <a href="{{ route('admin.account') }}">
                                            <i class="zmdi zmdi-account"></i>Account</a>
                                        @else
                                        <a href="{{ route('user.account') }}">
                                            <i class="zmdi zmdi-account"></i>Account</a>
                                        @endif
                                    </div>
                                </div>

                                <div class="account-dropdown__footer">
                                 <a href="#" class="nav-link logout" href="{{ route('logout') }}"  onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
                                <i class="zmdi zmdi-power"></i>        Logout										</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
            </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- HEADER DESKTOP-->
