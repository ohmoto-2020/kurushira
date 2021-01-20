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
      $this->middleware('auth');
      $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function myPage()
    {
      return view('auth.myPage');
    }

    public function about()
    {
      return view('page.about');
    }

    public function getLogout(){
      Auth::logout();
      return redirect()->route('page.index');
    }
}
