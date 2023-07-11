@extends('master1')
@section('content')

<br><br>
<div class="container1">
    <center>
        <h1><b> HIFI NET SERVICES </b></h1>
        <p>Govt College Satelitetown Gujranwala</p>
        <h3><u>EXPENSE DETAILS</u></h3>
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
                                    <th>Expense Name </th>
                                    <td>{{$category->name}}</td>
                                </tr>
                                <tr>
                                    <th>Amount </th>
                                    <td>{{$expense->amount}}</td>
                                </tr>
                                <tr>
                                    <th>Added By </th>
                                    <td>{{$expense->added_by}}</td>
                                </tr>
                                <tr>
                                    <th>Date </th>
                                    <td>{{$expense->date}}</td>
                                </tr>
                                <th> <a class="btn btn-sm btn-primary" style="float: left;" href="{{route('expenses.expenselist')}}">Back</a> </th>
                                <td> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>


    @endsection
