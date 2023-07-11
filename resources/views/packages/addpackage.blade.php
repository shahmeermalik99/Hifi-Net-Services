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
        <h3><u> ADD PACKAGE </u></h3>
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

                                <br>
                                <form class="forms-sample" method="POST" action="{{url('addpackages')}}" enctype="multipart/form-data" id="myform" onsubmit="return myfun()">
                                    @csrf
                                    <div class="form-group">
                                        <label for="" class="required">Package Name</label>
                                        <input class="form-control" type="text" placeholder=" package Name" name="name" id="name" value="{{old('name')}}" oninput="validate(this)"  style="text-transform:uppercase"  required>
                                        @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="required">Fee</label>
                                        <input type="number" class="form-control" id="fee" name="fee" placeholder="Enter Package Fee" required oninput="validate(this)">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="required">Image Upload</label>
                                        <input type="file" class="form-control" id="image" name="image" placeholder="Enter Package Fee" required oninput="validate(this)">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="required">Description</label>
                                        <textarea class="form-control" id="description" name="description" placeholder="Enter Image Description" required oninput="validate(this)" rows="4" cols="146"></textarea>
                                    </div>
                                    <center>
                                        <button type="submit" class="btn btn-sm btn-primary mr-2" id="register">Save</button>
                                        <a href="{{route('packages.packagelist')}}" class="btn btn-sm btn-danger mr-2">back</a>
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

</div>

<!-- script for remove space -->
<script>
  function validate(input){
  if(/^\s/.test(input.value))
    input.value = '';
}
</script>

@endsection
