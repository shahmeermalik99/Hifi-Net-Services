@extends('master1')
@section('content')


<br><br>

<div class="container1">
    <center>
        <h1><b> HIFI NET SERVICES </b></h1>
        <p>Govt College Satelitetown Gujranwala</p>
        <h3><u> ADD EXPENSE </u></h3>
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
                                <form class="forms-sample" method="POST" action="{{url('addexpenses')}}">
                                    @csrf
                                    <div class="form-group col-md-12">
                                        <label for="" class="required">Expense Name</label>
                                        <select name="cat_id" id="cat_id" class="form-control js-example-basic-single" required>
                                            <option value="">--- Select Expense Category ---</option>
                                            @foreach ($category as $list)
                                            <option value="{{ $list->id }}">{{ $list->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="" class="required">Amount</label>
                                        <input type="number" class="form-control" id="amount" name="amount" placeholder="" required oninput="validate(this)">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="" class="required">Added By</label>
                                        <input type="text" class="form-control" id="added_by" name="added_by" placeholder="" required oninput="validate(this)">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="" class="required">Date</label>
                                        <input type="date" class="form-control" id="date" name="date"  value="{{ $mytime }}" placeholder=""  required oninput="validate(this)">
                                    </div>
                                    <center>
                                        <button type="submit" class="btn btn-sm btn-primary mr-2" id="">Save</button>
                                        <a href="{{route('expenses.expenselist')}}" class="btn btn-sm btn-danger mr-2">back</a>
                                    </center>

                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- script for remove space -->
<script>
  function validate(input){
  if(/^\s/.test(input.value))
    input.value = '';
}
</script>
@endsection
