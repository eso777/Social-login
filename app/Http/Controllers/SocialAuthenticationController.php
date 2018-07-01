<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;

class SocialAuthenticationController extends Controller
{

    /**
     * @param $channel_id
     * @return bool
     */
    public function getUserIfExist($channel_id)
    {
        return User::where('channel_id',$channel_id)->first() ;
    }


    /**
     * @param $name
     * @param $channel_name
     * @param $channel_id
     * @param $email
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function createNewUserIfNotExist($name, $channel_name, $channel_id, $email)
    {
       // CREATE A NEW USER
       $usr = User::create([
                'name'         => $name,
                'channel_name' => $channel_name,
                'channel_id'   => $channel_id,
                'email'        => $email,
           ]);

       // LOGIN AND REDIRECT TO HOME PAGE
       return $this->loginUserThenRedirect($usr) ;
    }

    public function loginUserThenRedirect($usr)
    {

        // IF AUTH LOGIN HAS BEEN DONE
        if(Auth('web')->loginUsingId($usr->id)){
            return redirect(Url('/homePage')) ;
        }

        // IN CASE CAN'T LOGIN
        return redirect(Url('/'))->with(['error' => 'SOMETHING WENT WRONG , PLEASE TRY AGAIN !']) ;
    }

}
