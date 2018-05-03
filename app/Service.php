<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //Table Name
    protected $table = "services";
    //Timestamps
    public $timestamps = true;


    public function services()
    {
        return $this->hasMany('App\Selected_Service', 'service_id');
    }
    
    public function options()
    {
        return $this->hasMany('App\Service_option_Price', 'service_id');
    }
}
