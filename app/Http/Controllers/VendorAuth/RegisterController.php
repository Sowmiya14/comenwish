<?php

namespace App\Http\Controllers\VendorAuth;

use App\Helpers\Helper;
use App\Vendor;
use App\Vendortype;
use Validator;
use App\vendorproductmaster;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/vendor/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('vendor.guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'vendortype' => 'required',
            'businessname'=>'required|min:3|max:6',
            'gstnumber'=>'required|max:15',
            'ownername'=>'required',
            'mobilenumber'=>'required|min:10',
            'businessname'=>'required',
            'contactpersonname1'=>'required',
            'contactpersonmobileno1'=>'required|min:10',
            'businesslocation'=>'required',
            'serviceablearea'=>'required',
            'email' => 'required|email|max:255|unique:vendors',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return Vendor
     */
    protected function create(array $data)
    {
        return Vendor::create([
            'vendorcode'=>Helper::generate_code(Vendor::latest()->first(),"vendor"),
            'ownername'=>request('ownername'),
            'email'=>request('email'),
            'mobilenumber'=>request('mobilenumber'),
            'profilepicture'=>'http://lorempixel.com/100/100/',
            'contactpersonname1'=>request('contactpersonname1'),
            'contactpersonmobileno1'=>request('contactpersonmobileno1'),
            'contactpersonname2'=>request('contactpersonname2'),
            'contactpersonmobileno2'=>request('contactpersonmobileno2'),
            'password'=>bcrypt(request('password')),
            'businessname'=>request('businessname'),
            'businesslogo'=>'http://lorempixel.com/100/100/',
            'vendortype'=>serialize(request('vendortype')),
            'gstnumber'=>request('gstnumber'),
            'businesslocation'=>request('businesslocation'),
            'serviceablearea'=>request('serviceablearea'),
            'status'=>'1',
            'createdby'=>"self",
            'updatedby'=>"self",
        ]);
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $datas = vendorproductmaster::all();
        return view('vendor.auth.register', compact('datas'));
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('vendor');
    }
}