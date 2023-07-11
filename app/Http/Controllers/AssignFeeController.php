<?php

namespace App\Http\Controllers;

use App\Models\calender;
use App\Models\account;
use App\Models\client;
use App\Models\year;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use UxWeb\SweetAlert\SweetAlert;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class AssignFeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()) {
            $calender = calender::where('status', '!=', 'no')->get();
            $year =  DB::table('calenders')
                ->distinct()
                ->select('year')
                ->get();

            return view('assignfee.create', compact('year', 'calender'));
        } else {
            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_old(Request $request)
    {
        $balance2 = 0;
        $current_year = Carbon::now()->year;
        $current_month = Carbon::now()->format('F');

        if ($current_year == $request->year && $current_month == $request->month) {

            $status = calender::where('year', '=', $request->year)
                ->where('month', '=', $request->month)
                ->where('status', '=', 'submit')
                // ->where('date','=',Carbon::now())
                ->first();
            // $account_date = DB::table('account')
            //     ->where('account.status', '=', 'yes')
            //     ->where('account.date', '!=', Carbon::now())
            //     ->first();
            if ($status) {
                Alert::warning('Stop', 'Fee Already Assign');
                return redirect()->back();
            } elseif (!$status) {
                $account = DB::table('account')
                    ->join('clients', 'clients.id', '=', 'account.customer_id')
                    ->select('account.customer_id', 'account.payable_amount', 'account.balance', 'clients.package_fee', 'clients.email')
                    ->groupBy('account.customer_id')
                    ->where('clients.status', '=', 'yes')
                    ->get();
                $account_cust = DB::table('account')
                    ->select('account.customer_id',)
                    ->groupBy('account.customer_id')
                    ->latest('id')
                    ->first();
                $check  = calender::where('year', '=', $request->year)
                    ->where('month', '=', $request->month)
                    ->first();
                $client = client::where('status', '=', 'yes')
                    ->where('id', '=', $account_cust->customer_id)->get();
                foreach ($account as $list) {
                    $data2 = account::where('customer_id', $list->customer_id)
                        ->where('month', '=', Carbon::now()->month)
                        ->where('year', '=', Carbon::now()->year)
                        ->where('payment_type', '=', 'New Connection')
                        ->where('con_status', '=', 'New Connection')
                        ->latest('id')
                        ->first();
                    $data = account::where('customer_id', $list->customer_id)
                        ->where('month', '=', Carbon::now()->month)
                        ->where('year', '=', Carbon::now()->year)
                        ->where('payment_type', '=', 'New Connection')
                        ->latest('id')
                        ->first();
                    if ($data2) {
                        Alert::success('success', 'Current Month Fee Cycle Now Activate Successfully');
                        return redirect()->back();
                    } elseif ($data) {
                        Alert::warning('Stop', 'Fee Already Assign');
                        return redirect()->back();
                    } else {
                        $data1 = account::where('customer_id', $list->customer_id)
                            ->latest('id')->first();
                        $account = new account();
                        $account->customer_id = $list->customer_id;
                        $account->payable_amount = $list->package_fee;
                        $balance = 0;
                        $balance += $account->payable_amount - 0;
                        $balance1 = 0;
                        $account->balance = $balance + $data1->balance;
                        $account->pre_balance =  $data1->balance;
                        $account->payment_type =  'Monthly Fee';
                        $account->month = Carbon::now()->month;
                        $account->year = Carbon::now()->year;
                        $account->paid_amount = 0;
                        $account->date = Carbon::today()->toDateString();
                        $account->save();
                        $check->status = "submit";
                        $check->update();
                        // Send Mail to Customers
                        $data = [
                            'email' => $list->email,
                            'monthly_fee' => $list->package_fee,
                            'total_payable' => $balance + $data1->balance,
                        ];
                        $user['to'] = $list->email;
                        Mail::send('accounts.mail', $data, function ($messages) use ($user) {
                            $messages->to($user['to'], 'email');
                            $messages->to($user['to'], 'monthly_fee');
                            $messages->to($user['to'], 'total_payable');
                            $messages->subject('Monthly Fee', $user['to']);
                        });
                    }
                }
                Alert::success('success', 'Current Month Fee Cycle Now Activate Successfully');
                return redirect()->back();
            } else {
                Alert::warning('Error', 'The Current Month fee Cycle is already selected.Please Wait for Next Month');
                return redirect()->back();
            }
        } else {
            Alert::warning('Error', 'Please Select current month and year');
            return redirect()->back();
        }

        // return $account_month;
    }


    public function store(Request $request)
    {
        $balance2 = 0;
        $current_year = Carbon::now()->year;
        $current_month = Carbon::now()->format('F');


        if ($current_year == $request->year && $current_month == $request->month) {

            $status = calender::where('year', '=', $request->year)
                ->where('month', '=', $request->month)
                ->where('status', '=', 'submit')
                ->first();

            if ($status) {
                Alert::warning('Stop', 'The Current Month fee Cycle is already activated.Please Wait for Next Month');
                return redirect()->back();
            } elseif (!$status) {
                $client = DB::table('accounts')
                    ->join('clients', 'clients.id', '=', 'accounts.customer_id')
                    ->select('accounts.customer_id', 'accounts.payable_amount', 'accounts.balance', 'clients.package_fee', 'clients.email')
                    ->groupBy('accounts.customer_id')
                    ->where('clients.status', '=', 'yes')
                    ->get();


                $check = calender::where('year', '=', $request->year)
                    ->where('month', '=', $request->month)
                    ->first();

                foreach ($client as $list) {

                    $data = account::where('customer_id', $list->customer_id)
                        ->where('month', '!=', Carbon::now()->month)
                        ->where('year', '=', Carbon::now()->year)
                        ->latest('id')
                        ->first();
                    // dd($data);
                    if ($data) {
                        $data1 = account::where('customer_id', $list->customer_id)
                            ->latest('id')->first();
                        $account = new account();
                        $account->customer_id = $list->customer_id;
                        $account->payable_amount = $list->package_fee;
                        $balance = 0;
                        $balance += $account->payable_amount - 0;
                        $balance1 = 0;
                        $account->balance = $balance + $data1->balance;
                        $account->pre_balance =  $data1->balance;
                        $account->payment_type =  'Monthly Fee';
                        $account->month = Carbon::now()->month;
                        $account->year = Carbon::now()->year;
                        $account->paid_amount = 0;
                        $account->date = Carbon::today()->toDateString();
                        $account->save();
                        $check->status = "submit";
                        $check->update();
                        // Send Mail to Customers
                        $data = [
                            'email' => $list->email,
                            'monthly_fee' => $list->package_fee,
                            'total_payable' => $balance + $data1->balance,
                        ];
                        $user['to'] = $list->email;
                        Mail::send('accounts.mail', $data, function ($messages) use ($user) {
                            $messages->to($user['to'], 'email');
                            $messages->to($user['to'], 'monthly_fee');
                            $messages->to($user['to'], 'total_payable');
                            $messages->subject('Monthly Fee', $user['to']);
                        });
                    }
                    $check->status = "submit";
                    $check->update();
                }
                Alert::success('success', 'Current Month Fee Cycle Now Activate Successfully');
                return redirect()->back();
            } else {
                Alert::warning('Error', 'The Current Month fee  already assign.Please Wait for Next Month');
                return redirect()->back();
            }
        } else {
            Alert::warning('Error', 'Please Select current month and year');
            return redirect()->back();
        }
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
        if (Auth::user()) {

            $calender = calender::findorFail($id);
            return view('assignfee.edit', compact('calender'));
        } else {
            return redirect()->back();
        }
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

        $calender = calender::findorFail($id);
        $calender->year = $request->year;
        $calender->month = $request->month;
        $calender->save();
        return redirect()->route('assignfee.create')->with('success', 'Data Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $calender = calender::findorFail($id);
        $calender->status = 'yes';
        $nmonth = date("n", strtotime($calender->date));
        $studentaccount = account::where('month', '=', $nmonth)
            ->where('year', '=', $calender->year)->where('status', '=', 'yes')->where('payment_type', '=', 'Monthly Fee')->get();

        foreach ($studentaccount as $key => $value) {
            $acc = account::find($value->id);
            $acc->status = 'N';
            $acc->delete();
        }

        $calender->save();
        Alert::success('success', 'Current Month Fee Cycle Deactivate Successfully');
        return redirect()->route('assignfee.create');
    }
}
