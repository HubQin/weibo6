<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class StaticPagesController extends Controller
{
    public function home()
    {
        $feedItems = [];
        if (Auth::check()) {
            $feedItems = Auth::user()->feed()->paginate(30);
        }
        return view('static_pages/home', compact('feedItems'));
    }

    public function help()
    {
        return view('static_pages/help');
    }

    public function about()
    {
        return view('static_pages/about');
    }
}
