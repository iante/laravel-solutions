<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDetails;
use App\Models\Wallet;

class WalletTransfer extends Controller
{
   public function TransferWallet(Request $request){
       //Transfers Money from one persons wallet to another (Main)
    $request->validate([
        'account_no'    => 'required',
        'amount'        => 'required',
    ]);

    $amount = $request->amount; // transfer amount
    $account_number = $request->account_number;

    $user_balance = UserDetails::where('user_id', Auth::id())->pluck('balance')->first();

    $reciever = UserDetails::where('account_number', $account_number)->get()->first();
  
    $walletDetails = Wallet::where('user_id', Auth::id());
    if($amount > 0){
        $user_balance->balance = $user_balance->balance - $amount;
        $user->save();

        $reciever->balance = $reciever->balance + $total_amount;
        $reciever->save();

        $walletDetails->main = $amount;
        $walletDetails->save();

        return response()->json([
            'Message' => 'Transfer of'.$amount.'successful'
        ]);
    }
    

}
    
}
