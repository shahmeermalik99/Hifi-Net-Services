<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CustomAuthController extends Controller
{
    //
    public function mail(Request $request)
    {
        $data_email = $request->data_email;
        $user_data = User::where('email', $data_email)->first();
        if($user_data && $user_data->password != '') {
            $data = [
                'email' => $user_data->email,
                'password' => $user_data->password,
            ];
            $user['to'] = $data_email;

            Mail::send('users.mail', $data, function ($messages) use ($user) {
                $messages->to($user['to'], 'password');
                $messages->to($user['to'], 'email');
                $messages->subject('Password', $user['to']);
            });

            $new_user = User::where('email', $data_email)->first();
            $new_user->password = $data['password'];
            $new_user->save();
            echo '<h6 class="text-center text-white">Email is Sent!</h6>';
        }
       else if ($user_data) {
            $data = [
                'email' => $user_data->email,
                'password' => Str::random(8),
            ];
            $user['to'] = $data_email;

            Mail::send('users.mail', $data, function ($messages) use ($user) {
                $messages->to($user['to'], 'password');
                $messages->to($user['to'], 'email');
                $messages->subject('Password', $user['to']);
            });

            $new_user = User::where('email', $data_email)->first();
            $new_user->password = $data['password'];
            $new_user->save();
            echo '<h6 class="text-center text-white">Email is Sent!</h6>';
        }

        else if (!$user_data) {
            return response()->json([
                'status' => 404,
            ]);

        }
    }
    public function registeration(Request $request)
    {
        $request->validate(
            [

                'email' => 'required|unique:users,email,',
            ],
            [
                'email.unique' => 'Email already exist',
            ]
        );
        $user = new User;
        $user->name = $request->name;
        $user->fname = $request->fname;
        $user->email = $request->email;
        $user->cnic = $request->cnic;
        $user->contact = $request->contact;
        $user->role = 'Customer';
        $user->address = $request->address;
        $user->save();
        return redirect()->route('login');
    }
}
