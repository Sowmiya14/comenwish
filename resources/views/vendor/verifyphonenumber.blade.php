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

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <!-- Custom styles for Color -->
    <link id="jssDefault" rel="stylesheet" href="{{ url('assets\dist\css\skins\default.css') }}">
</head>

 <div class="container be-detail-container">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <br>
            <img src="https://cdn2.iconfinder.com/data/icons/luchesa-part-3/128/SMS-512.png" class="img-responsive" style="width:200px; height:200px;margin:0 auto;"><br> 
            <h1 class="text-center">Verify your mobile number</h1><br>
            <p class="lead" style="align:center"></p><p> Thanks for giving your details. An OTP has been sent to your Mobile Number. Please enter the 6 digit OTP below for Successful Registration</p>  <p></p>
        <br>
            <form method="post" id="verifyotp" action="{{ url('/vendor/verifyotp') }}"> 
            {{ csrf_field() }}      
            <div class="row">           
                <div class="form-inline ">  
                 &nbsp;<input type="text" value="+91" class="form-control" id="country_code" placeholder="+91" required="">
                 &nbsp;<input type="text" class="form-control" name="mobilenumber" id="phone_number" value="{{$phonenumber}}"  placeholder="Phone Number" required=""><br/><br/><br/>
                  <input type="button" class="btn gredient-btn" onclick="smsLogin();" value="Verify Phone Number"/>
                &emsp; <a href="/vendor/resendotp">Resend OTP</a>
                </div>
            </div>
            </form>
        <br><br>
        </div>
    </div>        
</div>

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


<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


<script src="https://sdk.accountkit.com/en_US/sdk.js"></script>
<script>
  // initialize Account Kit with CSRF protection
  AccountKit_OnInteractive = function(){
    AccountKit.init(
      {
        appId: {{env('FB_APP_ID')}}, 
        state:"state", 
        version: "{{env('FB_APP_VERSION')}}",
        fbAppEventsEnabled:true
      }
    );
  };

 function loginCallback(response) {
     if (response.status === "PARTIALLY_AUTHENTICATED") {
      var code = response.code;
      var csrf = response.state;
      // Send code to server to exchange for access token
      $('#phone_number').attr('readonly',true);
      $('#country_code').attr('readonly',true);
      $.ajax({
        url: '{{ url('account_kit') }}',
        type: 'post',
        data: {'_token':'{{ csrf_token() }}', 'code':code},
        success: function(data){
           $('#phone_number').val(data.phone.national_number);
          $('#country_code').val('+'+data.phone.country_prefix);
          $( "#verifyotp" ).submit();
        }
});

     

    }
    else if (response.status === "NOT_AUTHENTICATED") {
      // handle authentication failure
      $('#mobile_verfication').html("<p class='helper'> * Authentication Failed </p>");
    }
    else if (response.status === "BAD_PARAMS") {
      // handle bad parameters
    }
  }


  // phone form submission handler
  function smsLogin() {
    var countryCode = document.getElementById("country_code").value;
    var phoneNumber = document.getElementById("phone_number").value;

    $('#mobile_verfication').html("<p class='helper'> Please Wait... </p>");
    $('#phone_number').attr('readonly',true);
    $('#country_code').attr('readonly',true);

    AccountKit.login(
      'PHONE', 
      {countryCode: countryCode, phoneNumber: phoneNumber}, // will use default values if not specified
      loginCallback
    );
  }

</script>



</html>
