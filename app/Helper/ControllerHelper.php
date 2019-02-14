<?php

namespace App\Helpers;
use App\Event;
use App\Vendor;
use App\Vendortype;
use App\vendorproductmaster;
use App\Admin;
use App\setting;
use App\Types;
use Auth;
class Helper
{

  public static function generate_code($last_data, $slug){
    $id = 0;
    if(!is_null ($last_data)) {
      $id = $last_data->id;
    }
    return $slug.($id+1);
  }

  public static function unApprovedCount(){
      return Vendor::where('verified',0)->get()->count();
  }

  public static function getVendortype(){
      return Vendortype::all();
  }

  public static function sendsms($phonenumber, $message){

          $url = 'http://www.krishsms.com/SendingSms.aspx';
          $fields_string ="";
          $fields = array( 'userid' =>urlencode('sigits'), 'pass'=>urlencode('SIGIsms0715@'), 'phone'=>urlencode($phonenumber), 'msg'=>urlencode($message));
          //url-ify
          foreach($fields as $key=>$value){
              $fields_string .= $key.'='.$value.'&'; rtrim($fields_string,'&');
          }
          rtrim($fields_string,'&');
          $url_final = $url.'?'.$fields_string;
          $ch = curl_init();
          curl_setopt($ch,CURLOPT_URL,$url_final);
          $result = curl_exec($ch);
          curl_close($ch);

  }

  public static function getVendorname($ids){
    if(is_array($ids)){
      foreach ($ids as $id) {
        $vendornames[] = vendorproductmaster::where('id',$id)->first()->vendorproductname;
      }
      $vendorname = rtrim(implode(',', $vendornames), ',');
    }else{
     $vendorname = vendorproductmaster::where('id',$ids)->first()->vendorproductname;
    }
     return $vendorname;
  }


 public static function getadmindetail(){
      return Admin::all();
  }
    public static function upload_picture($picture)
    {
        $file_name = time();
        $file_name .= rand();
        $file_name = sha1($file_name);
        if ($picture) {
            $ext = $picture->getClientOriginalExtension();
            $picture->move(public_path() . "/uploads", $file_name . "." . $ext);
            $local_url = $file_name . "." . $ext;

            $s3_url = url('/').'/uploads/'.$local_url;

            return $s3_url;
        }
        return "";
    }

    public static function getVendormaster(){
      return vendorproductmaster::orderBy('vendorproductname', 'asc')->get();

    }

    public static function getUsermaster(){
        return Vendor::orderBy('id', 'asc')->get();
    }

    public static function getEvent(){
      return Event::orderBy('id', 'asc')->get();
    }

   public static function sitesetting(){
      return setting::where('id',1)->get();
  }
   public static function getTypes(){
    $types = Types::get()->all();
    return $types;
  }
  public static function viewVendormaster(){
    $vendor_type = Auth::user()->vendortype;
    $vendor_type = unserialize($vendor_type);
    return $vendor_type_name = vendorproductmaster::whereIn('id', $vendor_type)->get();
  }
}