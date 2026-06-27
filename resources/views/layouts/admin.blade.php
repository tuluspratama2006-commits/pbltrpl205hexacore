<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') — Admin BAT</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body>

    @include('partials.admin-sidebar')

    <div class="main-content">

        @include('partials.admin-topbar')

        <div class="content">
            @yield('content')
        </div>

    </div>

    @stack('scripts')

</body>

</html>