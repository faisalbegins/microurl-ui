<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    @section('page-level-css')
    @show
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>

<body>

<div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="block m-t-xs font-bold"><i class="fa fa-user"></i> {{ Auth::user()->name }}</span>
                        </a>
                    </div>
                    <div class="logo-element">
                        μ
                    </div>
                </li>
                @role('admin')
                <li class="active">
                    <a href="#"><i class="fa fa-link"></i> <span class="nav-label">URL</span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{ route('home') }}">URL List</a></li>
                    </ul>
                </li>
                @endrole
                @role('user')
                <li class="active">
                    <a href="#"><i class="fa fa-link"></i> <span class="nav-label">URL</span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{ route('urls.index') }}">URL List</a></li>
                        <li><a href="{{ route('urls.create') }}">Create Short URL</a></li>
                    </ul>
                </li>
                @endrole
            </ul>

        </div>
    </nav>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">

                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out"></i> {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>

            </nav>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                @yield('content')
            </div>
        </div>
        <div class="footer">
            <div class="pull-right">
            </div>
            <div>
                <strong>Copyright</strong> {{ config('app.name', 'Laravel') }} &copy; 2021
            </div>
        </div>

    </div>
</div>

<!-- Mainly scripts -->
<script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
<script src="{{ asset('js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
@section('page-level-java-script-library')
@show
<!-- Custom and plugin javascript -->
<script src="{{ asset('js/inspinia.js') }}"></script>
<script src="{{ asset('js/plugins/pace/pace.min.js') }}"></script>
@section('page-level-java-script')
@show
</body>

</html>
