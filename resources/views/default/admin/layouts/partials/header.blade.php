<header class="main-header">

    <!-- Logo -->
    <a href="{!! url('#') !!}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>E</b>RP</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b>ERP</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="{!! url('#') !!}" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                {{--for choosing language start--}}
                <li class="dropdown user user-menu">
                    <a href="{!! url('#') !!}" class="dropdown-toggle" data-toggle="dropdown">

                        <span class="hidden-xs">{{ \Session::get('language')?\Session::get('language'):'Choose language' }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                       {{-- <li class="user-header">
                            <img src="{!! asset('theme_components/admin/dist/img/user2-160x160.jpg') !!}" class="img-circle" alt="User Image">
                            <p>
                                Alexander Pierce - Web Developer
                                <small>Member since Nov. 2012</small>
                            </p>
                        </li>--}}
                        <!-- Languages start -->
                        <li class="user-body">
                            <div class="col-xs-4 text-center">
                                    <a href="{!! url('lang/bn') !!}">{{ trans('language.bangla') }}</a>
                            </div>
                        </li>
                        <li class="user-body">
                            <div class="col-xs-4 text-center">
                                <a href="{!! url('lang/en') !!}">{{ trans('language.english') }}</a>
                            </div>
                        </li>
                        <!-- Languages end -->

                    </ul>
                </li>

                {{--for choosign language end--}}
                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <a href="{!! url('#') !!}" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success">4</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 4 messages</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">

                                @for($i=0; $i<4; $i++)
                                    <li><!-- start message -->
                                        <a href="{!! url('#') !!}">
                                            <div class="pull-left">
                                                <img src="{!! asset('theme_components/admin/dist/img/user2-160x160.jpg') !!}" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                Support Team
                                                <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li><!-- end message -->
                                @endfor


                            </ul>
                        </li>
                        <li class="footer"><a href="{!! url('#') !!}">See All Messages</a></li>
                    </ul>
                </li>
                <!-- Notifications: style can be found in dropdown.less -->
                <li class="dropdown notifications-menu">
                    <a href="{!! url('#') !!}" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">10</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 10 notifications</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                @for($i=0; $i<4; $i++)
                                    <li>
                                        <a href="{!! url('#') !!}">
                                            <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the page and may cause design problems
                                        </a>
                                    </li>
                                @endfor
                            </ul>
                        </li>
                        <li class="footer"><a href="{!! url('#') !!}">View all</a></li>
                    </ul>
                </li>
                <!-- Tasks: style can be found in dropdown.less -->
                <li class="dropdown tasks-menu">
                    <a href="{!! url('#') !!}" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-flag-o"></i>
                        <span class="label label-danger">9</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 9 tasks</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">

                                @for($i=0; $i<4; $i++)

                                    <li><!-- Task item -->
                                        <a href="{!! url('#') !!}">
                                            <h3>
                                                Design some buttons
                                                <small class="pull-right">20%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">20% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li><!-- end task item -->

                                @endfor

                            </ul>
                        </li>
                        <li class="footer">
                            <a href="{!! url('#') !!}">View all tasks</a>
                        </li>
                    </ul>
                </li>
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="{!! url('#') !!}" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{!! asset('theme_components/admin/dist/img/user2-160x160.jpg') !!}" class="user-image" alt="User Image">
                        <span class="hidden-xs">Alexander Pierce</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{!! asset('theme_components/admin/dist/img/user2-160x160.jpg') !!}" class="img-circle" alt="User Image">
                            <p>
                                Alexander Pierce - Web Developer
                                <small>Member since Nov. 2012</small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">

                            @for($i=0; $i<4; $i++)

                                <div class="col-xs-4 text-center">
                                    <a href="{!! url('#') !!}">Followers</a>
                                </div>

                            @endfor

                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ url('auth/signout') }}" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="{!! url('#') !!}" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>

    </nav>
</header>