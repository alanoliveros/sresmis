<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SchoolSetting;

class AdminController extends Controller
{

    public function index(){
      return view('backend.admin.dashboard.dashboard');
    }
    public function school_settings(){


      $admin_id = auth()->user()->id;
      $school_settings = SchoolSetting::where('admin_id', '=', $admin_id)->first();


      return view('backend.admin.school_settings.school_settings')->with([
        'school_settings' => $school_settings,
      ]);
    }
    public function school_settings_update(Request $request){

      echo $request->admin_id;

    }
}
