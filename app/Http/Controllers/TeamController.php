<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

class TeamController extends Controller
{
    public function login(){
        return view('team.login');
        // $pss = Hash::make('123456');
        // dd($pss);
    }
    
    public function processLogin(Request $request){
        $credentails = $request->only('email', 'password');
        if(Auth::attempt($credentails)){
            return redirect()->route('dashboard');
        }
    }
}
