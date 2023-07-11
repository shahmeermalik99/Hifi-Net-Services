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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="back-link back-backend">
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
            <div class="col-md-4 col-md-4 col-sm-4 col-xs-12">
                <div class="text-center m-b-md custom-login" style="margin-top: 22px">
                    {{-- <h3>HiFi Net Service</h3> --}}
                    <h3><img src="{{asset('front_end/img/hifi-1.png')}}" width="100" alt=""></h3>
                    <p>Login to Access!</p>
                </div>
                <div class="hpanel">
                    <div class="panel-body">
                        <x-jet-validation-errors class="mb-4" />

                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ route('login') }}" method="post" id="loginForm">
                            @csrf
                            <div class="form-group">
                                <label class="control-label" for="username">Email</label>
                                <input type="email" placeholder="example@gmail.com" title="Please enter you username"
                                    required="" name="email" id="email_id" class="form-control">
                            </div>
                            <div id="loading"></div>
                            <div id="empty"></div>
                            <button type="button" id="Mail-btn" class="btn btn-success btn-block loginbtn">Click here to receive your password via
                                email</button>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" title="Please enter your password" placeholder="******"
                                    required="" name="password" id="password" class="form-control">

                            </div>
                            <button type="submit" class="btn btn-success btn-block loginbtn">Login</button>

                            <a class="btn btn-default btn-block" href="{{ route('register') }}">Register</a>
                        </form>
                        <br>
                        <h6><a href="{{ url('/') }}">Back to Main!</a></h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
        </div>
    </div>
    @include('layouts.admin.script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script>
        //Send Mail
        $(document).ready(function() {
            $("#Mail-btn").click( function(e) {
                $("#Mail-btn").html('Sending....');
                e.preventDefault();
                var data = $("#email_id").val();
                $.ajax({
                    type: "POST",
                    url: "{{ route('CustomAuth.mail') }}",
                    data: {
                        data_email: data,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.status == 404) {
                            $("#Mail-btn").html('Email Not Register!');
                        }
                        else{
                            $("#empty").html(response);
                            $("#Mail-btn").html('Click here to receive your password via email');
                        }
                    },
                    error: function(error) {
                        console.log(error)
                        alert('Something went wrong .Please contact to admin for further details');
                    }
                });
            });
        });
    </script>
</body>

</html>
