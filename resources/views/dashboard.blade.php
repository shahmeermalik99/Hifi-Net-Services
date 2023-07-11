@extends('master1')
@section('content')
    @php
        use App\Models\Account;
        use App\Models\Client;
        use Illuminate\Support\Carbon;
        use Illuminate\Support\Facades\DB;
        $current_month_receiveble = DB::table('accounts')
            ->join('clients', 'clients.id', '=', 'accounts.customer_id')
            ->whereRaw('accounts.id = (SELECT MAX(id) FROM accounts where accounts.customer_id=clients.id)')
            ->where('accounts.status', '!=', 'deactive')
            ->sum('balance');

        $current_month_receiveble_customer = DB::table('accounts')
            ->join('clients', 'clients.id', '=', 'accounts.customer_id')
            ->where('clients.id', '=', Auth::user()->auth_id)
            ->whereRaw('accounts.id = (SELECT MAX(id) FROM accounts where accounts.customer_id=clients.id)')
            ->sum('balance');
        $current_receiveble = account::whereYear('date', Carbon::now()->year)
            ->whereMonth('date', Carbon::now()->month)
            ->where('accounts.status', '!=', 'deactive')
            ->sum('paid_amount');
        $current_receiveble_customer = account::where('accounts.customer_id', '=', Auth::user()->auth_id)
            ->whereYear('date', Carbon::now()->year)
            ->whereMonth('date', Carbon::now()->month)
            ->sum('paid_amount');

        $client = client::where('id', Auth::user()->auth_id )->first();
        $client_deactivte = client::where('id', Auth::user()->auth_id)->where('status' , '!=' , 'yes')->first();
    @endphp
    <style>
        #nav {
            margin: auto;
            height: 100%;
            background-color: #b71707;
            padding-bottom: 32px;
        }

        #nav-cust {
            margin: auto;
            height: 180px;
            background-color: #b71707;
        }
    </style>
    @if (Auth::user()->role == 'Admin')
        <center>
            <div class="container-fuild" id="nav">
                <div class="row" style="margin: auto; padding-top:32px">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="analytics-adminpro-wrap ant-res-b-30 reso-mg-b-30">
                            <div class="skill-content-3 analytics-adminpro">
                                <div class="skill">
                                    <div class="progress">
                                        <div class="lead-content">
                                            <h3><span class="counter"></span>
                                                {{ DB::table('users')->where('users.status', '=', 'yes')->count() }}
                                            </h3>
                                            <p>Total Users</p>
                                        </div>
                                        <div class="progress-bar wow fadeInLeft" data-progress="95%"
                                            style="width: 95%; visibility: visible; animation-duration: 1.5s; animation-delay: 1.2s; animation-name: fadeInLeft;"
                                            data-wow-duration="1.5s" data-wow-delay="1.2s">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="analytics-adminpro-wrap reso-mg-b-30">
                            <div class="skill-content-3 analytics-adminpro analytics-adminpro4">
                                <div class="skill">
                                    <div class="progress">
                                        <div class="lead-content">
                                            <h3><span class="counter"></span>
                                                {{ DB::table('clients')->where('clients.status', '=', 'yes')->count() }}
                                            </h3>
                                            <p>Total Clients</p>
                                        </div>
                                        <div class="progress-bar wow fadeInLeft" data-progress="85%"
                                            style="width: 85%; visibility: visible; animation-duration: 1.5s; animation-delay: 1.2s; animation-name: fadeInLeft;"
                                            data-wow-duration="1.5s" data-wow-delay="1.2s">
                                            <!-- <span>{{ DB::table('clients')->where('clients.status', '=', 'yes')->count() }}</span> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="analytics-adminpro-wrap">
                            <div class="skill-content-3 analytics-adminpro analytics-adminpro2">
                                <div class="skill">
                                    <div class="progress progress-bt">
                                        <div class="lead-content">
                                            <h3><span class="counter"></span>
                                                {{ DB::table('clients')->where('clients.status', '=', 'yes')->where('clients.var_cust', '=', 'Approve')->count() }}
                                            </h3>
                                            <p>Total Verified Clients</p>
                                        </div>
                                        <div class="progress-bar wow fadeInLeft" data-progress="93%"
                                            style="width: 93%; visibility: visible; animation-duration: 1.5s; animation-delay: 1.2s; animation-name: fadeInLeft;"
                                            data-wow-duration="1.5s" data-wow-delay="1.2s">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="analytics-adminpro-wrap ant-res-b-30 res-mg-t-30">
                            <div class="skill-content-3 analytics-adminpro">
                                <div class="skill">
                                    <div class="progress">
                                        <div class="lead-content">
                                            <h3><span class="counter"> </span>
                                                {{ DB::table('clients')->where('clients.status', '=', 'yes')->where('clients.var_cust', '=', 'Approved')->count() }}
                                            </h3>
                                            <p>Total Non Verified Clients</p>
                                        </div>
                                        <div class="progress-bar wow fadeInLeft" data-progress="95%"
                                            style="width: 95%; visibility: visible; animation-duration: 1.5s; animation-delay: 1.2s; animation-name: fadeInLeft;"
                                            data-wow-duration="1.5s" data-wow-delay="1.2s">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row" style="margin: auto;">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="analytics-adminpro-wrap ant-res-b-30 res-mg-t-20">
                            <div class="skill-content-3 analytics-adminpro">
                                <div class="skill">
                                    <div class="progress">
                                        <div class="lead-content">
                                            <h3><span class="counter"></span>
                                                {{ DB::table('areas')->where('areas.status', '=', 'yes')->count() }}
                                            </h3>
                                            <p>Total Areas</p>
                                        </div>
                                        <div class="progress-bar wow fadeInLeft" data-progress="95%"
                                            style="width: 95%; visibility: visible; animation-duration: 1.5s; animation-delay: 1.2s; animation-name: fadeInLeft;"
                                            data-wow-duration="1.5s" data-wow-delay="1.2s">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="analytics-adminpro-wrap reso-mg-b-30 res-mg-t-30">
                            <div class="skill-content-3 analytics-adminpro analytics-adminpro4">
                                <div class="skill">
                                    <div class="progress">
                                        <div class="lead-content">
                                            <h3><span class="counter"></span>
                                                {{ DB::table('packages')->where('packages.status', '=', 'yes')->count() }}
                                            </h3>
                                            <p>Total Packages</p>
                                        </div>
                                        <div class="progress-bar wow fadeInLeft" data-progress="85%"
                                            style="width: 85%; visibility: visible; animation-duration: 1.5s; animation-delay: 1.2s; animation-name: fadeInLeft;"
                                            data-wow-duration="1.5s" data-wow-delay="1.2s">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="analytics-adminpro-wrap">
                            <div class="skill-content-3 analytics-adminpro analytics-adminpro2">
                                <div class="skill">
                                    <div class="progress progress-bt">
                                        <div class="lead-content">
                                            <h3><span class="counter"></span> {{ $current_month_receiveble }}</h3>
                                            <p>Total Receivables</p>
                                        </div>
                                        <div class="progress-bar wow fadeInLeft" data-progress="93%"
                                            style="width: 93%; visibility: visible; animation-duration: 1.5s; animation-delay: 1.2s; animation-name: fadeInLeft;"
                                            data-wow-duration="1.5s" data-wow-delay="1.2s">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="analytics-adminpro-wrap ant-res-b-30 reso-mg-b-30">
                            <div class="skill-content-3 analytics-adminpro">
                                <div class="skill">
                                    <div class="progress">
                                        <div class="lead-content">
                                            <h3><span class="counter"></span> {{ $current_receiveble }}</h3>
                                            <p>Total Received this month</p>
                                        </div>
                                        <div class="progress-bar wow fadeInLeft" data-progress="95%"
                                            style="width: 95%; visibility: visible; animation-duration: 1.5s; animation-delay: 1.2s; animation-name: fadeInLeft;"
                                            data-wow-duration="1.5s" data-wow-delay="1.2s">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </center>
    @endif
    @if (Auth::user()->role == 'Super Admin')
        <center>
            <div class="container-fuild" id="nav">
                <div class="row" style="margin: auto; padding-top:32px">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="analytics-adminpro-wrap ant-res-b-30 reso-mg-b-30">
                            <div class="skill-content-3 analytics-adminpro">
                                <div class="skill">
                                    <div class="progress">
                                        <div class="lead-content">
                                            <h3><span class="counter"></span>
                                                {{ DB::table('users')->where('users.status', '=', 'yes')->count() }}
                                            </h3>
                                            <p>Total Users</p>
                                        </div>
                                        <div class="progress-bar wow fadeInLeft" data-progress="95%"
                                            style="width: 95%; visibility: visible; animation-duration: 1.5s; animation-delay: 1.2s; animation-name: fadeInLeft;"
                                            data-wow-duration="1.5s" data-wow-delay="1.2s">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="analytics-adminpro-wrap reso-mg-b-30">
                            <div class="skill-content-3 analytics-adminpro analytics-adminpro4">
                                <div class="skill">
                                    <div class="progress">
                                        <div class="lead-content">
                                            <h3><span class="counter"></span>
                                                {{ DB::table('clients')->where('clients.status', '=', 'yes')->count() }}
                                            </h3>
                                            <p>Total Clients</p>
                                        </div>
                                        <div class="progress-bar wow fadeInLeft" data-progress="85%"
                                            style="width: 85%; visibility: visible; animation-duration: 1.5s; animation-delay: 1.2s; animation-name: fadeInLeft;"
                                            data-wow-duration="1.5s" data-wow-delay="1.2s">
                                            <!-- <span>{{ DB::table('clients')->where('clients.status', '=', 'yes')->count() }}</span> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="analytics-adminpro-wrap">
                            <div class="skill-content-3 analytics-adminpro analytics-adminpro2">
                                <div class="skill">
                                    <div class="progress progress-bt">
                                        <div class="lead-content">
                                            <h3><span class="counter"></span>
                                                {{ DB::table('clients')->where('clients.status', '=', 'yes')->where('clients.var_cust', '=', 'Approve')->count() }}
                                            </h3>
                                            <p>Total Verified Clients</p>
                                        </div>
                                        <div class="progress-bar wow fadeInLeft" data-progress="93%"
                                            style="width: 93%; visibility: visible; animation-duration: 1.5s; animation-delay: 1.2s; animation-name: fadeInLeft;"
                                            data-wow-duration="1.5s" data-wow-delay="1.2s">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="analytics-adminpro-wrap ant-res-b-30 res-mg-t-30">
                            <div class="skill-content-3 analytics-adminpro">
                                <div class="skill">
                                    <div class="progress">
                                        <div class="lead-content">
                                            <h3><span class="counter"> </span>
                                                {{ DB::table('clients')->where('clients.status', '=', 'yes')->where('clients.var_cust', '=', 'Approved')->count() }}
                                            </h3>
                                            <p>Total Non Verified Clients</p>
                                        </div>
                                        <div class="progress-bar wow fadeInLeft" data-progress="95%"
                                            style="width: 95%; visibility: visible; animation-duration: 1.5s; animation-delay: 1.2s; animation-name: fadeInLeft;"
                                            data-wow-duration="1.5s" data-wow-delay="1.2s">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row" style="margin: auto;">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="analytics-adminpro-wrap ant-res-b-30 res-mg-t-30">
                            <div class="skill-content-3 analytics-adminpro">
                                <div class="skill">
                                    <div class="progress">
                                        <div class="lead-content">
                                            <h3><span class="counter"></span>
                                                {{ DB::table('areas')->where('areas.status', '=', 'yes')->count() }}
                                            </h3>
                                            <p>Total Areas</p>
                                        </div>
                                        <div class="progress-bar wow fadeInLeft" data-progress="95%"
                                            style="width: 95%; visibility: visible; animation-duration: 1.5s; animation-delay: 1.2s; animation-name: fadeInLeft;"
                                            data-wow-duration="1.5s" data-wow-delay="1.2s">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="analytics-adminpro-wrap reso-mg-b-30 res-mg-t-30">
                            <div class="skill-content-3 analytics-adminpro analytics-adminpro4">
                                <div class="skill">
                                    <div class="progress">
                                        <div class="lead-content">
                                            <h3><span class="counter"></span>
                                                {{ DB::table('packages')->where('packages.status', '=', 'yes')->count() }}
                                            </h3>
                                            <p>Total Packages</p>
                                        </div>
                                        <div class="progress-bar wow fadeInLeft" data-progress="85%"
                                            style="width: 85%; visibility: visible; animation-duration: 1.5s; animation-delay: 1.2s; animation-name: fadeInLeft;"
                                            data-wow-duration="1.5s" data-wow-delay="1.2s">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="analytics-adminpro-wrap">
                            <div class="skill-content-3 analytics-adminpro analytics-adminpro2">
                                <div class="skill">
                                    <div class="progress progress-bt">
                                        <div class="lead-content">
                                            <h3><span class="counter"></span> {{ $current_month_receiveble }}</h3>
                                            <p>Total Receivables</p>
                                        </div>
                                        <div class="progress-bar wow fadeInLeft" data-progress="93%"
                                            style="width: 93%; visibility: visible; animation-duration: 1.5s; animation-delay: 1.2s; animation-name: fadeInLeft;"
                                            data-wow-duration="1.5s" data-wow-delay="1.2s">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="analytics-adminpro-wrap ant-res-b-30 res-mg-t-30">
                            <div class="skill-content-3 analytics-adminpro">
                                <div class="skill">
                                    <div class="progress">
                                        <div class="lead-content">
                                            <h3><span class="counter"></span> {{ $current_receiveble }}</h3>
                                            <p>Total Received this month</p>
                                        </div>
                                        <div class="progress-bar wow fadeInLeft" data-progress="95%"
                                            style="width: 95%; visibility: visible; animation-duration: 1.5s; animation-delay: 1.2s; animation-name: fadeInLeft;"
                                            data-wow-duration="1.5s" data-wow-delay="1.2s">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </center>
    @endif

    @if (Auth::user()->role == 'Manager')
        <script>
            window.location = "/data";
        </script>
    @endif

    {{-- Customner Role --}}
    @if (Auth::user()->role == 'Customer')
        <center>
            <div class="container-fuild" id="nav-cust">
                <div class="row" style="margin: auto;  padding-top:32px">
                    <div class="col-md-1"></div>

                    @if($client_deactivte)
                    <h1 style="color: white; margin-top:40px;">You are Temporary Block by admin. Please Contact to admin</h1>
                    @else

                    @if ($client)
                    <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                        <div class="analytics-adminpro-wrap res-mg-t-30">
                            <div class="skill-content-3 analytics-adminpro analytics-adminpro2">
                                <div class="skill">
                                    <div class="progress progress-bt">
                                        <div class="lead-content">
                                            <h3><span class="counter"></span> {{ $current_month_receiveble_customer }}
                                            </h3>
                                            <p>Total Payable</p>
                                        </div>
                                        <div class="progress-bar wow fadeInLeft" data-progress="93%"
                                            style="width: 93%; visibility: visible; animation-duration: 1.5s; animation-delay: 1.2s; animation-name: fadeInLeft;"
                                            data-wow-duration="1.5s" data-wow-delay="1.2s">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                        <div class="analytics-adminpro-wrap ant-res-b-30 reso-mg-b-30">
                            <div class="skill-content-3 analytics-adminpro">
                                <div class="skill">
                                    <div class="progress">
                                        <div class="lead-content">
                                            <h3><span class="counter"></span> {{ $current_receiveble_customer }}</h3>
                                            <p>Total Paid this month</p>
                                        </div>
                                        <div class="progress-bar wow fadeInLeft" data-progress="95%"
                                            style="width: 95%; visibility: visible; animation-duration: 1.5s; animation-delay: 1.2s; animation-name: fadeInLeft;"
                                            data-wow-duration="1.5s" data-wow-delay="1.2s">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <h1 style="color: white; margin-top:40px;"> Select Package First and Wait for Admin Response</h1>
                @endif
            @endif
                </div>
            </div>
        </center>
    @endif
@endsection
