<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Worker;
use App\WorkerRequest;
use App\Form;
use App\User;
use App\Selected_Service;
use App\Service;
use App\Price;
use App\Section_Image;
use App\Worker_Image;
use App\On_Going_Task;
use App\Admin;

use DB;

class AdminController extends Controller
{
    /*
    The function below is called when the admin accepts an applicant request.
    The request now will be deleted from the DB and the info will added as a new worker.
    */
    public function admin_auth(Request $request){
        $admin= Admin::where('email',$request->input('email'))->get();
        if($admin->count()>0&&password_verify($request->input('password'), $admin[0]['password']))
            return view('AdminDashboard');
        else {
            Session::put('Message','Error! Wrong auth please try again.');
            return redirect('/admin');
        }
    }
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
        $workers = Worker::orderBy('id')->get();
        $data = view('fetchViewWorkers',['workers'=>$workers])->render();
        return $data;
    }

    public function Edit_Staff($id){
        $worker= Worker::find($id);
        $data = view('fetchEditWorker',['worker'=>$worker])->render();
        return $data;

    }
    public function Submit_Edit_worker(Request $request){
        $worker= Worker::find($request->input('id'));
        $worker->name = $request->input('name');
        $worker->profession = $request->input('profession');
        $worker->phone = $request->input('phone');
        $worker->age = $request->input('age');
        $worker->bio = $request->input('bio');
        $worker->address = $request->input('address');
        $worker->status = $request->input('status');
        $worker->rate = $request->input('rate');
        $worker->save();
        foreach($request->input('img') as $img){
            //save img
            //
            //
            //
            //
            //
            //                           متنساااااااااااااااش
        }
        return redirect('/adminDashboard');

    }
    

    //Reservation Part.
    public function View_Reservations($read)  //What should be printed here ?!
    {
        $forms = Form::where('status',$read)->get();
        $res = array();
        $customerData=array();
        $selectedWorkers=array();
        $formsIds=array();
        $cnt=0;
        foreach($forms as $form)
        {
            //get the selected services options
            $selectedServices=Selected_Service::where('form_id',$form['id'])->get();
            $optionsArray=array();
            foreach($selectedServices as $serv){
                $op=Price::where('id',$serv['price_id'])->first();
                array_push($optionsArray,$op);

            }

           // array_push($FormsID,$F['id']);
            $res[$cnt]=$optionsArray;
            unset($optionsArray);
            // get the customer data
            $customerData[$cnt]=User::where('id',$form['customer_id'])->first();
            //get the selected workers
            $workers=array();
            $tasks=On_Going_Task::where([['customer_id',$form['customer_id']],['form_id',$form['id']],['state',0]])->get();
            foreach($tasks as $task){
                if($task->worker_id) {
                    $worker=Worker::find($task->worker_id);
                    
                    array_push($workers,$worker);
                }
            }
           // $workers=array_unique($workers, SORT_REGULAR);
            //return  $workers[0]['name'];
            $selectedWorkers[$cnt]=$workers;
            unset($workers);
            $formsIds[$cnt]=$form->id;
            $cnt++;
        }
        $variables=array();
        $variables['reservationServ']=$res;
        $variables['customer']=$customerData;
        $variables['workersData']=$selectedWorkers;
        $variables['formsIds']=$formsIds;

        $data = view('fetchPendingReservations',['data'=>$variables])->render();
        return $data; 
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
    public function view_clients()
    {
        $Customers = User::all();

        $data = view('fetchViewCustomers',['customers'=>$Customers])->render();
        return $data;    
    }
    public function block_client($id)
    {
        $client = User::find($id);
        $client->delete();

        $Customers = User::all();
        $data = view('fetchViewCustomers',['customers'=>$Customers])->render();
        return $data;    
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
    public function View_Reservation_info(){
        $Res=array();
        $services=Service::all();
        foreach($services as $serv){
            $options= Service_option_Price::where('service_id',$serv->id)->get();
            $prices=array();
            foreach($options as $op){
                $price=Price::find($op->price_id);
                $prices[]=$price;
            }
           
            $Res[$serv->descriptions]=$prices;
            unset( $prices );
            
        }
        $data= view('ReservationPage',['data'=>$Res])->render();
        return $data; // not tested
    }
    public function edit_pages(){

        $data= view('fetchEditPages')->render();
        return $data; 
    }
    public function  view_edit_section($id){
        $images=Section_Image::where('type',$id)->orderBy('created_at')->get();
        $data= view('fetchViewEditPage',['data'=>$images])->render();
        return $data;

    }
    public function delete_section_image($path,$id){
        Section_Image::where('imagepath',$path)->delete();
        $path='public/Section_images/'.$path;
        Storage::delete($path);
        $images=Section_Image::where('type',$id)->orderBy('created_at')->get();
        $data= view('fetchViewEditPage',['data'=>$images])->render();
        return $data;

    }
    public function add_section_images(Request $request){
        if($request->hasFile('images')) {

            foreach($request->file('images') as $image){
                $imageObj= new Section_Image;
                //validation l esm el path hna
                $destinationPath="public/Section_images";
                $filename = $image->getClientOriginalName();
                $image->storeAs('public/Section_images', $filename);

                
                $imageObj->imagepath=$filename;
                $imageObj->type=$request->input('section');
                $imageObj->save();
            } 
        
    }
    return redirect('/adminDashboard');

    /*
    foreach($request->file('images') as $image)
    {
        $destinationPath = 'content_images/';
        $filename = $image->getClientOriginalName();
        $image->move($destinationPath, $filename);

    }
    */
    }
    public function accept_reservation($cusomerID,$formId){
        $tasksToUpdate=On_Going_Task::where([['customer_id',$cusomerID],['form_id',$formId]])->update(['state'=>1]);
        Form::where('id',$formId)->update(['status'=>1]);
        return redirect('pendingReservations/0');
    }
    public function reject_reservation($cusomerID,$formId){
        On_Going_Task::where([['customer_id',$cusomerID],['form_id',$formId]])->update(['state'=>2]);
        $tasksToUpdate=On_Going_Task::where([['customer_id',$cusomerID],['form_id',$formId]])->get();
        Form::where('id',$formId)->update(['status'=>2]);
        foreach($tasksToUpdate as $task){
            Worker::where('id',$task->worker_id)->update(['status'=>"Available"]);

        }
        return redirect('pendingReservations/0');
    }
    public function view_tasks(){
        $tasks=On_Going_Task::where('state',1)->get();
        $customersData=array();
        $workersData=array();
        foreach($tasks as $task){
            $worker=Worker::find($task->worker_id);
            $customer=User::find($task->customer_id);
            array_push($customersData,$customer);
            array_push($workersData,$worker);
        }
        $variables=array();
        $variables['customers']=$customersData;
        $variables['workers']=$workersData;
        $variables['tasks']=$tasks;

        $data= view('fetchTasks',['data'=>$variables])->render();
        return $data;
    }
    public function update_task($id){
        $taskObj=On_Going_Task::where('task_id',$id)->first();

        On_Going_Task::where('task_id',$id)->update(['state'=>3]);

        // make the worker avsilable
        Worker::where('id',$taskObj->worker_id)->update(['status'=>'Available']);
        //get the first task without a worker id and assign the worker to it


        return redirect('/onGoingTasks');
    }

    
}
