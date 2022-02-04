<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;
    
    public function  User()
    {
        return $this->belongsTo(User::class);
    }
    public function Customer()
    {
        return $this->belongsTo(Customer::class,'user_id','user_id');
    }
    public function Total()
    {
        return  $this->belongsTo(Total::class,'user_id','user_id');
    }
}
