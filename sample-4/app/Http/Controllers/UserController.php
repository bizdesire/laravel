<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    #----------------------------------------------------------------------------------
    # this is using for api if user tries to access protected routes without login
    #----------------------------------------------------------------------------------
    
    public function login(Request $request){
        return response()->json(['message' => "authentication token is expired"], 401);
    } 

    #----------------------------------------------------------------------------------
    # panel theme setting
    #----------------------------------------------------------------------------------

    public function themeSetting(){
        if(\Auth::check()){
            $u = \App\Models\User::find(\Auth::user()->id);
            $u->theme_mode = $u->theme_mode == 'light' ? 'dark' : 'light';
            $u->save();
        }
        return response()->json(['status' => 1]);
    }  
     
}