@extends('master1')
@section('content')
    <br><br>
    <div class="container1">
        <center>
            <h1><b> HIFI NET SERVICES </b></h1>
            <p>Govt College Satelitetown Gujranwala</p>
            <h3><u> UPDATE USER </u></h3>
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
                                    <form class="forms-sample" action="{{url('updateusers', $user->id)}}"
                                        method="POST" onsubmit="return myfun()">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label required">Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control  my-field" id="name"
                                                    name="name" value="{{ $user->name }}" required
                                                    oninput="validate(this)">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label ">Father Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control  my-field" id="fname"
                                                    name="fname" value="{{ $user->fname }}" oninput="validate(this)">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputEmail2"
                                                class="col-sm-3 col-form-label required">Email</label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control" id="email" name="email"
                                                    value="{{ $user->email }}"
                                                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{3,4}$" required>
                                                @if ($errors->has('email'))
                                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label required">Contact
                                                Number</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control contact required"
                                                    id="myform_phone" name="contact" max="11" type="tel"
                                                    pattern="^\d{4}-\d{7}$" value="{{ $user->contact }}"
                                                    data-inputmask="'mask': '0399-99999999'" type="number" maxlength="12"
                                                    required>

                                                <span id="error_number">(0300-0000000)</span>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label required">CNIC
                                                Number</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control contact required"
                                                    id="myform_phone" name="cnic" {7}$" value="{{ $user->cnic }}"
                                                    type="tel" pattern="^\d{5}-\d{7}-\d{1}$"
                                                    data-inputmask="'mask': '99999-9999999-9'" placeholder="XXXXX-XXXXXXX-X"
                                                    required>

                                                <span id="error_number"></span>

                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="exampleInputMobile"
                                                class="col-sm-3 col-form-label required">Role</label>

                                            <div class="col-sm-9">
                                                @if ($user->role == 'Super Admin')
                                                    <input type="text" class="form-control" name="role"
                                                        value="Super Admin" placeholder="Super Admin" readonly>
                                                @elseif ($user->role == 'Customer')
                                                <input type="text" class="form-control" name="role"
                                                value="Customer" placeholder="" readonly>
                                                        @else
                                                    <select class=" form-control  col-form-label" name="role" required>
                                                        <option value="Admin"
                                                            @if ($user->role == 'Admin') selected ='selected' @endif>
                                                            Admin</option>
                                                        <option value="Manager"
                                                            @if ($user->role == 'Manager') selected ='selected' @endif>
                                                            Manager</option>
                                                    </select>
                                                @endif



                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputMobile"
                                                class="col-sm-3 col-form-label required">Address</label>
                                            <div class="col-sm-9">
                                                <textarea type="text" class="form-control" id="address" name="address" required oninput="validate(this)">{{ $user->address }}</textarea>
                                            </div>
                                        </div>
                                        <center>
                                            <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                            <a href="{{ route('users.userlist') }}" class="btn btn-sm btn-danger">back</a>
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
