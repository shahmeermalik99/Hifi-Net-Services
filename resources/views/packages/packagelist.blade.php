@extends('master1')

@section('content')
<br>
<br>
<div class="container1">
    <center>
        <h1><b> HIFI NET SERVICE </b></h1>
        <p>Govt College Satellite Town Gujranwala</p>
        <h3><u> PACKAGEs LIST </u></h3>
    </center>
</div>
<div class="container" style="padding-top: 22px">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="sparkline9-list mt-b-30">
            <div class="sparkline9-hd">
                <div class="main-sparkline9-hd">
                    @if (Auth::user()->role == 'Super Admin' or Auth::user()->role == 'Admin')
                    <a href="{{route('packages.addpackage')}}" type="button" id="button" class="btn btn-primary pb-2"
                        style="float:right">Add Package</a>
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
                                    <th style="font-size:14px;padding: 4px;"> Fee </th>
                                    <th style="font-size:14px;padding: 4px;"> Image </th>
                                    <th style="font-size:14px;padding: 4px;"> Description </th>
                                    <th style="font-size:14px;padding: 4px;"> Status </th>
                                    <th style="font-size:14px;padding: 4px;padding-left:42px"> Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($package as $pack )
                                <tr style="padding: 1px;">
                                    <td style="width: 5%;padding: 1px;">{{$loop->index+1}}</td>
                                    <td style="width: 5%;padding: 1px;">{{$pack->name}}</td>
                                    <td style="width: 5%;padding: 1px;">{{$pack->fee}}</td>
                                    <td style="width: 5%;padding: 2px;"><img src="{{asset('uploads/images/'. $pack->image)}}" width="100" height="100" alt=""></td>
                                    <td style="width: 5%;padding: 1px;">{{$pack->description}}</td>
                                    @if($pack->status == 'Yes')
                                    <td style="width: 5%;padding: 1px;">Active</td>
                                        @else
                                        <td style="width: 5%;padding: 1px;">Deactive</td>
                                    @endif
                                    <td style="width: 5%;padding: 1px;">
                                        <a type="button" href="{{url('updatepackage', $pack->id)}}"
                                            class="btn btn-primary"><i class="bi bi-pencil"></i></a>
                                        <a type="button" href="{{url('showpackage', $pack->id)}}"
                                            class="btn btn-warning mx-2 py-2 inline"><i class="bi bi-eye-fill"></i></a>
                                        <form method="POST" action="{{url('destroy1', $pack->id)}}"
                                            style="display:inline-block">
                                            @csrf
                                            {{method_field('delete')}}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="btn btn-danger btn-flat show_package"
                                                data-toggle="tooltip" title='Delete'><i
                                                    class="bi bi-archive"></i></button>
                                        </form>
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
<script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
<script>
    var dataTable = $('#example').dataTable()
</script>
@endsection
