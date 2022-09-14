<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BloodBank;
use App\Models\appointment;
class HomeController extends Controller
{
    public function redirect()
    {
        if (Auth::id())
        {
            if(Auth::user()->usertype=='0')
            {
                $blood = BloodBank::all();
                return view ('user.home',compact('blood'));
            }
            else
            {
                return view ('admin.home');
            }

        }
        else
        {
            return redirect()->back();
        } }
public function index()
    {
        $blood = BloodBank::all();
        return view('user.home',compact('blood'));
    }


public function appointment(Request $request ){
    $data=new appointment;
    $data->name=$request->name; 
    $data->email=$request->email; 
    $data->date=$request->date; 
    $data->phone=$request->number; 
    $data->message=$request->message; 
    $data->type=$request->type; 
    $data->status='In progress';
    if(auth::id())
    {
        $data->user_id=auth::user()->id;
    }
    $data->save();
     return redirect()->back()->with('message','Thank You , We Will contact you soon');
    


}
public function myappointment( )
{
    if(auth::id()){
        $userid=auth::user()->id;
        $appoint=appointment::where('user_id',$userid)->get();

        return view('user.my_appointment',compact('appoint'));
    }
    else{
        return redirect()->back();
    }

}
public function cancel_appoint($id )
{
    $data=appointment::find($id);
    $data->delete();

  return redirect()->back();
}
}