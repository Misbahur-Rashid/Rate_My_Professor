<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li>
                    <!-- User Profile-->
                    <div class="user-profile text-center dropdown p-3">
                        <div class="user-pic"><img src="{{ asset('image/user/' . Auth::user()->image) }}" alt="users" class="rounded-circle" width="50" /></div>
                        <div class="user-content hide-menu">
                            <a href="javascript:void(0)" class="mt-2" id="Userdd" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <h5 class="mb-0 user-name mt-2">{{Auth::user()->name}}<i class="fa fa-angle-down"></i></h5>
                            </a>
                            <div class="dropdown-menu dropdown-menu-left" aria-labelledby="Userdd">
                               @if(Auth::user()->role->id==1)
                               <a class="dropdown-item" href="{{url('admin/user/'.Auth::id())}}"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                             @elseif(Auth::user()->role->id==2)
                             <a class="dropdown-item" href="{{url('author/user/'.Auth::id())}}"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                               @endif
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                            </div>

                            {{--  <div class="dropdown-menu dropdown-menu-left" aria-labelledby="Userdd">
                                @if(Auth::user()->role->id == 2)
                                <a class="dropdown-item" href="{{url('author/user/'.Auth::id())}}"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                                @endif
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                            </div>  --}}

                        </div>
                    </div>
                    <!-- End User Profile-->
                </li>
                @if(Request::is('admin*'))
                <li class="sidebar-item">
                    @if (Session::get('page')=="dashboard")
                    <?php $active="active";?>
                    @else
                    <?php $active="";?>
                    @endif
                    <a class="sidebar-link waves-effect waves-dark" href="{{url('admin/dashboard')}}" aria-expanded="false">
                        <i class="mdi mdi-av-timer"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    @if (Session::get('page')=="contact")
                    <?php $active="active";?>
                    @else
                    <?php $active="";?>
                    @endif
                    <a class="sidebar-link{{ $active }} waves-effect waves-dark" href="{{url('admin/contacts')}}" aria-expanded="false">
                    <i class="mdi mdi-facebook-messenger"></i>
                        <span class="hide-menu">Contact</span>
                        {{-- @if($unreadedMessages > 0)
                        <span class="badge badge-inverse badge-pill ml-auto mr-3 font-medium px-2 py-1"></span>
                        @endif --}}
                    </a>
                </li>
                <li class="sidebar-item">
                    @if (Session::get('page')=="feedback")
                    <?php $active="active";?>
                    @else
                    <?php $active="";?>
                    @endif
                    <a class="sidebar-link{{ $active }} waves-effect waves-dark" href="{{url('admin/feedbacks')}}" aria-expanded="false">
                    <i class="mdi mdi-facebook-messenger"></i>
                        <span class="hide-menu">Feedback</span>
                        {{-- @if($unreadedMessages > 0)
                        <span class="badge badge-inverse badge-pill ml-auto mr-3 font-medium px-2 py-1"></span>
                        @endif --}}
                    </a>
                </li>
                <li class="sidebar-item">
                    @if (Session::get('page')=="requestteacher")
                    <?php $active="active";?>
                    @else
                    <?php $active="";?>
                    @endif
                    <a class="sidebar-link{{ $active }} waves-effect waves-dark" href="{{url('admin/requestteacher')}}" aria-expanded="false">
                    <i class="mdi mdi-facebook-messenger"></i>
                        <span class="hide-menu">Request Teacher Pending</span>
                        {{-- @if($unreadedMessages > 0)
                        <span class="badge badge-inverse badge-pill ml-auto mr-3 font-medium px-2 py-1"></span>
                        @endif --}}
                    </a>
                </li>

                <li class="sidebar-item">
                    @if (Session::get('page')=="department")
                    <?php $active="active";?>
                    @else
                    <?php $active="";?>
                    @endif
                    <a class="sidebar-link waves-effect waves-dark" href="{{url('admin/get-department')}}" aria-expanded="false">
                        <i class="fa fa-book" aria-hidden="true"></i>
                        <span class="hide-menu">Department</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    @if (Session::get('page')=="teacher")
                    <?php $active="active";?>
                    @else
                    <?php $active="";?>
                    @endif
                    <a class="sidebar-link waves-effect waves-dark" href="{{url('admin/get-teacher')}}" aria-expanded="false">
                        <i class="fa fa-book" aria-hidden="true"></i>
                        <span class="hide-menu">Teacher</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    @if (Session::get('page')=="school")
                    <?php $active="active";?>
                    @else
                    <?php $active="";?>
                    @endif
                    <a class="sidebar-link waves-effect waves-dark" href="{{url('admin/get-school')}}" aria-expanded="false">
                        <i class="fa fa-book" aria-hidden="true"></i>
                        <span class="hide-menu">School</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    @if (Session::get('page')=="user")
                    <?php $active="active";?>
                    @else
                    <?php $active="";?>
                    @endif
                    <a class="sidebar-link{{ $active }} waves-effect waves-dark" href="{{url('admin/get-users')}}" aria-expanded="false">
                        <i class="mdi mdi-account-multiple"></i>
                        <span class="hide-menu">User</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    @if (Session::get('page')=="student")
                    <?php $active="active";?>
                    @else
                    <?php $active="";?>
                    @endif
                    <a class="sidebar-link{{ $active }} waves-effect waves-dark" href="{{url('admin/student')}}" aria-expanded="false">
                        <i class="far fa-address-book"></i>
                        <span class="hide-menu">Student</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    @if (Session::get('page')=="sitesetting")
                    <?php $active="active";?>
                    @else
                    <?php $active="";?>
                    @endif
                    <a class="sidebar-link{{ $active }} waves-effect waves-dark" href="{{url('admin/get-sitesetting')}}" aria-expanded="false">
                        <i class="far fa-address-book"></i>
                        <span class="hide-menu">Site Setting</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-recycle"></i>
                        <span class="hide-menu">Recycle Bin</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">

                        <li class="sidebar-item">
                            <a href="{{url('admin/recycle/contacts')}}" class="sidebar-link">
                                <i class="mdi mdi-facebook-messenger"></i>
                                <span class="hide-menu">Student work</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{url('admin/recycle/user')}}" class="sidebar-link">
                                <i class="mdi mdi-account-multiple"></i>
                                <span class="hide-menu">Users</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a target="_blank" class="sidebar-link waves-effect waves-dark" href="{{url('/')}}" aria-expanded="false">
                        <i class="mdi mdi-earth"></i>
                        <span class="hide-menu">Live Site</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" aria-expanded="false">
                        <i class="mdi mdi-adjust text-info"></i>
                        <span class="hide-menu">Log Out</span>
                    </a>
                </li>
                @endif

                @if(Request::is('vc*'))
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark" href="{{url('vc/dashboard')}}" aria-expanded="false">
                        <i class="mdi mdi-av-timer"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark" href="{{url('admin/subscribers')}}" aria-expanded="false">
                        <i class="mdi mdi-email-outline"></i>
                        <span class="hide-menu">Subscribers</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark" href="{{url('author/user')}}" aria-expanded="false">
                        <i class="mdi mdi-account-multiple"></i>
                        <span class="hide-menu">Users</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-recycle"></i>
                        <span class="hide-menu">Recycle Bin</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">

                        <li class="sidebar-item">
                            <a href="{{url('admin/recycle/contacts')}}" class="sidebar-link">
                                <i class="mdi mdi-facebook-messenger"></i>
                                <span class="hide-menu">Contact Message</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{url('admin/recycle/users')}}" class="sidebar-link">
                                <i class="mdi mdi-account-multiple"></i>
                                <span class="hide-menu">Users</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a target="_blank" class="sidebar-link waves-effect waves-dark" href="{{url('/')}}" aria-expanded="false">
                        <i class="mdi mdi-earth"></i>
                        <span class="hide-menu">Live Site</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" aria-expanded="false">
                        <i class="mdi mdi-adjust text-info"></i>
                        <span class="hide-menu">Log Out</span>
                    </a>
                </li>
                @endif
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
