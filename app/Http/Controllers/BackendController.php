<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderStatus;
use Auth;

class BackendController extends Controller
{
    public function index(){
        // $data['pending'] = OrderStatus::where('status', 'Pending')->count();
        // $data['accepted'] = OrderStatus::where('status', 'Accepted')->count();
        // $data['pickedUp'] = OrderStatus::where('status', 'Picked Up')->count();
        // $data['inProgress'] = OrderStatus::where('status', 'In Progress')->count();
        // $data['rescheduled'] = OrderStatus::where('status', 'Rescheduled')->count();
        // $data['done'] = OrderStatus::where('status', 'Done')->count();
        $pending = $accepted = $pickedUp = $inProgress = $rescheduled = $done = 0;
        $order_ids = OrderStatus::select('order_id')->distinct()->get();
        foreach ($order_ids as $value) {
            $orderId = $value->order_id;
            $status = OrderStatus::select('status')->where('order_id', $orderId)->orderBy('id', 'DESC')->first();
            $status = $status->status;
            if($status == 'Pending'){
                $pending = $pending + 1;
            }else if($status == 'Accepted'){
                $accepted = $accepted + 1;
            }else if($status == 'Picked Up'){
                $pickedUp = $pickedUp + 1;
            }else if($status == 'In Progress'){
                $inProgress = $inProgress + 1;
            }else if($status == 'Rescheduled'){
                $rescheduled = $rescheduled + 1;
            }else if($status == 'Done'){
                $done = $done + 1;
            }
        }
        
        $data['pending'] = $pending;
        $data['accepted'] = $accepted;
        $data['pickedUp'] = $pickedUp;
        $data['inProgress'] = $inProgress;
        $data['rescheduled'] = $rescheduled;
        $data['done'] = $done;
        return view('backend.dashboard', $data);
    }
}
