<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- ionicicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Styles -->
    <link href="{{ asset('/theme/admin-lte/dist/css/adminlte.css') }}" rel="stylesheet">
    <link href="{{ asset('/theme/admin-lte/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/theme/custom.css') }}">
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('layouts.navbar')
        @include('layouts.aside')
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">{{ $page_title ?? '' }}</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                @isset($breadcrumb_links)
                                    @foreach ($breadcrumb_links as $bl)
                                        <li class="breadcrumb-item active"><a
                                                href="{{ $bl['link'] }}">{!! $bl['item'] !!}</a>
                                        </li>
                                    @endforeach
                                @endisset
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="container-fluid bg">
                    @include('layouts.alerts')
                    @yield('content')
                </div>
            </div>
        </div>
        <aside class="control-sidebar control-sidebar-dark">
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <footer class="main-footer">
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    {{-- Scripts --}}
    <script src="{{ asset('/theme/admin-lte/plugins/jquery/jquery.js') }}"></script>
    {{-- Theeme Script --}}
    <script src="{{ asset('/theme/admin-lte/dist/js/adminlte.js') }}"></script>
    {{-- DataTable --}}
    <script src="{{ asset('theme/admin-lte/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('theme/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <link rel="stylesheet"
        href="{{ asset('theme/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    {{-- Moment JS --}}
    <script src="{{ asset('theme/admin-lte/plugins/moment/moment.min.js') }}"></script>
    {{-- sweetalert2 --}}
    <script src="{{ asset('theme/admin-lte/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
    @yield('js')
</body>

</html>
