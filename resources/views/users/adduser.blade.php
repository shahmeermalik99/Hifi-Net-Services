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
        <h3><u> ADD USER </u></h3>
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
                                <form class="forms-sample" method="POST" action="{{url('addusers')}}"
                                    id="myform">
                                    @csrf
                                    <div class="form-group col-md-12">
                                        <label for="" class="required">Name</label>
                                        <input type="text" autofocus class="form-control my-field" id="name"
                                            name="name" placeholder="Name" value="{{ old('name') }}" required
                                            oninput="validate(this)">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="" class="required">Father Name</label>
                                        <input type="text" autofocus class="form-control my-field" id="fname"
                                            name="fname" placeholder="Father Name" value="{{ old('fname') }}" required
                                            oninput="validate(this)">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="" class="required">Email Address</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Email" value="{{ old('email') }}" required
                                            oninput="validate(this)" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{3,4}$">
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="" class="required">Contact Number</label>
                                        <input type="text" class="form-control contact" id="myform_phone"
                                            name="contact" placeholder="Contact Number" value="{{ old('contact') }}"
                                            max="11" type="tel" pattern="^\d{4}-\d{7}$"
                                            data-inputmask="'mask': '0399-99999999'" type="number" maxlength="12"
                                            required>

                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="" class="required">CNIC Number</label>
                                        <input type="text" class="form-control contact" id="myform_phone_1"
                                            name="cnic" placeholder="Cnic Number" value="{{ old('cnic') }}"
                                            type="tel" pattern="^\d{5}-\d{7}-\d{1}$"
                                            data-inputmask="'mask': '99999-9999999-9'" placeholder="XXXXX-XXXXXXX-X"
                                            required value="{{ old('cnic') }}">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="" class="required">Role</label>
                                        <select class="form-control" value="{{ old('role') }}" id="role"
                                            name="role" required>
                                            <option value="" required>Please Select</option>
                                            <option value="Admin"
                                                @if (old('role') == 'Admin') {{ 'selected' }} @endif>Admin
                                            </option>
                                            <option value="Manager"
                                                @if (old('role') == 'Manager') {{ 'selected' }} @endif>Manager
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="" class="required">Address</label>
                                        <textarea type="text" value="{{ old('address') }}" class="form-control" id="address" name="address"
                                            placeholder="Address" required oninput="validate(this)">{{ old('address') }}</textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="" class="required">Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword4"
                                            name="password" onChange="onChange()" placeholder="Password" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="" class="required">Confirm Password</label>
                                        <input class="form-control" type="password" name="confirm"
                                            onChange="onChange()" required placeholder=" Confirm Password" />
                                    </div>
                                    <center>
                                        <button type="submit" class="btn btn-sm btn-primary"
                                            id="register">save</button>
                                        <a href="{{ route('users.userlist') }}" class="btn btn-sm btn-danger">back</a>
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
    function validate(input) {
        if (/^\s/.test(input.value))
            input.value = '';
    }
</script>
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
