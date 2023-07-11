<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Account;
use Illuminate\Support\Carbon;

class PaymentController extends Controller
{
    //
    public function transcation(Request $request)
    {
        if (Auth::user()) {
            $customer = Account::where('customer_id' , '=' , Auth::user()->auth_id)->latest('id')->first();
            $payment_id = $request->id;
            $account = new Account();
            $account->customer_id = $customer->customer_id;
            $account->payable_amount = $customer->balance;
            $account->paid_amount = $request->amount;
            $account->payment_type = 'Paypal';
            $account->payment_method = 'online';
            $account->payment_id = $payment_id;
            $account->status = 'yes';
            $account->month = Carbon::now()->month;
            $account->year = Carbon::now()->year;
            $account->date = Carbon::now();
            $account->balance =$request->balance;
            $account->save();
            return response()->json([
                'status' => 200,
            ]);
        }else{
            return redirect()->back();
        }
    }
}
