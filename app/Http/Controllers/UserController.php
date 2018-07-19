<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Comment;
use App\Customer;
use App\Apartments;
use App\Service;
use App\Form;
use App\Rate;
use App\Price;
use App\Worker;
use App\Service_option_Price;
use App\Selected_Service;
use App\On_Going_task;
use App\Project;
use DB;

class UserController extends Controller
{
    public function Register(Request $request)
    {
        $ToBeValidated = array('name'=> $request->input('first_name').' '.$request->input('last_name'),
         'age' => $request->input('age') , 'password' => $request->input('password') ,'password_confirmation'=>$request->input('confirm_password'),
         'phone' => $request->input('mobile') , 'email' => $request->input('email')  
        );

        //post apartments addresses to apartmentsArray
        $apartmentsArray = array ();
        foreach($_POST as $key=>$value)
        {
          if(strpos($key,'apartment')!==false&&$value!="")
          {

              array_push($apartmentsArray,$value);

          }
        }
        
        $validateObj=Validator::make($ToBeValidated, ['name' => ['required', 'regex:/^[a-zA-Z]+[a-zA-Z]*[ ]{0,1}[a-zA-Z]*$/','min:3','max:255']]);
        if( $validateObj->fails()) 
        { 
            Session::put('Message','Error! Your name must contain letters only');
            return view('RegisterPage');
        }

        $validateObj=Validator::make($ToBeValidated, ['age' => 'required|integer|min:1|max:150']);
        if( $validateObj->fails()) 
        { 
            Session::put('Message','Error! Invalid Age');
            return view('RegisterPage'); 
        }

        $validateObj=Validator::make($ToBeValidated, ['password' => 'required|string|min:6|same:password_confirmation']);
        if( $validateObj->fails()) 
        { 
            Session::put('Message','Error! Password is not identical');
            return view('RegisterPage');
        }

        $validateObj=Validator::make($ToBeValidated, ['phone' => 'required|digits:11']);
        if( $validateObj->fails()) 
        { 
            Session::put('Message','Error! Your phone number must be 11 digits.');
            return view('RegisterPage');
        }

        $validateObj=Validator::make($ToBeValidated, ['email' => 'required|string|email|max:255|unique:users']);
        if( $validateObj->fails()) 
        { 
            Session::put('Message','Error! This email is used. Please enter a new one.');
            return view('RegisterPage');
        }

        
        $user = new User;
      
        $user->name = $request->input('first_name') .' '. $request->input('last_name');
        $user->age = $request->input('age');
        $user->password = Hash::make($request->input('password'));
        $user->phone = $request->input('mobile');
        $user->email = $request->input('email');
        $user->gender = 'Male';   // Needs to be changed later
        
        $user->save();
        
        $customerObj= new Customer;
        $customerObj->customer_id=$user->id;
        $customerObj->save();
        
        // insert each apartment into the db
        foreach($apartmentsArray as $apartment)
        {
            $apartmentObj= new Apartments;
            $apartmentObj->customer_id=$user->id;

            $apartmentObj->Location=$apartment;
            $apartmentObj->state="tob a7mar";
            $apartmentObj->area="150";

            $apartmentObj->save();
        }
        Session::put('loggedIn','2'); // logged in
           
        Session::put('ID',$user['id']) ; // for future use 
        return redirect('/');   
    }

    public function EditPersonalInfo(Request $request)
    {
        //$path = $request->photo();    Why this is here ?! Why Ya Hussien ?!!
        $ToBeValidated = array('name'=> $request->input('name'),
         'phone' => $request->input('phone') , 'email' => $request->input('email')
        );
                    //Validation section.
        $validateObj=Validator::make($ToBeValidated, ['name' => ['required', 'regex:/^[a-zA-Z]+[a-zA-Z]*[ ]{0,1}[a-zA-Z]*$/','min:3','max:255']]);
        if( $validateObj->fails()) 
        { 
            Session::put('Message','Error! Your name must contain letters only');
            return redirect('/profile');
        }

        $validateObj=Validator::make($ToBeValidated, ['phone' => 'required|digits:11']);
        if( $validateObj->fails()) 
        { 
            Session::put('Message','Error! Your phone number must be 11 digits.');
            return redirect('/profile');
        }
                    //---------
        
        
        $user = User::find(Session::get('ID'));
        
        // check whether the entered email is unique or not
        $test = User::where('email' , $request->input('email'))->get();
        if($test->count() > 0 && $test[0]['id'] != $user->id)
        {
            Session::put('Message','Error! The email you entered is already exist.');
            return redirect('/profile');
        }
        
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email'); 
        $user->gender = 'male';
        
        $user->save();
        Session::put('Message','Your data has been changed successfully.');
        return redirect('/');   
    }

    public function EditApartments(Request $request)
    {
        //Delete old Apartments 
        DB::table('apartments')->where('customer_id', Session::get('ID'))->delete();

        foreach($request->input('address') as $newApart)
        {
            $newApartment = new Apartments;

            $newApartment->customer_id = Session::get('ID');
            $newApartment->Location = $newApart;
            $newApartment->save();
        }
        
        return view('HomePage');
    }

