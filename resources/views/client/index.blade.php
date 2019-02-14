@extends('client.layout.master')
@section('home')
active
@endsection

@section('manu-bar')
home-style2
@endsection

@section('nav-style')
style2
@endsection
@section('nav-logo')
    <img src="{{ url('client/images/logo-white.png') }}" class="logo" alt="">
@endsection


@section('content')

     <section class="banner style2">
            <div class="carousel" id="mainBnner">
                <div class="item"><img src="{{ url('client/images/banner-img/slider-img.jpg') }}" alt=""></div>
                <div class="item"><img src="{{ url('client/images/banner-img/slider-img2.jpg') }}" alt=""></div>
                <div class="item"><img src="{{ url('client/images/banner-img/slider-img3.jpg') }}" alt=""></div>
            </div>
            <div class="banner-nav">
                <div class="prev"><span class="icon icon-arrow-left"></span></div>
                <div class="next"><span class="icon icon-arrow-right"></span></div>
            </div>
            <div class="banner-text home">
                <div class="container">
                    <div class="search-title">
                        <h1> You Dream, We plan ☺ <span>Let’s Celebrate </span></h1>
                    </div>
                </div>
            </div>
     </section>
    <section class="service-type">
        <div class="container">
            <div class="heading">
                <div class="icon"><em class="icon icon-heading-icon"></em></div>
                <div class="text">
                    <h2>Our Services</h2>
                </div>
                <div class="info-text">Providing end-to-end services for the customer’s need.</div>
            </div>
            <div class="service-catagari">
                <ul>
                    <li>
                        <a href="#" class="services" data-toggle="modal" attr="light" id="BridalWear" data-target="#ourServices">
                            <span class="icon">
                                <img src="{{ url('client/images/event-img/bridal-wear.png') }}" class="event-img black">
                                <img src="{{ url('client/images/event-img/bridal-wear-white.png') }}" class="event-img white">
                            </span>
                            <span class="text">Bridal Wear</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="services" data-toggle="modal" attr="light" id="Cakes" data-target="#ourServices">
                            <span class="icon">
                                <img src="{{ url('client/images/event-img/cakes.png') }}" class="event-img black">
                                <img src="{{ url('client/images/event-img/cakes-white.png') }}" class="event-img white">
                            </span>
                            <span class="text">Cakes</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="services" data-toggle="modal" attr="light" id="Catering" data-target="#ourServices">
                            <span class="icon">
                                <img src="{{ url('client/images/event-img/catering.png') }}" class="event-img black">
                                <img src="{{ url('client/images/event-img/catering-white.png') }}" class="event-img white">
                            </span>
                            <span class="text">Catering</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="services" data-toggle="modal" attr="light" id="DJ" data-target="#ourServices">
                            <span class="icon">
                                <img src="{{ url('client/images/event-img/dj.png') }}" class="event-img black">
                                <img src="{{ url('client/images/event-img/dj-white.png') }}" class="event-img white">
                            </span>
                            <span class="text">DJ</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="services" data-toggle="modal"  attr="light" id="GroomWear" data-target="#ourServices">
                            <span class="icon">
                                <img src="{{ url('client/images/event-img/groom-wear.png') }}" class="event-img black">
                                <img src="{{ url('client/images/event-img/groom-wear-white.png') }}" class="event-img white">
                            </span>
                            <span class="text">Groom Wear</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="services" data-toggle="modal" attr="light" id="GuestCompliments" data-target="#ourServices">
                            <span class="icon">
                                <img src="{{ url('client/images/event-img/guest-compliments.png') }}" class="event-img black">
                                <img src="{{ url('client/images/event-img/guest-compliments-white.png') }}" class="event-img white">
                            </span>
                            <span class="text">Guest Compliments</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="services" data-toggle="modal" attr="light" id="HairStylist" data-target="#ourServices">
                            <span class="icon">
                                <img src="{{ url('client/images/event-img/hair-stylist.png') }}" class="event-img black">
                                <img src="{{ url('client/images/event-img/hair-stylist-white.png') }}" class="event-img white">
                            </span>
                            <span class="text">Hair Stylist</span>
                        </a>
                    </li>
                    <li >
                        <a href="javascript:;" class="services" attr="light" id="LightMusic" data-toggle="modal" data-target="#ourServices">
                            <span class="icon">
                                <img src="{{ url('client/images/event-img/light-music.png') }}" class="event-img black">
                                <img src="{{ url('client/images/event-img/light-music-white.png') }}" class="event-img white">
                            </span>
                            <span class="text">Light Music</span>
                        </a>
                    </li>
                    <li >
                        <a href="javascript:;" class="services" attr="light" id="Videographers"  data-toggle="modal" data-target="#ourServices">
                            <span class="icon">
                                <img src="{{ url('client/images/event-img/photography.png') }}" class="event-img black">
                                <img src="{{ url('client/images/event-img/photography-white.png') }}" class="event-img white">
                            </span>
                            <span class="text">Photographers &amp; Videographers</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="services" data-toggle="modal" attr="light" id="Choreographers" data-target="#ourServices">
                            <span class="icon">
                                <img src="{{ url('client/images/event-img/Sangeet-Choreographers.png') }}" class="event-img black">
                                <img src="{{ url('client/images/event-img/sangeet-choreographers-white.png') }}" class="event-img white">
                            </span>
                            <span class="text">Sangeet Choreographers</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container">
            <div class="home-event">
                <div class="heading">
                    <div class="icon"><em class="icon icon-heading-icon"></em></div>
                    <div class="text">
                        <h2>Events Categories</h2>
                    </div>
                    <div class="info-text p-b-50">Categorizes and covers up all the events right from birth to retirement.</div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="story-box">
                            <img src="{{ url('client/images/event-img/story-img1.jpg') }}" alt="">
                            <div class="text">
                                <div class="inner-text">
                                    <p>Birthday parties</p>
                                    <a href="javascript:;" data-toggle="modal" data-target="#ourServices">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="story-box">
                            <img src="{{ url('client/images/event-img/story-img2.jpg') }}" alt="">
                            <div class="text">
                                <div class="inner-text">
                                    <p>Wedding Planning</p>
                                    <a href="javascript:;" data-toggle="modal" data-target="#ourServices">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="story-box">
                            <img src="{{ url('client/images/event-img/story-img3.jpg') }}" alt="">
                            <div class="text">
                                <div class="inner-text">
                                    <p>Corporate Events</p>
                                    <a href="javascript:;" data-toggle="modal" data-target="#ourServices">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="story-box">
                            <img src="{{ url('client/images/event-img/story-img4.jpg') }}" alt="">
                            <div class="text">
                                <div class="inner-text">
                                    <p>Get Together</p>
                                    <a href="javascript:;" data-toggle="modal" data-target="#ourServices">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="story-box">
                            <img src="{{ url('client/images/event-img/story-img5.jpg') }}" alt="">
                            <div class="text">
                                <div class="inner-text">
                                    <p>First Date Invitation</p>
                                    <a href="javascript:;" data-toggle="modal" data-target="#ourServices">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="story-box">
                            <img src="{{ url('client/images/event-img/story-img6.jpg') }}" alt="">
                            <div class="text">
                                <div class="inner-text">
                                    <p>Trekking</p>
                                    <a href="javascript:;" data-toggle="modal" data-target="#ourServices">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="friends-block">
        <div class="container">
            <div class="sub-title">
                <div class="icon"><em class="icon icon-heading-icon"></em></div>
                <h2>Client Say’s</h2>
                <div class="img"><img src="{{ url('client/images/heading-blackBgimg.png') }}" alt=""></div>
            </div>
            <div id="friend_slider" class="carousel">
                <div class="item">
                    <div class="friends-info">
                        <div class="friend-img">
                            <div class="img"><img src="{{ url('client/images/user-img/friend-img.png') }}" alt=""></div>
                            <div class="img-fream"><img src="{{ url('client/images/img-fream.png') }}" alt=""></div>
                            <div class="name">John Doe</div>
                        </div>
                        <div class="text">
                            <p><img src="{{ url('client/images/starting-point.png') }}" alt="" class="start-img">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, an unknown printer took a galley of type and scrambled it type specimen book. <img src="{{ url('client/images/ending-point.png') }}" alt="" class="end-img"></p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="friends-info">
                        <div class="friend-img">
                            <div class="img"><img src="{{ url('client/images/user-img/friend-img.png') }}" alt=""></div>
                            <div class="img-fream"><img src="{{ url('client/images/img-fream.png') }}" alt=""></div>
                            <div class="name">John Doe</div>
                        </div>
                        <div class="text">
                            <p><img src="{{ url('client/images/starting-point.png') }}" alt="" class="start-img">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, an unknown printer took a galley of type and scrambled it type specimen book. <img src="{{ url('client/images/ending-point.png') }}" alt="" class="end-img"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="news-view">
        <div class="container">
            <div class="heading">
                <div class="icon"><em class="icon icon-heading-icon"></em></div>
                <div class="text">
                    <h2>Latest News</h2>
                </div>
                <div class="info-text">It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <div class="news-box">
                        <div class="row">
                            <div class="col-sm-6"><img src="{{ url('client/images/news-img/news-img1.png') }}" alt=""></div>
                            <div class="col-sm-6">
                                <div class="text">
                                    <div class="news-title">
                                        <h3>Post with Image Here</h3>
                                        <span>Rashed kabir on 24 Feb, 2014</span>
                                    </div>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <a href="#" class="btn">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="news-box style2">
                                <div class="text">
                                    <div class="news-title">
                                        <h3>Post with Image Here</h3>
                                        <span>Rashed kabir on 24 Feb, 2014</span>
                                    </div>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <a href="#" class="btn">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="news-box style2">
                                <div class="text">
                                    <div class="news-title">
                                        <h3>Post with Image Here</h3>
                                        <span>Rashed kabir on 24 Feb, 2014</span>
                                    </div>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <a href="#" class="btn">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="news-box style3">
                        <img src="{{ url('client/images/news-img/news-img2.png') }}" alt="">
                        <div class="text">
                            <div class="news-title">
                                <h3>Post with Image Here</h3>
                                <span>Rashed kabir on 24 Feb, 2014</span>
                            </div>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            <a href="#" class="btn">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="event-sponsor">
        <div class="container">
            <div class="heading">
                <div class="icon"><em class="icon icon-heading-icon"></em></div>
                <div class="text">
                    <h2>Clients </h2>
                </div>
                <div class="info-text">It has survived not only five centuries, but also the leap into electronic typesetting,</div>
            </div>
            <div class="sponsor-slider">
                <div class="item"><a href="#"><img src="{{ url('client/images/sponsor-logo/sponsor-logo1.png') }}" alt=""></a></div>
                <div class="item"><a href="#"><img src="{{ url('client/images/sponsor-logo/sponsor-logo2.png') }}" alt=""></a></div>
                <div class="item"><a href="#"><img src="{{ url('client/images/sponsor-logo/sponsor-logo3.png') }}" alt=""></a></div>
                <div class="item"><a href="#"><img src="{{ url('client/images/sponsor-logo/sponsor-logo4.png') }}" alt=""></a></div>
                 <div class="item"><a href="#"><img src="{{ url('client/images/sponsor-logo/sponsor-logo1.png') }}" alt=""></a></div>
                <div class="item"><a href="#"><img src="{{ url('client/images/sponsor-logo/sponsor-logo2.png') }}" alt=""></a></div>
                <div class="item"><a href="#"><img src="{{ url('client/images/sponsor-logo/sponsor-logo3.png') }}" alt=""></a></div>
                <div class="item"><a href="#"><img src="{{ url('client/images/sponsor-logo/sponsor-logo4.png') }}" alt=""></a></div>

            </div>
        </div>
    </section>

