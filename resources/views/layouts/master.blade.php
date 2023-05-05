<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    @if(Request::routeIs('Dashboard'))<meta http-equiv="refresh" content="30">@endif
    <title>{{ env('APP_NAME') }} | Dashboard</title>
    <!-- include style section -->
    @include('.layouts.style')
    @stack('styles')
    <!--  page level css -->
</head>

<body class="fixed-navbar">
<div class="page-wrapper">
    <!-- START HEADER-->
    @include('.layouts.navbar')
    <!-- END HEADER-->
    <!-- START SIDEBAR-->
    @include('.layouts.sidebar')
    <!-- END SIDEBAR-->
    <div class="content-wrapper">
        <!-- START PAGE CONTENT-->
        @yield('content')
        <!-- END PAGE CONTENT-->
        @include('.layouts.footer')
    </div>
</div>
<!-- END THEME CONFIG PANEL-->
<!-- BEGIN PAGA BACKDROPS-->
<div class="sidenav-backdrop backdrop"></div>
<div class="preloader-backdrop">
    <div class="page-preloader">Loading</div>
</div>
<!-- END PAGA BACKDROPS-->
<!-- include script section -->
@include('.layouts.script')
@stack('scripts')
</body>

</html>
