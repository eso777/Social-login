<?php

namespace App\Http\Controllers\SocialClasses;

use RequestsHandler;
class FacebookClass extends AuthenticationClass
{
    public function authDialogUrl()
    {
        $dialogUrl      = 'https://www.facebook.com/v3.0/dialog/oauth?';
        $parameters     = array_only(Config('social.facebook'),['client_id','redirect_uri','scope']);
        $queryString    = urldecode(http_build_query($parameters,''));
        return $dialogUrl.$queryString;
    }

    public function exchangeCodeForAccessToken($code)
    {
        $url        = 'https://graph.facebook.com/v3.0/oauth/access_token';
        $parameters = array_only(Config('social.facebook'),['client_id','client_secret','redirect_uri']);
        $parameters = array_merge($parameters,['code'=>$code]);
        $request    = RequestsHandler::url($url)->setBody($parameters)->send();
        return $request;
    }

    public function getUserDataByAccessToken($accessToken)
    {
        $url        = 'https://graph.facebook.com/v3.0/me';
        $parameters = ['fields'=>'id,name,email'];
        $headers    = ['Authorization: Bearer '.$accessToken];
        $request    = RequestsHandler::url($url)->setMethod('GET')->setBody($parameters)->setHeaders($headers)->send();
        return $request;
    }

}