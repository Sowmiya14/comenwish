<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
use App\User;
use Auth;
class SocialLoginController extends Controller
{
     public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }
     public function providerToGoogle(){
        return Socialite::driver('google')->redirect();
    }

     public function handleGoogleCallback(){
        try{
            $google = Socialite::driver('google')->user();
            if($google){
                    if($google->id){
                        $GoogleSql = User::where('social_unique_id',$google->id);
                        if($google->email !=""){
                            $GoogleSql->orWhere('email',$google->email);
                        }
                        $AuthUser = $GoogleSql->first();
                        if($AuthUser){ 
                            $AuthUser->social_unique_id=$google->id;
                            $AuthUser->save();  
                            Auth::loginUsingId($AuthUser->id);
                            return redirect('/');
                            // return redirect()->to('dashboard');
                        }else{   
                            $new=new User();
                            $name = explode(' ', $google->name, 2);
                            $new->first_name=$name[0];
                            $new->last_name= isset($name[1]) ? $name[1] : '';
                            $new->email=$google->email;
                            $new->password=bcrypt($google->id);
                            // $new->mobile=$google->mobile;
                            $new->picture=$google->avatar;
                            $new->social_unique_id=$google->id;
                            $new->login_by="google";
                            $new->save();
                            Auth::loginUsingId($new->id);
                            return redirect('/');
                            // return redirect()->route('dashboard');
                        }
                    }else{
                        // return redirect()->route('dashboard');
                    }
                
            }else{
               // return redirect()->url('register');
            }

        } catch (Exception $e) {
            // return back()->with('flash_errors', 'Google driver not found');
        }
    }

    
    public function redirectToFaceBook(){
        return Socialite::driver('facebook')->redirect();
    }
    
    public function providerToFaceBook(){
        return Socialite::driver('facebook')->redirect();
    }
   
    public function handleFacebookCallback(Request $request){
        $AccessToken = Socialite::driver('facebook')->getAccessTokenResponse($request->code);
        if($token = $AccessToken['access_token']){
            $facebook = Socialite::driver('facebook')->userFromToken($token);
                if($facebook->id){
                    $FacebookSql = User::where('social_unique_id',$facebook->id);
                    if($facebook->email !=""){
                        $FacebookSql->orWhere('email',$facebook->email);
                    }
                    $AuthUser = $FacebookSql->first();
                    if($AuthUser){
                        $AuthUser->social_unique_id=$facebook->id;
                        $AuthUser->save();
                        Auth::loginUsingId($AuthUser->id);
                        return redirect('/');
                    }else{   
                        $new=new User();
                        $new->email=$facebook->email;
                        $name = explode(' ', $facebook->name, 2);
                        $new->first_name=$name[0];
                        $new->last_name= isset($name[1]) ? $name[1] : '';
                        $new->password=bcrypt($facebook->id);
                        $new->social_unique_id=$facebook->id;
                        //$new->mobile=$facebook->mobile;
                        $new->picture=$facebook->avatar;
                        $new->login_by="facebook";
                        $new->save();
                        Auth::loginUsingId($new->id);
                        return redirect('/');
                    }
                }else{
                    return redirect('/');
                }
        }else{
           return redirect()->to('/');
        }
    }




      public function facebookViaAPI(Request $request) { 
        $validator = Validator::make(
            $request->all(),
            [
                // 'device_type' => 'required|in:android,ios',
                'device_token' => 'required',
                'accessToken'=> 'required',
                //'mobile' => 'required',
                'device_id' => 'required',
                // 'login_by' => 'required|in:manual,facebook,google'
            ]
        );
        
        if($validator->fails()) {
            return response()->json(['status'=>false,'message' => $validator->messages()->all()]);
        }

        $user = Socialite::driver('facebook')->stateless();
        $FacebookDrive = $user->userFromToken( $request->accessToken);
       
        try{

            $FacebookSql = User::where('social_unique_id',$FacebookDrive->id);
            if($FacebookDrive->email !=""){
                $FacebookSql->orWhere('email',$FacebookDrive->email);
            }
            $AuthUser = $FacebookSql->first();
            if($AuthUser){
                $AuthUser->social_unique_id=$FacebookDrive->id; 
                $AuthUser->device_type=$request->device_type;
                $AuthUser->device_token=$request->device_token;
                $AuthUser->device_id=$request->device_id;
                $AuthUser->mobile=$request->mobile?:'';
                $AuthUser->login_by="facebook";
                $AuthUser->save();  
            }else{   
                $AuthUser=new User();
                $AuthUser->email=$FacebookDrive->email;
                $name = explode(' ', $FacebookDrive->name, 2);
                $AuthUser->first_name=$name[0];
                $AuthUser->last_name= isset($name[1]) ? $name[1] : '';
                $AuthUser->password=bcrypt($FacebookDrive->id);
                $AuthUser->social_unique_id=$FacebookDrive->id;
                $AuthUser->device_type=$request->device_type;
                $AuthUser->device_token=$request->device_token;
                $AuthUser->device_id=$request->device_id;
                $AuthUser->mobile=$request->mobile?:'';
                $AuthUser->picture=$FacebookDrive->avatar;
                $AuthUser->login_by="facebook";
                $AuthUser->save();
            }    
            if($AuthUser){
                $userToken = $AuthUser->token()?:$AuthUser->createToken('socialLogin');
                return response()->json([
                        "status" => true,
                        "token_type" => "Bearer",
                        "access_token" => $userToken->accessToken
                        ]);
            }else{
                return response()->json(['status'=>false,'message' => "Invalid credentials!"]);
            }  
        } catch (Exception $e) {
            return response()->json(['status'=>false,'message' => trans('api.something_went_wrong')]);
        }
    }

    public function googleViaAPI(Request $request) { 

        $validator = Validator::make(
            $request->all(),
            [
                // 'device_type' => 'required|in:android,ios',
                'device_token' => 'required',
                'accessToken'=>'required',
                'device_id' => 'required',
                // 'login_by' => 'required|in:manual,facebook,google'
            ]
        );
        
        if($validator->fails()) {
            return response()->json(['status'=>false,'message' => $validator->messages()->all()]);
        }
        $user = Socialite::driver('google')->stateless();
        $GoogleDrive = $user->userFromToken( $request->accessToken);
       
        try{

            
            $GoogleSql = User::where('social_unique_id',$GoogleDrive->id);
            if($GoogleDrive->email !=""){
                $GoogleSql->orWhere('email',$GoogleDrive->email);
            }
            $AuthUser = $GoogleSql->first();
            if($AuthUser){
                $AuthUser->social_unique_id=$GoogleDrive->id; 
                $AuthUser->device_type=$request->device_type;
                $AuthUser->device_token=$request->device_token;
                $AuthUser->device_id=$request->device_id;
                $AuthUser->mobile=$request->mobile?:'';
                $AuthUser->login_by="google";
                $AuthUser->save();
            }else{   
                $AuthUser=new User();
                $AuthUser->email=$GoogleDrive->email;
                $name = explode(' ', $GoogleDrive->name, 2);
                $AuthUser->first_name=$name[0];
                $AuthUser->last_name= isset($name[1]) ? $name[1] : '';
                $AuthUser->password=bcrypt($GoogleDrive->id);
                $AuthUser->social_unique_id=$GoogleDrive->id;
                $AuthUser->device_type=$request->device_type;
                $AuthUser->device_token=$request->device_token;
                $AuthUser->device_id=$request->device_id;
                $AuthUser->mobile=$request->mobile?:'';
                $AuthUser->picture=$GoogleDrive->avatar;
                $AuthUser->login_by="google";
                $AuthUser->save();
            }    
            if($AuthUser){ 
                $userToken = $AuthUser->token()?:$AuthUser->createToken('socialLogin');
                return response()->json([
                        "status" => true,
                        "token_type" => "Bearer",
                        "access_token" => $userToken->accessToken
                        ]);
            }else{
                return response()->json(['status'=>false,'message' => "Invalid credentials!"]);
            }  
        } catch (Exception $e) {
            return response()->json(['status'=>false,'message' => trans('api.something_went_wrong')]);
        }
    }



}
