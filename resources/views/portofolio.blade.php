<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>PT. Berkah Alam Tabantang - Konstruksi & Infrastruktur Batam</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #ffffff;
        }

        section {
            width: 100%;
        }

        .inner-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 40px;
            width: 100%;
        }

        /* ========== NAVBAR ========== */
        .navbar {
            background: #D0E6FD;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 56px;
            display: flex;
            align-items: center;
            z-index: 1000;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        .nav-wrapper {
            display: flex;
            align-items: center;
            width: 100%;
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 40px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            flex: 1;
        }
        .logo img { height: 36px; }

        .nav-menu {
            flex: 2;
            display: flex;
            justify-content: center;
            list-style: none;
            gap: 28px;
        }

        .nav-menu a {
            text-decoration: none;
            color: #1a2a3a;
            font-size: 14px;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-menu a:hover,
        .nav-menu a.active {
            color: #162660;
            font-weight: 700;
        }

        .nav-right {
            flex: 1;
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        .login-icon {
            font-size: 20px;
            color: #1a2a3a;
            cursor: pointer;
            transition: color 0.3s;
        }
        .login-icon:hover { color: #162660; }

        /* ========== HERO DENGAN OVERLAY HITAM ========== */
        #home {
            position: relative;
            margin-top: 56px;
            height: calc(100vh - 56px);
            overflow: hidden;
        }

        .hero-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
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
                rgba(0,0,0,0.5) 45%,
                rgba(0,0,0,0.25) 75%,
                rgba(0,0,0,0) 100%
            );
        }

        .hero-content {
            position: absolute;
            top: 50%;
            left: 72px;
            transform: translateY(-50%);
            color: #fff;
            max-width: 660px;
            z-index: 2;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
        }

        .hero h1 { font-size: 42px; font-weight: 800; margin-bottom: 12px; line-height: 1.2; }
        .tagline { font-size: 17px; margin-bottom: 10px; font-weight: 500; color: #D0E6FD; }
        .description { font-size: 15px; line-height: 1.8; color: #f0f0f0; }

        /* ========== SHARED ========== */
        .section-title {
            font-size: 2rem;
            font-weight: 800;
            color: #162660;
            margin-bottom: 12px;
            letter-spacing: 2px;
            text-transform: uppercase;
        }
        .title-underline {
            width: 60px; height: 4px;
            background: #162660;
            margin: 0 auto;
            border-radius: 2px;
        }

        /* ========== TENTANG KAMI ========== */
        #tentang-kami {
            background: #ffffff;
            padding: 80px 0;
            min-height: 100vh;
            display: block;
        }

        .about-header { text-align: center; margin-bottom: 50px; }

        .about-content { display: flex; gap: 60px; align-items: flex-start; }

        .about-left {
            flex: 1;
            position: relative;
            min-height: 460px;
        }

        .about-logo-bg {
            position: absolute;
            top: 50%; left: 50%;
            transform: translate(-50%, -50%);
            width: 65%;
            opacity: 0.12;
            pointer-events: none;
            user-select: none;
        }

        .about-left-inner { position: relative; z-index: 1; }

        .about-left h2 { font-size: 1.6rem; color: #162660; margin-bottom: 18px; font-weight: 700; }

        .about-left p {
            font-size: 0.95rem;
            line-height: 1.85;
            color: #2a3a4a;
            margin-bottom: 18px;
            text-align: justify;
        }

        .sbu-label { font-size: 1.1rem; font-weight: 700; color: #162660; margin-bottom: 4px; }
        .sbu-number { font-size: 0.9rem; color: #555; margin-bottom: 28px; }

        .btn-unduh {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 9px 22px;
            background: #D0E6FD;
            color: #162660;
            border: none;
            border-radius: 24px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.3s;
        }
        .btn-unduh:hover { background: #162660; color: #fff; }

        .about-right { flex: 1; }

        .photos-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
        }

        .photo-item {
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            transition: transform 0.3s;
            cursor: pointer;
        }
        .photo-item:hover { transform: scale(1.03); }
        .photo-item img { width: 100%; height: 180px; object-fit: cover; display: block; }
        .photo-item:first-child { grid-column: span 2; }
        .photo-item:first-child img { height: 240px; }

        /* ========== LAYANAN ========== */
        #layanan {
            background: #ffffff;
            padding: 0 0 80px 0;
            min-height: 100vh;
            display: block;
        }

        .layanan-header {
            background: #162660;
            border-radius: 0 0 40px 40px;
            text-align: center;
            padding: 28px 40px 26px;
            margin-bottom: 52px;
            width: 100%;
        }

        .layanan-header .section-title {
            color: #fff;
            letter-spacing: 10px;
            font-size: 2rem;
            margin: 0;
        }

        .layanan-scroll-area {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 40px;
        }

        .services-scroll-wrapper {
            overflow-x: auto;
            overflow-y: visible;
            padding-bottom: 4px;
            -webkit-overflow-scrolling: touch;
            scrollbar-width: none;
            -ms-overflow-style: none;
        }
        .services-scroll-wrapper::-webkit-scrollbar { display: none; }

        .services-track {
            display: flex;
            gap: 24px;
            width: max-content;
            padding: 4px 0 8px;
        }

        .service-card {
            width: 384px;
            flex-shrink: 0;
            border-radius: 22px;
            overflow: hidden;
            cursor: pointer;
            position: relative;
            background: #c8ddf0;
            box-shadow: 0 6px 20px rgba(22,38,96,0.14);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .service-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 16px 36px rgba(22,38,96,0.22);
        }

        .service-card-img {
            width: 100%;
            height: 380px;
            object-fit: cover;
            display: block;
            transition: transform 0.5s ease;
        }
        .service-card:hover .service-card-img { transform: scale(1.04); }

        .service-card-top {
            position: absolute;
            top: 0; left: 0; right: 0;
            padding: 22px 18px 50px;
            background: linear-gradient(
                to bottom,
                rgba(22,38,96,0.82) 0%,
                rgba(22,38,96,0.48) 55%,
                rgba(22,38,96,0) 100%
            );
        }

        .service-title { font-size: 1.05rem; font-weight: 700; color: #fff; margin-bottom: 4px; line-height: 1.35; }
        .service-code { font-size: 0.82rem; color: #D0E6FD; font-weight: 600; }

        .service-card-body {
            position: absolute;
            bottom: 0; left: 0; right: 0;
            padding: 22px 18px 26px;
            background: linear-gradient(
                to top,
                rgba(22,38,96,0.97) 0%,
                rgba(22,38,96,0.92) 55%,
                rgba(22,38,96,0) 100%
            );
            transform: translateY(100%);
            opacity: 0;
            transition: transform 0.4s ease, opacity 0.4s ease;
        }
        .service-card:hover .service-card-body { transform: translateY(0); opacity: 1; }

        .service-desc { font-size: 0.84rem; color: #c8d8f0; line-height: 1.65; margin-bottom: 12px; }
        .service-features { list-style: none; }
        .service-features li {
            font-size: 0.82rem; color: #a8c4e4;
            padding: 3px 0; display: flex; align-items: center; gap: 7px;
        }
        .service-features li i { color: #8CC1E9; font-size: 0.75rem; }

        /* ========== PORTOFOLIO ========== */
        #portofolio {
            background: #D0E6FD;
            padding: 70px 0 80px 0;
            width: 100%;
            min-height: 100vh;
            display: block;
        }

        .portfolio-header { text-align: center; margin-bottom: 44px; }
        .portfolio-header .section-title { font-size: 2rem; font-weight: 900; letter-spacing: 2px; }

        .portfolio-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
        }

        .portfolio-card {
            background: #fff;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 6px 20px rgba(22,38,96,0.12);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
            display: flex;
            flex-direction: column;
        }
        .portfolio-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 36px rgba(22,38,96,0.2);
        }

        .portfolio-image { width: 100%; position: relative; overflow: hidden; }
        .portfolio-image img {
            width: 100%; height: 320px;
            object-fit: cover; display: block;
            transition: transform 0.4s ease;
        }
        .portfolio-card:hover .portfolio-image img { transform: scale(1.05); }

        .portfolio-img-overlay {
            position: absolute;
            bottom: 0; left: 0; right: 0;
            padding: 52px 16px 38px;
            background: linear-gradient(
                to top,
                rgba(22,38,96,0.82) 0%,
                rgba(22,38,96,0.35) 60%,
                rgba(22,38,96,0) 100%
            );
        }
        .portfolio-title { font-size: 1rem; font-weight: 700; color: #fff; line-height: 1.4; margin: 0; }

        .portfolio-bottom { padding: 10px 14px 12px; display: flex; justify-content: flex-end; }

        .portfolio-btn {
            display: inline-flex; align-items: center; gap: 5px;
            padding: 6px 16px; background: #D0E6FD; color: #162660;
            border: none; border-radius: 20px; font-size: 12px; font-weight: 700;
            cursor: pointer; transition: background 0.3s, color 0.3s;
        }
        .portfolio-btn:hover { background: #162660; color: #fff; }

        /* ========== BERITA ========== */
        #berita {
            background: #ffffff;
            padding: 70px 0 80px 0;
            width: 100%;
            min-height: 100vh;
            display: block;
        }

        .berita-header { margin-bottom: 36px; }
        .berita-header .section-title { font-size: 2rem; font-weight: 900; margin: 0; }

        .berita-layout {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 36px;
            align-items: start;
        }

        .featured-card { background: transparent; }
        .featured-img-wrap { position: relative; border-radius: 10px; overflow: hidden; }
        .featured-img-wrap img { width: 100%; height: 300px; object-fit: cover; display: block; }
        .featured-date-badge {
            position: absolute; bottom: 12px; right: 12px;
            background: #162660; color: #fff;
            font-size: 12px; font-weight: 700; padding: 5px 12px; border-radius: 8px;
        }
        .featured-card-body { padding: 18px 0 0 0; }
        .featured-title-link {
            font-size: 1.05rem; font-weight: 800; color: #162660;
            margin-bottom: 10px; text-decoration: underline; line-height: 1.4; display: block;
        }
        .featured-excerpt { font-size: 0.88rem; color: #444; line-height: 1.7; margin-bottom: 16px; text-align: justify; }
        .btn-selengkapnya {
            display: inline-flex; align-items: center; gap: 6px;
            padding: 7px 18px; background: #D0E6FD; color: #162660;
            border: none; border-radius: 20px; font-size: 12px; font-weight: 700;
            cursor: pointer; transition: background 0.3s, color 0.3s;
        }
        .btn-selengkapnya:hover { background: #162660; color: #fff; }

        .news-list { display: flex; flex-direction: column; gap: 20px; }
        .news-item {
            display: grid; grid-template-columns: 120px 1fr;
            border-radius: 12px; overflow: hidden;
            box-shadow: 0 2px 8px rgba(22,38,96,0.07);
            background: #f8fafc; transition: transform 0.3s; cursor: pointer;
        }
        .news-item:hover { transform: translateY(-3px); }
        .news-item-img { position: relative; }
        .news-item-img img { width: 120px; height: 100%; object-fit: cover; display: block; }
        .news-item-date {
            position: absolute; bottom: 6px; left: 5px;
            background: #162660; color: #fff;
            font-size: 10px; font-weight: 700; padding: 3px 8px; border-radius: 5px;
        }
        .news-item-body { padding: 13px 14px; display: flex; flex-direction: column; justify-content: space-between; }
        .news-item-title { font-size: 0.88rem; font-weight: 700; color: #162660; line-height: 1.4; margin-bottom: 6px; text-decoration: underline; }
        .news-item-excerpt { font-size: 0.78rem; color: #555; line-height: 1.5; margin-bottom: 8px; }
        .btn-baca {
            display: inline-flex; align-items: center; gap: 4px;
            padding: 4px 13px; background: #D0E6FD; color: #162660;
            border: none; border-radius: 16px; font-size: 11px; font-weight: 700;
            cursor: pointer; align-self: flex-start; transition: background 0.3s, color 0.3s;
        }
        .btn-baca:hover { background: #162660; color: #fff; }

        /* ========== TESTIMONI ========== */
        #testimoni {
            background: #ffffff;
            padding: 0 0 80px 0;
            width: 100%;
            min-height: 100vh;
            display: block;
        }

        .testimoni-header {
            background: #162660;
            border-radius: 0 0 40px 40px;
            text-align: center;
            padding: 28px 40px 26px;
            margin-bottom: 36px;
            width: 100%;
        }
        .testimoni-header .section-title { color: #fff; letter-spacing: 10px; font-size: 2rem; margin: 0; }

        .testimoni-subtitle-block { text-align: center; margin-bottom: 40px; }
        .testimoni-subtitle-block .sub-bold { font-size: 1.1rem; font-weight: 800; color: #162660; margin-bottom: 8px; display: block; }
        .testimoni-subtitle-block .sub-text { font-size: 0.92rem; color: #444; max-width: 560px; margin: 0 auto; line-height: 1.6; }

        .testimoni-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 22px; }

        .testimoni-card {
            background: #D0E6FD;
            border-radius: 18px;
            padding: 26px 22px;
            box-shadow: 0 4px 14px rgba(22,38,96,0.08);
            transition: transform 0.3s;
        }
        .testimoni-card:hover { transform: translateY(-5px); }

        .company-logo-circle {
            width: 54px; height: 54px; border-radius: 50%;
            background: #ffffff;
            display: flex; align-items: center; justify-content: center;
            margin-bottom: 14px;
            box-shadow: 0 2px 8px rgba(22,38,96,0.12);
        }
        .company-logo-circle span { font-size: 13px; font-weight: 800; color: #162660; }

        .testimoni-rating { color: #f5a623; font-size: 1.25rem; margin-bottom: 14px; letter-spacing: 2px; }
        .testimoni-text { color: #2a3a4a; line-height: 1.7; margin-bottom: 12px; font-size: 0.88rem; text-align: justify; }
        .testimoni-author { font-weight: 700; color: #162660; font-size: 0.88rem; }

        /* ========== LOKASI ========== */
        #lokasi {
            background: #ffffff;
            padding: 70px 0 60px;
            width: 100%;
            display: block;
        }

        .lokasi-header { text-align: center; margin-bottom: 46px; }
        .lokasi-header .section-title { letter-spacing: 8px; }

        .lokasi-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 40px; }

        .lokasi-card {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 14px rgba(22,38,96,0.10);
        }
        .lokasi-card img {
            width: 100%; height: auto; max-height: 260px;
            object-fit: contain; display: block; background: #f0f4f8;
        }
        .lokasi-card-content { padding: 18px 20px; }
        .lokasi-card-content p { color: #1a2a3a; line-height: 1.7; font-size: 0.92rem; }
        .lokasi-card-content strong { color: #162660; font-weight: 700; }

        /* ========== FOOTER ========== */
        footer {
            background: #D0E6FD;
            color: #162660;
            padding: 48px 0 0;
            border-top: 2px solid #8CC1E9;
            width: 100%;
        }

        .footer-inner {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 40px;
            width: 100%;
        }

        .footer-top {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 40px;
            padding-bottom: 28px;
        }

        .footer-brand { flex: 2; min-width: 260px; }
        .footer-brand-row { display: flex; align-items: center; gap: 16px; margin-bottom: 8px; }
        .footer-brand-row img { height: 60px; }
        .footer-brand h3 { font-size: 1.3rem; font-weight: 800; color: #162660; }
        .footer-brand p { color: #2a3a4a; font-size: 0.88rem; margin-bottom: 5px; }
        .footer-brand a { color: #162660; text-decoration: none; font-size: 0.88rem; }
        .footer-brand a:hover { text-decoration: underline; }

        .footer-social { display: flex; gap: 18px; margin-top: 14px; }
        .footer-social a { font-size: 22px; color: #162660; text-decoration: none; transition: color 0.3s, transform 0.3s; }
        .footer-social a:hover { color: #4388C4; transform: translateY(-3px); }

        .footer-links { display: flex; gap: 48px; flex-wrap: wrap; }
        .footer-col h4 { font-size: 1rem; font-weight: 800; color: #162660; margin-bottom: 16px; }
        .footer-col p { color: #2a3a4a; font-size: 0.86rem; margin-bottom: 7px; }
        .footer-col a { color: #2a3a4a; text-decoration: none; display: block; margin-bottom: 6px; font-size: 0.86rem; transition: color 0.3s; }
        .footer-col a:hover { color: #162660; font-weight: 600; }

        /* COPYRIGHT FULL WIDTH */
        .footer-bottom-full {
            width: 100%;
            background-color: #162660;
            color: #ffffff;
            text-align: center;
            padding: 22px 0;
            margin-top: 28px;
            font-size: 13px;
            font-weight: 500;
        }

        /* ========== MODAL ========== */
        .modal {
            display: none;
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0,0,0,0.75);
            z-index: 2000;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .portfolio-modal-content {
            background: #fff; max-width: 860px; width: 100%;
            max-height: 90vh; overflow-y: auto; border-radius: 18px;
            position: relative; display: flex; flex-direction: column;
        }

        .modal-close {
            position: absolute; top: 14px; right: 18px;
            font-size: 28px; cursor: pointer; color: #999;
            transition: color 0.3s; z-index: 10; line-height: 1;
        }
        .modal-close:hover { color: #162660; }

        .portfolio-modal-inner { display: flex; min-height: 420px; }

        .portfolio-modal-photos {
            flex: 0 0 42%; background: #eef4fb;
            border-radius: 18px 0 0 0; padding: 40px 20px 30px 30px;
            display: flex; flex-direction: column; justify-content: center; align-items: center;
        }

        .photo-main {
            width: 88%; aspect-ratio: 4/3; border-radius: 10px; overflow: hidden;
            box-shadow: 0 8px 24px rgba(0,0,0,0.2); z-index: 2;
            margin-bottom: -22px; align-self: flex-start; margin-left: 5px;
        }
        .photo-main img { width: 100%; height: 100%; object-fit: cover; }

        .photo-secondary {
            width: 80%; aspect-ratio: 4/3; border-radius: 10px; overflow: hidden;
            box-shadow: 0 8px 24px rgba(0,0,0,0.2); z-index: 1;
            align-self: flex-end; margin-right: 5px;
        }
        .photo-secondary img { width: 100%; height: 100%; object-fit: cover; }

        .portfolio-modal-text { flex: 1; padding: 35px 35px 20px 28px; display: flex; flex-direction: column; }
        .portfolio-modal-title { font-size: 1.35rem; font-weight: 800; color: #162660; margin-bottom: 18px; line-height: 1.35; }
        .portfolio-modal-body { font-size: 0.9rem; color: #333; line-height: 1.75; flex: 1; }
        .portfolio-modal-body p { margin-bottom: 10px; }
        .portfolio-modal-body strong { color: #162660; }

        .spec-title { font-weight: 700; color: #162660; display: block; margin-bottom: 4px; }
        .spec-list { list-style: none; padding-left: 0; margin-bottom: 10px; }
        .spec-list li { padding-left: 16px; position: relative; margin-bottom: 3px; font-size: 0.88rem; color: #444; }
        .spec-list li::before { content: "•"; position: absolute; left: 0; color: #162660; font-weight: bold; }

        .portfolio-modal-footer { padding: 16px 35px 24px 28px; border-top: 1px solid #f0f0f0; }

        .btn-unduh-pdf {
            display: inline-flex; align-items: center; gap: 7px;
            padding: 9px 22px; background: #162660; color: #fff;
            border: none; border-radius: 24px; font-size: 13px; font-weight: 700;
            cursor: pointer; text-decoration: none; transition: background 0.3s;
        }
        .btn-unduh-pdf:hover { background: #4388C4; }

        .news-modal-content {
            background: #fff; max-width: 820px; width: 92%;
            max-height: 88vh; overflow-y: auto; border-radius: 18px;
            overflow: hidden; position: relative;
        }

        .news-modal-hero { position: relative; height: 280px; }
        .news-modal-hero img { width: 100%; height: 100%; object-fit: cover; display: block; }
        .news-modal-hero-overlay {
            position: absolute; bottom: 0; left: 0; right: 0;
            background: linear-gradient(to top, rgba(22,38,96,0.92), transparent);
            padding: 28px 32px 24px;
        }
        .news-modal-hero-overlay h2 {
            font-size: 1.55rem; font-weight: 800; color: #fff;
            line-height: 1.3; margin-bottom: 6px; text-decoration: underline;
        }
        .news-modal-date {
            display: inline-block; background: #162660; color: #fff;
            font-size: 12px; font-weight: 700; padding: 4px 12px; border-radius: 6px;
        }
        .news-modal-body { padding: 28px 32px 32px; background: #f2f7fc; }
        .news-modal-body p { font-size: 0.95rem; color: #2a3a4a; line-height: 1.8; margin-bottom: 14px; text-align: justify; }

        .login-modal {
            display: none; position: fixed; top: 0; left: 0;
            width: 100%; height: 100%; background: rgba(0,0,0,0.72);
            z-index: 2001; justify-content: center; align-items: center;
        }

        .login-modal-content {
            background: #D0E6FD; width: 100%; max-width: 420px;
            border-radius: 14px; padding: 36px 32px 32px; position: relative;
            box-shadow: 0 16px 40px rgba(0,0,0,0.3); border: 2px solid #8CC1E9;
        }
        .login-modal-close { position: absolute; top: 14px; right: 18px; font-size: 24px; cursor: pointer; color: #666; transition: color 0.3s; }
        .login-modal-close:hover { color: #162660; }
        .login-modal h2 { text-align: center; margin-bottom: 32px; color: #162660; font-weight: 800; font-size: 1.6rem; letter-spacing: 4px; }
        .login-input-group { margin-bottom: 20px; }
        .login-input-group label { display: block; margin-bottom: 8px; color: #162660; font-weight: 600; font-size: 15px; }
        .login-input-group input { width: 100%; padding: 13px 18px; border: none; border-radius: 30px; font-size: 14px; background: #fff; outline: none; color: #162660; }
        .login-btn { width: 100%; padding: 13px; background: #162660; color: #fff; border: none; border-radius: 30px; font-size: 15px; font-weight: 700; cursor: pointer; transition: all 0.3s; margin-top: 10px; letter-spacing: 2px; }
        .login-btn:hover { background: #4388C4; }

        /* ========== RESPONSIVE ========== */
        @media (max-width: 1024px) {
            .about-content { flex-direction: column; }
            .portfolio-grid { grid-template-columns: repeat(2, 1fr); }
            .berita-layout { grid-template-columns: 1fr; }
            .testimoni-grid { grid-template-columns: repeat(2, 1fr); }
            .lokasi-grid { grid-template-columns: 1fr; }
        }

        @media (max-width: 768px) {
            .nav-menu { gap: 14px; }
            .hero-content { left: 20px; right: 20px; }
            .hero h1 { font-size: 26px; }
            .service-card { width: 270px; }
            .portfolio-grid { grid-template-columns: 1fr; }
            .portfolio-modal-inner { flex-direction: column; }
            .portfolio-modal-photos { border-radius: 18px 18px 0 0; flex: 0 0 auto; padding: 25px 20px 15px; }
            .portfolio-modal-text { padding: 20px; }
            .testimoni-grid { grid-template-columns: 1fr; }
            .footer-top { flex-direction: column; }
        }
    </style>
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
                            <div class="service-desc">Penyediaan jasa konstruksi untuk berbagai jenis gedung komersial maupun fasilitas publik lainnya.</div>
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
                            <div class="service-desc">Jasa pelaksana konstruksi jaringan saluran air, pelabuhan, dam, bendungan.</div>
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
                            <div class="service-desc">Konstruksi jalan raya, jalan lokal, rel kereta api, landas pacu bandara.</div>
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
                            <div class="service-desc">Pengerjaan jembatan, jalan layang, terowongan, jalur bawah tanah.</div>
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
        <!-- COPYRIGHT FULL WIDTH DI LUAR CONTAINER -->
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
        const sections = document.querySelectorAll('section[id]');
        const navLinks = document.querySelectorAll('.nav-menu a[href^="#"]');

        function updateActiveNav() {
            let current = '';
            sections.forEach(section => {
                const sectionTop = section.getBoundingClientRect().top;
                if (sectionTop <= 80) {
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

        navLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href').substring(1);
                const targetSection = document.getElementById(targetId);
                if (targetSection) {
                    if (targetId === 'lokasi') {
                        window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' });
                    } else {
                        const offsetTop = targetSection.getBoundingClientRect().top + window.scrollY - 56;
                        window.scrollTo({ top: offsetTop, behavior: 'smooth' });
                    }
                }
            });
        });

        window.addEventListener('scroll', updateActiveNav);
        updateActiveNav();

        document.querySelectorAll('.footer-col a[href^="#"]').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href').substring(1);
                const targetSection = document.getElementById(targetId);
                if (targetSection) {
                    if (targetId === 'lokasi') {
                        window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' });
                    } else {
                        const offsetTop = targetSection.getBoundingClientRect().top + window.scrollY - 56;
                        window.scrollTo({ top: offsetTop, behavior: 'smooth' });
                    }
                }
            });
        });

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

        function openLoginModal() { document.getElementById('loginModal').style.display = 'flex'; document.body.style.overflow = 'hidden'; }
        function closeLoginModal() { document.getElementById('loginModal').style.display = 'none'; document.body.style.overflow = 'auto'; }
        function handleLogin() {
            const user = document.getElementById('username').value;
            const pass = document.getElementById('password').value;
            if (user === 'admin' && pass === 'admin123') { alert('Login berhasil!'); closeLoginModal(); }
            else alert('Username atau password salah!');
        }

        window.onclick = function(event) {
            if (event.target == document.getElementById('portfolioModal')) closePortfolioModal();
            if (event.target == document.getElementById('newsModal')) closeNewsModal();
            if (event.target == document.getElementById('loginModal')) closeLoginModal();
        }
    </script>
</body>
</html>
