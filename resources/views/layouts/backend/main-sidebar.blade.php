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
                    <li>
                        <a href="{{route('categories.index')}}"><i class="ti-menu-alt"></i><span class="right-nav-text"> {{__('backend/main-sidebar.Categories')}}</a>
                    </li>


                    <!-- menu item product-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#product">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">products</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="product" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('products.index')}}">product</a> </li>

                        </ul>
                    </li>
                    <!-- menu item invoice-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#invoice">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">invoices</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="invoice" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('invoice.index')}}">invoices</a> </li>
                            <li> <a href="{{route('invoice.create')}}">add invoice</a> </li>
                        </ul>

                    </li>



                </ul>

            </div>

        </div>

        <!-- Left Sidebar End-->
    </div>
</div>
