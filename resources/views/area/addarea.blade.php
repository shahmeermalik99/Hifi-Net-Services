@extends('master1')

@section('content')
<style>
    .required:after {
        content: " *";
        color: red;
    }
</style>
<br><br>
<div class="container1">
    <center>
        <h1><b> HIFI NET SERVICES </b></h1>
        <p>Govt College Satelitetown Gujranwala</p>
        <h3 style="margin-bottom: 30px;"><u> ADD AREA </u></h3>
    </center>
     <!-- <center>
        @if(session('status'))
        <span class="alert alert-success">{{session('status')}}</span>
        @endif
     </center> -->
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

                                <form class="forms-sample" method="POST" action="{{url('addareas')}}">
                                    @csrf
                                    <div class="form-group col-md-12">
                                        <label for="" class="required">Area Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value=""
                                            placeholder="Area Name" required oninput="validate(this)">
                                    </div>
                                    <center>
                                        <button type="submit" class="btn btn-sm btn-primary mr-2" id="">Save</button>
                                        <a href="{{route('area.arealist')}}" class="btn btn-sm btn-danger mr-2">back</a>
                                    </center>

                                    <!-- {{ csrf_field() }} -->
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- script for remove space -->
<script>
    function validate(input) {
        if (/^\s/.test(input.value))
            input.value = '';
    }
</script>
@endsection