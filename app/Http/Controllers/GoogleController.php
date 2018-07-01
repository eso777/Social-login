<?php

namespace App\Http\Controllers;

use App\Http\Controllers\SocialClasses\GoogleClass;
use Illuminate\Http\Request;

class GoogleController extends SocialAuthenticationController
{
    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function redirect()
    {
        $google  = new GoogleClass();
        return redirect($google->authDialogUrl());
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function callback(Request $request)
    {
        $google = new GoogleClass;
        $token  = $google->exchangeCodeForAccessToken($request->code);
        if(@$token->error){
            return redirect(url('/'))->with(['error'=>'Please authorize our app']);
        }
        $userObject = $google->getUserDataByAccessToken($token->access_token);
        return $this->registerOrLogin($userObject) ;
    }


    /**
     * @param $userObject
     * @return mixed
     */
    public function registerOrLogin($userObject)
    {
        // GET USER ROW IF EXIST IN A DATA BASE
        $user = $this->getUserIfExist($userObject->sub) ;

        // CHECK IF CHANNEL ID EXIST IN A DATABASE
        if (!is_null($user)){
            // LOGIN AND REDIRECT
            return $this->loginUserThenRedirect($user) ;
        }

        // CREATE A NEW USER THEN REDIRECT
        return $this->createNewUserIfNotExist($userObject->name,'GOOGLE',$userObject->sub,$userObject->email);
    }

}
