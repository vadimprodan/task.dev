<!-- Left Side Of Navbar -->
<ul class="navbar-nav mr-auto">
    @if(!Auth::guest())
        <li class="nav-item{{ (Request::is('admin/student*')) ? ' active' : '' }}">
            <a class="nav-link" href="{{ route('admin.students') }}"><i class="fa fa-btn fa-users"></i> Students</a>
        </li>
        <li class="nav-item{{ (Request::is('admin/instructor*')) ? ' active' : '' }}">
            <a class="nav-link" href="{{ route('admin.instructors') }}"><i class="fa fa-btn fa-users"></i> Instructors</a>
        </li>
        <li class="nav-item{{ (Request::is('admin/class*')) ? ' active' : '' }}">
            <a class="nav-link" href="{{ route('admin.classes') }}"><i class="fa fa-btn fa-object-group"></i> Classes</a>
        </li>
        <li class="nav-item{{ (Request::is('admin/subject*')) ? ' active' : '' }}">
            <a class="nav-link" href="{{ route('admin.subjects') }}"><i class="fa fa-btn fa-book"></i> Subjects</a>
        </li>
    @endif
</ul>

<!-- Right Side Of Navbar -->
<ul class="navbar-nav ml-auto">
    @if(Auth::guest())
        <li class="nav-item{{ (Request::is('admin/login')) ? ' active' : '' }}">
            <a class="nav-link" href="{{ route('admin.login') }}"><i class="fa fa-btn fa-sign-in"></i> Login</a>
        </li>
    @else
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="userMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-btn fa-user"></i> {{ (Auth::user()->username) ? Auth::user()->username : Auth::user()->email }}
            </a>
            <div class="dropdown-menu custom" aria-labelledby="userMenu">
                <a class="dropdown-item" href="{{ route('admin.profile') }}">
                    <i class="fa fa-btn fa-id-card"></i> Profile
                </a>
                <a class="dropdown-item" href="{{ route('admin.logout') }}">
                    <i class="fa fa-btn fa-sign-out"></i> Logout
                </a>
            </div>
        </li>
    @endif
</ul>