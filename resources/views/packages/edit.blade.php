@extends('master1')
@section('content')

<br><br>
<div class="container1">
    <center>
        <h1><b> HIFI NET SERVICES </b></h1>
        <p>Govt College Satelitetown Gujranwala</p>
        <h3><u> UPDATE PACKAGE </u></h3>
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
                                <form class="forms-sample" action="{{url('updatepackages', $package->id)}}"
                                    method="POST"  enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row">
                                        <label for="" class="col-sm-3 col-form-label required">Package Name</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" placeholder="" name="name" id="name"
                                                value="{{$package->name}}" style="text-transform:uppercase" required>
                                            @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-3 col-form-label required">Pacakge Fee</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="fee" name="fee"
                                                value="{{$package->fee}}" required oninput="validate(this)">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-3 col-form-label required">Package Image</label>
                                        <div class="col-sm-7">
                                            <input type="file" class="form-control" id="image" name="image"
                                                value="{{$package->image}}"  oninput="validate(this)">
                                        </div>
                                        <div class="col-sm-2">
                                            <img src="{{asset('uploads/images/'. $package->image)}}" width="100" height="100" alt="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-3 col-form-label required">Package
                                            description</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" id="description" name="description"
                                                placeholder="Enter Image Description" required oninput="validate(this)"
                                                rows="4" cols="146">{{$package->description}}</textarea>
                                        </div>
                                    </div>
                                    <center>

                                        <button type="submit" class="btn btn-sm btn-primary mr-2">Update</button>
                                        <a href="{{route('packages.packagelist')}}"
                                            class="btn btn-sm btn-danger mr-2">back</a>
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


<!-- script for remove space -->
<script>
    function validate(input) {
        if (/^\s/.test(input.value))
            input.value = '';
    }
</script>



@endsection