<div class="modal modal-vcenter fade" id="ourServices" tabindex="-1" role="dialog">
        <div class="modal-dialog registration-popup" role="document">
            <div class="modal-content">
                <div class="close-icon" aria-label="Close" data-dismiss="modal"><img src="{{ url('client/images/close-icon.png') }}" alt=""></div>
                <h1>Event Details</h1>
                <div class="registration-form">
                    <div class="info services">
         
                        <h2>Enjoy Event </h2>
                        <ul>
                            <li>Exclusive discounts for all bookings</li>
                            <li>Full access all discounted prices</li>
                            <li>Dedicated wed-ordinator for your event</li>
                            <li>Custom event planner for your event</li>
                        </ul>
                    </div>
                    <form id="client_listing">
                        <input type="hidden" name="service_name" id="service_name">
                    <div class="form-filde">
                        <div class="input-box">
                            <input type="text"  class="text-only" placeholder="Full Name" required="">
                        </div>
                        <div class="input-box">
                            <input type="text" class="number-only" placeholder="Mobile Number" required="">
                        </div>
                        
                        @include('client.layout.event_location')  
                        Event Type:  
                        <select class="custom-select mb-2 form-control" >
                            @foreach (\App\Helpers\Helper::getEvent() as $events)
                            <option>{{$events->eventname}}</option>
                            @endforeach
                        </select><br >
                        {{-- <div class="input-box">
                            <input type="text" placeholder="Event Date" id="datepicker2">
                        </div> --}}
                        <div class="submit-slide">
                            <input type="submit" value="Submit" id="submitData" class="btn">
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
</div>
@endsection


