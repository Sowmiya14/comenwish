@extends('client.layout.master')
@section('nav-logo')
    <img src="{{ url('client/images/icon-alone.png') }}" class="logo" alt="">
@endsection
@section('about-us')
    active
@endsection
@section('content')
    <section class="page-header">
            <div class="container">
                <h1>about us</h1>
            </div>
    </section>
    <section class="content">
            <div class="container">
                <div class="home-event">
                    <div class="heading">
                        <div class="icon"><em class="icon icon-heading-icon"></em></div>
                        <div class="text">
                            <h2>Welcome to our Come N Wish</h2>
                        </div>
                        <div class="info-text">Come N Wish is an E-commerce event planning brand based on Web and Android platforms providing end-to-end services for the customer’s need for their Personal and Corporate events.</div>
                        <div class="stickLine"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="text-center">
                                <p>We provide a market place for all Event Service Providers serving across the city.</p>
                                <p>Customers can place orders for any type of services which they might require for an event and book through online as well.</p>
                                <p>Come N Wish acts as an interface/mediator in connecting the Customers and Service Providers so that customer is finding a right choice and liberty in choosing the Service Providers on their own.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
