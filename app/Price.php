<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    //Table Name
    protected $table = "prices";
    //Timestamps
    public $timestamps = true;

    
    public function services()
    {
        return $this->hasMany('App\Selected_Service', 'price_id');
    }
    public function options()
    {
        return $this->hasMany('App\Service_option_Price', 'price_id');
    }
}
