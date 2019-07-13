<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->auth == "Admin") {
                return view('Admin.home');
            } elseif(Auth::user()->auth ="Customer") {
               return view('Customer.home');
            } else {
                return redirect('home');
            }
        }
    }
}