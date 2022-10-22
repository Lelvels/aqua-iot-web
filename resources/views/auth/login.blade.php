@extends('layouts.myapp')
@section('content')
    <h2>Đăng nhập</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf
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
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" value="{{ old('remember') ? 'checked' : '' }}">
                <label class="form-check-label" for="remember">Remember Me</label>
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary btn-block">Login</button>
    </form>
@endsection
