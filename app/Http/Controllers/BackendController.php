<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class BackendController extends Controller
{
    public function index(){
        return view('backend.dashboard');
    }
}
