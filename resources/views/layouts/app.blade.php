<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PT Berkah Alam Tabantang</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="nav-container">

            <div class="logo">
                <img src="{{ asset('images/logo_pt_bat.jpg') }}" alt="Logo">
            </div>

            <ul class="menu">
                <li><a href="#">Home</a></li>
                <li><a href="#">Tentang Kami</a></li>
                <li><a href="#">Layanan</a></li>
                <li><a href="#">Portfolio</a></li>
                <li><a href="#">Berita</a></li>
                <li><a href="#">Testimoni</a></li>
                <li><a href="#">Kontak</a></li>
            </ul>

            <div class="profile">
                <img src="{{ asset('images/user.png') }}" alt="User">
            </div>

        </div>
    </nav>

    <!-- CONTENT -->
    @yield('content')

</body>
</html>
