 
@extends('master1')
@section('content')

<br><br>
<div class="container1">
    <center>
        <h1><b> HIFI NET SERVICES </b></h1>
        <p>Govt College Satelitetown Gujranwala</p>
        <h3><u> UPDATE EXPENSE </u></h3>
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
                                <form class="forms-sample" action="{{url('updateexpenses', $expense->id)}}" method="POST" >
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row">
                                        <label for="" class="col-sm-3 col-form-label required">Category Name</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="cat_id" readonly>
                                                @if ($category)

                                                @foreach ($allcategroy as $list)
                                                <option value="{{ $list->id }}" {{$list->id == $expense->cat_id? 'selected' : ''}}> {{$list->name }}</option>
                                                </option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-3 col-form-label required">Amount</label>
                                        <div class="col-sm-9">
                                          <input type="text" name="amount" id="" class="form-control" value="{{$expense->amount}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-3 col-form-label required">Added by</label>
                                        <div class="col-sm-9">
                                          <input type="text" name="added_by" id="" class="form-control" value="{{$expense->added_by}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-3 col-form-label required">Date</label>
                                        <div class="col-sm-9">
                                          <input type="date" name="date" id="" class="form-control" value="{{$expense->date}}" required>
                                        </div>
                                    </div>
                                    <center>
                                        <button type="submit" class="btn btn-sm btn-primary mr-2">Update</button>
                                        <a href="{{route('expenses.expenselist')}}" class="btn btn-sm btn-danger mr-2">back</a>
                                    </center>

                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
  function validate(input){
  if(/^\s/.test(input.value))
    input.value = '';
}
</script>
@endsection
