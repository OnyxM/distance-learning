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

                <li><a href="{{route('fields.list')}}">Fields</a></li>
                <li><a href="{{route('courses')}}">Courses</a></li>
                <li><a href="{{route('lives')}}">Lives</a></li>
                <li><a href="{{route('about')}}">Contact</a></li>

            </ul>

            <ul class="nav-menu nav-menu-social align-to-right">
                @if(!auth()->user())
                    <li class="login_click light">
                        <a href="{{route('login')}}" >Sign in</a>
                    </li>
                    <li class="login_click theme-bg">
                        <a href="{{route('register')}}">Sign up</a>
                    </li>
                @else
                    @if(auth()->user()->priority == \App\Models\User::USER_PRIORITY['teacher'])
                        <li class=""><a href="{{route('teacher.index')}}"><i class="ti-user"></i> Welcome <strong>{{ auth()->user()->name }}</strong> </a></li>
                        <li><a href="{{route('teacher.ues')}}">My Courses</a></li>
                        <li><a href="{{route('user.lives')}}">My Lives</a></li>
                    @elseif(auth()->user()->priority == \App\Models\User::USER_PRIORITY['admin'])
                        <li class=""><a href="{{route('admin.index')}}"><i class="ti-user"></i> Welcome <strong>{{ auth()->user()->name }}</strong> </a></li>
                    @else
                        <li class=""><a href="{{route('user.index')}}"><i class="ti-user"></i> Welcome <strong>{{ auth()->user()->name }}</strong> </a></li>
                        <li><a href="{{route('class.index')}}">My Class</a></li>
                    @endif

{{--                    <li><a href="javascript:void(0);">Settings</a></li>--}}

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
