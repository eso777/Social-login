<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomePageController extends Controller
{
    public function index()
    {
        if (!Auth::guard('web')->check()){

            return view('index') ;
        }

        return redirect()->to(Url('/homePage')) ;

    }

    public function getHomePage(){
        return view('home') ;
    }
}
