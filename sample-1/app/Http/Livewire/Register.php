<?php
namespace App\Http\Livewire;
use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class Register extends Component
{ 
    public $name;
    public $phone_number;
    public $email; 
    public $password; 
    protected $rules = [
        'name' => 'required',
        'phone_number' => 'required|unique:users|numeric|digits:10',
        'password' => 'required', 
        'email' => 'required|email|unique:users',
    ];


    public function updated($propertyName)
    {
       $this->validateOnly($propertyName);
    }


    public function render()
    {  
        return view('livewire.register');
    }


    public function createUser($value='')
    {
         $validatedData = $this->validate();   
         $c = new User;
         $c->name = $this->name;
         $c->phone_number = $this->phone_number;
         $c->email = $this->email; 
         $c->password = \Hash::make($this->password);
         if($c->save()){
            $data = ['email' => $this->email, 'password' => $this->password]; 
            $this->name = null;
            $this->phone_number = null;
            $this->email = null;
            $this->password = null; 
            session()->flash('message', 'Register successfully.');
           if(Auth::attempt($data))
            {  
                return redirect()->route('dashboard');
            }
         }else{
            session()->flash('error', 'something wrong.');
         }
                 
              
    }
}
