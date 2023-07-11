@extends('master1')
@section('content')

<br><br>
<div class="container1">
    <center>
        <h1><b> HIFI NET SERVICES </b></h1>
        <p>Govt College Satelitetown Gujranwala</p>
        <h3><u>PACKAGE DETAILS </u></h3>
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
                            <td>{{$package->name}}</td>
                        </tr>
                        <tr>
                            <th> Package Fee </th>
                            <td>{{$package->fee}}</td>
                        </tr>
                        <tr>
                            <th> Package Image </th>
                            <td><img src="{{asset('uploads/images/'. $package->image)}}" class="rounded-circle1" alt=""></td>
                        </tr>
                        <tr>
                            <th> Package Description </th>
                            <td>{{$package->description}}</td>
                        </tr>
                        <tr>
                            <th> <a class="btn btn-primary" href="{{route('packages.packagelist')}}">Back</a>  </th>
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
