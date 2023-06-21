<?php
namespace App\Http\RepoClasses;

use App\Helpers\Helper;
use App\Http\RepoInterfaces\LoginInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginRepo implements LoginInterface{

    public $user;


    public function __construct()
    {
        $this->user = new User();
    }


    public function Login($data){
        $user = User::where('email',$data)->orWhere('mobile',$data)->first();
        if(!$user){
            return Helper::ResponseData(null,'Invalid Creditional',false, 401);
        }
        if ($user == null)
        {
            return Helper::ResponseData(null,'Invalid Creditional',false, 401);
        }
        $token = Auth::guard('api')->login($user);


        return Helper::ResponseData([
            'name' => Auth::guard('api')->user()->name,
            'email' => Auth::guard('api')->user()->email,
            'image' => Auth::guard('api')->user()->image,
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ],'user Login Success',true,200);
    }
    public function Register($data = []){
        $user = $this->user->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'image' => $data['image'],
            'balance' => $data['balance'],
            'currency' => $data['currency'],
            'password' => Hash::make($data['email']),
        ]);
        
        $token = Auth::guard('api')->login($user);


        return Helper::ResponseData([
            'name' => Auth::guard('api')->user()->name,
            'email' => Auth::guard('api')->user()->email,
            'image' => Auth::guard('api')->user()->image,
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ],'Register Success',true,200);
    }
    public function Logout(){
        Auth::guard('api')->logout();
        return Helper::ResponseData(null,'Logout Success',true,200);

    }
    public function NotFound(){
        return Helper::ResponseData(null,'Page Not Found',false,404);

    }
    public function Guest(){
        return Helper::ResponseData(null,'You Must Login First',false,401);

    }
}