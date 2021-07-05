<!DOCTYPE html>
<html>

<head lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | Register</title>

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
        <h3>Register to MICROURL</h3>
        <p>Create account to see it in action.</p>
        <form class="m-t" role="form" method="post" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" placeholder="{{ __('Name') }}" autofocus>
                @error('name')
                <span class="invalid-feedback text-left" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="{{ __('E-Mail Address') }}">
                @error('email')
                <span class="invalid-feedback text-left" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="{{ __('Password') }}">
                @error('password')
                <span class="invalid-feedback text-left" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password_confirmation" autocomplete="new-password" placeholder="{{ __('Confirm Password') }}">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary block full-width m-b">Register</button>
            </div>
            <p class="text-muted text-center"><small>Already have an account?</small></p>
            <div class="form-group">
                <a class="btn btn-sm btn-white btn-block" href="{{ route('login') }}">Login</a>
            </div>
        </form>
        <p class="m-t"> <small>MicroUrl &copy; 2021</small> </p>
    </div>
</div>

<!-- Mainly scripts -->
<script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>

</html>
