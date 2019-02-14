<header id="header">
    <div class="quck-link">
        <div class="container">
             <div class="mail"><a href="mailto:info@comenwish.com"><span class="icon icon-envelope"></span>info@comenwish.com</a></div>
            <div class="right-link">
                <ul>
                    <li><a href="{{ url('vendor') }}"><span class="icon icon-multi-user"></span>Become a Vendor</a></li>
                        @if (auth()->user())
                        <li class="registration"><a href="{{ url('/logout') }}" >Logout</a></li>
                        @else
                    <li class="registration"><a href="javascript:;" data-toggle="modal" data-target="#registrationModal">Registration</a></li>
                    <li><a href="javascript:;" data-toggle="modal" data-target="#loginModal">Login</a></li>
                        @endif


                </ul>
            </div>
        </div>
    </div>
    <nav id="nav-main" class="@yield('nav-style')">
        <div class="container">
            <div class="navbar navbar-inverse">
                <div class="navbar-header">
                    <a href="{{url('/')}}" class="navbar-brand">@yield('nav-logo')</a>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon1-barMenu"></span>
                        <span class="icon1-barMenu"></span>
                        <span class="icon1-barMenu"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="single-col @yield('home')">
                            <a href="/">Home</a>
                        </li>
                        <li class="@yield('about-us')"><a href="{{url('about')}}">About Us</a></li>
                        <li class="@yield('faq')"><a href="{{url('faq')}}">FAQ’s </a></li>
                        <li class="@yield('contact-us')" ><a href="{{url('contact')}}">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
<div class="modal modal-vcenter fade" id="loginModal" tabindex="-1" role="dialog">
    <form action="{{ url('login') }}" method="post">
        {{csrf_field()}}
        <div class="modal-dialog login-popup" role="document">
            <div class="modal-content">
                <div class="close-icon" aria-label="Close" data-dismiss="modal"><img src="{{ url('client/images/close-icon.png') }}" alt=""></div>
                <div class="left-img"><img src="{{ url('client/images/login-leftImg.png') }}" alt=""></div>
                <div class="right-info">
                    <h1>Login</h1>
                    <div class="sosal-midiyaLogin">
                        <div class="facebook-link">
                            <a href="{{ url('/auth/facebook/') }}"><span class="icon icon-facebook"></span>Sign in with Facebook</a>
                        </div>
                        <div class="google-link">
                           <a href="{{ url('/auth/google/') }}"><span class="icon icon-google-plus"></span>Sign in with Google+</a>
                        </div>
                    </div>
                    <div class="or-text"><span>OR</span></div>
                    <div class="input-form">
                        <div class="input-box">
                            <div class="icon icon-user"></div>
                            <input type="text" name="email" placeholder="email">
                        </div>
                        <div class="input-box">
                            <div class="icon icon-lock"></div>
                            <input type="password" name="password" placeholder="Password">
                        </div>
                        <div class="check-slide">
                            <div class="check">
                                <label class="label_check" for="checkbox-02">
                                    <input type="checkbox" name="sample-checkbox-01" id="checkbox-02" value="1" checked="">Remember me</label>
                            </div>
                            <a href="{{url('client/password/reset') }}">Forgot password ?</a>
                        </div>
                        <div class="submit-slide">
                            <input type="submit" value="Login" class="btn">
                        </div>
                    </div>
                    <div class="signUp-link">Haven’t signed up yet? <a href="javascript:void(0);">Sign Up</a></div>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="modal modal-vcenter fade" id="registrationModal" tabindex="-1" role="dialog">
        <div class="modal-dialog registration-popup" role="document">
            <form action="{{ url('/register') }}" method="post" >
                {{csrf_field()}}
            <div class="modal-content">
                <div class="close-icon" aria-label="Close" data-dismiss="modal"><img src="{{ url('client/images/close-icon.png') }}" alt=""></div>
                <h1>New Member Registration</h1>
                <div class="registration-form">
                    <div class="info">
                        <h2>Why to sign up</h2>
                        <ul>
                            <li>Exclusive discounts for all bookings</li>
                            <li>Full access all discounted prices</li>
                            <li>Dedicated wed-ordinator for your event</li>
                            <li>Custom event planner for your event</li>
                        </ul>
                    </div>
                    <div class="form-filde">
                        <div class="input-box">
                            <input type="text" name="first_name" placeholder="First Name" required="" >
                        </div>

                         <div class="input-box">
                            <input type="text" name="last_name" placeholder="Last Name" required="">
                        </div>

                        <div class="input-box">
                            <input type="text" placeholder="Email ID" name="email" required="" >
                        </div>
                        
                        <div class="input-box">
                            <input type="password" placeholder="Password" name="password" required="" >
                        </div>

                        <div class="input-box">
                         <input type="password" placeholder="Confirm Password" name="password_confirmation" required="">
                        </div>

                        <div class="input-box">
                            <input type="text" placeholder="Phone" name="mobile" required="">
                        </div>
                        <div class="note">Can’t Read ?<a href="#">Refresh</a></div>
                    {{--     <div class="check-slide">
                            <label class="label_check" for="checkbox-03">
                                <input type="checkbox" name="sample-checkbox-01" id="checkbox-03" value="1" checked="">By signing up, I agree to EventPlanning terms of services</label>
                        </div> --}}
                        <div class="submit-slide">
                            <input type="submit"  value="Register" class="btn">
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>

