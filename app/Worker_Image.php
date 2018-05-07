<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Worker_Image extends Model
{
    //Table Name
    protected $table = 'worker_images';
    //Timestamps
    public $timestamps = true;

    public function worker()
    {
        return $this->belongsTo('App\Worker' , 'worker_id');
    }
}
