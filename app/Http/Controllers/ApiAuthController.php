<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ApiAuthController extends Controller
{
    public function register(Request $request){
        $data = $request->validate([
            'name' => 'required|string|max:25',
            'email' => 'email:dns|unique:users',
            'password' => 'required|confirmed'
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password'=> bcrypt($data['password']),
        ]);

        $token = $user->createToken('token')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function login(Request $request){
        $data = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('email', $$data['email'])->get();

        return response()->json($user);

        if ($user && Hash::check($data['password'], $user->password)) {
            
            $token = $user->createToken('token')->plainTextToken;
            
            return response()->json([
                'message' => 'Login Success',
                'user' => $user,
                'token' => $token
            ], 200);

        } else {

            return response()->json([
                'message' => 'User atau Password Salah'
            ], 401);
        }
    }

    public function logout(){

        Auth::user()->tokens()->delete();

        return response()->json([
            'message' => 'Logged Out'
        ]);
    }
    
}
