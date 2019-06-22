
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
    <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> -->

    <!-- Bootstrap & jQuery -->
    <script src="{{ asset('js/jquery-3.4.0.min.js') }}"></script>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
{{--    <style>--}}
{{--        a.btn-info{--}}
{{--            color: #fff;--}}
{{--        }--}}
{{--    </style>--}}
    @yield('style')
</head>


<body class="app sidebar-mini">
<!-- Navbar-->
<header class="app-header"><a class="app-header__logo" href="{{ route('home') }}">DashBoard</a>
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">
        <li class="app-search">
            <input class="app-search__input" type="search" placeholder="Search">
            <button class="app-search__button"><i class="fa fa-search"></i></button>
        </li>

        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown"><i class="fa fa-user fa-lg"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
                <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-user fa-lg"></i> Profile</a></li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out fa-lg"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                </li>

            </ul>
        </li>
    </ul>
</header>
<aside class="app-sidebar">
<div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="{{ Gravatar::src(auth()->user()->email, 50) }}" alt="User Image">
    <div>

        <p class="app-sidebar__user-name">{{ auth()->user()->name }}</p>
        <p class="app-sidebar__user-designation">{{ auth()->user()->role }}</p>


    </div>
</div>
<ul class="app-menu">

    <li><a class="app-menu__item active" href="{{ route('home') }}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>

    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-file-text-o"></i><span class="app-menu__label">Posts</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{ route('posts.create') }}"><i class="icon fa fa-edit"></i>Create Post</a></li>
            <li><a class="treeview-item" href="{{ route('posts.index') }}"><i class="icon fa fa-th-list"></i>All Post</a></li>
            <li><a class="treeview-item" href="{{ route('trashed-posts.index') }}"><i class="icon fa fa-trash-o"></i>Trashed Post</a></li>
        </ul>
    </li>

    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-windows"></i><span class="app-menu__label">Category</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{ route('categories.create') }}"><i class="icon fa fa-edit"></i>Create Category</a></li>
            <li><a class="treeview-item" href="{{ route('categories.index') }}"><i class="icon fa fa-th-list"></i>All Category</a></li>
        </ul>
    </li>

    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-tags"></i><span class="app-menu__label">Tag</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{ route('tags.create') }}"><i class="icon fa fa-edit"></i>Create Tag</a></li>
            <li><a class="treeview-item" href="{{ route('tags.index') }}"><i class="icon fa fa-th-list"></i>All Tag</a></li>
        </ul>
    </li>
    <hr>
    @if( auth()->user()->isAdmin())
        <li><a class="app-menu__item" href="{{ route('users.index') }}"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Users</span></a></li>
    @endif




</ul>
</aside>
<main class="app-content">
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <div class="app-title">
        <div>
            @yield('dashTitle')
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            @yield('breadcrumb')
        </ul>
    </div>

    @yield('content')

</main>






















{{--    <div id="app">--}}
{{--        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">--}}
{{--            <div class="container">--}}
{{--                <a class="navbar-brand" href="{{ url('/') }}">--}}
{{--                    {{ config('app.name', 'Laravel') }}--}}
{{--                </a>--}}
{{--                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">--}}
{{--                    <span class="navbar-toggler-icon"></span>--}}
{{--                </button>--}}

{{--                <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
{{--                    <!-- Left Side Of Navbar -->--}}
{{--                    <ul class="navbar-nav mr-auto">--}}

{{--                    </ul>--}}

{{--                    <!-- Right Side Of Navbar -->--}}
{{--                    <ul class="navbar-nav ml-auto">--}}
{{--                        <!-- Authentication Links -->--}}
{{--                        @guest--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
{{--                            </li>--}}
{{--                            @if (Route::has('register'))--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
{{--                                </li>--}}
{{--                            @endif--}}
{{--                        @else--}}
{{--                            <li class="nav-item dropdown">--}}
{{--                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--                                    Post <span class="caret"></span>--}}
{{--                                </a>--}}

{{--                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
{{--                                    <a class="dropdown-item" href="{{ route('posts.create') }}">--}}
{{--                                        {{ __('Add Post') }}--}}
{{--                                    </a>--}}

{{--                                    <a class="dropdown-item" href="{{ route('posts.index') }}">--}}
{{--                                        {{ __('All Post') }}--}}
{{--                                    </a>--}}

{{--                                    <a class="dropdown-item" href="{{ route('trashed-posts.index') }}">--}}
{{--                                        {{ __('Trashed Posts') }}--}}
{{--                                    </a>--}}

{{--                                </div>--}}
{{--                            </li>--}}

{{--                            <li class="nav-item dropdown">--}}
{{--                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--                                    Category <span class="caret"></span>--}}
{{--                                </a>--}}

{{--                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
{{--                                    <a class="dropdown-item" href="{{ route('categories.create') }}">--}}
{{--                                        {{ __('Add Category') }}--}}
{{--                                    </a>--}}

{{--                                    <a class="dropdown-item" href="{{ route('categories.index') }}">--}}
{{--                                        {{ __('All Category') }}--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item dropdown">--}}
{{--                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--                                    Tag <span class="caret"></span>--}}
{{--                                </a>--}}

{{--                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
{{--                                    <a class="dropdown-item" href="{{ route('tags.create') }}">--}}
{{--                                        {{ __('Add Tag') }}--}}
{{--                                    </a>--}}

{{--                                    <a class="dropdown-item" href="{{ route('tags.index') }}">--}}
{{--                                        {{ __('All Tag') }}--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            @if( auth()->user()->isAdmin())--}}
{{--                                <li class="nav-item dropdown">--}}
{{--                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--                                        Users <span class="caret"></span>--}}
{{--                                    </a>--}}

{{--                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">--}}

{{--                                        <a class="dropdown-item" href="{{ route('users.index') }}">--}}
{{--                                            {{ __('All User') }}--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a href="{{ route('settings.index') }}" class="nav-link">{{ __('Site Settings') }}</a>--}}
{{--                                </li>--}}
{{--                            @endif--}}




{{--                            <li class="nav-item dropdown">--}}
{{--                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--                                    {{ Auth::user()->name }} <span class="caret"></span>--}}
{{--                                </a>--}}

{{--                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
{{--                                    <a class="dropdown-item" href="{{ route('users.edit-profile') }}">--}}
{{--                                        My Profile--}}
{{--                                    </a>--}}


{{--                                </div>--}}
{{--                            </li>--}}
{{--                        @endguest--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </nav>--}}

{{--        <main class="py-4">--}}

{{--            @auth--}}
{{--                <div class="container" >--}}
{{--                    <div class="row">--}}
{{--                        @yield('content')--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @else--}}
{{--                @yield('content')--}}
{{--            @endauth--}}




{{--        </main>--}}
{{--    </div>--}}

    @include('partial.notifications')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
<!-- Javascripts-->
<!-- Essential javascripts for application to work-->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="{{ asset('js/main.js') }}"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="js/plugins/pace.min.js"></script>
<script type="text/javascript" src="js/plugins/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="js/plugins/select2.min.js"></script>
<script type="text/javascript" src="js/plugins/bootstrap-datepicker.min.js"></script>
<!-- Page specific javascripts-->
<!-- Page specific javascripts-->
<script type="text/javascript" src="js/plugins/moment.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery-ui.custom.min.js"></script>
<script type="text/javascript" src="js/plugins/fullcalendar.min.js"></script>
<script type="text/javascript" src="js/plugins/chart.js"></script>

{{--<script>--}}
{{--    $('.bs-component [data-toggle="popover"]').popover();--}}
{{--    $('.bs-component [data-toggle="tooltip"]').tooltip();--}}
{{--</script>--}}
{{--<script type="text/javascript">--}}
{{--    $('#sl').click(function() {--}}
{{--        $('#tl').loadingBtn();--}}
{{--        $('#tb').loadingBtn({--}}
{{--            text: "Signing In"--}}
{{--        });--}}
{{--    });--}}

{{--    $('#el').click(function() {--}}
{{--        $('#tl').loadingBtnComplete();--}}
{{--        $('#tb').loadingBtnComplete({--}}
{{--            html: "Sign In"--}}
{{--        });--}}
{{--    });--}}
{{--    --}}
{{--</script>--}}


    @yield('script')

</body>
</html>

