<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\User;
use App\Models\Client;

class ReportController extends Controller
{
    //
    public function index(Request $request)
    {
        if (Auth::user()  && (Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Admin')) {
            $data = '';
            $customers = $request->customerfilter;
            $users = $request->filter;
            $customer = User::where('status', '=', 'yes')->get();
            if ($customers == '' && $users == '') {
                $data = DB::table('users')
                    ->where('users.status', '=', 'yes')
                    ->get();
            }
            if ($customers != '' && $users == '') {
                $data = DB::table('users')
                    ->where('users.status', '=', 'yes')
                    ->where('users.id', $customers)
                    ->get();
            }
            if ($customers == '' && $users != '') {
                $data = DB::table('users')
                    ->where('users.status', '=', 'yes')
                    ->where('users.role', $users)
                    ->get();
            }
            if ($customers != '' && $users != '') {
                if ($users == 'Super Admin') {
                    $data = DB::table('users')
                        ->where('users.status', '=', 'yes')
                        ->where('users.role', '=', 'Super Admin')
                        ->where('users.id', $customers)
                        ->get();
                }
                if ($users == 'Admin') {
                    $data = DB::table('users')
                        ->where('users.status', '=', 'yes')
                        ->where('users.role', '=', 'Admin')
                        ->where('users.id', $customers)
                        ->get();
                }
                if ($users == 'Manager') {
                    $data = DB::table('users')
                        ->where('users.status', '=', 'yes')
                        ->where('users.role', '=', 'Manager')
                        ->where('users.id', $customers)
                        ->get();
                }
                if ($users == 'Customer') {
                    $data = DB::table('users')
                        ->where('users.status', '=', 'yes')
                        ->where('users.role', '=', 'Customer')
                        ->where('users.id', $customers)
                        ->get();
                }
            }
            return view('reports.users', compact('data', 'customer'));
        } else {
            return redirect()->back();
        }
    }
    public function receivable(Request $request)
    {
        if (Auth::user()  && (Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Admin')) {
            $customer = DB::table('accounts')
                ->where('balance', '!=', 0)
                ->join('clients', 'clients.id', '=', 'accounts.customer_id')
                ->where('clients.status', '=', 'yes')

                ->select('accounts.*', 'accounts.customer_id', 'clients.name', 'clients.contact', 'clients.cnic', 'clients.alloted_name')
                ->whereRaw('accounts.id = (SELECT MAX(id) FROM accounts where accounts.customer_id=clients.id)')
                ->get();

            return view('reports.receivable', compact('customer'));
        }else{
            return redirect()->back();
        }
    }
    public function expense(Request $request)
    {
        if (Auth::user() && Auth::user()->role != 'Customer') {
            $agents = '';
            $calls_status = '';
            $expense = $request->expensefilter;
            $data = '';
            $mytime = '';
            $mytime1 = '';
            $mytime = Carbon::now()->format('Y-m-d');
            $from = $request->input('date1');
            $to = $request->input('date2');
            if ($to == '') {
                $mytime1 = Carbon::now()->format('Y-m-d');
            } else {
                $mytime1 = $to;
            }

            if ($from == '') {
                $mytime = Carbon::now()->format('Y-m-d');
            } else {
                $mytime = $from;
            }

            // main code start here
            $data = DB::table('expenses')
                ->where('expenses.status', '=', 'yes')
                ->where('expenses.date', $mytime)
                ->join('categories', 'categories.id', '=', 'expenses.cat_id')
                ->select('expenses.*', 'expenses.cat_id', 'categories.name')
                ->get();

            if ($from != '' && $to != '') {

                if ($expense != '') {
                    $data = DB::table('expenses')
                        ->whereDate('expenses.date', '>=', $from)
                        ->whereDate('expenses.date', '<=', $to)
                        ->where('expenses.status', '=', 'yes')
                        ->where('expenses.cat_id', $expense)
                        ->join('categories', 'categories.id', '=', 'expenses.cat_id')
                        ->select('expenses.*', 'expenses.cat_id', 'categories.name')
                        ->get();
                }
            }
            if ($from != '' && $to != '') {

                if ($expense == '') {
                    $data = DB::table('expenses')
                        ->whereDate('expenses.date', '>=', $from)
                        ->whereDate('expenses.date', '<=', $to)
                        ->where('expenses.status', '=', 'yes')
                        ->join('categories', 'categories.id', '=', 'expenses.cat_id')
                        ->select('expenses.*', 'expenses.cat_id', 'categories.name')
                        ->get();
                }
            }
            return view('reports.expense', compact('data', 'mytime', 'mytime1'));

        }else{
            return redirect()->back();
        }
    }

    public function account(Request $request)
    {
        if (Auth::user() && (Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Admin')) {
            $data = DB::table('clients')
                ->where('clients.status', '=', 'yes')
                ->select('name', 'contact', 'cnic', 'accounts.balance', 'accounts.payment_type', 'accounts.date', 'clients.id', 'clients.alloted_name')
                ->join('accounts', 'accounts.customer_id', '=', 'clients.id')
                ->whereRaw('accounts.id = (SELECT MAX(id) FROM accounts where accounts.customer_id=clients.id)')
                ->orderBy('accounts.id', 'asc')->latest('balance', 'payment_type', 'date')->get();
            return view('reports.accounts', compact('data'));
        }else{
            return redirect()->back();
        }
    }
    public function client(Request $request)
    {
        if (Auth::user() && Auth::user()->role != 'Customer') {
            $data = '';
            $customers = $request->customerfilter;
            $customers_cnic = $request->cnicfilter;
            $customers_contact = $request->contactfilter;
            $customer_status = $request->statusfilter;
            if (Auth::user()->role == 'Admin') {

                if ($customers == '' && $customers_cnic  ==  ''  && $customers_contact == '' && $customer_status == '') {
                    $data = DB::table('clients')
                        ->where('clients.status', '=', 'yes')
                        ->get();
                } elseif ($customers != '' && $customers_cnic  ==  ''  && $customers_contact == '' && $customer_status == '') {
                    $data = DB::table('clients')
                        ->where('clients.status', '=', 'yes')
                        ->where('clients.id', '=', $customers)
                        ->get();
                } elseif ($customers != '' && $customers_cnic  !=  ''  && $customers_contact == '' && $customer_status == '') {
                    $data = DB::table('clients')
                        ->join('packages', 'packages.id', '=', 'clients.package_id')
                        ->where('clients.status', '=', 'yes')
                        ->where('clients.id', '=', $customers)
                        ->where('clients.id', '=', $customers_cnic)
                        ->select('clients.*', 'packages.fee', 'packages.mb')
                        ->get();
                } elseif ($customers != '' && $customers_cnic  ==  ''  && $customers_contact != '' && $customer_status == '') {
                    $data = DB::table('clients')
                        ->join('packages', 'packages.id', '=', 'clients.package_id')
                        ->where('clients.status', '=', 'yes')
                        ->where('clients.id', '=', $customers)
                        ->where('clients.id', '=', $customers_contact)
                        ->select('clients.*', 'packages.fee', 'packages.mb')
                        ->get();
                } elseif ($customers != '' && $customers_cnic  !=  ''  && $customers_contact != '' && $customer_status == '') {
                    $data = DB::table('clients')
                        ->join('packages', 'packages.id', '=', 'clients.package_id')
                        ->where('clients.status', '=', 'yes')
                        ->where('clients.id', '=', $customers)
                        ->where('clients.id', '=', $customers_cnic)
                        ->where('clients.id', '=', $customers_contact)
                        ->select('clients.*', 'packages.fee', 'packages.mb')
                        ->get();
                } elseif ($customers != '' && $customers_cnic  !=  ''  && $customers_contact != '' && $customer_status != '') {
                    $data = DB::table('clients')
                        ->join('packages', 'packages.id', '=', 'clients.package_id')
                        ->select('clients.*', 'packages.fee', 'packages.mb')
                        ->where('clients.status', '=', 'yes')
                        ->where('clients.id', '=', $customers)
                        ->where('clients.id', '=', $customers_cnic)
                        ->where('clients.id', '=', $customers_contact)
                        ->where('clients.var_cust', '=', $customer_status)
                        ->get();
                } elseif ($customers != '' && $customers_cnic  ==  ''  && $customers_contact == '' && $customer_status != '') {
                    $data = DB::table('clients')
                        ->join('packages', 'packages.id', '=', 'clients.package_id')
                        ->select('clients.*', 'packages.fee', 'packages.mb')
                        ->where('clients.status', '=', 'yes')
                        ->where('clients.id', '=', $customers)

                        ->where('clients.var_cust', '=', $customer_status)
                        ->get();
                } elseif ($customers == '' && $customers_cnic  !=  ''  && $customers_contact == '' && $customer_status == '') {
                    $data = DB::table('clients')
                        ->join('packages', 'packages.id', '=', 'clients.package_id')
                        ->select('clients.*', 'packages.fee', 'packages.mb')
                        ->where('clients.status', '=', 'yes')
                        ->where('clients.id', '=', $customers_cnic)

                        ->get();
                } elseif ($customers == '' && $customers_cnic  !=  ''  && $customers_contact != '' && $customer_status == '') {
                    $data = DB::table('clients')
                        ->join('packages', 'packages.id', '=', 'clients.package_id')
                        ->select('clients.*', 'packages.fee', 'packages.mb')
                        ->where('clients.status', '=', 'yes')
                        ->where('clients.id', '=', $customers_cnic)
                        ->where('clients.id', '=', $customers_contact)
                        ->get();
                } elseif ($customers == '' && $customers_cnic  !=  ''  && $customers_contact == '' && $customer_status != '') {
                    $data = DB::table('clients')
                        ->join('packages', 'packages.id', '=', 'clients.package_id')
                        ->select('clients.*', 'packages.fee', 'packages.mb')
                        ->where('clients.status', '=', 'yes')
                        ->where('clients.id', '=', $customers_cnic)
                        ->where('clients.var_cust', '=', $customer_status)
                        ->get();
                } elseif ($customers == '' && $customers_cnic  ==  ''  && $customers_contact != '' && $customer_status == '') {
                    $data = DB::table('clients')
                        ->join('packages', 'packages.id', '=', 'clients.package_id')
                        ->select('clients.*', 'packages.fee', 'packages.mb')
                        ->where('clients.status', '=', 'yes')
                        ->where('clients.id', '=', $customers_contact)
                        ->get();
                } elseif ($customers == '' && $customers_cnic  ==  ''  && $customers_contact != '' && $customer_status != '') {
                    $data = DB::table('clients')
                        ->join('packages', 'packages.id', '=', 'clients.package_id')
                        ->select('clients.*', 'packages.fee', 'packages.mb')
                        ->where('clients.status', '=', 'yes')
                        ->where('clients.id', '=', $customers_contact)
                        ->where('clients.var_cust', '=', $customer_status)
                        ->get();
                } elseif ($customers == '' && $customers_cnic  ==  ''  && $customers_contact == '' && $customer_status != '') {
                    $data = DB::table('clients')
                        ->join('packages', 'packages.id', '=', 'clients.package_id')
                        ->select('clients.*', 'packages.fee', 'packages.mb')
                        ->where('clients.status', '=', 'yes')
                        ->where('clients.var_cust', '=', $customer_status)
                        ->get();
                }
            }
            if (Auth::user()->role == 'Super Admin' && 'Admin') {

                if ($customers == '' && $customers_cnic  ==  ''  && $customers_contact == '' && $customer_status == '') {
                    $data = DB::table('clients')
                        ->where('clients.status', '=', 'yes')
                        ->get();
                } elseif ($customers != '' && $customers_cnic  ==  ''  && $customers_contact == '' && $customer_status == '') {
                    $data = DB::table('clients')
                        ->where('clients.status', '=', 'yes')
                        ->where('clients.id', '=', $customers)
                        ->get();
                } elseif ($customers != '' && $customers_cnic  !=  ''  && $customers_contact == '' && $customer_status == '') {
                    $data = DB::table('clients')
                        ->join('packages', 'packages.id', '=', 'clients.package_id')
                        ->where('clients.status', '=', 'yes')
                        ->where('clients.id', '=', $customers)
                        ->where('clients.id', '=', $customers_cnic)
                        ->select('clients.*', 'packages.fee', 'packages.mb')
                        ->get();
                } elseif ($customers != '' && $customers_cnic  ==  ''  && $customers_contact != '' && $customer_status == '') {
                    $data = DB::table('clients')
                        ->join('packages', 'packages.id', '=', 'clients.package_id')
                        ->where('clients.status', '=', 'yes')
                        ->where('clients.id', '=', $customers)
                        ->where('clients.id', '=', $customers_contact)
                        ->select('clients.*', 'packages.fee', 'packages.mb')
                        ->get();
                } elseif ($customers != '' && $customers_cnic  !=  ''  && $customers_contact != '' && $customer_status == '') {
                    $data = DB::table('clients')
                        ->join('packages', 'packages.id', '=', 'clients.package_id')
                        ->where('clients.status', '=', 'yes')
                        ->where('clients.id', '=', $customers)
                        ->where('clients.id', '=', $customers_cnic)
                        ->where('clients.id', '=', $customers_contact)
                        ->select('clients.*', 'packages.fee', 'packages.mb')
                        ->get();
                } elseif ($customers != '' && $customers_cnic  !=  ''  && $customers_contact != '' && $customer_status != '') {
                    $data = DB::table('clients')
                        ->join('packages', 'packages.id', '=', 'clients.package_id')
                        ->select('clients.*', 'packages.fee', 'packages.mb')
                        ->where('clients.status', '=', 'yes')
                        ->where('clients.id', '=', $customers)
                        ->where('clients.id', '=', $customers_cnic)
                        ->where('clients.id', '=', $customers_contact)
                        ->where('clients.var_cust', '=', $customer_status)
                        ->get();
                } elseif ($customers != '' && $customers_cnic  ==  ''  && $customers_contact == '' && $customer_status != '') {
                    $data = DB::table('clients')
                        ->join('packages', 'packages.id', '=', 'clients.package_id')
                        ->select('clients.*', 'packages.fee', 'packages.mb')
                        ->where('clients.status', '=', 'yes')
                        ->where('clients.id', '=', $customers)

                        ->where('clients.var_cust', '=', $customer_status)
                        ->get();
                } elseif ($customers == '' && $customers_cnic  !=  ''  && $customers_contact == '' && $customer_status == '') {
                    $data = DB::table('clients')
                        ->join('packages', 'packages.id', '=', 'clients.package_id')
                        ->select('clients.*', 'packages.fee', 'packages.mb')
                        ->where('clients.status', '=', 'yes')
                        ->where('clients.id', '=', $customers_cnic)

                        ->get();
                } elseif ($customers == '' && $customers_cnic  !=  ''  && $customers_contact != '' && $customer_status == '') {
                    $data = DB::table('clients')
                        ->join('packages', 'packages.id', '=', 'clients.package_id')
                        ->select('clients.*', 'packages.fee', 'packages.mb')
                        ->where('clients.status', '=', 'yes')
                        ->where('clients.id', '=', $customers_cnic)
                        ->where('clients.id', '=', $customers_contact)
                        ->get();
                } elseif ($customers == '' && $customers_cnic  !=  ''  && $customers_contact == '' && $customer_status != '') {
                    $data = DB::table('clients')
                        ->join('packages', 'packages.id', '=', 'clients.package_id')
                        ->select('clients.*', 'packages.fee', 'packages.mb')
                        ->where('clients.status', '=', 'yes')
                        ->where('clients.id', '=', $customers_cnic)
                        ->where('clients.var_cust', '=', $customer_status)
                        ->get();
                } elseif ($customers == '' && $customers_cnic  ==  ''  && $customers_contact != '' && $customer_status == '') {
                    $data = DB::table('clients')
                        ->join('packages', 'packages.id', '=', 'clients.package_id')
                        ->select('clients.*', 'packages.fee', 'packages.mb')
                        ->where('clients.status', '=', 'yes')
                        ->where('clients.id', '=', $customers_contact)
                        ->get();
                } elseif ($customers == '' && $customers_cnic  ==  ''  && $customers_contact != '' && $customer_status != '') {
                    $data = DB::table('clients')
                        ->join('packages', 'packages.id', '=', 'clients.package_id')
                        ->select('clients.*', 'packages.fee', 'packages.mb')
                        ->where('clients.status', '=', 'yes')
                        ->where('clients.id', '=', $customers_contact)
                        ->where('clients.var_cust', '=', $customer_status)
                        ->get();
                } elseif ($customers == '' && $customers_cnic  ==  ''  && $customers_contact == '' && $customer_status != '') {
                    $data = DB::table('clients')
                        ->join('packages', 'packages.id', '=', 'clients.package_id')
                        ->select('clients.*', 'packages.fee', 'packages.mb')
                        ->where('clients.status', '=', 'yes')
                        ->where('clients.var_cust', '=', $customer_status)
                        ->get();
                }
            }
            if (Auth::user()->role == 'Manager') {
                if ($customers != '' && $customers_cnic  ==  ''  && $customers_contact == '' && $customer_status == '') {
                    $data = DB::table('clients')
                        ->join('packages', 'packages.id', '=', 'clients.package_id')
                        ->select('clients.*', 'packages.fee', 'packages.mb')
                        ->where('clients.status', '=', 'yes')
                        ->where('clients.id', '=', $customers)
                        ->get();
                } elseif ($customers != '' && $customers_cnic  !=  ''  && $customers_contact == '' && $customer_status == '') {
                    $data = DB::table('clients')
                        ->join('packages', 'packages.id', '=', 'clients.package_id')
                        ->select('clients.*', 'packages.fee', 'packages.mb')
                        ->where('clients.status', '=', 'yes')
                        ->where('clients.id', '=', $customers)
                        ->where('clients.id', '=', $customers_cnic)
                        ->get();
                } elseif ($customers != '' && $customers_cnic  ==  ''  && $customers_contact != '' && $customer_status == '') {
                    $data = DB::table('clients')
                        ->join('packages', 'packages.id', '=', 'clients.package_id')
                        ->select('clients.*', 'packages.fee', 'packages.mb')
                        ->where('clients.status', '=', 'yes')
                        ->where('clients.id', '=', $customers)
                        ->where('clients.id', '=', $customers_contact)
                        ->get();
                } elseif ($customers != '' && $customers_cnic  !=  ''  && $customers_contact != '' && $customer_status == '') {
                    $data = DB::table('clients')
                        ->join('packages', 'packages.id', '=', 'clients.package_id')
                        ->select('clients.*', 'packages.fee', 'packages.mb')
                        ->where('clients.status', '=', 'yes')
                        ->where('clients.id', '=', $customers)
                        ->where('clients.id', '=', $customers_cnic)
                        ->where('clients.id', '=', $customers_contact)
                        ->get();
                } elseif ($customers != '' && $customers_cnic  !=  ''  && $customers_contact != '' && $customer_status != '') {
                    $data = DB::table('clients')
                        ->join('packages', 'packages.id', '=', 'clients.package_id')
                        ->select('clients.*', 'packages.fee', 'packages.mb')
                        ->where('clients.status', '=', 'yes')
                        ->where('clients.id', '=', $customers)
                        ->where('clients.id', '=', $customers_cnic)
                        ->where('clients.id', '=', $customers_contact)
                        ->where('clients.var_cust', '=', $customer_status)
                        ->get();
                } elseif ($customers != '' && $customers_cnic  ==  ''  && $customers_contact == '' && $customer_status != '') {
                    $data = DB::table('clients')
                        ->join('packages', 'packages.id', '=', 'clients.package_id')
                        ->select('clients.*', 'packages.fee', 'packages.mb')
                        ->where('clients.status', '=', 'yes')
                        ->where('clients.id', '=', $customers)

                        ->where('clients.var_cust', '=', $customer_status)
                        ->get();
                } elseif ($customers == '' && $customers_cnic  !=  ''  && $customers_contact == '' && $customer_status == '') {
                    $data = DB::table('clients')
                        ->join('packages', 'packages.id', '=', 'clients.package_id')
                        ->select('clients.*', 'packages.fee', 'packages.mb')
                        ->where('clients.status', '=', 'yes')
                        ->where('clients.id', '=', $customers_cnic)

                        ->get();
                } elseif ($customers == '' && $customers_cnic  !=  ''  && $customers_contact != '' && $customer_status == '') {
                    $data = DB::table('clients')
                        ->join('packages', 'packages.id', '=', 'clients.package_id')
                        ->select('clients.*', 'packages.fee', 'packages.mb')
                        ->where('clients.status', '=', 'yes')
                        ->where('clients.id', '=', $customers_cnic)
                        ->where('clients.id', '=', $customers_contact)
                        ->get();
                } elseif ($customers == '' && $customers_cnic  !=  ''  && $customers_contact == '' && $customer_status != '') {
                    $data = DB::table('clients')
                        ->join('packages', 'packages.id', '=', 'clients.package_id')
                        ->select('clients.*', 'packages.fee', 'packages.mb')
                        ->where('clients.status', '=', 'yes')
                        ->where('clients.id', '=', $customers_cnic)
                        ->where('clients.var_cust', '=', $customer_status)
                        ->get();
                } elseif ($customers == '' && $customers_cnic  ==  ''  && $customers_contact != '' && $customer_status == '') {
                    $data = DB::table('clients')
                        ->join('packages', 'packages.id', '=', 'clients.package_id')
                        ->select('clients.*', 'packages.fee', 'packages.mb')
                        ->where('clients.status', '=', 'yes')
                        ->where('clients.id', '=', $customers_contact)
                        ->get();
                } elseif ($customers == '' && $customers_cnic  ==  ''  && $customers_contact != '' && $customer_status != '') {
                    $data = DB::table('clients')
                        ->join('packages', 'packages.id', '=', 'clients.package_id')
                        ->select('clients.*', 'packages.fee', 'packages.mb')
                        ->where('clients.status', '=', 'yes')
                        ->where('clients.id', '=', $customers_contact)
                        ->where('clients.var_cust', '=', $customer_status)
                        ->get();
                } elseif ($customers == '' && $customers_cnic  ==  ''  && $customers_contact == '' && $customer_status != '') {
                    $data = DB::table('clients')
                        ->join('packages', 'packages.id', '=', 'clients.package_id')
                        ->select('clients.*', 'packages.fee', 'packages.mb')
                        ->where('clients.status', '=', 'yes')
                        ->where('clients.var_cust', '=', $customer_status)
                        ->get();
                }
            }
            return view('reports.client', compact('data'));
        } else {
            return redirect()->back();
        }
    }
    public function customers(Request $request)
    {
        if (Auth::user() && (Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Admin')) {
            $data = '';
            $customers = $request->customerfilter;
            $customers_cnic = $request->cnicfilter;
            $customers_contact = $request->contactfilter;
            $customer_status = $request->statusfilter;
            if ($customers == '' && $customers_cnic  ==  ''  && $customers_contact == '' && $customer_status == '') {
                $data = DB::table('clients')
                    ->where('clients.status', '=', 'yes')
                    ->get();
            } elseif ($customers != '' && $customers_cnic  ==  ''  && $customers_contact == '' && $customer_status == '') {
                $data = DB::table('clients')
                    ->where('clients.status', '=', 'yes')
                    ->where('clients.id', '=', $customers)
                    ->get();
            } elseif ($customers == '' && $customers_cnic  !=  ''  && $customers_contact == '' && $customer_status == '') {
                $data = DB::table('clients')
                    ->where('clients.status', '=', 'yes')
                    ->where('clients.id', '=', $customers_cnic)
                    ->get();
            } elseif ($customers == '' && $customers_cnic  ==  ''  && $customers_contact != '' && $customer_status == '') {
                $data = DB::table('clients')
                    ->where('clients.status', '=', 'yes')
                    ->where('clients.id', '=', $customers_contact)
                    ->get();
            } elseif ($customers == '' && $customers_cnic  ==  ''  && $customers_contact == '' && $customer_status != '') {
                $data = DB::table('clients')
                    ->where('clients.status', '=', 'yes')
                    ->where('clients.var_cust', '=', $customer_status)
                    ->get();
            } elseif ($customers != '' && $customers_cnic  !=  ''  && $customers_contact == '' && $customer_status == '') {
                $data = DB::table('clients')
                    ->where('clients.status', '=', 'yes')
                    ->where('clients.id', '=', $customers)
                    ->where('clients.id', '=', $customers_cnic)
                    ->get();
            } elseif ($customers != '' && $customers_cnic  !=  ''  && $customers_contact != '' && $customer_status == '') {
                $data = DB::table('clients')
                    ->where('clients.status', '=', 'yes')
                    ->where('clients.id', '=', $customers)
                    ->where('clients.id', '=', $customers_cnic)
                    ->where('clients.id', '=', $customers_contact)
                    ->get();
            } elseif ($customers != '' && $customers_cnic  !=  ''  && $customers_contact != '' && $customer_status != '') {
                $data = DB::table('clients')
                    ->where('clients.status', '=', 'yes')
                    ->where('clients.id', '=', $customers)
                    ->where('clients.id', '=', $customers_cnic)
                    ->where('clients.id', '=', $customers_contact)
                    ->where('clients.var_cust', '=', $customer_status)
                    ->get();
            } elseif ($customers != '' && $customers_cnic  ==  ''  && $customers_contact != '' && $customer_status == '') {
                $data = DB::table('clients')
                    ->where('clients.status', '=', 'yes')
                    ->where('clients.id', '=', $customers)
                    ->where('clients.id', '=', $customers_contact)
                    ->get();
            } elseif ($customers != '' && $customers_cnic  ==  ''  && $customers_contact == '' && $customer_status != '') {
                $data = DB::table('clients')
                    ->where('clients.status', '=', 'yes')
                    ->where('clients.id', '=', $customers)
                    ->where('clients.var_cust', '=', $customer_status)
                    ->get();
            } elseif ($customers == '' && $customers_cnic  !=  ''  && $customers_contact != '' && $customer_status == '') {
                $data = DB::table('clients')
                    ->where('clients.status', '=', 'yes')
                    ->where('clients.id', '=', $customers_cnic)
                    ->where('clients.id', '=', $customers_contact)
                    ->get();
            } elseif ($customers == '' && $customers_cnic  !=  ''  && $customers_contact == '' && $customer_status != '') {
                $data = DB::table('clients')
                    ->where('clients.status', '=', 'yes')
                    ->where('clients.id', '=', $customers_cnic)
                    ->where('clients.var_cust', '=', $customer_status)
                    ->get();
            } elseif ($customers == '' && $customers_cnic  ==  ''  && $customers_contact != '' && $customer_status != '') {
                $data = DB::table('clients')
                    ->where('clients.status', '=', 'yes')
                    ->where('clients.id', '=', $customers_contact)
                    ->where('clients.var_cust', '=', $customer_status)
                    ->get();
            } elseif ($customers != '' && $customers_cnic  ==  ''  && $customers_contact != '' && $customer_status != '') {
                $data = DB::table('clients')
                    ->where('clients.status', '=', 'yes')
                    ->where('clients.id', '=', $customers_contact)
                    ->where('clients.id', '=', $customers)
                    ->where('clients.var_cust', '=', $customer_status)
                    ->get();
            } elseif ($customers != '' && $customers_cnic  !=  ''  && $customers_contact == '' && $customer_status != '') {
                $data = DB::table('clients')
                    ->where('clients.status', '=', 'yes')
                    ->where('clients.id', '=', $customers_cnic)
                    ->where('clients.id', '=', $customers)
                    ->where('clients.var_cust', '=', $customer_status)
                    ->get();
            } else {
                $data = DB::table('clients')
                    ->where('clients.status', '=', 'yes')
                    ->get();
            }
            return view('reports.customers', compact('data'));
        }else{
            return redirect()->back();
        }
    }
    public function searchwitharea(Request $request)
    {
        if (Auth::user() && (Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Admin')) {
            $search = $request->areafilter;
            if ($search == '') {

                $data = DB::table('clients')
                    ->where('clients.status', '=', 'yes')
                    ->join('areas', 'areas.id', '=', 'clients.area')
                    ->select('clients.*', 'areas.name as area_name')
                    ->get();
            } elseif ($search != '') {
                $data = DB::table('clients')
                    ->where('clients.status', '=', 'yes')
                    ->where('clients.area', $search)
                    ->join('areas', 'areas.id', '=', 'clients.area')
                    ->select('clients.*', 'areas.name as area_name')
                    ->get();
            }
            return view('reports.searchwitharea', compact('data'));
        }else{
            return redirect()->back();
        }
    }
    public function fee(Request $request)
    {
        if (Auth::user() && (Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Admin')) {
            $agents = '';
            $calls_status = '';
            $customers = $request->customerfilter;
            $customer = client::all();
            $customer_name = '';
            $data = '';
            $mytime = '';
            $mytime1 = '';
            $mytime = Carbon::now()->format('Y-m-d');
            $from = $request->input('date1');
            $to = $request->input('date2');
            if ($to == '') {
                $mytime1 = Carbon::now()->format('Y-m-d');
            } else {
                $mytime1 = $to;
            }
            if ($from == '') {
                $mytime = Carbon::now()->format('Y-m-d');
            } else {
                $mytime = $from;
            }
            $data = DB::table('fees')
                ->where('fees.status', '=', 'yes')
                ->where('fees.date', '=', $mytime)
                ->join('clients', 'clients.id', '=', 'fees.cust_id')
                ->where('clients.status', '=', 'yes')
                ->select('fees.*', 'fees.cust_id', 'clients.name')->whereRaw('fees.id = (SELECT MAX(id) FROM fees where fees.cust_id=clients.id)')
                ->latest('id')->get();

            if ($from != '' && $to != '') {

                if ($customers != '') {
                    $data = DB::table('fees')
                        ->whereDate('fees.date', '>=', $from)
                        ->whereDate('fees.date', '<=', $to)
                        ->where('fees.status', '=', 'yes')
                        ->where('fees.cust_id', $customers)
                        ->join('clients', 'clients.id', '=', 'fees.cust_id')
                        ->select('fees.*', 'fees.cust_id', 'clients.name')->whereRaw('fees.id = (SELECT MAX(id) FROM fees where fees.cust_id=clients.id)')
                        ->latest('id')->get();



                    $customer_name = DB::table('fees')
                        ->whereDate('fees.date', '>=', $from)
                        ->whereDate('fees.date', '<=', $to)
                        ->where('fees.status', '=', 'yes')
                        ->where('fees.cust_id', $customers)
                        ->join('clients', 'clients.id', '=', 'fees.cust_id')
                        ->select('fees.*', 'fees.cust_id', 'clients.name')->first();
                }
            }
            if ($from != '' && $to != '') {
                if ($customers == '') {
                    $data = DB::table('fees')
                        ->whereDate('fees.date', '>=', $from)
                        ->whereDate('fees.date', '<=', $to)
                        ->where('fees.status', '=', 'yes')
                        ->join('clients', 'clients.id', '=', 'fees.cust_id')
                        ->select('fees.*', 'fees.cust_id', 'clients.name')->whereRaw('fees.id = (SELECT MAX(id) FROM fees where fees.cust_id=clients.id)')
                        ->latest('id')->get();
                }
            }
            return view('reports.fees', compact('data', 'mytime', 'mytime1', 'customer', 'customer_name'));
        } else {
            return redirect()->back();
        }
    }
}
