<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>HiFi Net Service</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('layouts.admin.head')
</head>

<body>
    <div class="color-line"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <div class="back-link back-backend">
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
            <div class="col-md-6 col-md-6 col-sm-6 col-xs-12">
                <div class="text-center custom-login" style="margin-top: 22px">
                    <!-- <h3>Registration</h3> -->
                    <h3><img src="{{asset('front_end/img/hifi-1.png')}}" width="100" alt=""></h3>
                    <p>Register to Access the login!</p>
                </div>
                <div class="hpanel">
                    <div class="panel-body">
                        <form action="{{ route('registeration') }}" method="post" id="loginForm">
                            @csrf
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label>Username</label>
                                    <input type="text"  required class="form-control" placeholder="Name" name="name" value="{{ old('name') }}">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Father Name</label>
                                    <input type="text" required class="form-control"  placeholder="Father Name" name="fname" value="{{ old('fname') }}">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>CNIC Number</label>
                                    <input type="text" class="form-control" name="cnic" type="tel"
                                        pattern="^\d{5}-\d{7}-\d{1}$" data-inputmask="'mask': '99999-9999999-9'"
                                        placeholder="XXXXX-XXXXXXX-X" required value="{{ old('cnic') }}">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Contact Number</label>
                                    <input type="text" required class="form-control" name="contact"
                                        value="{{ old('contact') }}" max="11" type="tel"
                                        pattern="^\d{4}-\d{7}$" data-inputmask="'mask': '0399-99999999'" placeholder="Contact" type="number"
                                        maxlength="12">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Email Address</label>
                                    <input required type="email" name="email" class="form-control" placeholder="Email" required>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Address</label>
                                    <textarea class="form-control" name="address" required placeholder="Address"></textarea>
                                </div>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-success loginbtn">Register</button>

                            </div>
                        </form>
                        <h6><a href="{{ route('login') }}">Already Register!</a></h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
        </div>
    </div>

    @include('layouts.admin.script')
</body>
 <!-- scripts for cnic marking -->
 <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
 <script>
     $(":input").inputmask();
 </script>
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

</html>
