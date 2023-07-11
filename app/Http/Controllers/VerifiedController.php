<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use App\Models\Area;
use App\Models\Account;
use App\Models\Package;

class VerifiedController extends Controller
{
    //
    public function index()
    {
        if (Auth::user()) {

            $client = Client::where('status' , '!=' , 'deactive')
            ->where('var_cust', '=', 'Approve')
            ->get();
            return view('verified.index', compact('client'));
        }else{
            return redirect()->back();
        }
    }
    public function showverify($id)
    {
        if (Auth::user()) {
            $client = client::findorfail($id);
            $area = Area::where('id',$client->area)->first();
            $account = Account::where('customer_id', $client->id)->first();
            $package = Package::where('id', $client->package_id)->first();
            return view('verified.show', compact('client', 'package', 'account', 'area'));

        }else{
            return redirect()->back();
        }
    }
}
