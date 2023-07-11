<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Feedback;
use Illuminate\Support\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class FeedbackController extends Controller
{
    //
    public function index()
    {
        if (Auth::user() && Auth::user()->role != 'Manager') {

            $cust_feedback = Feedback::
            where('status' , '=' , 'yes')
            ->where('cust_id' , '=' , Auth::user()->id)
            ->get();

            $feedback = Feedback::
            join('users' , 'users.id' , '=' , 'feedbacks.cust_id')
            ->where('feedbacks.status' , '=' , 'yes')
            ->select('feedbacks.*', 'users.name')
            ->get();

            return view('feedbacks.index', compact('feedback', 'cust_feedback'));
        }else{
            return redirect()->back();
        }
    }
    public function create()
    {
        if (Auth::user() && Auth::user()->role != 'Manager') {
            $mytime = Carbon::now()->format('Y-m-d');
            return view('feedbacks.create', compact('mytime'));

        }else{
            return redirect()->back();
        }
    }
    public function store(Request $request)
    {
        if (Auth::user() && Auth::user()->role != 'Manager') {
        $feedback = new Feedback();
        $feedback->cust_id = Auth::user()->id;
        $feedback->subject = $request->subject;
        $feedback->message = $request->message;
        $feedback->date = $request->date;
        $feedback->status = 'yes';
        $feedback->save();
        Alert::success('success', 'Message Added Successfully');
        return redirect()->route('feedbacks.index');
        }else{
            return redirect()->back();
        }
    }
    public function edit($id)
    {
        if (Auth::user() && Auth::user()->role != 'Manager') {
            $feedback = Feedback::findorFail($id);
            return view('feedbacks.edit', compact('feedback'));
        }else{
            return redirect()->back();
        }
    }
    public function update(Request $request, $id)
    {
        if (Auth::user() && Auth::user()->role != 'Manager') {

            $feedback = Feedback::findorFail($id);
            $feedback->subject = $request->subject;
            $feedback->message = $request->message;
            $feedback->date = $request->date;
            $feedback->save();
            Alert::success('success', 'Message Updated Successfully');
            return redirect()->route('feedbacks.index');
        }else{
            return redirect()->back();
        }
    }
    public function destroy($id)
    {

        if (Auth::user() && Auth::user()->role != 'Manager') {
            $feedback = Feedback::findorFail($id);
            $feedback->status = 'No';
            $query = $feedback->save();
            if ($query)
            Alert::success('success', 'Message Deleted Successfully');
            return redirect()->back();

        }else{
            return redirect()->back();
        }
    }
}
