<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Inventory DelwarIT | Login</title>

    <link href="{{ asset('public/backend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('public/backend/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{ asset('public/backend/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('public/backend/css/style.css') }}" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">DelwarIT</h1>

            </div>
            <h3>Welcome to DelwarIT Inventory</h3>
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

                <div class="text-center mt-2 mb-4">
                    Email: <span class="font-weight-bold">admin@gmail.com</span>
                    <br>
                    Password: <span class="font-weight-bold">admin1234</span>
                </div>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}"><small>Forgot password?</small></a>
                @endif

                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="{{ route('register') }}">Create an account</a>
            </form>
            <p class="m-t"> <small>All Copyrights Reserved By DelwarIT</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{ asset('public/backend/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('public/backend/js/popper.min.js') }}"></script>
    <script src="{{ asset('public/backend/js/bootstrap.js') }}"></script>

</body>

</html>
