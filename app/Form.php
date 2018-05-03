<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    //Table Name
    protected $table = "forms";
    //Timestamps
    public $timestamps = true;

    public function services()
    {
        return $this->hasMany('App\Selected_Service', 'form_id');
    }
}
