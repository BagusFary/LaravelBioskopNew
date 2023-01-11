<?php

namespace App\Http\Controllers\Testing;

use App\Models\Genre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class RedisController extends Controller
{
    public function index(){
        
        $data = Genre::get();
        
        return view('post', ['data' => $data]);
    }

    public function redis(){
        $data = Cache::remember('kunci', 600, function () {
            return Genre::get();
        });

       return view('post-redis', ['data' => $data]);
        
    }
}
