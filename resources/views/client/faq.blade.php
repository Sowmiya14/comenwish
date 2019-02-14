@extends('client.layout.master')
@section('nav-logo')
    <img src="{{ url('client/images/icon-alone.png') }}" class="logo" alt="">
@endsection
@section('faq')
    active
@endsection
@section('content')
     <section class="page-header">
            <div class="container">
                <h1>Frequently Asked Questions</h1>
            </div>
        </section>
        <section class="content">
            <div class="container">
                <div class="faq-list">
                    <div class="faq-slide">
                        <div class="question">Q: How to plan an event with your budget?</div>
                        <div class="ans">
                            <p><span>A :</span> If you want a particular service for your event, you can click on the appropriate service under <strong>Event Categories</strong> tab and refine your filter with the budget.
                                <br>
                                <br> If you require multiple services for an event, you can provide your maximum budget value under <strong>WHAT’S YOUR BUDGET?</strong> Section with the list of services you require. CnW team will get back to you within 24 hours with an Event Planner to give you better options in choosing those required services within the budget limit.</p>
                        </div>
                    </div>
                    <div class="faq-slide">
                        <div class="question">Q: How to place an order?</div>
                        <div class="ans">
                            <p><span>A :</span> You can navigate across <strong>Our Services</strong> and <strong>Event Categories</strong> sections and click on the right option to get redirected to <strong>Product Listing</strong> Page.
                                <br>
                                <br> You may select any product according your wish and the budget plans and Click <strong>Make Payment</strong> option.
                                <br>
                                <br> In the Payment Summary Page, give the appropriate answers to Input fields and click on Pay. </p>
                        </div>
                        <div class="backTo-top"><a href="javascript:;">Back to Top</a></div>
                    </div>
                    <div class="faq-slide">
                        <div class="question">Q: What do I do if I've forgotten my password?</div>
                        <div class="ans">
                            <p><span>A :</span> Click on the <strong>"Forgot Your Password"</strong> and we'll send you a link to reset it on your registered email id.</p>
                        </div>
                        <div class="backTo-top"><a href="javascript:;">Back to Top</a></div>
                    </div>
                    <div class="faq-slide">
                        <div class="question">Q: How to contact Customer Support?</div>
                        <div class="ans">
                            <p><span>A :</span> <strong>Voice Call Support:</strong> You may feel free to contact our customer care support team to get assistance. Or you may click on <strong>Call me back request</strong> on the <strong>Product Description</strong> page so that our customer support team will get back to you as soon as possible to address your queries.
                                <br>
                                <br>
                                <strong>Mail Support:</strong> <a href="mailto:support@comenwish.com">support@comenwish.com</a></p>
                        </div>
                        <div class="backTo-top"><a href="javascript:;">Back to Top</a></div>
                    </div>
                    <div class="faq-slide">
                        <div class="question">Q: How do I get in touch with a vendor?</div>
                        <div class="ans">
                            <p><span>A :</span> In case you have any queries with a product, you may click on <strong>Call me back request</strong> on the <strong>Product Description</strong> page so that our customer support team will get back to you along with the Vendor as soon as possible to address your queries.</p>
                        </div>
                        <div class="backTo-top"><a href="javascript:;">Back to Top</a></div>
                    </div>
                    <div class="faq-slide">
                        <div class="question">Q: What is the payment mode? </div>
                        <div class="ans">
                            <p><span>A :</span> You may pay either through online or <strong>Cash@DoorStep</strong></p>
                        </div>
                        <div class="backTo-top"><a href="javascript:;">Back to Top</a></div>
                    </div>
                    <div class="faq-slide">
                        <div class="question">Q: What is C@D? </div>
                        <div class="ans">
                            <p><span>A :</span> C@D is abbreviated as <strong>Cash@DoorStep</strong>. Once you click on C@D for any product, our CnW executives will knock at your door steps during your feasible time to receive the payment through cash. Only after the payment has been received by our CnW Executive, the order will be confirmed.</p>
                        </div>
                        <div class="backTo-top"><a href="javascript:;">Back to Top</a></div>
                    </div>
                </div>
            </div>
        </section>
@endsection
