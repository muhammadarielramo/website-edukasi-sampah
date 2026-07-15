@extends('layouts.public')

@section('title', 'Aturan Negara - DigiHejo')

@push('styles')
<style>
    .hukum2-page {
        font-family: 'Inter', sans-serif;
        background-color: #ffffff;
        overflow-x: hidden;
    }

    .hero-hukum2-wrapper {
        position: relative;
        width: 100%;
        background-color: #f4fdf4;
        overflow: hidden;
    }

    .hero-hukum2-bg {
        width: 100%;
        height: auto;
        display: block;
    }

    .cards2-section {
        padding: 40px 0 80px 0;
        background-color: #ffffff;
    }

    .card2-container {
        border: 1px solid #d1d5db;
        border-radius: 20px;
        overflow: hidden;
        height: 100%;
        display: flex;
        flex-direction: column;
        background-color: #ffffff;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    }

    .card2-body {
        padding: 30px 20px 0 20px;
        flex: 1;
    }

    .card2-img {
        width: 100%;
        height: auto;
        display: block;
        object-fit: cover;
    }

    .badge-number {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 35px;
        height: 35px;
        border-radius: 50%;
        color: white;
        font-weight: 800;
        font-size: 1.2rem;
        margin-right: 15px;
        flex-shrink: 0;
    }

    .bg-green-1 { background-color: #4ade80; }
    .bg-blue-1 { background-color: #2563eb; }
    .bg-green-2 { background-color: #166534; }

    .card2-header-title {
        display: flex;
        align-items: flex-start;
        margin-bottom: 20px;
    }

    .card2-title-text {
        font-weight: 800;
        font-size: 1.15rem;
        margin: 0;
        line-height: 1.4;
    }

    .text-green-1 { color: #166534; }
    .text-blue-1 { color: #2563eb; }
    .text-green-2 { color: #14532d; }

    .card2-desc {
        font-weight: 600;
        font-size: 0.95rem;
        color: #374151;
        margin-bottom: 20px;
        line-height: 1.5;
    }

    /* Specific box styles */
    .box-artinya {
        background-color: #dcfce7;
        border-radius: 15px;
        padding: 20px;
        position: relative;
        margin-top: 30px;
        margin-bottom: 20px;
    }

    .badge-artinya {
        background-color: #4ade80;
        color: #14532d;
        font-weight: 800;
        padding: 5px 15px;
        border-radius: 20px;
        position: absolute;
        top: -15px;
        left: 20px;
        font-size: 0.9rem;
    }

    .box-artinya p {
        margin: 0;
        font-weight: 600;
        font-size: 0.95rem;
        color: #166534;
        line-height: 1.5;
    }

    .box-blue-outline {
        border: 2px solid #bfdbfe;
        background-color: #eff6ff;
        border-radius: 15px;
        padding: 20px 15px;
        margin-bottom: 20px;
    }

    .box-green-bg {
        background-color: #dcfce7;
        border-radius: 15px;
        padding: 20px 15px;
        margin-bottom: 20px;
    }

    .list-icons {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .list-icons li {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 12px;
        font-weight: 700;
        font-size: 0.9rem;
        color: #1f2937;
        line-height: 1.4;
    }

    .list-icons li:last-child {
        margin-bottom: 0;
    }

    .list-icons img {
        width: 30px;
        height: 30px;
        object-fit: contain;
        flex-shrink: 0;
    }

    .pagination-hukum {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-bottom: 40px;
    }

    .btn-hukum-nav {
        background-color: #166534;
        color: white;
        font-weight: 700;
        padding: 10px 25px;
        border-radius: 30px;
        text-decoration: none;
        transition: background-color 0.3s;
    }

    .btn-hukum-nav:hover {
        background-color: #14532d;
        color: white;
    }
</style>
@endpush

@section('content')
<div class="hukum2-page">
    <!-- Hero Banner -->
    <div class="hero-hukum2-wrapper">
        <img src="{{ asset('images/aset1hukum1.png') }}" class="hero-hukum2-bg" alt="Aturan Negara Background">
    </div>

    <!-- Cards Section -->
    <div class="cards2-section">
        <div class="container-fluid px-4 px-lg-5">
            <div class="row g-4 justify-content-center">
                <!-- Card 1 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card2-container">
                        <div class="card2-body">
                            <div class="card2-header-title">
                                <span class="badge-number bg-green-2">1</span>
                                <h3 class="card2-title-text text-green-1">UUD Negara Republik<br>Indonesia Tahun 1945 Pasal<br>28H Ayat(1)</h3>
                            </div>
                            
                            <div class="box-artinya">
                                <span class="badge-artinya">Artinya untuk adik-adik:</span>
                                <p>Setiap anak berhak bermain, belajar, dan tinggal di tempat yang bersih, nyaman, dan tidak penuh sampah. Karena itu, kita juga harus ikut menjaga kebersihan lingkungan.</p>
                            </div>
                        </div>
                        <img src="{{ asset('images/aset2hukum1.png') }}" alt="Ilustrasi Anak Bermain" class="card2-img mt-auto">
                    </div>
                </div>
                
                <!-- Card 2 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card2-container">
                        <div class="card2-body">
                            <div class="card2-header-title">
                                <span class="badge-number bg-blue-1">2</span>
                                <h3 class="card2-title-text text-blue-1">Undang-Undang Nomor 18<br>Tahun 2008 tentang<br>Pengelolaan Sampah</h3>
                            </div>
                            <p class="card2-desc">
                                Undang-undang ini mengajarkan bahwa sampah harus dikelola dengan baik agar tidak merusak lingkungan.
                            </p>
                            
                            <div class="box-blue-outline">
                                <ul class="list-icons">
                                    <li><img src="{{ asset('images/aset5hukum1.PNG') }}" alt="icon"> Mengurangi jumlah sampah.</li>
                                    <li><img src="{{ asset('images/aset6hukum1.PNG') }}" alt="icon"> Memilih sampah sesuai jenisnya.</li>
                                    <li><img src="{{ asset('images/aset7hukum1.PNG') }}" alt="icon"> Mengumpulkan sampah di tempat yang benar.</li>
                                    <li><img src="{{ asset('images/aset8hukum1.PNG') }}" alt="icon"> Mendaur ulang sampah yang masih bisa digunakan.</li>
                                </ul>
                            </div>
                        </div>
                        <img src="{{ asset('images/aset3hukum1.png') }}" alt="Ilustrasi Anak Membuang Sampah" class="card2-img mt-auto">
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card2-container">
                        <div class="card2-body">
                            <div class="card2-header-title">
                                <span class="badge-number bg-green-2">3</span>
                                <h3 class="card2-title-text text-green-2">Undang-Undang Nomor 32<br>Tahun 2009 tentang<br>Perlindungan dan<br>Pengelolaan Lingkungan Hidup</h3>
                            </div>
                            <p class="card2-desc">
                                Undang-undang ini adalah aturan utama tentang cara menjaga lingkungan.
                            </p>
                            
                            <div class="box-green-bg">
                                <ul class="list-icons">
                                    <li><img src="{{ asset('images/aset9hukum1.PNG') }}" alt="icon"> Menjaga agar lingkungan tetap bersih dan tidak rusak.</li>
                                    <li><img src="{{ asset('images/aset10hukum1.PNG') }}" alt="icon"> Melindungi kesehatan manusia.</li>
                                    <li><img src="{{ asset('images/aset5hukum1.PNG') }}" alt="icon"> Menjaga tumbuhan, hewan, dan alam agar tetap lestari.</li>
                                </ul>
                            </div>
                        </div>
                        <img src="{{ asset('images/aset4hukum1.png') }}" alt="Ilustrasi Alam" class="card2-img mt-auto">
                    </div>
                </div>
            </div>
            
            <!-- Navigation -->
            <div class="pagination-hukum mt-5">
                <a href="{{ route('hukum') }}" class="btn-hukum-nav"><i class="bi bi-arrow-left"></i> Sebelumnya</a>
                <!-- Link to page 3 could be added here later -->
            </div>
        </div>
    </div>
</div>
@endsection
