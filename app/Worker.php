<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    //Table Name
    protected $table = 'workers';
    //Timestamps
    public $timestamps = true;

    //Relation : Worker can have many Images
    public function images()
    {
        return $this->hasMany('App\Image','worker_id');
    }
}
