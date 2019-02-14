<nav class="navbar navbar-expand-lg bb-1 navbar-light bg-white fixed-top" id="mainNav">

    <!-- Start Header -->
    <header class="header-logo bg-white bb-1 br-1">
        <a class="nav-link text-center mr-lg-3 hidden-xs" id="sidenavToggler"><i class="ti-align-left"></i></a>
        <a class="gredient-cl navbar-brand" href="{{url('/vendor/home')}}">Come N Wish</a>
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
                    <a class="nav-link" href="{{ url('/vendor/') }}">
                        <i class="ti i-cl-2 ti-dashboard"></i>
                        <span class="nav-link-text">Dashboard</span>
                    </a>
                </li>

                <!-- Start Dashboard-->
                <li class="nav-item @yield('master')" data-toggle="tooltip" data-placement="right" title="Dashboard">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#Dashboard" data-parent="#exampleAccordion">
                        <i class="ti i-cl-12 ti-settings"></i>
                        <span class="nav-link-text">Products</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="Dashboard">
                         <li>
                            <a href="{{ url('/vendor/products/add') }}">Add Product</a>
                        </li>
                        <li>
                            <a href="{{ url('/vendor/products/view') }}">View Products</a>
                        </li>


                    </ul>
                </li>
                <!-- End Dashboard -->

            </ul>
        </div>
        <!-- =============== End Side Menu ============== -->

        <!-- =============== Search Bar ============== -->
        
        <!-- =============== End Search Bar ============== -->

        <!-- =============== Header Rightside Menu ============== -->
        @include('vendor.layout.user_nav')
        <!-- =============== End Header Rightside Menu ============== -->
    </div>
</nav>