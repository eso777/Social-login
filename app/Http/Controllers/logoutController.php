<?php

namespace App\Http\Controllers;

use App\Http\Controllers\SocialClasses\AuthenticationClass;
use Illuminate\Http\Request;

class logoutController extends Controller
{
    public function logoutUser(){
        Auth('web')->logout() ;
        return redirect()->to(Url('/')) ;
    }
}
