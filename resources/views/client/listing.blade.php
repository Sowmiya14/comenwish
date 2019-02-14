@extends('client.layout.master')
@section('nav-logo')
    <img src="{{ url('client/images/icon-alone.png') }}" class="logo" alt="">
@endsection
@section('content')              
        <div class="searchFilter-main">
            <section class="searchFormTop">
                <div class="container">
                    <div class="searchCenter">
                        <div class="refineCenter">
                            <span class="icon icon-filter"></span>
                            <span>Refine Results</span> 
                        </div>
                        <div class="searchFilter">
                           <form id="topSearchForm">
                            <div class="input-box">
                                <div class="icon icon-grid-view"></div>
                                <select id="WeddingPlanning" class="form-control">
                                    <option value="BridalWear">Bridal Wear</option>
                                    <option value="Cakes">Cakes</option>
                                    <option value="Catering">Caterings</option>
                                    <option value="DJ">DJ</option>
                                    <option value="GroomWear">Groom Wear</option>
                                    <option value="GuestCompliments">Guest Compliments</option>
                                    <option value="HairStylist">Hair Stylist</option>
                                    <option value="LightMusic">Light Music</option>
                                    <option value="Videographers">Photographers & Videographers</option>
                                    <option value="Choreographers">Sangeet Choreographers</option>
                                </select>
                            </div>
                            <div class="input-box searchlocation">
                                <div class="icon icon-location-1"></div>
                                <select id="listBox" name="businesslocation" class="form-control " onchange='selct_district(this.value)'></select>

                            </div>
                            <div class="input-box date">
                               <p style="margin-top: 10px;margin-left: 10px;margin-right: 10px"><select id='secondlist' class="custom-select mb-2 form-control" name="serviceablearea" ></select></p>

                            </div>
                        <input type="submit" id='WeddingPlanningSubmit' class="btn">
                         </form>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="breadcrumb">
                    <div class="container">
                       <ul>
                            <li><a href="/">Home</a>/</li>
                            <li><a href="#">{{$service_name}}</a>/</li>
                            <li class="active"><a href="/listing/{{$service_name}}/{{$location}}">{{$location}}</a></li>
                        </ul>
                    </div>
                </div>
                <input type="hidden" id="hidden_service" value="{{$service_name}}">
                <input type="hidden" id="hidden_location" value="{{$location}}">
                <div class="container">
                    <div class="venues-view">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <div class="left-side">
                                    <div class="search">
                                        <div class="search-icon"><div class="icon icon-search"></div></div>
                                        <input type="text" placeholder="Search by name">
                                    </div>
                                    <div class="filter-view">
                                        @switch($service_name)
                                        @case('BridalWear')
                                            <div class="filter-block">
                                                <div class="title">
                                                    <h2>Cash On Delivery</h2>
                                                </div>
                                                <div class="check-slide">
                                                <label class="label_check" for="checkbox-20"><input type="radio" class="BridalWearchange" name="cod_bridal" id="checkbox-20" value="Yes">Yes</label>
                                                </div>
                                                <div class="check-slide">
                                                <label class="label_check" for="checkbox-21"><input type="radio" class="BridalWearchange" name="cod_bridal" id="checkbox-21" value="No">No</label>
                                                </div>
                                                </div>
                                                <div class="filter-block">
                                                <div class="title">
                                                <h2>Size</h2>
                                                <div class="reste-filter">
                                                    <a href="#"><span class="icon icon-reset"></span>Reset</a>
                                                </div>
                                               </div>
                                            <div class="check-slide">
                                                <label class="label_check" for="checkbox-23"><input type="radio" class="BridalWearchange" name="size_bridal" id="checkbox-23" value="0-10">0 - 10</label>
                                            </div>
                                            <div class="check-slide">
                                                <label class="label_check" for="checkbox-24"><input type="radio" class="BridalWearchange" name="size_bridal" id="checkbox-24" value="10-20">10 - 20</label>
                                            </div>
                                            <div class="check-slide">
                                                <label class="label_check" for="checkbox-25"><input type="radio" name="size_bridal" id="checkbox-25" class="BridalWearchange" value="20-30">20 - 30</label>
                                            </div>
                                            <div class="check-slide">
                                                <label class="label_check" for="checkbox-26"><input type="radio" class="BridalWearchange" name="size_bridal" id="checkbox-26" value="30-40" >30 - 40</label>
                                            </div>
                                             <div class="check-slide">
                                                <label class="label_check" for="checkbox-27"><input type="radio" class="BridalWearchange" name="size_bridal" id="checkbox-27" value="40-50" >40 - 50</label>
                                            </div>
                                        </div>
                                        @break
                                         @case('Cakes')
                                         <div class="filter-block">
                                            <div class="title">
                                                <h2>Cake Delivery</h2>
                                            </div>
                                            <div class="check-slide">
                                                <label class="label_check" for="checkbox-20"><input type="radio" class="Cakeschange" name="cd_cake" id="checkbox-20" value="Yes">Yes</label>
                                            </div>
                                            <div class="check-slide">
                                                <label class="label_check" for="checkbox-21"><input type="radio" class="Cakeschange" name="cd_cake" id="checkbox-21" value="No">No</label>
                                            </div>
                                        </div>
                                        <div class="filter-block">
                                            <div class="title">
                                                <h2>Cake Size</h2>
                                            </div>
                                            <div class="check-slide">
                                                <label class="label_check" for="checkbox-22"><input type="radio" class="Cakeschange" name="size_cake" id="checkbox-22" value="0.5-2">0.5-2 kg</label>
                                            </div>
                                            <div class="check-slide">
                                                <label class="label_check" for="checkbox-23"><input type="radio" class="Cakeschange" name="size_cake" id="checkbox-23" value="2-3">2-3 kg</label>
                                            </div>
                                            <div class="check-slide">
                                                <label class="label_check" for="checkbox-24"><input type="radio" class="Cakeschange" name="size_cake" id="checkbox-24" value="3-4">3-4 kg</label>
                                            </div>
                                            <div class="check-slide">
                                                <label class="label_check" for="checkbox-25"><input type="radio" name="size_cake" id="checkbox-25" class="Cakeschange" value="4-5">4-5 kg</label>
                                            </div>
                                            <div class="check-slide">
                                                <label class="label_check" for="checkbox-26"><input type="radio" class="Cakeschange" name="size_cake" id="checkbox-26" value="5-6" >5-6 kg</label>
                                            </div>
                                        </div>
                                        @break
                                         @case('Catering')
                                        <div class="filter-block">
                                            <div class="title">
                                                <h2>Type of Food</h2>
                                            </div>
                                            <div class="check-slide">
                                                <label class="label_check" for="checkbox-22"><input type="radio" class="Cateringchange" name="food" id="checkbox-22" value="veg">Veg</label>
                                            </div>
                                            <div class="check-slide">
                                                <label class="label_check" for="checkbox-23"><input type="radio" class="Cateringchange" name="food" id="checkbox-23" value="nonveg">Non-Veg</label>
                                            </div>
                                        </div>
                                        <div class="filter-block">
                                            <div class="title">
                                                <h2>Type of Meal</h2>
                                            </div>
                                            <div class="check-slide">
                                                <label class="label_check" for="checkbox-25"><input type="radio" class="Cateringchange" name="meal" id="checkbox-25" value="breakfast" checked="">Breakfast</label>
                                            </div>
                                            <div class="check-slide">
                                                <label class="label_check" for="checkbox-26"><input type="radio" class="Cateringchange" name="meal" id="checkbox-26" value="lunch" >Lunch</label>
                                            </div>
                                             <div class="check-slide">
                                                <label class="label_check" for="checkbox-27"><input type="radio" class="Cateringchange" name="meal"id="checkbox-27" value="dinner" >Dinner</label>
                                            </div>
                                        </div>
                                        @break
                                        @case('DJ')  
                                        <div class="filter-block">
                                            <div class="title">
                                                <h2>Pricing</h2>
                                            </div>
                                           <div class="check-slide">
                                                <label class="label_check" for="checkbox-22"><input type="radio" class="Djchange" name="pricing" id="checkbox-22" value="hourly">Hourly</label>
                                            </div>
                                            <div class="check-slide">
                                                <label class="label_check" for="checkbox-23"><input type="radio" class="Djchange" name="pricing" id="checkbox-23" value="days">Days</label>
                                            </div>
                                        </div>
                                        <div class="filter-block">
                                            <div class="title">
                                                <h2>Service Charge</h2>
                                            </div>
                                            <div class="check-slide">
                                                <label class="label_check" for="checkbox-24"><input type="radio" class="Djchange" name="service_charge" id="checkbox-24" value="0-500">0-500</label>
                                            </div>
                                            <div class="check-slide">
                                                <label class="label_check" for="checkbox-25"><input type="radio" class="Djchange" name="service_charge" id="checkbox-25" value="500-1000">500-1000</label>
                                            </div>
                                        </div>
                                        @break
                                         @case('GroomWear')
                                        <div class="filter-block">
                                            <div class="title">
                                                <h2>Cash On Delivery</h2>
                                            </div>
                                            <div class="check-slide">
                                                <label class="label_check" for="checkbox-20"><input type="radio" class="Groomwearchange" name="cod_groom" id="checkbox-20" value="Yes">Yes</label>
                                            </div>
                                            <div class="check-slide">
                                                <label class="label_check" for="checkbox-21"><input type="radio" class="Groomwearchange" name="cod_groom" id="checkbox-21" value="No">No</label>
                                            </div>
                                        </div>
                                        <div class="filter-block">
                                            <div class="title">
                                                <h2>Size</h2>
                                            </div>
                                            <div class="check-slide">
                                                <label class="label_check" for="checkbox-22"><input type="radio" class="Groomwearchange" name="size_groom" id="checkbox-22" value="0-10">0 - 10</label>
                                            </div>
                                            <div class="check-slide">
                                                <label class="label_check" for="checkbox-23"><input type="radio" class="Groomwearchange" name="size_groom" id="checkbox-23" value="10-20">10 - 20</label>
                                            </div>
                                            <div class="check-slide">
                                                <label class="label_check" for="checkbox-24"><input type="radio" class="Groomwearchange" name="size_groom" id="checkbox-24" value="20-30">20 - 30</label>
                                            </div>
                                            <div class="check-slide">
                                                <label class="label_check" for="checkbox-25"><input type="radio" name="size_groom" id="checkbox-25" class="Groomwearchange" value="30-40">30 - 40</label>
                                            </div>
                                            <div class="check-slide">
                                                <label class="label_check" for="checkbox-26"><input type="radio" class="Groomwearchange" name="size_groom" id="checkbox-26" value="40-50" >40 - 50</label>
                                            </div>
                                        </div>
                                        @break
                                         @case('GuestCompliments')
                                         <div class="filter-block">
                                            <div class="title">
                                                <h2>Pricing</h2>
                                            </div>
                                            <div class="check-slide">
                                                <label class="label_check" for="checkbox-22"><input type="radio" class="Giftchange" name="pricing" id="checkbox-22" value="piece">Piece</label>
                                            </div>
                                            <div class="check-slide">
                                                <label class="label_check" for="checkbox-23"><input type="radio" class="Giftchange" name="pricing" id="checkbox-23" value="gift">Gift</label>
                                            </div>
                                        </div>
                                       <div class="filter-block">
                                            <div class="title">
                                                <h2>Service Charge</h2>
                                            </div>
                                            <div class="check-slide">
                                                <label class="label_check" for="checkbox-24"><input type="radio" class="Giftchange" name="service_charge" id="checkbox-24" value="0-500">0-500</label>
                                            </div>
                                            <div class="check-slide">
                                                <label class="label_check" for="checkbox-25"><input type="radio" class="Giftchange" name="service_charge" id="checkbox-25" value="500-1000">500-1000</label>
                                            </div>
                                        </div>
                                        @break
                                         @case('LightMusic')
                                        <div class="filter-block">
                                            <div class="title">
                                                <h2>Pricing</h2>
                                            </div>
                                            <div class="check-slide">
                                                <label class="label_check" for="checkbox-22"><input type="radio" class="Musicchange" name="pricing" id="checkbox-22" value="hourly">Hourly</label>
                                            </div>
                                            <div class="check-slide">
                                                <label class="label_check" for="checkbox-23"><input type="radio" class="Musicchange" name="pricing" id="checkbox-23" value="days">Days</label>
                                            </div>
                                        </div>
                                       <div class="filter-block">
                                            <div class="title">
                                                <h2>Service Charge</h2>
                                            </div>
                                            <div class="check-slide">
                                                <label class="label_check" for="checkbox-24"><input type="radio" class="Musicchange" name="service_charge" id="checkbox-24" value="0-500">0-500</label>
                                            </div>
                                            <div class="check-slide">
                                                <label class="label_check" for="checkbox-25"><input type="radio" class="Musicchange" name="service_charge" id="checkbox-25" value="500-1000">500-1000</label>
                                            </div>
                                        </div>
                                        @break
                                        @case('Videographers')
                                         <div class="filter-block">
                                            <div class="title">
                                                <h2>Pricing</h2>
                                            </div>
                                            <div class="check-slide">
                                                <label class="label_check" for="checkbox-21"><input type="radio" class="Videochange" name="pricing" id="checkbox-21" value="hourly">Hourly</label>
                                            </div>
                                            <div class="check-slide">
                                                <label class="label_check" for="checkbox-22"><input type="radio" class="Videochange" name="pricing" id="checkbox-22" value="days">Days</label>
                                            </div>
                                            <div class="check-slide">
                                                <label class="label_check" for="checkbox-23"><input type="radio" class="Videochange" name="pricing" id="checkbox-23" value="services">Services</label>
                                            </div>
                                        </div>
                                        <div class="filter-block">
                                            <div class="title">
                                                <h2>Service Charge</h2>
                                            </div>
                                            <div class="check-slide">
                                                <label class="label_check" for="checkbox-24"><input type="radio" class="Videochange" name="service_charge" id="checkbox-24" value="0-500">0-500</label>
                                            </div>
                                            <div class="check-slide">
                                                <label class="label_check" for="checkbox-25"><input type="radio" class="Videochange" name="service_charge" id="checkbox-25" value="500-1000">500-1000</label>
                                            </div>
                                        </div>
                                        @break
                                         @case('HairStylist')
                                        <div class="filter-block">
                                            <div class="title">
                                                <h2>Pricing</h2>
                                            </div>
                                           <div class="check-slide">
                                                <label class="label_check" for="checkbox-21"><input type="radio" class="Makeupchange" name="pricing" id="checkbox-21" value="hourly">Hourly</label>
                                            </div>
                                            <div class="check-slide">
                                                <label class="label_check" for="checkbox-22"><input type="radio" class="Makeupchange" name="pricing" id="checkbox-22" value="days">Days</label>
                                            </div>
                                             <div class="check-slide">
                                                <label class="label_check" for="checkbox-23"><input type="radio" class="Makeupchange" name="pricing" id="checkbox-23" value="services">Services</label>
                                            </div>
                                        </div>
                                        <div class="filter-block">
                                            <div class="title">
                                                <h2>Service Charge</h2>
                                            </div>
                                            <div class="check-slide">
                                                <label class="label_check" for="checkbox-24"><input type="radio" class="Makeupchange" name="service_charge" id="checkbox-24" value="0-500">0-500</label>
                                            </div>
                                            <div class="check-slide">
                                                <label class="label_check" for="checkbox-25"><input type="radio" class="Makeupchange" name="service_charge" id="checkbox-25" value="500-1000">500-1000</label>
                                            </div>
                                        </div>
                                        @break
                                         @case('Choreographers')
                                        <div class="filter-block">
                                            <div class="title">
                                                <h2>Pricing</h2>
                                            </div>
                                            <div class="check-slide">
                                                <label class="label_check" for="checkbox-22"><input type="radio" class="Choreochange" name="pricing" id="checkbox-22" value="hourly">Hourly</label>
                                            </div>
                                            <div class="check-slide">
                                                <label class="label_check" for="checkbox-23"><input type="radio" class="Choreochange" name="pricing" id="checkbox-23" value="services">Services</label>
                                            </div>
                                        </div>
                                        <div class="filter-block">
                                            <div class="title">
                                                <h2>Service Charge</h2>
                                            </div>
                                            <div class="check-slide">
                                                <label class="label_check" for="checkbox-24"><input type="radio" class="Choreochange" name="service_charge" id="checkbox-24" value="0-500">0-500</label>
                                            </div>
                                            <div class="check-slide">
                                                <label class="label_check" for="checkbox-25"><input type="radio" class="Choreochange" name="service_charge" id="checkbox-25" value="500-1000">500-1000</label>
                                            </div>
                                        </div>
                                        @break
                                        @endswitch

                                    </div>
                                    <div class="left-link">
                                        <h2>People also viewed...</h2>
                                        <ul>
                                            <li><a href="#"><span class="icon icon-arrow-right"></span>Denmark</a></li>
                                            <li><a href="#"><span class="icon icon-arrow-right"></span>Germany - Frankfurt / West</a></li>
                                        </ul>
                                    </div>
                                    <div class="left-productBox hidden-sm">
                                        <h2>Featured Venues</h2>
                                        <div class="product-img"><img src="{{ url('client/images/property-img/venues-img8.jpg') }}"  alt=""></div>
                                        <h3>Hilton Berlin </h3>
                                        <p>Mohrenstrasse 30 Berlin, 10117 - Germany</p>
                                        <div class="reviews">3.5 <div class="star"><div style="width:70%;" class="fill"></div></div>reviews</div>
                                        <a href="#">Vewi all Details <span class="icon icon-arrow-right"></span></a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-9 col-lg-9 col-sm-12">
                                <div class="right-side">
                                    <div class="toolbar">
                                
                                        <div class="finde-count">Products Found </div>
                                        <div class="right-tool">
                                            <!-- <div class="select-box">
                                                <select name="country_id" id="setUp_select" tabindex="1" >
                                                    <option>Near by</option>
                                                    <option>Near by</option>
    
                                                </select>
                                            </div> -->
                                            {{-- <a href="#" class="shortlist-btn"><span class="icon icon-heart-filled"></span>7 Shortlist</a> --}}
                                           {{--  <div class="link">
                                                <ul>
                                                    <li><a href="#">Map</a></li>
                                                    <li class="active"><a href="#">List</a></li>
                                                </ul>
                                            </div> --}}
                                        </div>
                                        
                                    </div>
                                    <div id="divNewData"></div>
                                    <div id="oldDataHide">
                                    @foreach($datas as $data)
                                        {{-- {{$data->vendor->serviceablearea}} --}}

                                       {{--  @if(!$data->bridalwear->isEmpty())
                                            shop found
                                            {{ $data->bridalwear }}
                                        @endif --}}
                                   


                                    <div class="venues-slide first">
                                        <div class="img"><img src="{{ $data->vendor->profilepicture }}"  alt="" width="450" height="260"></div>
                                        <div class="text">
                                            <h3>{{$data->vendor->ownername}}</h3>
                                            <div class="address">{{$data->vendor->serviceablearea}},{{$data->vendor->businesslocation}}</div>
                                            <div class="reviews">3.5 <div class="star"><div class="fill" style="width:70%;"></div></div>reviews</div>
                                            @switch($service_name)
                                            @case('BridalWear')
                                            <div class="outher-info">
                                                <div class="info-slide first">
                                                    <label>Size</label>
                                                    <span>{{$data->size}}</span>
                                                </div>
                                                <div class="info-slide">
                                                    <label>Shipping</label>
                                                    <span>{{$data->shipping}}</span>
                                                </div>
                                                <div class="info-slide">
                                                    <label>Cash on Delivery</label>
                                                    <span>{{$data->cashondelivery}}</span> 
                                                </div>
                                                <div class="info-slide livedemo">
                                                    <label>Live Demo</label>
                                                    <span >{{$data->livedemo}}</span>
                                                </div>
                                            </div>
                                            @break
                                            @case('Catering')
                                            <div class="outher-info">
                                                <div class="info-slide first">
                                                    <label>Type of Dining</label>
                                                    <span>{{$data->typeofdining}}</span>
                                                </div>
                                                <div class="info-slide">
                                                    <label>Type of Food</label>
                                                    <span>{{$data->typeoffood}}</span>
                                                </div>
                                                <div class="info-slide">
                                                    <label>Type of Meal</label>
                                                    <span>{{$data->typeofmeal}}</span> 
                                                </div>
                                                <div class="info-slide">
                                                    <label>Menu</label>
                                                    <span>{{$data->menu}}</span>
                                                </div>
                                            </div>
                                            @break
                                            @case('DJ')
                                            <div class="outher-info">
                                                <div class="info-slide first">
                                                    <label>Type of DJ </label>
                                                    <span>{{$data->typeofdj }}</span>
                                                </div>
                                                <div class="info-slide">
                                                    <label>Pricing</label>
                                                    <span>{{$data->pricing}}</span>
                                                </div>
                                                <div class="info-slide">
                                                    <label>Service Charge</label>
                                                    <span>{{$data->servicecharge}}</span> 
                                                </div>
                                                <div class="info-slide">
                                                    <label> Product Title</label>
                                                <span>{{$data->producttitle}}</span>
                                                </div>   
                                            </div>
                                            @break
                                            @case('GroomWear')
                                            <div class="outher-info">
                                                <div class="info-slide first">
                                                    <label>Size</label>
                                                    <span>{{$data->size}}</span>
                                                </div>
                                                <div class="info-slide">
                                                    <label>Shipping</label>
                                                    <span>{{$data->shipping}}</span>
                                                </div>
                                                <div class="info-slide">
                                                    <label>Cash on Delivery</label>
                                                    <span>{{$data->cashondelivery}}</span> 
                                                </div>
                                                <div class="info-slide">
                                                    <label>Live Demo</label>
                                                    <span>{{$data->livedemo}}</span>
                                                </div>
                                            </div>
                                            @break
                                            @case('GuestCompliments')
                                            <div class="outher-info">
                                                <div class="info-slide first">
                                                    <label>Type of Gift </label>
                                                    <span>{{$data->typeofgift  }}</span>
                                                </div>
                                                <div class="info-slide">
                                                    <label>Product Title</label>
                                                    <span>{{$data->producttitle}}</span>
                                                </div>
                                                <div class="info-slide">
                                                    <label>Pricing</label>
                                                    <span>{{$data->pricing  }}</span> 
                                                </div>
                                                <div class="info-slide">
                                                    <label>Service Charge</label>
                                                    <span>{{$data->servicecharge}}</span>
                                                </div>
                                            </div>
                                            @break
                                            @case('HairStylist') 
                                            <div class="outher-info">
                                                <div class="info-slide first">
                                                    <label>Product Title</label>
                                                    <span>{{$data->producttitle  }}</span>
                                                </div>
                                                <div class="info-slide">
                                                    <label>Makeupfor</label>
                                                    <span>{{$data->makeupfor}}</span>
                                                </div>
                                                <div class="info-slide">
                                                    <label>Service Charge</label>
                                                    <span>{{$data->servicecharge}}</span> 
                                                </div>
                                                <div class="info-slide">
                                                    <label>Pricing</label>
                                                    <span>{{$data->pricing}}</span>
                                                </div>
                                            </div>
                                            @break
                                            @case('LightMusic')
                                            <div class="outher-info">
                                                <div class="info-slide first">
                                                    <label>Type of Music</label>
                                                    <span>{{$data->typeofmusic}}</span>
                                                </div>
                                                <div class="info-slide">
                                                    <label>Product Title</label>
                                                    <span>{{$data->producttitle}}</span>
                                                </div>
                                                <div class="info-slide">
                                                    <label>Pricing</label>
                                                    <span>{{$data->pricing}}</span> 
                                                </div>
                                                <div class="info-slide">
                                                    <label>Service Charge</label>
                                                    <span>{{$data->servicecharge    }}</span>
                                                </div>
                                            </div>
                                            @break
                                            @case('Videographers')
                                            <div class="outher-info">
                                                <div class="info-slide first">
                                                    <label>Type of Videography</label>
                                                    <span>{{$data->typeofvideography}}</span>
                                                </div>
                                                <div class="info-slide">
                                                    <label>Style of Shoot</label>
                                                    <span>{{$data->styleofshoot}}</span>
                                                </div>
                                                <div class="info-slide">
                                                    <label>Pricing</label>
                                                    <span>{{$data->pricing }}</span> 
                                                </div>
                                                <div class="info-slide">
                                                    <label>Service Charge</label>
                                                    <span>{{$data->servicecharge}}</span>
                                                </div>
                                            </div> 
                                            @break
                                            @case('Choreographers')
                                            <div class="outher-info">
                                                <div class="info-slide first">
                                                    <label>Type of Choreography</label>
                                                    <span>{{$data->typeofchoreography}}</span>
                                                </div>
                                                <div class="info-slide">
                                                    <label>Product Title</label>
                                                    <span>{{$data->producttitle}}</span>
                                                </div>
                                                <div class="info-slide">
                                                    <label>Pricing</label>
                                                    <span>{{$data->pricing}}</span> 
                                                </div>
                                                <div class="info-slide">
                                                    <label>Service Charge</label>
                                                    <span>{{$data->servicecharge}}</span>
                                                </div>
                                            </div>
                                            @break
                                            @case('Cakes')
                                                <div class="outher-info">
                                                <div class="info-slide first">
                                                    <label>Typeofcake</label>
                                                    <span>{{$data->typeofcake}}</span>
                                                </div>
                                                <div class="info-slide">
                                                    <label>Cake Size</label>
                                                    <span>{{$data->cakesize}}</span> 
                                                </div>
                                                
                                                <div class="info-slide">
                                                    <label>Delivery Type</label>
                                                    <span>{{$data->cakedelivery}}</span>
                                                </div>
                                                
                                                <div class="info-slide">
                                                    <label>Servicecharge</label>
                                                    <span>{{$data->servicecharge}}</span>
                                                </div>
                                            </div>
                                            @break
                                            @endswitch
                                            <div class="outher-link">
                                                <ul>
                                                    <li><a href="#"><span class="icon icon-calander-check"></span>Check Availability</a></li>
                                                    <li><a href="javascript:;" data-toggle="modal" data-target="#contactModal1"><span class="icon icon-phone"></span>Contact Vendor</a></li>
                                                    <li><a href="#"><span class="icon icon-heart"></span>Add to Wishlist</a></li>
                                                    <li><a href="#"><span class="icon icon-location-1"></span>See on Map</a></li>
                                                </ul>
                                            </div>
                                            <div class="button">
                                                <a href="#" class="btn">Book Now</a>
                                                <a href="javascript:;" class="btn gray">View Details <span class="icon icon-arrow-down"></span></a>
                                            </div>
                                        </div>
                                        <div class="amenities-view">
                                            <h2>All Amenities :</h2>
                                            <div class="amenities-box">
                                                <div class="icon icon-tea"></div>
                                                <span>Coffee Shop</span>
                                            </div>
                                            <div class="amenities-box">
                                                <div class="icon icon-wifi"></div>
                                                <span>Wifi</span>
                                            </div>
                                            <div class="amenities-box">
                                                <div class="icon icon-parking"></div>
                                                <span>Parking</span>
                                            </div>
                                            <div class="amenities-box">
                                                <div class="icon icon-airport-shuttle"></div>
                                                <span>Airport Shuttle</span>
                                            </div>
                                            <div class="amenities-box">
                                                <div class="icon icon-bar"></div>
                                                <span>Bar</span>
                                            </div>
                                            <div class="amenities-box">
                                                <div class="icon icon-currency-xchg"></div>
                                                <span>Currency Exchange</span>
                                            </div>
                                            <div class="amenities-box">
                                                <div class="icon icon-bag"></div>
                                                <span>Business Centre</span>
                                            </div>
                                            <div class="amenities-box">
                                                <div class="icon icon-road-guide"></div>
                                                <span>Guide Service</span>
                                            </div>
                                            <div class="amenities-box">
                                                <div class="icon icon-yoga"></div>
                                                <span>Yoga Centre</span>
                                            </div>
                                            <div class="amenities-box disabled">
                                                <div class="icon icon-ayurved"></div>
                                                <span>Ayurveda Centre</span>
                                            </div>
                                            <div class="amenities-box">
                                                <div class="icon icon-payment"></div>
                                                <span>Payment Mode</span>
                                            </div>
                                            <div class="amenities-box">
                                                <div class="icon icon-ac"></div>
                                                <span>A/C</span>
                                            </div>
                                            <div class="amenities-box">
                                                <div class="icon icon-handicape"></div>
                                                <span>Handicap Facilities</span>
                                            </div>
                                            <div class="amenities-box">
                                                <div class="icon icon-doctor"></div>
                                                <span>Doctor on Call</span>
                                            </div>
                                            <div class="amenities-box">
                                                <div class="icon icon-meeting"></div>
                                                <span>Conference Hall</span>
                                            </div>
                                            <div class="amenities-box">
                                                <div class="icon icon-apple"></div>
                                                <span>Health Club</span>
                                            </div>
                                            <div class="amenities-box">
                                                <div class="icon icon-gym"></div>
                                                <span>Gym</span>
                                            </div>
                                            <div class="amenities-box disabled">
                                                <div class="icon icon-flower"></div>
                                                <span>Florist on Request</span>
                                            </div>
                                            <div class="amenities-box">
                                                <div class="icon icon-swimming"></div>
                                                <span>Swimming Pool</span>
                                            </div>
                                            <div class="amenities-box">
                                                <div class="icon icon-spoon"></div>
                                                <span>Restaurant</span>
                                            </div>
                                            <div class="amenities-box">
                                                <div class="icon icon-massage-center"></div>
                                                <span>Massage Centre</span>
                                            </div>
                                            <div class="amenities-box disabled">
                                                <div class="icon icon-steam-bath"></div>
                                                <span>Steam Sauna</span>
                                            </div>
                                            <div class="amenities-box disabled">
                                                <div class="icon icon-shirt"></div>
                                                <span>Laundry Service</span>
                                            </div>
                                            <div class="amenities-box">
                                                <div class="icon icon-spa"></div>
                                                <span>Spa</span>
                                            </div>
                                            <div class="amenities-box disabled">
                                                <div class="icon icon-beauty-saloon"></div>
                                                <span>Beauty Salon</span>
                                            </div>
                                            <div class="amenities-box">
                                                <div class="icon icon-sun-bed"></div>
                                                <span>Sun Beds</span>
                                            </div>
                                            <div class="amenities-box">
                                                <div class="icon icon-room-service"></div>
                                                <span>Room Service</span>
                                            </div>
                                            <div class="amenities-box">
                                                <div class="icon icon-taxi"></div>
                                                <span>Taxi Service</span>
                                            </div>
                                        </div>
                                        <div class="modal fade modal-vcenter" id="contactModal1" tabindex="-1" role="dialog">
                                            <div class="modal-dialog contactvendor-popup" role="document">
                                                <div class="modal-content">
                                                    <div class="close-icon" aria-label="Close" data-dismiss="modal" ><img src="images/close-icon.png" alt=""></div>
                                                    <h1>Mariom Banquet</h1>
                                                    <div class="note">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</div>
                                                    <div class="row">   
                                                        <div class="col-sm-6">
                                                            <div class="input-slide">
                                                                <input type="text" placeholder="First Name">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="input-slide">
                                                                <input type="text" placeholder="Last Name ">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="input-slide">
                                                                <input type="text" placeholder="Email ID">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="input-slide">
                                                                <input type="text" placeholder="Phone Number">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="input-slide">
                                                                <textarea placeholder="Message"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="submit-slide">
                                                                <input type="submit" value="Send" class="btn">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    @endforeach
                                    {{-- <div class="pagination">
                                        <ul>
                                            <li class="prev disabled"><a href="#">Prev</a></li>
                                            <li class="active"><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#">4</a></li>
                                            <li><a href="#">5</a></li>
                                            <li class="next"><a href="#">Next</a></li>
                                        </ul>
                                    </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function () {
        $("#WeddingPlanning option[value="+'<?php echo $service_name ?>'+"]").attr('selected', 'selected');
    });
</script>
@endsection
