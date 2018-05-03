<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Selected_Service extends Model
{
    //Table Name
    protected $table = "selected_services";



    public function forms()
    {
        return $this->belongsTo('App\Form', 'form_id');        
    }
    
    public function prices()
    {
        return $this->belongsTo('App\Price', 'price_id');        
    }
    
    public function services()
    {
        return $this->belongsTo('App\Service', 'service_id');        
    }
}
