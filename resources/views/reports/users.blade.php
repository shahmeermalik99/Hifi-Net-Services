@extends('master1')
@section('content')
    <br>
    <br>
    <div class="container1">
        <center>
            <h1><b> HIFI NET SERVICES </b></h1>
            <p>Govt College Satelitetown Gujranwala</p>
            <h3><u> USER REPORT </u></h3>
        </center>
    </div>
    <div class="container" style="padding-top: 22px">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="sparkline9-list mt-b-30">

                <div class="sparkline9-hd">
                    <div class="main-sparkline9-hd">
                        <form action="{{ route('reports.users') }}" method="get">
                            @csrf
                            <br>
                            <div class="col-md-3">
                                <label>User Name</label>
                                <select list="browsers" name="customerfilter" class="form-control js-example-basic-single">
                                    <option value="">Select User</option>
                                    @if ($customer)
                                        @foreach ($customer as $key => $list)
                                            <option value="{{ $list->id }}">{{ $list->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label>User Role</label>
                                <select list="browsers" name="filter" class="form-control js-example-basic-single">
                                    <option value="">Please Role</option>
                                    <option value="Super Admin">Super Admin</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Manager">Manager</option>
                                    <option value="Customer">Customer</option>
                                </select>
                            </div>
                            <br>
                            <span class="input-group-btn mx-2">
                                <button type="submit" style="margin-top:5%;margin-top:5px" value="Search" class="btn-sm btn btn-sm btn-danger"><i class="fa-solid fa-magnifying-glass"></i></button>
                                <a href="{{ route('reports.users') }}" type="button" style="margin-top:5%;margin-top:5px;margin-left:4px" value="" class="btn-sm btn btn-sm btn-warning"><i class="bi bi-arrow-clockwise"></i></a>
                            </span>
                            <br>
                        </form>
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
                                        <th style="font-size:14px;padding: 4px;"> Name </th>
                                        <th style="font-size:14px;padding: 4px;"> Contact </th>
                                        <th style="font-size:14px;padding: 4px;"> Role </th>
                                        <th style="font-size:14px;padding: 4px;"> Address </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($data)
                                        @foreach ($data as $key => $list)
                                            <tr style="padding: 1px;">
                                                <td style="width: 2%;padding: 1px;">{{ $key + 1 }}</td>
                                                <td style="width: 5%;padding: 1px;">{{ $list->name }}</td>
                                                <td style="width: 5%;padding: 1px;">{{ $list->contact }}</td>
                                                <td style="width: 5%;padding: 1px;">{{ $list->role }}</td>
                                                <td style="width: 5%;padding: 1px;">{{ $list->address }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
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
