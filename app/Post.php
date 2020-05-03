<?php

namespace App;

use Cviebrock\EloquentSluggable\SluggableInterface;

use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

class Post extends Model implements SluggableInterface
{
    //
    use SluggableTrait;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
   protected $sluggable=[

       'build_from' => 'title',
       'save_to' => 'slug',
       'on_update' => true,
   ];
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

}
