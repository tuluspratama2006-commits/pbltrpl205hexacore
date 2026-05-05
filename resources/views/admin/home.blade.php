<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>PT. Berkah Alam Tabantang - Konstruksi & Infrastruktur Batam</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/stylesadmin.css') }}">
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
                <!-- Ikon Logout -->
                <a href="javascript:void(0)" onclick="handleLogout()" class="logout-btn" title="Logout">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
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
        <a onclick="openEditHome()" class="home-edit-btn">
            <i class="fas fa-pen"></i> Edit
        </a>
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
        <div class="about-edit-container">
            <a onclick="openEditTentang()" class="about-edit-btn">
                <i class="fas fa-pen"></i> Edit Tentang Kami
            </a>
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
                        <a onclick="openEditLayanan(1)" class="edit-btn-icon">
                            <i class="fas fa-pen"></i>
                            <span class="tooltip-text">Edit Layanan</span>
                        </a>
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
                            <div class="service-desc">Kami melayani jasa pelaksana untuk konstruksi jaringan saluran air, pelabuhan, dam, bendungan, serta prasarana sumber daya air lainnya.</div>
                            <ul class="service-features">
                                <li><i class="fas fa-check-circle"></i> Jaringan Saluran Air</li>
                                <li><i class="fas fa-check-circle"></i> Dam & Bendungan</li>
                                <li><i class="fas fa-check-circle"></i> Prasarana Sumber Daya Air</li>
                            </ul>
                        </div>
                        <a onclick="openEditLayanan(2)" class="edit-btn-icon">
                            <i class="fas fa-pen"></i>
                            <span class="tooltip-text">Edit Layanan</span>
                        </a>
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
                            <div class="service-desc">Layanan khusus pelaksanaan konstruksi jalan raya, jalan lokal, rel kereta api, hingga landas pacu bandara.</div>
                            <ul class="service-features">
                                <li><i class="fas fa-check-circle"></i> Jalan Raya & Lokal</li>
                                <li><i class="fas fa-check-circle"></i> Rel Kereta Api</li>
                                <li><i class="fas fa-check-circle"></i> Landas Pacu Bandara</li>
                            </ul>
                        </div>
                        <a onclick="openEditLayanan(3)" class="edit-btn-icon">
                            <i class="fas fa-pen"></i>
                            <span class="tooltip-text">Edit Layanan</span>
                        </a>
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
                            <div class="service-desc">Spesialisasi kami mencakup pengerjaan jembatan, jalan layang, terowongan, hingga jalur bawah tanah.</div>
                            <ul class="service-features">
                                <li><i class="fas fa-check-circle"></i> Jembatan & Jalan Layang</li>
                                <li><i class="fas fa-check-circle"></i> Terowongan</li>
                                <li><i class="fas fa-check-circle"></i> Jalur Bawah Tanah</li>
                            </ul>
                        </div>
                        <a onclick="openEditLayanan(4)" class="edit-btn-icon">
                            <i class="fas fa-pen"></i>
                            <span class="tooltip-text">Edit Layanan</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="layanan-footer">
            <button onclick="openTambahLayanan()" class="add-btn">
                <i class="fas fa-plus"></i> Tambah Layanan
            </button>
        </div>
    </section>

    <!-- PORTOFOLIO -->
    <section id="portofolio">
        <div class="inner-container">
            <div class="portfolio-header">
                <h1 class="section-title">PORTOFOLIO</h1>
                <div class="title-underline"></div>
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
                    <a onclick="openEditPorto(1)" class="porto-edit-btn">
                        <i class="fas fa-pen"></i>
                        <span class="tooltip-text">Edit Portofolio</span>
                    </a>
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
                    <a onclick="openEditPorto(2)" class="porto-edit-btn">
                        <i class="fas fa-pen"></i>
                        <span class="tooltip-text">Edit Portofolio</span>
                    </a>
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
                    <a onclick="openEditPorto(3)" class="porto-edit-btn">
                        <i class="fas fa-pen"></i>
                        <span class="tooltip-text">Edit Portofolio</span>
                    </a>
                </div>
            </div>
            <div class="portfolio-footer">
                <button onclick="openTambahPortofolio()" class="add-btn">
                    <i class="fas fa-plus"></i> Tambah Portofolio
                </button>
            </div>
        </div>
    </section>

    <!-- BERITA -->
    <section id="berita">
        <div class="inner-container">
            <div class="berita-header">
                <h1 class="section-title">BERITA</h1>
                <div class="title-underline"></div>
            </div>
            <div class="berita-layout">
                <div class="featured-card">
                    <div class="featured-img-wrap">
                        <img src="images/berita_1(opus by).jpg" alt="Berita Utama">
                        <div class="featured-date-badge">20 Februari 2026</div>
                        <a onclick="event.stopPropagation(); openEditBerita(1)" class="berita-edit-btn">
                            <i class="fas fa-pen"></i>
                            <span class="tooltip-text">Edit Berita Utama</span>
                        </a>
                    </div>
                    <div class="featured-card-body">
                        <span class="featured-title-link" onclick="openNewsModal(1)">Peran PT BAT dalam Mendukung Mega Proyek Opus Bay Batam</span>
                        <p class="featured-excerpt">PT Berkah Alam Tabantang bangga dipercaya berkontribusi dalam pembangunan infrastruktur Opus Bay, kawasan township mewah di Batam. Dengan tim profesional dan standar pengerjaan tinggi, kami memastikan kualitas terbaik di lapangan.</p>
                        <button class="btn-selengkapnya" onclick="openNewsModal(1)">Selengkapnya &rsaquo;</button>
                    </div>
                </div>
                <div class="news-list">
                    <div class="news-item" onclick="openNewsModal(2)">
                        <div class="news-item-img">
                            <img src="images/berita_2.jpg" alt="Berita 2">
                            <div class="news-item-date">3 Desember 2025</div>
                            <a onclick="event.stopPropagation(); openEditBerita(2)" class="berita-edit-btn small-edit">
                                <i class="fas fa-pen"></i>
                                <span class="tooltip-text">Edit Berita</span>
                            </a>
                        </div>
                        <div class="news-item-body">
                            <div class="news-item-title" onclick="openNewsModal(2)">Mengapa Infrastruktur Jalan yang Baik Sangat Penting bagi Hunian Mewah?</div>
                            <div class="news-item-excerpt">Jalan yang mulus di kawasan elit bukan sekadar estetika, tapi aset investasi. Simak bagaimana standar teknis SI003 kami meningkatkan nilai properti hunian mewah.</div>
                            <button class="btn-baca" onclick="openNewsModal(2)">Baca &rsaquo;</button>
                        </div>
                    </div>
                    <div class="news-item" onclick="openNewsModal(3)">
                        <div class="news-item-img">
                            <img src="images/berita_3.jpg" alt="Berita 3">
                            <div class="news-item-date">24 Juni 2025</div>
                            <a onclick="event.stopPropagation(); openEditBerita(3)" class="berita-edit-btn small-edit">
                                <i class="fas fa-pen"></i>
                                <span class="tooltip-text">Edit Berita</span>
                            </a>
                        </div>
                        <div class="news-item-body">
                            <div class="news-item-title" onclick="openNewsModal(3)">Kontribusi Infrastruktur Terhadap Pertumbuhan Ekonomi di Kota Batam</div>
                            <div class="news-item-excerpt">Batam sedang bertransformasi menjadi Kota Mandiri. PT BAT siap bersaing secara global untuk memajukan wajah infrastruktur kota tercinta.</div>
                            <button class="btn-baca" onclick="openNewsModal(3)">Baca &rsaquo;</button>
                        </div>
                    </div>
                    <div class="news-item" onclick="openNewsModal(4)">
                        <div class="news-item-img">
                            <img src="images/berita_4.jpg" alt="Berita 4">
                            <div class="news-item-date">14 Mei 2025</div>
                            <a onclick="event.stopPropagation(); openEditBerita(4)" class="berita-edit-btn small-edit">
                                <i class="fas fa-pen"></i>
                                <span class="tooltip-text">Edit Berita</span>
                            </a>
                        </div>
                        <div class="news-item-body">
                            <div class="news-item-title" onclick="openNewsModal(4)">Mengapa Keamanan Adalah Prioritas Utama dalam Setiap Proyek Kami?</div>
                            <div class="news-item-excerpt">Keamanan adalah prioritas utama kami. Intip bagaimana protokol "Safety First" PT BAT diterapkan secara ketat di setiap area proyek komersial.</div>
                            <button class="btn-baca" onclick="openNewsModal(4)">Baca &rsaquo;</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="berita-footer">
                <button onclick="openTambahBerita()" class="add-btn">
                    <i class="fas fa-plus"></i> Tambah Berita
                </button>
            </div>
        </div>
    </section>

    <!-- TESTIMONI -->
    <section id="testimoni" class="testimoni-section">
        <div class="testimoni-header">
            <h1 class="section-title">TESTIMONI</h1>
        </div>
        <p class="testimoni-subtitle">Bukti Nyata Kualitas Konstruksi Kami - Kolaborasi yang solid melahirkan infrastruktur yang kokoh. Inilah testimoni dari mereka yang telah bermitra dengan PT BAT.</p>
        <div class="inner-container">
            <div class="testimoni-grid">
                <div class="testimoni-card">
                    <div class="company-logo-circle"><span>S</span></div>
                    <div class="testimoni-rating">★★★★★</div>
                    <p class="testimoni-text">"Profesional dan tepat waktu. Koordinasi tim di lapangan sangat solid, sehingga proyek selesai sesuai jadwal tanpa mengurangi detail kualitas teknis."</p>
                    <p class="testimoni-author">— Site Supervisor</p>
                    <a onclick="openEditTestimoni(1)" class="testimoni-edit-btn">
                        <i class="fas fa-pen"></i>
                        <span class="tooltip-text">Edit Testimoni</span>
                    </a>
                </div>
                <div class="testimoni-card">
                    <div class="company-logo-circle"><span>P</span></div>
                    <div class="testimoni-rating">★★★★★</div>
                    <p class="testimoni-text">"Hasil pengerjaan infrastrukturnya sangat rapi dan kokoh. PT BAT benar-benar menjaga standar kualitas sesuai spesifikasi yang diminta. Sangat puas!"</p>
                    <p class="testimoni-author">— Project Manager, Kawasan Residensial</p>
                    <a onclick="openEditTestimoni(2)" class="testimoni-edit-btn">
                        <i class="fas fa-pen"></i>
                        <span class="tooltip-text">Edit Testimoni</span>
                    </a>
                </div>
                <div class="testimoni-card">
                    <div class="company-logo-circle"><span>K</span></div>
                    <div class="testimoni-rating">★★★★★</div>
                    <p class="testimoni-text">"Sangat disiplin dalam prosedur keselamatan kerja (K3). PT BAT membuktikan bahwa proyek skala besar bisa berjalan aman, bersih, dan tetap efisien."</p>
                    <p class="testimoni-author">— Konsultan Konstruksi</p>
                    <a onclick="openEditTestimoni(3)" class="testimoni-edit-btn">
                        <i class="fas fa-pen"></i>
                        <span class="tooltip-text">Edit Testimoni</span>
                    </a>
                </div>
            </div>
            <div class="testimoni-footer">
                <button class="add-btn" onclick="openTambahTestimoni()">
                    <i class="fas fa-plus"></i> Tambah Testimoni
                </button>
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

    <!-- ==========================================
         MODAL LOGIN
    =========================================== -->
    <div id="loginModal" class="modal">
        <div class="login-modal-box">
            <h2><i class="fas fa-user-circle" style="color:#4a7bc4;margin-right:10px;"></i>Login Admin</h2>
            <div class="edit-form-group">
                <label>Username</label>
                <input type="text" id="username" placeholder="Masukkan username">
            </div>
            <div class="edit-form-group">
                <label>Password</label>
                <input type="password" id="password" placeholder="Masukkan password">
            </div>
            <div class="edit-form-footer">
                <button class="btn-kembali" onclick="closeLoginModal()"><i class="fas fa-times"></i> Batal</button>
                <button class="btn-simpan" onclick="handleLogin()"><i class="fas fa-sign-in-alt"></i> Masuk</button>
            </div>
        </div>
    </div>

    <!-- ==========================================
         MODAL BERITA (VIEW)
    =========================================== -->
    <div id="newsModal" class="modal">
        <div class="news-modal-content">
            <span class="modal-close" onclick="closeNewsModal()">&times;</span>
            <div class="news-modal-hero">
                <img id="newsModalImg" src="" alt="Berita">
                <div class="news-modal-hero-overlay">
                    <h2 id="newsModalTitle"></h2>
                    <span class="news-modal-date" id="newsModalDate"></span>
                </div>
            </div>
            <div class="news-modal-body" id="newsModalBody"></div>
            <div class="news-modal-footer">
                <button class="btn-share" onclick="shareNews()"><i class="fas fa-share-alt"></i> Bagikan</button>
            </div>
        </div>
    </div>

    <!-- ==========================================
         MODAL PORTOFOLIO (VIEW)
    =========================================== -->
    <div id="portfolioModal" class="modal">
        <div class="portfolio-modal-content">
            <span class="modal-close" onclick="closePortfolioModal()">&times;</span>
            <div class="portfolio-modal-inner">
                <div class="portfolio-modal-photos" id="portfolioModalPhotos">
                    <div class="photo-main"><img id="portfolioMainPhoto" src="" alt="Foto Utama"></div>
                    <div class="photo-secondary"><img id="portfolioSecondPhoto" src="" alt="Foto Kedua"></div>
                </div>
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

    <!-- ==========================================
         EDIT FORM: HOME (BERANDA)
    =========================================== -->
    <div id="editHomeModal" class="edit-form-overlay">
        <div class="edit-form-container">
            <div class="edit-form-page-label"><span>BERANDA</span></div>
            <div class="edit-form-group">
                <label>Judul</label>
                <input type="text" id="editHomeJudul" placeholder="Judul halaman beranda">
            </div>
            <div class="edit-form-group">
                <label>Tagline</label>
                <input type="text" id="editHomeTagline" placeholder="Tagline perusahaan">
            </div>
            <div class="edit-form-group">
                <label>Deskripsi</label>
                <textarea id="editHomeDesc" rows="3" placeholder="Deskripsi singkat"></textarea>
            </div>
            <div class="edit-form-group">
                <label>Foto</label>
                <input type="file" id="editHomeFoto" accept="image/*">
            </div>
            <div class="edit-form-footer">
                <button class="btn-kembali" onclick="closeEditModal('editHomeModal')"><i class="fas fa-arrow-left"></i> Kembali</button>
                <button class="btn-simpan" onclick="simpanEdit('editHomeModal')"><i class="fas fa-check"></i> Simpan</button>
            </div>
        </div>
    </div>

    <!-- ==========================================
         EDIT FORM: TENTANG KAMI
    =========================================== -->
    <div id="editTentangModal" class="edit-form-overlay">
        <div class="edit-form-container">
            <div class="edit-form-page-label"><span>TENTANG KAMI</span></div>
            <div class="edit-form-group">
                <label>Nama Perusahaan</label>
                <input type="text" id="editTentangNama" placeholder="Nama perusahaan">
            </div>
            <div class="edit-form-group">
                <label>Deskripsi</label>
                <textarea id="editTentangDesc" rows="4" placeholder="Deskripsi tentang perusahaan"></textarea>
            </div>
            <div class="edit-form-group">
                <label>Nomor SBU</label>
                <input type="text" id="editTentangSbu" placeholder="Nomor SBU">
            </div>
            <div class="edit-form-group">
                <label>Foto (Upload Gambar)</label>
                <input type="file" id="editTentangFoto" accept="image/*" multiple>
            </div>
            <div class="edit-form-footer">
                <button class="btn-kembali" onclick="closeEditModal('editTentangModal')"><i class="fas fa-arrow-left"></i> Kembali</button>
                <button class="btn-simpan" onclick="simpanEdit('editTentangModal')"><i class="fas fa-check"></i> Simpan</button>
            </div>
        </div>
    </div>

    <!-- ==========================================
         EDIT FORM: LAYANAN
    =========================================== -->
    <div id="editLayananModal" class="edit-form-overlay">
        <div class="edit-form-container">
            <div class="edit-form-page-label"><span id="editLayananLabel">LAYANAN</span></div>
            <div class="edit-form-group">
                <label>Nama Layanan</label>
                <input type="text" id="editLayananNama" placeholder="Nama layanan">
            </div>
            <div class="edit-form-group">
                <label>Kode Layanan</label>
                <input type="text" id="editLayananKode" placeholder="Contoh: BG009">
            </div>
            <div class="edit-form-group">
                <label>Deskripsi</label>
                <textarea id="editLayananDesc" rows="3" placeholder="Deskripsi layanan"></textarea>
            </div>
            <div class="edit-form-group">
                <label>Fitur (pisahkan dengan koma)</label>
                <input type="text" id="editLayananFitur" placeholder="Fitur 1, Fitur 2, Fitur 3">
            </div>
            <div class="edit-form-group">
                <label>Foto</label>
                <input type="file" id="editLayananFoto" accept="image/*">
            </div>
            <div class="edit-form-footer">
                <button class="btn-kembali" onclick="closeEditModal('editLayananModal')"><i class="fas fa-arrow-left"></i> Kembali</button>
                <button class="btn-simpan" onclick="simpanEdit('editLayananModal')"><i class="fas fa-check"></i> Simpan</button>
            </div>
        </div>
    </div>

    <!-- ==========================================
         TAMBAH FORM: LAYANAN
    =========================================== -->
    <div id="tambahLayananModal" class="edit-form-overlay">
        <div class="edit-form-container">
            <div class="edit-form-page-label"><span>TAMBAH LAYANAN</span></div>
            <div class="edit-form-group">
                <label>Nama Layanan</label>
                <input type="text" placeholder="Nama layanan baru">
            </div>
            <div class="edit-form-group">
                <label>Kode Layanan</label>
                <input type="text" placeholder="Contoh: SI005">
            </div>
            <div class="edit-form-group">
                <label>Deskripsi</label>
                <textarea rows="3" placeholder="Deskripsi layanan baru"></textarea>
            </div>
            <div class="edit-form-group">
                <label>Fitur (pisahkan dengan koma)</label>
                <input type="text" placeholder="Fitur 1, Fitur 2, Fitur 3">
            </div>
            <div class="edit-form-group">
                <label>Foto</label>
                <input type="file" accept="image/*">
            </div>
            <div class="edit-form-footer">
                <button class="btn-kembali" onclick="closeEditModal('tambahLayananModal')"><i class="fas fa-arrow-left"></i> Kembali</button>
                <button class="btn-simpan" onclick="simpanEdit('tambahLayananModal')"><i class="fas fa-check"></i> Simpan</button>
            </div>
        </div>
    </div>

    <!-- ==========================================
         EDIT FORM: PORTOFOLIO
    =========================================== -->
    <div id="editPortoModal" class="edit-form-overlay">
        <div class="edit-form-container">
            <div class="edit-form-page-label"><span id="editPortoLabel">PORTOFOLIO</span></div>
            <div class="edit-form-group">
                <label>Judul Proyek</label>
                <input type="text" id="editPortoJudul" placeholder="Judul proyek">
            </div>
            <div class="edit-form-group">
                <label>Ringkasan Proyek</label>
                <textarea id="editPortoRingkasan" rows="3" placeholder="Ringkasan singkat proyek"></textarea>
            </div>
            <div class="edit-form-group">
                <label>Spesifikasi Teknis</label>
                <textarea id="editPortoSpek" rows="3" placeholder="Detail spesifikasi teknis"></textarea>
            </div>
            <div class="edit-form-group">
                <label>Foto Utama</label>
                <input type="file" accept="image/*">
            </div>
            <div class="edit-form-group">
                <label>Foto Pendukung</label>
                <input type="file" accept="image/*">
            </div>
            <div class="edit-form-footer">
                <button class="btn-kembali" onclick="closeEditModal('editPortoModal')"><i class="fas fa-arrow-left"></i> Kembali</button>
                <button class="btn-simpan" onclick="simpanEdit('editPortoModal')"><i class="fas fa-check"></i> Simpan</button>
            </div>
        </div>
    </div>

    <!-- ==========================================
         TAMBAH FORM: PORTOFOLIO
    =========================================== -->
    <div id="tambahPortoModal" class="edit-form-overlay">
        <div class="edit-form-container">
            <div class="edit-form-page-label"><span>TAMBAH PORTOFOLIO</span></div>
            <div class="edit-form-group">
                <label>Judul Proyek</label>
                <input type="text" placeholder="Judul proyek baru">
            </div>
            <div class="edit-form-group">
                <label>Ringkasan Proyek</label>
                <textarea rows="3" placeholder="Ringkasan singkat proyek"></textarea>
            </div>
            <div class="edit-form-group">
                <label>Spesifikasi Teknis</label>
                <textarea rows="3" placeholder="Detail spesifikasi teknis"></textarea>
            </div>
            <div class="edit-form-group">
                <label>Foto Utama</label>
                <input type="file" accept="image/*">
            </div>
            <div class="edit-form-group">
                <label>Foto Pendukung</label>
                <input type="file" accept="image/*">
            </div>
            <div class="edit-form-footer">
                <button class="btn-kembali" onclick="closeEditModal('tambahPortoModal')"><i class="fas fa-arrow-left"></i> Kembali</button>
                <button class="btn-simpan" onclick="simpanEdit('tambahPortoModal')"><i class="fas fa-check"></i> Simpan</button>
            </div>
        </div>
    </div>

    <!-- ==========================================
         EDIT FORM: BERITA
    =========================================== -->
    <div id="editBeritaModal" class="edit-form-overlay">
        <div class="edit-form-container">
            <div class="edit-form-page-label"><span id="editBeritaLabel">BERITA</span></div>
            <div class="edit-form-group">
                <label>Judul Berita</label>
                <input type="text" id="editBeritaJudul" placeholder="Judul berita">
            </div>
            <div class="edit-form-group">
                <label>Tanggal Publikasi</label>
                <input type="date" id="editBeritaTanggal">
            </div>
            <div class="edit-form-group">
                <label>Ringkasan / Excerpt</label>
                <textarea id="editBeritaExcerpt" rows="2" placeholder="Ringkasan singkat berita"></textarea>
            </div>
            <div class="edit-form-group">
                <label>Isi Berita</label>
                <textarea id="editBeritaIsi" rows="4" placeholder="Isi lengkap berita"></textarea>
            </div>
            <div class="edit-form-group">
                <label>Foto</label>
                <input type="file" id="editBeritaFoto" accept="image/*">
            </div>
            <div class="edit-form-footer">
                <button class="btn-kembali" onclick="closeEditModal('editBeritaModal')"><i class="fas fa-arrow-left"></i> Kembali</button>
                <button class="btn-simpan" onclick="simpanEdit('editBeritaModal')"><i class="fas fa-check"></i> Simpan</button>
            </div>
        </div>
    </div>

    <!-- ==========================================
         TAMBAH FORM: BERITA
    =========================================== -->
    <div id="tambahBeritaModal" class="edit-form-overlay">
        <div class="edit-form-container">
            <div class="edit-form-page-label"><span>TAMBAH BERITA</span></div>
            <div class="edit-form-group">
                <label>Judul Berita</label>
                <input type="text" placeholder="Judul berita baru">
            </div>
            <div class="edit-form-group">
                <label>Tanggal Publikasi</label>
                <input type="date">
            </div>
            <div class="edit-form-group">
                <label>Ringkasan / Excerpt</label>
                <textarea rows="2" placeholder="Ringkasan singkat berita"></textarea>
            </div>
            <div class="edit-form-group">
                <label>Isi Berita</label>
                <textarea rows="4" placeholder="Isi lengkap berita"></textarea>
            </div>
            <div class="edit-form-group">
                <label>Foto</label>
                <input type="file" accept="image/*">
            </div>
            <div class="edit-form-footer">
                <button class="btn-kembali" onclick="closeEditModal('tambahBeritaModal')"><i class="fas fa-arrow-left"></i> Kembali</button>
                <button class="btn-simpan" onclick="simpanEdit('tambahBeritaModal')"><i class="fas fa-check"></i> Simpan</button>
            </div>
        </div>
    </div>

    <!-- ==========================================
         EDIT FORM: TESTIMONI
    =========================================== -->
    <div id="editTestimoniModal" class="edit-form-overlay">
        <div class="edit-form-container">
            <div class="edit-form-page-label"><span id="editTestimoniLabel">TESTIMONI</span></div>
            <div class="edit-form-group">
                <label>Nama / Jabatan</label>
                <input type="text" id="editTestimoniNama" placeholder="Contoh: Project Manager, Kawasan Residensial">
            </div>
            <div class="edit-form-group">
                <label>Isi Testimoni</label>
                <textarea id="editTestimoniIsi" rows="4" placeholder="Isi testimoni dari klien"></textarea>
            </div>
            <div class="edit-form-group">
                <label>Rating (1-5)</label>
                <select id="editTestimoniRating">
                    <option value="5">★★★★★ (5)</option>
                    <option value="4">★★★★☆ (4)</option>
                    <option value="3">★★★☆☆ (3)</option>
                    <option value="2">★★☆☆☆ (2)</option>
                    <option value="1">★☆☆☆☆ (1)</option>
                </select>
            </div>
            <div class="edit-form-group">
                <label>Logo Perusahaan</label>
                <input type="file" id="editTestimoniFoto" accept="image/*">
            </div>
            <div class="edit-form-footer">
                <button class="btn-kembali" onclick="closeEditModal('editTestimoniModal')"><i class="fas fa-arrow-left"></i> Kembali</button>
                <button class="btn-simpan" onclick="simpanEdit('editTestimoniModal')"><i class="fas fa-check"></i> Simpan</button>
            </div>
        </div>
    </div>

    <!-- ==========================================
         TAMBAH FORM: TESTIMONI
    =========================================== -->
    <div id="tambahTestimoniModal" class="edit-form-overlay">
        <div class="edit-form-container">
            <div class="edit-form-page-label"><span>TAMBAH TESTIMONI</span></div>
            <div class="edit-form-group">
                <label>Nama / Jabatan</label>
                <input type="text" placeholder="Contoh: Direktur, PT XYZ">
            </div>
            <div class="edit-form-group">
                <label>Isi Testimoni</label>
                <textarea rows="4" placeholder="Isi testimoni dari klien"></textarea>
            </div>
            <div class="edit-form-group">
                <label>Rating (1-5)</label>
                <select>
                    <option value="5">★★★★★ (5)</option>
                    <option value="4">★★★★☆ (4)</option>
                    <option value="3">★★★☆☆ (3)</option>
                    <option value="2">★★☆☆☆ (2)</option>
                    <option value="1">★☆☆☆☆ (1)</option>
                </select>
            </div>
            <div class="edit-form-group">
                <label>Logo Perusahaan</label>
                <input type="file" accept="image/*">
            </div>
            <div class="edit-form-footer">
                <button class="btn-kembali" onclick="closeEditModal('tambahTestimoniModal')"><i class="fas fa-arrow-left"></i> Kembali</button>
                <button class="btn-simpan" onclick="simpanEdit('tambahTestimoniModal')"><i class="fas fa-check"></i> Simpan</button>
            </div>
        </div>
    </div>

    <script>
        /* ==========================================
           DATA BERITA
        =========================================== */
        const newsData = {
            1: {
                date: "20 Februari 2026",
                title: "Peran PT BAT dalam Mendukung Mega Proyek Opus Bay Batam",
                image: "images/berita_1(opus by).jpg",
                content: `<p>Menjadi bagian dari proyek sebesar Opus Bay adalah bukti nyata kepercayaan industri terhadap PT Berkah Alam Tabantang. Dalam proyek ini, tim kami fokus pada pengembangan infrastruktur dasar yang presisi.</p>
                <p>Kami memahami bahwa proyek skala internasional membutuhkan koordinasi tim yang solid dan ketepatan teknis. Melalui pendekatan kolaboratif, PT BAT memastikan setiap tahapan konstruksi, mulai dari pematangan lahan hingga infrastruktur pendukung, dikerjakan sesuai spesifikasi dan deadline yang ketat.</p>
                <p><strong>Dampak Positif untuk Batam</strong><br>Dengan selesainya proyek ini, kawasan Opus Bay diharapkan menjadi pusat pertumbuhan ekonomi baru di Batam, menciptakan lapangan kerja dan meningkatkan nilai investasi di kota tersebut.</p>`
            },
            2: {
                date: "3 Desember 2025",
                title: "Mengapa Infrastruktur Jalan yang Baik Sangat Penting bagi Hunian Mewah?",
                image: "images/berita_2.jpg",
                content: `<p>Dalam pembangunan hunian mewah, akses jalan adalah impresi pertama bagi penghuni. Mengacu pada standar teknis SI003, PT BAT menerapkan teknik pengaspalan dan fondasi jalan yang mampu menahan beban berat tanpa mengabaikan kerapian visual.</p>
                <p>Jalan yang dibangun dengan drainase yang tepat dan material berkualitas tinggi tidak hanya bertahan lama, tetapi juga secara signifikan meningkatkan nilai jual investasi properti tersebut.</p>
                <p><strong>Standar Keselamatan Tinggi</strong><br>Kami memastikan bahwa setiap jengkal aspal yang kami hampar memberikan kenyamanan berkendara dan kemewahan yang nyata bagi penghuni, dengan dilengkapi marka jalan reflektif dan penerangan yang memadai.</p>`
            },
            3: {
                date: "24 Juni 2025",
                title: "Kontribusi Infrastruktur Terhadap Pertumbuhan Ekonomi di Kota Batam",
                image: "images/berita_3.jpg",
                content: `<p>Transformasi Batam menuju Kota Mandiri membuka peluang besar bagi industri konstruksi lokal. Sebagai perusahaan yang berbasis di Batam, PT Berkah Alam Tabantang tidak hanya ingin menjadi penonton, tetapi penggerak perubahan.</p>
                <p>Kami terus berinvestasi pada teknologi konstruksi terbaru untuk menyamai standar global. Dengan pemahaman mendalam tentang lanskap kota dan komitmen pada kualitas, PT BAT siap bermitra dalam pembangunan investasi strategis.</p>
                <p><strong>Membangun Masa Depan Batam</strong><br>Kami percaya bahwa infrastruktur yang baik adalah fondasi utama pertumbuhan ekonomi. PT BAT berkomitmen untuk terus berkontribusi dalam pembangunan Batam yang lebih maju dan berkelanjutan.</p>`
            },
            4: {
                date: "14 Mei 2025",
                title: "Mengapa Keamanan Adalah Prioritas Utama dalam Setiap Proyek Kami?",
                image: "images/berita_4.jpg",
                content: `<p>Bagi PT Berkah Alam Tabantang, keselamatan kerja bukan sekadar aturan, melainkan budaya. Di proyek skala besar, risiko kecelakaan kerja selalu ada, itulah sebabnya kami menerapkan protokol APD lengkap, safety briefing harian, dan pengawasan ketat oleh ahli K3 di lapangan.</p>
                <p>Kami percaya bahwa lingkungan kerja yang aman akan melahirkan produktivitas maksimal dan hasil bangunan yang berkualitas.</p>
                <p><strong>Target Zero Accident</strong><br>Integritas kami dipertahankan dalam setiap prosedur keamanan yang kami jalankan demi melindungi aset paling berharga perusahaan: tenaga kerja kami.</p>`
            }
        };

        /* ==========================================
           PORTFOLIO DATA
        =========================================== */
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

        /* ==========================================
           MODAL HELPERS
        =========================================== */
        function openModal(id) {
            document.getElementById(id).classList.add('active');
            document.body.style.overflow = 'hidden';
        }
        function closeEditModal(id) {
            document.getElementById(id).classList.remove('active');
            document.body.style.overflow = 'auto';
        }
        function simpanEdit(modalId) {
            alert('Data berhasil disimpan!');
            closeEditModal(modalId);
        }

        /* ==========================================
           EDIT FUNCTIONS
        =========================================== */
        function openEditHome() { openModal('editHomeModal'); }
        function openEditTentang() { openModal('editTentangModal'); }

        function openEditLayanan(id) {
            document.getElementById('editLayananLabel').textContent = 'EDIT LAYANAN #' + id;
            openModal('editLayananModal');
        }
        function openTambahLayanan() { openModal('tambahLayananModal'); }

        function openEditPorto(id) {
            document.getElementById('editPortoLabel').textContent = 'EDIT PORTOFOLIO #' + id;
            openModal('editPortoModal');
        }
        function openTambahPortofolio() { openModal('tambahPortoModal'); }

        function openEditBerita(id) {
            document.getElementById('editBeritaLabel').textContent = 'EDIT BERITA #' + id;
            openModal('editBeritaModal');
        }
        function openTambahBerita() { openModal('tambahBeritaModal'); }

        function openEditTestimoni(id) {
            document.getElementById('editTestimoniLabel').textContent = 'EDIT TESTIMONI #' + id;
            openModal('editTestimoniModal');
        }
        function openTambahTestimoni() { openModal('tambahTestimoniModal'); }

        /* ==========================================
           BERITA MODAL
        =========================================== */
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
        function shareNews() { alert('Berita siap dibagikan!'); }

        /* ==========================================
           PORTFOLIO MODAL
        =========================================== */
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

        /* ==========================================
           LOGIN & LOGOUT
        =========================================== */
        function openLoginModal() {
            document.getElementById('loginModal').style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }
        function closeLoginModal() {
            document.getElementById('loginModal').style.display = 'none';
            document.body.style.overflow = 'auto';
        }
        function handleLogin() {
            const user = document.getElementById('username').value;
            const pass = document.getElementById('password').value;
            if (user === 'admin' && pass === 'admin123') {
                alert('Login berhasil!');
                closeLoginModal();
            } else {
                alert('Username atau password salah!');
            }
        }
        function handleLogout() {
            if (confirm('Apakah Anda yakin ingin logout?')) {
                alert('Anda telah logout.');
            }
        }

        /* ==========================================
           CLOSE MODAL CLICK OUTSIDE
        =========================================== */
        window.addEventListener('click', function(event) {
            // Close edit form overlays
            const overlays = document.querySelectorAll('.edit-form-overlay');
            overlays.forEach(overlay => {
                if (event.target === overlay) {
                    overlay.classList.remove('active');
                    document.body.style.overflow = 'auto';
                }
            });
            // Close news modal
            const newsModal = document.getElementById('newsModal');
            if (event.target === newsModal) closeNewsModal();
            // Close portfolio modal
            const portModal = document.getElementById('portfolioModal');
            if (event.target === portModal) closePortfolioModal();
            // Close login modal
            const loginModal = document.getElementById('loginModal');
            if (event.target === loginModal) closeLoginModal();
        });

        /* ==========================================
           ACTIVE NAV ON SCROLL
        =========================================== */
        const sections = document.querySelectorAll('section[id]');
        const navLinks = document.querySelectorAll('.nav-menu a');
        window.addEventListener('scroll', () => {
            let current = '';
            sections.forEach(section => {
                if (window.scrollY >= section.offsetTop - 80) {
                    current = section.getAttribute('id');
                }
            });
            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === '#' + current) {
                    link.classList.add('active');
                }
            });
        });
    </script>
</body>
</html>
