<?php

namespace App\Http\Controllers;

use Session;
use Carbon\Carbon;
use App\Models\Routine;
use App\Models\Teacher;
use App\RequestCounselling;
use Illuminate\Http\Request;

class CounsellingRoutineController extends Controller
{
  public function index()
  {
      $data=Teacher::orderBy('id','DESC')->get();
      return view('admin.counsellingRoutine.all',compact('data'));
  }

  public function view($initial){
    $data=Routine::where('initial',$initial)->get();
    return view('admin.counsellingRoutine.view',compact('data'));
  }

}
