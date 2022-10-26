@extends('layouts.myapp')
@section('title', 'Devices')
@section('content')
    <h2>Devices Management</h2>
    <h4>Create new device</h4>
    <form action="{{ route('devices.store') }}" method="POST">
        @csrf
        @include("devices.partials.form")
        <div class="d-inline text-white">
            <button type="submit" class="btn btn-success">Create</button>
            @include('devices.partials.btn_backtohome')
        </div>
    </form>
    <br>
@endsection
