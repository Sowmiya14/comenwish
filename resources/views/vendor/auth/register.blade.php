<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
    <title>Come n Wish</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('intl-tel-input\css\intlTelInput.css') }}">
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            background-color: #f1f1f1;
        }
        #regForm {
            background-color: #ffffff;
            margin: 100px auto;
            font-family: Raleway;
            padding: 40px;
            width: 70%;
            min-width: 300px;
        }
        h1 {
            text-align: center;
        }
        input, select {
            padding: 10px;
            width: 100%;
            font-size: 17px;
            font-family: Raleway;
            border: 1px solid #aaaaaa;
        }
        /* Mark input boxes that gets an error on validation: */
        input.invalid, select.invalid {
            background-color: #ffdddd;
        }
        /* Hide all steps by default: */
        .tab {
            display: none;
        }
        button {
            background-color: #4CAF50;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            font-size: 17px;
            font-family: Raleway;
            cursor: pointer;
        }
        button:hover {
            opacity: 0.8;
        }
        #prevBtn {
            background-color: #bbbbbb;
        }
        /* Make circles that indicate the steps of the form: */
        .step {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbbbbb;
            border: none;
            border-radius: 50%;
            display: inline-block;
            opacity: 0.5;
        }
        .step.active {
            opacity: 1;
        }
        /* Mark the steps that are finished and valid: */
        .step.finish {
            background-color: #4CAF50;
        }

        .asterisk:after{
            content:"*" ;
            color:red ;
        }
        .selectBox {
            position: relative;
        }
        .selectBox select {
            width: 100%;
            font-weight: bold;
        }
        .overSelect {
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
        }
        #checkboxes {
            display: none;
            border: 1px #e9eff4 solid;
        }
        #checkboxes label {
            display: block;
            margin-left: 8px;
            margin-top: 8px;
        }
        #checkboxes label:hover {
            background-color: #de67b4;
        }
    </style>
    <style type="text/css">
        .iti-flag {background-image: url("{{ url('intl-tel-input/img/flags.png') }}");}

        @media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2 / 1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {
            .iti-flag {background-image: url("{{ url('intl-tel-input/img/flags@2x.png') }}");}
        }
        .intl-tel-input {width: 100%;}
    </style>



</head>
<body>

<form id="regForm"  method="POST" action="{{ url('/vendor/register') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <h1>Come n Wish Vendor Registration</h1>
    <hr>
    <br>
    <!-- One "tab" for each step in the form: -->
    @include('vendor.layout.errors')
    <div class="tab">
        <h3>Personal Information</h3>
        <span class="asterisk">Name:</span>
        <p>
            <input placeholder="Name" oninput="this.className = ''" name="ownername" onkeypress="return onlyAlphabets(event,this);" class="testing" value="{{ old('ownername') }}">
        </p>
        <span class="asterisk">Email:</span>
        <p>
            <input placeholder="Email" oninput="this.className = ''" onblur="validateEmail(this);" name="email" class="testing"value="{{ old('email') }}">
        </p>
        <span class="asterisk">Mobile Number:</span>
        <p>
            <input type="tel" id="mobilenumber" name="mobilenumber" class="form-control phone" onkeypress="return isNumberKey(event)" value="{{ old('mobilenumber') }}" maxlength="15"/>

            {{--<input type="tel" id="phone">--}}
            {{--<input placeholder="Mobile Number" id="phone" oninput="this.className = ''" onkeypress="return isNumberKey(event)" name="mobilenumber" class="testing" value="{{ old('mobilenumber') }}" minlength="10" maxlength="15" pattern="[1-9]{1}[0-9]{9}"required="">--}}
        </p>
        <span class="asterisk">Contact Person Name 1:</span>
        <p>
            <input placeholder="Contact Person Name 1" oninput="this.className = ''"  onkeypress="return onlyAlphabets(event,this);"name="contactpersonname1" class="testing" value="{{ old('contactpersonname1') }}">
        </p>
        <span class="asterisk">Phone Number :</span>
        <p>
            <input type="tel" name="contactpersonmobileno1" id="contactpersonmobileno1" class="form-control phone"  onkeypress="return isNumberKey(event)" value="{{ old('contactpersonmobileno1') }}" maxlength="15"/>
        </p>
        Contact Person Name 2:
        <p>
            <input placeholder="Contact Person Name 2" oninput="this.className = ''"  name="contactpersonname2" value="{{ old('contactpersonname2') }}">
        </p>
        Phone Number 2:
        <p>
            <input type="tel" name="contactpersonmobileno2" id="contactpersonmobileno2" class="form-control phone" onkeypress="return isNumberKey(event)" value="{{ old('contactpersonmobileno2') }}" maxlength="15" />
        </p>
        Password:
        <p>
            <input type="password" placeholder="Password" oninput="this.className = ''" name="password" >
        </p>
        Confirm Password:
        <p>
            <input type="password" placeholder="Confirm Password" oninput="this.className = ''" name="password_confirmation" class="testing">
        </p>
    </div>
    <div class="tab">
        <h3>Business Information</h3>
        Business Name:
        <p><input placeholder="Business Name" oninput="this.className = ''" onkeypress="return onlyAlphabets(event,this);" name="businessname" class="testing" value="{{ old('businessname') }}" minlength="3" maxlength="6"></p>
        Business Location:
        <p><select id="listBox" name="businesslocation" class="custom-select mb-2 form-control" onchange='selct_district(this.value)'></select></p>
        Serviceable Area:
        <p><select id='secondlist' class="custom-select mb-2 form-control" name="serviceablearea" ></select></p>
        Vendor Type:
        <p>
        <div class="form-group">
            <div class="selectBox" onclick="showCheckboxes()">
                <select class="custom-select mb-2 form-control" >
                    <option>Select a Vendor Type</option>
                </select>
                <div class="overSelect"></div>
            </div>
            <div id="checkboxes">
                @foreach($datas as $data)
                    <label for="{{ $data->id }}">
                        <input type="checkbox" name="vendortype[]" id="{{ $data->id }}" value="{{ $data->id }}" /> {{ $data->vendorproductname}}</label>
                @endforeach
            </div>
        </div>
        </p>
        GST Number*:
        <p>
            <input placeholder="GST Number" oninput="this.className = ''" name="gstnumber" value="{{ old('gstnumber') }}" maxlength="15"class="testing">
        </p>
    </div>
    <div style="overflow:auto;">
        <div style="float:right;">
            <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
            <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
        </div>
    </div>

    <!-- Circles which indicates the steps of the form: -->

    <div style="text-align:center;margin-top:40px;">
        <span class="step"></span>
        <span class="step"></span>
    </div>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{ url('intl-tel-input\js\intlTelInput.js') }}"></script>
