<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function signup(Request $request){
        $save = $request->validate([
            'name'=>'required|string',
            'email'=> 'required|email',
            'password'=> 'required|confirmed',
        ]);
        User::create($save);

        // Auth::login($save);

        return back()->with('registration_success', true);
    }


    public function login(Request $request){
        $data = $request->validate([
            'email'=> 'required|email',
            'password'=>'required'
        ]);

        if(Auth::attempt($data)){
            return redirect()->route('home')->with('success','hello world');
    }
}

public function logout(Request $request){
    Auth::logout();
      return redirect()->route('home')->with('success','lol');
}
}

