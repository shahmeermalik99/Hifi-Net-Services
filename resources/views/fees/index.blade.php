@extends('master1')
@section('content')

<br>
<br>
<div class="container1">
    <center>
        <h1><b> HIFI NET SERVICE </b></h1>
        <p>Govt College Satellite Town Gujranwala</p>
        <h3><u> FEE LIST </u></h3>
    </center>
</div>
<div class="container" style="padding-top: 22px">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="sparkline9-list mt-b-30">
            <div class="sparkline9-hd">
                <div class="main-sparkline9-hd">
                    @if (Auth::user()->role == "Super Admin")
                <a href="{{ route('fees.create') }}" type="button" id="button" class="btn btn-primary pb-2" style="float: right;">Add Fee</a>
                @endif
                    @if (Auth::user()->role == "Admin")
                <a href="{{ route('fees.create') }}" type="button" id="button" class="btn btn-primary pb-2" style="float: right;">Add Fee</a>
                @endif
                </div>
                <br>
                <br>
            </div>
            <div class="sparkline9-graph">
                <div class="static-table-list">
                <div class="table-responsive">
                    <table class="table sparkle-table table-responsive  mb-0" id="example">
                        <thead style="padding: 4px;">
                            <tr style="padding: 4px;">
                                <th style="font-size:14px;padding: 4px;">S No.</th>
                                <th style="font-size:14px;padding: 4px;">Client Name </th>
                                <th style="font-size:14px;padding: 4px;">Payable Amount </th>
                                <th style="font-size:14px;padding: 4px;">Paid Amount </th>
                                <th style="font-size:14px;padding: 4px;"> Balance </th>
                                <th style="font-size:14px;padding: 4px;"> Actions </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($fee as $key => $list)
                            <tr style="padding: 1px;">
                                <td style="width: 5%;padding: 1px;">{{ $key + 1 }}</td>
                                <td style="width: 5%;padding: 1px;">{{ $list->name }}</td>
                                <td style="width: 5%;padding: 1px;">{{ $list->payable_balance }}</td>
                                <td style="width: 5%;padding: 1px;">{{ $list->paid_amount }}</td>
                                <td style="width: 5%;padding: 1px;">{{ $list->balance }}</td>
                                <td style="width: 5%;padding: 1px;">
                                <a type="button" href="{{ route('fees.show', $list->id) }}" class="btn btn-warning mx-2 py-2 inline"><i class="bi bi-eye-fill"></i></a>

                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var dataTable = $('#example').dataTable()
</script>

@endsection
