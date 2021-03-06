<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderStatus;
use App\Location;
use Validator;
use Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['orders'] = Order::select('id', 'created_at', 'receiver_name', 'receiver_phone', 'service_charge', 'payment_status', 'ref_id')->orderBy('id', 'DESC')->get();
        return view('backend.order.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['locations'] = Location::select('id', 'name')->where('status', 1)->get();
        return view('backend.order.createorder', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'sname' => 'required',
            'sphone' => 'required',
            'rname' => 'required',
            'rphone' => 'required',
            'address' => 'required',
            'product_details' => 'required',
            'service_charge' => 'required',
            'payment_status' => 'required',
            'ref_id' => 'required',
            'note' => 'required',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $orderObj = new Order();
        $orderObj->customer_name = $request->sname;
        $orderObj->customer_phone = $request->sphone;
        $orderObj->receiver_name = $request->rname;
        $orderObj->receiver_phone = $request->rphone;
        $orderObj->receiver_address = $request->address;
        $orderObj->product_details = $request->product_details;
        $orderObj->service_charge = $request->service_charge;
        $orderObj->payment_status = $request->payment_status;
        $orderObj->ref_id = $request->ref_id;
        $orderObj->note = $request->note;
        $orderObj->save();

        if(Auth::check()){
            $user_id = Auth::user()->id;
        }

        $statusObj = new OrderStatus();
        $statusObj->order_id = $orderObj->id;
        $statusObj->status = 'Pending';
        $statusObj->change_by = $user_id;
        $statusObj->save();

        return redirect()->route('order.index')->with('success', 'Order Place Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['order'] = Order::where('id', $id)->first();
        return view('backend.order.orderdetails', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function statuschanage(Request $request){
        $validator = Validator::make($request->all(),[
            'order_id' => 'required',
            'order_status' => 'required',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if(Auth::check()){
            $user_id = Auth::user()->id;
        }

        $statusObj = new OrderStatus();
        $statusObj->order_id = $request->order_id;
        $statusObj->status = $request->order_status;
        $statusObj->change_by = $user_id;
        $statusObj->save();
    }
}
