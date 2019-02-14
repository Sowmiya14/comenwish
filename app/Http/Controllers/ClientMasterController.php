<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Bridalwear;
use App\Cakes;
use App\Caterings;
use App\Dj;
use App\Grooming;
use App\Gift;
use App\Makeup;
use App\Music;
use App\Videography;
use App\Choreographer;
use App\Vendor;

class ClientMasterController extends Controller
{
	public function index(){
		return view('client.index');
	}
	public function about(){
		return view('client.aboutus');
	}
	public function faq(){
		return view('client.faq');
	}
	public function contact(){
		return view('client.contact');
	}
	public function listing(){
        $location = request('location');
        $vendor_data = Vendor::where('serviceablearea',$location)->get();
        foreach ($vendor_data as $key => $value){
            $vendor_code[] =  $value->vendorcode;
            }
            if(empty($vendor_code)){
                $vendor_code = array();
            }
        switch(request('service_name')){
                case 'BridalWear':
                    $service_name = "BridalWear";
                    $datas = Bridalwear::whereIn('vendorcode',$vendor_code)->get();    
                    return view('client.listing', compact('datas','service_name','location'));
                break;
                 
                case 'Cakes':
                     $datas = Cakes::whereIn('vendorcode',$vendor_code)->get();
                     $service_name = "Cakes";
                     return view('client.listing', compact('datas','service_name','location'));
                break;

                case 'Catering':
                     $datas = Caterings::whereIn('vendorcode',$vendor_code)->get();    
                     $service_name = "Catering";
                     return view('client.listing', compact('datas','service_name','location'));
                 break;
               
                case 'DJ':
                     $datas = Dj::whereIn('vendorcode',$vendor_code)->get();
                     $service_name = "DJ";
                     return view('client.listing', compact('datas','service_name','location'));
                 break;

                case 'GroomWear':
                     $datas = Grooming::whereIn('vendorcode',$vendor_code)->get();
                     $service_name = "GroomWear";
                     return view('client.listing', compact('datas','service_name','location'));
                 break;

                case 'GuestCompliments':
                     $datas = Gift::whereIn('vendorcode',$vendor_code)->get();
                     $service_name = "GuestCompliments";
                     return view('client.listing', compact('datas','service_name','location'));
                 break;
            
                case 'HairStylist':
                     $datas = Makeup::whereIn('vendorcode',$vendor_code)->get();
                     $service_name = "HairStylist";
                     return view('client.listing', compact('datas','service_name','location'));
                 break;

                case 'LightMusic':
                     $datas = Music::whereIn('vendorcode',$vendor_code)->get();
                     $service_name = "LightMusic";
                     return view('client.listing', compact('datas','service_name','location'));
                 break;


                case 'Videographers':
                     $datas = Videography::whereIn('vendorcode',$vendor_code)->get();
                     $service_name = "Videographers";
                     return view('client.listing', compact('datas','service_name','location'));
                 break;
                
                case 'Choreographers':
                     $datas = Choreographer::whereIn('vendorcode',$vendor_code)->get();
                     $service_name = "Choreographers";
                     return view('client.listing', compact('datas','service_name','location'));
                 break;
               
          }
        return 0;
    }
 
}
