@extends('master1')
@section('content')
<br>
<br>
<div class="container1">
    <center>
        <h1><b> HIFI NET SERVICES </b></h1>
        <p>Govt College Satellite Town Gujranwala</p>
        <h3><u> AREA LIST </u></h3>
    </center>
</div>
<div class="container" style="padding-top: 22px">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="sparkline9-list mt-b-30">
            <div class="sparkline9-hd">
                <div class="main-sparkline9-hd">
                    @if (Auth::user()->role == "Super Admin")
                    <a href="{{route('area.addarea')}}" type="button" id="button" class="btn btn-primary pb-2"
                        style="float: right;">Add Area</a>
                    @endif
                    @if (Auth::user()->role == "Admin")
                    <a href="{{route('area.addarea')}}" type="button" id="button" class="btn btn-primary pb-2"
                        style="float: right;">Add Area</a>
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
                                    <th style="font-size:14px;padding: 4px;">SNo.</th>
                                    <th style="font-size:14px;padding: 4px;"> Name </th>
                                    <th style="font-size:14px;padding: 4px;padding-left:42px"> Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($area as $area)
                                <tr style="padding: 1px;">
                                    <td style="width: 5%;padding: 1px;">{{$loop->index+1}}</td>
                                    <td style="width: 5%;padding: 1px;">{{$area->name}}</td>
                                    <td style="width: 5%;padding: 1px;">
                                        <a type="button" href="{{url('updatearea', $area->id)}}"
                                            class="btn btn-primary"><i class="fa-solid fa-pencil"></i></a>
                                        <a type="button" href="{{url('showarea', $area->id)}}"
                                            class="btn btn-warning mx-2 py-2 inline"><i class="fa-solid fa-eye"></i></a>
                                        <form method="POST" action="{{url('destroy3', $area->id)}}"
                                            style="display:inline-block">
                                            @csrf
                                            {{method_field('delete')}}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="btn btn-danger btn-flat show_area "
                                                data-toggle="tooltip" title='Deactivate'><i class="fa-solid fa-box-archive"></i></button>
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

@endsection
