<?php

namespace App\Http\Controllers\backend;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//suse Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
//use Session;

class registerCountroller extends Controller
{
    //
    public function register()
    {
        return view('register');
    }

    public function insertregister(Request $req)
    {
        $req->validate([
            'password'=>'required|min:5',
            'confirmpassword'=>'required_with:password|same:password|min:5',
            'email'=>'required',
            'email'=>'unique:users',
        ]);
      //  $user=user::where(['email'=>$req->email])->first();

        //if($user===null)
        //{
            $user=new user;
           // return $user;
            $user->fullname=$req->fullname;
            $user->email=$req->email;
            $user->password=Hash::make($req->password);
            $user->save();
            return redirect('login')->with('status','Now you can login');
        //}
    }

    public function login()
    {
        return view('login');
    }

    public function insertlogin(Request $req)
    {
        $user=user::where(['email'=>$req->email])->first();
        if(!$user||!Hash::check($req->password,$user->password))
        {
            return redirect()->back()->with('status','incorrect user name or password');
        }else{
            $req->session()->put('user',$user);
           //if( $user = Auth::attempt(['users.email'=>$req->email])){
            return redirect('/')->with('status','you have successfully login');
           }
                //}

    }

    //registered users
    public function registeredusers()
    {
        $user= user::all();

        return view('backend.registeredusers',['user'=>$user]);
    }

    public function logout()
    {
        Session::forget('user');
        return redirect('/')->with('status','Goodbye');
    }
}
