<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    //Table Name
    protected $table = 'Phones';
    
    //Primary key (foreign Key);

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
