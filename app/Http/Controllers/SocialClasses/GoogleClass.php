<?php

namespace App\Http\Controllers\SocialClasses;

use RequestsHandler;
class GoogleClass extends AuthenticationClass
{
    /**
     * @return string
     */
    function authDialogUrl()
    {
        $dialogUrl      = 'https://accounts.google.com/o/oauth2/v2/auth?';
        $parameters     = array_only(Config('social.google'),['client_id','redirect_uri','scope']);
        $parameters     = array_merge($parameters,['response_type'=>'code']);
        $queryString    = urldecode(http_build_query($parameters,''));
        return $dialogUrl.$queryString;
    }

    /**
     * @param $code
     * @return mixed
     */
    function exchangeCodeForAccessToken($code)
    {
        $url        = 'https://www.googleapis.com/oauth2/v4/token?';
        $parameters = array_only(Config('social.google'),['client_id','client_secret','redirect_uri']);
        $parameters = array_merge($parameters,['grant_type'=>'authorization_code','code'=>$code]);
        $request    = RequestsHandler::url($url)->setBody($parameters)->setMethod('POST')->send();
        return $request;
    }


    /**
     * @param $accessToken
     * @return mixed
     */
    public function getUserDataByAccessToken($accessToken)
    {
        $url        = 'https://www.googleapis.com/oauth2/v3/userinfo';
        $request    = RequestsHandler::url($url)->setHeaders(['Authorization :Bearer '.$accessToken])->send();
        return $request;
    }
}