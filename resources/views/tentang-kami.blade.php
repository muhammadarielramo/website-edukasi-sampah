@extends('layouts.public')

@section('title', 'Tentang Kami - SDN Kondangjaya II')

@push('styles')
<style>
    /* Styling for Visi Misi Section */
    .visi-misi-section {
        position: relative;
        background-color: #ffffff;
        padding-top: 60px;
        padding-bottom: 150px; /* space for absolute images */
        overflow: hidden;
    }

    .vm-title {
        color: #2e7d32;
        font-weight: 800;
        font-size: 2rem;
        margin-bottom: 50px;
        text-align: center;
    }

    .vm-heading {
        color: #2e7d32;
        font-weight: 800;
        font-size: 1.8rem;
        margin-bottom: 20px;
    }

    .vm-content-box {
        border-left: 5px solid #1a1a1a;
        padding-left: 20px;
        margin-bottom: 40px;
    }

    .vm-text {
        font-size: 1.05rem;
        color: #333;
        line-height: 1.7;
        font-weight: 500;
    }

    .vm-list {
        padding-left: 20px;
        margin: 0;
    }

    .vm-list li {
        margin-bottom: 8px;
        font-size: 1.05rem;
        color: #333;
        line-height: 1.7;
        font-weight: 500;
    }

    .asset-left {
        position: absolute;
        bottom: 0;
        left: 0;
        max-width: 300px;
        width: 30%;
        z-index: 1;
    }

    .asset-right {
        position: absolute;
        bottom: 0;
        right: 0;
        max-width: 250px;
        width: 25%;
        z-index: 1;
    }

    .content-container {
        position: relative;
        z-index: 2;
    }

    @media (max-width: 768px) {
        .vm-title {
            font-size: 1.5rem;
        }
        .asset-left, .asset-right {
            max-width: 150px;
            opacity: 0.6;
        }
    }
</style>
@endpush

@section('content')

<!-- Tentang Kami Section -->
<section class="py-5" style="background-color: #f8fafc;">
    <div class="container py-4">
        <!-- Main Card -->
        <div class="card shadow-sm mb-5" style="border: 2px solid #e2e8f0; border-radius: 24px;">
            <div class="card-body p-4 p-md-5">
                <div class="text-center mb-5">
                    <h2 class="fw-bold" style="color: #3f8843; display: inline-block; position: relative;">
                        Tentang Kami
                        <span style="position: absolute; bottom: -10px; left: 0; width: 100%; height: 3px; background-color: #3f8843;"></span>
                    </h2>
                </div>
                
                <div class="row align-items-center g-4">
                    <div class="col-lg-5 text-center">
                        <img src="{{ asset('images/tampakdepansekolah.jpg') }}" alt="SDN Kondangjaya II" class="img-fluid shadow-sm" style="width: 100%; height: 260px; object-fit: cover; border-radius: 16px;">
                    </div>
                    <div class="col-lg-7">
                        <p class="fs-6" style="line-height: 1.8; color: #2c3e2e; font-weight: 500;">
                            SDN Kondangjaya II merupakan sekolah dasar negeri yang berada di Desa Kondangjaya, Kecamatan Karawang Timur, Kabupaten Karawang, Provinsi Jawa Barat. Sekolah ini berada di bawah naungan Kementerian Pendidikan Dasar dan Menengah dan berkomitmen memberikan pendidikan yang berkualitas, berkarakter, serta mendukung perkembangan peserta didik secara optimal.
                        </p>
                        <p class="fs-6" style="line-height: 1.8; color: #2c3e2e; font-weight: 500; margin-bottom: 0;">
                            Berlokasi di Bendasari, Desa Kondangjaya, Karawang Timur, SDN Kondangjaya II dan memiliki akreditasi A.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- 4 Info Cards -->
        <div class="row g-3 justify-content-center">
            <!-- Card 1: Sekolah Negeri -->
            <div class="col-md-6 col-lg-3">
                <div class="d-flex align-items-center p-3 h-100" style="background-color: #d1ebd1; border-radius: 20px;">
                    <div class="bg-white rounded-circle d-flex align-items-center justify-content-center me-3 shadow-sm" style="width: 60px; height: 60px; min-width: 60px; overflow: hidden; padding: 5px;">
                        <img src="{{ asset('images/aset1tentangkami.png') }}" style="width: 100%; height: 100%; object-fit: contain;" alt="Sekolah Negeri">
                    </div>
                    <div>
                        <h6 class="fw-bold mb-1 text-dark" style="font-size: 0.95rem;">Sekolah Negeri</h6>
                        <small style="color: #4b5563; font-size: 0.8rem; font-weight: 500;">SDN Kondangjaya II</small>
                    </div>
                </div>
            </div>
            
            <!-- Card 2: Location -->
            <div class="col-md-6 col-lg-3">
                <div class="d-flex align-items-center p-3 h-100" style="background-color: #a4c2f4; border-radius: 20px;">
                    <div class="bg-white rounded-circle d-flex align-items-center justify-content-center me-3 shadow-sm" style="width: 60px; height: 60px; min-width: 60px; overflow: hidden; padding: 5px;">
                        <img src="{{ asset('images/aset2tentangkami.png') }}" style="width: 100%; height: 100%; object-fit: contain;" alt="Lokasi">
                    </div>
                    <div>
                        <h6 class="fw-bold mb-1 text-dark" style="font-size: 0.95rem;">Karawang Timur</h6>
                        <small style="color: #4b5563; font-size: 0.65rem; line-height: 1.3; display: block; font-weight: 500;">Bendasari, Kondangjaya, Kec. Karawang Timur, Kab. Karawang, Jawa Barat.</small>
                    </div>
                </div>
            </div>

            <!-- Card 3: Akreditasi -->
            <div class="col-md-6 col-lg-3">
                <div class="d-flex align-items-center p-3 h-100" style="background-color: #e4c466; border-radius: 20px;">
                    <div class="bg-white rounded-circle d-flex align-items-center justify-content-center me-3 shadow-sm" style="width: 60px; height: 60px; min-width: 60px; overflow: hidden; padding: 5px;">
                        <img src="{{ asset('images/aset3tentangkami.png') }}" style="width: 100%; height: 100%; object-fit: contain;" alt="Akreditasi">
                    </div>
                    <div>
                        <h6 class="fw-bold mb-0 text-white" style="font-size: 1.5rem; text-shadow: 0px 1px 2px rgba(0,0,0,0.1);">A</h6>
                        <small class="text-white fw-bold" style="font-size: 0.85rem;">Akreditasi A</small>
                    </div>
                </div>
            </div>

            <!-- Card 4: 3R -->
            <div class="col-md-6 col-lg-3">
                <div class="d-flex align-items-center p-3 h-100" style="background-color: #d1f2d1; border-radius: 20px;">
                    <div class="bg-white rounded-circle d-flex align-items-center justify-content-center me-3 shadow-sm" style="width: 60px; height: 60px; min-width: 60px; overflow: hidden; padding: 5px;">
                        <img src="{{ asset('images/aset4tentangkami.png') }}" style="width: 100%; height: 100%; object-fit: contain;" alt="3R">
                    </div>
                    <div>
                        <h6 class="fw-bold mb-0" style="font-size: 1.5rem; color: #2e7d32;">3 R</h6>
                        <small class="fw-bold" style="font-size: 0.85rem; color: #3f8843;">Peduli Lingkungan</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Visi Misi Section -->
