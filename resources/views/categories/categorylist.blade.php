@extends('master1')
@section('content')


<br>
<br>
<div class="container1">
    <center>
        <h1><b> HIFI NET SERVICES </b></h1>
        <p>Govt College Satellite Town Gujranwala</p>
        <h3><u>   CATEGORY LIST </u></h3>
    </center>
</div>
<div class="container" style="padding-top: 22px">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="sparkline9-list mt-b-30">
            <div class="sparkline9-hd">
                <div class="main-sparkline9-hd">
                    <a href="{{route('categories.addcategory')}}" type="button" id="button" class="btn btn-primary pb-2" style="float: right;">Add Category</a>
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
                                    <th style="font-size:14px;padding: 4px;">Category Name </th>

                                    <th style="font-size:14px;padding: 4px;padding-left:42px"> Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category as $key => $list)
                                <tr style="padding: 1px;">
                                    <td style="width: 5%;padding: 1px;">{{ $key + 1 }}</td>
                                    <td style="width: 5%;padding: 1px;">{{ $list->name }}</td>
                                    <td style="width: 5%;padding: 1px;">
                                        <a type="button" href="{{url('updatecategory', $list->id)}}" class="btn btn-primary"><i class="bi bi-pencil"></i></a>
                                        <a type="button" href="{{url('showcategory', $list->id)}}" class="btn btn-warning mx-2 py-2 inline"><i class="bi bi-eye-fill"></i></a>
                                        <form method="POST" action="{{url('destroy2', $list->id)}}" style="display:inline-block">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="btn btn-danger btn-flat show_confirm " data-toggle="tooltip" title='Delete'><i class="bi bi-archive"></i></button>
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
<script>
    var dataTable = $('#example').dataTable()
</script>
@endsection
