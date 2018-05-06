<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Worker;
use App\WorkerRequest;
use App\Form;
use App\User;
use App\Selected_Service;
use App\Service;
use App\Price;
use App\Image;
use DB;

class AdminController extends Controller
{
    /*
    The function below is called when the admin accepts an applicant request.
    The request now will be deleted from the DB and the info will added as a new worker.
    */
    public function Accept_Request($id) 
    {
        $request = WorkerRequest::find($id);
        
        $WorkerObj = new Worker; 
      
        $WorkerObj->name = $request->name;
        $WorkerObj->age = $request->age;
        $WorkerObj->phone = $request->phone;
        $WorkerObj->email = $request->email;
        $WorkerObj->bio = $request->bio;
        $WorkerObj->address = $request->address;
        $WorkerObj->profession = $request->profession;
        $WorkerObj->save();
        
        //$request->delete();

        DB::table('worker_requests')->where('id',$id)->delete();

        $Reqs = WorkerRequest::orderBy('created_at')->get();
        $data = view('fetchRequests',['requests'=>$Reqs])->render();
        return $data;
        }
    public function Reject_Request($id)
    {
        DB::table('worker_requests')->where('id',$id)->delete();
        $Reqs = WorkerRequest::orderBy('created_at')->get();
        $data = view('fetchRequests',['requests'=>$Reqs])->render();
        return $data;
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
    public function View_Reservations($read)  //What should be printed here ?!
    {
        $Forms = Form::orderdBy('created_at')->where('status',$read)->get();
        $FormsID = array();
        foreach($Forms as $F)
        {
            array_push($FormsID,$F['id']);

        }
        //return $F;

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
    public function View_Customers()
    {
        $Customers = User::orderdBy('id')->get();

        //Ready to be returned.
    }
    public function Add_Image($Info)
    {
        $Image = new Image;
        $Image->imagepath = $Info->path;
        $Image->worker_id = $Info->workerID;
        $Image->type = $Info->type;
        $Image->save();

        //What is next action.
    }


}
