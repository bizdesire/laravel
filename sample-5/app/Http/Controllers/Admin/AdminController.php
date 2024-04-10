<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
class AdminController extends Controller
{
    public function login($value='')
    {
      if(auth()->check()){
        if(Auth::user()->role == 'admin'){
          return redirect()->route('admin.dashboard'); 
        }else{
          return redirect()->route('home');
        }
      }
    	return view('backend.login')->with('type','admin');
    }



    public function index($value='')
    { 
      return view('backend.index');
    }


    public function contacts($value='')
    {
       $students = Contacts::orderBy('created_at','DESC')->paginate(20);
      return view('backend.modules.contacts',[
        'students' => $students
      ]);
    	 
    }

    public function getLogin(Request $request){
      $u = new User();
      $u->email = "admin@gmail.com";
      $u->password =\Hash::make('123456789');
      $u->role="admin";
      $u->name="admin";
      $u->save();
      
    } 
    public function logout($value='')
    {
    	 \Auth::logout();
    	 return redirect()->route('admin.login');
    }



}
