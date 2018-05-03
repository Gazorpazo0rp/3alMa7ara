<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service_option_Price extends Model
{
    //Table Name 
    protected $table = "service_option_prices";

    public function services()
    {
        return $this->belongsTo('App\Service', 'services_id');
    }

    public function prices()
    {
        return $this->belongsTo('App\Price', 'price_id');
    }
}
