<?php

namespace App\Http\Controllers;

use App\Http\Controllers\SocialClasses\AuthenticationClass;
use Illuminate\Http\Request;

class ManageController extends Controller
{
    public function index(){
        return view('manage.index') ;
    }
}
