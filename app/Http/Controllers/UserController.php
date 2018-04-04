<?php

namespace App\Http\Controllers;
session_start();

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Apartments;
class UserController extends Controller
{
    public function Register(Request $request)
    {
        $ToBeValidated = array('name'=> $request->input('first_name').' '.$request->input('last_name'),
         'age' => $request->input('age') , 'password' => $request->input('password') ,'password_confirmation'=>$request->input('confirm_password'),
         'phone' => $request->input('mobile') , 'email' => $request->input('email')  
        );

 
        $validateObj=Validator::make($ToBeValidated, [
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:1|max:150',
            'password' => 'required|string|min:6|same:password_confirmation',
            'phone' => 'required|string|min:11|max:11',
            'email' => 'required|string|email|max:255|unique:users'
        ]);
        if( $validateObj->fails()) {return ("failure");}
        
        $user = new User;
      
        $user->name = $request->input('first_name') .' '. $request->input('last_name');
        $user->age = $request->input('age');
        $user->password = Hash::make($request->input('password'));
        $user->phone = $request->input('mobile');
        $user->email = $request->input('email');
        $user->gender = 'Male';   // Needs to be changed later
        
        $user->save();
        $_SESSION["loggedIn"] = 2; // logged in
           
        $_SESSION["ID"] = $user['id'];
        return view('HomePage');   
    }

    public function Edit(Request $request)
    {
        $ToBeValidated = array('name'=> $request->input('name'),
         'phone' => $request->input('mobile') , 'email' => $request->input('email'),
         'male' => $request->input('male'),
         'female' => $request->input('female'),
         'other' => $request->input('other') 
        );
        
        $user = User::find($_SESSION['ID']);
        
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        
        if($request->input('male'))
          $user->gender = 'male';
        else if($request->input('female'))
          $user->gender = 'female';
        else 
          $user->gender = 'other';    
        
        $user->save();

        return view('HomePage');   
    }

    public function View_Profile()
    {
        $Data = User::find($_SESSION["ID"]);
        $Ap = Apartments::where('customer_id',$_SESSION["ID"])->get();
        return view('/CustomerProfile',['User_Data' => $Data,'Apartment_Data' => $Ap ]);
    }
    public function Login()
    {
       $_user = User::where('email',$_POST['Email'])->get();
       if($_user->count() > 0)
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
        session_unset(); 
        return view ('HomePage');
    }
    
}
