<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">

                    <!-- Home-->
                    <li>
                        <a href="{{route('dashboard')}}"><i class="ti-home"></i><span class="right-nav-text">{{__('backend/main-sidebar.dashboard')}}</span> </a>
                    </li>

{{--                    Categorie--}}
                    @can('show-Categories')
                    <li>
                        <a href="{{route('categories.index')}}"><i class="ti-menu-alt"></i><span class="right-nav-text"> {{__('backend/main-sidebar.Categories')}}</a>
                    </li>
                @endcan

                    <!-- menu item product-->
                    @can('show-products')
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#product">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{__('backend/main-sidebar.products')}}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="product" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('products.index')}}">{{__('backend/main-sidebar.products')}}</a> </li>

                        </ul>
                    </li>
                @endcan
                    <!-- menu item invoice-->
                   @can('show-invoices')
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#invoice">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{__('backend/main-sidebar.invoices')}}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="invoice" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('invoice.index')}}">{{__('backend/main-sidebar.invoices')}}</a> </li>

                        </ul>

                    </li>
                @endcan
                    <!-- menu users-->

                    <li>

                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#users">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{__('backend/main-sidebar.users')}}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="users" class="collapse" data-parent="#sidebarnav">
                            @can('show-users')
                            <li> <a href="{{route('users.index')}}"> {{__('backend/main-sidebar.users')}}</a> </li>
                            @endcan
                            @can('role-list')
                            <li> <a href="{{route('roles.index')}}">{{__('backend/main-sidebar.roles')}}</a> </li>
                            @endcan

                        </ul>

                    </li>

                    </li>



                </ul>

            </div>

        </div>

        <!-- Left Sidebar End-->
    </div>
</div>
