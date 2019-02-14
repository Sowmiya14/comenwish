<?php
/**
 * Created by PhpStorm.
 * User: SudhakarAnnadurai
 * Date: 22/05/18
 * Time: 4:41 PM
 */

namespace App\Http\Controllers;
use App\Bridalwear;
use App\catering;
use App\Choreographer;
use App\Dj;
use App\Gift;
use App\Grooming;
use App\Makeup;
use App\Music;
use App\Transport;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Decoration;
use App\Videography;
use App\Photography;
use App\Vendor;
use App\Cakes;
use App\Helpers\Helper;
use App\Locationmaster;
use Auth;
use Hash;
use App\vendorproductmaster;
use App\venue;



class VendorMasterController extends Controller
{


    public function __construct(){
        $this->middleware('vendor');
    }

    function sendOTP(){
        $phonenumber = Auth::user()->mobilenumber;
        $phonenumber = substr($phonenumber, -10);
        return view('vendor.verifyphonenumber',compact('phonenumber'));

    }

      public function account_kit(Request $request){

        // Initialize variables
        $app_id = env('FB_APP_ID');
        $secret = env('FB_APP_SECRET');
        $version = env('FB_APP_VERSION'); // 'v1.1' for example

        // Method to send Get request to url
        function doCurl($url) {
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, $url);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          $data = json_decode(curl_exec($ch), true);
          curl_close($ch);
          return $data;
        }

        // Exchange authorization code for access token
        $token_exchange_url = 'https://graph.accountkit.com/'.$version.'/access_token?'.
          'grant_type=authorization_code'.
          '&code='.$request->code.
          "&access_token=AA|$app_id|$secret";

        $data = doCurl($token_exchange_url);
        $user_id = $data['id'];
        $user_access_token = $data['access_token'];
        $refresh_interval = $data['token_refresh_interval_sec'];

        // Get Account Kit information
        $me_endpoint_url = 'https://graph.accountkit.com/'.$version.'/me?'.
          'access_token='.$user_access_token;
        $data = doCurl($me_endpoint_url);

