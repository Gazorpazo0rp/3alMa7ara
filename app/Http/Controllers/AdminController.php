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
        
        $Worker->save();
        
        WorkerRequest::delete($id);

        DB::table('worker_requests')->where('id',$id)->delete();

        //return view('HomePage');
    }
    public function Reject_Request($id)
    {
        DB::table('worker_requests')->where('id',$id)->delete();
        //return view('HomePage');
    }
    public function View_Requests()
    {
        $Reqs = WorkerRequest::orderBy('created_at')->get();
        $data = view('fetchRequests',['requests'=>$Reqs])->render();
        return $data;
    }
    
    //Staff Part.
    public function View_Staff()
    {
        $Reqs = Worker::orderBy('id')->get();
        //$data = view('fetchRequests',['workers'=>$Reqs])->render();
        return $data;
    }

    public function Show_Worker()
    {
        $Req = Worker::find($id);
        return $Req;
    }

    //Reservation Part.
    public function View_Reservations()
    {
        $Res = Form::orderdBy('created_at')->get();
        return $Res;

    }
    public function Show_Reservation($id)
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
