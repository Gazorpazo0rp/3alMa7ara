<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\WorkerRequest;
use DB;

class PagesController extends Controller
{
    public function Home()
    {
        return view('HomePage');
    }
   
    public function Profile()
    {
        return ('Your Profile');
    }
    public function Register()
    {        
        return view('RegisterPage');
    }
    public function Simulator()
    {        
        return view('SimulatorPage');
    }
    public function Admin()
    {        
        return view('AdminDashboard');
    }
    public function ajaxTest()
    {   

        return ('AdminDashboard');
    }

    public function Submit_Request(Request $request) //Adding a request for the applicant in the database.
    {     
        $Req = new WorkerRequest;  
      
        $Req->email = $request->input('email');
        $Req->name = $request->input('name');
        $Req->profession = $request->input('profession');
        $Req->phone = $request->input('phoneNumber');
        $Req->age = $request->input('age');
        $Req->bio = $request->input('bio');
        $Req->address = $request->input('address');

        //Handle Uploaded File (CV)
        if($request->hasFile('cv'))
        {   
            //Get the name of the file
            $fileNameWithExt = $request->file('cv')->getClientOriginalName();
            // Get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just ext.
            $extension = $request->file('cv')->getClientOriginalExtension();
            // FileName To store
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            // Upload File
            $path = $request->file('cv')->storeAs('public/ApplicantCV', $fileNameToStore);

            $Req->filepath = $path;
        }
       
        $Req->save();
        Session::put('Message','Your request has been sent Successfully.');
        return redirect('/');
    }
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
