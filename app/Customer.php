<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends User
{
    //Table Name
    protected $table = 'customers';
    //Primary Key
    public $primaryKey = 'customer_id';
    //Timestambs
    public $timestamps = false;
    
    public function apartments()
    {
        return $this->hasMany('App\Apartments','customer_id');
    }
}
