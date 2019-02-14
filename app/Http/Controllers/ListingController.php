<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Bridalwear;
use App\Vendor;
use App\Cakes;
use App\Grooming;
use App\Dj;
use App\Gift;
use App\Caterings;
use App\Makeup;
use App\Music;
use App\Choreographer;
use App\Videography;
class ListingController extends Controller
{
    public function products(){
        // return request()->all();
        $service_name= request('service_name');
        $location= request('location');
        $vendor_data = Vendor::where('serviceablearea',$location)->get();
        foreach ($vendor_data as $key => $value){
            $vendor_code[] =  $value->vendorcode;
            }
            if(empty($vendor_code))
{                $vendor_code = array();
            }
        switch(request('service_name')){
                case 'BridalWear':
                    $service_name = "BridalWear";
                    if (request('cod_bridal') !="*" && request('size_bridal') !="*") {
                       $size_bridal = explode('-',request('size_bridal'),2); 
                        $size_from = $size_bridal[0];
                        $size_to = $size_bridal[1];
                        $datas = Bridalwear::whereBetween('size',[$size_from,$size_to])->where('cashondelivery',request('cod_bridal'))->whereIn('vendorcode',$vendor_code)->get();
                    }elseif(request('cod_bridal') =="*" && request('size_bridal') !="*"){
                        $size_bridal = explode('-',request('size_bridal'),2); 
                        $size_from = $size_bridal[0];
                        $size_to = $size_bridal[1];
                        $datas = Bridalwear::whereBetween('size',[$size_from,$size_to])->whereIn('vendorcode',$vendor_code)->get();
                    }elseif(request('cod_bridal') !="*" && request('size_bridal') =="*"){
                        $datas = Bridalwear::where('cashondelivery',request('cod_bridal'))->whereIn('vendorcode',$vendor_code)->get();
                    }else{
                        // $datas = Bridalwear::all();
                    }
                     $final='';
                    foreach ($datas as $key => $data) {
                      $final = $final.'<div class="venues-slide first">
                                   <div class="img"><img src="'.$data->vendor->profilepicture.'"  alt="" width="450" height="260"></div>
                                   <div class="text">
                                      <h3>'.$data->vendor->ownername.'</h3>
                                      <div class="address">'.$data->vendor->serviceablearea.','.$data->vendor->businesslocation.'</div>
                                      <div class="reviews">
                                         3.5 
                                         <div class="star">
                                            <div class="fill" style="width:70%;"></div>
                                         </div>
                                         reviews
                                      </div>
                                      <div>
                                         <div class="outher-info">
                                            <div class="info-slide first">
                                               <label>Size</label>
                                               <span>'.$data->size.'</span>
                                            </div>
                                            <div class="info-slide">
                                               <label>Shipping</label>
                                               <span>'.$data->shipping.'</span>
                                            </div>
                                            <div class="info-slide">
                                               <label>Cash on Delivery</label>
                                               <span>'.$data->cashondelivery.'</span> 
                                            </div>
                                            <div class="info-slide livedemo">
                                               <label>Live Demo</label>
                                               <span >'.$data->livedemo.'</span>
                                            </div>
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
                                                  <div class="note">Lorem Ipsum has been the industry s standard dummy text ever since the 1500s.</div>
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
                                   </div></div>
                                ';
                    }
                    return $final;
                break;
                case 'Cakes':
                  $service_name = "Cakes";
                  if (request('cd_cake') !="*" && request('size_cake') !="*") {
                      $size_cake = explode('-',request('size_cake'),2); 
                      $size_from = $size_cake[0];
                      $size_to = $size_cake[1];
                      $datas = Cakes::whereBetween('cakesize',[$size_from,$size_to])->where('cakedelivery',request('cd_cake'))->whereIn('vendorcode',$vendor_code)->get();
                     }elseif(request('cd_cake') =="*" && request('size_cake') !="*"){
                        $size_cake = explode('-',request('size_cake'),2); 
                        $size_from = $size_cake[0];
                        $size_to = $size_cake[1];
                        $datas = Cakes::whereBetween('cakesize',[$size_from,$size_to])->whereIn('vendorcode',$vendor_code)->get();
                     }elseif(request('cd_cake') !="*" && request('size_cake') =="*"){
                        $datas = Cakes::where('cakedelivery',request('cd_cake'))->whereIn('vendorcode',$vendor_code)->get();

                      }
                      
                        $final='';
                    foreach ($datas as $key => $data) {
                      $final = $final.'<div class="venues-slide first">
                                   <div class="img"><img src="'.$data->vendor->profilepicture.'"  alt="" width="450" height="260"></div>
                                   <div class="text">
                                      <h3>'.$data->vendor->ownername.'</h3>
                                      <div class="address">'.$data->vendor->serviceablearea.','.$data->vendor->businesslocation.'</div>
                                      <div class="reviews">
                                         3.5 
                                         <div class="star">
                                            <div class="fill" style="width:70%;"></div>
                                         </div>
                                         reviews
                                      </div>
                                      <div>
                                         <div class="outher-info">
                                            <div class="info-slide first">
                                               <label>Type of cake</label>
                                               <span>'.$data->typeofcake.'</span>
                                            </div>
                                            <div class="info-slide">
                                               <label>Cake Size</label>
                                               <span>'.$data->cakesize.'</span>
                                            </div>
                                            <div class="info-slide">
                                               <label>Delivery Type</label>
                                               <span>'.$data->cakedelivery.'</span> 
                                            </div>
                                            <div class="info-slide livedemo">
                                               <label>Service Charge</label>
                                               <span >'.$data->servicecharge.'</span>
                                            </div>
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
                                                  <div class="note">Lorem Ipsum has been the industry s standard dummy text ever since the 1500s.</div>
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
                                   </div></div>
                                ';
                    }
                    return $final;
                break;
                case 'GroomWear':
                   $service_name = "GroomWear";
                   if (request('cod_groom') !="*" && request('size_groom') !="*") {
                        $size_groom = explode('-',request('size_groom'),2); 
                        $size_from = $size_groom[0];
                        $size_to = $size_groom[1];
                        $datas = Grooming::whereBetween('size',[$size_from,$size_to])->where('cashondelivery',request('cod_groom'))->whereIn('vendorcode',$vendor_code)->get();
                    }elseif(request('cod_groom') =="*" && request('size_groom') !="*"){
                        $size_groom = explode('-',request('size_groom'),2); 
                        $size_from = $size_groom[0];
                        $size_to = $size_groom[1];
                        $datas = Grooming::whereBetween('size',[$size_from,$size_to])->whereIn('vendorcode',$vendor_code)->get();
                    }elseif(request('cod_groom') !="*" && request('size_groom') =="*"){
                        $datas = Grooming::where('cashondelivery',request('cod_groom'))->whereIn('vendorcode',$vendor_code)->get();
                    }else{
                        $datas = Grooming::all();
                    }
                    $final='';
                    foreach ($datas as $key => $data) {
                      $final = $final.'<div class="venues-slide first">
                                   <div class="img"><img src="'.$data->vendor->profilepicture.'"  alt="" width="450" height="260"></div>
                                   <div class="text">
                                      <h3>'.$data->vendor->ownername.'</h3>
                                      <div class="address">'.$data->vendor->serviceablearea.','.$data->vendor->businesslocation.'</div>
                                      <div class="reviews">
                                         3.5 
                                         <div class="star">
                                            <div class="fill" style="width:70%;"></div>
                                         </div>
                                         reviews
                                      </div>
                                      <div>
                                         <div class="outher-info">
                                            <div class="info-slide first">
                                               <label>Size</label>
                                               <span>'.$data->size.'</span>
                                            </div>
                                            <div class="info-slide">
                                               <label>Shipping</label>
                                               <span>'.$data->shipping.'</span>
                                            </div>
                                            <div class="info-slide">
                                               <label>Cash on Delivery</label>
                                               <span>'.$data->cashondelivery.'</span> 
                                            </div>
                                            <div class="info-slide livedemo">
                                               <label>Live Demo</label>
                                               <span >'.$data->livedemo.'</span>
                                            </div>
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
                                                  <div class="note">Lorem Ipsum has been the industry s standard dummy text ever since the 1500s.</div>
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
                                   </div></div>
                                ';
                              }
                              return $final;
                break;
                case 'DJ':
                    $service_name = "DJ";
                      if (request('pricing') !="*" && request('service_charge') !="*") {
                        $service_charge = explode('-',request('service_charge'),2); 
                        $size_from = $service_charge[0];
                        $size_to = $service_charge[1];
                        $datas = Dj::whereBetween('servicecharge',[$size_from,$size_to])->where('pricing',request('pricing'))->whereIn('vendorcode',$vendor_code)->get();
                        }elseif(request('pricing') =="*" && request('service_charge') !="*"){
                        $service_charge = explode('-',request('service_charge'),2); 
                        $size_from = $service_charge[0];
                        $size_to = $service_charge[1];
                        $datas = Dj::whereBetween('servicecharge',[$size_from,$size_to])->whereIn('vendorcode',$vendor_code)->get();
                        }elseif(request('pricing') !="*" && request('service_charge') =="*"){
                       $datas = Dj::where('pricing',request('pricing'))->whereIn('vendorcode',$vendor_code)->get();
                      }                      
                        $final='';
                      foreach ($datas as $key => $data) {
                      $final = $final.'<div class="venues-slide first">
                                   <div class="img"><img src="'.$data->vendor->profilepicture.'"  alt="" width="450" height="260"></div>
                                   <div class="text">
                                      <h3>'.$data->vendor->ownername.'</h3>
                                      <div class="address">'.$data->vendor->serviceablearea.','.$data->vendor->businesslocation.'</div>
                                      <div class="reviews">
                                         3.5 
                                         <div class="star">
                                            <div class="fill" style="width:70%;"></div>
                                         </div>
                                         reviews
                                      </div>
                                      <div>
                                         <div class="outher-info">
                                            <div class="info-slide first">
                                               <label>Type of DJ</label>
                                               <span>'.$data->typeofdj.'</span>
                                            </div>
                                            <div class="info-slide">
                                               <label>Pricing</label>
                                               <span>'.$data->pricing.'</span>
                                            </div>
                                            <div class="info-slide">
                                               <label>Service Charge</label>
                                               <span>'.$data->servicecharge.'</span> 
                                            </div>
                                            <div class="info-slide livedemo">
                                               <label>Product Title</label>
                                               <span >'.$data->producttitle.'</span>
                                            </div>
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
                                                  <div class="note">Lorem Ipsum has been the industry s standard dummy text ever since the 1500s.</div>
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
                                   </div></div>
                                ';
                      }
                    return $final;
                break;
                case 'GuestCompliments':
                   $service_name = "GuestCompliments";
                      if (request('pricing') !="*" && request('service_charge') !="*") {
                        $service_charge = explode('-',request('service_charge'),2); 
                        $size_from = $service_charge[0];
                        $size_to = $service_charge[1];
                        $datas = Gift::whereBetween('servicecharge',[$size_from,$size_to])->where('pricing',request('pricing'))->whereIn('vendorcode',$vendor_code)->get();
                        }elseif(request('pricing') =="*" && request('service_charge') !="*"){
                        $service_charge = explode('-',request('service_charge'),2); 
                        $size_from = $service_charge[0];
                        $size_to = $service_charge[1];
                        $datas = Gift::whereBetween('servicecharge',[$size_from,$size_to])->whereIn('vendorcode',$vendor_code)->get();
                        }elseif(request('pricing') !="*" && request('service_charge') =="*"){
                        $datas = Gift::where('pricing',request('pricing'))->whereIn('vendorcode',$vendor_code)->get();
                        }       

                          $final='';
                            foreach ($datas as $key => $data) {
                              $final = $final.'<div class="venues-slide first">
                                   <div class="img"><img src="'.$data->vendor->profilepicture.'"  alt="" width="450" height="260"></div>
                                   <div class="text">
                                      <h3>'.$data->vendor->ownername.'</h3>
                                      <div class="address">'.$data->vendor->serviceablearea.','.$data->vendor->businesslocation.'</div>
                                      <div class="reviews">
                                         3.5 
                                         <div class="star">
                                            <div class="fill" style="width:70%;"></div>
                                         </div>
                                         reviews
                                      </div>
                                      <div>
                                         <div class="outher-info">
                                            <div class="info-slide first">
                                               <label>Type of Gift</label>
                                               <span>'.$data->typeofgift.'</span>
                                            </div>
                                            <div class="info-slide livedemo">
                                               <label>Product Title</label>
                                               <span >'.$data->producttitle.'</span>
                                            </div>
                                            <div class="info-slide">
                                               <label>Pricing</label>
                                               <span>'.$data->pricing.'</span>
                                            </div>
                                            <div class="info-slide">
                                               <label>Service Charge</label>
                                               <span>'.$data->servicecharge.'</span> 
                                            </div>
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
                                                  <div class="note">Lorem Ipsum has been the industry s standard dummy text ever since the 1500s.</div>
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
                                   </div></div>
                                ';
                             }
                         return $final;
                break;
                case 'Catering':
                   $service_name = "Catering";
                      if (request('food') !="*" && request('meal') !="*") {
                        $datas = Caterings::where('typeoffood',request('food'))->where('typeofmeal',request('meal'))->whereIn('vendorcode',$vendor_code)->get();
                        }elseif(request('food') =="*" && request('meal') !="*"){
                        $datas = Caterings::where('typeoffood',request('food'))->where('typeofmeal',request('meal'))->whereIn('vendorcode',$vendor_code)->get();
                        }elseif(request('food') !="*" && request('meal') =="*"){
                        $datas = Caterings::where('typeoffood',request('food'))->where('typeofmeal',request('meal'))->whereIn('vendorcode',$vendor_code)->get();
                        }       

                          $final='';
                            foreach ($datas as $key => $data) {
                              $final = $final.'<div class="venues-slide first">
                                   <div class="img"><img src="'.$data->vendor->profilepicture.'"  alt="" width="450" height="260"></div>
                                   <div class="text">
                                      <h3>'.$data->vendor->ownername.'</h3>
                                      <div class="address">'.$data->vendor->serviceablearea.','.$data->vendor->businesslocation.'</div>
                                      <div class="reviews">
                                         3.5 
                                         <div class="star">
                                            <div class="fill" style="width:70%;"></div>
                                         </div>
                                         reviews
                                      </div>
                                      <div>
                                         <div class="outher-info">
                                            <div class="info-slide first">
                                               <label>Type of Dining</label>
                                               <span>'.$data->typeofdining.'</span>
                                            </div>
                                            <div class="info-slide livedemo">
                                               <label>Type of Food</label>
                                               <span >'.$data->typeoffood.'</span>
                                            </div>
                                            <div class="info-slide">
                                               <label>Type of Meal</label>
                                               <span>'.$data->typeofmeal.'</span>
                                            </div>
                                            <div class="info-slide">
                                               <label>Menu</label>
                                               <span>'.$data->menu.'</span> 
                                            </div>
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
                                                  <div class="note">Lorem Ipsum has been the industry s standard dummy text ever since the 1500s.</div>
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
                                   </div></div>
                                ';
                             }
                         return $final;
                break;
                case 'HairStylist':
                   $service_name = "HairStylist";
                      if (request('pricing') !="*" && request('service_charge') !="*") {
                        $service_charge = explode('-',request('service_charge'),2); 
                        $size_from = $service_charge[0];
                        $size_to = $service_charge[1];
                        $datas = Makeup::whereBetween('servicecharge',[$size_from,$size_to])->where('pricing',request('pricing'))->whereIn('vendorcode',$vendor_code)->get();
                        }elseif(request('pricing') =="*" && request('service_charge') !="*"){
                        $service_charge = explode('-',request('service_charge'),2); 
                        $size_from = $service_charge[0];
                        $size_to = $service_charge[1];
                        $datas = Makeup::whereBetween('servicecharge',[$size_from,$size_to])->whereIn('vendorcode',$vendor_code)->get();
                        }elseif(request('pricing') !="*" && request('service_charge') =="*"){
                        $datas = Makeup::where('pricing',request('pricing'))->whereIn('vendorcode',$vendor_code)->get();
                        }       

                          $final='';
                            foreach ($datas as $key => $data) {
                              $final = $final.'<div class="venues-slide first">
                                   <div class="img"><img src="'.$data->vendor->profilepicture.'"  alt="" width="450" height="260"></div>
                                   <div class="text">
                                      <h3>'.$data->vendor->ownername.'</h3>
                                      <div class="address">'.$data->vendor->serviceablearea.','.$data->vendor->businesslocation.'</div>
                                      <div class="reviews">
                                         3.5 
                                         <div class="star">
                                            <div class="fill" style="width:70%;"></div>
                                         </div>
                                         reviews
                                      </div>
                                      <div>
                                         <div class="outher-info">
                                            <div class="info-slide livedemo">
                                               <label>Product Title</label>
                                               <span >'.$data->producttitle.'</span>
                                            </div>
                                            <div class="info-slide livedemo">
                                               <label>Makeupfor</label>
                                               <span >'.$data->makeupfor.'</span>
                                            </div>
                                            <div class="info-slide">
                                               <label>Pricing</label>
                                               <span>'.$data->pricing.'</span>
                                            </div>
                                            <div class="info-slide">
                                               <label>Service Charge</label>
                                               <span>'.$data->servicecharge.'</span> 
                                            </div>
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
                                                  <div class="note">Lorem Ipsum has been the industry s standard dummy text ever since the 1500s.</div>
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
                                   </div></div>
                                ';
                             }
                         return $final;
                break;

                case 'LightMusic':
                   $service_name = "LightMusic";
                      if (request('pricing') !="*" && request('service_charge') !="*") {
                        $service_charge = explode('-',request('service_charge'),2); 
                        $size_from = $service_charge[0];
                        $size_to = $service_charge[1];
                        $datas = Music::whereBetween('servicecharge',[$size_from,$size_to])->where('pricing',request('pricing'))->whereIn('vendorcode',$vendor_code)->get();
                        }elseif(request('pricing') =="*" && request('service_charge') !="*"){
                        $service_charge = explode('-',request('service_charge'),2); 
                        $size_from = $service_charge[0];
                        $size_to = $service_charge[1];
                        $datas = Music::whereBetween('servicecharge',[$size_from,$size_to])->whereIn('vendorcode',$vendor_code)->get();
                        }elseif(request('pricing') !="*" && request('service_charge') =="*"){
                        $datas = Music::where('pricing',request('pricing'))->whereIn('vendorcode',$vendor_code)->get();
                        }       

                          $final='';
                            foreach ($datas as $key => $data) {
                              $final = $final.'<div class="venues-slide first">
                                   <div class="img"><img src="'.$data->vendor->profilepicture.'"  alt="" width="450" height="260"></div>
                                   <div class="text">
                                      <h3>'.$data->vendor->ownername.'</h3>
                                      <div class="address">'.$data->vendor->serviceablearea.','.$data->vendor->businesslocation.'</div>
                                      <div class="reviews">
                                         3.5 
                                         <div class="star">
                                            <div class="fill" style="width:70%;"></div>
                                         </div>
                                         reviews
                                      </div>
                                      <div>
                                         <div class="outher-info">
                                            <div class="info-slide livedemo">
                                               <label>Type of Music</label>
                                               <span >'.$data->typeofmusic.'</span>
                                            </div>
                                            <div class="info-slide livedemo">
                                               <label>Product Title</label>
                                               <span >'.$data->producttitle.'</span>
                                            </div>
                                            <div class="info-slide">
                                               <label>Pricing</label>
                                               <span>'.$data->pricing.'</span>
                                            </div>
                                            <div class="info-slide">
                                               <label>Service Charge</label>
                                               <span>'.$data->servicecharge.'</span> 
                                            </div>
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
                                                  <div class="note">Lorem Ipsum has been the industry s standard dummy text ever since the 1500s.</div>
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
                                   </div></div>
                                ';
                             }
                         return $final;

                case 'Choreographers':
                   $service_name = "Choreographers";
                      if (request('pricing') !="*" && request('service_charge') !="*") {
                        $service_charge = explode('-',request('service_charge'),2); 
                        $size_from = $service_charge[0];
                        $size_to = $service_charge[1];
                        $datas = Choreographer::whereBetween('servicecharge',[$size_from,$size_to])->where('pricing',request('pricing'))->whereIn('vendorcode',$vendor_code)->get();
                        }elseif(request('pricing') =="*" && request('service_charge') !="*"){
                        $service_charge = explode('-',request('service_charge'),2); 
                        $size_from = $service_charge[0];
                        $size_to = $service_charge[1];
                        $datas = Choreographer::whereBetween('servicecharge',[$size_from,$size_to])->whereIn('vendorcode',$vendor_code)->get();
                        }elseif(request('pricing') !="*" && request('service_charge') =="*"){
                        $datas = Choreographer::where('pricing',request('pricing'))->whereIn('vendorcode',$vendor_code)->get();
                        }       

                          $final='';
                            foreach ($datas as $key => $data) {
                              $final = $final.'<div class="venues-slide first">
                                   <div class="img"><img src="'.$data->vendor->profilepicture.'"  alt="" width="450" height="260"></div>
                                   <div class="text">
                                      <h3>'.$data->vendor->ownername.'</h3>
                                      <div class="address">'.$data->vendor->serviceablearea.','.$data->vendor->businesslocation.'</div>
                                      <div class="reviews">
                                         3.5 
                                         <div class="star">
                                            <div class="fill" style="width:70%;"></div>
                                         </div>
                                         reviews
                                      </div>
                                      <div>
                                         <div class="outher-info">
                                            <div class="info-slide livedemo">
                                               <label>Type of Choreography</label>
                                               <span >'.$data->typeofchoreography.'</span>
                                            </div>
                                            <div class="info-slide livedemo">
                                               <label>Product Title</label>
                                               <span >'.$data->producttitle.'</span>
                                            </div>
                                            <div class="info-slide">
                                               <label>Pricing</label>
                                               <span>'.$data->pricing.'</span>
                                            </div>
                                            <div class="info-slide">
                                               <label>Service Charge</label>
                                               <span>'.$data->servicecharge.'</span> 
                                            </div>
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
                                                  <div class="note">Lorem Ipsum has been the industry s standard dummy text ever since the 1500s.</div>
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
                                   </div></div>
                                ';
                             }
                         return $final;

               case 'Videographers':
                  $service_name = "Videographers";
                    if (request('pricing') !="*" && request('service_charge') !="*") {
                        $service_charge = explode('-',request('service_charge'),2); 
                        $size_from = $service_charge[0];
                        $size_to = $service_charge[1];
                        $datas = Videography::whereBetween('servicecharge',[$size_from,$size_to])->where('pricing',request('pricing'))->whereIn('vendorcode',$vendor_code)->get();
                        }elseif(request('pricing') =="*" && request('service_charge') !="*"){
                        $service_charge = explode('-',request('service_charge'),2); 
                        $size_from = $service_charge[0];
                        $size_to = $service_charge[1];
                        $datas = Videography::whereBetween('servicecharge',[$size_from,$size_to])->whereIn('vendorcode',$vendor_code)->get();
                        }elseif(request('pricing') !="*" && request('service_charge') =="*"){
                        $datas = Videography::where('pricing',request('pricing'))->whereIn('vendorcode',$vendor_code)->get();
                        }       

                          $final='';
                            foreach ($datas as $key => $data) {
                              $final = $final.'<div class="venues-slide first">
                                   <div class="img"><img src="'.$data->vendor->profilepicture.'"  alt="" width="450" height="260"></div>
                                   <div class="text">
                                      <h3>'.$data->vendor->ownername.'</h3>
                                      <div class="address">'.$data->vendor->serviceablearea.','.$data->vendor->businesslocation.'</div>
                                      <div class="reviews">
                                         3.5 
                                         <div class="star">
                                            <div class="fill" style="width:70%;"></div>
                                         </div>
                                         reviews
                                      </div>
                                      <div>
                                         <div class="outher-info">
                                            <div class="info-slide livedemo">
                                               <label>Type of Videography</label>
                                               <span >'.$data->typeofvideography.'</span>
                                            </div>
                                            <div class="info-slide livedemo">
                                               <label>Style of Shoot</label>
                                               <span >'.$data->styleofshoot.'</span>
                                            </div>
                                            <div class="info-slide">
                                               <label>Pricing</label>
                                               <span>'.$data->pricing.'</span>
                                            </div>
                                            <div class="info-slide">
                                               <label>Service Charge</label>
                                               <span>'.$data->servicecharge.'</span> 
                                            </div>
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
                                                  <div class="note">Lorem Ipsum has been the industry s standard dummy text ever since the 1500s.</div>
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
                                   </div></div>
                                ';
                             }
                         return $final;
                break;
                
          }
    }
}
