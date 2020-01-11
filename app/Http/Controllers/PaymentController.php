<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Rent;
use App\Service;
use App\Room;
use App\Rent_Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::all();

        return view('payments.index',['payments'=>$payments]);
    }

    public function store(Request $request)
    {
        $user                   = Auth::user();
        $payment                = new Payment();
        $payment->rent_id       = $request->id;
        $payment->user_id       = $user->id;
        $payment->description   = $request->description;
        $payment->type          = $request->type;

        $total = $this->total($request->id);
        
        $payment->total = $total;

        $payment->save();

        return  back();
    }



    public function total($id){

        $rent = Rent::findOrFail($id);
        $room = Room::findOrFail($rent->room_id);

        $rent->status = '1';

        $rent->save();

        $services =  $rent->services;
        $total = 0;

        foreach($services as $service){
            $total = $total + $service->price;
        }

        return $total + $room->price;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
