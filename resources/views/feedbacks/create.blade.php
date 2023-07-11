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
        <p>Govt College Satellitetown Gujranwala</p>
        <h3><u> ADD FEEDBACK </u></h3>
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

                                <form class="forms-sample" method="POST" action="{{ route('feedbacks.store') }}">
                                    @csrf
                                    <div class="form-group col-md-12">
                                        <label for="" class="required">Title</label>
                                        <input type="text" class="form-control" id="subject" name="subject" value="{{ old('subject') }}" placeholder="Title Name" required oninput="validate(this)">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="">Date</label>
                                        <input value="{{ $mytime}}" name="date" type="date"
                                        class="form-control" id="" />
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="" class="required">Message</label>
                                        <textarea type="text" class="form-control" id="message" name="message" value="{{ old('message') }}" placeholder="Ellaborate your Concern" required></textarea>
                                    </div>
                                    <center>
                                        <button type="submit" class="btn btn-sm btn-primary mr-2" id="">Save</button>
                                        {{-- <a href="{{route('areas.index')}}" class="btn btn-sm btn-danger mr-2">back</a> --}}
                                    </center>

                                    {{ csrf_field() }}
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
  function validate(input){
  if(/^\s/.test(input.value))
    input.value = '';
}
</script>
<script>
    $(function() {
        var dtToday = new Date();

        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if (month < 10)
            month = '0' + month.toString();
        if (day < 10)
            day = '0' + day.toString();

        var maxDate = year + '-' + month + '-' + day;
        // alert(maxDate);
        $('#date').attr('max', maxDate);
    });
</script>
@endsection
