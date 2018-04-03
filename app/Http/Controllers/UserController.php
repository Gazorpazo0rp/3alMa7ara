<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
class UserController extends Controller
{
    public function Register()
    {
        $UserData  = array
        (
        name => $_POST['name'], 
        email => $_POST['E_mail'], 
        password => $_POST['pw'], 
        );
        Validator($UserData);
        Create($UserData);
        return redirect('/');
    }
    public function View_Profile($id)
    {
        $Data1 = User::find($id);
        return view('/CustomerProfile')->with('Data',$Data);
    }
    public function Login()
    {
       $_user = User::where('email',$_POST['Email']);
       session_start();
       if($_user->count() > 0)
       {
            $_SESSION["status"] = 1;
       }
       else
       {
            $_SESSION["status"] = 2;
       }
       return redirect('/');
    }
    
}
