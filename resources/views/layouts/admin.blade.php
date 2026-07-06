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

    <div class="sidebar-overlay" onclick="toggleAdminSidebar()"></div>

    @include('partials.admin-sidebar')

    <div class="main-content">

        @include('partials.admin-topbar')

        <div class="content">
            @include('partials.admin-toast')
            @yield('content')
        </div>

    </div>

    <script>
    function toggleAdminSidebar() {
        document.querySelector('.sidebar').classList.toggle('active');
        document.querySelector('.hamburger-admin').classList.toggle('active');
        document.querySelector('.sidebar-overlay').classList.toggle('active');
    }

    // Close sidebar when clicking a nav link on mobile
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.sidebar-nav a').forEach(function(link) {
            link.addEventListener('click', function() {
                if (window.innerWidth <= 768) {
                    document.querySelector('.sidebar').classList.remove('active');
                    document.querySelector('.hamburger-admin').classList.remove('active');
                    document.querySelector('.sidebar-overlay').classList.remove('active');
                }
            });
        });
    });
    </script>

    @stack('scripts')

</body>

</html>
