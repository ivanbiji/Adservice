<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ads;
use App\wishlist;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    public function __construct()
    {
        $this->middleware('auth:web');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $ads = ads::orderBy('id', 'desc')->get();
        return view('home',['ads' => $ads]);
    }

    public function filter_cat($id)
    {

        $ads = ads::where('category', '=',$id)->orderBy('id', 'desc')->get();
        return view('home',['ads' => $ads]);
    }

    public function filter_user($id)
    {

        $ads = ads::where('userid', '=',$id)->orderBy('created_at', 'desc')->get();
        return view('home',['ads' => $ads]);
    }

    public function show_user()
    {
        $wishs = wishlist::select('adid')->where('userid', '=',Auth::user()->id)->orderBy('created_at', 'desc')->get();
        $ads = ads::whereIn('id',$wishs)->get();
        return view('user.usershow',['ads' => $ads]);
    }
}
