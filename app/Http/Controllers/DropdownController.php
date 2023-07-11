<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Client;
use App\Models\Account;
use App\Models\Calender;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DropdownController extends Controller
{
    //
    public function clientfee(Request $request)
    {
        $data = Package::where("id", '=', $request->id)->get(["fee", "id"]);
        return response()->json($data);
        // echo  "Ajax Calling Done ";
    }
    public function clientid(Request $request)
    {
        $data= Client::where('status', 'yes')->where('id',$request->id)->orWhere('status', 'yes')->where('name',"LIKE","%".$request->id."%")->orWhere('status', 'yes')->where('contact',"LIKE","%".$request->id."%")->orWhere('status', 'yes')->where('cnic',"LIKE","%".$request->id."%")
        ->first();
        return response()->json($data);
    }
    public function currentpackage(Request $request)
    {
        $id = Client::select('id')->orWhere('id',$request->id)->orWhere('name','LIKE','%'.$request->id.'%')->orWhere('cnic','LIKE','%'.$request->id.'%')->orWhere('contact','LIKE','%'.$request->id.'%')->first();
        $client= client::where('id', $id->id)
        ->latest('id')->first();
        $data['names'] = Package::where('id', $client->package_id)->get(["name" , "mb" , "id"]);
        return response()->json($data);
    }
    public function fetchProductName(Request $request)
    {
        $product = DB::table('clients')
        ->where('clients.status','=','yes')
        ->where('name', 'like', '%' . $request->name . '%')
        ->where('cnic', 'like', '%' . $request->cnic . '%')
        ->where('contact', 'like', '%' . $request->contact . '%')
        ->where('address', 'like', '%' . $request->address . '%')
        ->select('clients.*','clients.id')->get();
        return response()->json($product);
    }
    public function fetchExpenseName(Request $request)
    {
        $product = DB::table('categories')
        ->where('categories.status','=','yes')
        ->where('name', 'like', '%' . $request->name . '%')
        ->select('categories.*','categories.id')->get();
        return response()->json($product);
    }
    public function fetchProductContact(Request $request)
    {
        $product = DB::table('clients')
        ->where('clients.status','=','yes')
        ->where('contact', 'like', '%' . $request->contact . '%')
        ->select('clients.contact' , 'clients.id')->get();
        return response()->json($product);
    }
    public function fetchProductCnic(Request $request)
    {
        $product = DB::table('clients')
        ->where('clients.status','=','yes')
        ->where('cnic', 'like', '%' . $request->cnic . '%')
        ->select('clients.cnic' , 'clients.id')->get();
        return response()->json($product);
    }
    public function productarea(Request $request)
    {
        $product = DB::table('areas')
        ->where('areas.status','=','yes')

        ->select('areas.*' , 'name' )->get();
        return response()->json($product);
    }
    public function clientname(Request $request)
    {
        $data= Client::where('id', $request->id)
        ->first();
        return response()->json($data);
    }
    public function clientcontact(Request $request)
    {
        $data= client::where('id', $request->id)
        ->first();
        return response()->json($data);
    }
    public function fetchContact(Request $request)
    {
        $data['contacts'] = client::where('id', $request->id)->get(["contact", "id"]);
        return response()->json($data);
    }
    public function packagename(Request $request)
    {
        $data['names'] = client::where('id', $request->id)->get(["package_fee", "id"]);
        return response()->json($data);
    }
    public function fetchName(Request $request)
    // SELECT * FROM `packages` JOIN clients WHERE clients.package_id = packages.id;
    {
        $package = client::where('id', $request->id)->first();
        $data['names'] = package::where('id', $package->package_id)->get(["name", "mb", "id"]);
        return response()->json($data);
    }
    public function fetchfees(Request $request)
    {
        $client = client::where('id', $request->id)->first();
        $data['fees'] = account::where('customer_id', $client->id)->get(["payable_amount" ,"id"]);
        return response()->json($data);
    }
    public function fetchPreBalance(Request $request)
    {
        $package = client::where('id', $request->id)->first();
        $data['fees'] = account::where('customer_id', $package->id)->get(["pre_balance"]);
        return response()->json($data);
    }
    public function fetcholdBalance(Request $request)
    {
        $package = client::where('id', $request->id)->first();
        $data['fees'] = account::where('customer_id', $package->id)->get(["balance"]);
        return response()->json($data);
    }
    public function fetchbalance(Request $request)
    {
        $package = client::where('id', $request->id)->first();
        $data['fees'] = account::where('customer_id', $package->id)->get(["balance"]);
        return response()->json($data);
    }
    public function pre_paid(Request $request)
    {
        $client = client::where('id', $request->id)->first();
        $data['fees'] = account::where('customer_id', $client->id)->get(["paid_amount"]);
        return response()->json($data);
    }
    public function fetchCnic(Request $request)
    {
        $data['cnics'] = client::where('id', $request->id)->get(["cnic", "id"]);
        return response()->json($data);
    }
    public function fee_data(Request $request)
    {
        $year =  DB::table('calenders')
            ->distinct()
            ->where('status','=','yes')
            ->select('year')
            ->get();

        return response()->json($year);
    }
    public function fee_add(Request $request)
    {

        $cal = calender::where('year', '=', $request->year_name)->where('status','=','yes')->first();
        if (!$cal) {
            $month = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
            $mytime = Carbon::now()->format('Y-m-d');
            for ($i = 0; $i < count($month); $i++) {
                $calender = new calender;
                $calender->month = $month[$i];
                $calender->year = $request->year_name;
                $calender->date = $mytime;
                $calender->save();
            }

            return response()->json([
                'status' => 200,
            ]);
        } else {
            return response()->json([
                'status' => 400,

            ]);
        }
    }
}
