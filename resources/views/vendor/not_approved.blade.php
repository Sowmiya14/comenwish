<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Come N Wish - Vendor</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ url('assets\plugins\bootstrap\css\bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="{{ url('assets\plugins\font-awesome\css\font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Custom fonts for this template -->
    <link href="{{ url('assets\plugins\themify\css\themify.css') }}" rel="stylesheet" type="text/css">

    <!-- Angular Tooltip Css -->
    <link href="{{ url('assets\plugins\angular-tooltip\angular-tooltips.css') }}" rel="stylesheet">

    <!-- Page level plugin CSS -->
    <link href="{{ url('assets\dist\css\animate.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ url('assets\dist\css\glovia.css') }}" rel="stylesheet">
    <link href="{{ url('assets\dist\css\glovia-responsive.css') }}" rel="stylesheet">

    <!-- Custom styles for Color -->
    <link id="jssDefault" rel="stylesheet" href="{{ url('assets\dist\css\skins\default.css') }}">
</head>

<body>

<div class="row">
    <div class="col-md-12 col-lg-12">
        <section class="error-page text-center">
            <h1 class="gredient-cl">SORRY! </h1>
            <h3 class="theme-cl">Oops! You Are Not Verified Yet</h3>
            <a href="#"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn cl-white no-br gredient-bg">Log Out</a>
            <form id="logout-form" action="{{ url('/vendor/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </section>
    </div> <!-- .login-sidebar -->
</div> <!-- .row -->



<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded cl-white gredient-bg" href="#page-top">
    <i class="ti-angle-double-up"></i>
</a>



<!-- Bootstrap core JavaScript-->

<script src="{{ url('assets\plugins\jquery\jquery.min.js') }}"></script>
<script src="{{ url('assets\plugins\bootstrap\js\bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ url('assets\plugins\jquery-easing\jquery.easing.min.js') }}"></script>

<!-- Slick Slider Js -->
<script src="{{ url('assets\plugins\slick-slider\slick.js') }}"></script>

<!-- Slim Scroll -->
<script src="{{ url('assets\plugins\slim-scroll\jquery.slimscroll.min.js') }}"></script>

<!-- Angular Tooltip -->
<script src="{{ url('assets\plugins\angular-tooltip\angular.js') }}"></script>
<script src="{{ url('assets\plugins\angular-tooltip\angular-tooltips.js') }}"></script>
<script src="{{ url('assets\plugins\angular-tooltip\index.js') }}"></script>

<!-- Validator JavaScript -->
<script src="{{ url('assets\plugins\validator\validator.js') }}"></script>

<!-- Custom scripts for all pages -->
<script src="{{ url('assets\dist\js\glovia.js') }}"></script>
<script src="{{ url('assets\dist\js\jQuery.style.switcher.js') }}"></script>
<script>
    function openRightMenu() {
        document.getElementById("rightMenu").style.display = "block";
    }
    function closeRightMenu() {
        document.getElementById("rightMenu").style.display = "none";
    }
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#styleOptions').styleSwitcher();
    });
</script>

<script>
    $('.dropdown-toggle').dropdown()
</script>


</body>
</html>
