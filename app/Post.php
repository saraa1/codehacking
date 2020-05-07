<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Post extends Model
{
    //
    use Sluggable;
    use SluggableScopeHelpers;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
//   protected $sluggable=[
//
//       'build_from' => 'title',
//       'save_to' => 'slug',
//       'on_update' => true,
//   ];
    public  function sluggable(){
        return [
            'slug'=>[
                'source'=> 'title'
            ]
        ];
    }
    protected $fillable=[

        'category_id',
        'photo_id',
        'title',
        'body'

    ];

    public function user(){

        return $this->belongsTo('App\User');
    }
    public function photo(){

        return $this->belongsTo('App\Photo');
    }
    public function category(){

        return $this->belongsTo('App\Category');
    }

    public function comment(){
        return $this->hasMany('App\Comment');
    }
    public function photoPlaceHolder(){
        return "https://placehold.it/700x200";
    }

}
