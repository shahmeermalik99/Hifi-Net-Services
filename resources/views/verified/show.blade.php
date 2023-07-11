@extends('master1')
@section('content')

<br><br>
<div class="container1">
    <center>
        <h1><b> HIFI NET SERVICES </b></h1>
        <p>Govt College Satelitetown Gujranwala</p>
        <h3><u>VERIFIED CLIENT DETAILS </u></h3>
    </center>
</div>
<div class="container" style="padding-top: 22px">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="sparkline9-list mt-b-30">
            <div class="sparkline9-graph">
                <div class="static-table-list">
                    <div class="basic-login-inner">

                        <br>
                        <table class="table table-bordered-less py-4">
                            <thead>
                            </thead>
                            <tbody>
                                <tr>
                                    <th> Name </th>
                                    <td>{{$client->name}}</td>
                                </tr>
                                @if ($client->alloted_name)
                                <tr>
                                    <th>PPPOE (Alloted User Name) </th>
                                    <td>{{$client->alloted_name}}</td>
                                </tr>
                                @endif
                                @if ($client->f_name == '')
                                <tr>
                                    <th>Father Name</th>
                                    <td>None</td>
                                </tr>
                                @endif
                                @if ($client->f_name)

                                <tr>
                                    <th>Father Name </th>
                                    <td>{{$client->f_name}}</td>
                                </tr>
                                @endif
                                <tr>
                                    <th> CNIC Number</th>
                                    <td>{{$client->cnic}}</td>
                                </tr>
                                <tr>
                                    <th> Contact Number</th>
                                    <td>{{$client->contact}}</td>
                                </tr>
                                @if ($client->whatsup_num == '')
                                <tr>
                                    <th>Whatsapp Number</th>
                                    <td>None</td>
                                </tr>
                                @endif
                                @if ($client->whatsup_num)

                                <tr>
                                    <th> Whatsapp Number</th>
                                    <td>{{$client->whatsup_num}}</td>
                                </tr>
                                @endif
                                <tr>
                                    <th> Area </th>
                                    <td>{{$area->name}}</td>
                                </tr>
                                <tr>
                                    <th> Package Name </th>
                                    <td>{{$package->name}}</td>
                                </tr>
                                <tr>
                                    <th> Package Fee </th>
                                    <td>{{$client->package_fee}}</td>
                                </tr>
                                <tr>
                                    <th> Connection Fee </th>
                                    <td>{{$client->connection_fee}}</td>
                                </tr>
                                <tr>
                                    <th> Discount </th>
                                    <td>{{$client->discount}}</td>
                                </tr>
                                <tr>
                                    <th> Paid Amount </th>
                                    <td>{{$account->paid_amount}}</td>
                                </tr>
                                <tr>
                                    <th> Balance </th>
                                    <td>{{$account->balance}}</td>
                                </tr>
                                <tr>
                                    <th> Connection Date </th>
                                    <td>{{$account->date}}</td>
                                </tr>
                                @if ($client->email)
                                <tr>
                                    <th>Email</th>
                                    <td>{{$client->email}}</td>
                                </tr>
                                @endif
                                @if ($client->email == '')
                                <tr>
                                    <th> Email </th>
                                    <td>None</td>
                                </tr>
                                @endif

                                <tr>
                                    <th> Address </th>
                                    <td>{{$client->address}}</td>
                                </tr>
                                <tr>
                                    <th><a class="btn btn-sm btn-primary" href="{{route('verified.index')}}">Back</a> </th>
                                    <td> </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <div class="col-sm-9">
                                    <input type="hidden" class="form-control" value="{{$client->latitude}}" placeholder="latitude" name="latitude" id="lat">
                                </div>
                                <div class="col-sm-9">
                                    <input type="hidden" class="form-control" value="{{$client->longitude}}" placeholder="longitude" name="longitude" id="lng">
                                </div>

                            </tfoot>
                        </table>
                        <center>
                            <div id="map" style="height:400px; width: 1000px;" class="my-3"></div>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- For Map -->

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
            mapTypeId: "satellite",
            scrollwheel: true,
        });
        const uluru = {
            lat: Number(document.getElementById('lat').value),
            lng: Number(document.getElementById('lng').value)
        };
        let marker = new google.maps.Marker({
            position: uluru,
            map: map,
            draggable: false
        });

        map.setTilt(45);
    }
    window.initMap = initMap;
</script>
    @endsection
