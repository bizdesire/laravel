<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product; 
use DataTables;
class ProductController extends Controller
{
    private $folderName = 'prod/icon/';
    private $path = 'backend.modules.products.';
    //----------------------------------------------
    // Product Listing Page
    //----------------------------------------------
    public function index(){ 
        return view($this->path.'index');
    }

     //----------------------------------------------
     public function create(){  
        return view($this->path."create"); 
    }

    public function store(Request $request){

        $check = Product::where('name',$request->name)->count();

        if($check > 0){
            $status = ['message'=> 'Product already exists!','status' => 0];
        }else{
            $p = new Product();
            $p->name = $request->name; 
            $p->price = $request->price;
            $p->description = $request->description;
           
            if ($request->hasFile('image')) {
                 $file = $request->file('image');
                 $img_path = uploadFileWithAjax23($this->folderName,$file);
                 $p->image =$img_path; 
            }
            $p->save(); 
    
           $status = ['message'=> 'Saved successfully','status' => 1,'url' =>route('admin.product.index')];
        }

        return response()->json($status);
    }

    public function ajax(Request $request){
        $data = Product::orderBy('name','ASC'); 
        return DataTables::eloquent($data)
                ->addColumn('img_url',function($t){
                    return url($t->image);
                }) 
                ->addColumn('action',function($t){
                    return '<a href="'.route('admin.product.edit',$t->id).'" class="main-button m-b-rounded" title="click to edit pool">
                    <span class="material-icons">edit</span>
                  </a>';
                })
                ->make(true);
    }

    //----------------------------------------------
    public function edit($id){ 
        $data = Product::findOrFail($id); 
        return view('backend.modules.products.edit', compact('data') );
    }

    public function update(Request $request,$id){
        $check = Product::where('name',$request->name)->where('id','!=',$id)->count();

        if($check > 0){
            $status = ['message'=> 'Product already exists!','status' => 0];
        }else{
            $p = Product::findOrfail($id);
            $p->name = $request->name; 
            $p->price = $request->price;
            $p->description = $request->description;
           
            if ($request->hasFile('image')) {
                 $file = $request->file('image');
                 $img_path = uploadFileWithAjax23($this->folderName,$file);
                 $p->image =$img_path; 
            }
            $p->save(); 
    
           $status = ['message'=> 'Saved successfully','status' => 1,'url' =>route('admin.product.index')];
        }

        return response()->json($status);
    }
}
