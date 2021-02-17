<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    // User Register
    public function register(Request $request) {
        $validator  =   Validator::make($request->all(), [
            "first_name"  =>  "required",
            "last_name"  =>  "required",
            "email"  =>  "required|email|unique:users",
            "phone"  =>  "required|unique:users",
            "password"  =>  "required"
        ]);

        if($validator->fails()) {
            return response()->json(["status" => false, "validation_errors" => $validator->errors()]);
        }

        $inputs = $request->all();

        $user   =   User::create($inputs);
        $user->assignRole('CLIENT');

        if(!is_null($user)) {
            return response()->json(["status" => true, "message" => "Success! registration completed", "data" => $user]);
        }
        else {
            return response()->json(["status" => false, "message" => "Registration failed!"]);
        }       
    }

    // User login
    public function login(Request $request) {

        $validator = Validator::make($request->all(), [
            "email" =>  "required|email",
            "password" =>  "required",
        ]);

        if($validator->fails()) {
            return response()->json(["validation_errors" => $validator->errors()]);
        }

        $user=User::where("email", $request->email)->first();

        if(is_null($user)) {
            return response()->json(["status" => false, "message" => "Failed! email not found"]);
        }

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user       =       Auth::user();
            $token      =       $user->createToken('token')->plainTextToken;

            return response()->json(["status" => true,  "token" => $token, "data" => $user]);
        }
        else {
            return response()->json(["status" => false, "message" => "Whoops! invalid password"]);
        }
    }

    
    // User Detail
    public function user() {
        $user= Auth::user();
        if(!is_null($user)) { 
            return response()->json(["status" => true, "data" => $user]);
        }

        else {
            return response()->json(["status" => false, "message" => "Whoops! no user found"]);
        }        
    }
}
