<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //Table Name
    protected $table = 'images';

    public $timestamps = true;

    public function project()
    {
        return $this->belongsTo('App\Project' , 'project_id');
    }
}
