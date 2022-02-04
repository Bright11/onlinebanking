<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public function  User()
    {
        return $this->belongsTo(User::class);
    }

    public function Total()
    {
        return  $this->belongsTo(Total::class,'user_id','user_id');
    }
    public function Withdrawer()
    {
        return $this->belongsTo(Withdrawer::class,'user_id','user_id');
    }
    public function Deposit()
    {
        return $this->belongsTo(Deposit::class,'user_id','user_id');
    }
}
