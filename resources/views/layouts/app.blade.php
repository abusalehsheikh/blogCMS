
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

    @include('partial.notifications')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
<!-- Javascripts-->

<script src="{{ asset('js/main.js') }}"></script>


    @yield('script')

</body>
</html>

