<?php

namespace App\Http\Controllers\API\V1;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\RepoClasses\LoginRepo;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public $loginRepo;

    public function __construct()
    {
        $this->loginRepo = new LoginRepo();
    }


    public function Login(Request $request)

    {
        $validator = Validator::make($request->only(['data']),LoginRequest::rules());
        if($validator->fails()){
            return Helper::ResponseData(null,'Login Failed',false,400,$validator->errors());
        }else{
            return $this->loginRepo->Login($request->data);
        }   

    }



    public function Register(Request $request)

    {
        $validator = Validator::make($request->only(['name','email','mobile','image']),RegisterRequest::rules());
        if($validator->fails()){
            return Helper::ResponseData(null,'Register Failed',false,400,$validator->errors());
        }else{
            return $this->loginRepo->Register($request->only(['name','email','mobile','image']));
        }

    }

    
   


    public function Logout(){
        return $this->loginRepo->Logout();
        
    }

    public function NotFound()
    {
        return $this->loginRepo->NotFound();
    }

    public function Guest()
    {
        return $this->loginRepo->Guest();
    }



   

    



}
