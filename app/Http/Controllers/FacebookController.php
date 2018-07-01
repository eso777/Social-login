<?php

namespace App\Http\Controllers;

use App\Http\Controllers\SocialClasses\FacebookClass;
use App\User;
use Illuminate\Http\Request;

class FacebookController extends SocialAuthenticationController
{
    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function redirect()
    {
        $fb  = new FacebookClass;
        return redirect($fb->authDialogUrl());
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function callback(Request $request)
    {
        $fb     = new FacebookClass;
        $token  = $fb->exchangeCodeForAccessToken($request->code);
        if(@$token->error){
            return redirect(url('/'))->with(['error'=>'Please authorize our app']);
        }
        $userObject = $fb->getUserDataByAccessToken($token->access_token);
        return $this->registerOrLogin($userObject) ;
    }

    /**
     * @param $userObject
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function registerOrLogin($userObject)
    {
      // GET USER ROW IF EXIST IN A DATA BASE
      $user = $this->getUserIfExist($userObject->id) ;

      // CHECK IF CHANNEL ID EXIST IN A DATABASE
      if (!is_null($user)){
          // LOGIN AND REDIRECT
          return $this->loginUserThenRedirect($user) ;
      }

      // CREATE A NEW USER THEN REDIRECT
      return $this->createNewUserIfNotExist($userObject->name,'FACEBOOK',$userObject->id,$userObject->email);
    }

}
