<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DataTables;
class UserController extends Controller
{
    private $folderName = 'types/icon/';
    //----------------------------------------------
    public function index(){ 
        return view('backend.modules.users.index');
    }
 
    public function ajax(Request $request){
        $data = User::where('role','user'); 
        return DataTables::eloquent($data)
                 
                ->addColumn('action',function($t){
                    return '--';
                })
                ->make(true);
    }
 

    
}
