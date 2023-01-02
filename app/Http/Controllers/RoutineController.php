<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Routine;

use App\Models\Teacher;
use Illuminate\Http\Request;

use App\Models\CounsellingDay;
use App\Models\CounsellingTime;
use Illuminate\Support\Facades\Session;

class RoutineController extends Controller
{

    public function index()
    {
        $allRoutine=Routine::orderBy('id','DESC')->get();
        return view('admin.routine.all',compact('allRoutine'));
    }


    public function create()
    {
        $day=CounsellingDay::orderBy('id','DESC')->get();
        $time=CounsellingTime::orderBy('id','DESC')->get();
        $teachers=Teacher::orderBy('id','DESC')->get();
        //return $day;
        //return $time;
        return view('admin.routine.add',compact('day','time','teachers'));
    }


    public function store(Request $request)
    {
        $routine=new Routine();
        $routine->name=$request->name;
        $routine->email=$request->email;
        $routine->initial=$request->initial;
        $routine->day=$request->day;
        $routine->time=$request->time;
        $insert=$routine->save();

        // Session::flash('success','User registration successfull');
        // return back();
        //
        // Session::flash('error','User registration failed');
        // return back();

        if($insert){
          Session::flash('success','User registration successfull');
          return back();
        }else{
          Session::flash('error','User registration failed');
          return back();
        }
    }


    public function show(Routine $routine)
    {
      // return $routine;
        return view('admin.routine.view',compact('routine'));
    }


    public function edit(Routine $routine)
    {
        //
    }


    public function update(Request $request, Routine $routine)
    {
        //
    }


    public function destroy(Routine $routine)
    {
      $delete = $routine->delete();

      if($delete){
        Session::flash('success','Routine Delete successfull');
        return back();
      }else{
        Session::flash('error','Routine Delete failed');
        return back();
      }
    }
}
