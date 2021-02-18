<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

/**
 * @group  User Authentication
 *
 * APIs for managing basic auth functionality
 */
class UserController extends Controller
{
/** 
 * @bodyParam  first_name string required  Example: John
 * @bodyParam  last_name string required  Example: Doe
 * @bodyParam  email string required  Example: John@gmail.com
 * @bodyParam  phone string required  Example: 1122334455
 * @response  {
    "status": true,
    "message": "Success! registration completed",
    "data": {
        "first_name": "john",
        "last_name": "doe",
        "email": "john@gmail.com",
        "phone": "1122334455",
        "updated_at": "2021-02-18T12:14:01.000000Z",
        "created_at": "2021-02-18T12:14:01.000000Z",
        "id": 56,
        "full_name": "john doe",
        "role_name": "CLIENT",
        "roles": [
            {
                "id": 2,
                "name": "CLIENT",
                "guard_name": "web",
                "created_at": "2021-02-17T06:58:17.000000Z",
                "updated_at": "2021-02-17T06:58:17.000000Z",
                "pivot": {
                    "model_id": 56,
                    "role_id": 2,
                    "model_type": "App\\Models\\User"
                }
            }
        ]
    }
}
 */
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
/** 
 * @bodyParam email string required Example: user@user.com
 * @bodyParam password string required Example: 12345678
 * @response  {
    "status": true,
    "token": "6|Imv8VDsE27b1sRclxv91emCSIbLpxLmfvK3wFsAa",
    "data": {
        "id": 55,
        "first_name": "Abhik",
        "last_name": "paul",
        "email": "abhik421@gmail.com",
        "phone": "6655443321",
        "email_verified_at": null,
        "current_team_id": null,
        "profile_photo_path": null,
        "active": 0,
        "created_at": "2021-02-17T15:13:27.000000Z",
        "updated_at": "2021-02-17T15:13:27.000000Z",
        "full_name": "Abhik paul",
        "role_name": "CLIENT"
    }
}
 */
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
/** 
 * @authenticated
 * @response  {
    "status": true,
    "data": {
        "id": 55,
        "first_name": "Abhik",
        "last_name": "paul",
        "email": "abhik421@gmail.com",
        "phone": "6655443321",
        "email_verified_at": null,
        "current_team_id": null,
        "profile_photo_path": null,
        "active": 0,
        "created_at": "2021-02-17T15:13:27.000000Z",
        "updated_at": "2021-02-17T15:13:27.000000Z",
        "full_name": "Abhik paul",
        "role_name": "CLIENT"
    }
}
 * @response  401 {
 *   "message": "Unauthenticated."
*}
 */
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
