<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{!! asset('theme_components/admin/dist/img/user2-160x160.jpg') !!}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="{!! url('#') !!}"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>


        <!-- search form -->
        <form action="{!! url('#') !!}" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->


        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class=" ">
                <a href="{!! url('#') !!}">
                    <i class="fa fa-dashboard"></i> <span>{{ trans('sidebar.dashboard') }}</span>
                </a>

            </li>
            <li class="treeview">
                <a href="{!! url('#') !!}">
                    <i class="fa fa-user"></i> <span>{{ trans('sidebar.roles') }}</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{!! url('role/list') !!}"><i class="fa fa-users"></i> {{ trans('sidebar.role-list') }}</a></li>
                    <li class="active"><a href="{!! url('role/add') !!}"><i class="fa fa-plus"></i> {{ trans('sidebar.role-create') }}</a></li>
                    <li class="active"><a href="{!! url('role/assign') !!}"><i class="fa fa-plus"></i> {{ trans('sidebar.role-assign') }}</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="{!! url('#') !!}">
                    <i class="fa fa-user"></i> <span>{{ trans('sidebar.permissions') }}</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{!! url('permission/list') !!}"><i class="fa fa-users"></i> {{ trans('sidebar.permission-list') }}</a></li>
                    <li class="active"><a href="{!! url('permission/add') !!}"><i class="fa fa-plus"></i> {{ trans('sidebar.permission-create') }}</a></li>
                    <li class="active"><a href="{!! url('permission/assign') !!}"><i class="fa fa-plus"></i> {{ trans('sidebar.permission-assign') }}</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="{!! url('#') !!}">
                    <i class="fa fa-user"></i> <span>{{ trans('sidebar.admins') }}</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{!! url('admin/list') !!}"><i class="fa fa-users"></i> {{ trans('sidebar.admin-list') }}</a></li>
                    <li class="active"><a href="{!! url('admin/add') !!}"><i class="fa fa-plus"></i> {{ trans('sidebar.admin-create') }}</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="{!! url('#') !!}">
                    <i class="fa fa-user"></i> <span>{{ trans('sidebar.users') }}</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{!! url('user/list') !!}"><i class="fa fa-users"></i> {{ trans('sidebar.user-list') }}</a></li>
                    <li class="active"><a href="{!! url('user/add') !!}"><i class="fa fa-plus"></i> {{ trans('sidebar.user-create') }}</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="{!! url('#') !!}">
                    <i class="fa fa-user"></i> <span>{{ trans('sidebar.gender') }}</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{!! url('gender/list') !!}"><i class="fa fa-users"></i> {{ trans('sidebar.gender-list') }}</a></li>
                    <li class="active"><a href="{!! url('gender/add') !!}"><i class="fa fa-plus"></i> {{ trans('sidebar.gender-create') }}</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="{!! url('#') !!}">
                    <i class="fa fa-user"></i> <span>{{ trans('sidebar.religion') }}</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{!! url('religion/list') !!}"><i class="fa fa-users"></i> {{ trans('sidebar.religion-list') }}</a></li>
                    <li class="active"><a href="{!! url('religion/add') !!}"><i class="fa fa-plus"></i> {{ trans('sidebar.religion-create') }}</a></li>
                </ul>
            </li>
           {{-- <li class="treeview">
                <a href="{!! url('#') !!}">
                    <i class="fa fa-user"></i> <span>{{ trans('sidebar.cgroups') }}</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{!! url('cgroup/list') !!}"><i class="fa fa-users"></i> {{ trans('sidebar.cgroup-list') }}</a></li>
                    <li class="active"><a href="{!! url('cgroup/add') !!}"><i class="fa fa-plus"></i> {{ trans('sidebar.cgroup-create') }}</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="{!! url('#') !!}">
                    <i class="fa fa-user"></i> <span>{{ trans('sidebar.company') }}</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{!! url('company/list') !!}"><i class="fa fa-users"></i> {{ trans('sidebar.company-list') }}</a></li>
                    <li class="active"><a href="{!! url('company/add') !!}"><i class="fa fa-plus"></i> {{ trans('sidebar.company-create') }}</a></li>
                </ul>
            </li>--}}
            <li class="treeview">
                <a href="{!! url('#') !!}">
                    <i class="fa fa-user"></i> <span>{{ trans('sidebar.department') }}</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{!! url('department/list') !!}"><i class="fa fa-users"></i> {{ trans('sidebar.department-list') }}</a></li>
                    <li class="active"><a href="{!! url('department/add') !!}"><i class="fa fa-plus"></i> {{ trans('sidebar.department-create') }}</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="{!! url('#') !!}">
                    <i class="fa fa-files-o"></i>
                    <span>Layout Options</span>
                    <span class="label label-primary pull-right">4</span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{!! url('#') !!}"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
                    <li><a href="{!! url('#') !!}"><i class="fa fa-circle-o"></i> Boxed</a></li>
                    <li><a href="{!! url('#') !!}"><i class="fa fa-circle-o"></i> Fixed</a></li>
                    <li><a href="{!! url('#') !!}"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="{!! url('#') !!}">
                    <i class="fa fa-table"></i> <span>Tables</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{!! url('#') !!}"><i class="fa fa-circle-o"></i> Simple tables</a></li>
                    <li><a href="{!! url('#') !!}"><i class="fa fa-circle-o"></i> Data tables</a></li>
                </ul>
            </li>
            <li>
                <a href="{!! url('#') !!}">
                    <i class="fa fa-calendar"></i> <span>Calendar</span>
                    <small class="label pull-right bg-red">3</small>
                </a>
            </li>
            <li>
                <a href="{!! url('#') !!}">
                    <i class="fa fa-envelope"></i> <span>Mailbox</span>
                    <small class="label pull-right bg-yellow">12</small>
                </a>
            </li>

            <li><a href="{!! url('#') !!}"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
            <li class="header">LABELS</li>
            <li><a href="{!! url('#') !!}"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
            <li><a href="{!! url('#') !!}"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
            <li><a href="{!! url('#') !!}"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>