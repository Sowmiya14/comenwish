<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sitesetting;
use App\setting;
use App\Http\Requests;
use \App\Helpers\Helper;




class SitesettingController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

     public function setting(){
     	// dd(request()->all());
       $datas = setting::all();
        return view('admin.sitesetting.sitesetting', compact('datas'));
     }	
     	 public function updatesetting($id,Request $request){
         $image = $request->file('brandicon');
         setting::where('id',$id)->update([
            'brandname'=>request('brandname'),
            'brandicon'=>Helper::upload_picture($image),
            'supportmail'=>request('supportmail'),
            'supportcontactnumber'=>request('supportcontactnumber'),
            'bookingidprefix'=>request('bookingidprefix'),
            'copyrightyear'=>request('copyrightyear'),
            ]);
       return back()->with('success','Updated Successfully ');
    }
 }