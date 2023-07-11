@extends('master1')

@section('content')


<br>
<br>
<div class="container1">
    <center>
        <h1><b> HIFI NET SERVICES </b></h1>
        <p>Govt College Gujranwala</p>
        <h3><u> VERIFIED CLIENT LIST </u></h3>
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
                    <table class="table sparkle-table table-responsive  mb-0" id="example">
                        <thead style="padding: 4px;">
                            <tr style="padding: 4px;">
                                <th style="font-size:14px;padding: 4px;">S No.</th>
                                <th style="font-size:14px;padding: 4px;"> Name </th>
                                <th style="font-size:14px;padding: 4px;"> Phone Number </th>
                                <th style="font-size:14px;padding: 4px;"> CNIC Number</th>
                                <th style="font-size:14px;padding: 4px;"> Customer Status </th>
                                <th style="font-size:14px;padding: 4px;"> Actions </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($client as $key => $list)
                            <tr>
                                <td style="width: 5%">{{ $key + 1 }}</td>
                                <td style="width: 5%">{{ $list->name }}</td>
                                <td style="width: 5%">{{ $list->contact }}</td>
                                <td style="width: 5%">{{ $list->cnic }}</td>
                                <td style="width: 5%">
                                    @if($list->var_cust == 'Approve')
                                    <span class="badge rounded-pill bg-success text-dark" style="background-color: green; color:white; padding:5px 5px;">Verified</span>
                                    @endif
                                </td>
                                <td style="width: 2%">
                                    <a type="button" href="{{url('showverify', $list->id)}}" class="btn btn-warning mx-2 py-2 inline"><i class="bi bi-eye-fill"></i></a>
                                    @endforeach
                                </td>
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
