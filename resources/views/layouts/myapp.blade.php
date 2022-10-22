<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>AquaIoT</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/cloud.png') }}" />
        
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('js/scripts.js') }}"></script>
        @yield('custom-head')
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light">AquaIoT</div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ route('home') }}">Home</a>
                    @auth
                        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ route('devices') }}">Devices</a>
                        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ route('sensordatas') }}">Sensor Data</a>
                        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ route('apidoc') }}">Documents</a>
                    @endauth
                </div>
            </div>

            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                @include('layouts.mynavigation')
                <!-- Page content-->
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
    </body>
</html>
