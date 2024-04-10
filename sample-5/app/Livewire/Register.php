<?php
namespace App\Livewire;
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
    public $loadDataEvent = 0;
    public $refer_token=0;
 
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


    public function checkLogin($value='')
    {
        $validatedData = $this->validate(); 
         $id = !empty($this->refer_token) ? base64_decode($this->refer_token) : 0;  
         $user = User::find($id);
         $c = new User;
         $c->name = $this->name;
         $c->phone_number = $this->phone_number;
         $c->email = $this->email;
         $c->referral_id = $user->id ?? 0; 
         $c->password = \Hash::make($this->password);
         if($c->save()){
            $data = ['email' => $this->email, 'password' => $this->password,'role' => 'user']; 
            $this->name = null;
            $this->phone_number = null;
            $this->email = null;
            $this->password = null; 
            session()->flash('message', 'Register successfully.');
           if(Auth::attempt($data))
            {  
                return redirect()->route('home');
            }
         }else{
            session()->flash('error', 'something wrong.');
         }
                 
              
    }
}

