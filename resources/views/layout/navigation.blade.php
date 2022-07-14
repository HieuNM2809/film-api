<!--MAIN NAVIGATION-->
<!--===================================================-->
<nav id="mainnav-container">
    <div id="mainnav">

        <!--Shortcut buttons-->
        <!--================================-->
        {{--  <div id="mainnav-shortcut">
            <ul class="list-unstyled">
                <li class="col-xs-4" data-content="Additional Sidebar">
                    <a id="demo-toggle-aside" class="shortcut-grid" href="#">
                        <i class="fa fa-magic"></i>
                    </a>
                </li>
                <li class="col-xs-4" data-content="Notification">
                    <a id="demo-alert" class="shortcut-grid" href="#">
                        <i class="fa fa-bullhorn"></i>
                    </a>
                </li>
                <li class="col-xs-4" data-content="Page Alerts">
                    <a id="demo-page-alert" class="shortcut-grid" href="#">
                        <i class="fa fa-bell"></i>
                    </a>
                </li>
            </ul>
        </div>  --}}
        <!--================================-->
        <!--End shortcut buttons-->

        @php
           $controllerName = $controllerName??'';
        @endphp
        <!--Menu-->
        <!--================================-->
        <div id="mainnav-menu-wrap">
            <div class="nano">
                <div class="nano-content">
                    <ul id="mainnav-menu" class="list-group">

                        <!--Category name-->
                        <li class="list-header">Navigation</li>

                        <!--Menu list item-->
                        <li  class="{{ Request::is('admin') ? 'active-link' : '' }}"  >
                            <a href="{{url('admin')}}">
                                <i class="fa fa-dashboard"></i>
                                <span class="menu-title">
                                    <strong>Trang chủ</strong>
                                    {{--  <span class="label label-success pull-right">Top</span>  --}}
                                </span>
                            </a>
                        </li>
                        <!--Menu list item-->
                        <li  class="{{ Request::is('admin/send-mail') ? 'active-link' : '' }}"  >
                            <a href="{{url('admin/send-mail')}}">
                                <i class="fa-solid fa-rectangle-ad"></i>
                                <span class="menu-title">
                                    <strong>Gửi quảng cáo</strong>
                                    <span class="label label-success pull-right">New</span>
                                </span>
                            </a>
                        </li>
                        <!--Menu list item-->
                        <li  class="{{ Request::is('admin/send-message') ? 'active-link' : '' }}"  >
                            <a href="{{url('admin/send-message')}}">
                                <i class="fa-solid fa-message"></i>
                                <span class="menu-title">
                                    <strong>Nhắn tin nội bộ</strong>
                                    <span class="label label-success pull-right">New</span>
                                </span>
                            </a>
                        </li>
                         <!-- Quản lý User-->
                         <li class="{!! (in_array($controllerName, ['UserController2'])) ? 'active-sub active' : '' !!}">
                            <a href="#">
                                <i class="fa fa-user"></i>
                                <span class="menu-title">
                                    <strong>Quản lý người dùng</strong>
                                </span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse {!! (in_array($controllerName, ['UserController2'])) ? 'in' : '' !!}">
                                <li class="{{ Request::is('admin/user-v2') ? 'active-link' : '' }}"><a href="{{url('admin/user-v2')}}">Danh sách người dùng</a></li>
                            </ul>
                        </li>
                        <!-- Quản lý icon rank-->
                        <li class="{!! (in_array($controllerName, ['IconRankController'])) ? 'active-sub active' : '' !!}">
                            <a href="#">
                                <i class="fas fa-code"></i>
                                <span class="menu-title">
                                    <strong>Quản lý danh hiệu</strong>
                                </span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse {!! (in_array($controllerName, ['IconRankController'])) ? 'in' : '' !!}">
                                <li class="{{ Request::is('admin/icon_rank') ? 'active-link' : '' }}"><a href="{{url('admin/icon_rank')}}">Danh sách danh hiệu</a></li>
                            </ul>
                        </li>
                        <!-- Quản lý title_type-->
                        <li class="{!! (in_array($controllerName, ['TitleTypeController'])) ? 'active-sub active' : '' !!}">
                            <a href="#">
                                <i class="fas fa-heading"></i>
                                <span class="menu-title">
                                    <strong>Quản lý danh hiệu</strong>
                                </span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse {!! (in_array($controllerName, ['TitleTypeController'])) ? 'in' : '' !!}">
                                <li class="{{ Request::is('admin/title_type') ? 'active-link' : '' }}"><a href="{{url('admin/title_type')}}">Danh sách danh hiệu</a></li>
                            </ul>
                        </li>
                        <!-- Quản lý hashtag-->
                        <li class="{!! (in_array($controllerName, ['HashtagController'])) ? 'active-sub active' : '' !!}">
                            <a href="#">
                                <i class="fas fa-hashtag"></i>
                                <span class="menu-title">
                                    <strong>Quản lý hashtag</strong>
                                </span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse {!! (in_array($controllerName, ['HashtagController'])) ? 'in' : '' !!}">
                                <li class="{{ Request::is('admin/hashtag') ? 'active-link' : '' }}"><a href="{{url('admin/hashtag')}}">Danh sách hashtag</a></li>
                            </ul>
                        </li>
                        <!-- Quản lý group_permission-->
                        <li class="{!! (in_array($controllerName, ['GroupPermissionController'])) ? 'active-sub active' : '' !!}">
                            <a href="#">
                                <i class="fas fa-layer-group"></i>
                                <span class="menu-title">
                                    <strong>Quản lý nhóm quyền</strong>
                                </span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse {!! (in_array($controllerName, ['GroupPermissionController'])) ? 'in' : '' !!}">
                                <li class="{{ Request::is('admin/group_permission') ? 'active-link' : '' }}"><a href="{{url('admin/group_permission')}}">Danh sách nhóm quyền</a></li>
                            </ul>
                        </li>
                        <!-- Quản lý donate-->
                        <li class="{!! (in_array($controllerName, ['DonateController'])) ? 'active-sub active' : '' !!}">
                            <a href="#">
                                <i class="fas fa-donate"></i>
                                <span class="menu-title">
                                    <strong>Quản lý donate</strong>
                                </span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse {!! (in_array($controllerName, ['DonateController'])) ? 'in' : '' !!}">
                                <li class="{{ Request::is('admin/donate') ? 'active-link' : '' }}"><a href="{{url('admin/donate')}}">Danh sách donate</a></li>
                            </ul>
                        </li>
                        <!-- Quản lý credit_cart-->
                        <li class="{!! (in_array($controllerName, ['CreditCartController'])) ? 'active-sub active' : '' !!}">
                            <a href="#">
                                <i class="fas fa-credit-card"></i>
                                <span class="menu-title">
                                    <strong>Quản lý thẻ</strong>
                                </span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse {!! (in_array($controllerName, ['CreditCartController'])) ? 'in' : '' !!}">
                                <li class="{{ Request::is('admin/credit_cart') ? 'active-link' : '' }}"><a href="{{url('admin/credit_cart')}}">Danh sách thẻ</a></li>
                            </ul>
                        </li>
                        <!-- Quản lý Tổ chức-->
                        <li class="{!! (in_array($controllerName, ['OrganizationController'])) ? 'active-sub active' : '' !!}">
                            <a href="#">
                                <i class="fas fa-sitemap"></i>
                                <span class="menu-title">
                                    <strong>Quản lý Tổ chức</strong>
                                </span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse {!! (in_array($controllerName, ['OrganizationController'])) ? 'in' : '' !!}">
                                <li class="{{ Request::is('admin/organization') ? 'active-link' : '' }}"><a href="{{url('admin/organization')}}">Danh sách tổ chức</a></li>
                            </ul>
                        </li>
                        <!-- Quản lý comment-->
                        <li class="{!! (in_array($controllerName, ['CommentController'])) ? 'active-sub active' : '' !!}">
                            <a href="#">
                                <i class="fas fa-comment-alt"></i>
                                <span class="menu-title">
                                    <strong>Quản lý bình luận</strong>
                                </span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse {!! (in_array($controllerName, ['CommentController'])) ? 'in' : '' !!}">
                                <li class="{{ Request::is('admin/comment') ? 'active-link' : '' }}"><a href="{{url('admin/comment')}}">Danh sách bình luận</a></li>
                            </ul>
                        </li>
                        <!-- Quản lý permission-->
                        <li class="{!! (in_array($controllerName, ['PermissionController'])) ? 'active-sub active' : '' !!}">
                            <a href="#">
                                <i class="fas fa-lock"></i>
                                <span class="menu-title">
                                    <strong>Quản lý quyền</strong>
                                </span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse {!! (in_array($controllerName, ['PermissionController'])) ? 'in' : '' !!}">
                                <li class="{{ Request::is('admin/permission') ? 'active-link' : '' }}"><a href="{{url('admin/permission')}}">Danh sách quyền</a></li>
                            </ul>
                        </li>
                        {{-- <!-- Báo cáo-->
                        <li class="{!! (in_array($controllerName, ['ReportController'])) ? 'active-sub active' : '' !!}">
                            <a href="#">
                                <i class="fa fa-briefcase"></i>
                                <span class="menu-title">
                                    <strong>Báo cáo</strong>
                                </span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse {!! (in_array($controllerName, ['ReportController'])) ? 'in' : '' !!}">
                                <li class="{{ Request::is('admin/login-usage-history') ? 'active-link' : '' }}">
                                    <a href="{{url('admin/login-usage-history')}}">Lịch sử đăng nhập và sử dụng</a>
                                </li>
                                <li class="{{ Request::is('admin/agent-report-v2') ? 'active-link' : '' }}">
                                    <a href="{{url('admin/agent-report-v2')}}">Agent Report V2</a>
                                </li>
                            </ul>
                        </li>

                        <!--Cài đặt-->
                        <li  class="{!! (in_array($controllerName, ['SettingController'])) ? 'active-sub active' : '' !!}">
                            <a href="#">
                                <i class="fa fa-gear fa-fw fa-lg"></i>
                                <span class="menu-title">
                                    <strong>Cài đặt</strong>
                                </span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse {!! (in_array($controllerName, ['SettingController'])) ? 'in' : '' !!}">
                                <li class="{{ Request::is('admin/change-filter-condition') ? 'active-link' : '' }}"><a href="{{url('admin/change-filter-condition')}}">Thay đổi điều kiện lọc</a></li>
                            </ul>
                        </li> --}}
                        {{--  <!--Menu list item-->
                        <li>
                            <a href="widgets.html">
                                <i class="fa fa-flask"></i>
                                <span class="menu-title">
                                    <strong>Widgets</strong>
                                    <span class="pull-right badge badge-warning">9</span>
                                </span>
                            </a>
                        </li>

                        <li class="list-divider"></li>

                        <!--Category name-->
                        <li class="list-header">Components</li>

                        <!--Menu list item-->
                        <li>
                            <a href="#">
                                <i class="fa fa-briefcase"></i>
                                <span class="menu-title">UI Elements</span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse">
                                <li><a href="ui-buttons.html">Buttons</a></li>
                                <li><a href="ui-checkboxes-radio.html">Checkboxes &amp; Radio</a></li>
                                <li><a href="ui-panels.html">Panels</a></li>
                                <li><a href="ui-modals.html">Modals</a></li>
                                <li><a href="ui-progress-bars.html">Progress bars</a></li>
                                <li><a href="ui-components.html">Components</a></li>
                                <li><a href="ui-typography.html">Typography</a></li>
                                <li><a href="ui-list-group.html">List Group</a></li>
                                <li><a href="ui-tabs-accordions.html">Tabs &amp; Accordions</a></li>
                                <li><a href="ui-alerts-tooltips.html">Alerts &amp; Tooltips</a></li>
                                <li><a href="ui-helper-classes.html">Helper Classes</a></li>

                            </ul>
                        </li>

                        <!--Menu list item-->
                        <li>
                            <a href="#">
                                <i class="fa fa-edit"></i>
                                <span class="menu-title">Forms</span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse">
                                <li><a href="forms-general.html">General</a></li>
                                <li><a href="forms-components.html">Components</a></li>
                                <li><a href="forms-validation.html">Validation</a></li>
                                <li><a href="forms-wizard.html">Wizard</a></li>

                            </ul>
                        </li>

                        <!--Menu list item-->
                        <li>
                            <a href="#">
                                <i class="fa fa-table"></i>
                                <span class="menu-title">Tables</span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse">
                                <li><a href="tables-static.html">Static Tables</a></li>
                                <li><a href="tables-bootstrap.html">Bootstrap Tables</a></li>
                                <li><a href="tables-datatable.html">Data Tables<span
                                            class="label label-info pull-right">New</span></a></li>
                                <li><a href="tables-footable.html">Foo Tables<span
                                            class="label label-info pull-right">New</span></a></li>

                            </ul>
                        </li>

                        <!--Menu list item-->
                        <li>
                            <a href="charts.html">
                                <i class="fa fa-line-chart"></i>
                                <span class="menu-title">Charts</span>
                            </a>
                        </li>

                        <li class="list-divider"></li>

                        <!--Category name-->
                        <li class="list-header">Extra</li>

                        <!--Menu list item-->
                        <li>
                            <a href="#">
                                <i class="fa fa-plug"></i>
                                <span class="menu-title">
                                    Miscellaneous
                                    <span class="label label-mint pull-right">New</span>
                                </span>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse">
                                <li><a href="misc-calendar.html">Calendar</a></li>
                                <li><a href="misc-maps.html">Google Maps</a></li>

                            </ul>
                        </li>

                        <!--Menu list item-->
                        <li>
                            <a href="#">
                                <i class="fa fa-envelope"></i>
                                <span class="menu-title">Email</span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse">
                                <li><a href="mailbox.html">Inbox</a></li>
                                <li><a href="mailbox-message.html">View Message</a></li>
                                <li><a href="mailbox-compose.html">Compose Message</a></li>

                            </ul>
                        </li>

                        <!--Menu list item-->
                        <li>
                            <a href="#">
                                <i class="fa fa-file"></i>
                                <span class="menu-title">Pages</span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse">
                                <li><a href="pages-blank.html">Blank Page</a></li>
                                <li><a href="pages-profile.html">Profile</a></li>
                                <li><a href="pages-search-results.html">Search Results</a></li>
                                <li><a href="pages-timeline.html">Timeline<span
                                            class="label label-info pull-right">New</span></a></li>
                                <li><a href="pages-faq.html">FAQ</a></li>
                                <li class="list-divider"></li>
                                <li><a href="pages-404.html">404 Error</a></li>
                                <li><a href="pages-500.html">500 Error</a></li>
                                <li class="list-divider"></li>
                                <li><a href="pages-login.html">Login</a></li>
                                <li><a href="pages-register.html">Register</a></li>
                                <li><a href="pages-password-reminder.html">Password Reminder</a></li>
                                <li><a href="pages-lock-screen.html">Lock Screen</a></li>

                            </ul>
                        </li>

                        <!--Menu list item-->
                        <li>
                            <a href="#">
                                <i class="fa fa-plus-square"></i>
                                <span class="menu-title">Menu Level</span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse">
                                <li><a href="#">Second Level Item</a></li>
                                <li><a href="#">Second Level Item</a></li>
                                <li><a href="#">Second Level Item</a></li>
                                <li class="list-divider"></li>
                                <li>
                                    <a href="#">Third Level<i class="arrow"></i></a>

                                    <!--Submenu-->
                                    <ul class="collapse">
                                        <li><a href="#">Third Level Item</a></li>
                                        <li><a href="#">Third Level Item</a></li>
                                        <li><a href="#">Third Level Item</a></li>
                                        <li><a href="#">Third Level Item</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Third Level<i class="arrow"></i></a>

                                    <!--Submenu-->
                                    <ul class="collapse">
                                        <li><a href="#">Third Level Item</a></li>
                                        <li><a href="#">Third Level Item</a></li>
                                        <li><a href="#">Third Level Item</a></li>
                                        <li class="list-divider"></li>
                                        <li><a href="#">Third Level Item</a></li>
                                        <li><a href="#">Third Level Item</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>  --}}

                    </ul>


                    <!--Widget-->
                    <!--================================-->
                    {{--  <div class="mainnav-widget">

                        <!-- Show the button on collapsed navigation -->
                        <div class="show-small">
                            <a href="#" data-toggle="menu-widget" data-target="#demo-wg-server">
                                <i class="fa fa-desktop"></i>
                            </a>
                        </div>

                        <!-- Hide the content on collapsed navigation -->
                        <div id="demo-wg-server" class="hide-small mainnav-widget-content">
                            <ul class="list-group">
                                <li class="list-header pad-no pad-ver">Server Status</li>
                                <li class="mar-btm">
                                    <span class="label label-primary pull-right">15%</span>
                                    <p>CPU Usage</p>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar progress-bar-primary" style="width: 15%;">
                                            <span class="sr-only">15%</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="mar-btm">
                                    <span class="label label-purple pull-right">75%</span>
                                    <p>Bandwidth</p>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar progress-bar-purple" style="width: 75%;">
                                            <span class="sr-only">75%</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="pad-ver"><a href="#" class="btn btn-success btn-bock">View
                                        Details</a></li>
                            </ul>
                        </div>
                    </div>  --}}
                    <!--================================-->
                    <!--End widget-->

                </div>
            </div>
        </div>
        <!--================================-->
        <!--End menu-->

    </div>
</nav>
<!--===================================================-->
<!--END MAIN NAVIGATION-->

<!--ASIDE-->

<!--===================================================-->
<!--END ASIDE-->