        return $data;

    }

        public function verifyotp(Request $request){
        $verified_phone = request('mobilenumber');
        if(Auth::user()->mobilenumber ==$verified_phone){
            Vendor::where('id',Auth::user()->id )->update([
                'phonenumberverified' => 1,
            ]);
            return redirect('vendor/home');
        }else{
            return redirect('vendor/');
        }
    }


    public function showVenues(){
        return view('vendor.master.venues');
    }

    public function showCaterings(){
        return view('vendor.master.caterings');
    }

    public function addCaterings(Request $request){
        foreach ($request->file('productimageupload') as $image){
            if($image) {
                $file_url[] = Helper::upload_picture($image);
            }
        }


        catering::create([
            'cateringcode' => Helper::generate_code(catering::latest()->first(), "catering"),
            'vendorcode' => auth()->user()->vendorcode,
            'vendorproductcode' => 'vendorproduct_2',
            'typeofdining' => request('typeofdining'),
            'typeoffood' => request('typeoffood'),
            'typeofmeal' => request('typeofmeal'),
            'producttitle' => request('producttitle'),
            'serviceableevents' => serialize(request('serviceableevents')),
            'menu' => request('menu'),
            'maximumservinglimit' => request('maximumservinglimit'),
            'productimageupload' => serialize($file_url),
            'productprice' => request('productprice'),
            'ratevariationpercentage' => request('ratevariationpercentage'),
            'createdby' => auth()->user()->id,
            'updatedby' => auth()->user()->id,
        ]);
        return back()->with('success','Catering Created  Successfully ');
    }

    public function viewCaterings(){
        $datas = Vendor::find(auth()->user()->id)->catering()->get();
        return view('vendor.master.viewcatering', compact('datas'));
    }

    public function showEditCaterings($id){
        try {
            $data = catering::findOrfail($id);
            return view('vendor.master.editcatering', compact('data'));
        } catch (Exception $e) {
            return back()->with('wrong','Sorry! something Went To Wrong.');
        }
    }

    public function deleteCaterings($id){
        try {
            $Request = catering::findOrfail($id);
            $Request->delete();
            return back()->with('success','Catering Deleted Successfully ');
        } catch (Exception $e) {
            return back()->with('wrong','Sorry! something Went To Wrong.');
        }
    }




    public function updateCaterings($id, Request $request){
            $data = catering::findOrfail($id);
            $data ->typeofdining =  request('typeofdining');
            $data ->typeoffood =  request('typeoffood');
            $data ->typeofmeal =  request('typeofmeal');
            $data ->producttitle =  request('producttitle');
            $data ->serviceableevents =  serialize(request('serviceableevents'));
            $data ->menu =  request('menu');
            $data ->maximumservinglimit =  request('maximumservinglimit');
        if ($request->file('productimageupload')) {
            foreach ($request->file('productimageupload') as $image){
                if($image) {
                    $file_url[] = Helper::upload_picture($image);
                }
            }
            $data->productimageupload = serialize($file_url);
        }

            $data ->productimageupload =  serialize($file_url);
            $data ->productprice =  request('productprice');
            $data ->ratevariationpercentage =  request('ratevariationpercentage');
            $data ->createdby =  auth()->user()->id;
            $data ->updatedby =  auth()->user()->id;
            $data->save();
        return back()->with('success','Catering Updated  Successfully ');
    }


     public function dashboard() {
        $count = 0;
        $count += Bridalwear::all()->count();
        $count += Cakes::all()->count();
        $count +=  Choreographer::all()->count();
        $count +=  Decoration::all()->count();
        $count += Dj::all()->count();
        $count += Gift::all()->count();
        $count +=  Grooming::all()->count();
        $count +=  Makeup::all()->count();
        $count +=  Music::all()->count();
        $count +=  Photography::all()->count();
        $count +=  Transport::all()->count();
        $count +=  Videography::all()->count();
        return view('vendor.home', Compact('count'));
     }

    //DJ

    public function showDj(){
        return view('vendor.master.dj');
    }

    public function addDj(Request $request){

        foreach ($request->file('productimageupload') as $image){
            if($image) {
                $file_url[] = Helper::upload_picture($image);
            }
        }


        Dj::create([
            'djcode' => Helper::generate_code(Dj::latest()->first(), "dj"),
            'vendorcode' => auth()->user()->vendorcode,
            'vendorproductcode' => 'vendorproduct_9',
            'typeofdj' => request('typeofdj'),
            'producttitle' => request('producttitle'),
            'serviceableevents' => serialize(request('serviceableevents')),
            'pricing' => request('pricing'),
            'productimageupload' => serialize($file_url),
            'productprice' => request('productprice'),
            'status' => '1',
            'ratevariationpercentage' => request('ratevariationpercentage'),
            'servicecharge' => request('servicecharge'),
            'createdby' => auth()->user()->id,
            'updatedby' => auth()->user()->id,
        ]);
        return back()->with('success','DJ Created  Successfully ');
    }

    public function viewDj(){
        $datas = Vendor::find(auth()->user()->id)->dj()->get();
        return view('vendor.master.viewdj', compact('datas'));
    }

    public function showEditDj($id){
        try {
            $data = Dj::findOrfail($id);
            return view('vendor.master.editdj', compact('data'));
        } catch (Exception $e) {
            return back();
        }
    }

    public function updateDj($id, Request $request){

        $music = Dj::findOrfail($id);
        $music->typeofdj = request('typeofdj');
        $music->producttitle = request('producttitle');
        $music->serviceableevents = serialize(request('serviceableevents'));
        $music->pricing = request('pricing');
        $music->productprice = request('productprice');
        $music->ratevariationpercentage = request('ratevariationpercentage');
        $music->servicecharge = request('servicecharge');
        if ($request->file('productimageupload')) {
            foreach ($request->file('productimageupload') as $image){
                if($image) {
                    $file_url[] = Helper::upload_picture($image);
                }
            }
            $music->productimageupload = serialize($file_url);
        }
        $music->save();

        return back()->with('success','DJ Updated Successfully ');

    }

    public function deleteDj($id){
        try {
            $Request = Dj::findOrfail($id);
            $Request->delete();
            return back()->with('success','DJ Deleted Successfully ');
        } catch (Exception $e) {
            return back()->with('wrong','Sorry! something Went To Wrong.');
        }
    }


    //BridalWear


    public function showBridalWear(){
        return view('vendor.master.bridalwear');
    }

    public function addBridalWear(Request $request){

        foreach ($request->file('productimageupload') as $image){
            if($image) {
                $file_url[] = Helper::upload_picture($image);
            }
        }

        Bridalwear::create([
            'bridalcode' => Helper::generate_code(Bridalwear::latest()->first(), "bridalcode"),
            'vendorcode' => auth()->user()->vendorcode,
            'vendorproductcode' => 'vendorproduct_7',
            'producttitle' => request('producttitle'),
            'productdescription' => request('productdescription'),
            'size' => request('size'),
            'shipping' => request('shipping'),
            'cashondelivery' => request('cashondelivery'),
            'livedemo' => request('livedemo'),
            'productimageupload' => serialize ($file_url),
            'productprice' => request('productprice'),
            'status' => '1',
            'ratevariationpercentage' => request('ratevariationpercentage'),
            'servicecharge' => request('servicecharge'),
            'createdby' => auth()->user()->id,
            'updatedby' => auth()->user()->id,
        ]);
 
        return back()->with('success','New Bridalwear Added Successfully ');
    }

    public function viewBridalWear(){
        $datas = Vendor::find(auth()->user()->id)->bridalwear()->get();
        return view('vendor.master.viewbridalwear', compact('datas'));
    }

    public function showEditBridalWear($id){
        try {
            $data = Bridalwear::findOrfail($id);
            return view('vendor.master.editbridalwear', compact('data'));
        } catch (Exception $e) {
            return back();
        }
    }

    public function updateBridalWear($id, Request $request){
        $bridalwear = Bridalwear::findOrfail($id);
        $bridalwear->producttitle = request('producttitle');
        $bridalwear->productdescription = request('productdescription');
        $bridalwear->size = request('size');
        $bridalwear->shipping = request('shipping');
        $bridalwear->cashondelivery = request('cashondelivery');
        $bridalwear->livedemo = request('livedemo');
        $bridalwear->productprice = request('productprice');
        $bridalwear->ratevariationpercentage = request('ratevariationpercentage');
        $bridalwear->servicecharge = request('servicecharge');
        if ($request->file('productimageupload')) {
            foreach ($request->file('productimageupload') as $image){
                if($image) {
                    $file_url[] = Helper::upload_picture($image);
                }
            }
            $bridalwear->productimageupload = serialize($file_url);
        }
        $bridalwear->save();

        return back()->with('success','Bridalwear Updated Successfully ');
    }

    public function deleteBridalWear($id){
        try {
            $Request = Bridalwear::findOrfail($id);
            $Request->delete();
            return back()->with('success','Bridalwear Deleted Successfully ');
        } catch (Exception $e) {
            return back()->with('wrong','Sorry! something Went To Wrong.');
        }
    }


    //Cakes

    public function showCakes(){
        return view('vendor.master.cakes');
    }

    public function showEditCakes($id){
        try {
            $data = Cakes::findOrfail($id);
            return view('vendor.master.editcakes', compact('data'));
        } catch (Exception $e) {
            return back();
        }
    }

    public function addCakes(Request $request){

        foreach ($request->file('productimageupload') as $image){
            if($image) {
                $file_url[] = Helper::upload_picture($image);
            }
        }

        Cakes::create([
            'cakecode' => Helper::generate_code(Cakes::latest()->first(), "Cakes"),
            'vendorcode' => auth()->user()->vendorcode,
            'vendorproductcode' => 'vendorproduct_12',
            'serviceablelocation' => request('serviceablelocation'),
            'typeofcake' => request('typeofcake'),
            'flavour' => request('flavour'),
            'producttitle' => request('producttitle'),
            'productdescription' => request('productdescription'),
            'cakedelivery' => request('cakedelivery'),
            'cakesize' => request('cakesize'),
            'pricing' => request('pricing'),
            'productprice' => request('productprice'),
            'ratevariationpercentage' => request('ratevariationpercentage'),
            'servicecharge' => request('servicecharge'),
            'productimageupload' => serialize($file_url),
            'status' => '1',
            'createdby' => auth()->user()->id,
            'updatedby' => auth()->user()->id,
        ]);
        return back()->with('success','New Cakes Added Successfully ');
    }

    public function updateCakes($id, Request $request){
        $cakes = Cakes::findOrfail($id);
        $cakes->serviceablelocation = request('serviceablelocation');
        $cakes->typeofcake = request('typeofcake');
        $cakes->flavour = request('flavour');
        $cakes->producttitle = request('producttitle');
        $cakes->productdescription = request('productdescription');
        $cakes->cakedelivery = request('cakedelivery');
        $cakes->cakesize = request('cakesize');
        $cakes->pricing = request('pricing');
        $cakes->productprice = request('productprice');
        $cakes->ratevariationpercentage = request('ratevariationpercentage');
        $cakes->servicecharge = request('servicecharge');
        if ($request->file('productimageupload')) {
            foreach ($request->file('productimageupload') as $image){
                if($image) {
                    $file_url[] = Helper::upload_picture($image);
                }
            }
            $cakes->productimageupload = serialize($file_url);
        }
        $cakes->save();
        return back()->with('success','Cakes Updated  Successfully ');
    }

    public function deleteCakes($id){
        try {
            $Request = Cakes::findOrfail($id);
            $Request->delete();
            return back()->with('success','Cakes Deleted Successfully ');
        } catch (Exception $e) {
            return back()->with('wrong','Sorry! something Went To Wrong.');
        }
    }

    public function viewCakes(){
        $datas = Cakes::where('createdby', auth()->user()->id)->get();
        return view('vendor.master.viewcakes', compact('datas'));
    }


    //MakeUp

    public function updateMakeUp($id, Request $request){
        $makeup = Makeup::findOrfail($id);
        $makeup->producttitle = request('producttitle');
        $makeup->productdescription = request('productdescription');
        $makeup->makeupfor = request('makeupfor');
        $makeup->pickupanddrop = request('pickupanddrop');
        $makeup->serviceableevents = serialize(request('serviceableevents'));
        $makeup->pricing = request('pricing');
        $makeup->ratevariationpercentage = request('ratevariationpercentage');
        $makeup->productprice = request('productprice');
        $makeup->servicecharge = request('servicecharge');
        if ($request->file('productimageupload')) {
            foreach ($request->file('productimageupload') as $image){
                if($image) {
                    $file_url[] = Helper::upload_picture($image);
                }
            }
            $makeup->productimageupload = serialize($file_url);
        }
        $makeup->save();

        return back()->with('success','Makeup Updated Successfully ');
    }

    public function addMakeUp(Request $request){

        foreach ($request->file('productimageupload') as $image){
            if($image) {
                $file_url[] = Helper::upload_picture($image);
            }
        }

        Makeup::create([
            'makeupcode' => Helper::generate_code(Makeup::latest()->first(), "makeup"),
            'vendorcode' => auth()->user()->vendorcode,
            'vendorproductcode' => 'vendorproduct_6',
            'producttitle' => request('producttitle'),
            'productdescription' => request('productdescription'),
            'makeupfor' => request('makeupfor'),
            'pickupanddrop' => request('pickupanddrop'),
            'serviceableevents' => serialize(request('serviceableevents')),
            'pricing' => request('pricing'),
            'productprice' => request('productprice'),
            'ratevariationpercentage' => request('ratevariationpercentage'),
            'servicecharge' => request('servicecharge'),
            'productimageupload' => serialize($file_url),
            'status' => '1',
            'createdby' => auth()->user()->id,
            'updatedby' => auth()->user()->id,
        ]);

        return back()->with('success','New Makeup Added Successfully ');
    }

    public function showMakeup(){
        return view('vendor.master.makeup');
    }

    public function viewMakeUp(){
        $datas = Vendor::find(auth()->user()->id)->makeup()->get();
        return view('vendor.master.viewmakeup', compact('datas'));
    }

    public function showEditMakeUp($id){
        try {
            $data = Makeup::findOrfail($id);
            return view('vendor.master.editmakeup', compact('data'));
        } catch (Exception $e) {
            return back();
        }
    }

    public function deleteMakeUp($id){
        try {
            $Request = Makeup::findOrfail($id);
            $Request->delete();
            return back()->with('success','Makeup Deleted Successfully ');
        } catch (Exception $e) {
            return back()->with('wrong','Sorry! something Went To Wrong.');
        }
    }


    //Grooming

    public function updateGrooming($id, Request $request){
        $grooming = Grooming::findOrfail($id);
        $grooming->producttitle = request('producttitle');
        $grooming->productdescription = request('productdescription');
        $grooming->size = request('size');
        $grooming->shipping = request('shipping');
        $grooming->cashondelivery = request('cashondelivery');
        $grooming->livedemo = request('livedemo');
        $grooming->pricing = request('pricing');
        $grooming->productprice = request('productprice');
        $grooming->ratevariationpercentage = request('ratevariationpercentage');
        $grooming->servicecharge = request('servicecharge');
        if ($request->file('productimageupload')) {
            foreach ($request->file('productimageupload') as $image){
                if($image) {
                    $file_url[] = Helper::upload_picture($image);
                }
            }
            $grooming->productimageupload = serialize($file_url);
        }
        $grooming->save();

        return back()->with('success','Grooming Updated Successfully ');
    }

    public function addGrooming(Request $request){
        foreach ($request->file('productimageupload') as $image){
            if($image) {
                $file_url[] = Helper::upload_picture($image);
            }
        }
        Grooming::create([
            'groomcode' => Helper::generate_code(Grooming::latest()->first(), "grooming"),
            'vendorcode' => auth()->user()->vendorcode,
            'vendorproductcode' => 'vendorproduct_7',
            'producttitle' => request('producttitle'),
            'productdescription' => request('productdescription'),
            'size' => request('size'),
            'shipping' => request('shipping'),
            'cashondelivery' => request('cashondelivery'),
            'livedemo' => request('livedemo'),
            'pricing' => request('pricing'),
            'productprice' => request('productprice'),
            'ratevariationpercentage' => request('ratevariationpercentage'),
            'servicecharge' => request('servicecharge'),
            'productimageupload' => serialize($file_url),
            'status' => '1',
            'createdby' => auth()->user()->id,
            'updatedby' => auth()->user()->id,
        ]);

        return back()->with('success','New Grooming Added Successfully ');
    }

    public function showGrooming(){
        return view('vendor.master.grooming');
    }

    public function viewGrooming(){
        $datas = Vendor::find(auth()->user()->id)->grooming()->get();
        return view('vendor.master.viewgrooming', compact('datas'));
    }

    public function showEditGrooming($id){
        try {
            $data = Grooming::findOrfail($id);
            return view('vendor.master.editgrooming', compact('data'));
        } catch (Exception $e) {
            return back();
        }
    }

    public function deleteGrooming($id){
        try {
            $Request = Grooming::findOrfail($id);
            $Request->delete();
            return back()->with('success','Grooming Deleted Successfully ');
        } catch (Exception $e) {
            return back();
        }
    }


    //Decoration

    public function showDecoration(){
        $decorations = Decoration::where('createdby', auth()->user()->id)->get();
        if ($decorations->isEmpty()) {
            $decorations = array();
        }
        return view('vendor.master.decoration', compact('decorations'));
    }

    public function addDecoration(Request $request){

        foreach ($request->file('productimageupload') as $image){
            if($image) {
                $file_url[] = Helper::upload_picture($image);
            }
        }

        Decoration::create([
            'decorationcode' => Helper::generate_code(Decoration::latest()->first(), "Decoration"),
            'vendorcode' => auth()->user()->vendorcode,
            'vendorproductcode' => 'vendorproduct_8',
            'typeofdecoration' => request('typeofdecoration'),
            'serviceablebudget' => request('serviceablebudget'),
            'serviceabledecoration' => request('serviceabledecoration'),
            'producttitle' => request('producttitle'),
            'budgetlimit' => request('budgetlimit'),
            'productdescription' => request('productdescription'),
            'serviceableevents' => serialize(request('serviceableevents')),
            'pricing' => request('pricing'),
            'productimageupload' => serialize($file_url),
            'productprice' => request('productprice'),
            'status' => '1',
            'ratevariationpercentage' => request('ratevariationpercentage'),
            'servicecharge' => request('servicecharge'),
            'createdby' => auth()->user()->id,
            'updatedby' => auth()->user()->id,
        ]);
        return back()->with('success','New Decoration Added Successfully ');
    }

    public function viewDecoration(){
        $datas = Vendor::find(auth()->user()->id)->decoration()->get();
        return view('vendor.master.viewdecoration', compact('datas'));
    }

    public function showEditDecoration($id){

        try {
            $data = Decoration::findOrfail($id);
            return view('vendor.master.editdecoration', compact('data'));
        } catch (Exception $e) {
            return back();
        }

    }

    public function updateDecoration($id, Request $request){
        $decoration = Decoration::findOrfail($id);
        $decoration->typeofdecoration = request('typeofdecoration');
        $decoration->serviceablebudget = request('serviceablebudget');
        $decoration->serviceabledecoration = request('serviceabledecoration');
        $decoration->producttitle = request('producttitle');
        $decoration->budgetlimit = request('budgetlimit');
        $decoration->productdescription = request('productdescription');
        $decoration->serviceableevents = serialize(request('serviceableevents'));
        $decoration->pricing = request('pricing');
        $decoration->ratevariationpercentage = request('ratevariationpercentage');
        $decoration->productprice = request('productprice');
        $decoration->servicecharge = request('servicecharge');
        if ($request->file('productimageupload')) {
            foreach ($request->file('productimageupload') as $image){
                if($image) {
                    $file_url[] = Helper::upload_picture($image);
                }
            }
            $decoration->productimageupload = serialize($file_url);
        }
        $decoration->save();

        return back()->with('success','Decoration Updated Successfully ');
    }

    public function deleteDecoration($id){
        try {
            $Request = Decoration::findOrfail($id);
            $Request->delete();
            return back()->with('success','Decoration Deleted Successfully ');
        } catch (Exception $e) {
            return back()->with('wrong','Sorry! something Went To Wrong.');
        }
    }

    //Choreo

    public function showSangeethChoreographers(){
        return view('vendor.master.sangeethchoreographers');
    }

    public function viewChoreo(){
        $datas = Vendor::find(auth()->user()->id)->choreo()->get();
        return view('vendor.master.viewchoreo', compact('datas'));
    }

    public function updateChoreo($id, Request $request){
        $choreo = Choreographer::findOrfail($id);
        $choreo->typeofchoreography = request('typeofchoreography');
        $choreo->typeofperformence = request('typeofperformence');
        $choreo->producttitle = request('producttitle');
        $choreo->productdescription = request('productdescription');
        $choreo->serviceableevents = serialize(request('serviceableevents'));
        $choreo->pricing = request('pricing');
        $choreo->productprice = request('productprice');
        $choreo->ratevariationpercentage = request('ratevariationpercentage');
        $choreo->servicecharge = request('servicecharge');
        if ($request->file('productimageupload')) {
            foreach ($request->file('productimageupload') as $image){
                if($image) {
                    $file_url[] = Helper::upload_picture($image);
                }
            }
            $choreo->productimageupload = serialize($file_url);
        }
        $choreo->save();

        return back()->with('success','Choreographer Updated Successfully ');
    }

    public function addChoreo(Request $request){

        foreach ($request->file('productimageupload') as $image){
            if($image) {
                $file_url[] = Helper::upload_picture($image);
            }
        }

        Choreographer::create([
            'choreocode' => Helper::generate_code(Choreographer::latest()->first(), "choreographer"),
            'vendorcode' => auth()->user()->vendorcode,
            'vendorproductcode' => 'vendorproduct_10',
            'typeofchoreography' => request('typeofchoreography'),
            'typeofperformence' => request('typeofperformence'),
            'producttitle' => request('producttitle'),
            'productdescription' => request('productdescription'),
            'serviceableevents' => serialize(request('serviceableevents')),
            'pricing' => request('pricing'),
            'productimageupload' => serialize($file_url),
            'productprice' => request('productprice'),
            'status' => '1',
            'ratevariationpercentage' => request('ratevariationpercentage'),
            'servicecharge' => request('servicecharge'),
            'createdby' => auth()->user()->id,
            'updatedby' => auth()->user()->id,
        ]);
        return back()->with('success',' New Choreographer Added Successfully ');
    }

    public function showEditChoreo($id){
        try {
            $data = Choreographer::findOrfail($id);
            return view('vendor.master.editchoreo', compact('data'));
        } catch (Exception $e) {
            return back();
        }
    }

    public function deleteChoreo($id){
        try {
            $Request = Choreographer::findOrfail($id);
            $Request->delete();
            return back()->with('success','Choreographer Updated Successfully ');
        } catch (Exception $e) {
            return back()->with('wrong','Sorry! something Went To Wrong.');
        }
    }

    //Music

    public function showMusic(){
        return view('vendor.master.music');
    }

    public function viewMusic(){
        $datas = Vendor::find(auth()->user()->id)->music()->get();
        return view('vendor.master.viewmusic', compact('datas'));
    }

    public function updateMusic($id, Request $request){
        $music = Music::findOrfail($id);
        $music->typeofmusic = request('typeofmusic');
        $music->producttitle = request('producttitle');
        $music->productdescription = request('productdescription');
        $music->serviceableevents = serialize(request('serviceableevents'));
        $music->pricing = request('pricing');
        $music->productprice = request('productprice');
        $music->ratevariationpercentage = request('ratevariationpercentage');
        $music->servicecharge = request('servicecharge');
        if ($request->file('productimageupload')) {
            foreach ($request->file('productimageupload') as $image){
                if($image) {
                    $file_url[] = Helper::upload_picture($image);
                }
            }
            $music->productimageupload = serialize($file_url);
        }
        $music->save();

        return back()->with('success','Music Updated Successfully ');
    }

    public function showEditMusic($id){
        try {
            $data = Music::findOrfail($id);
            return view('vendor.master.editmusic', compact('data'));
        } catch (Exception $e) {
            return back()->with('wrong','Sorry! something Went To Wrong.');
        }
    }

    public function addMusic(Request $request){

        foreach ($request->file('productimageupload') as $image){
            if($image) {
                $file_url[] = Helper::upload_picture($image);
            }
        }

        Music::create([
            'musiccode' => Helper::generate_code(Music::latest()->first(), "music"),
            'vendorcode' => auth()->user()->vendorcode,
            'vendorproductcode' => 'vendorproduct_11',
            'typeofmusic' => request('typeofmusic'),
            'producttitle' => request('producttitle'),
            'productdescription' => request('productdescription'),
            'serviceableevents' => serialize(request('serviceableevents')),
            'pricing' => request('pricing'),
            'productimageupload' => serialize($file_url),
            'productprice' => request('productprice'),
            'status' => '1',
            'ratevariationpercentage' => request('ratevariationpercentage'),
            'servicecharge' => request('servicecharge'),
            'createdby' => auth()->user()->id,
            'updatedby' => auth()->user()->id,
        ]);
        return back()->with('success','New Music  Added Successfully ');
    }

    public function deleteMusic($id){
        try {
            $Request = Music::findOrfail($id);
            $Request->delete();
            return back()->with('success','Music Deleted Successfully ');
        } catch (Exception $e) {
            return back()->with('wrong','Sorry! something Went To Wrong.');
        }
    }


    //Gifts

    public function showGiftCompliments(){
        return view('vendor.master.giftcompliments');
    }

    public function viewGifts(){
        $datas = Vendor::find(auth()->user()->id)->gift()->get();
        return view('vendor.master.viewgift', compact('datas'));
    }

    public function showEditGifts($id){
        try {
            $data = Gift::findOrfail($id);
            return view('vendor.master.editgift', compact('data'));
        } catch (Exception $e) {
            return back()->with('wrong','Sorry! something Went To Wrong.');
        }
    }

    public function deleteGifts($id){
        try {
            $Request = Gift::findOrfail($id);
            $Request->delete();
            return back()->with('success','Gift Deleted Successfully ');
        } catch (Exception $e) {
            return back()->with('wrong','Sorry! something Went To Wrong.');
        }
    }

    public function addGifts(Request $request){
        foreach ($request->file('productimageupload') as $image){
            if($image) {
                $file_url[] = Helper::upload_picture($image);
            }
        }

        Gift::create([
            'giftcode' => Helper::generate_code(Gift::latest()->first(), "gift"),
            'vendorcode' => auth()->user()->vendorcode,
            'vendorproductcode' => 'vendorproduct_14',
            'producttitle' => request('producttitle'),
            'typeofgift' => request('typeofgift'),
            'productdescription' => request('productdescription'),
            'serviceableevents' => serialize(request('serviceableevents')),
            'pricing' => request('pricing'),
            'productimageupload' => serialize($file_url),
            'productprice' => request('productprice'),
            'status' => '1',
            'ratevariationpercentage' => request('ratevariationpercentage'),
            'servicecharge' => request('servicecharge'),
            'createdby' => auth()->user()->id,
            'updatedby' => auth()->user()->id,
        ]);
        return back()->with('success','New Gift Added Successfully ');
    }

    public function updateGifts($id, Request $request){
        $gift = Gift::findOrfail($id);
        $gift->typeofgift = request('typeofgift');
        $gift->producttitle = request('producttitle');
        $gift->productdescription = request('productdescription');
        $gift->serviceableevents = serialize(request('serviceableevents'));
        $gift->pricing = request('pricing');
        $gift->productprice = request('productprice');
        $gift->ratevariationpercentage = request('ratevariationpercentage');
        $gift->servicecharge = request('servicecharge');
        if ($request->file('productimageupload')) {
            foreach ($request->file('productimageupload') as $image){
                if($image) {
                    $file_url[] = Helper::upload_picture($image);
                }
            }
            $gift->productimageupload = serialize($file_url);
        }
        $gift->save();

        return back()->with('success','Gift Updated Successfully ');
    }


    //Photography

    public function addPhotography(Request $request){

        foreach ($request->file('productimageupload') as $image){
            if($image) {
                $file_url[] = Helper::upload_picture($image);
            }
        }
        Photography::create([
            'photographycode' => Helper::generate_code(Photography::latest()->first(), "photography"),
            'vendorcode' => auth()->user()->vendorcode,
            'vendorproductcode' => 'vendorproduct_3',
            'typeofphotography' => request('typeofphotography'),
            'styleofshoot' => request('styleofshoot'),
            'typeofshoot' => request('typeofshoot'),
            'producttitle' => request('producttitle'),
            'productdescription' => request('productdescription'),
            'serviceableevents' => serialize(request('serviceableevents')),
            'photoalbum' => request('photoalbum'),
            'pricing' => request('pricing'),
            'productimageupload' => serialize($file_url),
            'productprice' => request('productprice'),
            'status' => '1',
            'ratevariationpercentage' => request('ratevariationpercentage'),
            'servicecharge' => request('servicecharge'),
            'createdby' => auth()->user()->id,
            'updatedby' => auth()->user()->id,
        ]);
        return back()->with('success','New Photography Added Successfully ');

    }

    public function updatephotography($id, Request $request){
        $photo = Photography::findOrfail($id);
        $photo->typeofphotography = request('typeofphotography');
        $photo->styleofshoot = request('styleofshoot');
        $photo->typeofshoot = request('typeofshoot');
        $photo->producttitle = request('producttitle');
        $photo->productdescription = request('productdescription');
        $photo->serviceableevents = serialize(request('serviceableevents'));
        $photo->photoalbum = request('photoalbum');
        $photo->pricing = request('pricing');
        $photo->productprice = request('productprice');
        $photo->ratevariationpercentage = request('ratevariationpercentage');
        $photo->servicecharge = request('servicecharge');
        if ($request->file('productimageupload')) {
            foreach ($request->file('productimageupload') as $image){
                if($image) {
                    $file_url[] = Helper::upload_picture($image);
                }
            }
            $photo->productimageupload = serialize($file_url);
        }
        $photo->save();

        return back()->with('success','Photography Updated Successfully ');
    }

    public function showPhotography(){
        return view('vendor.master.photography');
    }

    public function viewphotography(){
        $datas = Vendor::find(auth()->user()->id)->photography()->get();
        return view('vendor.master.viewphotography', compact('datas'));
    }

    public function showEditphotography($id){
        try {
            $data = Photography::findOrfail($id);
            return view('vendor.master.editphotography', compact('data'));
        } catch (Exception $e) {
            return back()->with('wrong','Sorry! something Went To Wrong.');
        }
    }

    public function deletephotography($id){
        try {
            $Request = Photography::findOrfail($id);
            $Request->delete();
            return back()->with('success','Photography Deleted Successfully ');
        } catch (Exception $e) {
            return back()->with('wrong','Sorry! something Went To Wrong.');
        }
    }


    //Videography

    public function addVideoGraphy(Request $request){

        foreach ($request->file('productimageupload') as $image){
            if($image) {
                $file_url[] = Helper::upload_picture($image);
            }
        }

        Videography::create([
            'videocode' => Helper::generate_code(Videography::latest()->first(), "videography"),
            'vendorcode' => auth()->user()->vendorcode,
            'vendorproductcode' => 'vendorproduct_4',
            'typeofvideography' => request('typeofvideography'),
            'styleofshoot' => request('styleofshoot'),
            'typeofshoot' => request('typeofshoot'),
            'verified' => 1,
            'producttitle' => request('producttitle'),
            'productdescription' => request('productdescription'),
            'serviceableevents' => serialize(request('serviceableevents')),
            'pricing' => request('pricing'),
            'productprice' => request('productprice'),
            'ratevariationpercentage' => request('ratevariationpercentage'),
            'servicecharge' => request('servicecharge'),
            'productimageupload' => serialize($file_url),
            'status' => '1',
            'createdby' => auth()->user()->id,
            'updatedby' => auth()->user()->id,
        ]);
        return back()->with('success','New Videography Added Successfully ');
    }

    public function updateVideoGraphy($id, Request $request){
        $video = Videography::findOrfail($id);
        $video->typeofvideography = request('typeofvideography');
        $video->styleofshoot = request('styleofshoot');
        $video->typeofshoot = request('typeofshoot');
        $video->producttitle = request('producttitle');
        $video->productdescription = request('productdescription');
        $video->serviceableevents = serialize(request('serviceableevents'));
        $video->pricing = request('pricing');
        $video->productprice = request('productprice');
        $video->ratevariationpercentage = request('ratevariationpercentage');
        $video->servicecharge = request('servicecharge');
        if ($request->file('productimageupload')) {
            foreach ($request->file('productimageupload') as $image){
                if($image) {
                    $file_url[] = Helper::upload_picture($image);
                }
            }
            $video->productimageupload = serialize($file_url);
        }
        $video->save();

        return back()->with('success','Videography Updated Successfully ');
    }

    public function showVideoGraphy(){
        return view('vendor.master.videography');
    }

    public function viewVideoGraphy(){
        $datas = Vendor::find(auth()->user()->id)->videography()->get();
        return view('vendor.master.viewvideography', compact('datas'));
    }

    public function showEditVideoGraphy($id){
        try {
            $data = Videography::findOrfail($id);
            return view('vendor.master.editvideography', compact('data'));
        } catch (Exception $e) {
            return back();
        }
    }

    public function deleteVideoGraphy($id){
        try {
            $Request = Videography::findOrfail($id);
            $Request->delete();
            return back()->with('success','Videography Deleted Successfully ');
        } catch (Exception $e) {
            return back()->with('wrong','Sorry! something Went To Wrong.');
        }
    }


    //Location

    public function addLocation(){
        Locationmaster::create([
            'locationcode' => Helper::generate_code(Locationmaster::latest()->first(), "Location"),
            'locationname' => request('locationname'),
            'createdby' => auth()->user()->id,
            'updatedby' => auth()->user()->id,
        ]);
        return back()->with('success','New Location Added Successfully ');
    }

    public function updateLocation($id){
        $location = Locationmaster::findOrfail($id);
        $location->locationname = request('locationname');
        $location->createdby = auth()->user()->id;
        $location->updatedby = auth()->user()->id;
        $location->save();
        return back()->with('success','Location Updated Successfully ');

    }

    public function deletelocation($id){
        try {
            $request = Locationmaster::findOrfail($id);
            $request->delete();
            return back()->with('success','Location Deleted Successfully ');

        } catch (Exception $e) {
            return back()->with('wrong','Sorry! something Went To Wrong.');

        }
    }

    public function showlocation(){
        $datas = Locationmaster::where('createdby', auth()->user()->id)->get();
        return view('vendor.master.locationmaster', compact('datas'));
    }

    public function showEditLocation($id){
        $data = Locationmaster::findOrfail($id);
        return view('vendor.master.editlocation', compact('data'));

    }


    //Transport

    public function showTransport(){
        return view('vendor.master.transport');
    }

    public function addTransport(Request $request){

        foreach ($request->file('productimageupload') as $image){
            if($image) {
                $file_url[] = Helper::upload_picture($image);
            }
        }

        Transport::create([
            'transportcode' => Helper::generate_code(Transport::latest()->first(), "Transport"),
            'vendorcode' => auth()->user()->vendorcode,
            'vendorproductcode' => 'vendorproduct_13',
            'serviceablelocation' => request('serviceablelocation'),
            'typeoftransport' => request('typeoftransport'),
            'typeofcomfort' => request('typeofcomfort'),
            'typeofvehicle' => request('typeofvehicle'),
            'typeofsubcategory' => request('typeofsubcategory'),
            'typeofdrive' => request('typeofdrive'),
            'producttitle' => request('producttitle'),
            'pricing' => request('pricing'),
            'productprice' => request('productprice'),
            'ratevariationpercentage' => request('ratevariationpercentage'),
            'servicecharge' => request('servicecharge'),
            'productimageupload' => serialize($file_url),
            'status' => '1',
            'createdby' => auth()->user()->id,
            'updatedby' => auth()->user()->id,
        ]);
        return back()->with('success','New Transport Added Successfully ');


    }

    public function showEditTransport($id){
        try {
            $data = Transport::findOrfail($id);
            return view('vendor.master.edittransport', compact('data'));
        } catch (Exception $e) {
            return back();
        }
    }

    public function updatetransport(Request $request, $id){
        $transport = Transport::findOrfail($id);
        $transport->serviceablelocation = request('serviceablelocation');
        $transport->typeoftransport = request('typeoftransport');
        $transport->typeofcomfort = request('typeofcomfort');
        $transport->typeofvehicle = request('typeofvehicle');
        $transport->typeofsubcategory = request('typeofsubcategory');
        $transport->typeofdrive = request('typeofdrive');
        $transport->producttitle = request('producttitle');
        $transport->pricing = request('pricing');
        $transport->productprice = request('productprice');
        $transport->ratevariationpercentage = request('ratevariationpercentage');
        $transport->servicecharge = request('servicecharge');
        $transport->ratevariationpercentage = request('ratevariationpercentage');
        if ($request->file('productimageupload')) {
            foreach ($request->file('productimageupload') as $image){
                if($image) {
                    $file_url[] = Helper::upload_picture($image);
                }
            }
            $transport->productimageupload = serialize($file_url);
        }
        $transport->save();

        return back()->with('success','Transport Updated Successfully ');


    }

    public function viewTransport(){
        $datas = Transport::where('createdby',auth()->user()->id)->get();
        return view('vendor.master.viewtransport',compact('datas'));
    }

    public function deletetransport($id){
        try{
            $Request = Transport::findOrfail($id);
            $Request->delete();
            return back()->with('success','Transport Deleted Successfully ');
        } catch (Exception $e){
            return back()->with('wrong','Sorry! something Went To Wrong.');
        }
    }

    public function editAccount(){
         $editvendor = Auth::user();
         $datas = vendorproductmaster::all();
        return view('vendor.master.account',compact('editvendor','datas'));
    }

    public function updateAccount($id,Request $request){
        $datas = Vendor::findOrfail($id);
        $datas->vendortype = serialize(request('vendortype'));
        $datas->businessname =request('businessname');
        $datas->gstnumber =request('gstnumber');
        $datas->email =request('email');
        $datas->ownername =request('ownername');
        $datas->mobilenumber =request('mobilenumber');
        $datas->contactpersonname1 =request('contactpersonname1');
        $datas->contactpersonmobileno1 =request('contactpersonmobileno1');
        $datas->contactpersonname2 =request('contactpersonname2');
        $datas->contactpersonmobileno2 =request('contactpersonmobileno2');
        $datas->businesslocation =request('businesslocation');
        $datas->serviceablearea =request('serviceablearea');
        $datas->createdby = auth()->user()->id;
        $datas->updatedby = auth()->user()->id;
        if ($request->file('profilepicture')) {
            $profilepicture = Helper::upload_picture($request->file('profilepicture'));
            $datas->profilepicture = $profilepicture;
         
        }
        if ($request->file('businesslogo')) {
            $businesslogo = Helper::upload_picture($request->file('businesslogo'));
            $datas->businesslogo = $businesslogo;
         
        }
        $datas->save();
        return back()->with('success','Account Setting Updated Successfully');


    }

    public function changepassword(){
        return view('vendor.master.password');
    }

    public function updatepassword(){
        $oldpassword = request('oldpassword');
        $newpassword = request('newpassword');
        $confirmpassword = request('confirmpassword');
        $vendor = Vendor::findOrfail(Auth::user()->id);
        if($newpassword === $confirmpassword){
            if(Hash::check($oldpassword,$vendor->password)){
                $vendor->password = bcrypt($newpassword);
                $vendor->save();
                 return back()->with('success','Password Changed Successfully');
            }else{
                return back()->with('danger','Enter Correct Old Password');
            }
        }else{
            return back()->with('danger','Password Does Not Match');
        }
        
    }

    public function addVenue(Request $request){
        foreach ($request->file('productimageupload') as $image){
            if($image) {
                $file_url[] = Helper::upload_picture($image);
            }
        }

        venue::create([
            'venuecode' => Helper::generate_code(Venue::latest()->first(), "Venue"),
            'vendorcode' => auth()->user()->vendorcode,
            'vendorproductcode' => 'vendorproduct_1',
            'producttitle' => request('producttitle'),
            'address' => request('address'),
            'productdescription' => request('productdescription'),
            'serviceableevents' => serialize(request('serviceableevents')),
            'availability' => serialize(request('available')),
            'catering' => request('catering'),
            'productprice' => request('productprice'),
            'servicecharge' => request('servicecharge'),
            'ratevariationpercentage' => request('ratevariationpercentage'),
            'productimageupload' => serialize($file_url),
            'stagedimensions' => request('stagedimensions'),
            'seatingchairsavailability' => request('seatingchairsavailability'),
            'seatingcapacity' => request('seatingcapacity'),
            'diningcapacity' => request('diningcapacity'),
            'diningequipment' => request('diningequipment'),
            'diningseatingavailability' => request('diningseatingavailability'),
            'indooroutdoor' => request('indooroutdoor'),
            'acnonac' => request('acnonac'),
            'parkingspaceavailability' => request('parkingspaceavailability'),
            'roomavailability' => request('roomavailability'),
            'noofrooms' => request('noofrooms'),
            'buffetspace' => request('buffetspace'),
            'diningtype' => request('diningtype'),
            'parkingspaceavailability' => request('parkingspaceavailability'),
            'createdby' => auth()->user()->id,
            'updatedby' => auth()->user()->id,
        ]);
        return back()->with('success','New Venue Added Successfully ');
    }

    public function viewVenues(){
        $datas = Vendor::find(auth()->user()->id)->venues()->get();
        return view('vendor.master.viewvenue', compact('datas'));
    }

    public function deleteVenues($id){
        try{
            $Request = venue::findOrfail($id);
            $Request->delete();
            return back()->with('success','Venue Deleted Successfully ');
        } catch (Exception $e){
            return back()->with('wrong','Sorry! something Went To Wrong.');
        }
    }

    public function showEditVenues($id){
        try {
            $data = venue::findOrfail($id);
            return view('vendor.master.editvenue', compact('data'));
        } catch (Exception $e) {
            return back();
        }
    }

    public function updateVenues($id,Request $request){
            $datas = venue::findOrfail($id);
            $datas->vendorproductcode = 'vendorproduct_1';
            $datas->producttitle = request('producttitle');
            $datas->address = request('address');
            $datas->productdescription = request('productdescription');
            $datas->serviceableevents = serialize(request('serviceableevents'));
            $datas->availability = serialize(request('available'));
            $datas->catering = request('catering');
            $datas->productprice = request('productprice');
            $datas->servicecharge = request('servicecharge');
            $datas->ratevariationpercentage = request('ratevariationpercentage');
            $datas->stagedimensions = request('stagedimensions');
            $datas->seatingchairsavailability = request('seatingchairsavailability');
            $datas->seatingcapacity = request('seatingcapacity');
            $datas->diningcapacity = request('diningcapacity');
            $datas->diningequipment = request('diningequipment');
            $datas->diningseatingavailability = request('diningseatingavailability');
            $datas->indooroutdoor = request('indooroutdoor');
            $datas->acnonac = request('acnonac');
            $datas->parkingspaceavailability = request('parkingspaceavailability');
            $datas->roomavailability = request('roomavailability');
            $datas->noofrooms = request('noofrooms');
            $datas->buffetspace = request('buffetspace');
            $datas->diningtype = request('diningtype');
            $datas->parkingspaceavailability = request('parkingspaceavailability');
             if ($request->file('productimageupload')) {
            foreach ($request->file('productimageupload') as $image){
                if($image) {
                    $file_url[] = Helper::upload_picture($image);
                }
            }
            $datas->productimageupload = serialize($file_url);
        }
        
            $datas->createdby = auth()->user()->id;
            $datas->updatedby = auth()->user()->id;
            $datas->save();
            return back()->with('success','Venues Updated Successfully ');

    }

}
