<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
      public function signup(Request $request)
      {
        $validator = Validator::make(
            $request->all(), 
            [
                    "name"=>"required",
                    "email"=> "required|email|unique:users,email",
                    "password"=> "required",
                   ]
            );

            if ($validator->fails())
            {
                return response()->json(["data"=>"Validator Error","Status"=>false,"error"=>$validator->errors()],401);
            }

            $user = User::create(
                [
                    "name"=>$request->name,
                    "email"=>$request->email,
                    "password"=>Hash::make($request->password),
                ]
            );

            return response()->json(["Message"=>"user Created",'User'=>$user],200);
      }


      public function login(Request $request)
      {
            $validator = Validator::make(
                $request->all(),    
                [
                            "email"=> "required|email",
                            "password"=> "required",
                       ]
            );

            if ($validator->fails())
            {
                return response()->json(["Message"=> "Validator error","status"=>false, 'errors'  => $validator->errors()],401);
            }

           if(Auth::attempt(['email'=>$request->email , 'password'=>$request->password]))
            {
                $user = Auth::User();
                
                return response()->json(
                    [
                        'Message'=>'User Login Successfull',
                        'status'=>true,
                        'token'=>$user->createToken('api token')->plainTextToken,
                        'token_type'=>'bearer',
                    ],200
                );
            }
            
            return response()->json(["Message"=>"Email Or Password Not Match","status"=>false]);

      }

      public function logout(Request $request)
      {
         $request->user()->currentAccessToken()->delete();

         return response()->json([
            'Message'=>'User Log out Successfully',
            'status'=>true
         ]);
      }
}
?>
