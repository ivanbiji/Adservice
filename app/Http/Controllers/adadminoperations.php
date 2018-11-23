<?php

namespace App\Http\Controllers;

use App\ads;
use App\User;
use App\wishlist;
use Illuminate\Http\Request;

class adadminoperations extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function viewad($id)
    {

        $ads = ads::where('id', '=', $id)->get();
        $userid = $ads[0]->userid;
        $seller = User::where('id', '=', $userid)->get();
        return view('admin.adshow', ['ads' => $ads, 'seller' => $seller]);

    }

    public function searchad(Request $request)
    {

        $ads = ads::search($request->search)->get();
        return view('admin', ['ads' => $ads]);

    }
    public function deletead(Request $request)
    {

        ads::findOrFail($request->id)->delete();
        $orgs = wishlist::where('adid', '=', $request->id)->get();
        foreach ($orgs as $org) 
        {
            $org->delete();
        }
        return redirect()->route('admin');

    }
}
