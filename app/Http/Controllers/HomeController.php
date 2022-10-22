<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        //dd(Auth::check());
        //dd(Auth::id());
        //dd(Auth::user());
        return view('home');
    }
    public function about(){
        return view('about');
    }
}
