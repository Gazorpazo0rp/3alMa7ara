<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkerRequest extends Model
{
    //table name
    protected $table = 'worker_requests';

    public $timestamps = true;
}
