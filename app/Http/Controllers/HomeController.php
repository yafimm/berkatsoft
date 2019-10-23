<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $newest_product = \App\Product::orderBy('created_at', 'desc')->take(8)->get();
        return view('welcome', compact('newest_product'));
    }

    public function contact()
    {
        return view('contact');
    }
}
