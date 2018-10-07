<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    //mass assignment
    protected $fillable=[
        'staff_name'
    ];

    public function staff_photo(){
        return $this->morphMany('App\Photo','photoes','imageable_type','imageable_id');
    }

}
