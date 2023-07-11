@extends('master1')
@section('content')
    <br>
    <br>
    <div class="container1">
        <center>
            <h1><b> HIFI NET SERVICES </b></h1>
            <p>Govt College Satellitetown Gujranwala</p>
            <h3><u> RECEIVABLE REPORT </u></h3>
        </center>
    </div>
    <div class="container" style="padding-top: 22px">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="sparkline9-list mt-b-30">
                <div class="sparkline9-hd">
                    <div class="main-sparkline9-hd">
                    </div>
                    <br>
                    <br>
                </div>
                <div class="sparkline9-graph">
                    <div class="static-table-list">
                        <div class="table-responsive">
                            <table class="table sparkle-table table-responsive container1 mb-0" id="example">
                                <thead style="padding: 4px;">
                                    <tr style="padding: 4px;">
                                        <th style="font-size:14px;padding: 4px;">S No.</th>
                                        <th style="font-size:14px;padding: 4px;"> Client Name </th>
                                        <th style="font-size:14px;padding: 4px;"> Alloted Name </th>
                                        <th style="font-size:14px;padding: 4px;"> Contact Number</th>
                                        <th style="font-size:14px;padding: 4px;"> CNIC Number</th>
                                        <th style="font-size:14px;padding: 4px;"> Receivable Amount </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $balance = 0;
                                    @endphp
                                    @foreach ($customer as $key => $list)
                                        @php

                                            $balance += $list->balance;
                                        @endphp
                                        <tr style="padding: 1px;">
                                            <td style="width: 2%;padding: 1px;">{{ $key + 1 }}</td>
                                            <td style="width: 5%;padding: 1px;">{{ $list->name }}</td>

                                            @if ($list->alloted_name == '')
                                                <td style="width: 3%;padding: 1px;">None</td>
                                            @else
                                                <td style="width: 3%;padding: 1px;">{{ $list->alloted_name }}</td>
                                            @endif

                                            <td style="width: 5%;padding: 1px;">{{ $list->contact }}</td>
                                            <td style="width: 5%;padding: 1px;">{{ $list->cnic }}</td>
                                            <td style="width: 5%;padding: 1px;">{{ $list->balance }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>Total</td>
                                        <td>{{ $balance }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <center>
                            <input type="button" id="print" class="btn btn-sm btn-danger" value="Print PDF">
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var dataTable = $('#example').dataTable()
    </script>
@endsection