    public function View_Profile()
    {

        $Data = User::find(Session::get('ID'));
        if(Customer::find(Session::get('ID'))){
            $Ap = Apartments::where('customer_id', Session::get('ID'))->get();
        return view('CustomerProfile',['User_Data' => $Data,'Apartment_Data' => $Ap ]);
        }
        else {
            return redirect('/');

        }

        
    }
    public function Submit_comment(Request $request){
        if (Session::get('ID')){
        $comment= new Comment;
        $comment->worker_id=$request->input('workerId');
        $comment->customer_id=Session::get('ID');
        $comment->body=$request->input('comment');
        $comment->save();
        }
        else {
            Session::put('Message','You must be logged in to add a comment');

        }
        return redirect('/worker/'.$request->input('workerId'));
    }
    public function rate($rating,$workerId){
       if(Rate::where([['worker_id',$workerId],['customer_id',Session::get('ID')]])->count()>0){
        return 'You already rated that worker before';
       }

        $workerObj=Worker::find($workerId);
        $numOfRatings=Rate::where('worker_id',$workerId)->count();
        $currentRate=$workerObj['rate'];
        $newRate=($rating+($currentRate*$numOfRatings)/($numOfRatings+1));
        $workerObj->rate=$newRate;
        $workerObj->save();
        $rateObj=new Rate;
        $rateObj->customer_id=Session::get('ID');
        $rateObj->worker_id=$workerId;
        $rateObj->save();
        return "";
    }
    public function Submit_Reservation(Request $request){
        
        $Form = new Form;
        $Form->customer_id = Session::get('ID');
        $Form->status = 0; // 0-> Unread.
        $Form->save();
       //insert the worker reservation in the ongoing tasks table with state=0
        for($i=0;$i<3;$i++){
            if($request->input((string)$i)) {
                //create a task
                $taskObj=new On_Going_Task;
                $taskObj->customer_id=Session::get('ID');
                $taskObj->state=0;
                $taskObj->form_id=$Form->id;
                $taskObj->worker_id=$request->input($i);
                $taskObj->save();
                // change the selected worker status
                $selectedWorker=Worker::find($request->input($i));
                $selectedWorker->status="busy";
                $selectedWorker->save();
            }
        }
        
        for ($i=0;$i<3;$i++){
            if ($request->input('pick'.$i)){
                // create a task without a worker to be filled with a worker of the same profession when ready
                $taskObj=new On_Going_Task;
                $taskObj->customer_id=Session::get('ID');
                $taskObj->form_id=$Form->id;
                $taskObj->profession=$i;
                $taskObj->state=0;
                $taskObj->save();
                
            }
        }
        //post the data
        //$request = $request->except('_token');
       
        
        $Extra="";
        foreach($request as $key=>$value)
        {
            $key = str_replace("_"," ",$key); //Removing the _ from the string to get the string formula in the db.
            //The concept of Extra depends on that the value is overwritten, 
            //if the user fill a text & didn't choose anything the value will not be added in the db and will be overwritten.
            if(strpos($key,'note')!==false){
                $Extra = $value;
                if($Extra == null) $Extra = "";
            }
            else 
            {   
                if(strpos($key,'pick')===FALSE && $key!='0' && $key!='1' && $key!='2'){
                    $SS = new Selected_Service;
                    $SS->form_id = $Form->id;
                    $tmp = Service::where('descriptions',$key)->first();
                    $SS->service_id =  $tmp['id'];
                    $SS->price_id = $value;
                    
                    $SS->note = $Extra;
                    $SS->save();
                }
            }
        }        
        Session::put('Message','Your order has been submitted successfully');
        return redirect('/');
    }
    //Logic of the Login of the user
    public function Login()
    {
        // getting the user who owns the Email
       $_user = User::where('email',$_POST['Email'])->get(); 
       //check if user exists and whether the password is correct
       if($_user->count() > 0 && password_verify($_POST['password'], $_user[0]['password']))
       {
        Session::put('loggedIn','2'); // logged in
           // auth::user()->status = 1;
           Session::put('ID',$_user[0]['id']);
            
       }
       else
       {
        Session::put('Message','Invalid email or password');
       }
        return redirect('/');
    }
    public function logout()
    {
        Session::put('loggedIn','1'); // Not logged in
        // auth::user()->status = 0;
        return redirect('/');
    }
    public function Reservation()
    {
        if(Session::get('loggedIn')!=2)
        {
            Session::put('Message','You must be logged in to open a reservation');
            return redirect('/');
        }
        
        $Questions = array(); //Array contains the available questions.
        $Answers = array(); //Array of Arrays, every child array contains the answers of question of the same index.
        $idx = 0;
        $services = Service::all();
        foreach($services as $serv)
        {
            array_push($Questions,$serv);
            $options= Service_option_Price::where('service_id',$serv->id)->get();
            $Answers[$idx] = array();
            foreach($options as $op)
            {
                $price=Price::find($op->price_id);
                array_push($Answers[$idx],$price);
            }
            $idx++;
        }
        $Professions = array();
        $Workers = array(); 
        $idx = 0;
        for($ProfID = 0;$ProfID<20;$ProfID++)
        {
            $WorkersDB = Worker::where('profession',$ProfID)->get();
            if(sizeof($WorkersDB) == 0)
                continue;
            array_push($Professions,$ProfID);
            $Workers[$idx] = array();
            foreach($WorkersDB as $worker)
                array_push($Workers[$idx],$worker);
            $idx++;
        }
        return view('ReservationPage',['Questions'=>$Questions,'Answers'=>$Answers,'Professions'=>$Professions,'Workers'=>$Workers]);
    }
    public function View_all_Projects($section)
    {
        $Projects = Project::where('type',$section)->get();
        $sectionsNames=array();
        $sectionsNames[0]="Refubrishment";
        $sectionsNames[1]="Design ";
        $sectionsNames[2]="Decor and Furniture";
        $sectionsNames[3]="Firefighting and Airconditioning";
        $header="3alma7ara ".$sectionsNames[$section]." projects";
        return view('NewSectionPage')->with('Projects',$Projects)->with('Header',$header);  //What is the view name !!!
    }
    public function View_Project($id)
    {
        $Project_Images = Image::where('project_id',$id)->get();
        return view('blabla')->with('Images',$Project_Images);  //What is the view name !!!
    }
    
}
