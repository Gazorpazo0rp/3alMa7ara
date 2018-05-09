<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //Table Name
    protected $table = 'admins';
    //Timestamps
    public $timestamps = true;
}
