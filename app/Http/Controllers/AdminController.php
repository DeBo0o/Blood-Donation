<?php

namespace App\Http\Controllers;

use App\Models\appointment;
use Illuminate\Http\Request;
use App\Models\BloodBank;
use Notification;
use App\Notifications\sendemailnotifications;

class AdminController extends Controller
{
    public function addview()
    {
        return view('admin.addBank');
    }

    public function upload(Request $request)
    {
        $bloodbank = new bloodbank;

        $image = $request->file;

        $imagename = time() . '.' . $image->getClientoriginalExtension();

        $request->file->move('BankImage', $imagename);

        $bloodbank->image = $imagename;
        $bloodbank->name = $request->name;
        $bloodbank->phoneNo = $request->number;
        $bloodbank->address = $request->address;
        $bloodbank->type = $request->type;
        $bloodbank->save();
        return redirect()->back()->with('message', 'Bank Added Successfully');

    }

    public function showappointment()
    {
        $data = appointment::all();
        return view('admin.showappointment', compact('data'));
    }

    public function approved($id)
    {
        $data = appointment::find($id);
        $data->status = 'Approved';
        $data->save();
        return redirect()->back();
    }

    public function canceled($id)
    {
        $data = appointment::find($id);
        $data->status = 'Canceled';
        $data->save();
        return redirect()->back();
    }

    public function showbloodbank()
    {
        $data = bloodbank::all();
        return view('admin.showbloodbank', compact('data'));
    }

    public function deletebloodbank($id)
    {
        $data = bloodbank::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Bank Deleted Successfully');
    }

    public function updatebloodbank($id)
    {
        $data = bloodbank::find($id);
        return view('admin.update_bloodbank', compact('data'));
    }

    public function editbloodbank(Request $request, $id)
    {
        $bloodbank = bloodbank::find($id);
        $bloodbank->name = $request->name;
        $bloodbank->phoneNo = $request->phoneNo;
        $bloodbank->address = $request->address;
        $bloodbank->type = $request->type;
        $image = $request->file;
        if($image)
        {
        $imagename = time().'.'.$image->getClientOriginalExtension();
         $image->move('BankImage', $imagename);
            $bloodbank->image = $imagename;
        }
        $bloodbank->save();
        return redirect()->back()->with('message','BloodBank Updated Successfully');
    }
    public function emailview($id)
    {
        $data=appointment::find($id);
     
        return view('admin.email_view',compact('data'));
    }

public function sendemail(Request $request ,$id)
{
    $data=appointment::find($id);
    $details=[
        'greeting' => $request->greeting,
        'body'=> $request->body,
        'actiontext'=> $request->actiontext,
        'actionurl'=> $request->actionurl,
        'endpart'=> $request->endpart


    ];
    Notification::send($data,new sendemailnotifications($details));
    return redirect()->back();
}

}


