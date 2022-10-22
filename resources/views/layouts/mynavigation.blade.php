<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <div class="container-fluid">
        <button class="btn btn-primary" id="sidebarToggle">Toggle Menu</button>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                <li class="nav-item active"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}/about">About us</a></li>
                <li class="nav-item dropdown">
                    @auth
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hi, {{ Auth::user()->name }}</a>
                    @else
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Accounts</a>
                    @endauth
                    
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        @guest
                            <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                            <div class="dropdown-divider"></div>
                            @if(Route::has('register'))
                                <a class="dropdown-item" href="{{ route('register') }}">Register</a>
                            @endif
                        @else
                            <a class="dropdown-item" href="{{ route('api_sensordatas') }}">Sensor Data</a>
                            <a class="dropdown-item" href="{{ route('api_devices') }}">Devices</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('apidoc') }}">API Documents</a>
                            <a class="dropdown-item" href="#">Settings</a>
                            <a class="dropdown-item" href="{{ route('logout') }}" 
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log out</a>
                            <form style="display:none" id="logout-form" action="{{ route('logout') }}" 
                                method="POST">
                                @csrf
                            </form>
                        @endguest
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>