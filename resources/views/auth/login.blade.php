@extends('layouts.auth')

@section('content')

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">YK</h1>

            </div>
            <h3>Welcome to 1-Grid Code Sample</h3>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <input type="email" class="form-control{{ $errors->has('email') ? ' error' : '' }}"
                           placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control{{ $errors->has('password') ? ' error' : '' }}"
                           placeholder="Password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
                <a href="{{ route('password.request') }}"> <small>Forgot password?</small></a>
            </form>
        </div>
    </div>

@endsection
