<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\WorkerRequest;

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
}
