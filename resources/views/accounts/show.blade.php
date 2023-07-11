@extends('master1')
@section('content')

<br><br>
<div class="container1">
    <center>
        <h1><b> HIFI NET SERVICES </b></h1>
        <p>Govt College Satelitetown Gujranwala</p>
        <h3><u> ACCOUNT DETAILS </u></h3>
    </center>
</div>
<div class="container" style="padding-top: 22px">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="sparkline9-list mt-b-30">


            <div class="sparkline9-graph container1">
                <div class="static-table-list">
                    <div class="basic-login-inner">
                        <h3>Customer Details</h3>
                        <br>
                        <table class="table table-bordered-less py-4">
                            <thead>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Client Name </th>
                                    <td>{{$client->name}}</td>
                                </tr>
                                @if ($client->alloted_name)
                                <tr>
                                    <th>PPPOE (Alloted User Name) </th>
                                    <td>{{$client->alloted_name}}</td>
                                </tr>
                                @endif
                                <tr>
                                    <th>CNIC </th>
                                    <td>{{$client->cnic}}</td>
                                </tr>
                                <tr>
                                    <th>Contact </th>
                                    <td>{{$client->contact}}</td>
                                </tr>
                                <tr>
                                    <th>Address </th>
                                    <td>{{$client->address}}</td>
                                </tr>
                                <tr>
                                    <th>Package Name </th>
                                    <td>{{$package->name}}</td>
                                </tr>
                                <tr>
                                    <th>Package fee </th>
                                    <td>{{$client->package_fee}}</td>
                                </tr>
                                <tr>
                                    <th>Connection fee </th>
                                    <td>{{$client->connection_fee}}</td>
                                </tr>
                                <tr>
                                    <th>Discount </th>
                                    <td>{{$client->discount}}</td>
                                </tr>
                                <tr>
                                    <th>Connection Date </th>
                                    <td>{{$client->date}}</td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>

                        <h3>Account Details</h3>
                        <br>
                        <table class="table table-bordered-less py-4">
                            <thead style="padding: 4px;">
                                <tr style="padding: 4px;">
                                    <th style="font-size:14px;padding: 4px;">SNo.</th>
                                    <th style="font-size:14px;padding: 4px;">Type</th>
                                    <th style="font-size:14px;padding: 4px;"> Payable Amount </th>
                                    <th style="font-size:14px;padding: 4px;"> Paid Amount </th>
                                    <th style="font-size:14px;padding: 4px;"> Balance </th>
                                    <th style="font-size:14px;padding: 4px;"> Date </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $balance = 0;
                                @endphp

                                @if ($account)
                                @foreach ($account as $key => $list)

                                @php
                                $balance += $list->balance;
                                @endphp
                                <tr>
                                    <td style="width: 3%">{{ $key + 1 }}</td>

                                    <td style="width: 5%">{{ $list->payment_type }}</td>
                                    <td style="width: 5%">{{ $list->payable_amount }}</td>
                                    <td style="width: 5%">{{ $list->paid_amount }}</td>
                                    <td style="width: 5%">{{ $list->balance }}</td>
                                    <td style="width: 5%">{{ $list->date }}</td>

                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                            <tfoot>
                                <tr>

                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Net Balance </td>
                                    <td>{{$list->balance}}</td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>
            <center>
                <input type="button" id="print" class="btn btn-sm btn-danger" value="Print PDF">
            </center>
        </div>
    </div>


    @endsection
