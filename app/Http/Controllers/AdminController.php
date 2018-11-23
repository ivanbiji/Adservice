<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ads;
use App\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $ads = ads::orderBy('id', 'desc')->get();
        return view('admin',['ads' => $ads]);
    }

    public function filter_cat($id)
    {

        $ads = ads::where('category', '=',$id)->orderBy('id', 'desc')->get();
        return view('admin',['ads' => $ads]);
    }

    public function filter_user($id)
    {

        $ads = ads::where('userid', '=',$id)->orderBy('created_at', 'desc')->get();
        return view('admin',['ads' => $ads]);
    }

    public function show_user()
    {
        return view('user.usershow');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }

    protected function loggedOut(Request $request)
    {
        //
    }


    public function username()
    {
        return 'name';
    }



    protected function guard()
    {
        return Auth::guard('admin');
    }
}
