@extends('master1')
@section('content')

<br><br>
<div class="container1">
    <center>
        <h1><b> HIFI NET SERVICES </b></h1>
        <p>Govt College Satelitetown Gujranwala</p>
        <h3><u> SEND MESSAGE </u></h3>
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

                                <form class="forms-sample" method="POST" action="{{ route('daily_updates.send') }}">
                                    @csrf
                                    <div class="form-group col-md-12">
                                        <label for="" class="required">Send Message to All</label>
                                        <textarea type="text" class="form-control" id="message" name="message" value="{{ old('message') }}" placeholder="Leave Message Here" required oninput="validate(this)"></textarea>
                                    </div>
                                    <center>
                                        <button type="submit" class="btn btn-sm btn-primary mr-2" id="">Save</button>
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
@endsection
