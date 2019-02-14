<?php
/**
 * Created by PhpStorm.
 * User: Sudhakar Annadurai
 * Date: 19/5/18
 * Time: 3:21 PM
 */
namespace App\Http\Controllers;
use App\Vendortype;
use App\Vendor;
use App\vendorproductmaster;
use App\Admin;
use App\Password;
use Auth;
use Hash;
use App\Http\Requests;
use \App\Helpers\Helper;
use Illuminate\Http\Request;
use App\verifyvendorproduct;
class VendorController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
    public function index(){
        $datas = vendorproductmaster::all();
        return view('admin.vendor.add_vendor', compact('datas'));
    }
    public  function  store(Request $request){
        $this->validate(request(),[
            'ownername'=>'required',
            'email'=>'required|unique:vendors',
            'mobilenumber'=>'required',
            'profilepicture'=>'required',
            'contactpersonname1'=>'required',
            'contactpersonmobileno1'=>'required',
            'password'=>'required',
            'businessname'=>'required',
            'businesslogo'=>'required',
            'vendortype' => 'required',
            'gstnumber'=>'required',
            'businesslocation'=>'required',
            'serviceablearea'=>'required',
            
        ]);
          
            $profilepicture = $request->file('profilepicture');
            $businesslogo = $request->file('businesslogo');
            $profilepicture = Helper::upload_picture($profilepicture);
            $businesslogo  = Helper::upload_picture($businesslogo);
        Vendor::create([
            'vendorcode'=>Helper::generate_code(Vendor::latest()->first(),"vendor"),
            'ownername'=>request('ownername'),
            'email'=>request('email'),
            'mobilenumber'=>request('mobilenumber'),
            'profilepicture'=>$profilepicture,
            'contactpersonname1'=>request('contactpersonname1'),
            'contactpersonmobileno1'=>request('contactpersonmobileno1'),
            'contactpersonname2'=>request('contactpersonname2'),
            'contactpersonmobileno2'=>request('contactpersonmobileno2'),
            'password'=>bcrypt(request('password')),
            'businessname'=>request('businessname'),
            'businesslogo'=>$businesslogo,
            'vendortype'=>serialize(request('vendortype')),
            'gstnumber'=>request('gstnumber'),
            'verified'=>1,
            'businesslocation'=>request('businesslocation'),
            'serviceablearea'=>request('serviceablearea'),
            'status'=>'1',
            'createdby'=>auth()->user()->id,
            'updatedby'=>auth()->user()->id,
        ]);
        return back()->with('success','New Vendor Created Successfully');
    }
    public function delete($id){
       try{
           $Request = Vendortype::findOrfail($id);
           $Request->delete();
           return back();
       } catch (Exception $e){
           return back();
       }
    }
    public function showUnApprovedVendors(){
        $datas = Vendor::where('verified',0)->get();
        return view('admin.vendor.approve_vendor', compact('datas'));
    }
    public function approveVendor($id){
        Vendor::where('id',$id)->update([
            'verified' => 1,
        ]);
        return redirect('admin/vendor')->with('success','Vendor Verified Successfully');
    }

    public function blockVendor($id){
      if(request()->server('HTTP_REFERER')){
      Vendor::where('id',$id)->update([
        'verified' => 2,
      ]);
      return back()->with('success','Vendor Blocked Successfully');
        }else{
          return back();
          }
      }
      
    public function vendorindex(){
        $datas = Vendor::where('verified',1)->get();
        return view('admin.vendor.index', compact('datas'));
    }

    public function view($id){
       $viewvendor = Vendor::find($id);
       return view('admin.vendor.view_vendor',compact('viewvendor'));
    }
    public function deleteVendor($id){
         $Request = Vendor::findOrfail($id);
           $Request->delete();
            return back()->with('success','Vendor  Deleted Successfully');
    }
    public function showEditVendor($id){
        $editvendor = Vendor::find($id);
        $vendor_type = vendorproductmaster::all();
        return view('admin.vendor.edit_vendor',compact('editvendor','vendor_type'));
    }
    public function updateVendor($id,Request $request){
        $vendor = Vendor::findOrfail($id);
        $vendor->ownername = request('ownername');
        $vendor->email = request('email');
        $vendor->mobilenumber = request('mobilenumber');
         if ($request->file('profilepicture')) {
                $profilepicture= Helper::upload_picture($request->file('profilepicture'));
                $vendor->profilepicture = $profilepicture;
            }  
        $vendor->contactpersonname1 = request('contactpersonname1');
        $vendor->contactpersonmobileno1 = request('contactpersonmobileno1');
        $vendor->contactpersonname2 = request('contactpersonname2');
        $vendor->contactpersonmobileno2 = request('contactpersonmobileno2');
        $vendor->businessname = request('businessname');
         if ($request->file('businesslogo')) {
                $businesslogo= Helper::upload_picture($request->file('businesslogo'));
                $vendor->businesslogo = $businesslogo;
            }
        $vendor->vendortype = serialize(request('vendortype'));
        $vendor->gstnumber = request('gstnumber');
        $vendor->verified = 1;
        $vendor->businesslocation = request('businesslocation');
        $vendor->serviceablearea = request('serviceablearea');
        $vendor->status = '1';
        $vendor->createdby = auth()->user()->id;
        $vendor->updatedby = auth()->user()->id;
        $vendor->save();
        return back()->with('success','Vendor  Updated Successfully');
    }
     public  function account(){
    
      $datas = auth()->user();
      return view('admin.account',compact('datas'));
}
   
     public function updateaccount($id,Request $request){
       $image = $request->file('profilepicture');
        Admin::where('id',$id)->update([
            'name'=>request('name'),
            'email'=>request('email'),
            'profilepicture'=>Helper::upload_picture($image),
            ]);
        return back()->with('success','Account Updated Successfully');
    }
     public  function password(){
    
      $datas = auth()->user();
      return view('admin.password',compact('datas'));
}
    public function updatepassword(){
    $oldpassword = request('oldpassword');
    $newpassword = request('newpassword');
    $confirmpassword = request('confirmpassword');
    $admin = Admin::findOrfail(Auth::user()->id);
    if($newpassword === $confirmpassword){
         if(Hash::check($oldpassword,$admin->password)){
          $admin->password = bcrypt($newpassword);
          $admin->save();
                return back()->with('success','Password Changed Successfully');
           }else{
               return back()->with('danger','Enter Correct Old Password');
           }
       }else{
           return back()->with('danger','Password Does Not Match');
       }
       
   }

   public function blockedVendor(){
        $datas = Vendor::where('verified','2')->get();
        return view('admin.vendor.blocked_vendor',compact('datas'));
   }

   public function unblockedVendor($id){
    if(request()->server('HTTP_REFERER')){
        Vendor::where('id',$id)->update([
          'verified' => 1,
        ]);
        return back()->with('success','Vendor UnBlocked Successfully');
          }else{
            return back();
            }

   }

   public function viewVendortypeapprove(){
      $unapproved_vendortype = verifyvendorproduct::all();
      return view('admin.vendor.unapprove_vendor_type',compact('unapproved_vendortype'));
   }
  public function vendortypeapprove($id){
      $unapproved_vendortype = verifyvendorproduct::where('id',$id)->get()->first();
      $vendor = Vendor::where('id',$unapproved_vendortype->vendor_id)->first();
      $vendortype = unserialize($vendor->vendortype);
      array_push($vendortype,$unapproved_vendortype->vendorproduct_id);
      $vendor->vendortype = serialize($vendortype);
      $vendor->save();
      $verifyvendorproduct = verifyvendorproduct::where('id',$id)->delete();
     return back()->with('success','Vendortype Verified Successfully');
  } 
   
}
