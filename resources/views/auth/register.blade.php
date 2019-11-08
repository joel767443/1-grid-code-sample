@extends('layouts.auth')

@section('content')
    <div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">YK</h1>

            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' error' : '' }}" placeholder="Name" required="">
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' error' : '' }}" placeholder="Email" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" class="form-control{{ $errors->has('password') ? ' error' : '' }}" placeholder="Password" required="">
                </div>

                <div class="form-group">
                    <input type="password" name="password_confirmation" class="form-control" class="form-control{{ $errors->has('password-confirm') ? ' error' : '' }}" placeholder="password confirm" required="">
                </div>

                <button type="submit" class="btn btn-primary block full-width m-b">Register</button>


                <a class="btn btn-sm btn-white btn-block" href="{{ url('login') }}">Login</a>
            </form>

        </div>
    </div>

@endsection
