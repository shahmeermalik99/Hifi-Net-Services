@extends('master1')
@section('content')



    <br>
    <br>
    <div class="container1">
        <center>
            <h1><b> HIFI NET SERVICES </b></h1>
            <p>Govt College Satelitetown Gujranwala</p>
            <h3><u> ACCOUNT LIST </u></h3>
        </center>
    </div>
    <div class="container" style="padding-top: 22px">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="sparkline9-list mt-b-30">
                <div class="sparkline9-hd">

                    <br>
                    <br>
                </div>
                <div class="sparkline9-graph">
                    <div class="static-table-list">
                        <div class="table-responsive">
                            <table class="table sparkle-table table-responsive  mb-0" id="example">
                                @if (Auth::user()->role != 'Customer')
                                    <thead style="padding: 4px;">
                                        <tr style="padding: 4px;">
                                            <th style="font-size:14px;padding: 4px;">S No.</th>
                                            <th style="font-size:14px;padding: 4px;">Client Name</th>
                                            <th style="font-size:14px;padding: 4px;">Alloted Name</th>
                                            <th style="font-size:14px;padding: 4px;"> Contact </th>
                                            <th style="font-size:14px;padding: 4px;"> CNIC Number</th>
                                            <th style="font-size:14px;padding: 4px;"> Balance </th>
                                            <th style="font-size:14px;padding: 4px;"> Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($data)
                                            @foreach ($data as $key => $list)
                                                <tr>
                                                    <td style="width: 3%">{{ $key + 1 }}</td>
                                                    <td style="width: 5%">{{ $list->name }}</td>
                                                    @if ($list->alloted_name == '')
                                                        <td style="width: 5%;padding: 1px;">None</td>
                                                    @else
                                                        <td style="width: 5%;padding: 1px;">{{ $list->alloted_name }}</td>
                                                    @endif
                                                    <td style="width: 5%">{{ $list->contact }}</td>
                                                    <td style="width: 5%">{{ $list->cnic }}</td>
                                                    <td style="width: 5%">{{ $list->balance }}</td>
                                                    <td style="width: 5%;padding: 1px;">
                                                        <a type="button" href="{{ route('accounts.show', $list->id) }}"
                                                            class="btn btn-warning mx-2 py-2 inline"><i
                                                                class="bi bi-eye-fill"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                @elseif(Auth::user()->role == 'Customer')
                                    <thead style="padding: 4px;">
                                        <tr style="padding: 4px;">
                                            <th style="font-size:14px;padding: 4px;">Alloted Name</th>
                                            <th style="font-size:14px;padding: 4px;"> Contact </th>
                                            <th style="font-size:14px;padding: 4px;"> CNIC Number</th>
                                            <th style="font-size:14px;padding: 4px;"> Balance </th>
                                            <th style="font-size:14px;padding: 4px;"> Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($data1)
                                            @foreach ($data1 as $list)
                                                <tr>
                                                    @if ($list->alloted_name == '')
                                                        <td style="width: 5%;">None</td>
                                                    @elseif($list->alloted_name != '')
                                                        <td style="width: 5%;">{{ $list->alloted_name }}</td>
                                                    @endif
                                                    <td style="width: 5%">{{ $list->contact }}</td>
                                                    <td style="width: 5%">{{ $list->cnic }}</td>
                                                    <td style="width: 5%">{{ $list->balance }}</td>
                                                    <td style="width: 5%;padding: 1px;">
                                                        <a type="button" href="{{ route('accounts.show', $list->id) }}"
                                                            class="btn btn-warning mx-2 py-2 inline"><i
                                                                class="bi bi-eye-fill"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                @endif

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var dataTable = $('#example').dataTable({
            "aaSorting": []
        })
    </script>
    <script>
        $(document).ready(function() {

            // Initialize select2
            $("#selUser").select2();

            // Read selected option
            $('#but_read').click(function() {
                var username = $('#selUser option:selected').text();
                var userid = $('#selUser').val();

                $('#result').html("id : " + userid + ", name : " + username);

            });
        });
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
                                '</option>';
                        }
                        $("#customerlist").html(s);
                        console.log(res);
                    }
                });
            });
        });
    </script>

@endsection
