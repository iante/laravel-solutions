<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class registerCustomController extends Controller

{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function register(Request $request){

        // Validate
        $request->validate([
            'name'         => 'required',
            'email'        => 'required|email|unique:users,email',
            'phone_number' => 'required|max:15|min:9',
            'password'     => 'required|confirmed|min:6',
            
        ]);

// User store
$user_store       = new User();
$user_store->name  = $request->name;
$user_store->email = $request->email;

$user_store->password = Hash::make($request->password);
$user_store->phone    = $request->phone_number;

        $user_store->save();
        Auth::login($user_store);
        return response()->json(['Message' => 'User Registered Succesfully',
        'User Details' => $user_store]);

    }

    public function login(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (!$token = auth()->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);

    }

    public function Getusers(Request $request){
        $all_users = User::all();
        return response()->json([
        'All User Details' => $all_users
        ]);

    }
}
