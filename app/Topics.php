<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PharIo\Manifest\Url;

class Topics extends Model
{
    // SET TABLE NAME
    protected $table = 'topics' ;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title','user_id','image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class) ;
    }

    // GET IMAGE ATTRIBUTE
    public function getImageAttribute($img)
    {
        return (!empty($img)) ? Url('/uploads') . '/' . $img : '' ;
    }
}
