<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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

        $register = User::create($request->all());
        
        if($register){
            Session::flash('register-message', 'Register Success!');
        }

        return redirect('/login');
    }
}
