<?php

return [
    'facebook'=>[
        'client_id'     => env('FACEBOOK_APP_ID','1300779570056524'),
        'client_secret' => env('FACEBOOK_APP_SECRET','10a3c95d46a8f6e684d2c9d4ae6d738e'),
        'redirect_uri'  => env('FACEBOOK_CALLBACK_URL','https://hostazia.com/facebook/callback'),
        'scope'         => 'email',
    ],
    'google'=>[
        'client_id'     => env('GOOGLE_APP_ID','870779873531-m5tfqgs46tja2qj7kqgjqol7ikq2bkcc.apps.googleusercontent.com'),
        'client_secret' => env('GOOGLE_APP_SECRET','UkBT-xHkZMlXVxUwdtbcRHcU'),
        'redirect_uri'  => env('GOOGLE_CALLBACK_URL','https://hostazia.com/google/callback'),
        'scope'         => 'email',
        //'scope'=>'https://www.googleapis.com/auth/userinfo.email',
    ],
    'twitter'=>[
        'app_id'       => '',
        'app_secret'   => '',
        'callback_url' => '',
        'scope'        => '',
    ],
];

//https://accounts.google.com/o/oauth2/v2/auth?scope=https://www.googleapis.com/auth/userinfo.email&access_type=offline&include_granted_scopes=true&redirect_uri=https://hostazia.com/google/callback&response_type=code&client_id=870779873531-m5tfqgs46tja2qj7kqgjqol7ikq2bkcc.apps.googleusercontent.com