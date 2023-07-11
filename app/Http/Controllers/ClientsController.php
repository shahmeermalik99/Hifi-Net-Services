<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use App\Models\Package;
use App\Models\Area;
use App\Models\Account;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class ClientsController extends Controller
{
    //
    public function clientlist()
    {
        if (Auth::user() &&  (Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Admin')) {
            $client = client::where('status', '!=', 'deactive')
                ->where('var_cust', '!=', 'Conn_Req')
                ->get();
            return view('clients.clientlist', compact('client'));
        } else {
            return redirect()->back();
        }
    }
    public function create(Request $request)
    {
        if (Auth::user()  && Auth::user()->role != 'Customer') {
            $area = area::where('status', '=', 'yes')->get();
            $package = package::where('status', '=', 'yes')->get();
            return view('clients.addclient', compact('package', 'area'));
        } else {
            return redirect()->back();
        }
    }
    public function addclient(Request $request)
    {
        $request->validate(
            [

                'alloted_name' => 'nullable|unique:clients,alloted_name,',
                'email' => 'nullable|unique:clients,email,',
                'contact' => 'required|unique:clients,contact,',
                'cnic' => 'required|unique:clients,cnic,',
            ],
            [

                'alloted_name.unique' => 'PPPOE User Name already exist',
                'email.unique' => 'Email already exist',
                'contact.unique' => 'Phone Number already exist',
                'cnic.unique' => 'Cnic already exist',
            ]
        );
        if (Auth::user() && Auth::user()->role != 'Customer') {
            $fee = $request->total_payable;
            $fee1 = $request->paid_amount;
            $fee3 = $request->balance;
            $contact = $request->contact;
            $client = new Client;
            $client->name = $request->name;
            $client->f_name = $request->f_name;
            $client->alloted_name = $request->alloted_name;
            $client->contact = $request->contact;
            $client->whatsup_num = $request->whatsup_num;
            $client->email = $request->email;
            $client->latitude = $request->latitude;
            $client->longitude = $request->longitude;
            if ($request->var_cust != NULL) {
                $client->var_cust = $request->var_cust;
            } else {
                $client->var_cust = "Approved";
            }

            $client->date = $request->date;
            $client->connection_fee = $request->connection_fee;
            $client->discount = $request->discount;
            $client->package_fee = $request->package_fee;
            $client->total_payable = $request->total_payable;
            $client->area = $request->area;
            $client->package_id = $request->package_id;
            $client->cnic = $request->cnic;
            $client->address = $request->address;
            $client->save();

            $client = client::where('contact', '=', $contact)->first();
            $account = new account();
            $account->customer_id = $client->id;
            $account->payment_type = 'New Connection';
            $account->month = Carbon::now()->month;
            $account->year = Carbon::now()->year;
            $account->con_status = 'New Connection';
            $account->payable_amount = $fee;
            if ($fee1 == Null) {
                $account->paid_amount = '0';
            } else {
                $account->paid_amount = $fee1;
            }
            $account->balance = $fee3;
            $account->pre_balance = 0;
            $account->date =  $client->date;
            $account->save();

            $user = new User();
            $user->name =  $client->name;
            $user->fname = $request->f_name;
            $user->contact =   $client->contact;
            $user->cnic =  $client->cnic;
            $user->email =  $client->email;
            $user->role =  'Customer';
            $user->address =   $client->address;
            $user->auth_id =   $client->id;
            $user->password =  $request->password;
            $user->save();

            // Send Mail to Customers
            $data = [
                'email' => $client->email,
            ];
            $user['to'] = $client->email;
            Mail::send('clients.req_mail', $data, function ($messages) use ($user) {
                $messages->to($user['to'], 'email');
                $messages->subject('New Internet Connection', $user['to']);
            });


            Alert::success('success', 'Client Added Successfully');

            return redirect()->route('clients.clientlist');
        } else {
            return redirect()->back();
        }
    }
    public function quickshow($id)
    {
        if (Auth::user() &&  (Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Admin')) {
            $client = client::findorfail($id);
            $area = Area::where('id', $client->area)->first();
            $account = Account::where('customer_id', $client->id)->first();
            $package = Package::where('id', $client->package_id)->first();
            return view('clients.showclient', compact('client', 'package', 'account', 'area'));
        } else {
            return redirect()->back();
        }
    }
    public function updateshow($id)
    {
        if (Auth::user()  &&  (Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Admin')) {
            $var = Area::all();
            $client = Client::findorFail($id);
            $package = Package::where('id', $client->package_id)->first();
            $area = Area::where('id', $client->area)->first();
            $account = Account::where('customer_id', $client->id)->first();
            return view('clients.editclient', compact('client', 'package', 'account', 'area', 'var'));
        } else {
            return redirect()->back();
        }
    }
    public function updateclient(Request $request, $id)
    {
        $request->validate(
            [
                'email' => 'nullable|email|unique:clients,email,' . $id,
                'alloted_name' => 'nullable|unique:clients,alloted_name,' . $id,
                'contact' => 'required|unique:clients,contact,' . $id,
                'cnic' => 'required|unique:clients,cnic,' . $id,
            ],
            [
                'email.unique' => 'Email already exist',
                'alloted_name.unique' => 'PPPOE User Name already exist',
                'contact.unique' => 'Phone Number already exist',
                'cnic.unique' => 'Cnic already exist',

            ]
        );
        if (Auth::user() &&  (Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Admin')) {
            $email = $request->email;
            $fee = $request->total_payable;
            $fee1 = $request->paid_amount;
            $fee3 = $request->balance;
            $fee4 = $request->additional_expense;
            $package = Package::where('id', '=', $fee)->first('fee');
            $client = Client::findorFail($id);
            $client->name = $request->name;
            $client->f_name = $request->f_name;
            $client->alloted_name = $request->alloted_name;
            $client->contact = $request->contact;
            $client->whatsup_num = $request->whatsup_num;
            $client->area = $request->area;
            $client->email =  $email;
            $client->latitude = $request->latitude;
            $client->longitude = $request->longitude;
            $client->cnic = $request->cnic;
            if ($request->var_cust != NULL) {
                $client->var_cust = $request->var_cust;
            } else {
                $client->var_cust = "Approved";
            }
            $client->address = $request->address;
            $client->save();
            // if ($email) {
            //     $user = User::where('auth_id', '=', $client->id)->first();
            //     $user->name =  $client->alloted_name;
            //     $user->email =  $client->email;
            //     $user->save();
            // }
            Alert::success('success', 'Client Updated Successfully');
            return redirect()->route('clients.clientlist');
        } else {
            return redirect()->back();
        }
    }
    public function destroy($id)
    {
        if (Auth::user() &&  (Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Admin')) {
        $client = client::findorFail($id);
        $client->status = 'deactive';
        $account = Account::where('customer_id', $client->id)->first();
        if ($account) {
            $account->status = 'deactive';
            $account->save();
        }
        // Send Mail For Deactivation to customer

        $data = [
            'email' => $client->email,
        ];
        $user['to'] = $client->email;

        Mail::send('clients.mail', $data, function ($messages) use ($user) {
            $messages->to($user['to'], 'email');
            $messages->subject('Connection Deactivation', $user['to']);
        });
        $query = $client->save();
        Alert::success('success', 'Client Deactivate Successfully');
        if ($query)
            return redirect()->route('clients.clientlist');
            else {
                return redirect()->back();
            }
    }
}

    public function userreq()
    {
        if (Auth::user()  && Auth::user()->role == 'Customer') {

            $area = Area::where('status', '=', 'yes')->get();
            $package = Package::where('status', '=', 'yes')->get();
            return view('clients.new_conn_req', compact('area', 'package'));
        } else {
            return redirect()->back();
        }
    }
    public function storereq(Request $request)
    {


        $fee = $request->total_payable;
        $fee3 = $request->balance;
        $client = new client;
        $client->name = $request->name;
        $client->f_name = $request->fname;
        $client->user_id = Auth::user()->id;
        $client->alloted_name = $request->alloted_name;
        $client->contact = $request->contact;
        $client->whatsup_num = $request->whatsup_num;
        $client->email = $request->email;
        $client->latitude = $request->latitude;
        $client->longitude = $request->longitude;
        $client->var_cust = "Conn_Req";
        $client->date = $request->date;
        $client->connection_fee = $request->connection_fee;
        $client->package_fee = $request->package_fee;
        $client->total_payable = $request->total_payable;
        $client->area = $request->area;
        $client->package_id = $request->package_id;
        $client->cnic = $request->cnic;
        $client->address = $request->address;
        $client->save();

        Alert::success('success', 'Request for New Connection Added Successfully');
        return redirect()->back();
    }
    public function allreq(Request $request)
    {
        if (Auth::user() && (Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Admin')) {
            $client = client::where('var_cust', '=', 'Conn_Req')
                ->get();
            return view('clients.pending', compact('client'));
        } else {
            return redirect()->back();
        }
    }
    public function appconn($id)
    {
        if (Auth::user()) {
            $client = client::find($id);
            $client->var_cust = "Approved";
            $client->save();
            $user = User::where('email', '=', $client->email)->first();
            $user->auth_id = $client->id;
            $user->save();
            $account = new account();
            $account->customer_id = $client->id;
            $account->payment_type = 'New Connection';
            $account->month = Carbon::now()->month;
            $account->year = Carbon::now()->year;
            $account->con_status = 'New Connection';
            $account->payable_amount = $client->total_payable;
            $account->balance = $client->total_payable;
            $account->pre_balance = 0;
            $account->date =  $client->date;
            $account->save();

            // Send Mail to Customers
            $data = [
                'email' => $client->email,
            ];
            $user['to'] = $client->email;
            Mail::send('clients.req_mail', $data, function ($messages) use ($user) {
                $messages->to($user['to'], 'email');
                $messages->subject('New Internet Connection', $user['to']);
            });

            Alert::success('success', 'New Connection Added Successfully');
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
}
