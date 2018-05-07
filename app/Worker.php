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

    public function tasks()
    {
        return $this->hasMany('App\On_Going_Task' , 'worker_id');
    }

    public function comment()
    {
        return $this->hasMany('App\Comment' , 'worker_id');
    }

    public function workimages()
    {
        return $this->hasMany('App\Worker_Image' , 'worker_id');
    }
}
