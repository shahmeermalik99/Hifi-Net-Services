@extends('master1')
@section('content')


<br>
<br>
<div class="container1">
    <center>
        <h1><b> HIFI NET SERVICES </b></h1>
        <p>Govt College Gujranwala</p>
        <h3><u> SEARCH CLIENT </u></h3>
    </center>
</div>
<div class="container" style="padding-top: 22px">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="sparkline9-list mt-b-30">
            <div class="sparkline9-hd">
                <div class="main-sparkline9-hd">
                    <form action="{{ route('reports.client') }}" method="get">
                        @csrf
                        @if (Auth::user()->role == 'Admin')
                        <div class="row">
                            <div class="col-md-2">
                                <label>Client Name</label>
                                <input list="customerlist" tabIndex="1" autofocus class="form-control" name="customerfilter" id="customer-name">
                                <datalist id="customerlist">
                                </datalist>
                                <input type="hidden" name="customerfilter" id="customer-name-hidden">

                            </div>
                            <div class="col-md-2">
                                <label>Client Contact</label>
                                <input list="customerlist" tabIndex="1" autofocus class="form-control" name="contactfilter" id="customer-contacts">
                                <datalist id="customerlist">
                                </datalist>
                                <input type="hidden" name="contactfilter" id="customer-contacts-hidden">
                            </div>
                            <div class="col-md-2">
                                <label>Client CNIC</label>
                                <input list="customerlist" tabIndex="1" autofocus class="form-control" name="cnicfilter" id="customer-cnic1">
                                <datalist id="customerlist">
                                </datalist>
                                <input type="hidden" name="cnicfilter" id="customer-cnic1-hidden">
                            </div>
                            <div class="col-md-2">
                                <label>Client Status </label>
                                <select name="statusfilter" class="form-control js-example-basic-single">
                                    <option value="">Select Status</option>
                                    <option value="Approve">Verified</option>
                                    <option value="Approved">Non Verified</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" style="margin-top:5%;margin-top:22px" value="Search" class="btn-sm btn btn-sm btn-danger"><i class="fa-solid fa-magnifying-glass"></i></button>
                                <a href="{{ route('reports.client') }}" type="button" style="margin-top:5%;margin-top:22px" value="" class=" btn btn-sm btn-warning"><i class="bi bi-arrow-clockwise"></i></a>

                            </div>
                        </div>
                        @endif
                        @if (Auth::user()->role == 'Super Admin')
                        <div class="row">
                            <div class="col-md-2">
                                <label>Client Name</label>
                                <input list="customerlist" tabIndex="1" autofocus class="form-control" name="customerfilter" id="customer-name">
                                <datalist id="customerlist">
                                </datalist>
                                <input type="hidden" name="customerfilter" id="customer-name-hidden">

                            </div>
                            <div class="col-md-2">
                                <label>Client Contact</label>
                                <input list="customerlist" tabIndex="1" autofocus class="form-control" name="contactfilter" id="customer-contacts">
                                <datalist id="customerlist">
                                </datalist>
                                <input type="hidden" name="contactfilter" id="customer-contacts-hidden">
                            </div>
                            <div class="col-md-2">
                                <label>Client CNIC</label>
                                <input list="customerlist" tabIndex="1" autofocus class="form-control" name="cnicfilter" id="customer-cnic1">
                                <datalist id="customerlist">
                                </datalist>
                                <input type="hidden" name="cnicfilter" id="customer-cnic1-hidden">
                            </div>
                            <div class="col-md-2">
                                <label>Client Status </label>
                                <select name="statusfilter" class="form-control js-example-basic-single">
                                    <option value="">Select Status</option>
                                    <option value="Approve">Verified</option>
                                    <option value="Approved">Non Verified</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" style="margin-top:5%;margin-top:22px" value="Search" class="btn-sm btn btn-sm btn-danger"><i class="fa-solid fa-magnifying-glass"></i></button>
                                <a href="{{ route('reports.client') }}" type="button" style="margin-top:5%;margin-top:22px" value="" class=" btn btn-sm btn-warning"><i class="bi bi-arrow-clockwise"></i></a>

                            </div>
                        </div>
                        @endif
                        @if (Auth::user()->role == 'Manager')

                        <a href="{{ route('clients.addclient') }}" type="button" id="button" class="btn btn-primary btn-sm pb-2" style="float: right;">Add customer</a>

                        <br>
                        <br>

                        <div class="row">
                            <div class="col-md-2">
                                <label>Customer Name</label>
                                <input list="customerlist" tabIndex="1" autofocus class="form-control" name="customerfilter" id="customer-name">
                                <datalist id="customerlist">
                                </datalist>
                                <input type="hidden" name="customerfilter" id="customer-name-hidden">

                            </div>
                            <div class="col-md-2">
                                <label>Customer Contact</label>
                                <input list="customerlist" tabIndex="1" autofocus class="form-control" name="contactfilter" id="customer-contacts">
                                <datalist id="customerlist">
                                </datalist>
                                <input type="hidden" name="contactfilter" id="customer-contacts-hidden">
                            </div>
                            <div class="col-md-2">
                                <label>Customer CNIC</label>
                                <input list="customerlist" tabIndex="1" autofocus class="form-control" name="cnicfilter" id="customer-cnic1">
                                <datalist id="customerlist">
                                </datalist>
                                <input type="hidden" name="cnicfilter" id="customer-cnic1-hidden">
                            </div>
                            <div class="col-md-2">
                                <label>Customer Status </label>
                                <select name="statusfilter" class="form-control js-example-basic-single">
                                    <option value="">Select Status</option>
                                    <option value="Approve">Verified</option>
                                    <option value="Approved">Non Verified</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" style="margin-top:5%;margin-top:22px" value="Search" class="btn-sm btn btn-danger" ><i class="fa-solid fa-magnifying-glass"></i></button>
                                <a href="{{ route('reports.client') }}" type="button" style="margin-top:5%;margin-top:22px" value="" class=" btn btn-sm btn-warning"><i class="bi bi-arrow-clockwise"></i></a>

                            </div>
                        </div>
                        @endif
                    </form>
                </div>
                <br>
                <br>
            </div>
            @if (Auth::user()->role == 'Super Admin')
            <div class="sparkline9-graph">
                <div class="static-table-list">
                    <div class="table-responsive">
                        <table class="table sparkle-table table-responsive  mb-0" id="example">
                            <thead style="padding: 4px;">
                                <tr style="padding: 4px;">
                                    <th style="font-size:14px;padding: 4px;">S No.</th>
                                    <th style="font-size:14px;padding: 4px;"> Name </th>
                                    <th style="font-size:14px;padding: 4px;">Alloted Name </th>
                                    <th style="font-size:14px;padding: 4px;"> Email </th>
                                    <th style="font-size:14px;padding: 4px;"> Contact </th>
                                    <th style="font-size:14px;padding: 4px;"> CNIC </th>
                                    <th style="font-size:14px;padding: 4px;"> Address </th>
                                    <th style="font-size:14px;padding: 4px;padding-left:62px"> Status </th>

                                </tr>
                            </thead>
                            <tbody>
                                @if ($data)
                                @foreach ($data as $key => $list)
                                <tr style="padding: 1px;">
                                    <td style="width: 2%;padding: 1px;">{{ $key + 1 }}</td>
                                    <td style="width: 5%;padding: 1px;">{{ $list->name }}</td>

                                    @if($list->alloted_name == '')
                                    <td style="width: 5%;padding: 1px;">None</td>
                                    @else
                                    <td style="width: 5%;padding: 1px;">{{ $list->alloted_name }}</td>
                                    @endif
                                    @if($list->email == '')
                                    <td style="width: 5%;padding: 1px;">None</td>
                                    @else
                                    <td style="width: 5%;padding: 1px;">{{ $list->email }}</td>
                                    @endif
                                    <td style="width: 5%;padding: 1px;">{{ $list->contact }}</td>
                                    <td style="width: 5%;padding: 1px;">{{ $list->cnic }}</td>
                                    <td style="width: 5%;padding: 1px;">{{ $list->address }}</td>
                                    <td style="width: 3%;text-align:center;padding: 1px;">
                                        @if ($list->var_cust == 'Approve')
                                        <span class="badge rounded-pill bg-success text-dark" style="background-color: green; color:white; padding:5px 5px;">Verified</span>
                                        @elseif($list->var_cust == 'Approved')
                                        <span class="badge rounded-pill bg-danger text-dark" style="background-color: red; color:ehite; padding:5px 5px;">Non Verified</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            @endif
            @if (Auth::user()->role == 'Admin')
            <div class="sparkline9-graph">
                <div class="static-table-list">
                    <div class="table-responsive">
                        <table class="table sparkle-table table-responsive  mb-0" id="example">
                            <thead style="padding: 4px;">
                                <tr style="padding: 4px;">
                                    <th style="font-size:14px;padding: 4px;">S No.</th>
                                    <th style="font-size:14px;padding: 4px;"> Name </th>
                                    <th style="font-size:14px;padding: 4px;"> Alloted Name </th>
                                    <th style="font-size:14px;padding: 4px;"> Email </th>
                                    <th style="font-size:14px;padding: 4px;"> Contact </th>
                                    <th style="font-size:14px;padding: 4px;"> CNIC </th>
                                    <th style="font-size:14px;padding: 4px;"> Address </th>
                                    <th style="font-size:14px;padding: 4px;padding-left:62px"> status </th>

                                </tr>
                            </thead>
                            <tbody>
                                @if ($data)
                                @foreach ($data as $key => $list)
                                <tr style="padding: 1px;">
                                    <td style="width: 2%;padding: 1px;">{{ $key + 1 }}</td>
                                    <td style="width: 5%;padding: 1px;">{{ $list->name }}</td>
                                    @if($list->alloted_name == '')
                                    <td style="width: 5%;padding: 1px;">None</td>
                                    @else
                                    <td style="width: 5%;padding: 1px;">{{ $list->alloted_name }}</td>
                                    @endif
                                    @if($list->email == '')
                                    <td style="width: 5%;padding: 1px;">None</td>
                                    @else
                                    <td style="width: 5%;padding: 1px;">{{ $list->email }}</td>
                                    @endif
                                    <td style="width: 5%;padding: 1px;">{{ $list->contact }}</td>
                                    <td style="width: 5%;padding: 1px;">{{ $list->cnic }}</td>
                                    <td style="width: 5%;padding: 1px;">{{ $list->address }}</td>
                                    <td style="width: 3%;text-align:center;padding: 1px;">
                                        @if ($list->var_cust == 'Approve')
                                        <span class="badge rounded-pill bg-success text-dark" style="background-color: green; color:white; padding:5px 5px;">Verified</span>
                                        @elseif($list->var_cust == 'Approved')
                                        <span class="badge rounded-pill bg-danger text-dark" style="background-color: red; color:ehite; padding:5px 5px;">Non Verified</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            @endif
            @if (Auth::user()->role == 'Manager')
            <div class="sparkline9-graph">
                <div class="static-table-list">
                    <table class="table sparkle-table table-responsive  mb-0">
                        <thead style="padding: 4px;">

                        </thead>
                        <tbody>
                            @if ($data)
                            @foreach ($data as $key => $list)
                            <tr>
                                <th> Name </th>
                                <td>{{$list->name}}</td>
                                <th>Father Name </th>
                                <td>{{$list->f_name}}</td>
                            </tr>
                            @if ($list->alloted_name)
                            <tr>
                                <th>PPPOE (Alloted User Name) </th>
                                <td>{{$list->alloted_name}}</td>
                                <th> Contact </th>
                                <td>{{$list->contact}}</td>
                            </tr>
                            @endif
                            <tr>

                                <th> Whatsapp Number </th>
                                <td>{{$list->whatsup_num}}</td>
                                <th> Cnic </th>
                                <td>{{$list->cnic}}</td>
                            </tr>
                            <tr>

                                <th> Customer Status</th>
                                <td>{{$list->var_cust}}</td>
                                <th> Package Name </th>
                                <td>{{$list->package_id}}</td>
                            </tr>
                            <tr>

                                <th> Package Fee</th>
                                <td>{{$list->fee}}</td>
                                <th> Address </th>
                                <td>{{$list->address}}</td>
                            </tr>

                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

