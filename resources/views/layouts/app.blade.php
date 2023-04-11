<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Sistem Informasi Sekolah</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="{{ asset('assets/') }}/img/icon.ico" type="image/x-icon" />
    <script src="{{ asset('assets/') }}/js/core/jquery.3.2.1.min.js"></script>
    <meta name="csrf_token" content="{{ csrf_token() }}" />
    <!-- Fonts and icons -->
    <script src="{{ asset('assets/') }}/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Open+Sans:300,400,600,700"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"],
                urls: ['{{ asset('assets/') }}/css/fonts.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/') }}/css/azzara.min.css">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ asset('assets/') }}/css/demo.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    @stack('css')
    @livewireStyles
</head>

<body>
    <div class="wrapper">
        <! Tip 1: You can change the background color of the main header using:
            data-background-color="blue | purple | light-blue | green | orange | red" -->
            <div class="main-header" data-background-color="green">
                <!-- Logo Header -->
                <div class="logo-header">

                    <a href="" class="logo text-white mt-1">
                        {{ setting()->text_pembuka }}
                    </a>
                    <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                        data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon">
                            <i class="fa fa-bars"></i>
                        </span>
                    </button>

                    <div class="navbar-minimize">
                        <button class="btn btn-minimize btn-rounded">
                            <i class="fa fa-bars"></i>

                        </button>

                    </div>
                </div>
                <!-- End Logo Header -->

                <!-- TopBar Header -->
                @include('layouts.topbar')
            </div>

            <!-- Sidebar -->
            <div class="sidebar">
                <div class="sidebar-background"></div>
                <div class="sidebar-wrapper scrollbar-inner">
                    <div class="sidebar-content">
                        <div class="user">

                            <div class="avatar-sm float-left mr-2">
                                @if (auth()->user()->foto != null)
                                    <img src="{{ asset('storage/foto-user/' . auth()->user()->foto) }}" alt="user"
                                        class="avatar-img rounded-circle">
                                @else
                                    <img src="{{ asset('storage/foto-user/user.png') }}" alt="user"
                                        class="avatar-img rounded-circle">
                                @endif
                            </div>

                            {{-- Navigasi Bar --}}
                            @include('layouts.profile')
                        </div>
                        {{-- Navigasi Bar --}}
                        @include('layouts.navbar')

                    </div>
                </div>
            </div>
            <!-- End Sidebar -->
            <div class="main-panel">
                <div class="content">
                    <div class="page-inner">
                        <div class="card mt-3">
                            <div class="card-header">
                                <h5 class="card-title"><b>@yield('title')</b></h5>
                            </div>
                        </div>
                        @yield('content')
                    </div>
                </div>
            </div>

    </div>
    <!--   Core JS Files   -->

    <script src="{{ asset('assets/') }}/js/core/popper.min.js"></script>
    <script src="{{ asset('assets/') }}/js/core/bootstrap.min.js"></script>

    <!-- jQuery UI -->
    <script src="{{ asset('assets/') }}/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="{{ asset('assets/') }}/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{ asset('assets/') }}/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <!-- Moment JS -->
    <script src="{{ asset('assets/') }}/js/plugin/moment/moment.min.js"></script>

    <!-- Bootstrap Toggle -->
    <script src="{{ asset('assets/') }}/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>

    <!-- Azzara JS -->
    <script src="{{ asset('assets/') }}/js/ready.min.js"></script>

    <!-- Azzara DEMO methods, don't include it in your project! -->
    <script src="{{ asset('assets/') }}/js/demo.js"></script>
    @include('sweetalert::alert')
    @stack('js')
    @stack('js-internal')
    @livewireScripts

</body>

</html>
