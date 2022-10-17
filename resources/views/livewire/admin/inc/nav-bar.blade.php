<div>
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item d-lg-none">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="/" class="nav-link" target="_blank">Visit Website</a>
            </li>
        </ul>
    
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="javascript:void(0)" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-user"></i> {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-md dropdown-menu-right" style="font-size: 14.5px;">
                    <a href="#" class="dropdown-item"><i class="fa fa-cog"></i> Setting</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-power-off" style="color: red;"></i> Logout</a>
                                        
                    <form id="logout-form" style="display: none;" method="POST" action="{{ route('logout') }}">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </nav>
</div>
