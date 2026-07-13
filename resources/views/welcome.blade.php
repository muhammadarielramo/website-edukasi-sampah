<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sampah Pintar - Media Edukasi Pengelolaan Sampah SDN Kondangjaya II</title>
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
            height: 42px; /* Dikecilkan sedikit karena rasio aslinya memanjang */
            object-fit: contain;
        }

        .logo-sdn {
            height: 55px; /* Dibesarkan sedikit karena rasio aslinya persegi/kotak */
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

        /* Hero Section Styling */
        .hero-section {
            position: relative;
            height: calc(100vh - 86px); /* Adjust based on navbar height */
            min-height: 600px;
            display: flex;
            align-items: center;
            background-image: url('{{ asset('images/backgroundlandingpage.jpeg') }}');
            background-size: cover;
            background-position: center bottom;
            background-repeat: no-repeat;
        }

        /* Gradient Overlay to make text readable */
        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to right, rgba(255,255,255,0.9) 0%, rgba(255,255,255,0.6) 40%, rgba(255,255,255,0) 70%);
            z-index: 1;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 650px;
            padding-left: 5%;
        }

        .hero-title {
            font-size: 3rem;
            font-weight: 800;
            color: #1f2937;
            line-height: 1.2;
            margin-bottom: 20px;
        }

        .text-green {
            color: #22c55e;
        }

        .hero-description {
            font-size: 1.1rem;
            color: #4b5563;
            line-height: 1.6;
            margin-bottom: 30px;
            font-weight: 500;
        }

        .btn-learn-more {
            background-color: #3b82f6;
            color: #ffffff;
            font-weight: 600;
            font-size: 1.1rem;
            padding: 12px 32px;
            border-radius: 50px;
            border: none;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
        }
        
        .btn-learn-more.green-btn {
            background-color: #1a4d2e;
            color: #ffffff;
            border: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .btn-learn-more.green-btn:hover {
            transform: translateY(-2px);
            background-color: #11331e;
            color: #ffffff;
        }

        .btn-watch-video {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            color: #1a4d2e;
            font-weight: 700;
            font-size: 1.1rem;
            padding: 10px 28px;
            border: 2px solid #1a4d2e;
            border-radius: 50px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-watch-video i {
            font-size: 1.8rem;
            line-height: 1;
        }

        .btn-watch-video:hover {
            color: #11331e;
            transform: translateY(-2px);
        }

        @media (max-width: 991.98px) {
            .hero-section {
                height: auto;
                padding: 100px 0;
            }
            .hero-overlay {
                background: rgba(255, 255, 255, 0.85);
            }
            .hero-content {
                padding: 0 20px;
                text-align: center;
                margin: 0 auto;
            }
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
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container-fluid px-4 px-lg-5">
            <a class="navbar-brand" href="#">
                <div class="logos-container">
                    <img src="{{ asset('images/logotutwurihandayani.png') }}" alt="Tut Wuri Handayani" class="logo-tutwuri">
                    <img src="{{ asset('images/logosdnkondangjaya2.png') }}" alt="SDN Kondangjaya 2" class="logo-sdn">
                </div>
                <div class="brand-text-container">
                    <h1 class="brand-title">SDN Kondangjaya II</h1>
                    <p class="brand-subtitle">Kurangi Sampah, Selamatkan Masa Depan</p>
                </div>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
                <ul class="navbar-nav align-items-center mb-2 mb-lg-0 gap-3">
                    <li class="nav-item active-item">
                        <a class="nav-link active" href="#">Beranda</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMateri" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Materi
                        </a>
                        <ul class="dropdown-menu shadow border-0" aria-labelledby="navbarDropdownMateri">
                            <li><a class="dropdown-item" href="{{ route('belajar-sampah') }}">Belajar Sampah</a></li>
                            <li><a class="dropdown-item" href="{{ route('belajar-3r') }}">Belajar 3R</a></li>
                            <li><a class="dropdown-item" href="#video-edukasi">Video Edukasi</a></li>
                            <li><a class="dropdown-item" href="#kuis">Kuis</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('artikel.index') }}">Artikel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tentang-kami') }}">Tentang Kami</a>
                    </li>
                    <li class="nav-item ms-lg-3">
                        <a href="/login" class="btn btn-login px-4">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-overlay"></div>
        <div class="container-fluid position-relative h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 col-lg-7">
                    <div class="hero-content">
                        <h1 class="hero-title">
                            Wujudkan Lingkungan Bersih<br>
                            <span class="text-green">Melalui Budaya 3R<br>Bersama Kita</span>
                        </h1>
                        <p class="hero-description">
                            Belajar, peduli, dan bertindak bersama untuk menciptakan lingkungan yang lebih bersih dan berkelanjutan melalui penerapan prinsip Reduce, Reuse, dan Recycle. Mulai langkah kecil hari ini untuk memberikan dampak besar bagi bumi.
                        </p>
                        <div class="d-flex align-items-center gap-4 mt-2">
                            <a href="#belajar" class="btn-learn-more green-btn">Mulai Belajar</a>
                            <a href="{{ route('belajar-sampah') }}" class="btn-watch-video">
                                <i class="bi bi-play-circle"></i> Tonton Video
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Hukum Section -->
    <section class="py-5 bg-white position-relative" style="overflow: hidden;">
        <div class="container py-5">
            <h2 class="text-center fw-bold mb-5" style="color: #3f8843; font-size: 2.2rem; letter-spacing: 1px;">HUKUM</h2>
            
            <div class="row align-items-center mb-4">
                <div class="col-md-5 mb-4 mb-md-0 text-center">
                    <div class="d-inline-block p-1 bg-white">
                        <img src="{{ asset('images/aset1hukum.png') }}" alt="Ilustrasi Dokumen Hukum" class="img-fluid" style="max-height: 250px; object-fit: contain;">
                    </div>
                </div>
                
                <!-- Right Text -->
                <div class="col-md-7">
                    <p class="fs-5 fw-semibold text-md-end text-center" style="color: #435c45; line-height: 1.8;">
                        Di Indonesia ada aturan yang mengatur tentang<br class="d-none d-md-block">
                        pengelolaan sampah. Yaitu Undang-Undang Nomor 18<br class="d-none d-md-block">
                        Tahun 2008 tentang Pengelolaan Sampah. Undang-<br class="d-none d-md-block">
                        undang ini mengajarkan bahwa sampah harus dikelola<br class="d-none d-md-block">
                        dengan baik agar tidak merusak lingkungan. "Kalau di<br class="d-none d-md-block">
                        sekolah ada tata tertib, maka negara juga punya aturan<br class="d-none d-md-block">
                        supaya lingkungan tetap bersih."
                    </p>
                </div>
            </div>
            
            <!-- Bottom Right Image -->
            <div class="d-flex justify-content-end mt-2 position-relative" style="z-index: 2;">
                <img src="{{ asset('images/aset2hukum.png') }}" alt="Ilustrasi Tong Sampah" class="img-fluid" style="max-height: 200px; transform: translateX(20px);">
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="custom-footer text-center py-3 mt-auto">
        <div class="container">
            <p class="mb-0">&copy; 2026 Website Edukasi Pengelolaan Sampah SDN Kondangjaya II. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap 5.3 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
