<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\RequestCounselling;
use App\Notifications\DenyNewRequest;
use Illuminate\Support\Facades\Session;
use App\Notifications\ConfirmNewRequest;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Notification;

class CounsellingRequestController extends Controller
{
    public function all(){
      $request=RequestCounselling::all();
      return view('admin.counsellingRequest.all',compact('request'));
    }


    public function status($id){
      $data=RequestCounselling::find($id);

      if($data->status==false){
        $data->status=true;
        $data->save();

        Notification::route('mail', $data->sEmail)->notify(new ConfirmNewRequest($data));

        Session::flash('success','Request approved Successfull');
        return redirect()->back();
      }else{
        $data->status=false;
        $data->save();

        Notification::route('mail', $data->sEmail)->notify(new DenyNewRequest($data));

        Session::flash('success','Request rejected');
        return redirect()->back();
      }
    }
}
