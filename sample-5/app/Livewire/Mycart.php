<?php

namespace App\Livewire;

use Livewire\Component;
use Cart;
class Mycart extends Component
{
    public $carts =[];

    public function updated()
    {
       //$this->carts = Cart::content();
    }

    public function render(){
        $this->carts = Cart::content();
        return view('livewire.mycart',['carts',$this->carts]);
    }

    
    
}
