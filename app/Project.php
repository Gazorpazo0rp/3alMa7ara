<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //Table name 
    protected $table = "projects";

    //Timestamps
    public $timestamps = true;

    //Table has -besides the id and timestamps 
    // att(name) -> name of the Project
    // att(designers) -> names of the designers
    // att(period) -> how long the project took to be finished
    // att(thumbnail) -> path to an image that will represent the gallery of the project
    // att(location) -> where the project is
}
