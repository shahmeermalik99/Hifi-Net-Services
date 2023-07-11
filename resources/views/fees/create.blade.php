@extends('master1')
@section('content')
    <br><br>
    <div class="container1">
        <center>
            <h1><b> HIFI NET SERVICES </b></h1>
            <p>Govt College Satellitetown Gujranwala</p>
            <h3><u> ADD FEE </u></h3>
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
                                    <form class="forms-sample" method="POST" action="{{ route('fees.store') }}"
                                        onsubmit="return validateForm()" name="myForm">
                                        @csrf
                                        <div class="form-group col-md-12">
                                            <label for="name" class="required">Search Client By
                                                Name/CNIC/Contact</label>
                                            <input list="customerlist" tabIndex="1" autofocus class="form-control "
                                                id="client-dd" name="cust_id" required>
                                            <datalist id="customerlist">
                                            </datalist>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label for="name">Client Name</label>
                                            <input class="form-control" id="name-dd" name="fname" required readonly>
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
                                        <div class="form-group col-md-12">
                                            <label for="name">Package Name</label>
                                            <div class="form-group mb-3">
                                                <select id="state-dd" name="package_name" class="form-control" readonly>
                                                </select>
                                            </div>
                                        </div>
                                        {{-- <div class="form-group col-md-6">
                                            <label for="name">Package Fee</label>
                                            <div class="form-group mb-3">
                                                <input class="form-control" id="fee-dd" readonly>
                                            </div>
                                        </div> --}}
                                        <div class="form-group col-md-12">
                                            <label for="name">Total Payable Amount</label>
                                            <div class="form-group mb-3">
                                                <input type="number" name="package_fee" class="form-control"
                                                    onkeyup="getbalance()" id="totalval" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="name">Previous Balance</label>
                                            <div class="form-group mb-3">
                                                <input type="number" class="form-control " id="pre_balance"
                                                    name="pre_balance" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="name">Previous Paid Amount</label>
                                            <div class="form-group mb-3">
                                                <input type="number" name="package_fee" class="form-control"
                                                    onkeyup="getbalance()" id="pre_paid" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label for="name">Balance</label>
                                            <div class="form-group mb-3">
                                                <input type="number" class="form-control" name="payable_balance"
                                                    onkeyup="getbalance()" id="balance" onkeyup="EnableDisable(this)"
                                                    readonly>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="name" class="required">Paid Amount</label>
                                            <div class="form-group mb-3">
                                                <input type="number" class="form-control " id="paid_amount"
                                                    name="paid_amount" onkeyup="getbalance()" required
                                                    oninput="validate(this)">
                                            </div>
                                            <div class="form-group ">
                                                <label for="name">Total Balance</label>
                                                <div class="form-group mb-3">
                                                    <input type="number" class="form-control" name="balance"
                                                        id="net_balance" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Fee Collection</label>
                                                <div class="form-group mb-3">
                                                    <input type="date" class="form-control " id="date"
                                                        name="date" required>
                                                </div>
                                            </div>
                                            <center>
                                                <button type="submit" class="btn btn-sm btn-primary mr-2"
                                                    id="register">Save</button>
                                                @if (Auth::user()->role == 'Admin')
                                                    <a href="{{ route('fees.index') }}"
                                                        class="btn  btn-sm btn-danger mr-2">back</a>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#client-dd').on('change', function() {
                var idpackage_name = this.value;
                $("#name-dd").html('');
                $.ajax({
                    url: "{{ url('fetch-clientname') }}",
                    type: "POST",
                    data: {
                        id: idpackage_name,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $("#name-dd").val(result.name)
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#client-dd').on('change', function() {
                var idpackage_name = this.value;
                $("#cnic-dd").html('');
                $.ajax({
                    url: "{{ url('fetch-clientname') }}",
                    type: "POST",
                    data: {
                        id: idpackage_name,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $("#cnic-dd").val(result.cnic)
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#client-dd').on('change', function() {
                var idpackage_name = this.value;
                $("#contact-dd").html('');
                $.ajax({
                    url: "{{ url('fetch-clientcontact') }}",
                    type: "POST",
                    data: {
                        id: idpackage_name,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $("#contact-dd").val(result.contact)
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#client-dd').on('change', function() {
                var idpackage_name = this.value;
                $("#client-cnic").html('');
                $.ajax({
                    url: "{{ url('fetch-cnic') }}",
                    type: "POST",
                    data: {
                        id: idpackage_name,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#client-cnic').html('');
                        $.each(result.cnics, function(key, value) {
                            $("#client-cnic").append('<option value="' + value
                                .id + '">' + value.cnic + '</option>');
                        });
                        $('#city-dd').html('<option value="">Select City</option>');
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#client-dd').on('change', function() {
                var idpackage_name = this.value;
                $("#client-contact").html('');
                $.ajax({
                    url: "{{ url('fetch-contact') }}",
                    type: "POST",
                    data: {
                        id: idpackage_name,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#client-contact').html('');
                        $.each(result.contacts, function(key, value) {
                            $("#client-contact").append('<option value="' + value
                                .id + '">' + value.contact + '</option>');
                        });
                        $('#city-dd').html('<option value="">Select City</option>');
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#client-dd').on('change', function() {
                var idpackage_name = this.value;
                $("#state-dd").html('');
                $.ajax({
                    url: "{{ url('fetch-names') }}",
                    type: "POST",
                    data: {
                        id: idpackage_name,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#state-dd').html('');
                        $.each(result.names, function(key, value) {
                            $("#state-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        $('#city-dd').html('<option value="">Select City</option>');
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#client-dd').on('change', function() {
                var idpackage_name = this.value;
                $("#pre_paid").html('');
                $.ajax({
                    url: "{{ url('fetch-pre_paid') }}",
                    type: "POST",
                    data: {
                        id: idpackage_name,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#pre_paid').html('');
                        $.each(result.fees, function(key, value) {
                            $("#pre_paid").val(value.paid_amount);
                        });
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#client-dd').on('change', function() {
                var idpackage_name = this.value;
                $("#fee-dd").html('');
                $.ajax({
                    url: "{{ url('fetch-packagename') }}",
                    type: "POST",
                    data: {
                        id: idpackage_name,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#fee-dd').html('');
                        $.each(result.names, function(key, value) {
                            $("#fee-dd").val(value.package_fee);
                        });
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#client-dd').on('change', function() {
                var idpackage_name = this.value;
                $("#totalval").html('');
                $.ajax({
                    url: "{{ url('fetch-fees') }}",
                    type: "POST",
                    data: {
                        id: idpackage_name,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#totalval').html('');
                        $.each(result.fees, function(key, value) {
                            $("#totalval").val(value.payable_amount);
                        });

                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#client-dd').on('change', function() {
                var idpackage_name = this.value;
                $("#pre_balance").html('');
                $.ajax({
                    url: "{{ url('fetch-pre_balance') }}",
                    type: "POST",
                    data: {
                        id: idpackage_name,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#pre_balance').html('');
                        $.each(result.fees, function(key, value) {
                            $("#pre_balance").val(value.pre_balance);
                        });

                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#client-dd').on('change', function() {
                var idpackage_name = this.value;
                $("#balance").html('');
                $.ajax({
                    url: "{{ url('fetch-balance') }}",
                    type: "POST",
                    data: {
                        id: idpackage_name,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#balance').html('');
                        $.each(result.fees, function(key, value) {
                            $("#balance").val(value.balance);
                        });

                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#client-dd').on('change', function() {
                var idpackage_name = this.value;
                $("#old_balance").html('');
                $.ajax({
                    url: "{{ url('fetch-old_balance') }}",
                    type: "POST",
                    data: {
                        id: idpackage_name,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#old_balance').html('');
                        $.each(result.fees, function(key, value) {
                            $("#old_balance").val(value.balance);
                        });

                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#client-dd').on('change', function() {
                var idpackage_name = this.value;
                $("#net_balance").html('');
                $.ajax({
                    url: "{{ url('fetch-old_balance') }}",
                    type: "POST",
                    data: {
                        id: idpackage_name,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#net_balance').html('');
                        $.each(result.fees, function(key, value) {
                            $("#net_balance").val(value.balance);
                        });

                    }
                });
            });
        });
    </script>
    <script>
        getbalance = function() {
            var num1 = Number(document.getElementById('pre_balance').value);
            var num2 = Number(document.getElementById('paid_amount').value);
            var num3 = Number(document.getElementById('balance').value);
            var num4 = Number(document.getElementById('totalval').value);
            var num5 = Number(document.getElementById('net_balance').value);
            num5 = num3 - num2;
            document.getElementById('net_balance').value = num5;

        }
    </script>
    <script>
        function focusInput() {
            document.getElementById("client-dd").focus();
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#client-dd').keyup(function() {
                var ProductName = this.value;
                $.ajax({
                    url: "{{ url('/fetch-productname') }}",
                    type: "POST",
                    data: {
                        product_name: ProductName,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(res) {
                        var s;
                        for (var i = 0; i < res.length; i++) {
                            s += '<option value="' + res[i].id + '" >' + res[i].name + '&nbsp' +
                                res[i].cnic + '&nbsp' + res[i].contact + '&nbsp' + '</option>';
                        }
                        $("#customerlist").html(s);
                        console.log(res);
                    }
                });
            });
        });
    </script>

    <!-- Ajax for cnic -->

    <script>
        function focusInput() {
            document.getElementById("cnic-search").focus();
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            $('#cnic-search').keyup(function() {
                var ProductName = this.value;
                $.ajax({
                    url: "{{ url('/fetch-productcnic') }}",
                    type: "POST",
                    data: {
                        product_name: ProductName,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(res) {
                        var s;
                        for (var i = 0; i < res.length; i++) {
                            s += '<option value="' + res[i].id + '" >' + res[i].cnic + '&nbsp' +
                                '</option>';
                        }
                        $("#customerlist").html(s);
                        console.log(res);
                    }
                });
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $('#cnic-search').on('change', function() {
                var idpackage_name = this.value;
                $("#name-dd").html('');
                $.ajax({
                    url: "{{ url('fetch-Name1forcnic') }}",
                    type: "POST",
                    data: {
                        id: idpackage_name,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $("#name-dd").val(result.name)
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#cnic-search').on('change', function() {
                var idpackage_name = this.value;
                $("#contact-dd").html('');
                $.ajax({
                    url: "{{ url('fetch-Contact1forcnic') }}",
                    type: "POST",
                    data: {
                        id: idpackage_name,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $("#contact-dd").val(result.contact)
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#cnic-search').on('change', function() {
                var idpackage_name = this.value;
                $("#state-dd").html('');
                $.ajax({
                    url: "{{ url('fetch-names') }}",
                    type: "POST",
                    data: {
                        id: idpackage_name,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#state-dd').html('');
                        $.each(result.names, function(key, value) {
                            $("#state-dd").append('<option value="' + value
                                .id + '">' + value.name + value.mb + '</option>');
                        });
                        $('#city-dd').html('<option value="">Select City</option>');
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#cnic-search').on('change', function() {
                var idpackage_name = this.value;
                $("#cnic-dd").html('');
                $.ajax({
                    url: "{{ url('fetch-cnicforcustomer') }}",
                    type: "POST",
                    data: {
                        id: idpackage_name,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {

                        $("#cnic-dd").val(result.cnic)
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#cnic-search').on('change', function() {
                var idpackage_name = this.value;
                $("#totalval").html('');
                $.ajax({
                    url: "{{ url('fetch-fees') }}",
                    type: "POST",
                    data: {
                        id: idpackage_name,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#totalval').html('');
                        $.each(result.fees, function(key, value) {
                            $("#totalval").val(value.payable_amount);
                        });

                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#cnic-search').on('change', function() {
                var idpackage_name = this.value;
                $("#pre_balance").html('');
                $.ajax({
                    url: "{{ url('fetch-pre_balance') }}",
                    type: "POST",
                    data: {
                        id: idpackage_name,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#pre_balance').html('');
                        $.each(result.fees, function(key, value) {
                            $("#pre_balance").val(value.pre_balance);
                        });

                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#cnic-search').on('change', function() {
                var idpackage_name = this.value;
                $("#balance").html('');
                $.ajax({
                    url: "{{ url('fetch-balance') }}",
                    type: "POST",
                    data: {
                        id: idpackage_name,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#balance').html('');
                        $.each(result.fees, function(key, value) {
                            $("#balance").val(value.balance);
                        });

                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#cnic-search').on('change', function() {
                var idpackage_name = this.value;
                $("#old_balance").html('');
                $.ajax({
                    url: "{{ url('fetch-old_balance') }}",
                    type: "POST",
                    data: {
                        id: idpackage_name,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#old_balance').html('');
                        $.each(result.fees, function(key, value) {
                            $("#old_balance").val(value.balance);
                        });

                    }
                });
            });
        });
    </script>
    <!-- ajax for contact -->
    <script>
        function focusInput() {
            document.getElementById("contact-search").focus();
        }
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            $('#contact-search').keyup(function() {
                var ProductName = this.value;
                $.ajax({
                    url: "{{ url('/fetch-productcontact') }}",
                    type: "POST",
                    data: {
                        product_name: ProductName,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(res) {
                        var s;
                        for (var i = 0; i < res.length; i++) {
                            s += '<option value="' + res[i].id + '" >' + res[i].contact +
                                '&nbsp' + '</option>';
                        }
                        $("#customerlist").html(s);
                        console.log(res);
                    }
                });
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $('#contact-search').on('change', function() {
                var idpackage_name = this.value;
                $("#client-dd").html('');
                $.ajax({
                    url: "{{ url('fetch-namesforcontactname') }}",
                    type: "POST",
                    data: {
                        id: idpackage_name,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#client-dd').html('');
                        $.each(result.names, function(key, value) {
                            $("#client-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        $('#city-dd').html('<option value="">Select City</option>');
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#contact-search').on('change', function() {
                var idpackage_name = this.value;
                $("#client-cnic").html('');
                $.ajax({
                    url: "{{ url('fetch-cnicforcontact') }}",
                    type: "POST",
                    data: {
                        id: idpackage_name,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#client-cnic').html('');
                        $.each(result.cnics, function(key, value) {
                            $("#client-cnic").append('<option value="' + value
                                .id + '">' + value.cnic + '</option>');
                        });
                        $('#city-dd').html('<option value="">Select City</option>');
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#contact-search').on('change', function() {
                var idpackage_name = this.value;
                $("#state-dd").html('');
                $.ajax({
                    url: "{{ url('fetch-names') }}",
                    type: "POST",
                    data: {
                        id: idpackage_name,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#state-dd').html('');
                        $.each(result.names, function(key, value) {
                            $("#state-dd").append('<option value="' + value
                                .id + '">' + value.name + value.mb + '</option>');
                        });
                        $('#city-dd').html('<option value="">Select City</option>');
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#contact-search').on('change', function() {
                var idpackage_name = this.value;
                $("#totalval").html('');
                $.ajax({
                    url: "{{ url('fetch-fees') }}",
                    type: "POST",
                    data: {
                        id: idpackage_name,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#totalval').html('');
                        $.each(result.fees, function(key, value) {
                            $("#totalval").val(value.payable_amount);
                        });

                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#contact-search').on('change', function() {
                var idpackage_name = this.value;
                $("#pre_balance").html('');
                $.ajax({
                    url: "{{ url('fetch-pre_balance') }}",
                    type: "POST",
                    data: {
                        id: idpackage_name,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#pre_balance').html('');
                        $.each(result.fees, function(key, value) {
                            $("#pre_balance").val(value.pre_balance);
                        });

                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#contact-search').on('change', function() {
                var idpackage_name = this.value;
                $("#balance").html('');
                $.ajax({
                    url: "{{ url('fetch-balance') }}",
                    type: "POST",
                    data: {
                        id: idpackage_name,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#balance').html('');
                        $.each(result.fees, function(key, value) {
                            $("#balance").val(value.balance);
                        });

                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#contact-search').on('change', function() {
                var idpackage_name = this.value;
                $("#name-dd").html('');
                $.ajax({
                    url: "{{ url('fetch-clientname') }}",
                    type: "POST",
                    data: {
                        id: idpackage_name,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $("#name-dd").val(result.name)
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#contact-search').on('change', function() {
                var idpackage_name = this.value;
                $("#cnic-dd").html('');
                $.ajax({
                    url: "{{ url('fetch-clientname') }}",
                    type: "POST",
                    data: {
                        id: idpackage_name,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $("#cnic-dd").val(result.cnic)
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#contact-search').on('change', function() {
                var idpackage_name = this.value;
                $("#contact-dd").html('');
                $.ajax({
                    url: "{{ url('fetch-clientcontact') }}",
                    type: "POST",
                    data: {
                        id: idpackage_name,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $("#contact-dd").val(result.contact)
                    }
                });
            });
        });
    </script>
    <!-- for searchable dropdown -->
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
    <script>
        $('#date').val(new Date().toJSON().slice(0, 10));
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

    <script>
        function validate(input) {
            if (/^\s/.test(input.value))
                input.value = '';
        }
    </script>
    <script>
        function validateForm() {
            let x = document.forms["myForm"]["fname"].value;
            if (x == "") {
                alert("Client Name must be filled out");
                return false;
            }
        }
    </script>
@endsection
