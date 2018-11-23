<?php

namespace App\Http\Controllers;

use App\ads;
use App\wishlist;
use App\Http\Requests\AdValidation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class wishop extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function addwish(Request $request)
    {

        $wish = new wishlist;
        $wish->userid = Auth::guard('web')->user()->id;
        $wish->adid = $request->id;
        $wish->save();

        return redirect()->back();

    }

    public function deletewish(Request $request)
    {
        $wish = wishlist::where('userid','=',$request->userid)->get();
        wishlist::findOrFail($wish[0]->id)->delete();
        return redirect()->route('home.profile');

    }
}
