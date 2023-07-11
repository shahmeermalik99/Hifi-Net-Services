<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    //
    public function categorylist()
    {
        if (Auth::user() && Auth::user()->role != 'Customer') {
        $category = Category::get();
        return view('categories.categorylist', ['category' => $category]);
        }else{
            return redirect()->back();
        }
    }
    public function addcategory()
    {
        if (Auth::user() && Auth::user()->role != 'Customer') {
       return view('categories.addcategory');
        }else{
            return redirect()->back();
        }
    }
    public function addcategories(Request $request)
    {
        $request->validate(
            [

                'name' => 'required|unique:categories,name,',
            ],
            [
                'name.unique' => 'Category already exist',
            ]
        );

        if (Auth::user() && Auth::user()->role != 'Customer') {
        $category = new Category();
        $category->name = $request->name;
        $category->status = 'Yes';
        $category->save();
       Alert::success('Success', 'Category Added Successfully!');
       return redirect()->route('categories.categorylist');
        }else{
            return redirect()->back();
        }
    }
    public function quickshow($id)
    {
        if (Auth::user() && Auth::user()->role != 'Customer') {
        $category = Category::findorfail($id);
        return view('categories.showcategory', compact('category'));
        }else{
            return redirect()->back();
        }
    }
    public function updateshow($id)
    {
        if (Auth::user() && Auth::user()->role != 'Customer') {
        $category = Category::findorfail($id);
        return view('categories.editcategory', compact('category'));
        }else{
            return redirect()->back();
        }
    }
    public function updatecategory(Request $request, $id)
    {
        $request->validate(
            [

                'name' => 'required|unique:categories,name,' . $id,
            ],
            [
                'name.unique' => 'Category already exist' . $id,
            ]
        );
        if (Auth::user() && Auth::user()->role != 'Customer') {
        $category = Category::findorFail($id);
        $category->name = $request->name;
        $category->save();
        Alert::success('Success', 'Category Updated Successfully');
        return redirect()->route('categories.categorylist');
        }else{
            return redirect()->back();
        }
    }
    public function destroy($id)
    {
        if (Auth::user() && Auth::user()->role != 'Customer') {
            $category = Category::findorFail($id);
            $category->delete();
            Alert::success('success', 'Category Deleted Successfully');
            return redirect()->route('categories.categorylist')->with('info', 'Category Deleted Successfully!');
        }else{
            return redirect()->back();
        }

    }
}
