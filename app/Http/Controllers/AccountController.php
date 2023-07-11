<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\client;
use App\Models\account;
use App\Models\package;
use App\Models\service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\User;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user() && Auth::user()->role != 'Manager') {
            $data = DB::table('clients')
            ->where('clients.status', '=', 'yes')
            ->join('accounts', 'accounts.customer_id', '=', 'clients.id')
                ->select('name', 'contact', 'cnic', 'accounts.balance' , 'clients.id' , 'clients.alloted_name')
                ->whereRaw('accounts.id = (SELECT MAX(id) FROM accounts where accounts.customer_id=clients.id)')
                ->orderBy('accounts.id', 'asc')->latest('balance')->get();

            $data1 = DB::table('clients')
            ->where('clients.id' ,'=' , Auth::user()->auth_id)
            ->join('accounts', 'accounts.customer_id', '=', 'clients.id')
            ->where('accounts.customer_id' ,'=' , Auth::user()->auth_id)
                ->select('clients.name', 'clients.contact', 'clients.cnic', 'accounts.balance' , 'clients.id' , 'clients.alloted_name')
                ->whereRaw('accounts.id = (SELECT MAX(id) FROM accounts where accounts.customer_id=clients.id)')

                ->orderBy('accounts.id', 'asc')->latest('balance')->get();

            return view('accounts.index', compact('data', 'data1'));
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
        if (Auth::user()) {
            $customer = client::where('status', '=', 'yes')->get();
            return view('accounts.create', compact('customer'));
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::user() && Auth::user()->role != 'Manager') {
            $client = Client::findorfail($id);
            $account = Account::where('customer_id', '=', $client->id)
                ->join('clients', 'clients.id', '=', 'accounts.customer_id')
                ->select('accounts.*', 'accounts.customer_id', 'clients.name')
                ->get();
            $service = Service::where('client_id', '=', $client->id)->first();
            $package = Package::where('id', $client->package_id)->first();
            return view('accounts.show', compact('client', 'account', 'service', 'package'));
        }else{
            return redirect()->back();
        }
    }

    public  function myaccount(){

        if (Auth::user() && Auth::user()->role == 'Customer') {

            $user = Auth::user()->auth_id;
            $client = client::find($user);

            $account = account::where('customer_id', '=', $client->id)
                ->join('clients', 'clients.id', '=', 'accounts.customer_id')
                ->select('accounts.*', 'accounts.customer_id', 'clients.name')
                ->get();
            $service = service::where('client_id', '=', $client->id)->first();
            $package = package::where('id', $client->package_id)->first();
            return view('accounts.show', compact('client', 'account', 'service', 'package'));
        } else {
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
        $account = account::findorFail($id);
        $account->package_fee =  $request->package_fee;
        $account->customer_id = $request->customer_id;
        $account->paid_amount = $request->paid_amount;
        $account->balance = $request->balance;
        $account->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //  accumlative property @if $balance += $list->balance
    }
}
