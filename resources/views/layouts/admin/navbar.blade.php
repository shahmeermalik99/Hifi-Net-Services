@php
use App\Models\User;
use Illuminate\Support\Facades\Auth;
$id = Auth::user()->id;
$user = User::findorFail($id);
use Carbon\carbon;
$day = Carbon::today()->format('l');
$mytime = Carbon::now()->format('d-m-Y');
@endphp
<div class="header-top-area">
    <div class="container-fluid ">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="header-top-wraper ">
                    <div class="row">
                        <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                            <div class="menu-switcher-pro">
                                <button type="button" id="sidebarCollapse"
                                    class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                    <i class="fa fa-bars"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                            <div class="header-top-menu tabl-d-n">
                                <div id="" class="clock" style="color:#fff;  padding: 20px; font-size:17px;">
                                    <span>{{ $day }}</span>
                                    <span>{{ $mytime }}</span>
                                    <span id="clock" onload="currentTime()"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                            <div class="header-right-info">
                                <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                    <li class="nav-item">
                                        <a href="#" data-toggle="dropdown" role="button" aria-expanded="false"
                                            class="nav-link dropdown-toggle">
                                            <i class="fa fa-user adminpro-user-rounded header-riht-inf"
                                                aria-hidden="true" style="margin-left: 122px;"></i>
                                            <span class="admin-name">{{ Auth::user()->name }}</span>
                                        </a>
                                        <ul role="menu"
                                            class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                            <li><a href="{{ route('users.profile') }}"><span
                                                        class="fa fa-user author-log-ic"></span> My Profile</a>
                                            </li>
                                            <li><a href="{{route('settings.edit', $user->id)}}"><span
                                                        class="fa fa-cog author-log-ic"></span> Change Password</a>
                                            </li>
                                            <li> <a href="{{ route('logout') }}" class="dropdown-item"
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    <span class="fa fa-lock author-log-ic"></span> Logout
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mobile Menu start -->
        <div class="mobile-menu-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="mobile-menu">
                            <nav id="dropdown">

                                <ul class="moblie-nav-menu" id="menu1">

                                        <li class="active"><a href="#" aria-expanded="false"> <i
                                                    class="fa big-icon fa-home icon-wrap"></i> <span
                                                    class="mini-click-non">Dashboard</span></a></li>
                                        <li>
                                            <a class="has-arrow" href="#" aria-expanded="false"><i
                                                    class="fa-solid fa-user-group icon-wrap"></i> <span class="mini-click-non">System
                                                    User</span></a>
                                            <ul class="submenu-angle" aria-expanded="false">
                                                <li><a title="Inbox" href="#"> <span class="mini-sub-pro">Add
                                                            System User</span></a></li>
                                                <li><a href=""><span class="mini-sub-pro">System User
                                                            List</span></a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a class="has-arrow" href="#" aria-expanded="false"><i
                                                    class="fa-solid fa-user-group icon-wrap"></i> <span
                                                    class="mini-click-non">Client</span></a>
                                            <ul class="submenu-angle" aria-expanded="false">
                                                <li><a title="Inbox" href=""> <span
                                                            class="mini-sub-pro">New Connection</span></a></li>

                                                    <li><a href="#"> <span class="mini-sub-pro">All Client
                                                                List</span></a></li>
                                                    <li><a href="#"> <span class="mini-sub-pro">Verified
                                                                List</span></a></li>

                                                    <li><a href="#"> <span class="mini-sub-pro">All Client
                                                                List</span></a></li>
                                                    <li><a href="#"> <span class="mini-sub-pro">Deactive
                                                                Client List</span></a></li>
                                                    <li><a href="#"> <span class="mini-sub-pro">Verified
                                                                List</span></a></li>

                                                <li><a href="#"> <span class="mini-sub-pro">Change
                                                            Package</span></a></li>
                                                <li><a href="#"> <span class="mini-sub-pro">Add
                                                            Service</span></a></li>

                                                    <li><a href="#"> <span class="mini-sub-pro">Search
                                                                Client </span></a></li>
                                                <li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a class="has-arrow" href="#" aria-expanded="false"><i
                                                    class="fa-solid fa-chart-area icon-wrap"></i> <span
                                                    class="mini-click-non">Area</span></a>
                                            <ul class="submenu-angle" aria-expanded="false">
                                                <li><a title="Inbox" href="#"> <span
                                                            class="mini-sub-pro">Add Area</span></a></li>
                                                <li><a href="#"> <span class="mini-sub-pro">Area
                                                            List</span></a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-map-o sub-icon-mg"
                                                    aria-hidden="true"></i> <span class="mini-click-non">Package</span></a>
                                            <ul class="submenu-angle" aria-expanded="false">
                                                <li><a title="Inbox" href="#"> <span
                                                            class="mini-sub-pro">Add Package</span></a></li>
                                                <li><a href="#"> <span class="mini-sub-pro">Package
                                                            List</span></a></li>

                                            </ul>
                                        </li>
                                        <li>
                                            <a class="has-arrow" href="#" aria-expanded="false"><i
                                                    class="fa-solid fa-chart-area icon-wrap"></i> <span
                                                    class="mini-click-non">Expense</span></a>
                                            <ul class="submenu-angle" aria-expanded="false">
                                                <li><a title="Inbox" href="#"> <span
                                                            class="mini-sub-pro"> Expense Categroy</span></a></li>
                                                <li><a title="Inbox" href="#"> <span
                                                            class="mini-sub-pro">Categroy List</span></a></li>
                                                <li><a href="#"> <span class="mini-sub-pro">Add Expense
                                                        </span></a></li>
                                                <li><a href="#"> <span class="mini-sub-pro"> Expense
                                                            List</span></a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a class="has-arrow" href="#" aria-expanded="false"><i
                                                    class="fa-solid fa-money-bill-1-wave icon-wrap"></i> <span
                                                    class="mini-click-non">Fee</span></a>
                                            <ul class="submenu-angle" aria-expanded="false">
                                                <li><a title="Inbox" href="#"> <span
                                                            class="mini-sub-pro">Add Fee</span></a></li>

                                                    <li><a href="#"> <span class="mini-sub-pro">Fee
                                                                List</span></a></li>
                                                <li><a href="#"> <span class="mini-sub-pro">Billing
                                                            Cycle</span></a></li>

                                            </ul>
                                        </li>

                                        <li>
                                            <a class="has-arrow" href="#" aria-expanded="false"><i
                                                    class="fa-solid fa-circle-user icon-wrap"></i> <span
                                                    class="mini-click-non">Account</span></a>
                                            <ul class="submenu-angle" aria-expanded="false">
                                                <li><a href="#"> <span class="mini-sub-pro">Account
                                                            List</span></a></li>
                                            </ul>
                                        </li>

                                        <li>
                                            <a class="has-arrow" href="#" aria-expanded="false"><i
                                                    class="bi bi-chat-left icon-wrap"></i> <span class="mini-click-non ">Complaint
                                                    <span style=" font-size:15px; margin:0px 12px" class="badge"></span></span></a>
                                            <ul class="submenu-angle" aria-expanded="false" dis>

                                                <li><a href="#"> <span class="mini-sub-pro">Message</span></a>
                                                    {{-- <li><a href="{{ route('messages') }}"> <span class="mini-sub-pro">Message</span></a> --}}
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a class="has-arrow" href="#" aria-expanded="false"><i
                                                    class="fa big-icon fa-files-o icon-wrap"></i> <span
                                                    class="mini-click-non">Reports</span></a>
                                            <ul class="submenu-angle" aria-expanded="false">
                                                <li><a href="#"> <span
                                                            class="mini-sub-pro">Users</span></a></li>
                                                <li>
                                                    <a class="has-arrow" href="#" aria-expanded="false"><span
                                                            class="mini-click-non">Clients</span></a>
                                                    <ul class="submenu-angle" aria-expanded="false">

                                                        <li><a href="#"><span
                                                                    class="mini-sub-pro">Clients</span></a></li>
                                                        <li><a href="#"> <span
                                                                    class="mini-sub-pro">Client Area</span></a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#"><span
                                                            class="mini-sub-pro">Expense</span></a></li>
                                                <li><a href="#"> <span class="mini-sub-pro">Fee</span></a>
                                                </li>
                                                <li><a href="#"><span
                                                            class="mini-sub-pro">Accounts</span></a></li>
                                            </ul>
                                        </li>

                                        <li>
                                            <a class="has-arrow" href="#" aria-expanded="false"><i
                                                    class="fa big-icon fa-files-o icon-wrap"></i> <span
                                                    class="mini-click-non">Receiveable</span></a>
                                            <ul class="submenu-angle" aria-expanded="false">
                                                <li><a href="#"> <span class="mini-sub-pro">All
                                                            Receivable</span></a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <br><br><br>
                                        </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mobile Menu end -->
    </div>
</div>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
<!-- /. NAV TOP  -->
<script>
    function currentTime() {
        let date = new Date();
        let hh = date.getHours();
        let mm = date.getMinutes();
        let ss = date.getSeconds();
        let session = "AM";

        if (hh === 0) {
            hh = 12;
        }
        if (hh > 12) {
            hh = hh - 12;
            session = "PM";
        }

        hh = (hh < 10) ? "0" + hh : hh;
        mm = (mm < 10) ? "0" + mm : mm;
        ss = (ss < 10) ? "0" + ss : ss;

        let time = hh + ":" + mm + ":" + ss + " " + session;

        document.getElementById("clock").innerText = time;
        let t = setTimeout(function() {
            currentTime()
        }, 1000);
    }
    currentTime();
</script>
