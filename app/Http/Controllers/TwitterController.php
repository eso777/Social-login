<?php

namespace App\Http\Controllers;

use App\Http\Controllers\SocialClasses\GoogleClass;
use App\Http\Controllers\SocialClasses\TwitterClass;
use Illuminate\Http\Request;

class TwitterController extends Controller
{
    /*public function redirect()
    {
        $fb  = new TwitterClass();
        return redirect($fb->authDialogUrl());
    }

    public function callback(Request $request)
    {
        return redirect('http://social-login.dv/twitter/callback?code='.$request->code);
    }*/
}
