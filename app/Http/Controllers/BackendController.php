<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderStatus;
use Auth;

class BackendController extends Controller
{
    public function index(){
        $data['pending'] = OrderStatus::where('status', 'Pending')->count();
        $data['accepted'] = OrderStatus::where('status', 'Accepted')->count();
        $data['pickedUp'] = OrderStatus::where('status', 'Picked Up')->count();
        $data['inProgress'] = OrderStatus::where('status', 'In Progress')->count();
        $data['rescheduled'] = OrderStatus::where('status', 'Rescheduled')->count();
        $data['done'] = OrderStatus::where('status', 'Done')->count();
 
        return view('backend.dashboard', $data);
    }
}
