<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags  -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
        name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
    />
    <title>Hafazan by Suzen Pax</title>
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/font.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/js/app.js') }}" defer></script>
    @vite([
    'resources/css/app.css',
    ])
    <link href="https://ka-f.fontawesome.com/releases/v6.2.0/css/pro.min.css" rel="stylesheet">
    <script>
        localStorage.getItem("_x_darkMode_on") === "true" && document.documentElement.classList.add("dark");
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

</head>

<body x-data class="is-header-blur" x-bind="$store.global.documentBody">

@include('layouts.preloader')

<!-- Page Wrapper -->
<div
    id="root"
    class="min-h-100vh flex grow bg-slate-50 dark:bg-navy-900"
    x-cloak
>

    @include('layouts.sidebar')
    @include('layouts.header')
    @include('layouts.mobile_searchbar')
    @include('layouts.right_sidebar')
    @yield('content')
</div>
<!-- End Page Wrapper -->

<div id="x-teleport-target"></div>

<script>
    window.addEventListener("DOMContentLoaded", () => Alpine.start());
</script>
@stack('scripts')
</body>
</html>
