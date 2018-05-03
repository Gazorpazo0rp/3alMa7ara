<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function Home()
    {
        return view('HomePage');
    }
    public function Reservation(){
        return view('ReservationPage');
    }
    public function Profile()
    {
        return ('Your Profile');
    }
    public function Register()
    {        
        return view('RegisterPage');
    }
    public function Simulator()
    {        
        return view('SimulatorPage');
    }
    public function Admin()
    {        
        return view('AdminDashboard');
    }
    public function ajaxTest()
    {   

        return ('AdminDashboard');
    }
}
