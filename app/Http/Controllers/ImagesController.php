<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ImagesController extends Controller
{
    public function Designs()   //names of variables.
    {
        $Images = DB::select('select imagepath , name from workers,images where worker_id = id and type = "Designs"');
        $Adress = "Designs";
        $Paragraph = "This is Designs page !";
        return view('SectionPage')->with('Images',$Images)->with('Paragraph',$Paragraph)->with('Address',$Adress);;
    }
    public function Refubishmement()   //names of variables.
    {
        $Adress = "Refubishmement";
        $Paragraph = "This is Refubishmement page !";
        $Images = DB::select('select imagepath , name from workers,images where worker_id = id and type = "Refubishmement"');
        return view('SectionPage')->with('Images',$Images)->with('Paragraph',$Paragraph)->with('Address',$Adress);
    }
    public function Decor_and_art()   //names of variables.
    {
        $Adress = "Decor And Art";
        $Paragraph = "This is Decor_and_art page !";
        $Images = DB::select('select imagepath, name from workers,images where worker_id = id and type = "Decor & art"');
        return view('SectionPage')->with('Images',$Images)->with('Paragraph',$Paragraph)->with('Address',$Adress);;
    }
    public function Firefighting_and_air_conditioning()   //names of variables.
    {
        $Adress = "Firefighting | Air Conditioning";
        $Paragraph = "This is Firefighting_and_air_conditioning page !";
        $Images = DB::select('select imagepath, name from workers,images where worker_id = id and type = "Firefighting | Air conditioning"');
        return view('SectionPage')->with('Images',$Images)->with('Paragraph',$Paragraph)->with('Address',$Adress);;
    }
}
