<?php

namespace App\Http\Controllers;

use App\Models\Sending;
use App\Models\Balance;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class SendingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $balance_sender = Auth::user()->balance;
        if ($balance_sender->amount < $request->amount) {
            return redirect('home')->with('status', 'You do not have enough money in your account');
        }
        else {
            $sending = Sending::create($request->all());
            $receiver = User::find($request->receiver_id);
            $balance_receiver = $receiver->balance;
            $this->credit_balance($balance_receiver, $receiver, $request->amount);
            $this->debit_balance($balance_sender, Auth::user(), $request->amount);
            return redirect('home')->with('status', 'You sent successfully $'.$request->amount.' to '.$receiver->name);
        }
        
        
    }

    public function credit_balance($balance, $user, $amount) {
        if (!$balance) {
            $balance = Balance::create([
                'amount' => $amount,
                'user_id' => $user->id
            ]);
        }
        else {
            $balance->amount += $amount;
    
            $balance->save();
        }
    }

    public function debit_balance($balance, $user, $amount) {
        if (!$balance) {
            $balance = Balance::create([
                'amount' => $amount,
                'user_id' => $user->id
            ]);
        }
        else {
            $balance->amount -= $amount;
    
            $balance->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sending  $sending
     * @return \Illuminate\Http\Response
     */
    public function show(Sending $sending)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sending  $sending
     * @return \Illuminate\Http\Response
     */
    public function edit(Sending $sending)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sending  $sending
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sending $sending)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sending  $sending
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sending $sending)
    {
        //
    }
}
