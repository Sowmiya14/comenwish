<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\User;
use Storage;
use Auth;
use App\Event;
use App\vendorproductmaster;
use Hash;
use Validator;

class UserApiController extends Controller
{
    public $successStatus = 200;
    public function signup(Request $request){
            $validator = Validator::make($request->all(), [ 
            'first_name' => 'required', 
            'last_name' => 'required', 
            'email' => 'required|unique:users', 
            'password' => 'required', 
            'mobile' => 'required|numeric', 
            ]);
            if ($validator->fails()) { 
                return response()->json(['error'=>$validator->errors()], 401);            
            }
        	try{
        		 $User = $request->all();
                 if($request->has('referal_code')){
                     $User['referal_code'] = $request->referal_code;
                }
                 $User['password'] = bcrypt($request->password);
                 $User['picture']  = 'http://lorempixel.com/100/100/';
                 $User = User::create($User);
                return $User;
        	}catch(Exception $e){
        	 	 return response()->json(['error' =>'api.something_went_wrong'], 500);
        	}
    }
    public function login(){ 
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')-> accessToken; 
            return response()->json(['success' => $success], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'Unauthorised'], 401); 
        } 
    }
    public function logout(){   
        if (Auth::check()) {
            Auth::user()->token()->revoke();
            return response()->json(['success' =>'logout_success'],200); 
        }else{
            return response()->json(['error' =>'api.something_went_wrong'], 500);
        }
    }
    public function update_profile(Request $request){
        try{
            $user = User::findOrFail(Auth::user()->id);
            if($request->has('first_name')){
                $user->first_name = $request->first_name;
            }
            if($request->has('last_name')){
                $user->last_name = $request->last_name;
            }
            if($request->has('email')){
                $user->email = $request->email;
            }
            if($request->has('mobile')){
                $user->mobile = $request->mobile;
            }
            if($request->has('dob')){
                $user->dob = $request->dob;
            }
            if($request->picture !=""){
                $user->picture = $request->picture->store('user/profile');
            }
            $user->save();
            return response()->json(['success' =>'user_profile_updated']);

        }catch(ModelNotFoundException $e){
             return response()->json(['error' =>'user_not_found'], 500);
        }
    }
    public function change_password(Request $request){
        $User = Auth::user();
        if(Hash::check($request->old_password, $User->password)){
            $User->password = bcrypt($request->password);
            $User->save();
            return response()->json(['message' =>'api.user.password_updated']);
        }else{
            return response()->json(['error' =>'api.user.change_password']);
        }
    }
    public function event(){
        return $event = Event::all();
    }
    public function categories(){
        return $categories = vendorproductmaster::all();
    }

}
