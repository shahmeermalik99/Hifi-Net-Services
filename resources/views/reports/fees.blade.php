@extends('master1')
@section('content')
<br>
<br>
<div class="container1">
    <center>
        <h1><b> HIFI NET SERVICES </b></h1>
        <p>Govt College Satellite Town Gujranwala</p>
        <h3><u> FEE REPORT </u></h3>
    </center>
</div>
<div class="container" style="padding-top: 22px">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="sparkline9-list mt-b-30">
            <div class="sparkline9-hd">
                <div class="main-sparkline9-hd">
                    <form action="{{ route('reports.fees') }}" method="get">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <b>From </b>
                                <input type="date" name="date1" class="form-control" value="{{$mytime}}">
                            </div>
                            <div class="col-md-3">
                                <b>To </b>
                                <input type="date" class="form-control" name="date2" value="{{$mytime1}}" id="">
                            </div>
                            <div class="col-md-3">
                                <b>Client</b>
                                <input list="customerlist" tabIndex="1" autofocus class="form-control" name="customerfilter" id="customer-dd">
                                <datalist id="customerlist">
                                </datalist>
                                <input type="hidden" name="customerfilter" id="customer-dd-hidden">
                            </div>
                            <div class="col-md-3">
                                <br>

                                    <button type="submit" class="btn btn-sm btn-danger p-2 m-2"><i class="bi bi-search"></i></button>
                                    <a href="{{ route('reports.fees') }}" type="button" style="" value="" class=" btn btn-sm btn-warning"><i class="bi bi-arrow-clockwise"></i></a>


                            </div>
                        </div>
                    </form>
                </div>
                <br>
                <br>
            </div>
            <!-- <h5 name="customerfilter" class="">Customer Name &nbsp; <b> {{ $customer_name->name ?? ''}}</br></h5> -->
            <br>
            <div class="sparkline9-graph">
                <div class="static-table-list">
                    <div class="table-responsive">
                        <table class="table sparkle-table table-responsive container1 mb-0" id="example">
                            <thead style="padding: 4px;">
                                <tr style="padding: 4px;">
                                    <th style="font-size:14px;padding: 4px;">S No.</th>
                                    <th style="font-size:14px;padding: 4px;"> Client Name </th>
                                    <th style="font-size:14px;padding: 4px;"> Total Payable </th>
                                    <th style="font-size:14px;padding: 4px;"> Paid Amount </th>
                                    <th style="font-size:14px;padding: 4px;"> Balance </th>
                                    <th style="font-size:14px;padding: 4px;"> Date </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($data)
                                @foreach ($data as $key => $list)
                                <tr style="padding: 1px;">
                                    <td style="width: 2%;padding: 1px;">{{ $key + 1 }}</td>
                                    <td style="width: 5%;padding: 1px;">{{ $list->name }}</td>
                                    <td style="width: 5%;padding: 1px;">{{ $list->payable_balance }}</td>
                                    <td style="width: 5%;padding: 1px;">{{ $list->paid_amount }}</td>
                                    <td style="width: 5%;padding: 1px;">{{ $list->balance }}</td>
                                    <td style="width: 5%;padding: 1px;">{{ $list->date }}</td>
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
                        s += '<option value="' + res[i].id + '" >' + res[i].name + '&nbsp' + '</option>';
                    }
                    $("#customerlist").html(s);
                    console.log(res);
                }
            });
        });
    });
</script>
<script>
    var dataTable = $('#example').dataTable()
</script>
@endsection
