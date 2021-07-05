<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | Login</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins/iCheck/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>
            <h1 class="logo-name">μ</h1>
        </div>
        <h3>Welcome to MICROURL</h3>
        <p>Login in. To see it in action.</p>
        <form class="m-t" role="form" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="{{ __('E-Mail Address') }}">
                @error('email')
                <span class="invalid-feedback text-left" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password" placeholder="{{ __('Password') }}">
                @error('password')
                <span class="invalid-feedback text-left" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary block full-width m-b">{{ __('Login') }}</button>
            </div>
            @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}"><small>{{ __('Forgot Your Password?') }}</small></a>
            @endif
            <p class="text-muted text-center"><small>Do not have an account?</small></p>
            <div class="form-group">
                <a class="btn btn-sm btn-white btn-block" href="{{ route('register') }}">Create an account</a>
            </div>
        </form>
        <p class="m-t"> <small>MicroUrl &copy; 2021</small> </p>
    </div>
</div>

<!-- Mainly scripts -->
<script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<!-- iCheck -->
<script src=""></script>
</body>

</html>
