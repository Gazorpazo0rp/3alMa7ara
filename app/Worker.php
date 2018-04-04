<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Worker extends User
{
    //Table Name
    protected $table = 'workers';
    //Timestamps
    public $timestamps = false;
}
