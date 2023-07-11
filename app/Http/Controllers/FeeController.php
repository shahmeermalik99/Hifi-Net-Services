<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Client;
use App\Models\Account;
use App\Models\Fee;
use App\Models\Package;
use Illuminate\Support\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class FeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (Auth::user()) {
            $cnic = '';
            $contact = '';
            $fee = DB::table("fees")
                ->where('fees.status', '=', 'yes')
                ->join('clients', 'clients.id', '=', 'fees.cust_id')
                ->where('clients.status' , '=' , 'yes')
                ->select('fees.*', 'fees.cust_id', 'clients.name')
                ->whereRaw('fees.id = (SELECT MAX(id) FROM fees where fees.cust_id=clients.id)')
                ->latest('id')->get();
            // $fee = Fees::all();
            return view('fees.index', compact('fee', 'cnic', 'contact'));
        }else{
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if (Auth::user()) {
            $customer = "";
            $customer = Client::all()->where('status', '=', 'yes');
            $account = Account::where('status', '=', 'yes')->first();
            return view('fees.create', compact('customer', 'account'));

        }else{
            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $fee = new Fee;
        $fee->cust_id = $request->cust_id;
        $fee->package_name = $request->package_name;
        $fee->package_fee = $request->package_fee;
        $fee->payable_balance = $request->payable_balance;
        $fee->paid_amount = $request->paid_amount;
        $fee->pre_balance = $request->pre_balance;
        $fee->date = $request->date;
        $fee->balance = $request->balance;
        $account = new account;
        $account->customer_id =  $fee->cust_id;
        $account->balance =  $fee->balance;
        $account->payable_amount = 0;

        $new_balance = account::where('status', '=', 'yes')->where('customer_id', '=', $fee->cust_id)->latest('id')->first();
        // $account->pre_balance = 0;
        $account->date =  $fee->date;
        $account->payment_type =  'Fee Paid';
        $account->paid_amount = $fee->paid_amount;
        $account->pre_balance =  $new_balance->balance ?? '';
        $account->month = Carbon::now()->month;
        $account->year = Carbon::now()->year;
        $account->save();
        $fee->save();
        Alert::success('success', 'Fee Added Successfully');
        return redirect()->back();
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
        if (Auth::user()) {
            $fee = Fee::findorfail($id);
            $package = Package::where('id', $fee->package_name)->first();
            $fees = Client::select('name')->where('id', $fee->cust_id)->first();
            return view('fees.show', compact('fee', 'fees', 'package'));
        }else{
            return redirect()->back();
        }
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
