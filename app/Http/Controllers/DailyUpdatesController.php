<?php

namespace App\Http\Controllers;
use App\Models\daily_update;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class DailyUpdatesController extends Controller
{
    //
    public function index(Request $request)
    {
        if (Auth::user() && Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Admin'){
        $daily= daily_update::get();
        return view('daily_updates.index', compact('daily'));
    }else{
        return redirect()->back();
    }
    }
    public function create()
    {
        if (Auth::user() && (Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Admin')) {
            return view('daily_updates.create');
        } else {
            return redirect()->back();
        }
    }
    public function store(Request $request)
    {

        $request->validate(
            [
                'email' => 'nullable|unique:daily_updates,email,',
            ],
            [

                'email.unique' => 'Email already exist',
            ]
        );

        $daily = new daily_update();
        $daily->email = $request->email;
        $daily->save();
        Alert::success('success', 'Email Send Successfully');
        return redirect()->back();
    }
    public function send(Request $request)
    {
        if (Auth::user() && (Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Admin')) {
            $daily = daily_update::get();
            foreach ($daily as  $list) {
                $data = [
                    'email' => $list->email,
                    'messages' =>  $request->message,
                ];
                $user['to'] = $list->email;

                Mail::send('daily_updates.mail', $data, function ($messages) use ($user) {
                    $messages->to($user['to'], 'message');
                    $messages->to($user['to'], 'email');
                    $messages->subject('HiFi Internet Updates', $user['to']);
                });
            }
            Alert::success('success', 'Send Successfully');
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
}
