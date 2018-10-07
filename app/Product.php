<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable =[
        'prod_name'
    ];

    public function photo(){
        return $this->morphMany('App\Photo','photoes','imageable_type','imageable_id');
    }
}
