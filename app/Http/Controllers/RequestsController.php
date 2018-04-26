<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RequestsController extends Controller
{
    public function Submit_Request(Request $request) //Adding a request for the applicant in the database.
    {
        
        $Req = new WorkerRequest;  
      
        $Req->name = $request->input('name');
        $Req->age = $request->input('age');
        $Req->phone = $request->input('mobile');
        $Req->email = $request->input('email');
        $Req->bio = $request->input('bio');
        $Req->address = $request->input('address');
        $Req->profession = $request->input('prof');
        $path = $request->file('avater')->store('avatars');
        $Req->filepath = $path;
        $Req->save();
        
        
        
        
        return view('HomePage');
    }
    /*
    The function below is called when the admin accepts an applicant request.
    The request now will be deleted from the DB and the info will added as a new worker.
    */
    public function Accept_Request(Request $request) 
    {
        $Worker = new Worker; 
      
        $Worker->name = $request->input('name');
        $Worker->age = $request->input('age');
        $Worker->phone = $request->input('mobile');
        $Worker->email = $request->input('email');
        $Worker->bio = $request->input('bio');
        $Worker->address = $request->input('address');
        $Worker->profession = $request->input('prof');
        
        $Req->save();
        
        
        return view('HomePage');
    }
    public function Reject_Request(Request $request)
    {
        $Req = new WorkerRequest;  //Making 
      
        $Req->name = $request->input('name');
        $Req->age = $request->input('age');
        $Req->phone = $request->input('mobile');
        $Req->email = $request->input('email');
        $Req->bio = $request->input('bio');
        $Req->address = $request->input('address');
        $Req->prof = $request->input('prof');
        
        $Req->save();
        
        
        return view('HomePage');
    }
}
