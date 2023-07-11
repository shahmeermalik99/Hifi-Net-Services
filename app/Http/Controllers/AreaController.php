<?php

namespace App\Http\Controllers;
use App\Models\Area;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class AreaController extends Controller
{
    //
    public function arealist()
    {
        if (Auth::user() && Auth::user()->role != 'Customer') {
        $area = Area::All();
        return view('area.arealist', ['area' => $area]);
        }
        else{
            return redirect()->back();
        }
    }
    public function addarea()
    {
        if (Auth::user() && Auth::user()->role != 'Customer') {
        return view('area.addarea');
        }
        else{
            return redirect()->back();
        }
    }
    public function addareas(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|unique:areas,name,',
            ],
            [
                'name.unique' => 'Area already exist',
            ]
        );

       if (Auth::user() && Auth::user()->role != 'Customer') {
       $area = new Area();
       $area->name = $request->name;
       $area->status = 'Yes';
       $area->save();
       Alert::success('Success', 'Area Added Successfully!');
       return redirect()->route('area.arealist');
       }
       else{
        return redirect()->back();
       }

    }
    public function quickshow($id)
    {
        $area = Area::findorfail($id);
        return view('area.show', compact('area'));
    }
    public function updateshow($id)
    {
        if (Auth::user() && Auth::user()->role != 'Customer') {
        $area = Area::findorfail($id);
        return view('area.edit', compact('area'));
        }
        else{
            return redirect()->back();
        }
    }
    public function updatearea(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required|unique:areas,name,' . $id,
            ],
            [
                'name.unique' => 'Area already exist',

            ]
        );

        if (Auth::user() && Auth::user()->role != 'Customer') {
        $area = Area::findorFail($id);
        $area->name = $request->name;
        if ($request->status != NULL) {
            $area->status = $request->status;
        } else {
            $area->status = "No";
        }
        $area->save();
        Alert::success('Success', 'Area Updated Successfully');
        return redirect()->route('area.arealist');
    }
    else{
        return redirect()->back();
    }
    }
    public function destroy($id)
    {
        if (Auth::user() && Auth::user()->role != 'Customer') {
            $area = area::findorFail($id);
            $area->status = 'no';
            $area->save();
            Alert::success('success', 'Area Deactivated Successfully. Note: This Area is useable for all prevoius users & Not avaiable for new users');
            return redirect()->route('area.arealist');
        }else{
            return redirect()->back();
        }

    }
}