{{-- <script>
    var dataTable = $('#example').dataTable()
</script> --}}
<script>
    function focusInput() {
        document.getElementById("customer-dd").focus();
    }
</script>
<script type="text/javascript">
    document.querySelector('#customer-dd').addEventListener('input', function(e) {
        var input = e.target,
            list = input.getAttribute('list'),
            options = document.querySelectorAll('#' + list + ' option[value="' + input.value + '"]'),
            hiddenInput = document.getElementById(input.getAttribute('id') + '-hidden');

        if (options.length > 0) {
            hiddenInput.value = input.value;
            input.value = options[0].innerText;
        }
    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- for Product -->
<script>
    $(document).ready(function() {

        $('#customer-dd').keyup(function() {
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
                        s += '<option value="' + res[i].name + '" >' + res[i].name + '</option>';
                    }
                    $("#customerlist").html(s);
                    console.log(res);
                }
            });
        });
    });
</script>


<!-- for contact -->
<script>
    function focusInput() {
        document.getElementById("customer-contact").focus();
    }
</script>

<script type="text/javascript">
    document.querySelector('#customer-contact').addEventListener('input', function(e) {
        var input = e.target,
            list = input.getAttribute('list'),
            options = document.querySelectorAll('#' + list + ' option[value="' + input.value + '"]'),
            hiddenInput = document.getElementById(input.getAttribute('id') + '-hidden');

        if (options.length > 0) {
            hiddenInput.value = input.value;
            input.value = options[0].innerText;
        }
    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {

        $('#customer-contact').keyup(function() {
            var ProductName = this.value;
            $.ajax({
                url: "{{url('/fetch-productcontact')}}",
                type: "POST",
                data: {
                    product_name: ProductName,
                    _token: '{{csrf_token()}}'
                },
                success: function(res) {
                    var s;
                    for (var i = 0; i < res.length; i++) {
                        s += '<option value="' + res[i].contact + '" >' + res[i].contact + '</option>';
                    }
                    $("#customerlist").html(s);
                    console.log(res);
                }
            });
        });
    });
</script>



<!-- for cnic -->
<script>
    function focusInput() {
        document.getElementById("customer-cnic").focus();
    }
</script>
<script type="text/javascript">
    document.querySelector('#customer-cnic').addEventListener('input', function(e) {
        var input = e.target,
            list = input.getAttribute('list'),
            options = document.querySelectorAll('#' + list + ' option[value="' + input.value + '"]'),
            hiddenInput = document.getElementById(input.getAttribute('id') + '-hidden');

        if (options.length > 0) {
            hiddenInput.value = input.value;
            input.value = options[0].innerText;
        }
    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {

        $('#customer-cnic').keyup(function() {
            var ProductName = this.value;
            $.ajax({
                url: "{{url('/fetch-productcnic')}}",
                type: "POST",
                data: {
                    product_name: ProductName,
                    _token: '{{csrf_token()}}'
                },
                success: function(res) {
                    var s;
                    for (var i = 0; i < res.length; i++) {
                        s += '<option value="' + res[i].cnic + '" >' + res[i].cnic + '</option>';
                    }
                    $("#customerlist").html(s);
                    console.log(res);
                }
            });
        });
    });
</script>


<!-- Now for admin -->
<!-- for name -->
<script>
    function focusInput() {
        document.getElementById("customer-name").focus();
    }
</script>
<script type="text/javascript">
    document.querySelector('#customer-name').addEventListener('input', function(e) {
        var input = e.target,
            list = input.getAttribute('list'),
            options = document.querySelectorAll('#' + list + ' option[value="' + input.value + '"]'),
            hiddenInput = document.getElementById(input.getAttribute('id') + '-hidden');

        if (options.length > 0) {
            hiddenInput.value = input.value;
            input.value = options[0].innerText;
        }
    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {

        $('#customer-name').keyup(function() {
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
                        s += '<option value="' + res[i].id + '" >' + res[i].name + '</option>';
                    }
                    $("#customerlist").html(s);
                    console.log(res);
                }
            });
        });
    });
