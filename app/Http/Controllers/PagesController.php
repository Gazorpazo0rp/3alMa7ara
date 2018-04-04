<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function Home()
    {
        return view('HomePage');
    }
    public function Profile()
    {
        return ('Your Profile');
    }
    public function Register()
    {        
        return view('RegisterPage');
    }
}
