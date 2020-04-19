<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $upload='/images/';

    protected $fillable=['file'];

    protected function getFileAttribute($photo){

        return $this->upload.$photo;
    }
}
