<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\WorkerRequest;
use App\Worker;
use App\Worker_Image;
use App\Comment;
use App\User;

use DB;

class PagesController extends Controller
{
    public function Home()
    {
        return view('HomePage');
    }
   
    public function Worker_Profile($id)
    {
        $Worker = Worker::find($id);
        $Worker_Images = Worker_Image::where('worker_id',$id)->get();
        $comments=array();
        $commenters=array();
        $CommentsData = Comment::where('worker_id',$id)->get();
        foreach($CommentsData as $comment){
            $customer=User::where('id',$comment->customer_id)->first();
            array_push($commenters,$customer);
        }
        $comment['commentBody']=$CommentsData;
        $comment['CommentersData']=$commenters;
        return view('workerprofile')->with('Worker',$Worker)->with('Worker_Images',$Worker_Images)->with('Comments',$comment);
        
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

        $ToBeValidated = array('email'=> $request->input('email'), 'name' => $request->input('name'),
        'profession' => $request->input('profession'), 'phone'=>$request->input('phoneNumber'),
        'age' => $request->input('age') , 'bio'=>$request->input('bio'), 
         'address' => $request->input('address')
        );

        //the Email should be unique -> in workers and worker requests
        $validateObj=Validator::make($ToBeValidated, ['email' => 'required|string|email|max:255|unique:worker_requests|unique:workers']);
        if($validateObj -> fails())
        {
            Session::put('Message','Error! This Email is already used.');
            return redirect('/'); 
        }

        $validateObj=Validator::make($ToBeValidated, ['name' => ['required', 'regex:/^[a-zA-Z]+[a-zA-Z]*[ ]{0,1}[a-zA-Z]*$/','min:3','max:255']]);
        if($validateObj -> fails())
        {
            Session::put('Message','Error! Your name should contain only characters');
            return redirect('/'); 
        }

        $validateObj=Validator::make($ToBeValidated,  ['profession' => ['required', 'regex:/^[a-zA-Z]+$/','min:3','max:50']]);
        if($validateObj -> fails())
        {
            Session::put('Message','Error! Your Profession should contain only characters.');
            return redirect('/'); 
        }

        $validateObj=Validator::make($ToBeValidated, ['phone' => 'required|digits:11']);
        if( $validateObj->fails()) 
        { 
            Session::put('Message','Error! Your phone number must be 11 digits.');
            return redirect('/'); 
        }

        $validateObj=Validator::make($ToBeValidated, ['age' => 'required|integer|min:20|max:60']);
        if( $validateObj->fails()) 
        { 
            Session::put('Message','Error! a Proper age should be a number between 20 and 60');
            return redirect('/'); 
        }

    
        //Handle Uploaded File (CV)
        if($request->hasFile('cv'))
        {   
            //Get the name of the file
            $fileNameWithExt = $request->file('cv')->getClientOriginalName();
            // Get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just ext.
            $extension = $request->file('cv')->getClientOriginalExtension();
            //Check the extension of the file
            if($extension != 'txt' && $extension != 'doc' && $extension != 'pdf')
            {
                Session::put('Message','Error! Invalid Extension for CV file, it should be txt,doc or pdf');
                return redirect('/'); 
            }
            $Req = new WorkerRequest; 

            // FileName To store
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            // Upload File
            $path = $request->file('cv')->storeAs('public/ApplicantCV', $fileNameToStore);

            $Req->CvFile = $path;
        }
        else
        {
            Session::put('Message','Error! You should attach your CV file in txt, docs or pdf');
            return redirect('/');  
        }

        $Req->email = $request->input('email');
        $Req->name = $request->input('name');
        $Req->profession = $request->input('profession');
        $Req->phone = $request->input('phoneNumber');
        $Req->age = $request->input('age');
        $Req->bio = $request->input('bio');
        $Req->address = $request->input('address');

        $Req->save();
        Session::put('Message','Your request has been sent Successfully.');
        return redirect('/');
    }
    public function Refurbishment()   //names of variables.
    {
        $Address = "Refurbishment";
        $Paragraph = "This is Refurbishment page !";
        $Images = DB::select('select imagepath from section_images where type = "Refurbishment"');
        return view('SectionPage')->with('Images',$Images)->with('Paragraph',$Paragraph)->with('Address',$Address);
    }
    public function Decor_and_art()   //names of variables.
    {
        $Address = "Decor And Art";
        $Paragraph = "This is Decor_and_art page !";
        $Images = DB::select('select imagepath from section_images where type = "Decor & art"');
        return view('SectionPage')->with('Images',$Images)->with('Paragraph',$Paragraph)->with('Address',$Address);
    }
    public function Firefighting_and_air_conditioning()   //names of variables.
    {
        $Address = "Firefighting | Air Conditioning";
        $Paragraph = "This is Firefighting_and_air_conditioning page !";
        $Images = DB::select('select imagepath from section_images where type = "Firefighting | Air conditioning"');
        return view('SectionPage')->with('Images',$Images)->with('Paragraph',$Paragraph)->with('Address',$Address);
    }
    public function Designs()   //names of variables.
    {
        $Address = "Designs";
        $Images = DB::select('select imagepath from section_images where type = "Design"');
        $Paragraph = "This is Designs page !";
        return view('SectionPage')->with('Images',$Images)->with('Paragraph',$Paragraph)->with('Address',$Address);
    }
    public function admin_auth(){
        return view('adminAuth');
    }
}
