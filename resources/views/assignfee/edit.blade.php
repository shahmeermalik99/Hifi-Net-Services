@extends('master')
@section('content')

<br><br><br><br>
<div class="container1">
    <center>
        <h1><b> HIFI NET SERVICE </b></h1>

    </center>
</div>
<div class="container" style="padding-top: 42px">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="sparkline8-list mt-b-30">
            <div class="sparkline8-hd">
                <div class="main-sparkline8-hd">

                </div>
            </div>
            <div class="sparkline8-graph">
                <div class="basic-login-form-ad">

                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                            <div class="basic-login-inner">
                                <h3>Update Year</h3>
                                <br>
                                <form class="forms-sample" action="{{route('assignfee.update', $calender->id)}}" method="POST" onsubmit="return myfun()">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Year Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="year" name="year" value="{{$calender->year}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Month Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="month" name="month" value="{{$calender->month}}">
                            </div>
                        </div>
                        <center>
                            <button type="submit" class="btn btn-sm btn-primary mr-2">Update</button>
                        </center>
                    </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
