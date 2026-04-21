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
            background: #f5f7fa;
            scroll-behavior: smooth;
        }

        .navbar {
            background: #c3d3e3;
            position: fixed;
            top: 0;
            width: 100%;
            height: 52px;
            display: flex;
            align-items: center;
            z-index: 1000;
        }

        .container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 20px;
            width: 100%;
        }

        .nav-wrapper {
            display: flex;
            align-items: center;
            width: 100%;
        }

        .logo {
            flex: 1;
        }

        .logo img {
            height: 34px;
        }

        .nav-menu {
            flex: 2;
            display: flex;
            justify-content: center;
            list-style: none;
            gap: 32px;
        }

        .nav-menu a {
            text-decoration: none;
            color: #000;
            font-size: 15px;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-menu a:hover {
            color: #E6B12E;
        }

        .nav-right {
            flex: 1;
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        .login-icon {
            font-size: 18px;
            margin-right: 5px;
            color: #000;
            cursor: pointer;
            transition: color 0.3s;
        }

        .login-icon:hover {
            color: #E6B12E;
        }

        .hero {
            position: relative;
            margin-top: 52px;
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

        .about-section {
            padding: 80px 0;
            background: #ffffff;
            min-height: 100vh;
        }

        .about-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .about-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-title {
            font-size: 2.5rem;
            color: #1a2a3a;
            margin-bottom: 15px;
            font-weight: 700;
        }

        .title-underline {
            width: 80px;
            height: 4px;
            background: #E6B12E;
            margin: 0 auto;
            border-radius: 2px;
        }

        .about-content {
            display: flex;
            gap: 60px;
            align-items: flex-start;
        }

        .about-left {
            flex: 1;
            background-image: url('{{ asset('images/logo_pt_bat2.jpg') }}');
            background-repeat: no-repeat;
            background-position: center;
            background-size: 60%;
            background-color: #f0f4f8;
            border-radius: 15px;
            padding: 40px;
            position: relative;
            min-height: 500px;
        }

        .about-left::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.85);
            border-radius: 15px;
            z-index: 0;
        }

        .about-left h2,
        .about-left p,
        .about-left .certificate-text,
        .about-left .btn-primary {
            position: relative;
            z-index: 1;
        }

        .about-left h2 {
            font-size: 1.8rem;
            color: #1a2a3a;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .about-left p {
            font-size: 1rem;
            line-height: 1.8;
            color: #1a2a3a;
            margin-bottom: 20px;
            text-align: justify;
        }

        .certificate-text {
            margin: 20px 0;
        }

        .certificate-text strong {
            display: block;
            color: #1a2a3a;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .certificate-text p {
            margin-bottom: 0;
            color: #2563eb;
            font-weight: 500;
        }

        .btn-primary {
            display: inline-block;
            padding: 10px 25px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: 500;
            font-size: 14px;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
        }

        .btn-primary:hover {
            background: #1d4ed8;
            color: white;
        }

        .about-right {
            flex: 1;
        }

        .photos-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }

        .photo-item {
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s;
            cursor: pointer;
        }

        .photo-item:hover {
            transform: scale(1.03);
        }

        .photo-item img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            display: block;
        }

        .photo-item:first-child {
            grid-column: span 2;
        }

        .photo-item:first-child img {
            height: 250px;
        }

        .layanan-section {
            padding: 80px 0;
            background: #f5f7fa;
            min-height: 100vh;
        }

        .layanan-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .layanan-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 30px;
        }

        .service-card {
            position: relative;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            cursor: pointer;
            min-height: 280px;
            background-size: cover;
            background-position: center;
            transition: transform 0.3s ease;
        }

        .service-card:hover {
            transform: translateY(-5px);
        }

        .service-card:nth-child(1) {
            background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.7)), url('{{ asset('images/layanan_1.jpg') }}');
        }
        .service-card:nth-child(2) {
            background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.7)), url('{{ asset('images/layanan_2.jpg') }}');
        }
        .service-card:nth-child(3) {
            background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.7)), url('{{ asset('images/layanan_3.jpg') }}');
        }
        .service-card:nth-child(4) {
            background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.7)), url('{{ asset('images/layanan_4.jpeg') }}');
        }

        .service-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.9), rgba(0,0,0,0.5));
            padding: 25px;
            transition: all 0.4s ease;
        }

        .service-card:hover .service-overlay {
            background: rgba(230, 177, 46, 0.95);
            bottom: 0;
            top: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .service-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: white;
            margin-bottom: 8px;
        }

        .service-code {
            font-size: 0.85rem;
            color: #E6B12E;
            font-family: monospace;
        }

        .service-card:hover .service-title,
        .service-card:hover .service-code {
            color: #1a2a3a;
        }

        .service-description {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.5s ease-out;
            color: #1a2a3a;
        }

        .service-card:hover .service-description {
            max-height: 200px;
            margin-top: 15px;
        }

        .service-description p {
            font-size: 0.9rem;
            line-height: 1.6;
            margin-bottom: 10px;
        }

        .service-features {
            list-style: none;
            margin-top: 10px;
        }

        .service-features li {
            font-size: 0.85rem;
            padding: 3px 0;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .portfolio-section {
            padding: 80px 0;
            background: #ffffff;
            min-height: 100vh;
        }

        .portfolio-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .portfolio-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .portfolio-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 40px;
        }

        .portfolio-card {
            background: #f8f9fa;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .portfolio-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
        }

        .portfolio-image {
            width: 100%;
            height: 250px;
            overflow: hidden;
        }

        .portfolio-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .portfolio-card:hover .portfolio-image img {
            transform: scale(1.05);
        }

        .portfolio-content {
            padding: 25px;
        }

        .portfolio-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #1a2a3a;
            margin-bottom: 10px;
        }

        .portfolio-desc {
            font-size: 0.95rem;
            color: #666;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .portfolio-btn {
            display: inline-block;
            padding: 8px 20px;
            background: transparent;
            color: #2563eb;
            text-decoration: none;
            border-radius: 5px;
            font-weight: 500;
            font-size: 14px;
            transition: all 0.3s;
            border: 1px solid #2563eb;
        }

        .portfolio-btn:hover {
            background: #2563eb;
            color: white;
        }

        .berita-section {
            padding: 80px 0;
            background: #f5f7fa;
            min-height: 100vh;
        }

        .berita-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .berita-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .featured-news {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            margin-bottom: 50px;
            display: flex;
            flex-wrap: wrap;
        }

        .featured-image {
            flex: 1;
            min-width: 300px;
        }

        .featured-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .featured-content {
            flex: 1;
            padding: 40px;
        }

        .featured-date {
            color: #2563eb;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 10px;
        }

        .featured-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: #1a2a3a;
            margin-bottom: 15px;
        }

        .featured-excerpt {
            color: #666;
            line-height: 1.7;
            margin-bottom: 20px;
        }

        .read-more {
            display: inline-block;
            padding: 10px 25px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: 500;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
        }

        .read-more:hover {
            background: #1d4ed8;
        }

        .news-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        .news-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            transition: transform 0.3s;
        }

        .news-card:hover {
            transform: translateY(-5px);
        }

        .news-image {
            width: 100%;
            height: 200px;
            overflow: hidden;
        }

        .news-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s;
        }

        .news-card:hover .news-image img {
            transform: scale(1.05);
        }

        .news-content {
            padding: 20px;
        }

        .news-date {
            color: #2563eb;
            font-size: 12px;
            font-weight: 500;
            margin-bottom: 8px;
        }

        .news-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: #1a2a3a;
            margin-bottom: 10px;
            line-height: 1.4;
        }

        .news-excerpt {
            color: #666;
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .news-btn {
            display: inline-block;
            padding: 6px 15px;
            background: transparent;
            color: #2563eb;
            text-decoration: none;
            border-radius: 5px;
            font-weight: 500;
            font-size: 13px;
            transition: all 0.3s;
            border: 1px solid #2563eb;
            cursor: pointer;
        }

        .news-btn:hover {
            background: #2563eb;
            color: white;
        }

        /* Modal Popup */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.8);
            z-index: 2000;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background: white;
            max-width: 800px;
            width: 90%;
            max-height: 80vh;
            overflow-y: auto;
            border-radius: 20px;
            padding: 30px;
            position: relative;
        }

        .modal-close {
            position: absolute;
            top: 15px;
            right: 20px;
            font-size: 28px;
            cursor: pointer;
            color: #999;
            transition: color 0.3s;
        }

        .modal-close:hover {
            color: #1a2a3a;
        }

        .modal-date {
            color: #2563eb;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .modal-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: #1a2a3a;
            margin-bottom: 20px;
        }

        .modal-image {
            width: 100%;
            border-radius: 15px;
            margin-bottom: 20px;
        }

        .modal-image img {
            width: 100%;
            border-radius: 15px;
        }

        .modal-body {
            color: #444;
            line-height: 1.8;
        }

        .modal-body p {
            margin-bottom: 15px;
        }

        .testimoni-section {
            padding: 80px 0;
            background: #f5f7fa;
        }

        .testimoni-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .testimoni-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .testimoni-subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 50px;
            font-size: 1.1rem;
        }

        .testimoni-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        .testimoni-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            transition: transform 0.3s;
        }

        .testimoni-card:hover {
            transform: translateY(-5px);
        }

        .testimoni-rating {
            color: #fbbf24;
            font-size: 1.2rem;
            margin-bottom: 15px;
        }

        .testimoni-text {
            color: #444;
            line-height: 1.7;
            margin-bottom: 15px;
            font-style: italic;
        }

        .testimoni-author {
            font-weight: 600;
            color: #1a2a3a;
        }

        .lokasi-section {
            padding: 80px 0;
            background: #ffffff;
        }

        .lokasi-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .lokasi-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .lokasi-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 40px;
        }

        .lokasi-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }

        .lokasi-card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        .lokasi-card-content {
            padding: 25px;
        }

        .lokasi-card-content h3 {
            font-size: 1.3rem;
            color: #1a2a3a;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .lokasi-card-content h3 i {
            color: #E6B12E;
        }

        .lokasi-card-content p {
            color: #555;
            line-height: 1.8;
        }

        .footer {
            background: #1a2a3a;
            color: white;
            padding: 50px 0 30px;
        }

        .footer-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .footer-top {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer-brand {
            flex: 1;
            min-width: 250px;
        }

        .footer-brand h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
        }

        .footer-brand p {
            color: #ccc;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .footer-social {
            display: flex;
            gap: 15px;
        }

        .footer-social a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            color: white;
            text-decoration: none;
            transition: all 0.3s;
        }

        .footer-social a:hover {
            background: #E6B12E;
            transform: translateY(-3px);
        }

        .footer-links {
            flex: 2;
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 40px;
        }

        .footer-col h4 {
            font-size: 1.1rem;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 10px;
        }

        .footer-col h4::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 2px;
            background: #E6B12E;
        }

        .footer-col p {
            color: #ccc;
            margin-bottom: 10px;
        }

        .footer-col a {
            color: #ccc;
            text-decoration: none;
            display: block;
            margin-bottom: 8px;
            transition: color 0.3s;
        }

        .footer-col a:hover {
            color: #E6B12E;
        }

        .footer-col i {
            width: 25px;
            color: #E6B12E;
        }

        .footer-bottom {
            text-align: center;
            padding-top: 30px;
            border-top: 1px solid rgba(255,255,255,0.1);
            color: #888;
            font-size: 14px;
        }

        .login-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            z-index: 2001;
            justify-content: center;
            align-items: center;
        }

        .login-modal-content {
            background: white;
            width: 100%;
            max-width: 400px;
            border-radius: 10px;
            padding: 30px;
            position: relative;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }

        .login-modal-close {
            position: absolute;
            top: 15px;
            right: 20px;
            font-size: 24px;
            cursor: pointer;
            color: #999;
            transition: color 0.3s;
        }

        .login-modal-close:hover {
            color: #1a2a3a;
        }

        .login-modal h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #1a2a3a;
            font-weight: 600;
        }

        .login-input-group {
            margin-bottom: 20px;
        }

        .login-input-group label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 500;
        }

        .login-input-group input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        .login-input-group input:focus {
            outline: none;
            border-color: #E6B12E;
        }

        .login-btn {
            width: 100%;
            padding: 12px;
            background: #E6B12E;
            color: #1a2a3a;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 10px;
        }

        .login-btn:hover {
            background: #1a2a3a;
            color: #E6B12E;
        }

        @media (max-width: 1024px) {
            .about-content {
                flex-direction: column;
            }
            .services-grid {
                grid-template-columns: 1fr;
            }
            .portfolio-grid {
                grid-template-columns: 1fr;
                gap: 30px;
            }
            .news-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .testimoni-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .lokasi-grid {
                grid-template-columns: 1fr;
            }
            .footer-top {
                flex-direction: column;
            }
        }

        @media (max-width: 768px) {
            .nav-wrapper {
                flex-direction: column;
                gap: 10px;
                padding: 10px 0;
            }
            .nav-menu {
                flex-wrap: wrap;
                gap: 15px;
            }
            .navbar {
                height: auto;
                padding: 10px 0;
            }
            .hero-content {
                left: 20px;
                right: 20px;
            }
            .hero h1 {
                font-size: 28px;
            }
            .section-title {
                font-size: 2rem;
            }
            .photos-grid {
                grid-template-columns: 1fr;
            }
            .photo-item:first-child {
                grid-column: span 1;
            }
            .news-grid {
                grid-template-columns: 1fr;
            }
            .featured-content {
                padding: 25px;
            }
            .featured-title {
                font-size: 1.4rem;
            }
            .testimoni-grid {
                grid-template-columns: 1fr;
            }
            .footer-links {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="container">
            <div class="nav-wrapper">
                <div class="logo">
                    <img src="{{ asset('images/logo_pt_bat2.jpg') }}" alt="Logo">
                </div>

                <ul class="nav-menu">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#tentang-kami">Tentang Kami</a></li>
                    <li><a href="#layanan">Layanan</a></li>
                    <li><a href="#portofolio">Portofolio</a></li>
                    <li><a href="#berita">Berita</a></li>
                    <li><a href="#testimoni">Testimoni</a></li>
                    <li><a href="#lokasi">Lokasi</a></li>
                </ul>

                <div class="nav-right">
                    <a href="javascript:void(0)" onclick="openLoginModal()">
                        <i class="fa-solid fa-user login-icon"></i>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <section id="home" class="hero">
        <img src="{{ asset('images/Landing_page.jpg') }}" class="hero-img">
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

    <section id="tentang-kami" class="about-section">
        <div class="about-container">
            <div class="about-header">
                <h1 class="section-title">Tentang Kami</h1>
                <div class="title-underline"></div>
            </div>

            <div class="about-content">
                <div class="about-left">
                    <h2>PT Berkah Alam Tabantang</h2>
                    <p>adalah perusahaan konstruksi terkemuka yang berbasis di Kota Batam. Dengan spesialisasi pada pembangunan infrastruktur dan proyek komersial skala besar, kami berkomitmen memberikan solusi konstruksi yang inovatif dan kolaboratif.</p>
                    <p>Didukung oleh tim profesional berpengalaman dan teknologi terkini, kami memastikan setiap proyek berjalan dengan standar kualitas, keamanan, dan keberlanjutan lingkungan yang tertinggi.</p>

                    <div class="certificate-text">
                        <strong>Sertifikat Badan Usaha (SBU) Konstruksi</strong>
                        <p>PB-UMKU : 022100092289300040001</p>
                    </div>

                    <a href="#" class="btn-primary">Unduh PDF</a>
                </div>

                <div class="about-right">
                    <div class="photos-grid">
                        <div class="photo-item">
                            <img src="{{ asset('images/tentang_kami_1.jpg') }}" alt="Proyek 1">
                        </div>
                        <div class="photo-item">
                            <img src="{{ asset('images/tentang_kami_2.jpg') }}" alt="proyek 2">
                        </div>
                        <div class="photo-item">
                            <img src="{{ asset('images/tentang_kami_3.jpg') }}" alt="proyek 3">
                        </div>
                        <div class="photo-item">
                            <img src="{{ asset('images/tentang_kami_4.jpg') }}" alt="proyek 4">
                        </div>
                        <div class="photo-item">
                            <img src="{{ asset('images/tentang_kami_5.jpg') }}" alt="proyek 5">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="layanan" class="layanan-section">
        <div class="layanan-container">
            <div class="layanan-header">
                <h1 class="section-title">LAYANAN</h1>
                <div class="title-underline"></div>
            </div>

            <div class="services-grid">
                <div class="service-card">
                    <div class="service-overlay">
                        <div class="service-title">Konstruksi Gedung Lainnya</div>
                        <div class="service-code">(BG009)</div>
                        <div class="service-description">
                            <p>Penyediaan jasa konstruksi untuk berbagai jenis gedung komersial maupun fasilitas publik lainnya dengan mengutamakan fungsionalitas ruang dan kekuatan struktur bangunan.</p>
                            <ul class="service-features">
                                <li><i class="fas fa-check-circle"></i> Gedung Komersial</li>
                                <li><i class="fas fa-check-circle"></i> Fasilitas Publik</li>
                                <li><i class="fas fa-check-circle"></i> Struktur Bangunan Berkualitas</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="service-card">
                    <div class="service-overlay">
                        <div class="service-title">Pekerjaan Bangunan Sipil – Sumber Daya Air</div>
                        <div class="service-code">(SI001)</div>
                        <div class="service-description">
                            <p>Kami melayani jasa pelaksana untuk konstruksi jaringan saluran air, pelabuhan, dam, bendungan, serta prasarana sumber daya air lainnya. Fokus kami adalah efisiensi aliran dan ketahanan struktur jangka panjang.</p>
                            <ul class="service-features">
                                <li><i class="fas fa-check-circle"></i> Jaringan Saluran Air</li>
                                <li><i class="fas fa-check-circle"></i> Dam & Bendungan</li>
                                <li><i class="fas fa-check-circle"></i> Prasarana Sumber Daya Air</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="service-card">
                    <div class="service-overlay">
                        <div class="service-title">Pembangunan Infrastruktur Jalan Raya</div>
                        <div class="service-code">(SI003)</div>
                        <div class="service-description">
                            <p>Layanan khusus pelaksanaan konstruksi jalan raya (kecuali jalan layang), jalan lokal, rel kereta api, hingga landas pacu bandara. Kami memastikan kualitas pengaspalan dan fondasi yang mampu menahan beban kendaraan berat.</p>
                            <ul class="service-features">
                                <li><i class="fas fa-check-circle"></i> Jalan Raya & Jalan Lokal</li>
                                <li><i class="fas fa-check-circle"></i> Rel Kereta Api</li>
                                <li><i class="fas fa-check-circle"></i> Landas Pacu Bandara</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="service-card">
                    <div class="service-overlay">
                        <div class="service-title">Konstruksi Jembatan & Jalan Layang</div>
                        <div class="service-code">(SI004)</div>
                        <div class="service-description">
                            <p>Spesialisasi kami mencakup pengerjaan jembatan, jalan layang, terowongan, hingga jalur bawah tanah (subway). Menggunakan perhitungan teknis yang presisi untuk menghubungkan konektivitas antar wilayah.</p>
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

    <section id="portofolio" class="portfolio-section">
        <div class="portfolio-container">
            <div class="portfolio-header">
                <h1 class="section-title">PORTOFOLIO</h1>
                <div class="title-underline"></div>
            </div>

            <div class="portfolio-grid">
                <div class="portfolio-card">
                    <div class="portfolio-image">
                        <img src="{{ asset('images/portofolio_1.jpg') }}" alt="Konstruksi Area Komersial">
                    </div>
                    <div class="portfolio-content">
                        <h3 class="portfolio-title">Konstruksi Area Komersial & Fasilitas Publik</h3>
                        <p class="portfolio-desc">Opus Bay Project - Pembangunan area komersial terpadu dengan fasilitas publik yang modern dan fungsional.</p>
                        <a href="#" class="portfolio-btn">Selengkapnya →</a>
                    </div>
                </div>

                <div class="portfolio-card">
                    <div class="portfolio-image">
                        <img src="{{ asset('images/portofolio_2.jpg') }}" alt="Pengembangan Infrastruktur Terpadu">
                    </div>
                    <div class="portfolio-content">
                        <h3 class="portfolio-title">Pengembangan Infrastruktur Terpadu</h3>
                        <p class="portfolio-desc">Opus Bay Waterfront - Pengembangan kawasan waterfront dengan infrastruktur terpadu berkualitas tinggi.</p>
                        <a href="#" class="portfolio-btn">Selengkapnya →</a>
                    </div>
                </div>

                <div class="portfolio-card">
                    <div class="portfolio-image">
                        <img src="{{ asset('images/portofolio_3.jpg') }}" alt="Pembangunan Akses Jalan Utama">
                    </div>
                    <div class="portfolio-content">
                        <h3 class="portfolio-title">Pembangunan Akses Jalan Utama & Konektivitas</h3>
                        <p class="portfolio-desc">Opus Bay Project - Pembangunan akses jalan utama yang menghubungkan kawasan dengan kota.</p>
                        <a href="#" class="portfolio-btn">Selengkapnya →</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="berita" class="berita-section">
        <div class="berita-container">
            <div class="berita-header">
                <h1 class="section-title">BERITA</h1>
                <div class="title-underline"></div>
            </div>

            <div class="featured-news">
                <div class="featured-image">
                    <img src="{{ asset('images/berita_1(opus by).jpg') }}" alt="Berita Utama">
                </div>
                <div class="featured-content">
                    <div class="featured-date">20 Februari 2026</div>
                    <h2 class="featured-title">Peran PT BAT dalam Mendukung Mega Proyek Opus Bay Batam</h2>
                    <p class="featured-excerpt">PT Berkah Alam Tabantang bangga dipercaya berkontribusi dalam pembangunan infrastruktur Opus Bay, kawasan township mewah di Batam. Dengan tim profesional dan standar pengerjaan tinggi, kami memastikan kualitas terbaik di lapangan.</p>
                    <button class="read-more" onclick="openNewsModal(1)">Selengkapnya →</button>
                </div>
            </div>

            <div class="news-grid">
                <div class="news-card">
                    <div class="news-image">
                        <img src="{{ asset('images/berita_2.jpg') }}" alt="Berita 2">
                    </div>
                    <div class="news-content">
                        <div class="news-date">3 Desember 2025</div>
                        <h3 class="news-title">Mengapa Infrastruktur Jalan yang Baik Sangat Penting bagi Hunian Mewah?</h3>
                        <p class="news-excerpt">Jalan yang mulus di kawasan elit bukan sekadar estetika, tapi aset investasi...</p>
                        <button class="news-btn" onclick="openNewsModal(2)">Baca →</button>
                    </div>
                </div>

                <div class="news-card">
                    <div class="news-image">
                        <img src="{{ asset('images/berita_3.jpg') }}" alt="Berita 3">
                    </div>
                    <div class="news-content">
                        <div class="news-date">24 Juni 2025</div>
                        <h3 class="news-title">Kontribusi Infrastruktur Terhadap Pertumbuhan Ekonomi di Kota Batam</h3>
                        <p class="news-excerpt">Batam sedang bertransformasi menjadi Kota Mandiri. PT BAT siap bersaing secara global...</p>
                        <button class="news-btn" onclick="openNewsModal(3)">Baca →</button>
                    </div>
                </div>

                <div class="news-card">
                    <div class="news-image">
                        <img src="{{ asset('images/berita_4.jpg') }}" alt="Berita 4">
                    </div>
                    <div class="news-content">
                        <div class="news-date">14 Mei 2025</div>
                        <h3 class="news-title">Mengapa Keamanan Adalah Prioritas Utama dalam Setiap Proyek Kami?</h3>
                        <p class="news-excerpt">Keamanan adalah prioritas utama kami. Intip bagaimana protokol "Safety First" PT BAT...</p>
                        <button class="news-btn" onclick="openNewsModal(4)">Baca →</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="testimoni" class="testimoni-section">
        <div class="testimoni-container">
            <div class="testimoni-header">
                <h1 class="section-title">TESTIMONI</h1>
                <div class="title-underline"></div>
            </div>
            <p class="testimoni-subtitle">Bukti Nyata Kualitas Konstruksi Kami - Kolaborasi yang solid melahirkan infrastruktur yang kokoh. Inilah testimoni dari mereka yang telah bermitra dengan PT BAT.</p>

            <div class="testimoni-grid">
                <div class="testimoni-card">
                    <div class="testimoni-rating">★★★★★</div>
                    <p class="testimoni-text">"Profesional dan tepat waktu. Koordinasi tim di lapangan sangat solid, sehingga proyek selesai sesuai jadwal tanpa mengurangi detail kualitas teknis."</p>
                    <p class="testimoni-author">— Site Supervisor</p>
                </div>

                <div class="testimoni-card">
                    <div class="testimoni-rating">★★★★★</div>
                    <p class="testimoni-text">"Hasil pengerjaan infrastrukturnya sangat rapi dan kokoh. PT BAT benar-benar menjaga standar kualitas sesuai spesifikasi yang diminta. Sangat puas!"</p>
                    <p class="testimoni-author">— Project Manager, Kawasan Residensial</p>
                </div>

                <div class="testimoni-card">
                    <div class="testimoni-rating">★★★★★</div>
                    <p class="testimoni-text">"Sangat disiplin dalam prosedur keselamatan kerja (K3). PT BAT membuktikan bahwa proyek skala besar bisa berjalan aman, bersih, dan tetap efisien."</p>
                    <p class="testimoni-author">— Konsultan Konstruksi</p>
                </div>
            </div>
        </div>
    </section>

    <section id="lokasi" class="lokasi-section">
        <div class="lokasi-container">
            <div class="lokasi-header">
                <h1 class="section-title">LOKASI</h1>
                <div class="title-underline"></div>
            </div>

            <div class="lokasi-grid">
                <div class="lokasi-card">
                    <img src="{{ asset('images/lokasi_1.jpg') }}" alt="Alamat Kantor">
                    <div class="lokasi-card-content">
                        <h3><i class="fas fa-map-marker-alt"></i> Alamat Kantor</h3>
                        <p>Perum Griya Batu Aji Asri THP. 6 Blok V2 No.6<br>Kel. Sei Langkai, Kec. Sagulung, Batam</p>
                    </div>
                </div>

                <div class="lokasi-card">
                    <img src="{{ asset('images/lokasi_2.jpg') }}" alt="Kantor Operasional">
                    <div class="lokasi-card-content">
                        <h3><i class="fas fa-building"></i> Kantor Operasional</h3>
                        <p>Ruko Marbella 2 Blok D6 No.7<br>Batam Center - Batam</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="footer-container">
            <div class="footer-top">
                <div class="footer-brand">
                    <h3>PT. Berkah Alam Tabantang</h3>
                    <p>Solusi Terpercaya untuk Konstruksi & Infrastruktur di Batam</p>
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

            <div class="footer-bottom">
                <p>Copyright © PT Berkah Alam Tabantang (BAT). All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <div id="newsModal" class="modal">
        <div class="modal-content">
            <span class="modal-close" onclick="closeNewsModal()">&times;</span>
            <div class="modal-date" id="modalDate"></div>
            <h2 class="modal-title" id="modalTitle"></h2>
            <div class="modal-image" id="modalImage"></div>
            <div class="modal-body" id="modalBody"></div>
        </div>
    </div>

    <div id="loginModal" class="login-modal">
        <div class="login-modal-content">
            <span class="login-modal-close" onclick="closeLoginModal()">&times;</span>
            <h2>LOGIN</h2>
            <form id="loginForm" onsubmit="handleLogin(event)">
                <div class="login-input-group">
                    <label>Username</label>
                    <input type="text" id="username" placeholder="Masukkan username" required>
                </div>
                <div class="login-input-group">
                    <label>Password</label>
                    <input type="password" id="password" placeholder="Masukkan password" required>
                </div>
                <button type="submit" class="login-btn">LOGIN</button>
            </form>
        </div>
    </div>

    <script>
        const newsData = {
            1: {
                date: "20 Februari 2026",
                title: "Peran PT BAT dalam Mendukung Mega Proyek Opus Bay Batam",
                image: "{{ asset('images/berita_1(opus by).jpg') }}",
                content: "<p>Menjadi bagian dari proyek sebesar Opus Bay adalah bukti nyata kepercayaan industri terhadap PT Berkah Alam Tabantang. Dalam proyek ini, tim kami fokus pada pengembangan infrastruktur dasar yang presisi. Kami memahami bahwa proyek skala internasional membutuhkan koordinasi tim yang solid dan ketepatan teknis.</p><p>Melalui pendekatan kolaboratif, PT BAT memastikan setiap tahapan konstruksi, mulai dari pemantangan lahan hingga infrastruktur pendukung, dikerjakan sesuai spesifikasi dan deadline yang ketat demi mendukung kemajuan properti di Batam.</p>"
            },
            2: {
                date: "3 Desember 2025",
                title: "Mengapa Infrastruktur Jalan yang Baik Sangat Penting bagi Hunian Mewah?",
                image: "{{ asset('images/berita_2.jpg') }}",
                content: "<p>Dalam pembangunan hunian mewah, akses jalan adalah impresi pertama bagi penghuni. Mengacu pada standar SI003, PT BAT menerapkan teknik pengaspalan dan fondasi jalan yang mampu menahan beban berat tanpa mengabaikan kerapian visual.</p><p>Jalan yang dibangun dengan drainase yang tepat dan material berkualitas tinggi tidak hanya bertahan lama, tetapi juga secara signifikan meningkatkan nilai jual investasi properti tersebut.</p>"
            },
            3: {
                date: "24 Juni 2025",
                title: "Kontribusi Infrastruktur Terhadap Pertumbuhan Ekonomi di Kota Batam",
                image: "{{ asset('images/berita_3.jpg') }}",
                content: "<p>Transformasi Batam menuju Kota Mandiri membuka peluang besar bagi industri konstruksi lokal. Sebagai perusahaan yang berbasis di Batam, PT Berkah Alam Tabantang tidak hanya ingin menjadi penonton, tetapi penggerak perubahan.</p><p>Kami terus berinvestasi pada teknologi konstruksi terbaru untuk menyemai standar global. Dengan pemahaman mendalam tentang lanskap kota dan komitmen pada kualitas, PT BAT siap bermitra dalam pembangunan investasi strategis.</p>"
            },
            4: {
                date: "14 Mei 2025",
                title: "Mengapa Keamanan Adalah Prioritas Utama dalam Setiap Proyek Kami?",
                image: "{{ asset('images/berita_4.jpg') }}",
                content: "<p>Bagi PT Berkah Alam Tabantang, keselamatan kerja bukan sekadar aturan, melainkan budaya. Di proyek skala besar, risiko kecelakaan kerja selalu ada, itulah sebabnya kami menerapkan protokol APD lengkap, safety briefing harian, dan pengawasan ketat oleh ahli K3 di lapangan.</p><p>Kami percaya bahwa lingkungan kerja yang aman akan melahirkan produktivitas maksimal dan hasil bangunan yang berkualitas.</p>"
            }
        };

        function openNewsModal(id) {
            const news = newsData[id];
            if (news) {
                document.getElementById('modalDate').innerHTML = news.date;
                document.getElementById('modalTitle').innerHTML = news.title;
                document.getElementById('modalImage').innerHTML = '<img src="' + news.image + '" alt="' + news.title + '" style="width:100%; border-radius:15px;">';
                document.getElementById('modalBody').innerHTML = news.content;
                document.getElementById('newsModal').style.display = 'flex';
                document.body.style.overflow = 'hidden';
            }
        }

        function closeNewsModal() {
            document.getElementById('newsModal').style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        function openLoginModal() {
            document.getElementById('loginModal').style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }

        function closeLoginModal() {
            document.getElementById('loginModal').style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        function handleLogin(event) {
            event.preventDefault();
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;

            // Contoh validasi sederhana - ganti dengan validasi sesuai kebutuhan
            if (username === 'admin' && password === 'admin123') {
                alert('Login berhasil! Selamat datang di halaman admin.');
                // Redirect ke halaman admin
                // window.location.href = '/admin';
                closeLoginModal();
            } else {
                alert('Username atau password salah!');
            }
        }

        window.onclick = function(event) {
            const modal = document.getElementById('newsModal');
            const loginModal = document.getElementById('loginModal');
            if (event.target == modal) {
                closeNewsModal();
            }
            if (event.target == loginModal) {
                closeLoginModal();
            }
        }
    </script>

</body>
</html>
