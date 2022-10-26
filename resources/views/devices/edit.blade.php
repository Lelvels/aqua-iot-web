@extends('layouts.myapp')
@section('title', 'Devices')
@section('content')
    <h2>Devices Management</h2>
    <h4>Update device {{ $device->name }} </h4>
    <form action="{{ route('devices.update', ['device' => $device->id]) }}" method="POST">
        @csrf
        @method('PUT')
        @include("devices.partials.form")
        <div class="d-inline text-white">
            <button type="submit" class="btn btn-success">Update</button>
            @include('devices.partials.btn_backtohome')
        </div>
    </form>
    <br>
@endsection