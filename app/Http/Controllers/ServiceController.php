<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\Service;
use App\Models\Account;
use RealRashid\SweetAlert\Facades\Alert;

class ServiceController extends Controller
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

            return view('services.index');
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

            $mytime = Carbon::now()->format('Y-m-d');
            return view('services.create' , compact('mytime'));
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
        $service = new  service();
        $service->client_id = $request->client_id;
        $service->srv_name = $request->srv_name;
        $service->srv_served_by = $request->srv_served_by;
        $service->srv_amount = $request->srv_amount;
        $service->srv_paid_amount = $request->srv_paid_amount;
        $service->srv_balance = $request->srv_balance;
        $service->srv_date = $request->srv_date;
        $account = new account();
        $account->customer_id =  $service->client_id;
        $account->payable_amount = $service->srv_amount;
        $account->payment_type =   $service->srv_name;
        $account->paid_amount = $service->srv_paid_amount;
        $data1 = account::where('customer_id', $service->client_id)
            ->latest('id')->first();
        $account->balance += $service->srv_balance  + $data1->balance;
        $account->pre_balance =  $data1->balance;
        $account->date = $service->srv_date;
        $account->month = Carbon::now()->month;
        $account->year = Carbon::now()->year;
        $account->save();
        $service->save();
        Alert::success('success', 'Service Added Successfully');
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
