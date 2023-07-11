@extends('master1')
@section('content')
    <br>
    <br>
    <div class="container1">
        <center>
            <h1><b> HIFI NET SERVICES </b></h1>
            <p>Govt College Satellite Town Gujranwala</p>
            <h3><u> USER LIST </u></h3>
        </center>
    </div>
    <div class="container" style="padding-top: 22px">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="sparkline9-list mt-b-30">
                <div class="sparkline9-hd">
                    <div class="main-sparkline9-hd">
                        @if (Auth::user()->role == 'Super Admin')
                            <a href="{{ route('users.adduser') }}" type="button" id="button"
                                class="btn btn-sm btn-primary pb-2" style="float: right;">Add User</a>
                        @endif
                        @if (Auth::user()->role == 'Admin')
                            <a href="{{ route('users.adduser') }}" type="button" id="button"
                                class="btn btn-sm btn-primary pb-2" style="float: right;">Add User</a>
                        @endif
                    </div>
                    <br>
                    <br>
                </div>

                <div class="sparkline9-graph">
                    <div class="static-table-list">
                        <div class="table-responsive">

                            <table class="table sparkle-table table-responsive  mb-0" id="example">
                                <thead style="padding: 4px;">
                                    <tr style="padding: 4px;">
                                        <th style="font-size:14px;padding: 4px;">S No.</th>
                                        <th style="font-size:14px;padding: 4px;"> Name </th>
                                        <th style="font-size:14px;padding: 4px;"> Phone Number </th>
                                        <th style="font-size:14px;padding: 4px;"> Role </th>
                                        <th style="font-size:14px;padding: 4px;padding-left:42px"> Actions </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $key => $list)
                                        <tr style="padding: 1px;">
                                            <td style="width: 2%;padding: 1px;">{{ $key + 1 }}</td>
                                            <td style="width: 5%;padding: 1px;" data-orderable="false">{{ $list->name }}
                                            </td>
                                            <td style="width: 5%;padding: 1px;" data-orderable="false">{{ $list->contact }}
                                            </td>
                                            <td style="width: 5%;padding: 1px;" data-orderable="false">{{ $list->role }}
                                            </td>
                                            <td style="width: 5%;padding: 1px;">
                                                @if (Auth::user()->role == 'Super Admin')
                                                    <a type="button" href="{{ url('updateuser', $list->id) }}"
                                                        class="btn btn-primary"><i class="bi bi-pencil"></i></a>
                                                @else
                                                    @if ($list->role == 'Super Admin')
                                                        <a type="button" href="" class="btn btn-primary" disabled><i
                                                                class="bi bi-pencil"></i></a>
                                                    @else
                                                        <a type="button" href="{{ url('updateuser', $list->id) }}"
                                                            class="btn btn-primary"><i class="bi bi-pencil"></i></a>
                                                    @endif
                                                @endif


                                                <a type="button" href="{{ url('showuser', $list->id) }}"
                                                    class="btn btn-warning mx-2 py-2 inline"><i
                                                        class="bi bi-eye-fill"></i></a>
                                                @if ($list->role == 'Super Admin')
                                                    <form method="POST" action="{{ url('destroyuser', $list->id) }}"
                                                        style="display:inline-block">
                                                        @csrf
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <button type="submit" class="btn btn-danger btn-flat show_confirm "
                                                            data-toggle="tooltip" disabled title='Delete'><i
                                                                class="bi bi-archive"></i></button>
                                                    </form>
                                                @endif

                                                @if ($list->role != 'Super Admin')
                                                    <form method="POST" action="{{ url('destroyuser', $list->id) }}"
                                                        style="display:inline-block">
                                                        @csrf
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <button type="submit" class="btn btn-danger btn-flat show_confirm "
                                                            data-toggle="tooltip" title='Delete'><i
                                                                class="bi bi-archive"></i></button>
                                                    </form>
                                                @endif

                                            </td>
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
    <script>
        var dataTable = $('#example').dataTable()
    </script>
@endsection
