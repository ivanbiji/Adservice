<?php

namespace App\Http\Controllers;

use App\ads;
use App\Http\Requests\AdValidation;
use App\User;
use App\wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class adoperations extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function addform()
    {

        return view('user.addform');

    }

    public function submitform(AdValidation $request)
    {

        $validated = $request->validated();
        $ad = new ads;
        $ad->userid = Auth::guard('web')->user()->id;
        $ad->description = $validated['description'];
        $ad->searchtag = $validated['searchtag'];
        $ad->price = $validated['price'];
        $ad->title = $validated['title'];
        $ad->category = $validated['category'];
        if ($request->hasFile('photo')) {
            $image = $validated['photo'];
            Image::make($image)->encode('jpg', 100);
            $filename = $ad->userid . '' . time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('img/' . $filename);
            Image::make($image)->fit(300, 300)->save($location);
            $ad->img = $filename;
        }

        $ad->save();

        return redirect()->route('home');

    }
    public function viewad($id)
    {

        $ads = ads::where('id', '=', $id)->get();
        $userid = $ads[0]->userid;
        $seller = User::where('id', '=', $userid)->get();
        $wishs = wishlist::select('adid')->where('userid', '=', Auth::user()->id)->where('adid', '=',$id)->get();

        return view('user.adshow', ['ads' => $ads, 'seller' => $seller, 'wishs' => $wishs]);

    }

    public function searchad(Request $request)
    {

        $ads = ads::search($request->search)->get();
        return view('home', ['ads' => $ads]);

    }
    public function deletead(Request $request)
    {

        $ads = ads::where('id', '=', $request->id)->get();
        $userid = $ads[0]->userid;
        if ($userid == Auth::user()->id) {

            ads::findOrFail($request->id)->delete();
            $orgs = wishlist::where('adid', '=', $request->id)->get();
            foreach ($orgs as $org) 
            {
                $org->delete();
            }
        }
        return redirect()->route('home');

    }
}
