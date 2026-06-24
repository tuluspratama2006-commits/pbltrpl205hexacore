<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PT. Berkah Alam Tabantang - Konstruksi & Infrastruktur Batam</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="nav-wrapper">
            <div class="logo">
                <img src="{{ asset('images/logo_pt_bat2.jpg') }}" alt="Logo BAT">
            </div>
            <ul class="nav-menu">
                <li><a href="#home" class="active">Home</a></li>
                <li><a href="#tentang-kami">Tentang Kami</a></li>
                <li><a href="#layanan">Layanan</a></li>
                <li><a href="#portofolio">Portfolio</a></li>
                <li><a href="#berita">Berita</a></li>
                <li><a href="#testimoni">Testimoni</a></li>
                <li><a href="#lokasi">Kontak</a></li>
            </ul>
            <div class="nav-right">
                <a href="javascript:void(0)" onclick="openLoginModal()">
                    <i class="fa-solid fa-user login-icon"></i>
                </a>
            </div>
        </div>
    </nav>

    <!-- HERO -->
    <section id="home">
        <img src="{{ asset('images/aspal.jpg') }}" class="hero-img" alt="Hero BAT">
        <div class="overlay"></div>
        <div class="hero-content">
            <h1>PT. Berkah Alam Tabantang</h1>
            <div class="tagline">Solusi Terpercaya untuk Konstruksi & Infrastruktur di Batam</div>
            <div class="description">Kami melayani pembangunan gedung, jalan raya, jembatan, hingga prasarana sumber daya air dengan mengutamakan integritas dan kepuasan pelanggan. Membangun dengan kualitas, beroperasi dengan keamanan.</div>
        </div>
    </section>

    <!-- TENTANG KAMI -->
    <section id="tentang-kami">
        <div class="inner-container">
            <div class="about-header">
                <h1 class="section-title">Tentang Kami</h1>
                <div class="title-underline"></div>
            </div>
            <div class="about-content">
                <div class="about-left">
                    <img class="about-logo-bg" src="{{ asset('images/logo_pt_bat2.jpg') }}" alt="watermark">
                    <div class="about-left-inner">
                        <h2>PT Berkah Alam Tabantang</h2>
                        <p>adalah perusahaan konstruksi terkemuka yang berbasis di Kota Batam. Dengan spesialisasi pada pembangunan infrastruktur dan proyek komersial skala besar, kami berkomitmen memberikan solusi konstruksi yang inovatif dan kolaboratif.</p>
                        <p>Didukung oleh tim profesional berpengalaman dan teknologi terkini, kami memastikan setiap proyek berjalan dengan standar kualitas, keamanan, dan keberlanjutan lingkungan yang tertinggi.</p>
                        <div class="sbu-label">Sertifikat Badan Usaha (SBU) Konstruksi</div>
                        <div class="sbu-number">PB-UMKU : 022100092289300040001</div>
                        <a href="#" class="btn-unduh"><i class="fas fa-chevron-right"></i> Unduh PDF</a>
                    </div>
                </div>
                <div class="about-right">
                    <div class="photos-grid">
                        <div class="photo-item"><img src="{{ asset('images/tentang_kami_1.jpg') }}" alt="Proyek 1"></div>
                        <div class="photo-item"><img src="{{ asset('images/tentang_kami_2.jpg') }}" alt="Proyek 2"></div>
                        <div class="photo-item"><img src="{{ asset('images/tentang_kami_3.jpg') }}" alt="Proyek 3"></div>
                        <div class="photo-item"><img src="{{ asset('images/tentang_kami_4.jpg') }}" alt="Proyek 4"></div>
                        <div class="photo-item"><img src="{{ asset('images/tentang_kami_5.jpg') }}" alt="Proyek 5"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

   <!-- LAYANAN -->
    <section id="layanan">
        <div class="layanan-header">
            <h1 class="section-title">L A Y A N A N</h1>
        </div>
        <div class="layanan-scroll-area">
            <div class="services-scroll-wrapper">
                <div class="services-track">
                    @forelse($layanans as $index => $item)
                    <div class="service-card">
                        {{-- Gambar --}}
                        @if($item->gambar)
                            <img src="{{ asset('storage/' . $item->gambar) }}"
                                 class="service-card-img"
                                 alt="{{ $item->judul_layanan }}">
                        @else
                            <img src="{{ asset('images/layanan_' . (($index % 4) + 1) . '.jpg') }}"
                                 class="service-card-img"
                                 alt="{{ $item->judul_layanan }}">
                        @endif

                        {{-- Preview atas --}}
                        <div class="service-card-top">
                            <div class="service-title">{{ $item->judul_layanan }}</div>
                            <div class="service-code">({{ $item->icon }})</div>
                        </div>

                        {{-- Body hover --}}
                        <div class="service-card-body">
                            <div class="service-title" style="margin-bottom:6px;">{{ $item->judul_layanan }}</div>
                            <div class="service-code" style="margin-bottom:12px;">({{ $item->icon }})</div>
                            <div class="service-desc">{{ strip_tags($item->deskripsi) }}</div>
                        </div>
                    </div>
                    @empty
                    {{-- Fallback jika belum ada data --}}
                    <div class="service-card">
                        <img src="{{ asset('images/layanan_1.jpg') }}" class="service-card-img" alt="Layanan">
                        <div class="service-card-top">
                            <div class="service-title">Belum ada layanan</div>
                        </div>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    <!-- PORTOFOLIO -->
    <section id="portofolio">
        <div class="inner-container">
            <div class="portfolio-header">
                <h1 class="section-title">PORTOFOLIO</h1>
            </div>
            <div class="portfolio-grid">
                <div class="portfolio-card">
                    <div class="portfolio-image">
                        <img src="{{ asset('images/portofolio_1.jpg') }}" alt="Portofolio 1">
                        <div class="portfolio-img-overlay">
                            <h3 class="portfolio-title">Konstruksi Area Komersial & Fasilitas Publik – Opus Bay Project</h3>
                        </div>
                    </div>
                    <div class="portfolio-bottom">
                        <button class="portfolio-btn" onclick="openPortfolioModal(1)">Selengkapnya &rsaquo;</button>
                    </div>
                </div>
                <div class="portfolio-card">
                    <div class="portfolio-image">
                        <img src="{{ asset('images/portofolio_2.jpg') }}" alt="Portofolio 2">
                        <div class="portfolio-img-overlay">
                            <h3 class="portfolio-title">Pengembangan Infrastruktur Terpadu – Opus Bay Waterfront</h3>
                        </div>
                    </div>
                    <div class="portfolio-bottom">
                        <button class="portfolio-btn" onclick="openPortfolioModal(2)">Selengkapnya &rsaquo;</button>
                    </div>
                </div>
                <div class="portfolio-card">
                    <div class="portfolio-image">
                        <img src="{{ asset('images/portofolio_3.jpg') }}" alt="Portofolio 3">
                        <div class="portfolio-img-overlay">
                            <h3 class="portfolio-title">Pembangunan Akses Jalan Utama & Konektivitas – Opus Bay Project</h3>
                        </div>
                    </div>
                    <div class="portfolio-bottom">
                        <button class="portfolio-btn" onclick="openPortfolioModal(3)">Selengkapnya &rsaquo;</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- BERITA -->
    <section id="berita">
        <div class="inner-container">
            <div class="berita-header">
                <h1 class="section-title">BERITA</h1>
            </div>
            @php
                $featured   = $publishedBerita->first();
                $listBerita = $publishedBerita->skip(1)->take(3);
            @endphp
            <div class="berita-layout">

                {{-- FEATURED / BERITA UTAMA --}}
                @if($featured)
                <div class="featured-card">
                    <div class="featured-img-wrap">
                        <img src="{{ asset('storage/' . $featured->thumbnail) }}" alt="{{ $featured->judul_berita }}">
                        <div class="featured-date-badge">
                            {{ \Carbon\Carbon::parse($featured->tanggal_posting)->isoFormat('D MMM YY') }}
                        </div>
                    </div>
                    <div class="featured-card-body">
                        <span class="featured-title-link">{{ $featured->judul_berita }}</span>
                        <p class="featured-excerpt">{{ Str::limit(strip_tags($featured->isi_berita), 180) }}</p>
                        <button class="btn-selengkapnya" onclick="openNewsModal({{ $featured->id_berita }})">
                            Selengkapnya &rsaquo;
                        </button>
                    </div>
                </div>
                @endif

                {{-- LIST BERITA KANAN --}}
                <div class="news-list">
                    @forelse($listBerita as $berita)
                    <div class="news-item" onclick="openNewsModal({{ $berita->id_berita }})">
                        <div class="news-item-img">
                            <img src="{{ asset('storage/' . $berita->thumbnail) }}" alt="{{ $berita->judul_berita }}">
                            <div class="news-item-date">
                                {{ \Carbon\Carbon::parse($berita->tanggal_posting)->isoFormat('D MMM YY') }}
                            </div>
                        </div>
                        <div class="news-item-body">
                            <div class="news-item-title">{{ $berita->judul_berita }}</div>
                            <div class="news-item-excerpt">{{ Str::limit(strip_tags($berita->isi_berita), 120) }}</div>
                            <button class="btn-baca">Baca &rsaquo;</button>
                        </div>
                    </div>
                    @empty
                    <div class="news-item">
                        <div class="news-item-body">
                            <div class="news-item-title" style="color:#94a3b8;">Belum ada berita lainnya.</div>
                        </div>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    <!-- TESTIMONI -->
    <section id="testimoni">
        <div class="testimoni-header">
            <h1 class="section-title">T E S T I M O N I</h1>
        </div>
        <div class="inner-container">
            <div class="testimoni-subtitle-block">
                <span class="sub-bold">Bukti Nyata Kualitas Konstruksi Kami</span>
                <p class="sub-text">Kolaborasi yang solid melahirkan infrastruktur yang kokoh. Inilah testimoni dari mereka yang telah bermitra dengan PT BAT.</p>
            </div>
            <div class="testimoni-grid">
                <div class="testimoni-card">
                    <div class="company-logo-circle"><span>STP</span></div>
                    <div class="testimoni-rating">★★★★★</div>
                    <p class="testimoni-text">"Profesional dan tepat waktu. Koordinasi tim di lapangan sangat solid, sehingga proyek selesai sesuai jadwal tanpa mengurangi detail kualitas teknis."</p>
                    <p class="testimoni-author">— Site Supervisor</p>
                </div>
                <div class="testimoni-card">
                    <div class="company-logo-circle"><span>GP</span></div>
                    <div class="testimoni-rating">★★★★★</div>
                    <p class="testimoni-text">"Hasil pengerjaan infrastrukturnya sangat rapi dan kokoh. PT BAT benar-benar menjaga standar kualitas sesuai spesifikasi yang diminta. Sangat puas!"</p>
                    <p class="testimoni-author">— Project Manager, Kawasan Residensial</p>
                </div>
                <div class="testimoni-card">
                    <div class="company-logo-circle"><span>P</span></div>
                    <div class="testimoni-rating">★★★★★</div>
                    <p class="testimoni-text">"Sangat disiplin dalam prosedur keselamatan kerja (K3). PT BAT membuktikan bahwa proyek skala besar bisa berjalan aman, bersih, dan tetap efisien."</p>
                    <p class="testimoni-author">— Konsultan Konstruksi</p>
                </div>
            </div>
        </div>
    </section>

    <!-- LOKASI -->
    <section id="lokasi">
        <div class="inner-container">
            <div class="lokasi-header">
                <h1 class="section-title">L O K A S I</h1>
            </div>
            <div class="lokasi-grid">
                <div class="lokasi-card">
                    @if($profil && $profil->maps_embed)
                        {!! $profil->maps_embed !!}
                    @else
                        <img src="{{ asset('images/lokasi_1.jpg') }}" alt="Alamat Kantor">
                    @endif
                    <div class="lokasi-card-content">
                        <p><strong>Alamat :</strong> {{ $profil->alamat ?? 'Perum Griya Batu Aji Asri THP. 6 Blok V2 No.6, Kel. Sei Langkai, Kec.Sagulung, Batam' }}</p>
                    </div>
                </div>
                <div class="lokasi-card">
                    @if($profil && $profil->maps_embed_2)
                        {!! $profil->maps_embed_2 !!}
                    @else
                        <img src="{{ asset('images/lokasi_2.jpg') }}" alt="Kantor Operasional">
                    @endif
                    <div class="lokasi-card-content">
                        <p><strong>Kantor Operasional :</strong> {{ $profil->alamat_2 ?? 'Ruko Marbella 2 Blok D6 No.7, Batam Center – Batam' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer>
        <div class="footer-inner">
            <div class="footer-top">
                <div class="footer-brand">
                    <div class="footer-brand-row">
                        <img src="{{ asset('images/logo_pt_bat2.jpg') }}" alt="Logo">
                        <h3>{{ $profil->nama_perusahaan ?? 'PT. Berkah Alam Tabantang' }}</h3>
                    </div>
                    <p>Solusi Terpercaya untuk Konstruksi & Infrastruktur di Batam</p>
                    <p>Email : <a href="mailto:{{ $profil->email ?? 'berkahat@yahoo.com' }}">{{ $profil->email ?? 'berkahat@yahoo.com' }}</a></p>
                    <p>Telp : {{ $profil->telepon ?? '0813-6332-7109' }}{{ $profil->telepon_2 ? ' / ' . $profil->telepon_2 : '' }}</p>
                    <div class="footer-social">
                        @if($profil && $profil->whatsapp)
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $profil->whatsapp) }}" target="_blank"><i class="fab fa-whatsapp"></i></a>
                        @endif
                        @if($profil && $profil->instagram)
                        <a href="{{ $profil->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a>
                        @endif
                        @if($profil && $profil->email)
                        <a href="mailto:{{ $profil->email }}"><i class="fas fa-envelope"></i></a>
                        @endif
                        @if($profil && $profil->facebook)
                        <a href="{{ $profil->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        @endif
                        @if($profil && $profil->linkedin)
                        <a href="{{ $profil->linkedin }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                        @endif
                    </div>
                </div>
                <div class="footer-links">
                    <div class="footer-col">
                        <h4>Kontak Kami</h4>
                        <p><i class="fas fa-envelope"></i> {{ $profil->email ?? 'berkahat@yahoo.com' }}</p>
                        <p><i class="fas fa-phone"></i> {{ $profil->telepon ?? '0813-6332-7109' }}</p>
                        @if($profil && $profil->telepon_2)
                        <p><i class="fas fa-phone"></i> {{ $profil->telepon_2 }}</p>
                        @endif
                    </div>
                    <div class="footer-col">
                        <h4>Menu Cepat</h4>
                        <a href="#home">Home</a>
                        <a href="#tentang-kami">Tentang Kami</a>
                        <a href="#layanan">Layanan</a>
                        <a href="#portofolio">Portofolio</a>
                        <a href="#berita">Berita</a>
                        <a href="#testimoni">Testimoni</a>
                    </div>
                    <div class="footer-col">
                        <h4>Jam Operasional</h4>
                        <p>Senin - Jumat: 08:00 - 17:00</p>
                        <p>Sabtu: 08:00 - 14:00</p>
                        <p>Minggu: Tutup</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom-full">
            <p>Copyright © {{ $profil->nama_perusahaan ?? 'PT Berkah Alam Tabantang (BAT)' }}. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- MODAL PORTOFOLIO -->
    <div id="portfolioModal" class="modal">
        <div class="portfolio-modal-content">
            <span class="modal-close" onclick="closePortfolioModal()">&times;</span>
            <div class="portfolio-modal-inner">
                <div class="portfolio-modal-photos" id="portfolioModalPhotos"></div>
                <div class="portfolio-modal-text">
                    <h2 class="portfolio-modal-title" id="portfolioModalTitle"></h2>
                    <div class="portfolio-modal-body" id="portfolioModalBody"></div>
                </div>
            </div>
            <div class="portfolio-modal-footer">
                <a href="#" class="btn-unduh-pdf"><i class="fas fa-file-pdf"></i> Unduh PDF</a>
            </div>
        </div>
    </div>

    <!-- MODAL BERITA -->
    <div id="newsModal" class="modal">
        <div class="news-modal-content">
            <span class="modal-close" onclick="closeNewsModal()">&times;</span>
            <div class="news-modal-hero">
                <img id="newsModalImg" src="" alt="">
                <div class="news-modal-hero-overlay">
                    <h2 id="newsModalTitle"></h2>
                    <span class="news-modal-date" id="newsModalDate"></span>
                </div>
            </div>
            <div class="news-modal-body" id="newsModalBody"></div>
        </div>
    </div>

    <!-- MODAL LOGIN -->
    <div id="loginModal" class="login-modal">
        <div class="login-modal-content">
            <span class="login-modal-close" onclick="closeLoginModal()">&times;</span>
            <h2>LOGIN</h2>
            <div class="login-input-group">
                <label>email</label>
                <input type="email" id="username" placeholder="Masukkan email">
            </div>
            <div class="login-input-group">
                <label>Password</label>
                <input type="password" id="password" placeholder="Masukkan password">
            </div>
            <button class="login-btn" onclick="handleLogin()">LOGIN</button>
        </div>
    </div>

    <script>
        const NAVBAR_HEIGHT = 56;

        function scrollToSection(targetId) {
            const target = document.getElementById(targetId);
            if (!target) return;
            target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }

        const navLinks = document.querySelectorAll('.nav-menu a[href^="#"]');
        navLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href').substring(1);
                scrollToSection(targetId);
            });
        });

        document.querySelectorAll('.footer-col a[href^="#"]').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href').substring(1);
                scrollToSection(targetId);
            });
        });

        const sections = document.querySelectorAll('section[id]');

        function updateActiveNav() {
            let current = '';
            sections.forEach(section => {
                const sectionTop = section.getBoundingClientRect().top;
                if (sectionTop <= NAVBAR_HEIGHT + 10) {
                    current = section.getAttribute('id');
                }
            });
            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === '#' + current) {
                    link.classList.add('active');
                }
            });
        }

        window.addEventListener('scroll', updateActiveNav);
        updateActiveNav();

        // PORTFOLIO MODAL
        const portfolioData = {
            1: {
                title: "Konstruksi Area Komersial & Fasilitas Publik – Opus Bay Project",
                photos: ["{{ asset('images/portofolio_1.jpg') }}", "{{ asset('images/portofolio_1.jpg') }}"],
                body: `<p><strong>Ringkasan Proyek:</strong> Pelaksanaan konstruksi bangunan gedung fungsional yang menjadi fasilitas pendukung bagi penghuni dan pengunjung kawasan.</p>
                <p><span class="spec-title">Spesifikasi Teknis (BG009):</span></p>
                <ul class="spec-list"><li>Pengerjaan struktur beton bertulang.</li><li>Instalasi mekanikal, elektrikal, dan plumbing (MEP) standar gedung komersial.</li><li>Finishing eksterior yang sesuai dengan desain arsitektur modern Opus Bay.</li></ul>
                <p><strong>Hasil Akhir:</strong> Fasilitas gedung yang kokoh secara struktur dan estetis secara visual.</p>`
            },
            2: {
                title: "Pengembangan Infrastruktur Terpadu – Opus Bay Waterfront",
                photos: ["{{ asset('images/portofolio_2.jpg') }}", "{{ asset('images/portofolio_2.jpg') }}"],
                body: `<p><strong>Ringkasan Proyek:</strong> Pembangunan sistem drainase makro dan mikro untuk memastikan kawasan bebas genangan.</p>
                <ul class="spec-list"><li>Pemasangan saluran U-Ditch beton pracetak.</li><li>Pembangunan kolam retensi air hujan.</li><li>Sistem pembuangan akhir ke arah laut dengan katup penahan pasang surut.</li></ul>`
            },
            3: {
                title: "Pembangunan Akses Jalan Utama & Konektivitas – Opus Bay Project",
                photos: ["{{ asset('images/portofolio_3.jpg') }}", "{{ asset('images/portofolio_3.jpg') }}"],
                body: `<p><strong>Ringkasan Proyek:</strong> Konstruksi jaringan jalan utama yang menghubungkan area residensial Opus Bay dengan akses publik.</p>
                <ul class="spec-list"><li>Pengaspalan Hotmix standar ketahanan tinggi.</li><li>Pemasangan trotoar pedestarian dan marka jalan reflektif.</li><li>Sistem drainase tepi jalan yang terintegrasi.</li></ul>`
            }
        };

        function openPortfolioModal(id) {
            const data = portfolioData[id];
            if (!data) return;
            document.getElementById('portfolioModalTitle').innerHTML = data.title;
            document.getElementById('portfolioModalBody').innerHTML = data.body;
            document.getElementById('portfolioModalPhotos').innerHTML = `
                <div class="photo-main"><img src="${data.photos[0]}" alt="Foto 1"></div>
                <div class="photo-secondary"><img src="${data.photos[1]}" alt="Foto 2"></div>
            `;
            document.getElementById('portfolioModal').style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }
        function closePortfolioModal() {
            document.getElementById('portfolioModal').style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        // BERITA MODAL
        const newsData = {
            @foreach($publishedBerita as $b)
            {{ $b->id_berita }}: {
                date:    "{{ \Carbon\Carbon::parse($b->tanggal_posting)->isoFormat('D MMMM YYYY') }}",
                title:   "{{ addslashes($b->judul_berita) }}",
                image:   "{{ asset('storage/' . $b->thumbnail) }}",
                content: {!! json_encode($b->isi_berita) !!}
            },
            @endforeach
        };

        function openNewsModal(id) {
            const news = newsData[id];
            if (!news) return;
            document.getElementById('newsModalImg').src = news.image;
            document.getElementById('newsModalTitle').innerHTML = news.title;
            document.getElementById('newsModalDate').innerHTML = news.date;
            document.getElementById('newsModalBody').innerHTML = news.content;
            document.getElementById('newsModal').style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }
        function closeNewsModal() {
            document.getElementById('newsModal').style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        // LOGIN MODAL
        function openLoginModal() { document.getElementById('loginModal').style.display = 'flex'; document.body.style.overflow = 'hidden'; }
        function closeLoginModal() { document.getElementById('loginModal').style.display = 'none'; document.body.style.overflow = 'auto'; }

        function handleLogin() {
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;

            if (!username || !password) {
                alert('Username dan password wajib diisi!');
                return;
            }

            fetch('/login', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ username, password })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    window.location.href = data.redirect;
                } else {
                    alert(data.message);
                }
            })
            .catch(() => alert('Terjadi kesalahan. Coba lagi.'));
        }

        // Tutup modal jika klik di luar konten
        window.onclick = function(event) {
            if (event.target == document.getElementById('portfolioModal')) closePortfolioModal();
            if (event.target == document.getElementById('newsModal')) closeNewsModal();
            if (event.target == document.getElementById('loginModal')) closeLoginModal();
        }
    </script>
</body>
</html>
