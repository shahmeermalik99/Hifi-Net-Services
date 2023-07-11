@extends('master1')
@section('content')
    <style>
        #map {
            height: 400px;
        }
    </style>
    <br><br>
    <div class="container1">
        <center>
            <h1><b> HIFI NET SERVICES </b></h1>
            <p>Govt College Satelitetown Gujranwala</p>
            <h3><u> NEW CONNECTION </u></h3>
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
                                    <form class="forms-sample" method="POST" action="{{url('addclient')}}"
                                        id="myform" onsubmit="return myfun()">
                                        @csrf
                                        <div class="col-md-12">
                                            <div style="float: right;">

                                                <input type="checkbox" value="Approve" name="var_cust"
                                                    value="{{ old('Approve') }}" id="">
                                                <label for="">Customer Verified</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="" class="required">Name</label>
                                            <input type="text" autofocus class="form-control required my-field"
                                                id="name" name="name" value="{{ old('name') }}" placeholder="Name"
                                                required oninput="validate(this)">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="">Father Name</label>
                                            <input type="text" class="form-control my-field" id="name"
                                                name="f_name" placeholder="Father Name" value="{{ old('f_name') }}"
                                                oninput="validate(this)">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="required">PPPOE (Alloted User Name)</label>
                                            <input type="text" autofocus class="form-control " id="alloted_name"
                                                name="alloted_name" placeholder="Alloted Name"
                                                value="{{ old('alloted_name') }}" oninput="validate(this)">
                                                @if ($errors->has('alloted_name'))
                                                <span class="text-danger">{{ $errors->first('alloted_name') }}</span>
                                                @endif
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Email</label>
                                            <input type="email" style="height: 30px;font-size:14px;width: 100%;"
                                                name="email" class="form-control" id="txt_Password"
                                                placeholder="Enter Your Email" required/>
                                                @if ($errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                                @endif
                                        </div>
                                        <div class="form-group col-md-12">

                                            <label for="" class="">Password</label>
                                            <input type="password" class="form-control" id="txt_Password1" name="password"
                                                onChange="onChange()" placeholder="Password" required>
                                        </div>
                                        {{-- <div class="form-group col-md-12">
                                            <label for="" class=""> Confirm Password</label>
                                            <input class="form-control" type="password" id="txt_Password2" name="confirm"
                                                onChange="onChange()" required placeholder=" Confirm Password"
                                                disabled="disabled" />
                                        </div> --}}
                                        <div class="form-group col-md-12">
                                            <label for="" class="required">CNIC Number</label>
                                            <input class="form-control" name="cnic" id="CNIC_No" max="13"
                                                type="tel" pattern="^\d{5}-\d{7}-\d{1}$"
                                                data-inputmask="'mask': '99999-9999999-9'" placeholder="XXXXX-XXXXXXX-X"
                                                required value="{{ old('cnic') }}">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="" class="required">Contact Number</label>
                                            <input type="text" class="form-control contact" id="myform_phone"
                                                name="contact" placeholder="Phone Number" max="11" type="tel"
                                                pattern="^\d{4}-\d{7}$" data-inputmask="'mask': '0399-99999999'"
                                                type="number" maxlength="12" required value="{{ old('contact') }}">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="">Whatsapp Number</label>
                                            <input type="text" class="form-control contact" id="myform_phone"
                                                name="whatsup_num" max="11" type="tel" pattern="^\d{4}-\d{7}$"
                                                data-inputmask="'mask': '0399-99999999'" type="number" maxlength="12"
                                                placeholder="Phone Number" value="{{ old('whatsup_num') }}">

                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="" class="required">Area</label>
                                            <select name="area" id=""
                                                class="form-control js-example-basic-single" required>
                                                <option value="">--- Select Area ---</option>
                                                @foreach ($area as $list)
                                                    <option value="{{ $list->id }}">{{ $list->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="" class="required">Package</label>
                                            <select name="package_id" id="package_id"
                                                class="form-control js-example-basic-single" required>
                                                <option value="">--- Select Package ---</option>
                                                @foreach ($package as $list)
                                                    <option value="{{ $list->id }}">{{ $list->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="">Package Fee</label>
                                            <input type="number" class="form-control" name="package_fee" id="totalval"
                                                onkeyup="getbalance()" value="0" oninput="validate(this)"
                                                placeholder="Select Package First">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="">Connnection Fee</label>
                                            <input type="number" class="form-control" name="connection_fee"
                                                id="connection_fee" onkeyup="getbalance()" value="0"
                                                value="{{ old('connection_fee') }}" oninput="validate(this)">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="">Discount</label>
                                            <input type="number" class="form-control" name="discount" id="discount"
                                                onkeyup="getbalance()" value="0" value="{{ old('discount') }}"
                                                oninput="validate(this)">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="">Total Payable</label>
                                            <input type="number" class="form-control" name="total_payable"
                                                id="total_payable" onkeyup="getbalance()" value="0"
                                                oninput="validate(this)" readonly>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="" class="required">Paid Amount</label>
                                            <input type="number" class="form-control" name="paid_amount"
                                                id="paid_amount" onkeyup="getbalance()" value="0"
                                                oninput="validate(this)">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="">Balance</label>
                                            <input type="number" class="form-control" name="balance" id="balance"
                                                onkeyup="getbalance()" value="0" oninput="validate(this)" readonly>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="">Connection Date</label>
                                            <!-- <input type="date" class="form-control" name="date" id="date"> -->
                                            <input name="date" type="text" readonly="readonly"
                                                class="form-control" id="date" />
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label for="" class="required">Address</label>
                                            <textarea type="text" class="form-control" id="address" name="address" placeholder="Address" required
                                                oninput="validate(this)">{{ old('address') }}</textarea>
                                        </div>


                                        <div class="form-group col-md-12">
                                            <label for="" class="required">Latitude</label>
                                            <input type="text" class="form-control" placeholder="latitude"
                                                name="latitude" id="lat" value="32.1496129">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="" class="required">Longitude</label>
                                            <input type="text" class="form-control" placeholder="longitude"
                                                name="longitude" id="lng" value="74.214759">
                                        </div>
                                        <br>
                                        <div class="form-group col-md-12">
                                            <center>
                                                <div id="map" class="form-control my-3"></div>
                                            </center>
                                        </div>
                                        <br>
                                        <center>
                                            <button type="submit" class="btn btn-sm btn-primary mr-2"
                                                id="register">Save</button>
                                            @if (Auth::user()->role == 'Admin')
                                                <a href="{{ route('clients.clientlist') }}"
                                                    class="btn btn-sm btn-danger mr-2">back</a>
                                            @endif
                                            @if (Auth::user()->role == 'Super Admin')
                                                <a href="{{ route('clients.clientlist') }}"
                                                    class="btn btn-sm btn-danger mr-2">back</a>
                                            @endif
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





    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <!-- Ajax For fee -->
    <script>
        $(document).ready(function(){
            $('#package_id').on('change', function(){
                   console.log('Done Da Done');
                   var idpackage_fee = this.value;
                $.ajax({
                    url: "{{ url('fetch-client_fee') }}",
                    type: "POST",
                    data: {
                        id: idpackage_fee,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(result){
                        console.log(result[0].fee);
                        console.log(result[0].id);
                        $('#totalval').val(result[0].fee);
                        getbalance ();
                    }
                });
            });
        });
    </script>
    {{-- <script>
        $(document).ready(function() {
            $('#package_id').on('change', function() {
                var idpackage_fee = this.value;
                $("#totalval").html('');
                $.ajax({
                    url: "{{ url('fetch-client_fee') }}",
                    type: "POST",
                    data: {
                        id: idpackage_fee,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#totalval').html('');
                        $.each(result.fees, function(key, value) {
                            $("#totalval").val(value.fee);
                        });
                        getbalance();
                    }
                });
            });
        });
    </script> --}}
    <!-- phone number validation  -->
    <script>
        function myfun() {
            var a = document.getElementById("myform_phone").value;
            if (a == "") {
                alert("Please Enter Number");
                return false;
            }
            if (isNaN(a)) {
                alert("Please Enter Only Number For Mobile Number");
                return false;
            }
            if (a.length < 11) {
                alert("Please Enter Only 11 digits For Mobile Number");
                return false;
            }
            if (a.length > 11) {
                alert("Please Enter Only 11 digits For Mobile Number");
                return false;
            }
        }
    </script>
    <script>
        function myfun() {
            var a = document.getElementById("CNIC_No").value;

            if (a.length < 13) {
                alert("Please Enter Complete  Cnic Number");
                return false;
            }
        }
    </script>
    <!-- scripts for cnic marking -->
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
    <script>
        $(":input").inputmask();
    </script>
    <script>
        $('#date').val(new Date().toJSON().slice(0, 10));
    </script>
    <script>
        getbalance = function() {
            var num1 = Number(document.getElementById('connection_fee').value);
            var num2 = Number(document.getElementById('totalval').value);
            var num3 = Number(document.getElementById('discount').value);
            var num4 = Number(document.getElementById('total_payable').value);
            var num5 = Number(document.getElementById('paid_amount').value);
            var num6 = Number(document.getElementById('balance').value);
            num4 = (num2 + num1) - num3;
            num6 = num4 - num5;
            document.getElementById('total_payable').value = num4;
            document.getElementById('balance').value = num6;
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
    <script type="text/javascript">
        $(function() {
            var d = new Date().getDate();
            var m = new Date().getMonth() + 1;
            var y = new Date().getFullYear();
            $("[id$=txtDate]").val(d + "/" + m + "/" + y);
            $("[id$=txtDate]").datepicker({
                weekStart: 1,
                dateFormat: 'dd/mm/yy'
            });
        });
    </script>

    <!-- For Map -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap" type="text/javascript"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <script>
        let map;

        function initMap() {

            map = new google.maps.Map(document.getElementById("map"), {
                center: {
                    lat: 32.1496129,
                    lng: 74.214759
                
                },
                zoom: 13,
                scrollwheel: true,
                mapTypeId: "roadmap",
            });

            const uluru = {
                lat: 32.1496129,
                lng: 74.214759
            };
            let marker = new google.maps.Marker({
                position: uluru,
                map: map,
                draggable: true,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });
            google.maps.event.addListener(marker, 'position_changed',
                function() {
                    let lat = marker.position.lat()
                    let lng = marker.position.lng()
                    $('#lat').val(lat)
                    $('#lng').val(lng)
                })
            google.maps.event.addListener(map, 'click',
                function(event) {
                    pos = event.latLng
                    marker.setPosition(pos)
                })

            map.setTilt(45);
        }
        window.initMap = initMap;
    </script>

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
