@php
use App\Models\User;
use App\Models\account;
use Illuminate\Support\Facades\Auth;
$id = Auth::user()->id;
$user = User::findorFail($id);
$user_account = account::where('customer_id', '=', Auth::user()->auth_id)->first();
@endphp
<style>
    .side-nav {
        position: sticky;
        overflow-y: scroll;
        max-height: 100vh;
        color: white;
    }
</style>
<div class="left-sidebar-pro">
    <nav id="sidebar" class="">
        <div class="sidebar-header">
            <a href="index.html"><img class="main-logo" style=" padding: 10px;height: 80px;"
                    src="{{asset('front_end/img/hifi-1.png')}}" alt="" /></a>
            <!-- <strong><img src="{{asset('assets/img/logo/logosn.png')}}" alt="" /></strong> -->
        </div>
        <div class="left-custom-menu-adp-wrap comment-scrollbar">
            <nav class="sidebar-nav left-sidebar-menu-pro">
                <ul class="metismenu" id="menu1">
                    @if (Auth::user()->role == 'Admin')
                    <li class="active"><a href="{{ route('dashboard') }}" aria-expanded="false"> <i
                                class="fa big-icon fa-home icon-wrap"></i> <span
                                class="mini-click-non">Dashboard</span></a></li>
                    @endif
                    @if (Auth::user()->role == 'Super Admin')
                    <li class="active"><a href="{{ route('dashboard') }}" aria-expanded="false"> <i
                                class="fa big-icon fa-home icon-wrap"></i> <span
                                class="mini-click-non">Dashboard</span></a></li>
                    @endif
                    @if (Auth::user()->role == 'Manager')
                    <li class="active"><a href="{{ route('reports.client') }}" aria-expanded="false"> <i
                                class="fa big-icon fa-home icon-wrap"></i> <span
                                class="mini-click-non">Dashboard</span></a></li>
                    @endif
                    @if (Auth::user()->role == 'Super Admin')
                    <li>
                        <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i
                                class="fa-solid fa-user-group icon-wrap"></i> <span class="mini-click-non">System
                                User</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Inbox" href="{{route('users.adduser')}}"> <span class="mini-sub-pro">Add
                                        System User</span></a></li>
                            <li><a title="View Mail" href="{{route('users.userlist')}}"> <span
                                        class="mini-sub-pro">System User List</span></a></li>
                        </ul>
                    </li>
                    @endif
                    @if (Auth::user()->role == 'Admin')
                    <li>
                        <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i
                                class="fa-solid fa-user-group icon-wrap"></i> <span class="mini-click-non">System
                                User</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Inbox" href="{{route('users.adduser')}}"> <span class="mini-sub-pro">Add
                                        System User</span></a></li>
                            <li><a title="View Mail" href="{{route('users.userlist')}}"> <span
                                        class="mini-sub-pro">System User List</span></a></li>
                        </ul>
                    </li>
                    @endif
                    @if (Auth::user()->role != 'Customer')
                    <li>
                        <a class="has-arrow" href="#" aria-expanded="false"><i
                                class="fa-solid fa-user-group icon-wrap"></i> <span
                                class="mini-click-non">Clients</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li>
                                <a title="Google Map" href="{{route('clients.addclient')}}"> <span
                                        class="mini-sub-pro">New Connection</span></a>
                            </li>
                            @if (Auth::user()->role == 'Admin')
                            <li><a title="Data Maps" href="{{route('clients.pending')}}">
                                    <span class="mini-sub-pro">Pending Connections </span></a></li>
                            <li><a title="Pdf Viewer" href="{{route('clients.clientlist')}}"> <span
                                        class="mini-sub-pro">All Client List</span></a>
                            </li>
                            <li><a title="Code Editor" href="{{route('verified.index')}}"> <span
                                        class="mini-sub-pro">Verified List</span></a>
                            </li>
                            @endif
                            @if (Auth::user()->role != 'Customer' && Auth::user()->role != 'Manager')
                            <li><a title="Data Maps" href="{{route('clients.pending')}}">
                                    <span class="mini-sub-pro">Pending Connections </span></a></li>
                            <li><a title="Pdf Viewer" href="{{route('clients.clientlist')}}"> <span
                                        class="mini-sub-pro">All Client List</span></a>
                            </li>
                            <li><a title="Code Editor" href="{{route('verified.index')}}"> <span
                                        class="mini-sub-pro">Verified List</span></a>
                            </li>
                            <li><a title="X-Editable" href="{{route('deactived.index')}}"> <span
                                        class="mini-sub-pro">Deactive Client
                                        List</span></a></li>
                            @endif
                            <li><a title="Tree View" href="{{route('changes.create')}}"> <span
                                        class="mini-sub-pro">Change Package</span></a>
                            </li>
                            <li><a title="Preloader" href="{{route('services.create')}}"> <span class="mini-sub-pro">Add
                                        Service</span></a></li>
                            @if (Auth::user()->role == 'Admin')
                            <li><a href="{{ route('reports.client') }}"> <span class="mini-sub-pro">Search
                                        Client </span></a></li>
                            @endif
                            @if (Auth::user()->role == 'Super Admin')
                            <li><a href="{{ route('reports.client') }}"> <span class="mini-sub-pro">Search
                                        Client </span></a></li>
                            @endif
                            @if (Auth::user()->role == 'Manager')
                            <li>
                                <a href="{{ route('reports.client') }}" style="font-family: 'Radio Canada', sans-serif;">Search Client </a>
                            </li>
                            @endif
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="#" aria-expanded="false"><i
                                class="fa-solid fa-chart-area icon-wrap"></i> <span
                                class="mini-click-non">Area</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="File Manager" href="{{route('area.addarea')}}"> <span class="mini-sub-pro">Add
                                        Area</span></a>
                            </li>
                            <li><a title="Blog" href="{{route('area.arealist')}}"> <span class="mini-sub-pro">Area
                                        List</span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="#" aria-expanded="false"><i class="fa-solid fa-map icon-wrap"></i>
                            <span class="mini-click-non">Package</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Bar Charts" href="{{route('packages.addpackage')}}"> <span
                                        class="mini-sub-pro">Add Package</span></a>
                            </li>
                            <li><a title="Line Charts" href="{{route('packages.packagelist')}}"> <span
                                        class="mini-sub-pro">Package List</span></a></li>

                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i
                                class="fa-solid fa-chart-area icon-wrap"></i> <span
                                class="mini-click-non">Expense</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Peity Charts" href="{{route('categories.addcategory')}}"><span
                                        class="mini-sub-pro">Expense Category</span></a>
                            </li>
                            <li><a title="Data Table" href="{{route('categories.categorylist')}}"> <span
                                        class="mini-sub-pro">Category List</span></a>
                            </li>
                            <li><a title="Data Table" href="{{route('expenses.addexpense')}}"> <span
                                        class="mini-sub-pro">Add Expense</span></a>
                            </li>
                            <li><a title="Data Table" href="{{route('expenses.expenselist')}}"> <span
                                        class="mini-sub-pro">Expense List</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="#" aria-expanded="false"><i
                                class="fa-solid fa-money-bill-1-wave icon-wrap"></i> <span
                                class="mini-click-non">Fee</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Basic Form Elements" href="{{ route('fees.create') }}"><span
                                        class="mini-sub-pro">Add Fee</span></a></li>
                            @if (Auth::user()->role == 'Admin')
                            <li><a href="{{ route('fees.index') }}"> <span class="mini-sub-pro">Fee
                                        List</span></a></li>
                            @endif
                            @if (Auth::user()->role == 'Super Admin')
                            <li><a href="{{ route('fees.index') }}"> <span class="mini-sub-pro">Fee
                                        List</span></a></li>
                            @endif
                            <li><a href="{{ route('assignfee.create') }}"> <span class="mini-sub-pro">Billing
                                        Cycle</span></a></li>
                        </ul>
                    </li>
                    @endif
                    @if (Auth::user()->role == 'Super Admin')
                    <li>
                        <a class="has-arrow" href="#" aria-expanded="false"><i
                                class="fa-solid fa-circle-user icon-wrap"></i> <span
                                class="mini-click-non">Account</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Notifications" href="{{route('accounts.index')}}"> <span
                                        class="mini-sub-pro">Account
                                        List</span></a></li>
                        </ul>
                    </li>
                    @endif
                    @if (Auth::user()->role == 'Admin')
                    <li>
                        <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i
                                class="fa-solid fa-circle-user icon-wrap"></i> <span
                                class="mini-click-non">Account</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Notifications" href="notifications.html"> <span class="mini-sub-pro">Account
                                        List</span></a></li>
                        </ul>
                    </li>
                    @endif
                    @if (Auth::user()->role == 'Super Admin')
                    <li id="removable">
                        <a class="has-arrow" href="#" aria-expanded="false"><i class="bi bi-chat-left icon-wrap"></i>
                            <span class="mini-click-non">Contact
                                Message</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Login" href="{{ route('contact.index') }}"><span class="mini-sub-pro">All
                                        Message</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="#" aria-expanded="false"><i class="bi bi-chat-left icon-wrap"></i>
                            <span class="mini-click-non ">Daily Updates
                                <span style=" font-size:15px; margin:0px 12px" class="badge"></span></span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a href="{{route('daily_updates.index')}}"> <span class="mini-sub-pro">All
                                        Emails</span></a></li>
                        </ul>
                    </li>
                    <li id="removable">
                        <a class="has-arrow" href="#" aria-expanded="false"><i class="bi bi-chat-left icon-wrap"></i>
                            <span class="mini-click-non">FeedBack</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Login" href="{{ route('feedbacks.index') }}"><span class="mini-sub-pro">All
                                        Feedback</span></a></li>
                        </ul>
                    </li>
                    <li id="removable">
                        <a class="has-arrow" href="#" aria-expanded="false"> <i
                                class="fa big-icon fa-files-o icon-wrap"></i><span
                                class="mini-click-non">Reports</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Login" href="{{route('reports.users')}}"><span class="mini-sub-pro">Users</span></a></li>
                            <li id="removable">
                                <a class="has-arrow" href="#" aria-expanded="false"><span
                                        class="mini-click-non">Clients</span></a>
                                <ul class="submenu-angle" aria-expanded="false">
                                    <li><a title="Login" href="{{ route('reports.customers') }}"><span class="mini-sub-pro">Client</span></a></li>
                                    <li><a title="Login" href="{{ route('reports.searchwitharea') }}"><span class="mini-sub-pro">Client Area</span></a></li>
                                </ul>
                            <li><a title="Login" href="{{route('reports.expense')}}"><span class="mini-sub-pro">Expense</span></a></li>
                            <li><a title="Login" href="{{ route('reports.fees') }}"><span class="mini-sub-pro">Fee</span></a></li>
                            <li><a title="Login" href="{{route('reports.accounts')}}"><span class="mini-sub-pro">Accounts</span></a></li>
                    </li>
                </ul>
                </li>
                <li id="removable">
                    <a class="has-arrow" href="#" aria-expanded="false"><i class="fa big-icon fa-files-o icon-wrap"></i>
                        <span class="mini-click-non">Receiveable</span></a>
                    <ul class="submenu-angle" aria-expanded="false">
                        <li><a title="Login" href="{{ route('reports.receivable') }}"><span class="mini-sub-pro">All
                                    Receiveable</span></a></li>
                    </ul>
                </li>
                @endif
                @if (Auth::user()->role == 'Admin')
                <li id="removable">
                    <a class="has-arrow" href="#" aria-expanded="false"><i class="fa big-icon fa-files-o icon-wrap"></i>
                        <span class="mini-click-non">Contact
                            Message</span></a>
                    <ul class="submenu-angle" aria-expanded="false">
                        <li><a title="Login" href="{{ route('contact.index') }}"><span class="mini-sub-pro">All
                                    Message</span></a>
                        </li>
                    </ul>
                </li>
                <li id="removable">
                    <a class="has-arrow" href="#" aria-expanded="false"><i class="fa big-icon fa-files-o icon-wrap"></i>
                        <span class="mini-click-non">FeedBack</span></a>
                    <ul class="submenu-angle" aria-expanded="false">
                        <li><a title="Login" href="{{ route('feedbacks.index') }}"><span class="mini-sub-pro">All
                                    Feedback</span></a></li>
                    </ul>
                </li>
                <li id="removable">
                    <a class="has-arrow" href="#" aria-expanded="false"> <i class="fa-solid fa-file icon-wrap"></i><span
                            class="mini-click-non">Reports</span></a>
                    <ul class="submenu-angle" aria-expanded="false">
                        <li><a title="Login" href="{{route('reports.users')}}"><span class="mini-sub-pro">Users</span></a></li>
                        <li id="removable">
                            <a class="has-arrow" href="#" aria-expanded="false"><span
                                    class="mini-click-non">Clients</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Login" href="{{ route('reports.customers') }}"><span class="mini-sub-pro">Client</span></a></li>
                                <li><a title="Login" href="{{ route('reports.searchwitharea') }}"><span class="mini-sub-pro">Client Area</span></a></li>
                            </ul>
                        <li><a title="Login" href="{{route('reports.expense')}}"><span class="mini-sub-pro">Expense</span></a></li>
                        <li><a title="Login" href="{{ route('reports.fees') }}"><span class="mini-sub-pro">Fee</span></a></li>
                        <li><a title="Login" href="{{route('reports.accounts')}}"><span class="mini-sub-pro">Accounts</span></a></li>
                </li>
                </ul>
                </li>
                <li id="removable">
                    <a class="has-arrow" href="#" aria-expanded="false"><i class="fa big-icon fa-files-o icon-wrap"></i>
                        <span class="mini-click-non">Receiveable</span></a>
                    <ul class="submenu-angle" aria-expanded="false">
                        <li><a title="Login" href="{{ route('reports.receivable') }}"><span class="mini-sub-pro">All
                                    Receiveable</span></a></li>
                    </ul>
                </li>
                @endif
                @if (Auth::user()->role == 'Manager')
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false"><i class="bi bi-chat-left icon-wrap"></i> <span
                            class="mini-click-non ">Contact
                            Messages
                            <span style=" font-size:15px; margin:0px 12px" class="badge"></span></span></a>
                    <ul class="submenu-angle" aria-expanded="false">
                        <li><a href="{{ route('contact.index') }}"> <span class="mini-sub-pro">All
                                    Mesages</span></a></li>

                </li>
                </ul>
                </li>
                @endif
                {{-- Customer Role --}}
                @if (Auth::user()->role == 'Customer')
                <li class="active"><a href="{{ route('dashboard') }}" aria-expanded="false"> <i
                            class="fa big-icon fa-home icon-wrap"></i> <span class="mini-click-non">Dashboard</span></a>
                </li>

                @if ($user_account)
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false"><i
                            class="fa-solid fa-circle-user icon-wrap"></i> <span
                            class="mini-click-non">Account</span></a>
                    <ul class="submenu-angle" aria-expanded="false">
                        <li><a href="{{route('accounts.index')}}"> <span class="mini-sub-pro">My
                                    Account</span></a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false"><i class="bi bi-chat-left icon-wrap"></i> <span
                            class="mini-click-non ">Pay Online
                            <span style=" font-size:15px; margin:0px 12px" class="badge"></span></span></a>
                    <ul class="submenu-angle" aria-expanded="false">
                        <li><a href="{{ route('myOrder') }}"> <span class="mini-sub-pro">Add
                                    Payment</span></a></li>
                    </ul>
                </li>
                @else
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false"><i class="fa-solid fa-user-group icon-wrap"></i>
                        <span class="mini-click-non">Pakcages</span></a>
                    <ul class="submenu-angle" aria-expanded="false">
                        <li><a title="Inbox" href="{{ route('clients.new_conn_req') }}"> <span
                                    class="mini-sub-pro">Select Package</span></a></li>
                        <li>
                    </ul>
                </li>
                @endif
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false"><i class="bi bi-chat-left icon-wrap"></i> <span
                            class="mini-click-non ">Feedback
                            <span style=" font-size:15px; margin:0px 12px" class="badge"></span></span></a>
                    <ul class="submenu-angle" aria-expanded="false">
                        <li><a href="{{ route('feedbacks.index') }}"> <span class="mini-sub-pro">Add
                                    Feedbacks</span></a></li>
                    </ul>
                </li>

                @endif
                </ul>
            </nav>
        </div>
    </nav>
</div>
