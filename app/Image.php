<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //Table name
    protected $table = 'images';
    //Timestamps
    public $timestamps = true;

    //Relation : Worker can have many Images
    public function worker()
    {
        return $this->belongsTo('App\Worker','worker_id');
    }
}
