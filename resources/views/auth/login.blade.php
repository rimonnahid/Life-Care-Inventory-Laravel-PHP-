@extends('layouts.app')
@section('title','Login Form | DelowarIT')

@section('content')
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
                <h1 class="logo-name">DelwarIT</h1>
            </div>

            <h3>Welcome to DelowarIT's Inventory</h3>
            <p>A perfect and smooth standard interface management system.</p>
            <p>Login first for manage your office.</p>
            <form class="m-t" role="form" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                     @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}"><small>Forgot password?</small></a>
                @endif

                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="{{ route('register') }}">Create an account</a>
            </form>
            <p class="m-t"> <small>All Copyrights Reserved By <a href="https://delwarit.com" target="_blank">DelwarIT</a></small> </p>
        </div>
    </div>
@endsection