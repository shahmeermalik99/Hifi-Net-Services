@extends('master1')
@section('content')
<br>
<br>
<div class="container1">
    <center>
        <h1><b> HIFI NET SERVICES </b></h1>
        <p>Govt College Satellite Town Gujranwala</p>
        <h3><u> FEEDBACK LIST </u></h3>
    </center>
</div>
<div class="container" style="padding-top: 22px">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="sparkline9-list mt-b-30">
            <div class="sparkline9-hd">
                <div class="main-sparkline9-hd">
                    @if (Auth::user()->role == "Customer")
                    <a href="{{ route('feedbacks.create') }}" type="button" id="button" class="btn btn-primary pb-2" style="float: right;">Add Feedback</a>
                    @endif
                </div>
                <br>
                <br>
            </div>
            <div class="sparkline9-graph">
                <div class="static-table-list">
                    <div class="table-responsive">
                        @if(Auth::user()->role == "Customer")
                        <table class="table sparkle-table table-responsive  mb-0" id="example">
                            <thead style="padding: 4px;">
                                <tr style="padding: 4px;">
                                    <th style="font-size:14px;padding: 4px;">SNo.</th>
                                    <th style="font-size:14px;padding: 4px;">Title </th>
                                    <th style="font-size:14px;padding: 4px;">Message</th>
                                    <th style="font-size:14px;padding: 4px;padding-left:100px"> Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cust_feedback as $key => $list)
                                <tr style="padding: 1px;">
                                    <td style="width: 5%;padding: 1px;">{{ $key + 1 }}</td>
                                    <td style="width: 5%;padding: 1px;">{{ $list->subject }}</td>
                                    <td style="width: 5%;padding: 1px;">{{ $list->message }}</td>
                                    <td style="width: 2%;padding: 1px;">
                                        <center>
                                        <a type="button" href="{{ route('feedbacks.edit', $list->id) }}" class="btn btn-primary"><i class="bi bi-pencil"></i></a>
                                        <form method="POST" action="{{ route('feedbacks.destroy', $list->id) }}" style="display:inline-block">
                                            @csrf
                                            <input name="_method" type="hidden" value="POST">
                                            <button type="submit" class="btn btn-danger btn-flat show_confirm " data-toggle="tooltip" title='Delete'><i class="bi bi-archive"></i></button>
                                        </form>
                                    </center>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                        @else
                        <table class="table sparkle-table table-responsive  mb-0" id="example">
                            <thead style="padding: 4px;">
                                <tr style="padding: 4px;">
                                    <th style="font-size:14px;padding: 4px;">SNo.</th>
                                    <th style="font-size:14px;padding: 4px;">Client Name.</th>
                                    <th style="font-size:14px;padding: 4px;">Title </th>
                                    <th style="font-size:14px;padding: 4px;">Message</th>
                                    <th style="font-size:14px;padding: 4px;">Date</th>
                                    <th style="font-size:14px;padding: 4px;padding-left:42px"> Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($feedback as $key => $list)
                                <tr style="padding: 1px;">
                                    <td style="width: 5%;padding: 1px;">{{ $key + 1 }}</td>
                                    <td style="width: 5%;padding: 1px;">{{ $list->name }}</td>
                                    <td style="width: 5%;padding: 1px;">{{ $list->subject }}</td>
                                    <td style="width: 5%;padding: 1px;">{{ $list->message }}</td>
                                    <td style="width: 5%;padding: 1px;">{{ $list->date }}</td>
                                    <td style="width: 2%;padding: 1px;">
                                    <form method="POST" action="{{ route('feedbacks.destroy', $list->id) }}" style="display:inline-block">
                                        @csrf
                                        <input name="_method" type="hidden" value="POST">
                                        <button type="submit" class="btn btn-danger btn-flat show_confirm " data-toggle="tooltip" title='Delete'><i class="bi bi-archive"></i></button>
                                    </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var dataTable = $('#example').dataTable()
</script>
@endsection


