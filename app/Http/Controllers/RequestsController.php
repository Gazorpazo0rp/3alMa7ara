<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\WorkerRequest;

class RequestsController extends Controller
{
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
    /*
    The function below is called when the admin accepts an applicant request.
    The request now will be deleted from the DB and the info will added as a new worker.
    */
    public function Accept_Request($id) 
    {
        $request = WorkerRequest::find($id);
        
        
        $Worker = new Worker; 
      
        $Worker->name = $request->name;
        $Worker->age = $request->age;
        $Worker->phone = $request->phone;
        $Worker->email = $request->email;
        $Worker->bio = $request->bio;
        $Worker->address = $request->address;
        $Worker->profession = $request->profession;
        
        $Req->save();
        
        return view('HomePage');
    }
    public function Reject_Request(Request $request)
    {
        $Req = WorkerRequest::find($id);
        $Req->delete();
        
        return view('HomePage');
    }
    public function Show_Request($id)
    {
        $Req = WorkerRequest::find($id);
        
        return view('------')->with('Req',$Req);    //with->(The variable name inside the view,The variable name here).
    }
    public function View_Requests()
    {
        $Reqs = WorkerRequest::orderBy('created_at');
        return view('------')->with('requests',$Reqs);    //with->(The variable name inside the view,The variable name here).
    }
}
