@if(Auth::user()->verified == 0)
    <script>window.location = "/vendor/not_approved";</script>
@endif

@if(Auth::user()->verified == 2)
    <script>window.location = "/vendor/blocked";</script>
@endif

@if(Auth::user()->phonenumberverified == 0)
    <script>window.location = "/vendor/verifyphonenumber";</script>
@endif

<!DOCTYPE html>
<html lang="en">
<head>
   @include('vendor.layout.header')
</head>
@yield('style')
<body class="fixed-nav sticky-footer" id="page-top">

<!-- ===============================
    Navigation Start
====================================-->
@include('vendor.layout.navbar')
<!-- =====================================================
                    End Navigations
======================================================= -->

<div class="content-wrapper">
    <div class="container-fluid">

       @yield('content')

    </div>
    <!-- /.content-wrapper -->



   @include('vendor.layout.footer')
   @yield('script')
</div>
<!-- Wrapper -->

</body>
</html>
