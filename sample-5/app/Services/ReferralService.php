<?php
namespace App\Services;

use App\Models\{
    User,Order,OrderItem
};
use Cart;
use Illuminate\Support\Facades\Auth;
use Session;
class ReferralService
{
    // public function calculateBonus(User $user, $amount)
    // {
    //     $totalBonus = 0;
    //     for ($i = 1; $i <= 5; $i++) {
    //         $referrer = $user->referrer;
    //         if (!$referrer) break;

    //         $bonusPercentage = 6 - $i; // Bonus percentages 5%, 4%, 3%, 2%, 1%
    //         $bonusAmount = ($amount * $bonusPercentage) / 100;
    //         $referrer->bonus_earned += $bonusAmount;
    //         $referrer->save();

    //         $totalBonus += $bonusAmount;

    //         $user = $referrer; // Move to the next level
    //     }

    //     return $totalBonus;
    // }

    // public function getUserReferralData(User $user)
    // {
    //     $referralData = [];
    //     $this->getReferralDataRecursive($user, 1, $referralData);
    //     return $referralData;
    // }

    // private function getReferralDataRecursive(User $user, $level, &$referralData)
    // {
    //     $referralData[$level][] = $user; 
    //     if ($level < 5 && $user->referrer) {
    //         $this->getReferralDataRecursive($user->referrer, $level + 1, $referralData);
    //     }
    // }

    public function createOrder($data) {
        $order = new Order;
        $order->stripe_payment_id = $data['id'];
        $order->type ='stripe';
        $order->amount = $total = Cart::total();
        $order->tax = Cart::tax();
        $order->user_id = auth()->user()->id;
        $order->save();
        foreach (Cart::content() as $item) {
            $o = new OrderItem;
            $o->product_id = $item->id;
            $o->order_id = $order->id;
            $o->qty = $item->qty;
            $o->price = $item->price;
            $o->subtotal = $item->subtotal;
            $o->user_id = auth()->user()->id;
            $o->save();
        } 
        $bonusAmount =  Cart::total() - Cart::tax();

        if($this->payRefer(auth()->user(),$bonusAmount)){
            Cart::destroy();
        } 
        return true;
    }


    public function payRefer($user,$bonusAmount){
       
          if(!empty($user->referrer)){
             $this->payToReferrer($user->referrer,5,$bonusAmount);
          }
          return true;
    }
    
    public function payToReferrer($user,$percent,$bonusAmount){
          $bonus = abs(($bonusAmount / 100) * $percent);
          $u = User::find($user->id);
          $u->bonus_earned = ($u->bonus_earned + $bonus);
          $u->save();
          $percent = $percent - 1;
          if(!empty($u->referrer) && $percent > 0){
            $this->payToReferrer($u->referrer,$percent,$bonusAmount);
          }
          return true;
    }

}