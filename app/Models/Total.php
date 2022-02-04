<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Total extends Model
{
    use HasFactory;

    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function Customer()
    {
        return  $this->belongsTo(Customer::class);
    }
    public function Deposit()
    {
        return $this->belongsTo(Deposit::class,'user_id','id');
    }
    public function Withdrawer()
    {
        return $this->belongsTo(Withdrawer::class,'user_id','user_id');
    }
}
