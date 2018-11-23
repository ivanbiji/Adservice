<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class homeview extends Controller
{
    

    public function __construct()
    {
        $this->middleware('guest', ['except' => ['admin','web']]);
    }

    public function index()
    {
        if(Auth::guard('admin')->check()){

            return redirect()->route('admin');
        }
        
        return view('welcome');
    }
}
