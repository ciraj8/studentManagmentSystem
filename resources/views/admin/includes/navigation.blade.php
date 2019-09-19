<header class="topbar" data-navbarbg="skin5">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin5">
            <!-- This is for the sidebar toggle which is visible on mobile only -->
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>

            <a class="navbar-brand" href="{{route('dashboard')}}">
                <!-- <b class="logo-icon p-l-10">
                    <img src="{{asset('admin-panel/assets/images/logo-icon.png')}}" alt="homepage" class="light-logo" />
                </b> -->
                <span class="logo-text" style="position:fixed;">
                            @if(Auth::user()->role == 'admin')
                             <h3 style="  text-shadow: 2px 2px 8px #FF0000;">ADMIN AREA</h3>
                             @else
                             <h3 style="  text-shadow: 2px 2px 8px #FF0000;">STUDENT AREA</h3>
                             @endif
                            
                             <!-- dark Logo text -->
                             <!-- <img src="{{asset('admin-panel/assets/images/logo-text.png')}}" alt="homepage" class="light-logo" /> -->

                        </span>
            </a>
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
        </div>

        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
            <ul class="navbar-nav float-left mr-auto">
                <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                
            </ul>
            <ul class="navbar-nav float-right">
                <li class="mt-4 text-white"> <h6> {{{ isset(Auth::user()->name) ? Auth::user()->username : Auth::user()->email }}}</h6></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="/uploads/gallery/{{Auth::user()->image}}" alt="user" class="rounded-circle" width="31"></a>
                    <div class="dropdown-menu dropdown-menu-right user-dd animated">
                        <a class="dropdown-item" href="{{route('profile')}}"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>

                        {{--<a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>--}}

                        <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item">
                            <i class="fa fa-power-off m-r-5 m-l-5"></i>
                            Logout
                        </a>
                        <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                            @csrf
                        </form>

                        <div class="dropdown-divider"></div>
                        <div class="p-l-30 p-10"><a href="{{route('profile')}}" class="btn btn-sm btn-success btn-rounded">View Profile</a></div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>