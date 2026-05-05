<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>PT. Berkah Alam Tabantang - Konstruksi & Infrastruktur Batam</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="nav-wrapper">
            <div class="logo">
                <img src="images/logo_pt_bat2.jpg" alt="Logo BAT">
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
        <img src="images/aspal.jpg" class="hero-img" alt="Hero BAT">
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
                    <img class="about-logo-bg" src="images/logo_pt_bat2.jpg" alt="watermark">
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
                        <div class="photo-item"><img src="images/tentang_kami_1.jpg" alt="Proyek 1"></div>
                        <div class="photo-item"><img src="images/tentang_kami_2.jpg" alt="Proyek 2"></div>
                        <div class="photo-item"><img src="images/tentang_kami_3.jpg" alt="Proyek 3"></div>
                        <div class="photo-item"><img src="images/tentang_kami_4.jpg" alt="Proyek 4"></div>
                        <div class="photo-item"><img src="images/tentang_kami_5.jpg" alt="Proyek 5"></div>
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
                    <div class="service-card">
                        <img src="images/layanan_1.jpg" class="service-card-img" alt="BG009">
                        <div class="service-card-top">
                            <div class="service-title">Konstruksi Gedung Lainnya</div>
                            <div class="service-code">(BG009)</div>
                        </div>
                        <div class="service-card-body">
                            <div class="service-title" style="margin-bottom:6px;">Konstruksi Gedung Lainnya</div>
                            <div class="service-code" style="margin-bottom:12px;">(BG009)</div>
                            <div class="service-desc">Penyediaan jasa konstruksi untuk berbagai jenis gedung komersial maupun fasilitas publik lainnya dengan mengutamakan fungsionalitas ruang dan kekuatan struktur bangunan.</div>
                            <ul class="service-features">
                                <li><i class="fas fa-check-circle"></i> Gedung Komersial</li>
                                <li><i class="fas fa-check-circle"></i> Fasilitas Publik</li>
                                <li><i class="fas fa-check-circle"></i> Struktur Berkualitas</li>
                            </ul>
                        </div>
                    </div>
                    <div class="service-card">
                        <img src="images/layanan_2.jpg" class="service-card-img" alt="SI001">
                        <div class="service-card-top">
                            <div class="service-title">Pekerjaan Bangunan Sipil – Sumber Daya Air</div>
                            <div class="service-code">(SI001)</div>
                        </div>
                        <div class="service-card-body">
                            <div class="service-title" style="margin-bottom:6px;">Pekerjaan Bangunan Sipil – Sumber Daya Air</div>
                            <div class="service-code" style="margin-bottom:12px;">(SI001)</div>
                            <div class="service-desc">Kami melayani jasa pelaksana untuk konstruksi jaringan saluran air, pelabuhan, dam, bendungan, serta prasarana sumber daya air lainnya. Fokus kami adalah efisiensi aliran dan ketahanan struktur jangka panjang.</div>
                            <ul class="service-features">
                                <li><i class="fas fa-check-circle"></i> Jaringan Saluran Air</li>
                                <li><i class="fas fa-check-circle"></i> Dam & Bendungan</li>
                                <li><i class="fas fa-check-circle"></i> Prasarana Sumber Daya Air</li>
                            </ul>
                        </div>
                    </div>
                    <div class="service-card">
                        <img src="images/layanan_3.jpg" class="service-card-img" alt="SI003">
                        <div class="service-card-top">
                            <div class="service-title">Pembangunan Infrastruktur Jalan Raya</div>
                            <div class="service-code">(SI003)</div>
                        </div>
                        <div class="service-card-body">
                            <div class="service-title" style="margin-bottom:6px;">Pembangunan Infrastruktur Jalan Raya</div>
                            <div class="service-code" style="margin-bottom:12px;">(SI003)</div>
                            <div class="service-desc">Layanan khusus pelaksanaan konstruksi jalan raya (kecuali jalan layang), jalan lokal, rel kereta api, hingga landas pacu bandara. Kami memastikan kualitas pengaspalan dan fondasi yang mampu menahan beban kendaraan berat.</div>
                            <ul class="service-features">
                                <li><i class="fas fa-check-circle"></i> Jalan Raya & Lokal</li>
                                <li><i class="fas fa-check-circle"></i> Rel Kereta Api</li>
                                <li><i class="fas fa-check-circle"></i> Landas Pacu Bandara</li>
                            </ul>
                        </div>
                    </div>
                    <div class="service-card">
                        <img src="images/layanan_4.jpeg" class="service-card-img" alt="SI004">
                        <div class="service-card-top">
                            <div class="service-title">Konstruksi Jembatan & Jalan Layang</div>
                            <div class="service-code">(SI004)</div>
                        </div>
                        <div class="service-card-body">
                            <div class="service-title" style="margin-bottom:6px;">Konstruksi Jembatan & Jalan Layang</div>
                            <div class="service-code" style="margin-bottom:12px;">(SI004)</div>
                            <div class="service-desc">Spesialisasi kami mencakup pengerjaan jembatan, jalan layang, terowongan, hingga jalur bawah tanah (subway). Menggunakan perhitungan teknis yang presisi untuk menghubungkan konektivitas antar wilayah.</div>
                            <ul class="service-features">
                                <li><i class="fas fa-check-circle"></i> Jembatan & Jalan Layang</li>
                                <li><i class="fas fa-check-circle"></i> Terowongan</li>
                                <li><i class="fas fa-check-circle"></i> Jalur Bawah Tanah</li>
                            </ul>
                        </div>
                    </div>
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
                        <img src="images/portofolio_1.jpg" alt="Portofolio 1">
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
                        <img src="images/portofolio_2.jpg" alt="Portofolio 2">
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
                        <img src="images/portofolio_3.jpg" alt="Portofolio 3">
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
            <div class="berita-layout">
                <div class="featured-card">
                    <div class="featured-img-wrap">
                        <img src="images/berita_1(opus by).jpg" alt="Berita Utama">
                        <div class="featured-date-badge">20 Feb 26</div>
                    </div>
                    <div class="featured-card-body">
                        <span class="featured-title-link">Peran PT BAT dalam Mendukung Mega Proyek Opus Bay Batam</span>
                        <p class="featured-excerpt">PT Berkah Alam Tabantang bangga dipercaya berkontribusi dalam pembangunan infrastruktur Opus Bay, kawasan township mewah di Batam. Dengan tim profesional dan standar pengerjaan tinggi, kami memastikan kualitas terbaik di lapangan.</p>
                        <button class="btn-selengkapnya" onclick="openNewsModal(1)">Selengkapnya &rsaquo;</button>
                    </div>
                </div>
                <div class="news-list">
                    <div class="news-item" onclick="openNewsModal(2)">
                        <div class="news-item-img">
                            <img src="images/berita_2.jpg" alt="Berita 2">
                            <div class="news-item-date">3 Des 25</div>
                        </div>
                        <div class="news-item-body">
                            <div class="news-item-title">Mengapa Infrastruktur Jalan yang Baik Sangat Penting bagi Hunian Mewah?</div>
                            <div class="news-item-excerpt">Jalan yang mulus di kawasan elit bukan sekadar estetika, tapi aset investasi. Simak bagaimana standar teknis SI003 kami meningkatkan nilai properti hunian mewah.</div>
                            <button class="btn-baca">Baca &rsaquo;</button>
                        </div>
                    </div>
                    <div class="news-item" onclick="openNewsModal(3)">
                        <div class="news-item-img">
                            <img src="images/berita_3.jpg" alt="Berita 3">
                            <div class="news-item-date">24 Jun 25</div>
                        </div>
                        <div class="news-item-body">
                            <div class="news-item-title">Kontribusi Infrastruktur Terhadap Pertumbuhan Ekonomi di Kota Batam</div>
                            <div class="news-item-excerpt">Batam sedang bertransformasi menjadi Kota Mandiri. PT BAT siap bersaing secara global untuk memajukan wajah infrastruktur kota tercinta.</div>
                            <button class="btn-baca">Baca &rsaquo;</button>
                        </div>
                    </div>
                    <div class="news-item" onclick="openNewsModal(4)">
                        <div class="news-item-img">
                            <img src="images/berita_4.jpg" alt="Berita 4">
                            <div class="news-item-date">14 Mei 25</div>
                        </div>
                        <div class="news-item-body">
                            <div class="news-item-title">Mengapa Keamanan Adalah Prioritas Utama dalam Setiap Proyek Kami?</div>
                            <div class="news-item-excerpt">Keamanan adalah prioritas utama kami. Intip bagaimana protokol "Safety First" PT BAT diterapkan secara ketat di setiap area proyek komersial.</div>
                            <button class="btn-baca">Baca &rsaquo;</button>
                        </div>
                    </div>
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
                    <img src="images/lokasi_1.jpg" alt="Alamat Kantor">
                    <div class="lokasi-card-content">
                        <p><strong>Alamat :</strong> Perum Griya Batu Aji Asri THP. 6 Blok V2 No.6<br>Kel. Sei Langkai, Kec.Sagulung, Batam</p>
                    </div>
                </div>
                <div class="lokasi-card">
                    <img src="images/lokasi_2.jpg" alt="Kantor Operasional">
                    <div class="lokasi-card-content">
                        <p><strong>Kantor Operasional :</strong> Ruko Marbella 2 Blok D6 No.7<br>Batam Center – Batam</p>
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
                        <img src="images/logo_pt_bat2.jpg" alt="Logo">
                        <h3>PT. Berkah Alam Tabantang</h3>
                    </div>
                    <p>Solusi Terpercaya untuk Konstruksi & Infrastruktur di Batam</p>
                    <p>Email : <a href="mailto:berkahat@yahoo.com">berkahat@yahoo.com</a></p>
                    <p>Telp : 0813-6332-7109 / 0822-6877-7317</p>
                    <div class="footer-social">
                        <a href="https://wa.me/6281363327109" target="_blank"><i class="fab fa-whatsapp"></i></a>
                        <a href="https://instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="mailto:berkahat@yahoo.com"><i class="fas fa-envelope"></i></a>
                        <a href="https://facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://linkedin.com/" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="footer-links">
                    <div class="footer-col">
                        <h4>Kontak Kami</h4>
                        <p><i class="fas fa-envelope"></i> berkahat@yahoo.com</p>
                        <p><i class="fas fa-phone"></i> 0813-6332-7109</p>
                        <p><i class="fas fa-phone"></i> 0822-6877-7317</p>
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
            <p>Copyright © PT Berkah Alam Tabantang (BAT). All Rights Reserved.</p>
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
                <label>Username</label>
                <input type="text" id="username" placeholder="Masukkan username">
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

        // =============================================
        // FUNGSI SCROLL UTAMA — diperbaiki
        // Semua section menggunakan getBoundingClientRect
        // agar offset navbar 56px selalu akurat,
        // termasuk #portofolio, #berita, dan #lokasi
        // =============================================
        function scrollToSection(targetId) {
            const target = document.getElementById(targetId);
            if (!target) return;
            // scroll-margin-top: 56px di CSS sudah handle offset navbar secara otomatis
            target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }

        // Pasang event listener ke semua link navbar
        const navLinks = document.querySelectorAll('.nav-menu a[href^="#"]');
        navLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href').substring(1);
                scrollToSection(targetId);
            });
        });

        // Pasang juga ke link di footer
        document.querySelectorAll('.footer-col a[href^="#"]').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href').substring(1);
                scrollToSection(targetId);
            });
        });

        // =============================================
        // ACTIVE NAV — highlight menu sesuai posisi scroll
        // =============================================
        const sections = document.querySelectorAll('section[id]');

        function updateActiveNav() {
            let current = '';
            sections.forEach(section => {
                const sectionTop = section.getBoundingClientRect().top;
                // Section dianggap aktif jika sudah melewati navbar + sedikit buffer
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

        // =============================================
        // PORTFOLIO MODAL
        // =============================================
        const portfolioData = {
            1: {
                title: "Konstruksi Area Komersial & Fasilitas Publik – Opus Bay Project",
                photos: ["images/portofolio_1.jpg", "images/portofolio_1.jpg"],
                body: `<p><strong>Ringkasan Proyek:</strong> Pelaksanaan konstruksi bangunan gedung fungsional yang menjadi fasilitas pendukung bagi penghuni dan pengunjung kawasan.</p>
                <p><span class="spec-title">Spesifikasi Teknis (BG009):</span></p>
                <ul class="spec-list"><li>Pengerjaan struktur beton bertulang.</li><li>Instalasi mekanikal, elektrikal, dan plumbing (MEP) standar gedung komersial.</li><li>Finishing eksterior yang sesuai dengan desain arsitektur modern Opus Bay.</li></ul>
                <p><strong>Hasil Akhir:</strong> Fasilitas gedung yang kokoh secara struktur dan estetis secara visual.</p>`
            },
            2: {
                title: "Pengembangan Infrastruktur Terpadu – Opus Bay Waterfront",
                photos: ["images/portofolio_2.jpg", "images/portofolio_2.jpg"],
                body: `<p><strong>Ringkasan Proyek:</strong> Pembangunan sistem drainase makro dan mikro untuk memastikan kawasan bebas genangan.</p>
                <ul class="spec-list"><li>Pemasangan saluran U-Ditch beton pracetak.</li><li>Pembangunan kolam retensi air hujan.</li><li>Sistem pembuangan akhir ke arah laut dengan katup penahan pasang surut.</li></ul>`
            },
            3: {
                title: "Pembangunan Akses Jalan Utama & Konektivitas – Opus Bay Project",
                photos: ["images/portofolio_3.jpg", "images/portofolio_3.jpg"],
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

        // =============================================
        // BERITA MODAL
        // =============================================
        const newsData = {
            1: { date: "20 Februari 2026", title: "Peran PT BAT dalam Mendukung Mega Proyek Opus Bay Batam", image: "images/berita_1(opus by).jpg", content: "<p>Menjadi bagian dari proyek sebesar Opus Bay adalah bukti nyata kepercayaan industri terhadap PT Berkah Alam Tabantang. Dalam proyek ini, tim kami fokus pada pengembangan infrastruktur dasar yang presisi. Kami memahami bahwa proyek skala internasional membutuhkan koordinasi tim yang solid dan ketepatan teknis. Melalui pendekatan kolaboratif, PT BAT memastikan setiap tahapan konstruksi, mulai dari pematangan lahan hingga infrastruktur pendukung, dikerjakan sesuai spesifikasi dan deadline yang ketat demi mendukung kemajuan properti di Batam.</p>" },
            2: { date: "3 Desember 2025", title: "Mengapa Infrastruktur Jalan yang Baik Sangat Penting bagi Hunian Mewah?", image: "images/berita_2.jpg", content: "<p>Dalam pembangunan hunian mewah, akses jalan adalah impresi pertama bagi penghuni. Mengacu pada standar SNI 003, PT BAT menerapkan teknik pengaspalan dan fondasi jalan yang mampu menahan beban berat tanpa mengabaikan kerapian visual. Jalan yang dibangun dengan drainase yang tepat dan material berkualitas tinggi tidak hanya bertahan lama, tetapi juga secara signifikan meningkatkan nilai jual investasi properti tersebut. Kami memastikan bahwa setiap jengkal aspal yang kami hampar memberikan kenyamanan berkendara dan kemewahan yang nyata bagi penghuni.</p>" },
            3: { date: "24 Juni 2025", title: "Kontribusi Infrastruktur Terhadap Pertumbuhan Ekonomi di Kota Batam", image: "images/berita_3.jpg", content: "<p>Transformasi Batam menuju Kota Mandiri membuka peluang besar bagi industri konstruksi lokal. Sebagai perusahaan yang berbasis di Batam, PT Berkah Alam Tabantang tidak hanya ingin menjadi penonton, tetapi penggerak perubahan. Kami terus berinvestasi pada teknologi konstruksi terbaru untuk menyamai standar global. Dengan pemahaman mendalam tentang lanskap kota dan komitmen pada kualitas, PT BAT siap bermitra dalam pembangunan investasi strategis, membuktikan bahwa perusahaan lokal Batam mampu memberikan hasil kelas dunia.</p>" },
            4: { date: "14 Mei 2025", title: "Mengapa Keamanan Adalah Prioritas Utama dalam Setiap Proyek Kami?", image: "images/berita_4.jpg", content: "<p>Bagi PT Berkah Alam Tabantang, keselamatan kerja bukan sekadar aturan, melainkan budaya. Di proyek skala besar, risiko kecelakaan kerja selalu ada, itulah sebabnya kami menerapkan protokol APD lengkap, safety briefing harian, dan pengawasan ketat oleh ahli K3 di lapangan. Kami percaya bahwa lingkungan kerja yang aman akan melahirkan produktivitas maksimal dan hasil bangunan yang berkualitas. Integritas kami dipertahankan dalam setiap prosedur keamanan yang kami jalankan demi melindungi aset paling berharga perusahaan: tenaga kerja kami.</p>" }
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

        // =============================================
        // LOGIN MODAL
        // =============================================
        function openLoginModal() { document.getElementById('loginModal').style.display = 'flex'; document.body.style.overflow = 'hidden'; }
        function closeLoginModal() { document.getElementById('loginModal').style.display = 'none'; document.body.style.overflow = 'auto'; }
        function handleLogin() {
            const user = document.getElementById('username').value;
            const pass = document.getElementById('password').value;
            if (user === 'admin' && pass === 'admin123') { alert('Login berhasil!'); closeLoginModal(); }
            else alert('Username atau password salah!');
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
