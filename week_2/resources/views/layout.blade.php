<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="{{asset('/')}}assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title> @yield('title')</title>
</head>

<body>
    <div class="content">
        <!-- Menu -->
        <nav id="nav">
            <div class="heading-active">
                <i class="fas fa-tablet-alt"></i>
                <span>Device Management</span>
            </div>
            <ul>
                <li>
                    <i class="fas fa-tv"></i>
                    <a href="{{route('dashboard')}}" class="@yield('dashboard')">Dashboards</a>
                </li>
                <li>
                    <i class="fas fa-history"></i>
                    <a href="{{route('log')}}" class="@yield('log')">Logs</a>
                </li>
                <li>
                    <i class="fas fa-cog"></i>
                    <a href="{{route('setting')}}" class="@yield('setting')">Setting</a>
                </li>
                <li>
                    <a href="{{route('logout')}}" class="btn" style="background: red;">Logout</a>
                </li>
            </ul>
        </nav>
        <!-- End Menu -->
        <div>
            <!-- Header -->
            <header id="header">
                <span id="btn-nav" class="nav-mobile" onclick="click_nav(1)">
                    <i class="fas fa-stream"></i>
                </span>
                <div id="user" class="user-active">
                    <img src="@if(Auth::user()){{asset('storage/' . Auth::user()->avatar)}}@endif" alt="" width="40px" height="40px">
                    <span>Welcom <b> @if(Auth::user())
                            {{Auth::user()->name}}
                            @endif</b></span>
                </div>
            </header>
            <!-- End Header -->

            <!-- Content -->
            <main onclick="click_nav(0)">
                @yield('main-content')
            </main>
            <!-- End Content -->
        </div>
    </div>

    <script src="{{asset('/')}}assets/js/main.js"></script>

    @yield('script')
</body>

</html>