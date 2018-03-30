<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function Register()
    {
        $UserData  = array
        (
        name => $_POST['name'], 
        email => $_POST['E_mail'], 
        password => $_POST['pw'], 
        mobile_number => $_POST['mob_num'],
        );
        'RegisterController@Validator($UserData)';
        'RegisterController@Create($UserData)';
        return redirect('/');
    }
}
