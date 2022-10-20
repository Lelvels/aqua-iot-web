<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Anlab IotHub</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/cloud.png') }}" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('js/scripts.js') }}"></script>
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light">Anlab IoT</div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ route('index') }}">Home</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ route('devices') }}">Devices</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ route('sensordatas') }}">Sensor Data</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ route('index') }}/about">About us</a>
                </div>
            </div>

            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                @include('layouts.navigation')
                <!-- Page content-->
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
    </body>
</html>
