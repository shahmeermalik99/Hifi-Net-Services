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
            <h3><u> UPDATE CONNECTION </u></h3>
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
                                    <form class="forms-sample" action="{{url('updateclients', $client->id)}}"
                                        method="POST" onsubmit="return myfun()">
                                        @csrf
                                        @method('PUT')

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div style="float: right;">

                                                    @if ($client->var_cust == 'Approve')
                                                        <input type="checkbox" value="Approve" checked name="var_cust"
                                                            id="">
                                                    @else
                                                        <input type="checkbox" value="Approve" name="var_cust"
                                                            id="">
                                                    @endif
                                                    <label for="">Customer Varified</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label required">Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control my-field" id="name"
                                                    name="name" value="{{ $client->name }}" oninput="validate(this)"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">Father Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control my-field" id="name"
                                                    name="f_name" value="{{ $client->f_name }}" oninput="validate(this)">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label required">PPPOE (Alloted
                                                User Name)</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="alloted_name"
                                                    name="alloted_name" value="{{ $client->alloted_name }}"
                                                    oninput="validate(this)" required>
                                                    @if ($errors->has('alloted_name'))
                                                    <span class="text-danger">{{ $errors->first('alloted_name') }}</span>
                                                    @endif
                                            </div>
                                        </div>
                                        @if ($client->email != '')
                                        <div class="form-group row">
                                            <label for="exampleInputEmail2"
                                                class="col-sm-3 col-form-label">Email</label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control" id="email"
                                                    name="email" value="{{ $client->email }}"
                                                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{3,4}$"
                                                    oninput="validate(this)">

                                            </div>
                                            @if ($errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    @endif
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label required">CNIC
                                                Number</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="CNIC_No" name="cnic"
                                                    value="{{ $client->cnic }}" max="13" type="tel"
                                                    pattern="^\d{5}-\d{7}-\d{1}$"
                                                    data-inputmask="'mask': '99999-9999999-9'">
                                            </div>

                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label required">Contact
                                                Number</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="phone" name="contact"
                                                    value="{{ $client->contact }}" max="11" type="tel"
                                                    pattern="^\d{4}-\d{7}$" data-inputmask="'mask': '0399-99999999'"
                                                    type="number" maxlength="12" required>

                                                <span id="error_number"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">Whatsapp number</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="phone" name="whatsup_num"
                                                    value="{{ $client->whatsup_num }}" max="11" type="tel"
                                                    pattern="^\d{4}-\d{7}$" data-inputmask="'mask': '0399-99999999'"
                                                    type="number" maxlength="12">

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Area</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="area" onchange="getbalance()"
                                                    id="area" readonly>
                                                    @foreach ($var as $list)
                                                        <option value="{{ $list->id }}"
                                                            {{ $list->id == $client->area ? 'selected' : '' }}>
                                                            {{ $list->name }}</option>
                                                        </option>
                                                    @endforeach
                                                </select>

                                            </div>

                                        </div>


                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label required">Package</label>
                                            <div class="col-sm-9">

                                                <input class="form-control" readonly name="" id="package_fee"
                                                    value="{{ $package->name }}" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">Package Fee</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="" onchange="getbalance()"
                                                    id="package_fee" value="{{ $client->package_fee }}" readonly
                                                    required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputMobile" class="col-sm-3 col-form-label">Connection
                                                Fee</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="connection_fee" readonly
                                                    name="" onkeyup="getbalance()"
                                                    value="{{ $client->connection_fee }}" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputMobile"
                                                class="col-sm-3 col-form-label">Discount</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" onkeyup="getbalance()"
                                                    readonly id="discount" name=""
                                                    value="{{ $client->discount }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputMobile" class="col-sm-3 col-form-label">Total
                                                Payable</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="total_payable"
                                                    name="" onkeyup="getbalance()"
                                                    value="{{ $client->total_payable }}" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputMobile" class="col-sm-3 col-form-label">Paid
                                                Amount</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="paid_amount"
                                                    name="" onkeyup="getbalance()"
                                                    value="{{ $account->paid_amount }}" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="exampleInputMobile"
                                                class="col-sm-3 col-form-label">Balance</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" readonly id="balance"
                                                    onkeyup="getbalance()" name=""
                                                    value="{{ $account->balance }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputMobile" class="col-sm-3 col-form-label">Connection
                                                Date</label>
                                            <div class="col-sm-9">
                                                <!-- <input type="date" class="form-control" id="" onkeyup="getbalance()" name="date" value="{{ $account->date }}"> -->

                                                <input name="date" type="text" onkeyup="getbalance()"
                                                    readonly="readonly" class="form-control" id="txtDate"
                                                    value="{{ $account->date }}" />
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="exampleInputMobile"
                                                class="col-sm-3 col-form-label required">Address</label>
                                            <div class="col-sm-9">
                                                <textarea type="text" class="form-control" id="address" name="address" oninput="validate(this)" required>{{ $client->address }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputMobile"
                                                class="col-sm-3 col-form-label required">latitude</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control"
                                                    value="{{ $client->latitude }}" placeholder="latitude"
                                                    name="latitude" id="lat">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputMobile"
                                                class="col-sm-3 col-form-label required">longitude</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control"
                                                    value="{{ $client->longitude }}" placeholder="longitude"
                                                    name="longitude" id="lng">
                                            </div>
                                        </div>
                                        <br>
                                        <center>

                                            <div id="map" class="my-3"></div>
                                        </center>
                                        <br>
                                        <center>
                                            <button type="submit" class="btn btn-sm btn-primary mr-2">Update</button>
                                            @if (Auth::user()->role == 'Admin')
                                                <a href="{{ route('clients.clientlist') }}"
                                                    class="btn btn-sm btn-danger mr-2">back</a>
                                            @endif
                                         @if (Auth::user()->role == 'Super Admin')
                                                <a href="{{ route('clients.clientlist') }}"
                                                    class="btn btn-sm btn-danger mr-2">back</a>
                                            @endif
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
    <script>
        $(":input").inputmask();
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap" type="text/javascript"></script>
    <script>
        let map;

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: {
                    lat: Number(document.getElementById('lat').value),
                    lng: Number(document.getElementById('lng').value)
                },
                zoom: 13,
                mapTypeId: "roadmap",
                scrollwheel: true,
            });
            const uluru = {
                lat: Number(document.getElementById('lat').value),
                lng: Number(document.getElementById('lng').value)
            };
            let marker = new google.maps.Marker({
                position: uluru,
                map: map,
                draggable: true
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
