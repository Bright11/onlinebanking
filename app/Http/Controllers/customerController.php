<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Total;
use App\Models\Deposit;
use App\Models\Customer;
use App\Models\Transfer;
use App\Models\Withdrawer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class customerController extends Controller
{
    //

    public function openaccount($id)
    {
        $users = user::find($id);
        return view('backend.openaccount', ['users' => $users]);
    }

    public function addopenaccount(Request $req, $id)
    {
        // return $id;
        $req->validate([
            'email' => 'required',
            'email' => 'unique:customers'
        ]);
        $cus = new Customer;
        $str = (time() + rand(1, 10));
        $path = $cus->picture = $req->picture->store('public/passport');
        $cus->fullname = $req->fullname;
        $cus->email = $req->email;
        $cus->country = $req->country;
        $cus->pnumber = $req->pnumber;
        //account number
        $cus->account_number = $str;
        $cus->amount = $req->amount;
        $cus->user_id = $req->user_id;
        $cus->$path;
        if ($cus->save()) {
            $total = new Total;
            $total->user_id = $req->user_id;
            $total->amount = $req->amount;
            if ($total->save()) {
                $custo = "banking";
                $users = User::find($id);
                $users->openaccount = $custo;
                $users->update();
                return redirect('/')->with('status', 'Account has been opened for this user');
            }
        }
    }

    public function customers()
    {
        $cust = Customer::all();
        return view('backend.customers', ['cust' => $cust]);
    }
    public function transfer($user_id)
    {
        if (customer::where('user_id', $user_id)->exists())
            $cust = customer::where('user_id', $user_id)->first();
        $t = Total::where('user_id', $user_id)->first();
        return view('backend.transfer', ['cust' => $cust, 't' => $t]);
    }

    public function addtransfer(Request $req, $user_id)
    {
        $transfer = new Transfer;

        $transfer->user_id = $req->user_id;
        $transfer->bank = $req->bank;
        $transfer->country = $req->country;
        $transfer->amount = $req->amount;
        if ($transfer->save()) {
            $total = new Total;
            $totalamount = $total->amount = $req->amount + $total->tall = $req->tall;
            if (Total::where('user_id', $user_id)->exists()) {
                $total = Total::where('user_id', $user_id)
                    ->update(['amount' => $totalamount]);
                return redirect()->back()->with('status', 'Money successfully transfered');
            }
        }
    }

    public function withdraw($user_id)
    {
        //return $user_id;
        if (customer::where('user_id', $user_id)->exists())
            $cust = customer::where('user_id', $user_id)->first();
        $t = Total::where('user_id', $user_id)->first();
        return view('backend.withdraw', ['cust' => $cust, 't' => $t]);
    }

    public function addwithdarw(Request $req, $user_id)
    {
        //return $user_id;
        $w = new Withdrawer;
        $w->user_id = $req->user_id;
        $w->amount = $req->amount;
        if ($w->save()) {

            $total = new Total;

            if ($req->adamount == $req->amount) {
                return redirect()->back()->with('status', 'You can"t withdraw all');
            } elseif ($req->adamount < $req->amount) {
                return redirect()->back()->with('status', 'Insurficien balance');
            } else {
                $totalr = $total->adamount = $req->adamount - $total->amount = $req->amount;
                if (Total::where('user_id', $user_id)->exists()) {

                    $total = Total::where('user_id', $user_id)
                        ->update(['amount' => $totalr]);

                    return redirect()->back()->with('status', "$$req->amount Withdrawer wes successfull");
                }
            }
        }
    }

    //deposit

    public function deposit($user_id)
    {
        if (customer::where('user_id', $user_id)->exists()) {
            $cust = customer::where('user_id', $user_id)->first();
            return view('backend.deposit', ['cust' => $cust]);
        }
    }
    public function adddeposit(Request $req, $user_id)
    {
        $depo = new Deposit;
        $depo->user_id = $req->user_id;
        $depo->amount = $req->amount;
        if ($depo->save()) {
            $total = new Total;
            $toall = $total->amount = $req->amount + $total->adamount = $req->adamount;
            if (Total::where('user_id', $user_id)->exists()) {
                $total = Total::where('user_id', $user_id)
                    ->update(['amount' => $toall]);
                return redirect()->back()->with('status', "The amount of $$req->amount wes deposited successfull");
            }
        }
    }

    public function home()
    {
        if (Session::get('user.role_as')==1){
        $user = user::all()->count();
        $cus = Customer::all()->count();
        //$total = DB::table('totals')->sum();
        $total = DB::table('totals')->sum('amount');
        $w = DB::table('withdrawers')->sum('amount');
        $dep = DB::table('deposits')->sum('amount');
        $transfer = DB::table('transfers')->sum('amount');
        return view('backend.home', ['user' => $user,'cus'=>$cus,'total'=>$total,'w'=>$w,
        'dep'=>$dep,'transfer'=>$transfer
    ]);
    }else{
        return redirect('/')->with('status', "You are not an admin");
    }
}
}