<section class="visi-misi-section">
    <!-- Assets -->
    <img src="{{ asset('images/aset1visimisi.png') }}" alt="Ilustrasi Siswa" class="asset-left">
    <img src="{{ asset('images/aset2visimisi.png') }}" alt="Ilustrasi Taman" class="asset-right">

    <div class="container content-container">
        <h2 class="vm-title">VISI & MISI SDN KONDANG JAYA II</h2>

        <div class="row mb-4">
            <!-- Visi -->
            <div class="col-lg-6 mb-4 mb-lg-0 pr-lg-5">
                <h3 class="vm-heading">VISI</h3>
                <div class="vm-content-box">
                    <p class="vm-text mb-0">
                        Terwujudnya peserta didik yang beriman dan bertaqwa, berprestasi, bermartabat, berwawasan lingkungan.
                    </p>
                </div>
            </div>

            <!-- Misi -->
            <div class="col-lg-6 pl-lg-5">
                <h3 class="vm-heading">MISI</h3>
                <div class="vm-content-box">
                    <ol class="vm-list">
                        <li>Mewujudkan iklim dan budaya sekolah yang religius dan berkarakter.</li>
                        <li>Membentuk peserta didik yang aktif, kreatif, kompetitip, dan mandiri.</li>
                        <li>Menumbuhkan budaya literasi pada peserta didik.</li>
                        <li>Menumbuhkan cinta dan peduli peserta didik terhadap lingkungannya.</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-2">
            <!-- Tujuan -->
            <div class="col-lg-8 offset-lg-1">
                <h3 class="vm-heading">Tujuan</h3>
                <div class="vm-content-box">
                    <ol class="vm-list">
                        <li>Menghasilkan lulusan yang taat beribadah, berakhlakul karimah.</li>
                        <li>Menghasilkan lulusan yang cerdas dan berdaya saing.</li>
                        <li>Menghasilkan lulusan yang cinta dan peduli terhadap lingkunngan.</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
