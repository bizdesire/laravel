<?php

namespace App\Http\Livewire;
use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class Adminlogin extends Component
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
     
        return view('livewire.adminlogin');
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
            $data = ['email' => $this->email, 'password' => $this->password,'role' => 'admin'];
            // dd($data);
           if(Auth::attempt($data))
            { 
               
                session()->flash('message', 'Login successfully.');
                 
                return redirect()->route('admin.dashboard');
            }else{
                session()->flash('error', 'Invalid Credentials');
            }
        }
    }
    