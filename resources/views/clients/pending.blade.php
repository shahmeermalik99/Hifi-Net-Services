@extends('master1')
@section('content')

<br>
<br>
<div class="container1">
    <center>
        <h1><b> HIFI NET SERVICES </b></h1>
        <p>Govt College Satellite Town Gujranwala</p>
        <h3><u> NEW CONNECTION REQUEST LIST </u></h3>
    </center>
</div>
<div class="container" style="padding-top: 22px">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="sparkline9-list mt-b-30">
            <div class="sparkline9-hd">
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
                                <th style="font-size:14px;padding: 4px;"> Address </th>
                                <th style="font-size:14px;padding: 4px;padding-left:42px"> Actions </th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($client as $key => $list)
                            <tr style="padding: 1px;">
                                <td style="width: 2%;padding: 1px;">{{ $key + 1 }}</td>
                                <td style="width: 5%;padding: 1px;">{{ $list->name }}</td>
                                <td style="width: 5%;padding: 1px;">{{ $list->contact }}</td>
                                <td style="width: 5%;padding: 1px;">{{ $list->cnic }}</td>
                                <td style="width: 5%;padding: 1px;">{{ $list->address }}</td>
                                <td style="width: 5%;padding: 1px;">
                                    <a type="button" href="{{url('showclient', $list->id)}}"
                                        class="btn btn-warning mx-2 py-2 inline"><i class="bi bi-eye-fill"></i></a>
                                        <form method="POST" action="{{ route('clients.approve_conn', $list->id) }}" style="display:inline-block">
                                            @csrf
                                            <input name="_method" type="hidden" >
                                            <button type="submit" class="btn btn-danger deactivite_confirm" data-toggle="tooltip"  title='Activate Connection'><i class="bi bi-check2"></i></button>
                                        </form>
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
<script type="text/javascript">
$(document).ready(function() {
    var client = ["Non Verified", "Verified"];
    $("#client").select2({
        data: client
    });
});
</script>
@endsection
