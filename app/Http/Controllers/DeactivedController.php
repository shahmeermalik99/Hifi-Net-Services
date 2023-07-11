<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use App\Models\Account;
use RealRashid\SweetAlert\Facades\Alert;

class DeactivedController extends Controller
{
    //
    public function index()
    {
        if (Auth::user()) {

            $client = Client::where('status' ,'=' , 'deactive')->get();
            return view('deactived.index', compact('client'));
        }else{
            return redirect()->back();
        }
    }
    public function destroy($id)
    {
        $client = client::findorFail($id);
        $client->status = 'yes';
        $account = account::where('customer_id', $client->id)->first();
        if($account) {
            $account->status = 'yes';
            $account->save();
        }
        $query = $client->save();
        Alert::success('success', 'Client Activate Successfully');
        if ($query)
            return redirect()->route('clients.clientlist');
    }
}
