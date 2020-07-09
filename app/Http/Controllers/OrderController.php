<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Validator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.order.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.order.createorder');
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
        //
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
}
