<?php namespace App\Facades;

use App\Http\Controllers\cURL;
use Illuminate\Support\Facades\Facade;

class cUrlFacade extends Facade{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return cURL::class;
    }

}