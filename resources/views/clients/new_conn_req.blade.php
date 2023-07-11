@extends('master1')
@section('content')
    <style>
        #map {
            height: 400px;
        }
    </style>
    <br><br>

    @php
    use App\Models\client;
    $data = Client::where('user_id' , '=' , Auth::user()->id)->first();
    @endphp

    <div class="container1">
        <center>
            <h1><b> HIFI NET SERVICES </b></h1>
            <p>Govt College Satelitetown Gujranwala</p>
            <h3><u> NEW CONNECTION REQUEST </u></h3>
        </center>
    </div>
    @if($data)
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
                                    <center>
                                        <h1>Your Request is Submitted Please Wait for Admin Response</h1>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @else
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

                                    <form class="forms-sample" method="POST" action="{{route('clients.storereq')}}"
                                        id="myform" onsubmit="return myfun()">
                                        @csrf
                                        <div class="form-group col-md-6">
                                            <label for="">Name</label>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ Auth::user()->name }}" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Father Name</label>
                                            <input type="text" class="form-control my-field" name="fname" value="{{ Auth::user()->fname }}" readonly>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>PPPOE (Alloted User Name)</label>
                                            <input type="text" autofocus class="form-control" name="alloted_name" value="{{ Auth::user()->id . 'FF04S' }}" readonly>

                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="" class="">Email </label>
                                            <input type="email" style="height: 30px;font-size:14px;width: 100%;"
                                                name="email" class="form-control" value="{{ Auth::user()->email }}" readonly/>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="" class="required">CNIC Number</label>
                                            <input class="form-control" name="cnic"  value="{{ Auth::user()->cnic }}" readonly>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="" class="required">Contact Number</label>
                                            <input type="text" name="contact" class="form-control contact" value="{{ Auth::user()->contact }}" readonly>
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
                                                placeholder="Select Package First" readonly>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="">Connnection Fee</label>
                                            <input type="number" class="form-control" name="connection_fee"
                                                id="connection_fee" onkeyup="getbalance()" value="2000"
                                                value="{{ old('connection_fee') }}" oninput="validate(this)" readonly>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="">Total Payable</label>
                                            <input type="text" class="form-control" name="total_payable"
                                                id="total_payable" onkeyup="getbalance()" value="0"
                                                oninput="validate(this)" readonly>
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
                                                name="latitude" id="lat" value="32.24453684797239" readonly>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="" class="required">Longitude</label>
                                            <input type="text" class="form-control" placeholder="longitude"
                                                name="longitude" id="lng" value="74.01512833862304" readonly>
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
    @endif

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <!-- Ajax For fee -->
    <script>
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
                        console.log(result[0].fee);
                        console.log(result[0].id);
                        $('#totalval').val(result[0].fee);
                        getbalance ();
                    }
                });
            });
        });
    </script>
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
        var num3 = Number(document.getElementById('total_payable').value);
        var num4 = Number(document.getElementById('balance').value);
        num3 = (num1 + num2);
        num4 = num3;
        document.getElementById('total_payable').value = num3;
        document.getElementById('balance').value = num4;
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
                    lat: 32.2448,
                    lng: 74.0153
                },
                zoom: 13,
                scrollwheel: true,
                mapTypeId: "roadmap",
            });

            const uluru = {
                lat: 32.2448,
                lng: 74.0153
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


@endsection
