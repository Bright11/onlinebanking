<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\Return_;

class User extends Model
{
    use HasFactory;

    public function Customer()
    {
        return $this->belongsTo(Customer::class,'user_id','id');
    }

    public function Total()
    {
        return $this->belongsTo(Total::class,'user_id','id');
    }
    public function Withdrawer()
    {
        return $this->belongsTo(Withdrawer::class,'user_id','id');
    }

    public function Deposit()
    {
        return $this->belongsTo(Deposit::class,'user_id','id');
    }
}
