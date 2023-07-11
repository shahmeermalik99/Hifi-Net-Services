@extends('master1')
@section('content')

<br>
<br>
<div class="container1">
    <center>
        <h1><b> HIFI NET SERVICES </b></h1>
        <p>Govt College Gujranwala</p>
        <h3><u> CLIENT REPORT </u></h3>
    </center>
</div>
<div class="container" style="padding-top: 22px">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="sparkline9-list mt-b-30">
            <div class="sparkline9-hd">
                <div class="main-sparkline9-hd">
                    <form action="{{ route('reports.searchwitharea') }}" method="get">
                        @csrf
                        <div class="row">

                            <div class="col-md-4">
                                <label>Search With Area</label>
                                <input list="customerlist" tabIndex="1" autofocus class="form-control" name="areafilter" id="customer-area">
                                <datalist id="customerlist">
                                </datalist>
                                <input type="hidden" name="areafilter" id="customer-area-hidden">
                            </div>
                            <div class="col-md-2">
                                <button type="submit" style="margin-top:5%;margin-top:22px" value="Search" class=" btn btn-sm btn-danger"><i class="fa-solid fa-magnifying-glass"></i></button>
                                <a href="{{ route('reports.searchwitharea') }}" type="button" style="margin-top:5%;margin-top:22px" value="" class=" btn btn-sm btn-warning"><i class="bi bi-arrow-clockwise"></i></a>
                            </div>
                        </div>
                    </form>
                </div>
                <br>
                <br>
            </div>
            <div class="sparkline9-graph">
                <div class="static-table-list">
                <div class="table-responsive">
                    <table class="table sparkle-table table-responsive  container1 mb-0" id="example">
                        <thead style="padding: 4px;">
                            <tr style="padding: 4px;">
                                <th style="font-size:14px;padding: 4px;">S No.</th>
                                <th style="font-size:14px;padding: 4px;"> Name </th>
                                <th style="font-size:14px;padding: 4px;"> Alloted Name </th>
                                <th style="font-size:14px;padding: 4px;"> Contact Number</th>
                                <th style="font-size:14px;padding: 4px;"> CNIC Number</th>
                                <th style="font-size:14px;padding: 4px;"> Area</th>
                                <th style="font-size:14px;padding: 4px;padding-left:42px"> Customer Status </th>
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
                                <td style="width: 5%;padding: 1px;">{{ $list->contact }}</td>
                                <td style="width: 5%;padding: 1px;">{{ $list->cnic }}</td>
                                <td style="width: 5%;padding: 1px;">{{ $list->area_name }}</td>


                                <td style="width: 5%;padding: 1px;;text-align:center">
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
                    <center>
                        <input type="button" id="print" class="btn btn-sm btn-danger" value="Print PDF">
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var dataTable = $('#example').dataTable()
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
<!-- for area -->
<script>
    function focusInput() {
        document.getElementById("customer-area").focus();
    }
</script>
<script type="text/javascript">
    document.querySelector('#customer-area').addEventListener('input', function(e) {
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

        $('#customer-area').keyup(function() {
            var ProductName = this.value;
            $.ajax({
                url: "{{url('/fetch-productarea')}}",
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

@endsection
