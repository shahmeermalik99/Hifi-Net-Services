@extends('master1')
@section('content')
@php
use App\Models\User;
use Illuminate\Support\Facades\Auth;
$id =Auth::user()->id;
$user = User::findorFail($id);
@endphp

<br><br>
<div class="container1">
    <center>
        <h1><b> HIFI NET SERVICES </b></h1>
        <p>Govt College Satelitetown Gujranwala</p>
        <h3><u> RESET PASSWORD </u></h3>
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
                                <form class="forms-sample" method="POST" action="{{route('settings.update' , $user->id)}}" id="myform" onsubmit="return myfun()">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group col-md-12">
                                        <label for="">New Password <span style="color: red">*</span></label>
                                        <input type="password" class="form-control" id="password" name="password" onChange="onChange()" placeholder=" Password" onChange="onChange()" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="">Confirm Password <span style="color: red">*</span></label>
                                        <input class="form-control" type="password" name="confirm" id="confirm" required placeholder="Retype Password" onChange="onChange()" />
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
</div>
    {{-- Password Confirm --}}
 <!-- scripts for confirm password -->
 <script>
    function onChange() {
        const password = document.querySelector('input[name=password]');
        const confirm = document.querySelector('input[name=confirm]');
        if (confirm.value === password.value) {
            confirm.setCustomValidity('');
        } else {
            confirm.setCustomValidity('Passwords do not match');
        }
    }
</script>
@endsection
