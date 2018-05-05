<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ImagesController extends Controller
{
    public function Refurbishment()   //names of variables.
    {
        $Address = "Refurbishment";
        $Paragraph = "This is Refurbishment page !";
        $Images = DB::select('select imagepath from images where type = "Refurbishment"');
        return view('SectionPage')->with('Images',$Images)->with('Paragraph',$Paragraph)->with('Address',$Address);
    }
    public function Decor_and_art()   //names of variables.
    {
        $Address = "Decor And Art";
        $Paragraph = "This is Decor_and_art page !";
        $Images = DB::select('select imagepath from images where type = "Decor & art"');
        return view('SectionPage')->with('Images',$Images)->with('Paragraph',$Paragraph)->with('Address',$Address);
    }
    public function Firefighting_and_air_conditioning()   //names of variables.
    {
        $Address = "Firefighting | Air Conditioning";
        $Paragraph = "This is Firefighting_and_air_conditioning page !";
        $Images = DB::select('select imagepath from images where type = "Firefighting | Air conditioning"');
        return view('SectionPage')->with('Images',$Images)->with('Paragraph',$Paragraph)->with('Address',$Address);
    }
    public function Designs()   //names of variables.
    {
        $Address = "Designs";
        $Images = DB::select('select imagepath from images where type = "Design"');
        $Paragraph = "This is Designs page !";
        return view('SectionPage')->with('Images',$Images)->with('Paragraph',$Paragraph)->with('Address',$Address);
    }
}
