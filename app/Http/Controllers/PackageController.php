<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use File;

class PackageController extends Controller
{
    //
    public function packagelist()
    {
        if (Auth::user() && Auth::user()->role != 'Customer') {
        $package = Package::get();
        return view('packages.packagelist', ['package' => $package]);
        }
        else{
            return redirect()->back();
        }
    }
    public function addpackage()
    {
        if (Auth::user() && Auth::user()->role != 'Customer') {
        return view('packages.addpackage');
        }
        else{
            return redirect()->back();
        }
    }
    public function addpackages(Request $request)
    {
        $request->validate(
            [

                'name' => 'required|unique:packages,name,',
            ],
            [

                'name.unique' => 'Package already  Exist',
            ]
        );
        // return $request;
        $name  = $request->name;
        $package = new Package();
        $package->name = trim(strtoupper($name));
        $package->fee = $request->fee;
        $package->mb = "Null";
            $package->status = "Yes";
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/images/', $filename);
            $package->image = $filename;
        }
        $package->description = $request->description;
        $package->status = 'Yes';
        $package->save();
        Alert::success('Success', 'Package Added Successfully!');
        return redirect()->route('packages.packagelist');
    }
    public function quickshow($id)
    {
        if (Auth::user() && Auth::user()->role != 'Customer') {
        $package = Package::findorfail($id);
        return view('packages.show', compact('package'));
        }
        else{
            return redirect()->back();
        }
    }
    public function updateshow($id)
    {
        if (Auth::user() && Auth::user()->role != 'Customer') {
        $package = Package::findorfail($id);
        return view('packages.edit', compact('package'));
        }
        else{
            return redirect()->back();
        }
    }
    public function updatepackage(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required|unique:packages,name,' . $id,
            ],
            [
                'name.unique' => 'Package already exist',
            ]
        );

        if (Auth::user() && Auth::user()->role != 'Customer') {
        $package = Package::findorFail($id);
        $package->name = $request->name;
        $package->fee = $request->fee;
        $package->mb = "";
        if ($request->status != NULL) {
            $package->status = $request->status;
        } else {
            $package->status = "No";
        }
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/images/', $filename);
            $package->image = $filename;
        }
        $package->description = $request->description;
        $package->save();
        Alert::success('Success', 'Package Updated Successfully');
        return redirect()->route('packages.packagelist');
    }
    else{
        return redirect()->back();
    }
    }
    public function destroy($id)
    {
        if (Auth::user() && Auth::user()->role != 'Customer') {
            $package = Package::findorFail($id);
            $image = $package->image;
            $image_path = "uploads/images/".$image;

            if (File::exists($image_path)) {
                File::delete($image_path);
                // unlink($image_path);
            }
            $package->status = 'No';
            $package->save();
            Alert::success('success', 'Package Deactivated Successfully. Note: This package is useable for all prevoius users & Not avaiable for new users');
            return redirect()->route('packages.packagelist');
        } else {
            return redirect()->back();
        }
    }
}
