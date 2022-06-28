<header id="navbar">
    <div id="navbar-container" class="boxed">

        <!--Brand logo & name-->
        <!--================================-->
        <div class="navbar-header">
            <a href="{{url('/admin')}}" class="navbar-brand">
                <img src="{{ asset('backend/img/logo.png') }}" alt="Nifty Logo" class="brand-icon">
                <div class="brand-title">
                    <span class="brand-text">Backend</span>
                </div>
            </a>
        </div>
        <!--================================-->
        <!--End brand logo & name-->


        <!--Navbar Dropdown-->
        <!--================================-->
        <div class="navbar-content clearfix">
            <ul class="nav navbar-top-links pull-left">

                <!--Navigation toogle button-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <li class="tgl-menu-btn">
                    <a class="mainnav-toggle" href="#">
                        <i class="fa fa-navicon fa-lg"></i>
                    </a>
                </li>

                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End Navigation toogle button-->
                <li class="tgl-menu-btn">
                    <a  href="{{url('/')}}">
                        <button type="button" class="btn btnBackHome">
                            Home
                        </button>
                    </a>
                </li>

                <!--Messages Dropdown-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                {{--  <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                        <i class="fa fa-envelope fa-lg"></i>
                        <span class="badge badge-header badge-warning">9</span>
                    </a>

                    <!--Message dropdown menu-->
                    <div class="dropdown-menu dropdown-menu-md with-arrow">
                        <div class="pad-all bord-btm">
                            <p class="text-lg text-muted text-thin mar-no">You have 3 messages.</p>
                        </div>
                        <div class="nano scrollable">
                            <div class="nano-content">
                                <ul class="head-list">

                                    <!-- Dropdown list-->
                                    <li>
                                        <a href="#" class="media">
                                            <div class="media-left">
                                                <img src="{{ asset('backend/img/av2.png') }}" alt="Profile Picture"
                                                    class="img-circle img-sm">
                                            </div>
                                            <div class="media-body">
                                                <div class="text-nowrap">Andy sent you a message</div>
                                                <small class="text-muted">15 minutes ago</small>
                                            </div>
                                        </a>
                                    </li>

                                    <!-- Dropdown list-->
                                    <li>
                                        <a href="#" class="media">
                                            <div class="media-left">
                                                <img src="{{ asset('backend/img/av4.png') }}" alt="Profile Picture"
                                                    class="img-circle img-sm">
                                            </div>
                                            <div class="media-body">
                                                <div class="text-nowrap">Lucy sent you a message</div>
                                                <small class="text-muted">30 minutes ago</small>
                                            </div>
                                        </a>
                                    </li>

                                    <!-- Dropdown list-->
                                    <li>
                                        <a href="#" class="media">
                                            <div class="media-left">
                                                <img src="{{ asset('backend/img/av3.png') }}" alt="Profile Picture"
                                                    class="img-circle img-sm">
                                            </div>
                                            <div class="media-body">
                                                <div class="text-nowrap">Jackson sent you a message</div>
                                                <small class="text-muted">40 minutes ago</small>
                                            </div>
                                        </a>
                                    </li>

                                    <!-- Dropdown list-->
                                    <li>
                                        <a href="#" class="media">
                                            <div class="media-left">
                                                <img src="{{ asset('backend/img/av6.png') }}" alt="Profile Picture"
                                                    class="img-circle img-sm">
                                            </div>
                                            <div class="media-body">
                                                <div class="text-nowrap">Donna sent you a message</div>
                                                <small class="text-muted">5 hours ago</small>
                                            </div>
                                        </a>
                                    </li>

                                    <!-- Dropdown list-->
                                    <li>
                                        <a href="#" class="media">
                                            <div class="media-left">
                                                <img src="{{ asset('backend/img/av4.png') }}" alt="Profile Picture"
                                                    class="img-circle img-sm">
                                            </div>
                                            <div class="media-body">
                                                <div class="text-nowrap">Lucy sent you a message</div>
                                                <small class="text-muted">Yesterday</small>
                                            </div>
                                        </a>
                                    </li>

                                    <!-- Dropdown list-->
                                    <li>
                                        <a href="#" class="media">
                                            <div class="media-left">
                                                <img src="{{ asset('backend/img/av3.png') }}" alt="Profile Picture"
                                                    class="img-circle img-sm">
                                            </div>
                                            <div class="media-body">
                                                <div class="text-nowrap">Jackson sent you a message</div>
                                                <small class="text-muted">Yesterday</small>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!--Dropdown footer-->
                        <div class="pad-all bord-top">
                            <a href="#" class="btn-link text-dark box-block">
                                <i class="fa fa-angle-right fa-lg pull-right"></i>Show All Messages
                            </a>
                        </div>
                    </div>
                </li>  --}}
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End message dropdown-->




                <!--Notification dropdown-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <li class="dropdown">
                    <a href="{{url('admin/show-alert')}}" class="dropdown-toggle">
                        <i class="fa fa-bell fa-lg"></i>
                        <span class="badge badge-header badge-danger"></span>
                    </a>

                    <!--Notification dropdown menu-->
                    {{--  <div class="dropdown-menu dropdown-menu-md with-arrow">
                        <div class="pad-all bord-btm">
                            <p class="text-lg text-muted text-thin mar-no">Bạn có 3 tin nhắn.</p>
                        </div>
                        <div class="nano scrollable">
                            <div class="nano-content">
                                <ul class="head-list">
                                    <!-- Dropdown list-->
                                    <li>
                                        <a href="#" class="media">
                                            <div class="media-left">
                                                <span class="icon-wrap icon-circle bg-primary">
                                                    <i class="fa fa-comment fa-lg"></i>
                                                </span>
                                            </div>
                                            <div class="media-body">
                                                <div class="text-nowrap">New comments waiting approval</div>
                                                <small class="text-muted">15 minutes ago</small>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- Dropdown list-->
                                    <li>
                                        <a href="#" class="media">
                                            <div class="media-left">
                                                <span class="icon-wrap icon-circle bg-primary">
                                                    <i class="fa fa-comment fa-lg"></i>
                                                </span>
                                            </div>
                                            <div class="media-body">
                                                <div class="text-nowrap">New comments waiting approval</div>
                                                <small class="text-muted">15 minutes ago</small>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- Dropdown list-->
                                    <li>
                                        <a href="#" class="media">
                                            <div class="media-left">
                                                <span class="icon-wrap icon-circle bg-primary">
                                                    <i class="fa fa-comment fa-lg"></i>
                                                </span>
                                            </div>
                                            <div class="media-body">
                                                <div class="text-nowrap">New comments waiting approval</div>
                                                <small class="text-muted">15 minutes ago</small>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!--Dropdown footer-->
                        <div class="pad-all bord-top">
                            <a href="#" class="btn-link text-dark box-block">
                                <i class="fa fa-angle-right fa-lg pull-right"></i>Hiển thị tất cả thông báo
                            </a>
                        </div>
                    </div>  --}}
                </li>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End notifications dropdown-->



                <!--Mega dropdown-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <li class="mega-dropdown">
                    <a href="#" class="mega-dropdown-toggle">
                        <i class="fa fa-th-large fa-lg"></i>
                    </a>
                    <div class="dropdown-menu mega-dropdown-menu">
                        <div class="clearfix">
                            <div class="col-sm-12 col-md-3">

                                <!--Mega menu widget-->
                                <div class="text-center bg-purple pad-all">
                                    <h3 class="text-thin mar-no">Weekend shopping</h3>
                                    <div class="pad-ver box-inline">
                                        <span class="icon-wrap icon-wrap-lg icon-circle bg-trans-light">
                                            <i class="fa fa-shopping-cart fa-4x"></i>
                                        </span>
                                    </div>
                                    <p class="pad-btm">
                                        Members get <span class="text-lg text-bold">50%</span> more points. Lorem
                                        ipsum dolor sit amet!
                                    </p>
                                    <a href="#" class="btn btn-purple">Learn More...</a>
                                </div>

                            </div>
                            <div class="col-sm-4 col-md-3">

                                <!--Mega menu list-->
                                <ul class="list-unstyled">
                                    <li class="dropdown-header">Pages</li>
                                    <li><a href="#">Profile</a></li>
                                    <li><a href="#">Search Result</a></li>
                                    <li><a href="#">FAQ</a></li>
                                    <li><a href="#">Sreen Lock</a></li>
                                    <li><a href="#" class="disabled">Disabled</a></li>
                                    <li class="divider"></li>
                                    <li class="dropdown-header">Icons</li>
                                    <li><a href="#"><span class="pull-right badge badge-purple">479</span> Font
                                            Awesome</a></li>
                                    <li><a href="#">Skycons</a></li>
                                </ul>

                            </div>
                            {{--  <div class="col-sm-4 col-md-3">

                                <!--Mega menu list-->
                                <ul class="list-unstyled">
                                    <li class="dropdown-header">Mailbox</li>
                                    <li><a href="#"><span class="pull-right label label-danger">Hot</span>Indox</a>
                                    </li>
                                    <li><a href="#">Read Message</a></li>
                                    <li><a href="#">Compose</a></li>
                                    <li class="divider"></li>
                                    <li class="dropdown-header">Featured</li>
                                    <li><a href="#">Smart navigation</a></li>
                                    <li><a href="#"><span class="pull-right badge badge-success">6</span>Exclusive
                                            plugins</a></li>
                                    <li><a href="#">Lot of themes</a></li>
                                    <li><a href="#">Transition effects</a></li>
                                </ul>

                            </div>  --}}
                            <div class="col-sm-8 col-md-6">

                                <!--Mega menu list-->
                                <ul class="list-unstyled">
                                    <li class="dropdown-header">Gửi thông báo đến tất cả admin</li>
                                    <li>
                                        <form id="frmSendAlert" role="form" class="form">
                                            <div class="form-group">
                                                <label class="dropdown"
                                                    for="demo-megamenu-input">Tiêu đề</label>
                                                <input name="titleAlert" id="titleAlert" type="text"
                                                    placeholder="Nhập tiêu đề" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="dropdown"
                                                    for="demo-megamenu-input">Nội dung</label>
                                                <textarea name="contentAlert" style="max-width: 290px;min-width: 290px;" id="contentAlert"  type="text"
                                                    placeholder="Nhập nội dung" class="form-control"></textarea>
                                            </div>
                                            <button class="btn btn-primary btn-block" id="btnSend" type="button">Gửi</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End mega dropdown-->

            </ul>
            <ul class="nav navbar-top-links pull-right">

                <!--Language selector-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                {{--  <li class="dropdown">
                    <a id="demo-lang-switch" class="lang-selector dropdown-toggle" href="#" data-toggle="dropdown">
                        <span class="lang-selected">
                            <img class="lang-flag" src="{{ asset('backend/img/flags/united-kingdom.png') }}"
                                alt="English">
                            <span class="lang-id">EN</span>
                            <span class="lang-name">English</span>
                        </span>
                    </a>

                    <!--Language selector menu-->
                    <ul class="head-list dropdown-menu with-arrow">
                        <li>
                            <!--English-->
                            <a href="#" class="active">
                                <img class="lang-flag"
                                    src="{{ asset('backend/img/flags/united-kingdom.png') }}" alt="English">
                                <span class="lang-id">EN</span>
                                <span class="lang-name">English</span>
                            </a>
                        </li>
                        <li>
                            <!--France-->
                            <a href="#">
                                <img class="lang-flag" src="{{ asset('backend/img/flags/france.png') }}"
                                    alt="France">
                                <span class="lang-id">FR</span>
                                <span class="lang-name">Fran&ccedil;ais</span>
                            </a>
                        </li>
                        <li>
                            <!--Germany-->
                            <a href="#">
                                <img class="lang-flag" src="{{ asset('backend/img/flags/germany.png') }}"
                                    alt="Germany">
                                <span class="lang-id">DE</span>
                                <span class="lang-name">Deutsch</span>
                            </a>
                        </li>
                        <li>
                            <!--Italy-->
                            <a href="#">
                                <img class="lang-flag" src="{{ asset('backend/img/flags/italy.png') }}"
                                    alt="Italy">
                                <span class="lang-id">IT</span>
                                <span class="lang-name">Italiano</span>
                            </a>
                        </li>
                        <li>
                            <!--Spain-->
                            <a href="#">
                                <img class="lang-flag" src="{{ asset('backend/img/flags/spain.png') }}"
                                    alt="Spain">
                                <span class="lang-id">ES</span>
                                <span class="lang-name">Espa&ntilde;ol</span>
                            </a>
                        </li>
                    </ul>
                </li>  --}}
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End language selector-->



                <!--User dropdown-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <li id="dropdown-user" class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                        <span class="pull-right">
                            <img class="img-circle img-user media-object" src="{{ !empty(Session::get('logged_in_admin')['avatar'])?
                                                    asset('User/'. Session::get('logged_in_admin')['avatar']):asset('backend/img/av1.png') }}"
                                alt="Profile Picture">
                        </span>
                        <div class="username hidden-xs">{{Session::get('logged_in_admin')['name'] ?? 'Trống'}}</div>
                    </a>


                    <div class="dropdown-menu dropdown-menu-right with-arrow panel-default">

                        {{--  <!-- Dropdown heading  -->
                        <div class="pad-all bord-btm">
                            <p class="text-lg text-muted text-thin mar-btm">750Gb of 1,000Gb Used</p>
                            <div class="progress progress-sm">
                                <div class="progress-bar" style="width: 70%;">
                                    <span class="sr-only">70%</span>
                                </div>
                            </div>
                        </div>  --}}


                        <!-- User dropdown menu -->
                        <ul class="head-list">
                            <li>
                                <a href="{{url('admin/edit-profile-me')}}">
                                    <i class="fa fa-user fa-fw fa-lg"></i> Thông tin cá nhân
                                </a>
                            </li>
                            <li>
                                <a href="{{url('admin/change-password')}}">
                                    <i class="fa fa-lock fa-fw fa-lg"></i> Thay đổi mật khẩu
                                </a>
                            </li>
                            <li>
                                <a href="{{url('admin/lock-screen')}}">
                                    <i class="fa fa-lock fa-fw fa-lg"></i> Lock screen
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="badge badge-danger pull-right">9</span>
                                    <i class="fa fa-envelope fa-fw fa-lg"></i> Thông báo
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="label label-success pull-right">New</span>
                                    <i class="fa fa-gear fa-fw fa-lg"></i> Settings
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-question-circle fa-fw fa-lg"></i> Help
                                </a>
                            </li>
                        </ul>

                        <!-- Dropdown footer -->
                        <div class="pad-all text-right">
                            <form action="{{url('admin/logout')}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-sign-out fa-fw"></i> Đăng xuất
                                </button>
                            </form>
                        </div>
                    </div>
                </li>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End user dropdown-->

            </ul>
        </div>
        <!--================================-->
        <!--End Navbar Dropdown-->

    </div>
</header>
