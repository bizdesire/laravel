<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Cart;
class HomeController extends Controller
{
    
    public function index(){
        //Cart::add('293ad', 'Product 1', 1, 9.99);
        // return Cart::content();
        $products = Product::orderBy('name','DESC')->paginate(20); 
        return view('home.index',compact("products")); 
    }

    public function cart()
    { 
    	return view('home.carts.index');
    }

   
 

    public function cartItems()
    {
        // Cart::destroy();
        // return Cart::content();
    	$vv = view('home.carts.items')->render();
        return response()->json([
            'data' => $vv,
            'counts' => Cart::count()
        ]);
    }

    
    public function cartUpdate($rowId,$type)
    {
        $cart = Cart::get($rowId);
       switch ($type) {
        case 'minus':
            if($cart->qty > 1){
                Cart::update($rowId,($cart->qty - 1));
            }else{
                Cart::remove($rowId);
            } 
            break;
        case 'plus': 
                Cart::update($rowId,($cart->qty + 1)); 
            break;
        case 'remove': 
            Cart::remove($rowId);
        break; 
        default:
            # code...
            break;
       }
       return response()->json(['message' => 'cart updated successfully']);

    }

    

    

    public function addCart(Request $request,$id) {

        $product = Product::find($id);
        Cart::add(
            $product->id,
            $product->name, 
            1,
            $product->price,
            ['image' => url($product->image)])->associate('Product');
            return redirect()->route('home.mycart') ->with(['success'=>"Item added successfully!"]);   
    }

    public function login()
    {
    	return view('auth.modules.login');
    }

    public function register($refer_token=0)
    {  
        return view('auth.modules.register')->with('refer_token',$refer_token);
    }

    public function logout()
    { 
       \Auth::logout();
       return redirect()->route('home');
    }

    

  
}
