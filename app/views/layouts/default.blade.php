<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>
        @section("title")
        Monujo
        @show
    </title>
    <meta name="keywords" content="Monujo"/>
    <meta name="author" content="Monujo"/>
    <meta name="description" content="Monujo"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include("partials/head")
</head>

<body>
<!-- Container -->
<div class="container">
    <!-- Navbar -->
    <div class="navbar navbar-inverse">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <div class="nav-collapse collapse">
                    <ul class="nav">
                        <li><a href="{{ URL::route("home") }}"><i
                                class="icon-home icon-white"></i> Home</a></li>
                    </ul>

                    <ul class="nav pull-right">
                        @if (Sentry::check())
                        <li class="dropdown{{ (Request::is(" account
                        *") ? " active" : "") }}">
                        <a class="dropdown-toggle" id="dLabel" role="button" data-toggle="dropdown" data-target="#"
                           href="{{ URL::to("account") }}">
                        Welcome, {{ Sentry::getUser()->first_name }}
                        <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                            <li class="divider"></li>
                            <li><a href="{{ URL::route('logout.get') }}"><i class="icon-off"></i> Logout</a></li>
                        </ul>
                        </li>
                        @else
                        <li>
                            <a
                                href="{{ URL::route('login.get') }}">{{Lang::get('auth.label.button.login') }}</a></li>
                        <li>
                            <a
                                href="{{ URL::route('signup.get') }}">{{Lang::get('auth.label.button.signup') }}</a></li>
                        @endif
                    </ul>
                </div>
                <!-- ./ nav-collapse -->
            </div>
        </div>
    </div>
    <!-- ./ navbar -->

    @include("partials/notifications")
    @yield("content")
    <footer>
        <p>© Monujo 2013</p>
    </footer>
</div>
<!-- ./ container -->

@include("partials/js")
</body>
</html>
