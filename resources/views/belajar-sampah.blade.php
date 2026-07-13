@extends('layouts.public')

@section('title', 'Belajar Sampah - Sampah Pintar')

@push('styles')
<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<style>
    /* Styling for Belajar Sampah Page */
    .hero-belajar {
        background-color: #ffffff;
        min-height: calc(100vh - 80px); /* adjust based on navbar */
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        padding: 50px 0;
    }

    .hero-title {
        color: #2e602f;
        font-weight: 800;
        font-size: 2.8rem;
        margin-bottom: 20px;
    }

    .hero-desc {
        color: #4b5563;
        font-size: 1.1rem;
        line-height: 1.6;
        margin-bottom: 40px;
    }

    .feature-item {
        display: flex;
        align-items: flex-start;
        gap: 15px;
        flex: 1;
        min-width: 200px;
    }

    .feature-icon-wrapper {
        background-color: #eaf1e8;
        color: #2e602f;
        width: 45px;
        height: 45px;
        min-width: 45px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
    }

    .feature-title {
        color: #2e602f;
        font-weight: 700;
        font-size: 1rem;
        margin-bottom: 5px;
    }

    .feature-text {
        color: #6b7280;
        font-size: 0.85rem;
        margin-bottom: 0;
    }

    .btn-lihat-video {
        background-color: #2e602f;
        color: white;
        border-radius: 50px;
        padding: 12px 30px;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        transition: background-color 0.3s;
    }

    .btn-lihat-video:hover {
        background-color: #1f4220;
        color: white;
    }

    .video-wrapper {
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        border: 8px solid white;
        position: relative;
        z-index: 2;
    }

    .video-wrapper video {
        width: 100%;
        display: block;
        border-radius: 12px;
    }

    .leaf-decoration-left {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 350px;
        max-width: 40%;
        z-index: 1;
        pointer-events: none;
    }

    .leaf-decoration-right {
        position: absolute;
        bottom: 0;
        right: 0;
        width: 350px;
        max-width: 40%;
        z-index: 1;
        pointer-events: none;
    }

    /* Retain previous styles for other sections */
    .belajar-sampah-page {
        background-image: url('{{ asset('images/backgroundbelajarsampah.png') }}');
        background-size: cover;
        background-position: center top;
        background-attachment: fixed;
        padding-top: 60px;
        position: relative;
    }

    .main-title {
        color: #2e602f;
        font-weight: 800;
        font-size: 2.5rem;
        margin-bottom: 10px;
        text-shadow: 1px 1px 2px rgba(255,255,255,0.8);
    }

    .main-subtitle {
        color: #2e602f;
        font-weight: 600;
        font-size: 1.1rem;
        max-width: 700px;
        margin: 0 auto 50px auto;
        text-shadow: 1px 1px 2px rgba(255,255,255,0.8);
    }

    /* Cards for Jenis Sampah */
    .jenis-card {
        background-color: #ffffff;
        border-radius: 20px;
        padding: 30px 25px;
        height: 100%;
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        transition: transform 0.3s ease;
    }

    .jenis-card:hover {
        transform: translateY(-5px);
    }

    .card-organik {
        /* Removed blue border */
    }

    .jenis-title {
        font-weight: 800;
        font-size: 1.5rem;
        color: #2e602f;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .jenis-desc {
        color: #4b5563;
        font-weight: 600;
        font-size: 0.95rem;
        margin-bottom: 20px;
        text-align: center;
        min-height: 45px;
    }

    .jenis-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .jenis-list li {
        color: #374151;
        font-weight: 600;
        font-size: 0.95rem;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    /* Bottom Section */
    .mengapa-section {
        background-color: #ffffff;
        border-top-left-radius: 40px;
        border-top-right-radius: 40px;
        padding: 60px 0;
        box-shadow: 0 -10px 30px rgba(0,0,0,0.1);
        position: relative;
        z-index: 2;
    }

    .mengapa-title {
        color: #2e602f;
        font-weight: 800;
        font-size: 2rem;
        text-align: center;
        margin-bottom: 40px;
    }

    .alasan-card {
        background-color: #ffffff;
        border-radius: 20px;
        padding: 25px;
        height: 100%;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        border: 1px solid #f3f4f6;
        display: flex;
        align-items: flex-start;
        gap: 20px;
        transition: box-shadow 0.3s ease;
    }

    .alasan-card:hover {
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    }

    .alasan-icon {
        width: 60px;
        height: 60px;
        min-width: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
    }

    .bg-icon-green { background-color: #dcfce7; color: #16a34a; }
    .bg-icon-blue { background-color: #dbeafe; color: #2563eb; }

    .alasan-title {
        font-weight: 800;
        color: #2e602f;
        font-size: 1.1rem;
        margin-bottom: 5px;
    }

    .alasan-desc {
        color: #4b5563;
        font-size: 0.85rem;
        line-height: 1.5;
        font-weight: 500;
        margin-bottom: 0;
    }

    @media (max-width: 991.98px) {
        .hero-title {
            font-size: 2rem;
        }
        .hero-belajar {
            padding: 40px 0;
        }
        .leaf-decoration-left, .leaf-decoration-right {
            width: 200px;
            opacity: 0.5;
        }
    }
</style>
@endpush

@section('content')

<!-- Hero Section -->
<section class="hero-belajar">
    <img src="{{ asset('images/aset1belajarsampah.png') }}" alt="Decoration Left" class="leaf-decoration-left">
    <img src="{{ asset('images/aset2belajarsampah.png') }}" alt="Decoration Right" class="leaf-decoration-right">

    <div class="container position-relative" style="z-index: 2;">
        <div class="row align-items-center">
            <!-- Text Content -->
            <div class="col-lg-6 mb-5 mb-lg-0">
                <h1 class="hero-title">
                    Belajar Seru Tentang Sampah ! 🌿
                </h1>
                <p class="hero-desc">
                    Yuk tonton video edukasi untuk mengenal jenis-jenis sampah, cara memilah, dan mengelola sampah dengan benar. Belajar jadi lebih mudah dan menyenangkan
                </p>

                <div class="d-flex flex-wrap gap-4 mb-5">
                    <!-- Feature 1 -->
                    <div class="feature-item">
                        <div class="feature-icon-wrapper">
                            <i class="bi bi-play-btn"></i>
                        </div>
                        <div>
                            <h5 class="feature-title">Mudah Dipahami</h5>
                            <p class="feature-text">Penjelasan Sederhana untuk semua umur</p>
                        </div>
                    </div>
                    
                    <!-- Feature 2 -->
                    <div class="feature-item">
                        <div class="feature-icon-wrapper">
                            <i class="bi bi-flower1"></i> <!-- using a generic plant icon -->
                        </div>
                        <div>
                            <h5 class="feature-title">Animasi Menarik</h5>
                            <p class="feature-text">Visual lucu dan berwarna agar tidak membosankan</p>
                        </div>
                    </div>

                    <!-- Feature 3 -->
                    <div class="feature-item">
                        <div class="feature-icon-wrapper">
                            <i class="bi bi-lightbulb"></i>
                        </div>
                        <div>
                            <h5 class="feature-title">Tips Praktis</h5>
                            <p class="feature-text">Tips praktis untuk lingkungan bersih</p>
                        </div>
                    </div>
                </div>

                <a href="#video-materi" class="btn-lihat-video">
                    Lihat Semua Video <i class="bi bi-chevron-right"></i>
                </a>
            </div>

            <!-- Video Content -->
            <div class="col-lg-6">
                <div class="video-wrapper">
                    <video controls id="video-materi">
                        <source src="{{ asset('images/videoedukasi.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Content after hero -->
<div class="belajar-sampah-page">
    <div class="container text-center mb-5 pb-5">
        <h2 class="main-title">Apa Itu Sampah?</h2>
        <p class="main-subtitle">
            Sampah adalah barang yang sudah tidak digunakan lagi. Buanglah sampah pada tempatnya agar lingkungan tetap bersih.
        </p>

        <div class="row g-4 justify-content-center mt-2">
            <!-- Organik -->
            <div class="col-md-6 col-lg-4">
                <div class="jenis-card card-organik">
                    <h3 class="jenis-title">
                        <i class="bi bi-tree-fill" style="color: #4ade80;"></i> Organik
                    </h3>
                    <p class="jenis-desc">Mudah membusuk dan bisa dijadikan kompos.</p>
                    <ul class="jenis-list text-start">
                        <li><i class="bi bi-leaf-fill" style="color: #4ade80;"></i> Daun</li>
                        <li><i class="bi bi-apple" style="color: #f59e0b;"></i> kulit buah</li>
                        <li><i class="bi bi-egg-fried" style="color: #4ade80;"></i> sisa makanan.</li>
                    </ul>
                </div>
            </div>

            <!-- Non Organik -->
            <div class="col-md-6 col-lg-4">
                <div class="jenis-card">
                    <h3 class="jenis-title">
                        <i class="bi bi-recycle" style="color: #16a34a;"></i> Non Organik
                    </h3>
                    <p class="jenis-desc">Sulit terurai, tetapi bisa didaur ulang.</p>
                    <ul class="jenis-list text-start">
                        <li><i class="bi bi-cup-straw" style="color: #ef4444;"></i> Botol Plastik</li>
                        <li><i class="bi bi-trash3-fill" style="color: #ef4444;"></i> Kaleng</li>
                        <li><i class="bi bi-droplet-fill" style="color: #d1d5db;"></i> Botol Kaca</li>
                    </ul>
                </div>
            </div>

            <!-- Sampah B3 -->
            <div class="col-md-6 col-lg-4">
                <div class="jenis-card">
                    <h3 class="jenis-title">
                        <i class="bi bi-exclamation-triangle-fill" style="color: #eab308;"></i> Sampah B3
                    </h3>
                    <p class="jenis-desc">Mengandung bahan berbahaya</p>
                    <ul class="jenis-list text-start">
                        <li><i class="bi bi-battery-half" style="color: #22c55e;"></i> Baterai</li>
                        <li><i class="bi bi-lightbulb" style="color: #d1d5db;"></i> Lampu</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Mengapa Peduli Sampah Section -->
    <div class="mengapa-section">
        <div class="container">
            <h2 class="mengapa-title">Mengapa Peduli Sampah?</h2>
            
            <div class="row g-4 justify-content-center">
                <!-- Card 1 -->
                <div class="col-md-6 col-lg-4">
                    <div class="alasan-card">
                        <div class="alasan-icon bg-icon-green">
                            <i class="bi bi-globe-americas"></i>
                        </div>
                        <div>
                            <h4 class="alasan-title">Menjaga Kebersihan</h4>
                            <p class="alasan-desc">Lingkungan bersih membuat kita nyaman belajar dan beraktivitas setiap hari.</p>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-md-6 col-lg-4">
                    <div class="alasan-card">
                        <div class="alasan-icon bg-icon-blue">
                            <i class="bi bi-droplet-fill"></i>
                        </div>
                        <div>
                            <h4 class="alasan-title">Mencegah Banjir</h4>
                            <p class="alasan-desc">Sampah yang menyumbat saluran air bisa menyebabkan banjir.</p>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-md-6 col-lg-4">
                    <div class="alasan-card">
                        <div class="alasan-icon bg-icon-green">
                            <i class="bi bi-tree-fill"></i>
                        </div>
                        <div>
                            <h4 class="alasan-title">Menjaga Alam</h4>
                            <p class="alasan-desc">Alam yang bersih membuat tumbuhan dan hewan tetap sehat dan lestari.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
