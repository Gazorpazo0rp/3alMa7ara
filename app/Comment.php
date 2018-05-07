<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //Table Name
    protected $table = 'comments';
    //Timestamps
    public $timestamps = true;

    public function customer()
    {
        return $this->belongsTo('App\Customer' , 'customer_id');
    }

    public function worker()
    {
        return $this->belongsTo('App\Worker' , 'worker_id');
    }
}
