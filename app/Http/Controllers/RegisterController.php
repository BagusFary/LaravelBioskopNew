<?php

namespace App\Http\Controllers;

use App\Events\UserRegistered;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function store(RegisterRequest $request)
    {

        $request['password'] = Hash::make($request->password);

        $registerData = User::create($request->all());

       
        
        if($registerData){

            event(new UserRegistered($request->input('email')));

            Session::flash('register-success', 'Register Success!, Check Your Email');

        } else {
            
            Session::flash('register-failed', 'Register Failed, Try Again Later..');

        }

        return redirect('/login');
    }
}
