<aside class="left-sidebar" data-sidebarbg="skin5" style="position:fixed;">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="p-t-30">
           
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('dashboard')}}" aria-expanded="false"><i class="mdi mdi-view-dashboard"  style="color:blue;"></i><span class="hide-menu">Dashboard</span></a></li>
                   @can('isAdmin')
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('user')}}" aria-expanded="false"><i class="fas fa-users"  style="color:yellow;"></i><span class="hide-menu"> Students Management</span></a></li>
                     @endcan
                     @can('isAdmin')
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('campuses')}}" aria-expanded="false"><i class="fas fa-university" style="color:red;"></i><span class="hide-menu">Campus</span></a></li>
                @endcan
                @can('isAdmin')
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('courses')}}" aria-expanded="false"><i class="fas fa-graduation-cap " style="color:green;"></i><span class="hide-menu">Courses</span></a></li>
                @endcan
                @can('isStudent')
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('documents')}}" aria-expanded="false"><i class="fas fa-file " style="color:orange;"></i><span class="hide-menu"></span>Documents</a></li>
               @endcan
                @can('isAdmin')
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('admindocuments')}}" aria-expanded="false"><i class="fas fa-file " style="color:orange;"></i><span class="hide-menu"></span>All Documents</a></li>
                @endcan
                @can('isAdmin')
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('adminmessage')}}" aria-expanded="false"><i class="fas fa-envelope " style="color:pink;"></i><span class="hide-menu"></span>All Messages </a></li>
                @endcan
                @can('isStudent')
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('message')}}" aria-expanded="false"><i class="fas fa-envelope " style="color:pink;"></i><span class="hide-menu"></span>Messages</a></li>
                @endcan
                <li class="sidebar-item"><a href="{{route('profile')}}" class="sidebar-link"><i class="fas fa-user"></i><span class="hide-menu"> My profile </span></a></li>

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>