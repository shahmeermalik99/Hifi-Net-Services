@extends('master1')
@section('content')


<br>
<br>
<div class="container1">
    <center>
        <h1><b> HIFI NET SERVICES </b></h1>
        <p>Govt College Satellite Town Gujranwala</p>
        <h3><u> CONTACT MESSAGES LIST </u></h3>
    </center>
</div>
<div class="container" style="padding-top: 22px">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="sparkline9-list mt-b-30">


            <div class="sparkline9-graph">
                <div class="static-table-list">
                    <div class="table-responsive">
                        <table class="table sparkle-table table-responsive  mb-0" id="example">
                            <thead style="padding: 4px;">
                                <tr style="padding: 4px;">
                                    <th style="font-size:14px;padding: 4px;">SNo.</th>
                                    <th style="font-size:14px;padding: 4px;"> Name </th>
                                    <th style="font-size:14px;padding: 4px;"> Email </th>
                                    <th style="font-size:14px;padding: 4px;"> Contact </th>
                                    <th style="font-size:14px;padding: 4px;"> Message </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contact as $key => $list)
                                <tr style="padding: 1px;">
                                    <td style="width: 5%;padding: 1px;">{{ $key + 1 }}</td>
                                    <td style="width: 5%;padding: 1px;">{{ $list->name }}</td>
                                    <td style="width: 5%;padding: 1px;">{{ $list->email }}</td>
                                    <td style="width: 5%;padding: 1px;">{{ $list->contact }}</td>
                                    <td style="width: 5%;padding: 1px;">{{ $list->message }}</td>
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
