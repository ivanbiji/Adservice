<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class main extends Controller
{

    /* Displaying the starting page  */
    public function mainview()
    {
        return view('home');
    }
}
