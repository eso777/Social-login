<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // GET CURRENT USER
    public function getCurrentUser(){

        if (!Auth('web')->check()){
            return redirect()->to(Url('/')) ;
        }

        return Auth('web')->user() ;
    }

    // UNLINK IMAGES
    public function _unlinkFiles($file_name)
    {
        $pathImg = public_path('/uploads') . '/' . $file_name ;
        if (file_exists($pathImg)){
            unlink($pathImg) ;
        }

        return ;
    }
}
