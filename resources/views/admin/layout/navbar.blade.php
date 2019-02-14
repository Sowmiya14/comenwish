<nav class="navbar navbar-expand-lg bb-1 navbar-light bg-white fixed-top" id="mainNav">

    <!-- Start Header -->
    <header class="header-logo bg-white bb-1 br-1">
        <a class="nav-link text-center mr-lg-3 hidden-xs" id="sidenavToggler"><i class="ti-align-left"></i></a>
        <a class="gredient-cl navbar-brand" href="{{url('/admin/home')}}">{{ \App\Helpers\Helper::sitesetting()[0]->brandname  }}</a>
    </header>
    <!-- End Header -->

    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="ti-align-left"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarResponsive">

        <!-- =============== Start Side Menu ============== -->
        <div class="navbar-side">
            <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">

                <li class="nav-item @yield('dashboard')" data-toggle="tooltip" data-placement="right" title="Projects">
                    <a class="nav-link" href="{{ url('/admin/home') }}">
                        <i class="ti i-cl-2 ti-dashboard"></i>
                        <span class="nav-link-text">Dashboard</span>
                    </a>
                </li>

                <!-- Master-->
                <li class="nav-item @yield('vendortype')" data-toggle="tooltip" data-placement="right" title="Dashboard">
                    <a class="nav-link" href="{{ url('/admin/master/vendor') }}"> 
                       <i class="ti i-cl-12 ti-settings"></i>
                        <span class="nav-link-text">Vendor Type </span>
                    </a>
                </li>
                <!-- End Master -->


                <!-- Start Advance Apps -->
                <li class="nav-item @yield('vendor')" data-toggle="tooltip" data-placement="right" title="Advance Apps">
                    <a class="nav-link " data-toggle="collapse" href="#advance-apps" data-parent="#exampleAccordion">
                        <i class="ti i-cl-9 ti ti-user"></i>
                        <span class="nav-link-text">Vendor</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="advance-apps">

                        <li>
                            <a href="{{ url('/admin/vendor/add') }}">Add Vendor</a>
                        </li>

                        <li>
                            <a href="{{ url('/admin/vendor/approve') }}">Pending Vendor Approval <span class="a-nav__link-badge a-badge a-badge--pink">{{ \App\Helpers\Helper::unApprovedCount()  }}</span></a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/vendor/vendortypeapprove') }}">Pending Vendor Type  Approval </a>
                        </li>

                        <li>
                            <a href="{{ url('/admin/vendor/blocked') }}">Blocked Vendors</a>
                        </li>

                        <li>
                            <a href="{{ url('/admin/vendor/') }}">View Vendor</a>
                        </li>
                        
                    </ul>

                </li>
                <li class="nav-item @yield('productpercentage')" data-toggle="tooltip" data-placement="right">
                    <a class="nav-link " data-toggle="collapse" href="#Dashboard" data-parent="#exampleAccordion">
                        <i class="ti i-cl-9 ti ti-shopping-cart"></i>
                        <span class="nav-link-text">Product Percentage</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="Dashboard">

                        <li>
                            <a href="{{ url('/admin/productpercentage/default') }}">Default Product Percentage</a>
                        </li>

                       <!--  <li>
                            <a href="#">Edit Product Percentage</a>
                        </li> -->
                    </ul>
                </li>
              <li class="nav-item @yield('sitesetting')" data-toggle="tooltip" data-placement="right" title="Dashboard">
                    <a class="nav-link" href="{{ url('/admin/sitesetting/sitesetting') }}"> 
                       <i class="ti i-cl-12 ti-settings"></i>
                        <span class="nav-link-text">Site Settings</span>
                    </a>
                </li>

                <!-- End Advance Apps -->

                <!-- Start projects -->
                <li class="nav-item @yield('products')" data-toggle="tooltip" data-placement="right">
                    <a class="nav-link " data-toggle="collapse" href="#Products" data-parent="#exampleAccordion">
                        <i class="ti i-cl-9 ti ti-shopping-cart"></i>
                        <span class="nav-link-text">Products</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="Products">

                        <li>
                            <a href="{{ url('/admin/product/add') }}">Add Products</a>
                        </li>
                    </ul>
                </li>


                 <li class="nav-item @yield('types')" data-toggle="tooltip" data-placement="right">
                    <a class="nav-link " data-toggle="collapse" href="#Types" data-parent="#exampleAccordion">
                        <i class="ti i-cl-9 ti ti-shopping-cart"></i>
                        <span class="nav-link-text">Types</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="Types">

                        <li>
                            <a href="{{ url('/admin/types/add') }}">Add Types</a>
                        </li>
                    </ul>
                </li>



                <li class="nav-item @yield('events')" data-toggle="tooltip" data-placement="right">
                    <a class="nav-link " data-toggle="collapse" href="#Events" data-parent="#exampleAccordion">
                        <i class="ti i-cl-9 ti ti-calendar"></i>
                        <span class="nav-link-text">Events</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="Events">

                        <li>
                            <a href="{{ url('/admin/event/add') }}">Add Event</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>

       
    
    


        <!-- =============== End Side Menu ============== -->

        <!-- =============== Search Bar ============== -->
        <!-- <ul class="navbar-nav ml-left">
            <li class="nav-item">
                <form class="form-inline my-2 my-lg-0 mr-lg-2">
                    <div class="input-group">
						<span class="input-group-btn">
							<button class="btn btn-primary" type="button">
							  <i class="ti-search"></i>
							</button>
						</span>
                        <input class="form-control" type="text" placeholder="Type In TO Search">
                    </div>
                </form>
            </li>
        </ul> -->
        <!-- =============== End Search Bar ============== -->

        <!-- =============== Header Rightside Menu ============== -->
        @include('admin.layout.user_nav')
        <!-- =============== End Header Rightside Menu ============== -->
    </div>
</nav>
