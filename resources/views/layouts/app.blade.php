<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT. Berkah Alam Tabantang</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans antialiased">

    <nav class="bg-white shadow-md fixed w-full z-10 top-0">
        <div class="container mx-auto px-6 py-3 flex justify-between items-center">
            <div class="text-xl font-bold text-blue-700">PT. Berkah Alam Tabantang</div>
            <div class="hidden md:flex space-x-6">
                <a href="#home" class="hover:text-blue-600">Home</a>
                <a href="#about" class="hover:text-blue-600">Tentang Kami</a>
                <a href="#services" class="hover:text-blue-600">Layanan</a>
                <a href="#portfolio" class="hover:text-blue-600">Portfolio</a>
                <a href="#news" class="hover:text-blue-600">Berita</a>
                <a href="#testimonials" class="hover:text-blue-600">Testimoni</a>
                <a href="#contact" class="hover:text-blue-600">Kontak</a>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

</body>
</html>
