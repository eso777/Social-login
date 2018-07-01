<?php

// GET INDEX PAGE [ SOCIAL BUTTONS ]
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/','HomePageController@index') ;

// AUTH AREA [ USER MUST BE LOGIN TO VIEW ANY PAGE IN THIS GROUP ]
Route::group(['middleware'=>'UserAuth'],function (){

    Route::get('homePage','HomePageController@getHomePage') ;

    Route::resource('insert', 'InsertController');
    Route::resource('manage', 'ManageController');

});

/* THIS AREA SOCIAL MEDIA ROUTING  */

Route::group(['prefix'=>'facebook'],function (){
    Route::get('redirect','FacebookController@redirect');
    Route::get('callback','FacebookController@callback');
});

Route::group(['prefix'=>'google'],function (){
    Route::get('redirect','GoogleController@redirect');
    Route::get('callback','GoogleController@callback');
});

Route::group(['prefix'=>'twitter'],function (){
    Route::get('redirect','TwitterController@redirect');
    Route::get('callback','TwitterController@callback');
});

/* THIS AREA SOCIAL MEDIA ROUTING  */

// LOGOUT FROM YOUR DASHBOARD
Route::get('logout', 'logoutController@logoutUser');









/*
Route::get('test', function () {
    $r=RequestsHandler::url('https://www.googleapis.com/oauth2/v1/userinfo?access_token=ya29.GlzrBaG9DkAwy9kQddLFGvBC75StIsHdy7vwJ0TWfViAfPrmsl4DjQyYJ_ChFbh5V_27uczsy9cQkSA4W4Z0tnIT35O5fVri9AhuuKUrIxmRG4emCv9aefhiZ1V-eA')->send();
    dd($r);
});
Route::get('testxx', function () {
    $fb = new \App\Http\Controllers\SocialClasses\GoogleClass;
    $d = $fb ->getUserDataByAccessToken('ya29.GlvqBc9ViuWAiEVc33GjWO0iw0EI-Clrj_IoMDdNB8czmxfeXlDxnmdKMWUxCFdrweV4c9IbKePoM9IkFP1mjKKuLseQqmVyGX0vPBeL_864PMa0QSy2tSXE4_-D');
    dd($d);
});

Route::get('/000', function () {

    // return view('welcome');
    $headers = ['Authorization: Bearer EAACEdEose0cBADMlGoi86BSELZCwP9ARGm75JXcZB41vBZBqJCZADmtZCwGmzEcd9kLHxEbw6jxE5PqRYZCaeeHV7l7XcdbmC9FtrOs5F2pbgMa7ubmwHzB6miZBASuZBW9NipRIG8VHPYbgbqdsk6mFotczlbRsgW4of06qINAgsRCiZAZCDmNcXZCZAwEiCNX15ZA400UyaGAsoJ004jskgz1WZBYEm0wpZAcQUYZD'];
    $body    = ['fields'=>'id,name,about,birthday,email'];
    $data    = \cUrl::url('https://graph.facebook.com/v3.0/me')
                ->setHeaders($headers)
                ->setBody($body)
                ->send();
    return $data;
});

*/
