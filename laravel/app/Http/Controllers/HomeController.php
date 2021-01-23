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
      $this->middleware('auth')->except('about');
      // $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      return view('page.index');
    }

    public function my_page()
    {
      return view('auth.my_page');
    }

    public function about()
    {
      return view('page.about');
    }

    public function main()
    {
      return view('page.main');
    }

    public function result()
    {
      return view('page.result');
    }

}
