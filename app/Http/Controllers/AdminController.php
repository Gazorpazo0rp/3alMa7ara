<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\WorkerRequest;
use App\Form;
use App\User;
use App\Selected_Service;
use App\Service;
use App\Price;


class AdminController extends Controller
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
        
        return $Req;    
    }
    public function View_Requests()
    {
        $Reqs = WorkerRequest::orderBy('created_at');
        return $Reqs;
    }
    
    //Staff Part.
    public function View_Staff()
    {
        $Reqs = Worker::orderBy('id');
        return $Reqs;
    }

    public function Show_Worker()
    {
        $Req = Worker::find($id);
        return $Req;
    }

    //Reservation Part.
    public function View_Reservations()
    {
        $Res = Form::orderdBy('created_at');
        return $Res;

    }
    public function Show_Reservations($id)
    {
        $Res = Form::find($id);
        $Customer_Info = User::find($Res['customer_id']);
        $IDS = Selected_Service::find($id);
        $Qus = array();
        $Ans = array();
        foreach($IDS as $tmp)
        {
            $Q = Service::find($tmp['service_id']);
            $A = Price::find($tmp['price_id']);
            array_push($Qus,$Q['descriptions']);
            array_push($Ans,$A['name']);
        }
                    //return $Customer_Info,$Qus,$Ans. 
    }
}
