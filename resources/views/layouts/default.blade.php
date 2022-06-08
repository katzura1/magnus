<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title??'' }}</title>

    @stack('before-styles')
    @include('includes.style')
    @stack('after-styles')
</head>

<body class="sidebar-collapse">
    <div class="wrapper">

        <!-- Navbar -->
        @include('includes.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        {{-- @include('includes.sidebar') --}}

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        @include('includes.footer')
    </div>
    <!-- ./wrapper -->

    @stack('before-scripts')
    @include('includes.script')
    @stack('after-scripts')
</body>

</html>
