<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //Table name 
    protected $table = "projects";

    //Timestamps
    public $timestamps = true;

    // each project may have many images in its Gallery
    public function image()
    {
        return $this->hasMany('App\Image' , 'project_id');
    }
}
