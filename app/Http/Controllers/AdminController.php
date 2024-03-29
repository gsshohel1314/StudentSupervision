<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Models\RequestCounselling;

class AdminController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }

    public function index(){
      $totalUser=User::count();
      $totalStudent=User::where('role_id',3)->count();
      $totalTeacher=User::where('role_id',3)->count();
      $totalRequest=RequestCounselling::count();
      $totalAdminMessage=Message::where('role','admin')->count();

      return view('admin.dashboard.home',compact('totalUser','totalStudent','totalTeacher','totalRequest','totalAdminMessage'));
    }

}
