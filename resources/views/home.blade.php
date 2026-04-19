<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT. Berkah Alam Tabantang</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* ================= NAVBAR (PERSIS) ================= */
        .navbar {
            background: #c3d3e3; /* lebih mendekati gambar */
            position: fixed;
            top: 0;
            width: 100%;
            height: 52px; /* tinggi fix */
            display: flex;
            align-items: center;
            z-index: 1000;
        }

        .container {
            max-width: 1280px; /* lebih lebar biar kayak gambar */
            margin: 0 auto;
            padding: 0 20px;
            width: 100%;
        }

        .nav-wrapper {
            display: flex;
            align-items: center;
            width: 100%;
        }

        /* LOGO (KIRI BANGET) */
        .logo {
            flex: 1;
        }

        .logo img {
            height: 34px;
        }

        /* MENU (POSISI TENGAH KE KANAN DIKIT) */
        .nav-menu {
            flex: 2;
            display: flex;
            justify-content: center;
            list-style: none;
            gap: 32px; /* jarak antar menu */
        }

        .nav-menu a {
            text-decoration: none;
            color: #000;
            font-size: 15px;
            font-weight: 500;
        }

        /* LOGIN (KANAN BANGET) */
        .nav-right {
            flex: 1;
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        .login-icon {
            font-size: 18px;
            margin-right: 5px; /* sedikit masuk dari pinggir */
        }

        /* ================= HERO ================= */
        .hero {
            position: relative;
            margin-top: 52px; /* HARUS sama dengan navbar */
            height: calc(100vh - 52px);
            overflow: hidden;
        }

        .hero-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(
                to right,
                rgba(0,0,0,0.75) 0%,
                rgba(0,0,0,0.55) 40%,
                rgba(0,0,0,0.2) 70%,
                rgba(0,0,0,0) 100%
            );
        }

        /* TEXT */
        .hero-content {
            position: absolute;
            top: 52%;
            left: 80px;
            transform: translateY(-50%);
            color: white;
            max-width: 700px;
        }

        .hero h1 {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .tagline {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .description {
            font-size: 17px;
            line-height: 1.7;
        }

        /* ================= RESPONSIVE ================= */
        @media (max-width: 768px) {

            .nav-wrapper {
                flex-direction: column;
                gap: 10px;
            }

            .nav-menu {
                flex-wrap: wrap;
                gap: 15px;
            }

            .hero-content {
                left: 20px;
                right: 20px;
            }

            .hero h1 {
                font-size: 28px;
            }
        }

    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="container">
            <div class="nav-wrapper">

                <div class="logo">
                    <img src="{{ asset('image/logo_pt_bat2.jpg') }}">
                </div>

                <ul class="nav-menu">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Tentang Kami</a></li>
                    <li><a href="#">Layanan</a></li>
                    <li><a href="#">Portfolio</a></li>
                    <li><a href="#">Berita</a></li>
                    <li><a href="#">Testimoni</a></li>
                    <li><a href="#">Kontak</a></li>
                </ul>

                <div class="nav-right">
                    <a href="/login">
                        <i class="fa-solid fa-user login-icon"></i>
                    </a>
                </div>

            </div>
        </div>
    </nav>

    <!-- HERO -->
    <section class="hero">

        <img src="{{ asset('image/Landing_page.jpg') }}" class="hero-img">

        <div class="overlay"></div>

        <div class="hero-content">
            <h1>PT. Berkah Alam Tabantang</h1>

            <div class="tagline">
                Solusi Terpercaya untuk Konstruksi & Infrastruktur di Batam
            </div>

            <div class="description">
                Kami melayani pembangunan gedung, jalan raya, jembatan, hingga prasarana sumber daya air
                dengan mengutamakan integritas dan kepuasan pelanggan. Membangun dengan kualitas,
                beroperasi dengan keamanan.
            </div>
        </div>

    </section>

</body>
</html>
