<?php

namespace App\Http\Controllers;

use Exception;
use Razorpay\Api\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\WalletTransaction;
use Stripe;
use Cart;
use  App\Services\ReferralService;
class PaymentController extends Controller
{
     
    public function payment(Request $request, ReferralService $serv)
    { 
       
        if(Cart::count() > 0){ 
            try {
               
                Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
                $total = Cart::total();
                $data =  Stripe\Charge::create ([
                        "amount" => $total * 100,
                        "currency" => "inr",
                        "source" => $request->stripeToken,
                        "description" => "Test payment from itsolutionstuff.com." 
                ]); 
                if(!empty($data['id'])){ 
                    $serv->createOrder($data);
                }  
                return redirect()->route('home.mycart') ->with('success', 'Order placed successful!');
            } catch (Exception $e) {
                Log::info($e->getMessage());
                return redirect()->route('home.mywallet')->withError($e->getMessage());
            } 
        }
       
        return redirect()->route('home.mycart');
    }

    public function checkout(ReferralService $ser)
    { 
         
    	return view('home.carts.checkout');
    }



    
}
