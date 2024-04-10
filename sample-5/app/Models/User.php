<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function balance(){
        $debit = $this->transactions->where('type','debit')->sum('amount');
        $credit = $this->transactions->where('type','credit')->sum('amount'); 
        return  round($credit - $debit , 2);
    }

    public function  transactions() {
       return $this->hasMany('App\Models\WalletTransaction');
    }

    public function debit($data) {
        // Usage
        $transactionID = $this->generateTransactionID(); 
        $p = new \App\Models\WalletTransaction;
        $p->amount = $data->discounted_price;
        $p->user_id= auth()->user()->id;
        $p->type="debit";
        $p->method = 'wallet';
        $p->relation_id = $data->id;
        $p->r_payment_id = $transactionID.'-'.$data->id.'-'.auth()->user()->id;
        $p->save();
        return true;
    }

    
function generateTransactionID() {
    // Generate a random string
    $randomString = bin2hex(random_bytes(8)); // Generate 8 bytes of random data and convert to hexadecimal 
    // Generate a unique identifier (e.g., using uniqid() function)
    $uniqueID = uniqid(); 
    // Combine random string and unique ID
    $transactionID = $randomString . $uniqueID; 
    return $transactionID;
}

public function referrer()
{
    return $this->belongsTo(User::class, 'referral_id');
}

public function referredUsers()
{
    return $this->hasMany(User::class, 'referral_id');
}

 

}
