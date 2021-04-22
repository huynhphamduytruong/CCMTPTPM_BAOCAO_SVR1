<?php /* Happy coding */ ?>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.backend.header')
<body class="sidebar-mini layout-fixed layout-navbar-fixed">
    <div id="backend" class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img src="/images/Smartphone.gif" alt="AE Cột chèo" height="60" width="60">
        </div>
        @include('layouts.backend.navbar')

        <main class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid row mx-1">
                    <div class="header-content col">
                        <h1>@yield('title', '')</h1>
                    </div>

                    @hasSection( 'action-btn' )
                        <div class="action-bar-wrapper col">
                            <div class="float-right">
                                @yield('action-btn')
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="content p-3">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </main>

        @include('layouts.backend.footer')
    </div>
</body>
</html>
