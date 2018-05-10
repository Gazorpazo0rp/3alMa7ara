<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class On_Going_Task extends Model
{
    //Table Name
    protected $table = 'on_going_tasks';

    protected $fillable = ['state','worker_id'];
    //Timestamps
    public $timestamps = true;

    //Relation : customer can be part of a task
    public function customer()
    {
        return $this->belongsTo('App\Customer' , 'customer_id');        
    }

    //Relation : worker can be part of a task
    public function worker()
    {
        return $this->belongsTo('App\Worker' , 'worker_id');
    }
}
