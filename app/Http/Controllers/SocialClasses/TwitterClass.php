<?php

namespace App\Http\Controllers\SocialClasses;

use RequestsHandler;
class TwitterClass extends AuthenticationClass
{
    /**
     * @return string
     */
    function authDialogUrl()
    {
    }

    /**
     * @param $code
     * @return mixed
     */
    function exchangeCodeForAccessToken($code)
    {
    }


    /**
     * @param $accessToken
     * @return mixed
     */
    public function getUserDataByAccessToken($accessToken)
    {
    }

}