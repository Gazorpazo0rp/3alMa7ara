<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImagesController extends Controller
{
    public function Designs()   //names of variables.
    {
        $Images = DB::select('select imagepath , name from workers,images where worker_id = id and type = "Designs"');
        return view('Designs')->with('Images',$Images);
    }
    public function Refubishmement()   //names of variables.
    {
        $Images = DB::select('select imagepath , name from workers,images where worker_id = id and type = "Refubishmement"');
        return view('Refubishmement')->with('Images',$Images);
    }
    public function Decor_and_art()   //names of variables.
    {
        $Images = DB::select('select imagepath, name from workers,images where worker_id = id and type = "Decor & art"');
        return view('Refubishmement')->with('Images',$Images);
    }
    public function Firefighting_and_air_conditioning()   //names of variables.
    {
        $Images = DB::select('select imagepath, name from workers,images where worker_id = id and type = "Firefighting & Air conditioning"');
        return view('Refubishmement')->with('Images',$Images);
    }
}
