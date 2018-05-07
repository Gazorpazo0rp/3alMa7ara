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
    
    public $numberOfApartments;
    
    public function apartments()
    {
        return $this->hasMany('App\Apartment','customer_id');
    }

    public function tasks()
    {
        return $this->hasMany('App\On_Going_Task' , 'customer_id');
    }

    public function comment()
    {
        return $this->hasMany('App\Comment' , 'customer_id');
    }
}
