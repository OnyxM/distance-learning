<div class="container">
    <nav id="navigation" class="navigation navigation-landscape">
        <div class="nav-header">
            <a class="nav-brand" href="{{route('index')}}">
                <img src="{{asset('assets/img/logo.png')}}" class="logo" alt="" />
            </a>
            <div class="nav-toggle"></div>
        </div>
        <div class="nav-menus-wrapper" style="transition-property: none;">
            <ul class="nav-menu">

                <li><a href="{{route('courses')}}">Courses</a></li>
                <li><a href="{{route('lives')}}">Lives</a></li>
                <li><a href="{{route('about')}}">Contact</a></li>

            </ul>

            <ul class="nav-menu nav-menu-social align-to-right">
                @if(!auth()->user())
                    <li class="login_click light">
                        <a href="{{route('login')}}" >Sign in</a>
                        {{--									<a href="#" data-toggle="modal" data-target="#login">Sign in</a>--}}
                    </li>
                    <li class="login_click theme-bg">
                        <a href="{{route('register')}}">Sign up</a>
                        {{--									<a href="#" data-toggle="modal" data-target="#signup">Sign up</a>--}}
                    </li>
                @else
                    <li class=""><a href="{{route('user.index')}}"><i class="ti-user"></i> Dashboard</a></li>
                    <li><a href="{{route('course.index')}}">My Courses</a></li>
                    <li><a href="{{route('user.lives')}}">My Lives</a></li>
                    <li><a href="javascript:void(0);">Settings</a></li>

                    <li class="login_click light">
                        @if($logged_as == 'teacher')
                        <a href="{{ route('user.index') }}">As Student</a>
                        @elseif($logged_as == 'student')
                            <a href="{{ route('teacher.index') }}">As Teacher</a>
                        @endif
                    </li>
                    <li class="login_click theme-bg">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @endif
            </ul>
        </div>
    </nav>
</div>
