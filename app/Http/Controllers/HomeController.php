<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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
        return view('home');
    }

    public function search($username){
      return view('search', ["result" => User::where('name', "like", "%".$username."%")
      ->where('_id', "!=", Auth::user()->id)
      ->get()]);
    }
    public function profile($username){
      return view('profile', ["result" => User::where('name', $username)->get(),
      "onlyView"=> true]);
    }

}
