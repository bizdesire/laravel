<?php

namespace App\Livewire;
use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class Homelogin extends Component
{

    public $password;
    public $email;
    public $redirection_link;
    public $redirection_linked;
    public $type = "admin";
    protected $rules = [
        'password' => 'required|min:6',
        'email' => 'required|email',
    ];


    public function render()
    {
    //        $u = new User;
    //    $u->name = 'admin';
    //    $u->email = 'admin@gmail.com';
    //    $u->password = \Hash::make(123456789);
    //    $u->save();
        return view('livewire.homelogin');
    } 

    #-----------------------------------------------------------------------------------------------------
    # Function Divider
    #-----------------------------------------------------------------------------------------------------
    
    public function updated($propertyName)
    {
        $this->redirection_linked = $this->redirection_link;
        $this->validateOnly($propertyName);
    }
    
    #-----------------------------------------------------------------------------------------------------
    # Function Divider
    #-----------------------------------------------------------------------------------------------------
        
        public function checkLogin(Request $request)
        { 
            $validatedData = $this->validate();
            $data = ['email' => $this->email, 'password' => $this->password,'role' => 'user'];
            // dd($data);
           if(Auth::attempt($data))
            {  session()->flash('message', 'Login successfully.');
                return redirect()->route('home');
            }else{
                session()->flash('error', 'Invalid Credentials');
            }
        }
    }
    