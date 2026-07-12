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
                <button class="hamburger" onclick="toggleMenu()" aria-label="Menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </nav>

    @php
        $heroImageUrl = asset('images/aspal.jpg');
        if ($profil && !empty($profil->hero_image)) {
            $heroImageUrl = asset('storage/' . $profil->hero_image);
        } elseif ($profil && !empty($profil->dashboard_hero_image)) {
            $heroImageUrl = asset('storage/' . $profil->dashboard_hero_image);
        }
    @endphp

    <!-- HERO -->
    <section id="home">
        <img src="{{ $heroImageUrl }}" class="hero-img" alt="Hero BAT" onerror="this.src='{{ asset('images/aspal.jpg') }}'">
        <div class="overlay"></div>
        <div class="hero-content">
            <h1>{{ $profil->nama_perusahaan ?? 'PT. Berkah Alam Tabantang' }}</h1>
            <div class="tagline">{{ $profil->tagline ?? 'Solusi Terpercaya untuk Konstruksi & Infrastruktur di Batam' }}</div>
            <div class="description">{{ $profil->deskripsi ?? 'Kami melayani pembangunan gedung, jalan raya, jembatan, hingga prasarana sumber daya air dengan mengutamakan integritas dan kepuasan pelanggan. Membangun dengan kualitas, beroperasi dengan keamanan.' }}</div>
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
                    <img class="about-logo-bg"
                         src="{{ $profil && $profil->tentang_hero_image ? asset('storage/' . $profil->tentang_hero_image) : asset('images/logo_pt_bat2.jpg') }}"
                         alt="watermark">
                    <div class="about-left-inner">
                        <h2>{{ $profil->nama_perusahaan ?? 'PT Berkah Alam Tabantang' }}</h2>
                        <p>{{ $profil->deskripsi ?? 'adalah perusahaan konstruksi terkemuka yang berbasis di Kota Batam.' }}</p>

                        @if($profil && ($profil->visi || $profil->misi))
                        <div class="visi-misi-block">
                            @if($profil->visi)
                            <div class="visi-misi-item">
                                <div class="visi-misi-label">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <circle cx="12" cy="12" r="10"/>
                                        <line x1="12" y1="8" x2="12" y2="12"/>
                                        <line x1="12" y1="16" x2="12.01" y2="16"/>
                                    </svg>
                                    Visi
                                </div>
                                <p>{{ $profil->visi }}</p>
                            </div>
                            @endif
                            @if($profil->misi)
                            <div class="visi-misi-item">
                                <div class="visi-misi-label">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <polyline points="9 11 12 14 22 4"/>
                                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/>
                                    </svg>
                                    Misi
                                </div>
                                <ul class="misi-list">
                                    @foreach(explode("\n", $profil->misi) as $item)
                                        @if(trim($item))
                                            <li>{{ trim($item) }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                        @endif

                        @if($profil && $profil->nomor_sertifikasi)
                        <div class="sbu-label">Sertifikat Badan Usaha (SBU) Konstruksi</div>
                        <div class="sbu-number">{{ $profil->nomor_sertifikasi }}</div>
                        @else
                        <div class="sbu-label">Sertifikat Badan Usaha (SBU) Konstruksi</div>
                        <div class="sbu-number">PB-UMKU : 022100092289300040001</div>
                        @endif
                        @if($profil && $profil->dokumen_pdf)
    <a href="{{ asset('storage/' . $profil->dokumen_pdf) }}"
       class="btn-unduh"
       target="_blank"
       download>
        <i class="fas fa-chevron-right"></i> Unduh PDF
    </a>
@else
    <button class="btn-unduh" type="button" disabled
            style="opacity:.6; cursor:not-allowed;">
        <i class="fas fa-chevron-right"></i> PDF Belum Tersedia
    </button>
@endif
                    </div>
                </div>
                <div class="about-right">
                    @php $fotoGrid = json_decode($profil->foto_grid ?? '[]', true); @endphp
                    <div class="photos-grid">
                        @for($i = 0; $i < 5; $i++)
                        <div class="photo-item">
                            @if(!empty($fotoGrid[$i]))
                                <img src="{{ asset('storage/' . $fotoGrid[$i]) }}" alt="Foto {{ $i+1 }}">
                            @else
                                <img src="{{ asset('images/tentang_kami_' . ($i+1) . '.jpg') }}" alt="Foto {{ $i+1 }}">
                            @endif
                        </div>
                        @endfor
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
            <div class="scroll-arrow-wrap">
                <button class="scroll-arrow scroll-arrow-left" onclick="scrollHorizontally(this, -1)" aria-label="Scroll left">&#8249;</button>
                <div class="services-scroll-wrapper scrollable-content">
                    <div class="services-track">
                        @forelse($layanans as $index => $item)
                        <div class="service-card">
                            @if($item->gambar)
                                <img src="{{ asset('storage/' . $item->gambar) }}"
                                     class="service-card-img"
                                     alt="{{ $item->judul_layanan }}">
                            @else
                                <img src="{{ asset('images/layanan_' . (($index % 4) + 1) . '.jpg') }}"
                                     class="service-card-img"
                                     alt="{{ $item->judul_layanan }}">
                            @endif
                            <div class="service-card-top">
                                <div class="service-title">{{ $item->judul_layanan }}</div>
                                <div class="service-code">({{ $item->icon }})</div>
                            </div>
                            <div class="service-card-body">
                                <div class="service-title" style="margin-bottom:6px;">{{ $item->judul_layanan }}</div>
                                <div class="service-code" style="margin-bottom:12px;">({{ $item->icon }})</div>
                                <div class="service-desc">{{ strip_tags($item->deskripsi) }}</div>
                            </div>
                        </div>
                        @empty
                        <div class="service-card">
                            <img src="{{ asset('images/layanan_1.jpg') }}" class="service-card-img" alt="Layanan">
                            <div class="service-card-top">
                                <div class="service-title">Belum ada layanan</div>
                            </div>
                        </div>
                        @endforelse
                    </div>
                </div>
                <button class="scroll-arrow scroll-arrow-right" onclick="scrollHorizontally(this, 1)" aria-label="Scroll right">&#8250;</button>
            </div>
        </div>
    </section>

    <!-- PORTOFOLIO -->
    <section id="portofolio">
        <div class="inner-container">
            <div class="portfolio-header">
                <h1 class="section-title">PORTOFOLIO</h1>
            </div>
            <div class="scroll-arrow-wrap">
                <button class="scroll-arrow scroll-arrow-left" onclick="scrollHorizontally(this, -1)" aria-label="Scroll left">&#8249;</button>
                <div class="portfolio-grid scrollable-content">
                    @foreach($semuaPortofolio as $item)
                        @if($item->status == 'publish')
                            <div class="portfolio-card">
                                <div class="portfolio-image">
                                    <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="{{ $item->judul_proyek }}">
                                    <div class="portfolio-img-overlay">
                                        <h3 class="portfolio-title">{{ $item->judul_proyek }}</h3>
                                    </div>
                                </div>
                                <div class="portfolio-bottom">
                                    <button class="portfolio-btn" onclick="openPortfolioModal({{ $item->id_portofolio }})">Selengkapnya &rsaquo;</button>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <button class="scroll-arrow scroll-arrow-right" onclick="scrollHorizontally(this, 1)" aria-label="Scroll right">&#8250;</button>
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
            <div class="scroll-arrow-wrap">
                <button class="scroll-arrow scroll-arrow-left" onclick="scrollHorizontally(this, -1)" aria-label="Scroll left">&#8249;</button>
                <div class="testimoni-grid scrollable-content">
                    @forelse($testimonis as $tm)
                    <div class="testimoni-card">
                        <div class="company-logo-circle">
                            @if($tm->foto_client)
                                <img src="{{ asset('storage/' . $tm->foto_client) }}" style="width:100%;height:100%;border-radius:50%;object-fit:cover;">
                            @else
                                <span>{{ strtoupper(substr($tm->nama_client, 0, 1)) }}{{ $tm->nama_perusahaan ? strtoupper(substr($tm->nama_perusahaan, 0, 1)) : '' }}</span>
                            @endif
                        </div>
                        <div class="testimoni-rating">{{ str_repeat('★', $tm->rating) }}{{ str_repeat('☆', 5 - $tm->rating) }}</div>
                        <div class="testimoni-text">{!! $tm->isi_testimoni !!}</div>
                        <p class="testimoni-author">— {{ $tm->nama_client }}{{ $tm->jabatan ? ', ' . $tm->jabatan : '' }}</p>
                    </div>
                    @empty
                    <p style="grid-column:1/-1;text-align:center;color:#94a3b8;">Belum ada testimoni</p>
                    @endforelse
                </div>
                <button class="scroll-arrow scroll-arrow-right" onclick="scrollHorizontally(this, 1)" aria-label="Scroll right">&#8250;</button>
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
                        <a href="https://www.google.com/maps/dir/?api=1&destination={{ urlencode($profil->alamat ?? 'Perum Griya Batu Aji Asri THP. 6 Blok V2 No.6 Sei Langkai Sagulung Batam') }}"
                           target="_blank" class="btn-rute">
                            <i class="fas fa-route"></i> Dapatkan Rute
                        </a>
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
                        <a href="https://www.google.com/maps/dir/?api=1&destination={{ urlencode($profil->alamat_2 ?? 'Ruko Marbella 2 Blok D6 No.7 Batam Center Batam') }}"
                           target="_blank" class="btn-rute">
                            <i class="fas fa-route"></i> Dapatkan Rute
                        </a>
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
                <a href="#" id="portfolioModalPdf" class="btn-unduh-pdf" download>
                    <i class="fas fa-file-pdf"></i> Unduh PDF</a>
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

    <!-- WHATSAPP CHAT BUTTON -->
    <div class="whatsapp-button">
        <a href="https://api.whatsapp.com/send?phone=6281363327109&text=Halo%20PT.%20Berkah%20Alam%20Tabantang%2C%20saya%20ingin%20bertanya%20mengenai%20layanan%20konstruksi%20Anda."
           class="wa-link"
           target="_blank"
           rel="noopener noreferrer"
           onclick="handleWhatsAppClick(event)">
            <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp Chat">
            <span class="badge-wa">1</span>
        </a>
        <span class="wa-tooltip">Chat via WhatsApp</span>
    </div>

    <script>
        const NAVBAR_HEIGHT = 56;

        // HAMBURGER TOGGLE
        function toggleMenu() {
            const menu = document.querySelector('.nav-menu');
            const hamburger = document.querySelector('.hamburger');
            menu.classList.toggle('active');
            hamburger.classList.toggle('active');
        }

        function scrollToSection(targetId) {
            const target = document.getElementById(targetId);
            if (!target) return;
            const menu = document.querySelector('.nav-menu');
            const hamburger = document.querySelector('.hamburger');
            menu.classList.remove('active');
            hamburger.classList.remove('active');
            target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }

        const navLinks = document.querySelectorAll('.nav-menu a[href^="#"]');
        navLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                scrollToSection(this.getAttribute('href').substring(1));
            });
        });

        document.querySelectorAll('.footer-col a[href^="#"]').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                scrollToSection(this.getAttribute('href').substring(1));
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
            @foreach($semuaPortofolio as $item)
            {{ $item->id_portofolio }}: {
                title:      "{{ addslashes($item->judul_proyek) }}",
                client:     "{{ addslashes($item->nama_klien) }}",
                location:   "{{ addslashes($item->lokasi) }}",
                date:       "{{ \Carbon\Carbon::parse($item->tanggal_proyek)->isoFormat('D MMMM YYYY') }}",
                image:      "{{ asset('storage/' . $item->thumbnail) }}",
                pdfFile:    "{{ $item->file_pdf ? asset('storage/' . $item->file_pdf) : '' }}",
                description: {!! json_encode($item->deskripsi) !!}
            },
            @endforeach
        };

        function openPortfolioModal(id) {
            const item = portfolioData[id];
            if (!item) return;

            document.getElementById('portfolioModalTitle').innerHTML = item.title;

            let bodyContent = `
                <div class="project-info-meta" style="margin-bottom: 15px; font-size: 0.9em; color: #666; line-height: 1.6;">
                    <p style="margin: 4px 0;"><i class="fas fa-user"></i> <strong>Klien:</strong> ${item.client || '-'}</p>
                    <p style="margin: 4px 0;"><i class="fas fa-map-marker-alt"></i> <strong>Lokasi:</strong> ${item.location || '-'}</p>
                    <p style="margin: 4px 0;"><i class="fas fa-calendar-alt"></i> <strong>Tanggal:</strong> ${item.date}</p>
                </div>
                <hr style="border: 0; border-top: 1px solid #eee; margin-bottom: 15px;">
                <div class="project-description">
                    ${item.description}
                </div>
            `;
            document.getElementById('portfolioModalBody').innerHTML = bodyContent;

            document.getElementById('portfolioModalPhotos').innerHTML = `
                <div class="photo-main" style="width: 100%; height: 100%;">
                    <img src="${item.image}" alt="${item.title}" style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px;">
                </div>
            `;

            const pdfButton = document.getElementById('portfolioModalPdf');
            if (pdfButton) {
                if (item.pdfFile) {
                    pdfButton.href = item.pdfFile;
                    pdfButton.style.display = 'inline-block';
                } else {
                    pdfButton.style.display = 'none';
                }
            }

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

        // WHATSAPP
        function handleWhatsAppClick(event) {
            console.log('WhatsApp button clicked: ' + new Date().toLocaleString());
        }

        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                const tooltip = document.querySelector('.wa-tooltip');
                if (tooltip) {
                    tooltip.style.opacity = '1';
                    tooltip.style.transform = 'translateY(0)';
                    setTimeout(function() {
                        tooltip.style.opacity = '0';
                        tooltip.style.transform = 'translateY(10px)';
                    }, 4000);
                }
            }, 2000);
        });

        let lastScrollTop = 0;
        window.addEventListener('scroll', function() {
            const waButton = document.querySelector('.whatsapp-button');
            if (!waButton) return;
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            if (scrollTop > lastScrollTop && scrollTop > 200) {
                waButton.style.opacity = '0.3';
                waButton.style.transform = 'scale(0.9)';
            } else {
                waButton.style.opacity = '1';
                waButton.style.transform = 'scale(1)';
            }
            lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
        });

        window.onclick = function(event) {
            if (event.target == document.getElementById('portfolioModal')) closePortfolioModal();
            if (event.target == document.getElementById('newsModal')) closeNewsModal();
        }

        // SCROLL ARROW BUTTONS
        function scrollHorizontally(btn, direction) {
            const wrap = btn.closest('.scroll-arrow-wrap');
            const container = wrap.querySelector('.scrollable-content');
            const firstCard = container.querySelector('.service-card, .portfolio-card, .testimoni-card');
            const cardWidth = firstCard ? firstCard.offsetWidth : 300;
            const gap = 24;
            container.scrollBy({ left: direction * (cardWidth + gap), behavior: 'smooth' });
        }

        function updateScrollArrows() {
            document.querySelectorAll('.scroll-arrow-wrap').forEach(function(wrap) {
                const container = wrap.querySelector('.scrollable-content');
                const leftBtn = wrap.querySelector('.scroll-arrow-left');
                const rightBtn = wrap.querySelector('.scroll-arrow-right');
                if (!container || !leftBtn || !rightBtn) return;
                const atStart = container.scrollLeft <= 2;
                const atEnd = container.scrollLeft + container.clientWidth >= container.scrollWidth - 2;
                leftBtn.classList.toggle('disabled', atStart);
                rightBtn.classList.toggle('disabled', atEnd);
            });
        }

        document.querySelectorAll('.scrollable-content').forEach(function(el) {
            el.addEventListener('scroll', updateScrollArrows);
        });

        window.addEventListener('resize', updateScrollArrows);
        document.addEventListener('DOMContentLoaded', updateScrollArrows);
    </script>
</body>
</html>