<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use Illuminate\Support\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class ExpenseController extends Controller
{
    //
    public function expenselist()
    {
        if (Auth::user() && Auth::user()->role != 'Customer') {
            $expense = Expense::join('categories', 'categories.id', '=', 'cat_id')
                ->select('expenses.*', 'cat_id', 'name')->get();
            return view('expenses.expenselist', compact('expense'));
        } else {
            return redirect()->back();
        }
    }
    public function addexpense()
    {
        if (Auth::user() && Auth::user()->role != 'Customer') {
            $mytime = Carbon::now()->format('Y-m-d');
            $category = Category::all();
            return view('expenses.addexpense', compact('category', 'mytime'));
        } else {
            return redirect()->back();
        }
    }
    public function addexpenses(Request $request)
    {
        if (Auth::user() && Auth::user()->role != 'Customer') {
            $expense =  new Expense();
            $expense->cat_id = $request->cat_id;
            $expense->amount = $request->amount;
            $expense->added_by = $request->added_by;
            $expense->date = $request->date;
            $expense->status = 'yes';
            $expense->save();
            Alert::success('success', 'Expense Added Successfully');
            return redirect()->route('expenses.expenselist');
        } else {
            return redirect()->back();
        }
    }
    public function quickshow($id)
    {
        if (Auth::user() && Auth::user()->role != 'Customer') {
            $expense = Expense::findorfail($id);
            $category = Category::where('id', $expense->cat_id)->first();
            return view('expenses.showexpense', compact('expense', 'category'));
        } else {
            return redirect()->back();
        }
    }
    public function updateshow($id)
    {
        if (Auth::user() && Auth::user()->role != 'Customer') {
            $allcategroy = Category::all();
            $expense = Expense::findorFail($id);
            $category = Category::where('id', $expense->cat_id)->get();
            return view('expenses.editexpense', compact('expense', 'category', 'allcategroy'));
        } else {
            return redirect()->back();
        }
    }
    public function updateexpense(Request $request, $id)
    {
        if (Auth::user() && Auth::user()->role != 'Customer') {
            $expense = Expense::findorFail($id);
            $expense->cat_id = $request->cat_id;
            $expense->amount = $request->amount;
            $expense->added_by = $request->added_by;
            $expense->date = $request->date;
            $expense->status = 'yes';
            $expense->save();
            Alert::success('success', 'Expense Updated Successfully');
            return redirect()->route('expenses.expenselist');
        } else {
            return redirect()->back();
        }
    }
    public function destroy($id)
    {
        if (Auth::user() && Auth::user()->role != 'Customer') {
            $expense = expense::findorFail($id);
            $expense->delete();
            Alert::success('success', 'Expense Deleted Successfully');
            return redirect()->route('expenses.expenselist')->with('info', 'Expense Deleted Successfully!');
        } else {
            return redirect()->back();
        }
    }
}
