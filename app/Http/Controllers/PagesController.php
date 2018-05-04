<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function Home()
    {
        return view('HomePage');
    }
    public function Reservation(){
        return view('ReservationPage');
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
         
        //See if the form has a file
        if($request->hasFile('cv'))
        {   
            //get the name of the file
            $filename = $request->cv->getClientOriginalName();
            //save the file with its original name >>>> Concatenate email with filename to avoid replacing files
            $path = $request->cv->storeAs('public/upload/CVs', $Req->email.' '.$filename);
            $Req->filepath = $path;
        }
       
        $Req->save();
        
        return view('HomePage');
    }
}
