<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SDN Kondangjaya II - Website Edukasi Pengelolaan Sampah')</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logosdnkondangjaya2.png') }}">
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Navbar Styling */
        .navbar {
            padding: 15px 0;
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            z-index: 1000;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logos-container {
            display: flex;
            align-items: center;
            gap: 0px;
        }

        .logo-tutwuri {
            height: 42px;
            object-fit: contain;
        }

        .logo-sdn {
            height: 55px;
            object-fit: contain;
        }

        .brand-text-container {
            display: flex;
            flex-direction: column;
        }

        .brand-title {
            font-size: 1.25rem;
            font-weight: 800;
            color: #0b4b8a;
            margin: 0;
            line-height: 1.2;
        }

        .brand-subtitle {
            font-size: 0.85rem;
            color: #4a5568;
            margin: 0;
        }

        .nav-link {
            font-weight: 500;
            color: #1f2937 !important;
            padding: 8px 16px !important;
            transition: color 0.3s;
        }

        .nav-link:hover, .nav-link.active {
            color: #2b6cb0 !important;
        }

        .nav-item.active-item {
            border-bottom: 3px solid #2b6cb0;
        }

        .btn-login {
            background-color: #eab308;
            color: #ffffff;
            font-weight: 600;
            padding: 8px 24px;
            border-radius: 50px;
            border: none;
            transition: background-color 0.3s;
        }

        .btn-login:hover {
            background-color: #ca8a04;
            color: #ffffff;
        }

        @media (max-width: 991.98px) {
            .brand-title {
                font-size: 1rem;
            }
            .brand-subtitle {
                font-size: 0.75rem;
            }
            .navbar-collapse {
                background: white;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 4px 12px rgba(0,0,0,0.1);
                margin-top: 15px;
            }
        }
        
        .custom-footer {
            background: linear-gradient(to right, #33A12D, #376132);
            color: #ffffff;
        }

        .footer-links a, .footer-socials a {
            color: #e2e8f0;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-links a:hover, .footer-socials a:hover {
            color: #ffffff;
            text-decoration: underline;
        }

        .footer-socials i {
            font-size: 1.2rem;
            margin-right: 8px;
        }

        .footer-title {
            font-weight: 700;
            font-size: 1.1rem;
            margin-bottom: 1rem;
            color: #eab308; /* Yellow accent */
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        main {
            flex: 1;
        }
    </style>
    @stack('styles')
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container-fluid px-4 px-lg-5">
            <a class="navbar-brand" href="{{ url('/') }}">
                <div class="logos-container">
                    <img src="{{ asset('images/logotutwurihandayani.png') }}" alt="Tut Wuri Handayani" class="logo-tutwuri">
                    <img src="{{ asset('images/logosdnkondangjaya2.png') }}" alt="SDN Kondangjaya 2" class="logo-sdn">
                </div>
                <div class="brand-text-container">
                    <h1 class="brand-title">SDN Kondangjaya II</h1>
                    <p class="brand-subtitle">Kurangi Sampah, Selamatkan Masa Depan</p>
                </div>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
                <ul class="navbar-nav align-items-center mb-2 mb-lg-0 gap-3">
                    <li class="nav-item {{ request()->is('/') ? 'active-item' : '' }}">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Beranda</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMateri" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Materi
                        </a>
                        <ul class="dropdown-menu shadow border-0" aria-labelledby="navbarDropdownMateri">
                            <li><a class="dropdown-item" href="{{ route('belajar-sampah') }}">Belajar Sampah</a></li>
                            <li><a class="dropdown-item" href="{{ route('belajar-3r') }}">Belajar 3R</a></li>
                            <li><a class="dropdown-item" href="{{ route('hukum') }}">Hukum</a></li>
                            <li><a class="dropdown-item" href="{{ route('video-edukasi') }}">Video Edukasi</a></li>
                            <li><a class="dropdown-item" href="{{ route('kuis') }}">Kuis</a></li>
                        </ul>
                    </li>
                    <li class="nav-item {{ request()->is('artikel*') ? 'active-item' : '' }}">
                        <a class="nav-link {{ request()->is('artikel*') ? 'active' : '' }}" href="{{ route('artikel.index') }}">Artikel</a>
                    </li>
                    <li class="nav-item {{ request()->is('tentang-kami') ? 'active-item' : '' }}">
                        <a class="nav-link {{ request()->is('tentang-kami') ? 'active' : '' }}" href="{{ route('tentang-kami') }}">Tentang Kami</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="custom-footer pt-5 pb-3 mt-auto text-start">
        <div class="container">
            <div class="row mb-4">
                <!-- Col 1: Logo, Deskripsi, & Alamat -->
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <img src="{{ asset('images/logosdnkondangjaya2.png') }}" alt="SDN Kondangjaya 2" style="height: 50px; object-fit: contain;">
                        <h5 class="fw-bold mb-0">SDN Kondangjaya II</h5>
                    </div>
                    <p class="mb-4" style="color: #e2e8f0; font-size: 0.95rem;">Edukasi Sampah SDN Kondangjaya II. Kurangi Sampah, Selamatkan Masa Depan.</p>
                    
                    <h5 class="footer-title">Alamat</h5>
                    <p class="mb-3" style="color: #e2e8f0; font-size: 0.95rem; line-height: 1.6;">
                        Bendasari, Desa Kondangjaya, Kec. Karawang Timur, Kab. Karawang, Prov. Jawa Barat.
                    </p>
                    <p class="mb-0" style="color: #e2e8f0; font-size: 0.95rem;">
                        <i class="bi bi-envelope-fill text-warning me-2"></i>kondangjaya2krw@gmail.com
                    </p>
                </div>

                <!-- Col 2: Menu Cepat -->
                <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
                    <h5 class="footer-title">Menu Cepat</h5>
                    <ul class="list-unstyled footer-links" style="line-height: 2;">
                        <li><a href="{{ url('/') }}">Beranda</a></li>
                        <li><a href="{{ route('belajar-sampah') }}">Belajar Sampah</a></li>
                        <li><a href="{{ route('belajar-3r') }}">Belajar 3R</a></li>
                        <li><a href="{{ route('hukum') }}">Hukum</a></li>
                        <li><a href="{{ route('video-edukasi') }}">Video Edukasi</a></li>
                        <li><a href="{{ route('kuis') }}">Kuis</a></li>
                    </ul>
                </div>

                <!-- Col 3: Media Sosial -->
                <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
                    <h5 class="footer-title">Media Sosial</h5>
                    <ul class="list-unstyled footer-socials" style="line-height: 2;">
                        <li>
                            <a href="https://www.instagram.com/sdnkondangjaya2official/" target="_blank" class="d-flex align-items-center">
                                <i class="bi bi-instagram"></i> Instagram
                            </a>
                        </li>
                        <li>
                            <a href="https://youtube.com/@sdnkojalingeur2?si=j4HuoZzcPHZBmccj" target="_blank" class="d-flex align-items-center">
                                <i class="bi bi-youtube"></i> YouTube
                            </a>
                        </li>
                        <li>
                            <a href="https://www.tiktok.com/@sdnkoja2?_r=1&_t=ZS-97xQP9W0qH3" target="_blank" class="d-flex align-items-center">
                                <i class="bi bi-tiktok"></i> TikTok
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Col 4: Map -->
                <div class="col-lg-4 col-md-6">
                    <h5 class="footer-title">Lokasi Kami</h5>
                    <div style="border-radius: 10px; overflow: hidden; border: 2px solid #eab308; background: #fff;">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3588.606487263019!2d107.32964477453248!3d-6.324082561881269!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e697654a29eda6b%3A0x4030990ad90512fa!2sSDN%20Kondangjaya%20II!5e1!3m2!1sid!2sid!4v1783941255392!5m2!1sid!2sid" width="100%" height="220" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
                    </div>
                </div>
            </div>

            <hr style="border-color: rgba(255,255,255,0.2); margin-top: 2rem; margin-bottom: 1.5rem;">
            
            <div class="text-center">
                <p class="mb-0" style="color: #e2e8f0; font-size: 0.9rem;">&copy; 2026 SDN Kondangjaya II. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5.3 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
