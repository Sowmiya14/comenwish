@extends('client.layout.master')
@section('nav-logo')
    <img src="{{ url('client/images/icon-alone.png') }}" class="logo" alt="">
@endsection
@section('contact')
    active
@endsection
@section('content')
 <section class="page-header">
            <div class="container">
                <h1>contact us</h1>
            </div>
</section>
<section class="content">
    <div class="container">
        <div class="home-event">
            <div class="heading">
                <div class="icon"><em class="icon icon-heading-icon"></em></div>
                <div class="text">
                    <h2>Contact Us</h2>
                </div>
                <div class="info-text">Customer Support team provides necessary clarifications and answers for the queries asked.</div>
                <div class="stickLine"></div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="contact-box">
                        <div class="contactIcon">
                            <span class="icon icon-phone"></span>
                        </div>
                        <a href="tel:+918220100954">+91 8220100954</a>
                        <a href="tel:+918056123498">+91 8056123498</a>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="contact-box">
                        <div class="contactIcon">
                            <span class="icon icon-location-1"></span>
                        </div>
                        <address>LIG:820, 17th Cross Street, Mogappair Erie Scheme, Chennai -600037
                        </address>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="contact-box">
                        <div class="contactIcon">
                            <span class="icon icon-message"></span>
                        </div>
                        <span>Email - <a href="mailTo:info@comenwish.com">info@comenwish.com</a></span>
                        <span>Website - <a href="www.comenwish.com">www.comenwish.com</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="contackForm">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2>Contact Form</h2>
            </div>
            <form class="has-validation-callback" role="form" action="contact.php" method="POST" id="mailForm" onSubmit="return sendMail();">
                <div class="col-sm-6">
                    <div class="input-box">
                        <label>Your Name <sup>*</sup></label>
                        <input type="text" data-validation="required" data-validation-error-msg="Name cannot be blank." id="name" name="name">
                    </div>
                    <div class="input-box">
                        <label>Your Email <sup>*</sup></label>
                        <input type="text" data-validation="email" data-validation-error-msg="Incorrect e-mail address" id="email" name="email">
                    </div>
                    <div class="input-box">
                        <label>Subject <sup>*</sup></label>
                        <input type="text" data-validation="required" data-validation-error-msg="Subject cannot be blank." id="subject" name="subject">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="input-box">
                        <label>Your Message <sup>*</sup></label>
                        <textarea data-validation="required" data-validation-error-msg="Message cannot be blank." id="message" name="message"></textarea>
                    </div>
                    <button type="submit" class="btn">Send Message</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection