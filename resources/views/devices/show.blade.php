@extends("layouts.myapp")
@section("title", "Devices")
@section("custom-head")
@endsection
@section("content")
    <h1>Devices Management</h1>
    @if(session('success'))
        <p class="fw-bolder fs-3">{{ session('success') }}</p>
    @endif
    <h5>Your device information: {{ $device['name'] }}</h5>
    <p>Id: {{ $device['id'] }}</p>
    <p>Name: {{ $device['name'] }}</p>
    <p>Description: {{ $device['description'] }}</p>
    <p>Connection String: {{ $device['connection_string'] }}</p>
    @include('devices.partials.btn_backtohome')
@endsection
