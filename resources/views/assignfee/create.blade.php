@extends('master1')

@section('content')
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
        data-backdrop="static" data-keyboard="false" data-toggle='modal'>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Year</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" method="POST" action="{{ route('assignfee.store') }}" id="addform">
                        @csrf
                        <div class="form-group col-md-12">
                            <label for="" class="required">Year</label>
                            <input type="number" class="form-control" id="year_name" name="year_name" required>
                        </div>

                        <center>
                            <button type="submit" data-backdrop="false" class="btn btn-sm btn-danger mr-2"
                                id="my_button">Save</button>
                        </center>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>


    <br><br>
    <div class="container1">
        <center>
            <h1><b> HIFI NET SERVICES </b></h1>
            <p>Govt College Satelitetown Gujranwala</p>
            <h3><u> BILLING CYCLE </u></h3>
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
                                    <form class="forms-sample" method="POST" action="{{ route('assignfee.store') }}"
                                        id="myform">
                                        <div class="card-body">
                                            @csrf
                                            <input type="hidden" name="cal_id" value="">
                                            <div class="row">
                                                <div class="form-group col-md-10">
                                                    <label for="" class="required">Year</label>
                                                    <select name="year" id="year_data"
                                                        class="form-control js-example-basic-single" required>
                                                    </select>
                                                </div>
                                                <br>
                                                <div class="col-md-2">
                                                    <button type="button" class="btn btn-primary" style="margin-top: 4px;"
                                                        data-target="#exampleModal" data-toggle="modal"><i
                                                            class="bi bi-plus-circle"></i></button>
                                                </div>
                                                <div class="form-group col-md-10">
                                                    <label for="" class="required">Month</label>
                                                    <select class="form-control js-example-basic-single" id="month"
                                                        name="month" placeholder="Select month" required>
                                                        <option value="January">January</option>
                                                        <option value="February">February</option>
                                                        <option value="March">March</option>
                                                        <option value="April">April</option>
                                                        <option value="May">May</option>
                                                        <option value="June">June</option>
                                                        <option value="July">July</option>
                                                        <option value="August">August</option>
                                                        <option value="September">September</option>
                                                        <option value="October">October</option>
                                                        <option value="November">November</option>
                                                        <option value="December">December</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <center>
                                                <button type="submit" class="btn btn-sm btn-primary mr-2"
                                                    id="register">Save</button>
                                                <a href="{{ route('fees.create') }}"
                                                    class="btn btn-sm btn-danger mr-2">back</a>
                                            </center>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                                    <h3>Year List</h3>
                                    <br>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped" id="example">
                                            <thead>
                                                <tr style="padding: 4px;">
                                                    <th style="font-size:14px;padding: 4px;">S No</th>
                                                    <th style="font-size:14px;padding: 4px;">Year</th>
                                                    <th style="font-size:14px;padding: 4px;text-align: center;">Month</th>
                                                    <th style="font-size:14px;padding: 4px;text-align: center;"> Status
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($calender as $key => $list)
                                                    <tr style="padding:1px">
                                                        <td style="width: 2%;padding:1px;">{{ $key + 1 }}</td>
                                                        <td style="width: 2%;padding:1px;">{{ $list->year }}</td>
                                                        <td style="width: 3%;padding:1px;text-align: center;">
                                                            {{ $list->month }}</td>
                                                        @if ($list->status == 'Yes')
                                                            <td style="width: 2%;padding:1px; text-align: center;"><span
                                                                    class="label label-danger"
                                                                    style="border-radius: 3px">Not Active</span>
                                                            </td>
                                                        @endif
                                                        @if ($list->status == 'submit')
                                                            <td style="width: 2%;padding:1px; text-align: center;"><span
                                                                    class="label label-warning"
                                                                    style="border-radius: 3px">Activite</span>
                                                            </td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        // Fetches all years
        FetchAllYear();

        function FetchAllYear() {
            $.ajax({
                method: "get",
                url: "{{ route('fee_data') }}",
                success: function(res) {
                    var s = '<option value="" required>--- Select year ---</option>';
                    for (var i = 0; i < res.length; i++) {
                        s += '<option value="' + res[i].year + '">' + res[i].year + '</option>';
                    }
                    $("#year_data").html(s);
                    // console.log(res)
                }
            });
        }
        $(document).ready(function() {
            $('#addform').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "/feeadd",
                    data: $('#addform').serialize(),
                    success: function(response) {
                        if (response.status === 200) {
                            FetchAllYear();

                            swal.fire("Done!", "Year Added succesfully !", "success");

                        } else if (response.status === 400) {
                            swal.fire("Error!", "This year already exist!", "error");

                        }
                        $('#addform')[0].reset();
                        $('#exampleModal').modal('toggle');
                        $(".modal-backdrop").remove();


                    },
                    error: function(error) {
                        console.log(error)
                        swal("Done!", "Year Added succesfully !", "success");
                    }

                });
            });
        });
    </script>
    <script>
        $('#my_button').click(function() {
            setTimeout(function() {
                $('#exampleModal').modal('hide');
            }, 2000);
        });
    </script>
@endsection
