<?php

namespace App\Http\Controllers;

use App\ads;
use App\User;
use App\wishlist;
use Illuminate\Http\Request;

class useroperations extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {

        $users = User::orderBy('id', 'desc')->get();
        return view('user', ['users' => $users]);
    }

    public function viewu($id)
    {

        $users = User::where('id', '=', $id)->get();
        return view('admin.usershow', ['users' => $users]);
    }

    public function searchu(Request $request)
    {

        $users = User::search($request->search)->get();
        return view('user', ['users' => $users]);

    }
    public function deleteu(Request $request)
    {

        wishlist::where('userid','=',$request->id)->delete();
        User::findOrFail($request->id)->delete();
        $orgs = ads::where('userid', '=', $request->id)->get();
        foreach ($orgs as $org) 
        {
            $org->delete();
        }
        $orgs = wishlist::where('userid', '=', $request->id)->get();
        foreach ($orgs as $org) 
        {
            $org->delete();
        }

        return redirect()->route('user');
    }
}
