<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartments extends Model
{
    //Table name
    protected $table = 'apartments';
    //Timestambs
    public $timestamps = true;

    //Customer has Apartments
    public function customer()
    {
        return $this->belongsTo('App\Customer','customer_id');
    }
}
