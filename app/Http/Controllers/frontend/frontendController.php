<?php

namespace App\Http\Controllers\frontend;

use App\Models\User;
use App\Models\Total;
use App\Models\Deposit;
use App\Models\Withdrawer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class frontendController extends Controller
{
    //
    public function prodetail()
    {

        return view('prodetail');
    }

    public function depositdetails()
    {
            $user_id=Session::get('user')['id'];
           // $depo=DB::table('deposits')
           $p=Deposit::with('User')->with('Customer')
            ->where('deposits.user_id',$user_id)->get();
           // $p= Deposit::find($user_id);
           $total= Total::find($user_id);
            return view('depositdetails',['p'=>$p,'total'=>$total]);
    }

    public function withdrawerdetails()
    {
        $user=Session::get('user')['id'];
        $w=Withdrawer::with('User')->with('Customer')
        ->where('withdrawers.user_id',$user)->get();
        $total= Total::find($user);
        $users=User::find($user);
        return view('withdrawerdetails',['w'=>$w,'total'=>$total,'users'=>$users]);
    }
}
