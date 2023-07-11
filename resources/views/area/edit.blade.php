@extends('master1')
@section('content')
    <br><br>
    <div class="container1">
        <center>
            <h1><b> HIFI NET SERVICES </b></h1>
            <p>Govt College Satelitetown Gujranwala</p>
            <h3><u>UPDATE AREA</u></h3>
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
                                    <form class="forms-sample" action="{{ url('updateareas', $area->id) }}" method="POST"
                                        onsubmit="return myfun()">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div style="float: right;">

                                                    @if ($area->status == 'yes')
                                                        <input type="checkbox" value="yes" checked name="status"
                                                            id="">
                                                    @else
                                                        <input type="checkbox" value="yes" name="status" id="">
                                                    @endif
                                                    <label for="">Active</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label required">Area Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="name" name="name"
                                                    value="{{ $area->name }}" required oninput="validate(this)">
                                                @if ($errors->has('name'))
                                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <center>
                                            <button type="submit" class="btn btn-sm btn-primary mr-2">Update</button>
                                            <a href="{{ route('area.arealist') }}"
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
    <script>
        function validate(input) {
            if (/^\s/.test(input.value))
                input.value = '';
        }
    </script>
@endsection
