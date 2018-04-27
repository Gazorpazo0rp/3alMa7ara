<?php

namespace App\Http\Controllers;
session_start();

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Customer;
use App\Apartments;
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
        if( $validateObj->fails()) { return view('RegisterPage')->with("Error! Your name must contain letters only")->with($request); }

        $validateObj=Validator::make($ToBeValidated, ['age' => 'required|integer|min:1|max:150']);
        if( $validateObj->fails()) { return view('RegisterPage')->with("Error! Invalid Age")->with($request); }

        $validateObj=Validator::make($ToBeValidated, ['password' => 'required|string|min:6|same:password_confirmation']);
        if( $validateObj->fails()) { return view('RegisterPage')->with("Error! Password is not identical")->with($request); }

        $validateObj=Validator::make($ToBeValidated, ['phone' => 'required|digits:11']);
        if( $validateObj->fails()) { return view('RegisterPage')->with("Error! Your phone number must be 11 digits.")->with($request); }

        $validateObj=Validator::make($ToBeValidated, ['email' => 'required|string|email|max:255|unique:users']);
        if( $validateObj->fails()) { return view('RegisterPage')->with("Error! This email is used. Please enter a new one.")->with($request); }


            
            
        //if( $validateObj->fails()) {return ("failure");}
        
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
        $_SESSION["loggedIn"] = 2; // logged in
           
        $_SESSION["ID"] = $user['id']; // for future use 
        return view('HomePage');   
    }

    public function EditPersonalInfo(Request $request)
    {
        $path = $request->photo();
        $ToBeValidated = array('name'=> $request->input('name'),
         'phone' => $request->input('phone') , 'email' => $request->input('email')
        );
                    //Validation section.
        $validateObj=Validator::make($ToBeValidated, ['name' => ['required', 'regex:/^[a-zA-Z]+[a-zA-Z]*[ ]{0,1}[a-zA-Z]*$/','min:3','max:255']]);
        if( $validateObj->fails()) { return view('CustomerProfile')->with("Error! Your name must contain letters only")->with($request); }

        $validateObj=Validator::make($ToBeValidated, ['phone' => 'required|digits:11']);
        if( $validateObj->fails()) { return view('CustomerProfile')->with("Error! Your phone number must be 11 digits.")->with($request); }
                    //---------
        
        
        $user = User::find($_SESSION['ID']);
        
        // check whether the entered email is unique or not
        $test = User::where('email' , $request->input('email'))->get();
        if($test->count() > 0 && $test[0]['id'] != $user->id)
        {
            return view('CustomerProfile')->with("Error! The email you entered is already exist.")->with($request);
        }
        
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email'); 
        $user->gender = 'male';
        
        $user->save();

        return view('HomePage');   
    }

    public function EditApartments(Request $request)
    {
        //Delete old Apartments 
        DB::table('apartments')->where('customer_id', $_SESSION["ID"])->delete();

        foreach($request->input('address') as $newApart)
        {
            $newApartment = new Apartments;

            $newApartment->customer_id = $_SESSION["ID"];
            $newApartment->Location = $newApart;
            $newApartment->save();
        }
        
        return view('HomePage');
    }

    public function View_Profile()
    {

        $Data = User::find($_SESSION["ID"]);
        if(Customer::find($_SESSION["ID"])){
            $Ap = Apartments::where('customer_id', $_SESSION["ID"])->get();
        return view('/CustomerProfile',['User_Data' => $Data,'Apartment_Data' => $Ap ]);
        }
        else if(Customer::find($_SESSION["ID"])){
            return view('/WorkerProfile',['User_Data' => $Data]);

        }

        
    }
    //Logic of the Login of the user
    public function Login()
    {
        // getting the user who owns the Email
       $_user = User::where('email',$_POST['Email'])->get(); 
       
       //check if user exists and whether the password is correct
       if($_user->count() > 0 && password_verify($_POST['password'], $_user[0]['password']))
       {
            $_SESSION["loggedIn"] = 2; // logged in
           // auth::user()->status = 1;
           
            $_SESSION["ID"] = $_user[0]['id'];
       }
       else
       {
            $_SESSION["loggedIn"] = 3;
       }
        return view('HomePage');
    }
    public function logout()
    {
        $_SESSION["loggedIn"] = 1; // Not logged in
        // auth::user()->status = 0;
        return view ('HomePage');
    }
    
}
