<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Vendor;
use App\verifyvendorproduct;
use Auth;

class ProductController extends Controller
{
    public function __construct(){
        $this->middleware('vendor');
    }

    public function addProducts(){
        return view('vendor.products.add');
    }

    public function viewProducts(){
        return view('vendor.products.view');
    }

    public function updateVendorCategory(Request $request){
    	request()->server('HTTP_REFERER');
        $data_count = verifyvendorproduct::where('vendor_id',Auth::user()->id)->where('vendorproduct_id',request('catagory_value'))->count();
        if($data_count >0){
            return 2;
        }else{
            $verify_vendor = new verifyvendorproduct;
            $verify_vendor->vendor_id = Auth::user()->id;
            $verify_vendor->vendorproduct_id = request('catagory_value');
            $verify_vendor->vendorcode = Auth::user()->vendorcode;
            $verify_vendor->save();
            return 1; 
        }
        
     //    $verify_vendor = new verifyvendorproduct;
     //    $verify_vendor->vendor_id = Auth::user()->id;
     //    $verify_vendor->vendorproduct_id = request('catagory_value');
     //    $verify_vendor->save();
    	// return 1;   
        // $vendortype = Auth::user()->vendortype;
        // $vendortype = unserialize($vendortype);
        // array_push($vendortype,request('catagory_value'));
        // $vendor = Vendor::find(Auth::user()->id);
        // $vendor->vendortype = serialize($vendortype);
        // $vendor->save();
    }

}