</script>

<!-- for contact -->
<script>
    function focusInput() {
        document.getElementById("customer-contacts").focus();
    }
</script>
<script type="text/javascript">
    document.querySelector('#customer-contacts').addEventListener('input', function(e) {
        var input = e.target,
            list = input.getAttribute('list'),
            options = document.querySelectorAll('#' + list + ' option[value="' + input.value + '"]'),
            hiddenInput = document.getElementById(input.getAttribute('id') + '-hidden');

        if (options.length > 0) {
            hiddenInput.value = input.value;
            input.value = options[0].innerText;
        }
    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {

        $('#customer-contacts').keyup(function() {
            var ProductName = this.value;
            $.ajax({
                url: "{{url('/fetch-productcontact')}}",
                type: "POST",
                data: {
                    product_name: ProductName,
                    _token: '{{csrf_token()}}'
                },
                success: function(res) {
                    var s;
                    for (var i = 0; i < res.length; i++) {
                        s += '<option value="' + res[i].id + '" >' + res[i].contact + '</option>';
                    }
                    $("#customerlist").html(s);
                    console.log(res);
                }
            });
        });
    });
</script>

<!-- for cnic -->
<script>
    function focusInput() {
        document.getElementById("customer-cnic1").focus();
    }
</script>
<script type="text/javascript">
    document.querySelector('#customer-cnic1').addEventListener('input', function(e) {
        var input = e.target,
            list = input.getAttribute('list'),
            options = document.querySelectorAll('#' + list + ' option[value="' + input.value + '"]'),
            hiddenInput = document.getElementById(input.getAttribute('id') + '-hidden');

        if (options.length > 0) {
            hiddenInput.value = input.value;
            input.value = options[0].innerText;
        }
    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {

        $('#customer-cnic1').keyup(function() {
            var ProductName = this.value;
            $.ajax({
                url: "{{url('/fetch-productcnic')}}",
                type: "POST",
                data: {
                    product_name: ProductName,
                    _token: '{{csrf_token()}}'
                },
                success: function(res) {
                    var s;
                    for (var i = 0; i < res.length; i++) {
                        s += '<option value="' + res[i].id + '" >' + res[i].cnic + '</option>';
                    }
                    $("#customerlist").html(s);
                    console.log(res);
                }
            });
        });
    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
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
                        s += '<option value="' + res[i].id + '" >' + res[i].name + '&nbsp' + res[i].cnic + '&nbsp' + res[i].contact + '&nbsp' + res[i].address + '</option>';
                    }
                    $("#customerlist").html(s);
                    console.log(res);
                }
            });
        });
    });
</script>
@endsection
