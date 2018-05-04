<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Customer;
use App\Apartments;
use App\Service;
use App\Form;
use App\Price;
use App\Service_option_Price;
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
            return view('CustomerProfile');
        }

        $validateObj=Validator::make($ToBeValidated, ['phone' => 'required|digits:11']);
        if( $validateObj->fails()) 
        { 
            Session::put('Message','Error! Your phone number must be 11 digits.');
            return view('CustomerProfile');
        }
                    //---------
        
        
        $user = User::find(Session::get('ID'));
        
        // check whether the entered email is unique or not
        $test = User::where('email' , $request->input('email'))->get();
        if($test->count() > 0 && $test[0]['id'] != $user->id)
        {
            Session::put('Message','Error! The email you entered is already exist.');
            return view('CustomerProfile');
        }
        
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email'); 
        $user->gender = 'male';
        
        $user->save();

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
        return view('/CustomerProfile',['User_Data' => $Data,'Apartment_Data' => $Ap ]);
        }
        else if(Customer::find(Session::get('ID'))){
            return view('/WorkerProfile',['User_Data' => $Data]);

        }

        
    }
    public function Reservation(){
        $data=array();
        $services=Service::all();
        foreach($services as $serv){
            $options= Service_option_Price::where('service_id',$serv->id)->get();
            $prices=array();
            foreach($options as $op){
                $price=Price::find($op->price_id);
                $prices[]=$price;
            }
           
            $data[$serv->descriptions]=$prices;
            unset( $prices );

        }
        return $data;
        return view('ReservationPage',['data'=>$data]);
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
    
}
