<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use Validator;
use App\User;

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
        }else{
            return redirect()->route('login');
        }
    }

    public function addTeam(){
        return view('team.addteam');
    }

    public function storeTeam(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if($validator->fails()){
            // return redirect()->route('');
            dd('not valid');
        }
     
        $userObj = new User();

        $userObj->name = $request->name;
        $userObj->phone = $request->phone;
        $userObj->email = $request->email;
        $userObj->password = Hash::make($request->password);
        $userObj->role = $request->role;
        $userObj->save();
    }
}
