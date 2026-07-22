@extends('layouts.public')

@section('title', 'Hukum Menjaga Lingkungan - SDN Kondangjaya II')

@push('styles')
<style>
    .hukum-page {
        font-family: 'Inter', sans-serif;
        background-color: #ffffff;
        overflow-x: hidden;
    }
    
    .hero-hukum-wrapper {
        position: relative;
        width: 100%;
        background-color: #f4fdf4;
        overflow: hidden;
    }

    .hero-hukum-bg {
        width: 100%;
        height: auto;
        display: block;
    }

    .hero-hukum-content {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    .halaman-badge {
        position: absolute;
        top: 4%;
        right: 4%;
        background-color: #ef4444; /* Red badge */
        color: white;
        padding: 0.8vw 1.5vw;
        border-radius: 8px;
        font-weight: 800;
        font-size: 1.2vw;
        z-index: 10;
        text-align: center;
        line-height: 1.2;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }

    .hero-hukum-title {
        color: #1a4d2e;
        font-weight: 900;
        font-size: 3vw;
        margin-bottom: 1vw;
    }

    .hero-hukum-quote {
        color: #16a34a;
        font-weight: 700;
        font-size: 1.2vw;
        width: 80%;
        max-width: 450px;
        line-height: 1.4;
    }



    .cards-section {
        padding: 60px 0;
        background-color: #ffffff;
    }

    .hukum-card {
        background-color: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 20px;
        padding: 30px 20px;
        text-align: center;
        height: 100%;
        transition: transform 0.3s;
        box-shadow: 0 10px 25px rgba(0,0,0,0.05);
    }

    .hukum-card:hover {
        transform: translateY(-5px);
    }

    .card-icon {
        height: 120px;
        object-fit: contain;
        margin-bottom: 20px;
    }

    .card-title-hukum {
        color: #166534;
        font-weight: 800;
        font-size: 1.25rem;
        margin-bottom: 15px;
    }

    .card-text-hukum {
        color: #1f2937;
        font-weight: 600;
        font-size: 1rem;
        line-height: 1.5;
    }

    .checklist-hukum {
        list-style: none;
        padding: 0;
        text-align: left;
        margin-top: 15px;
    }

    .checklist-hukum li {
        margin-bottom: 15px;
        font-weight: 600;
        color: #1f2937;
        display: flex;
        align-items: flex-start;
        gap: 10px;
        font-size: 0.95rem;
    }

    .checklist-hukum li i {
        color: #15803d;
        font-size: 1.3rem;
        margin-top: -3px;
    }

    .bottom-section-wrapper {
        position: relative;
        width: 100%;
        overflow: hidden;
        background-color: #ffffff; 
    }

    .bottom-hukum-bg {
        width: 100%;
        height: auto;
        display: block;
    }
    
    .bottom-kid-left {
        position: absolute;
        bottom: 0;
        left: 18%;
        width: 12%;
        min-width: 90px;
        height: auto;
        z-index: 2;
    }

    .bottom-kid-right {
        position: absolute;
        bottom: 0;
        right: 18%;
        width: 11.2%; /* slightly smaller width based on ratio */
        min-width: 85px;
        height: auto;
        z-index: 2;
    }

    .bottom-hukum-content {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 3;
    }

    .bottom-text {
        color: #000000;
        font-weight: 800;
        font-size: 1.8vw;
        max-width: 40%;
        text-align: center;
        line-height: 1.5;
        margin-top: -3%; /* Pull up slightly to center */
    }

    .bottom-text span {
        color: #166534;
    }

    @media (max-width: 768px) {
        .hero-hukum-title {
            font-size: 4.5vw;
        }
        .hero-hukum-quote {
            font-size: 2.5vw;
            max-width: 70%;
        }
        .halaman-badge {
            font-size: 2.5vw;
            padding: 1.5vw 2.5vw;
            border-radius: 4px;
        }
        .bottom-text {
            font-size: 3vw;
            max-width: 50%;
            margin-top: -2%;
        }
        .bottom-kid-left {
            left: 5%;
            width: 18%;
        }
        .bottom-kid-right {
            right: 5%;
            width: 16.8%;
        }
    }
</style>
@endpush

@section('content')
<div class="hukum-page">
    <!-- Hero Banner -->
    <div class="hero-hukum-wrapper">
        <img src="{{ asset('images/aset2hukum.png') }}" class="hero-hukum-bg" alt="Background Hukum">
        <div class="hero-hukum-content">
            <div class="halaman-badge">
                Halaman<br>1/4
            </div>
            <div class="container h-100 position-relative">
                <div class="row h-100">
                    <div class="col-lg-8 ps-lg-5" style="margin-top: 8%;">
                        <h1 class="hero-hukum-title text-start">Hukum Menjaga Lingkungan</h1>
                        <p class="hero-hukum-quote text-start">
                            "Seperti di sekolah ada tata tertib, Indonesia juga mempunyai aturan agar lingkungan tetap bersih."
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Cards Section -->
    <div class="cards-section">
        <div class="container">
            <div class="row justify-content-center g-4 px-lg-4">
                <!-- Card 1 -->
                <div class="col-md-4">
                    <div class="hukum-card">
                        <img src="{{ asset('images/aset3hukum.png') }}" alt="Apa itu aturan" class="card-icon">
                        <h3 class="card-title-hukum">Apa itu aturan?</h3>
                        <p class="card-text-hukum">
                            Aturan adalah kesepakatan yang harus dipatuhi agar semua orang hidup tertib dan aman
                        </p>
                    </div>
                </div>
                
                <!-- Card 2 -->
                <div class="col-md-4">
                    <div class="hukum-card">
                        <img src="{{ asset('images/aset4hukum.png') }}" alt="Mengapa ada aturan sampah" class="card-icon">
                        <h3 class="card-title-hukum">Mengapa ada aturan sampah?</h3>
                        <p class="card-text-hukum">
                            Supaya lingkungan tetap bersih, sehat, dan nyaman untuk kita semua
                        </p>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-md-4">
                    <div class="hukum-card">
                        <img src="{{ asset('images/aset5hukum.png') }}" alt="Contoh aturan" class="card-icon">
                        <h3 class="card-title-hukum">Contoh aturan di sekolah</h3>
                        <ul class="checklist-hukum">
                            <li><i class="bi bi-check-circle-fill"></i> Buang sampah pada tempatnya.</li>
                            <li><i class="bi bi-check-circle-fill"></i> Tidak merusak tanaman</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Section -->
    <div class="bottom-section-wrapper">
        <img src="{{ asset('images/aset6hukum.png') }}" class="bottom-hukum-bg" alt="Ilustrasi Latar Belakang">
        <img src="{{ asset('images/aset7hukum.png') }}" class="bottom-kid-left" alt="Anak Laki-laki">
        <img src="{{ asset('images/aset8hukum.png') }}" class="bottom-kid-right" alt="Anak Perempuan">
        
        <div class="bottom-hukum-content">
            <h2 class="bottom-text">
                Belajar hukum bukan hanya untuk orang dewasa, tapi juga untuk kita agar menjadi anak yang bertanggung jawab dan <span>peduli lingkungan</span>
            </h2>
        </div>
    </div>

    <!-- Navigation -->
    <div class="container text-center mt-5 mb-5 pb-5">
        <a href="{{ route('hukum2') }}" style="background-color: #166534; color: white; font-weight: 700; padding: 10px 25px; border-radius: 30px; text-decoration: none; transition: background-color 0.3s; display: inline-block;">Halaman Selanjutnya <i class="bi bi-arrow-right"></i></a>
    </div>
</div>
@endsection