<script src="{{ url('intl-tel-input\js\utils.js') }}"></script>
<script>
    $(".phone").intlTelInput();
</script>
<script type="text/javascript">
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the crurrent tab
    function showTab(n) {
        // This function will display the specified tab of the form...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        //... and fix the Previous/Next buttons:
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            document.getElementById("nextBtn").innerHTML = "Submit";
        } else {
            document.getElementById("nextBtn").innerHTML = "Next";
        }
        //... and run a function that will display the correct step indicator:
        fixStepIndicator(n)
    }
    function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        // Exit the function if any field in the current tab is invalid:
        if (n == 1 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form...
        if (currentTab >= x.length) {
            // ... the form gets submitted:
            document.getElementById("regForm").submit();
            return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
    }
    function validateForm() {
        // This function deals with validation of the form fields
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByClassName("testing");
        // A loop that checks every input field in the current tab:
        for (i = 0; i < y.length; i++) {
            // If a field is empty...
            if (y[i].value == "") {
                // add an "invalid" class to the field:
                y[i].className += " invalid";
                // and set the current valid status to false
                valid = false;
            }
        }
        // If the valid status is true, mark the step as finished and valid:
        if (valid) {
            document.getElementsByClassName("step")[currentTab].className += " finish";
        }
        return valid; // return the valid status
    }
    function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class on the current step:
        x[n].className += " active";
    }
    var expanded = false;
    function showCheckboxes() {
        var checkboxes = document.getElementById("checkboxes");
        if (!expanded) {
            checkboxes.style.display = "block";
            expanded = true;
        } else {
            checkboxes.style.display = "none";
            expanded = false;
        }
    }
    function onlyAlphabets(e, t) {
        try {
            if (window.event) {
                var charCode = window.event.keyCode;
            }else if (e) {
                var charCode = e.which;
            }else { return true; }

            if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123))
                return true;
            else
                return false;
        }catch (err) {
            alert(err.Description);
        }
    }
    function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
    function validateEmail(emailField){
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
        if (reg.test(emailField.value) == false){
            alert('Invalid Email Address');
            return false;
        }
        return true;
    }

    $('#regForm').click(function () {
        var number = $("#mobilenumber").intlTelInput("getNumber");
        $("#mobilenumber").val(number);
        var number = $("#contactpersonmobileno1").intlTelInput("getNumber");
        $("#contactpersonmobileno1").val(number);
        var number = $("#contactpersonmobileno2").intlTelInput("getNumber");
        $("#contactpersonmobileno2").val(number);
        $('#add_vendor_form').submit();
    });
</script>
<script type="text/javascript" src="{{ url('js/state.js') }}"></script>
<script type="text/javascript" src="{{ url('js/jquery.js') }}"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</body>
</html>