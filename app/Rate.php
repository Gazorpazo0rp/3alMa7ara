<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    //Table Name
    protected $table = 'Rates';
    //Timestamps
    public $timestamps = true;

    public function customer()
    {
        return $this->belongsTo('App\Customer' , 'customer_id');
    }

    public function worker()
    {
        return $this->belongsTo('App\Worker' ,'worker_id');
    }
}
