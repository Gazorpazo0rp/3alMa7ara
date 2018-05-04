<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\WorkerRequest;

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

    public function Submit_Request(Request $request) //Adding a request for the applicant in the database.
    {     
        //$user = WorkerRequest::find(1);

        //$data = response()->make($user->filepath, 200, array(
          //  'Content-Type' => (new finfo(FILEINFO_MIME))->buffer($user->filepath)));
        // Return the image in the response with the correct MIME type
        //return View('HomePage')->with('data',$data);

        $Req = new WorkerRequest;  
      
        $Req->email = $request->input('email');
        $Req->name = $request->input('name');
        $Req->profession = $request->input('profession');
        $Req->phone = $request->input('phoneNumber');
        $Req->age = $request->input('age');
        $Req->bio = $request->input('bio');
        $Req->address = $request->input('address');
         
        //See if the form has a file
        if($request->hasFile('cv'))
        {   
            //get the name of the file
            $filename = $request->cv->getClientOriginalName();

            $file = $request->file('cv');
            $contents = $file->openFile()->fread($file->getSize());

            //save the file with its original name >>>> Concatenate email with filename to avoid replacing files
            $Req->filepath = $contents;
        }
       
        $Req->save();
        Session::put('Message','Your request has been sent Successfully.');
        return redirect('/');
    }
}
