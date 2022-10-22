@extends('layouts.myapp')
@section('content')
    <h2>Đăng ký</h2>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input class="form-control {{ $errors->has('name') ? ' is-invalid': '' }}" 
                value="{{ old('name') }}" name="name" type="text" required >
            @if($errors->has('name'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label>Email</label>
            <input class="form-control {{ $errors->has('email') ? ' is-invalid': '' }}" 
                value="{{ old('email') }}" name="email" type="text" required >
            @if($errors->has('email'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group">
            <label>Password</label>
            <input class="form-control {{ $errors->has('password') ? ' is-invalid': '' }}" 
            name="password" type="password" required >
            @if($errors->has('password'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group">
            <label>Confirm password</label>
            <input class="form-control" name="password_confirmation" type="password" required >
        </div>
        <br>
        <button type="submit" class="btn btn-primary btn-block">Register</button>
    </form>
@endsection
