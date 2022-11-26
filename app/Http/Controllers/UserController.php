<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        $user = User::where('role_id', '!=', 1)
                    ->get();
        return view('dashboard.admin-user', ['user' => $user]);
    }

    public function destroy($id)
    {
        $destroyuser = User::findOrFail($id);
        $destroyuser->delete();
        if($destroyuser){
            Session::flash('message', 'Delete User Success');
        }

        return redirect('/dashboard-admin-users');
    }
}
