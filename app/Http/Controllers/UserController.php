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
use App\Image;
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

        $workerObj = Worker::find($workerId);
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
        $Prof = [0=>"نجارة",1=>"نقاشة",2=>"محارة",3=>"جبس",4=>"جبس بلدى",5=>"بلاط",6=>"سباكة",7=>"كهربا",8=>"لاند سكيب",9=>"مهندسين",10=>"اخشاب"];
        $Choosen_Workers = ""; $total_cost=0;
        $Choosen_Services = "";

        for($i=0;$i<20;$i++)  //Iterate for the choosen profesiions.
        {
            if($request->input((string)$i)) {
                $Name = $request->input((string)$i);
                $Name = str_replace("_"," ",$Name);
                $Choosen_Workers = $Choosen_Workers.'['.$Prof[$i].' : '.$Name.'] ';
            }
        }
        foreach($_POST as $key=>$value)
        {
            $key = str_replace("_"," ",$key);
            
            if(($key >= '0' && $key <= '20') || $key ==' token') continue;
                
                
                $Ans = Price::where('id',$value)->first();
                $Choosen_Services = $Choosen_Services.$key.'['.$Ans->name.'-'.(string)$Ans->price.'] ';
                $total_cost+=$Ans->price;
                            
        }
        $Form->workers = $Choosen_Workers;
        $Form->services = $Choosen_Services;
        $Form->totalcost = $total_cost;
        $Form->save();
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
        $ngara = array(); //Array contains the available questions.
        $ngaraOp = array(); //Array of Arrays, every child array contains the answers of question of the same index.
        $idx = 0;
        $services = Service::where('type','0')->get();
        foreach($services as $serv)
        {
            array_push($ngara,$serv);
            $options= Service_option_Price::where('service_id',$serv->id)->get();
            $ngaraOp[$idx] = array();
            foreach($options as $op)
            {
                $price=Price::find($op->price_id);
                array_push($ngaraOp[$idx],$price);
            }
            $idx++;
        }
        $mahara = array(); //Array contains the available questions.
        $maharaOp = array(); //Array of Arrays, every child array contains the answers of question of the same index.
        $idx = 0;
        $services = Service::where('type','1')->get();
        foreach($services as $serv)
        {
            array_push($mahara,$serv);
            $options= Service_option_Price::where('service_id',$serv->id)->get();
            $maharaOp[$idx] = array();
            foreach($options as $op)
            {
                $price=Price::find($op->price_id);
                array_push($maharaOp[$idx],$price);
            }
            $idx++;
        }
        $nekasha = array(); //Array contains the available questions.
        $nekashaOp = array(); //Array of Arrays, every child array contains the answers of question of the same index.
        $idx = 0;
        $services = Service::where('type','2')->get();
        foreach($services as $serv)
        {
            array_push($nekasha,$serv);
            $options= Service_option_Price::where('service_id',$serv->id)->get();
            $nekashaOp[$idx] = array();
            foreach($options as $op)
            {
                $price=Price::find($op->price_id);
                array_push($nekashaOp[$idx],$price);
            }
            $idx++;
        }
        $kahraba = array(); //Array contains the available questions.
        $kahrabaOp = array(); //Array of Arrays, every child array contains the answers of question of the same index.
        $idx = 0;
        $services = Service::where('type','3')->get();
        foreach($services as $serv)
        {
            array_push($kahraba,$serv);
            $options= Service_option_Price::where('service_id',$serv->id)->get();
            $kahrabaOp[$idx] = array();
            foreach($options as $op)
            {
                $price=Price::find($op->price_id);
                array_push($kahrabaOp[$idx],$price);
            }
            $idx++;
        }
        $sebaka = array(); //Array contains the available questions.
        $sebakaOp = array(); //Array of Arrays, every child array contains the answers of question of the same index.
        $idx = 0;
        $services = Service::where('type','4')->get();
        foreach($services as $serv)
        {
            array_push($sebaka,$serv);
            $options= Service_option_Price::where('service_id',$serv->id)->get();
            $sebakaOp[$idx] = array();
            foreach($options as $op)
            {
                $price=Price::find($op->price_id);
                array_push($sebakaOp[$idx],$price);
            }
            $idx++;
        }




        //workers
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
        return view('ReservationPage',['ngara'=>$ngara,'ngaraOp'=>$ngaraOp,'mahara'=>$mahara,'maharaOp'=>$maharaOp,'nekasha'=>$nekasha,'nekashaOp'=>$nekashaOp,'kahraba'=>$kahraba,'kahrabaOp'=>$kahrabaOp,'sebaka'=>$sebaka,'sebakaOp'=>$sebakaOp,'Professions'=>$Professions,'Workers'=>$Workers]);
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
        $Project_Data= Project::where('id',$id)->get();
        return view('projectDetails')->with('Images',$Project_Images)->with('Data',$Project_Data[0]); 
    }
    
}
