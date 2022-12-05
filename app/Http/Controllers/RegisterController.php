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

        event(new UserRegistered($request->input('email')));
        
        if($registerData){
            Session::flash('register-message', 'Register Success!');
        }

        return redirect('/login');
    }
}
