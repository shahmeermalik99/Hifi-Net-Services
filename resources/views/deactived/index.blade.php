@extends('master1')
@section('content')

<br>
<br>
<div class="container1">
    <center>
        <h1><b> HIFI NET SERVICES </b></h1>
        <p>Govt College Satellite Town Gujranwala</p>
        <h3><u> DEACTIVE CLIENT LIST </u></h3>
    </center>
</div>
<div class="container" style="padding-top: 22px">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="sparkline9-list mt-b-30">
            <div class="sparkline9-hd">

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
                                    <th style="font-size:14px;padding: 4px;"> Contact Number </th>
                                    <th style="font-size:14px;padding: 4px;"> Cnic Number </th>
                                    <th style="font-size:14px;padding: 4px;"> Date </th>
                                    <th style="font-size:14px;padding: 4px;"> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($client as $key => $list)
                                <tr style="padding: 1px;">
                                    <td style="width: 2%;padding: 1px;">{{ $key + 1 }}</td>
                                    <td style="width: 5%;padding: 1px;" data-orderable="false">{{ $list->name }}</td>
                                    <td style="width: 5%;padding: 1px;" data-orderable="false">{{ $list->contact }}</td>
                                    <td style="width: 5%;padding: 1px;" data-orderable="false">{{ $list->cnic }}</td>
                                    <td style="width: 5%;padding: 1px;" data-orderable="false">{{ $list->date }}</td>
                                    <td style="width: 5%;padding: 1px;">
                                        <form method="POST" action="{{url('destroy6', $list->id)}}" style="display:inline-block">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="btn btn-danger deactivite_confirm" data-toggle="tooltip"  title='Activate'><i class="bi bi-check2"></i></button>
                                        </form>
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
