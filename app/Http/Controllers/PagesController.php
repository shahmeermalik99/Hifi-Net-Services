<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use App\Models\Account;
use App\Models\Client;

class PagesController extends Controller
{
    //
    public function main()
    {
        return view('main');
    }
    public function about()
    {
        return view('pages.about');
    }
    public function service()
    {
        return view('pages.service');
    }
    public function privacy()
    {
        return view('pages.privacy');
    }
    public function contact()
    {
        return view('pages.contact');
    }
    public function admin()
    {
        return view('admin');
    }
    public function contactstore(Request $request)
    {

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->contact = $request->contact;
        $contact->status = 'Y';
        $contact->message = $request->message;
        $contact->save();
        Alert::success('success', 'Added Successfully');
        return redirect()->route('pages.contact');
    }
    public function orders()
    {
        if (Auth::user() && Auth::user()->role == 'Customer') {
            $client = client::where('id', '=', Auth::user()->auth_id)->first();
            $account = Account::where('customer_id', '=', $client->id)->latest('id')->first();
            return view('myOrder', compact('account'));
        } else {
            return redirect()->back();
        }
    }
}
