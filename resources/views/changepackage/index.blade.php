@extends('master1')
@section('content')

<br><br>
<div class="container1">
    <center>
        <h1><b> HIFI NET SERVICES </b></h1>
        <p>Govt College Satelitetown Gujranwala</p>
        <h3><u>CHANGE PACKAGE </u></h3>
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
                                <form class="forms-sample" method="POST" action="{{route('changes.store')}}" onsubmit="return validateForm()" name="myForm">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for="name"  class="required">Search Client By Name/CNIC/Contact</label>
                                            <input list="customerlist" tabIndex="1" autofocus class="form-control" id="client-dd" name="client_id" oninput="validate(this)" required  type="text">
                                            <datalist id="customerlist" >
                                            </datalist>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="name">Client Name</label>
                                            <input class="form-control" id="name-dd" name= "fname" readonly>
                                        </div>
                                        <div class="form-group col-md-6" style="display: inline-block">
                                            <label class=''>
                                                 CNIC Number</label>
                                            <input class="form-control" id="cnic-dd" readonly>

                                        </div>
                                        <div class="form-group col-md-6" style="display: inline-block">
                                            <label class=''>
                                                Contact Number</label>
                                            <input class="form-control" id="contact-dd" readonly>
                                        </div>
                                        <div class="form-group col-md-6" style="display: inline-block">
                                            <label class=''>
                                                Address</label>
                                            <input class="form-control" id="address-dd" readonly>
                                        </div>
                                        <div class="form-group col-md-6" style="display: inline-block">
                                            <label class=''>
                                                Current Package</label>
                                            <input class="form-control" id="current-dd" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for=""  class="required">New Package </label>
                                            <select name="package_id" required id="package_id" class="form-control js-example-basic-single">
                                                <option value="">Please select Package</option>
                                                @foreach($packages as $list)
                                                <option value="{{$list->id}}">{{$list->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="">Package Fee</label>
                                            <input type="number" name="package_fee" id="totalval" class="form-control">
                                        </div>
                                    </div>
                                    <center>
                                        <button type="submit" class="btn btn-sm btn-primary mr-2" id="">save</button>
                                        <a href="{{route('dashboard')}}" class="btn btn-sm btn-danger mr-2">back</a>
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

<script>
function validateForm() {
  let x = document.forms["myForm"]["fname"].value;
  if (x == "") {
    alert("Client Name must be filled out");
    return false;
  }
}
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('#client-dd').on('change', function () {
            var search = this.value;
            console.log(search)
            $("#name-dd").html('');
            $.ajax({
                url: "{{url('fetch-clientid')}}",
                type: "POST",
                data: {
                    id: search,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    console.log(result);
                    $('#name-dd').val(result.name);
                    $('#cnic-dd').val(result.cnic);
                    $('#contact-dd').val(result.contact);
                    $('#address-dd').val(result.address);
                    $('#current-dd').val(result.Pname);
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function () {
        $('#client-dd').on('change', function () {
            var idpackage_fee = this.value;
            $("#current-dd").html('');
            $.ajax({
                url: "{{url('fetch-currentpackage')}}",
                type: "POST",
                data: {
                    id: idpackage_fee,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#current-dd').html('');
                    $.each(result.names, function (key, value) {
                        $("#current-dd").val(value.name);

                    });
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#package_id').on('change', function() {
            var idpackage_fee = this.value;
            $("#totalval").html('');
            $.ajax({
                url: "{{url('fetch-client_fee')}}",
                type: "POST",
                data: {
                    id: idpackage_fee,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function(result) {
                    $('#totalval').html('');
                    console.log(result[0].fee);
                    console.log(result[0].id);
                    $('#totalval').val(result[0].fee);
                    // getbalance ();
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#client-dd').keyup(function() {
            var ProductName = this.value;
            $.ajax({
                url: "{{url('/fetch-productname')}}",
                type: "POST",
                data: {
                    product_name: ProductName,
                    _token: '{{csrf_token()}}'
                },
                success: function(res) {
                    var s;
                    for (var i = 0; i < res.length; i++) {
                        s += '<option value="' + res[i].id + '" >' + res[i].name + '&nbsp' + res[i].cnic + '&nbsp' + res[i].contact + '&nbsp' +  '</option>';
                    }
                    $("#customerlist").html(s);
                    console.log(res);
                }
            });
        });
    });
</script>
<!-- script for remove space -->
<script>
  function validate(input){
  if(/^\s/.test(input.value))
    input.value = '';
}
</script>
@endsection
