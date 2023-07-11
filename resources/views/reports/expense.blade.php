@extends('master1')
@section('content')
<br>
<br>
<div class="container1">
    <center>
        <h1><b> HIFI NET SERVICES </b></h1>
        <p>Govt College Satellite Town Gujranwala</p>
        <h3><u> EXPENSE REPORT </u></h3>
    </center>
</div>
<div class="container" style="padding-top: 22px">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="sparkline9-list mt-b-30">
            <div class="sparkline9-hd">
                <div class="main-sparkline9-hd">
                    <form action="{{ route('reports.expense') }}" method="get">
                        @csrf
                        <div class="col-md-3">
                            <b>From </b>
                            <input type="date" name="date1" class="form-control" value="{{$mytime}}">
                        </div>
                        <div class="col-md-3">
                            <b>To </b>
                            <input type="date" class="form-control" name="date2" value="{{$mytime1}}" id="">
                        </div>
                        <div class="col-md-4">
                            <b>Expense Name</b>
                            <input list="customerlist" tabIndex="1" autofocus class="form-control" name="expensefilter" id="customer-dd">
                            <datalist id="customerlist">
                            </datalist>
                            <input type="hidden" name="expensefilter" id="customer-dd-hidden">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-sm btn-danger p-2 m-2"><i class="bi bi-search"></i></button>
                        <a href="{{ route('reports.expense') }}" type="button" style="" value="" class=" btn btn-sm btn-warning"><i class="bi bi-arrow-clockwise"></i></a>

                    </form>
                </div>
                <br>
                <br>
            </div>
            <div class="sparkline9-graph">
                <div class="static-table-list">
                    <div class="table-responsive">
                        <table class="table sparkle-table table-responsive container1 mb-0" id="example">
                            <thead style="padding: 4px;">
                                <tr style="padding: 4px;">
                                    <th style="font-size:14px;padding: 4px;">S No.</th>
                                    <th style="font-size:14px;padding: 4px;">Expense Categroy</th>
                                    <th style="font-size:14px;padding: 4px;"> Amount </th>
                                    <th style="font-size:14px;padding: 4px;"> Added by </th>
                                    <th style="font-size:14px;padding: 4px;padding-left:42px"> Date </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($data)
                                @foreach ($data as $key => $list)
                                <tr style="padding: 1px;">
                                    <td style="width: 5%;padding: 1px;">{{ $key + 1 }}</td>
                                    <td style="width: 5%;padding: 1px;">{{ $list->name }}</td>
                                    <td style="width: 5%;padding: 1px;">{{ $list->amount }}</td>
                                    <td style="width: 5%;padding: 1px;">{{ $list->added_by }}</td>
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
<script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
<script>
    var dataTable = $('#example').dataTables()
</script>

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
                url: "{{url('/fetch-expensename')}}",
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


@endsection
