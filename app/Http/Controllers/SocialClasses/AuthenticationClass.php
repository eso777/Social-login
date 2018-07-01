<?php

namespace App\Http\Controllers\SocialClasses;

abstract class AuthenticationClass
{

    protected $channel ;

    /**
     * Generate Authorization Dialog Url
     */
    abstract function authDialogUrl();

    /**
     * @param $code
     */
    abstract function exchangeCodeForAccessToken($code);

    /**
     * @param $accessToken
     */
    abstract function getUserDataByAccessToken($accessToken);


}