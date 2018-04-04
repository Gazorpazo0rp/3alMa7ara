<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

        return redirect('/');   
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
       session_start();
       if($_user->count() > 0)
       {
            $_SESSION["status"] = 1;
            $_SESSION["ID"] = $_user[0]['id'];
       }
       else
       {
            $_SESSION["status"] = 2;
       }
       return redirect('/');
    }
    
}
