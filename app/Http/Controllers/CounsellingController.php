<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Routine;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\RequestCounselling;
use Illuminate\Support\Facades\Session;
use App\Notifications\NewCounsellingRequest;
use Illuminate\Support\Facades\Notification;

class CounsellingController extends Controller
{
  public function index()
  {
      $data=Teacher::orderBy('id','DESC')->get();
      return view('admin.counselling.all',compact('data'));
  }

  public function view($initial){
    $data=Routine::where('initial',$initial)->get();
    //$data=Routine::join('teachers','routines.initial','=','teachers.initial')->get();
    //return $data;
    return view('admin.counselling.view',compact('data'));
  }

  public function show($id){
    $data=Routine::where('id',$id)->get();
    return view('admin.counselling.add',compact('data'));
  }

  public function add(){
    return view('admin.counselling.add');
  }

  public function insert(Request $request){
    $insert=new RequestCounselling();
    $insert->tName=$request->tName;
    $insert->tEmail=$request->tEmail;
    $insert->sName=$request->sName;
    $insert->sEmail=$request->sEmail;
    $insert->day=$request->day;
    $insert->time=$request->time;
    $insert->save();


    // $teachers=Teacher::all();
    // foreach ($teachers as $teacher) {
    //   // if($insert->tEmai){
    //   //   $insert->notify(new NewCounsellingRequest($insert));
    //   // }
    //
    // }

    Notification::route('mail', $insert->tEmail)->notify(new NewCounsellingRequest($insert));

    Session::flash('success','User registration successfull');
    return back();

    Session::flash('error','User registration failed');
    return back();

  }
}
