@php
use App\Models\User;
use App\Models\account;
use Illuminate\Support\Facades\Auth;
$id = Auth::user()->id;
$user = User::findorFail($id);
$user_account = account::where('customer_id', '=', Auth::user()->auth_id)->first();
@endphp
@extends('master1')
@section('content')
<br>
<br>
<div class="container1">
    <center>
        <h1><b> HIFI NET SERVICES </b></h1>
        <p>Govt College Satelitetown Gujranwala</p>
        <h3><u> USER DETAILS</u></h3>
    </center>
</div>
<div class="container" style="padding-top: 22px">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="sparkline9-list mt-b-30">
            <div class="sparkline9-graph">
                <div class="static-table-list">
                    <div class="basic-login-inner">
                        <br>
                        <table class="table table-bordered-less py-4">
                            <thead>
                            </thead>
                            <tbody>
                                <tr>
                                    <th> Name </th>
                                    <td>{{$user->name}}</td>
                                </tr>

                                @if ($user->fname == '')
                                <tr>
                                    <th>Father Name </th>
                                    <td>None</td>
                                </tr>
                                @endif
                                @if ($user->fname)

                                <tr>
                                    <th>Father Name </th>
                                    <td>{{$user->fname}}</td>
                                </tr>
                                @endif
                                <tr>
                                    <th> Email </th>
                                    <td>{{$user->email}}</td>
                                </tr>
                                <tr>
                                    <th> Contact Number</th>
                                    <td>{{$user->contact}}</td>
                                </tr>
                                <tr>
                                    <th> CNIC Number</th>
                                    <td>{{$user->cnic}}</td>
                                </tr>
                                <tr>
                                    <th> Role</th>
                                    <td>{{$user->role}}</td>
                                </tr>
                                <tr>
                                    <th> Address</th>
                                    <td>{{$user->address}}</td>
                                </tr>
                                <tr>
                                    @if (Auth::user()->role == 'Customer')
                                    <th> <a class="btn btn-sm btn-primary" style="float: left;" href="{{route('dashboard')}}">Back</a> </th>
                                    @endif
                                    @if (Auth::user()->role == 'Super Admin')
                                    <th> <a class="btn btn-sm btn-primary" style="float: left;" href="{{route('users.userlist')}}">Back</a></th>
                                    @endif
                                    @if (Auth::user()->role == 'Admin')
                                    <th> <a class="btn btn-sm btn-primary" style="float: left;" href="{{route('users.userlist')}}">Back</a></th>
                                    @endif
                                    @if (Auth::user()->role == 'Manager')
                                    <th> <a class="btn btn-sm btn-primary" style="float: left;" href="{{route('users.userlist')}}">Back</a></th>
                                    @endif
                                    <td> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var dataTable = $('#example').dataTable()
    </script>

    @endsection
