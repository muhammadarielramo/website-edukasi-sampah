@extends('layouts.public')

@section('title', 'Belajar 3R - Sampah Pintar')

@push('styles')
<style>
    .page-3r {
        background: linear-gradient(93.48deg, rgba(7, 102, 83, 0.9) 6.51%, rgba(231, 241, 70, 0.9) 133.97%, rgba(226, 251, 206, 0.9) 263.91%);
        min-height: calc(100vh - 80px);
        padding: 60px 0;
        font-family: 'Inter', sans-serif;
    }

    .title-3r {
        color: #E7F146;
        font-weight: 800;
        font-size: 3rem;
        margin-bottom: 15px;
        text-shadow: 1px 1px 4px rgba(0,0,0,0.2);
    }

    .subtitle-3r {
        color: #ffffff;
        font-weight: 500;
        font-size: 1.1rem;
        max-width: 800px;
        margin: 0 auto 50px auto;
        line-height: 1.6;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
    }

    .card-3r {
        background-color: #ffffff;
        border-radius: 20px;
        padding: 30px;
        height: 100%;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }

    .card-3r:hover {
        transform: translateY(-10px);
    }

    .card-header-3r {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 20px;
    }

    .icon-3r {
        width: 80px;
        height: 80px;
        object-fit: contain;
    }

    .card-title-3r {
        color: #076653;
        font-weight: 800;
        font-size: 2rem;
        margin: 0;
    }

    .card-desc-3r {
        color: #4b5563;
        font-weight: 600;
        font-size: 1rem;
        margin-bottom: 25px;
        line-height: 1.5;
    }

    .list-3r {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .list-3r li {
        color: #374151;
        font-weight: 600;
        font-size: 1rem;
        margin-bottom: 15px;
        display: flex;
        align-items: flex-start;
        gap: 10px;
        line-height: 1.4;
    }

    .list-icon {
        font-size: 1.1rem;
        margin-top: 2px;
    }

    @media (max-width: 991.98px) {
        .title-3r {
            font-size: 2.2rem;
        }
        .card-header-3r {
            flex-direction: column;
            text-align: center;
            gap: 10px;
        }
    }
</style>
@endpush

@section('content')

<div class="page-3r">
    <div class="container">
        <!-- Header -->
        <div class="text-center">
            <h1 class="title-3r">Reduce, Reuse, dan Recycle</h1>
            <p class="subtitle-3r">
                Mari kenali prinsip Reduce, Reuse, dan Recycle (3R) untuk mengurangi sampah dan menjaga bumi tetap hijau. Mulailah dari kebiasaan kecil di rumah maupun di sekolah.
            </p>
        </div>

        <!-- Cards -->
        <div class="row g-4 justify-content-center">
            <!-- Reduce -->
            <div class="col-md-6 col-lg-4">
                <div class="card-3r">
                    <div class="card-header-3r">
                        <img src="{{ asset('images/aset13r.png') }}" alt="Reduce Icon" class="icon-3r">
                        <h2 class="card-title-3r">Reduce</h2>
                    </div>
                    <p class="card-desc-3r">Kurangi penggunaan barang sekali pakai</p>
                    <ul class="list-3r">
                        <li><span class="list-icon">🥤</span> Membawa botol minum sendiri</li>
                        <li><span class="list-icon">🍱</span> Membawa kotak makan sendiri</li>
                        <li><span class="list-icon">🛍️</span> Menggunakan tas belanja kain</li>
                        <li><span class="list-icon">🚫</span> Mengurangi penggunaan sedotan plastik</li>
                    </ul>
                </div>
            </div>

            <!-- Reuse -->
            <div class="col-md-6 col-lg-4">
                <div class="card-3r">
                    <div class="card-header-3r">
                        <img src="{{ asset('images/aset23r.png') }}" alt="Reuse Icon" class="icon-3r">
                        <h2 class="card-title-3r">Reuse</h2>
                    </div>
                    <p class="card-desc-3r">Gunakan kembali barang yang masih layak pakai</p>
                    <ul class="list-3r">
                        <li><span class="list-icon">🍶</span> Botol kaca bekas dijadikan vas bunga</li>
                        <li><span class="list-icon">🛒</span> Kantong belanja dipakai berkali-kali</li>
                        <li><span class="list-icon">🚰</span> Mengisi ulang botol minum daripada membeli baru</li>
                    </ul>
                </div>
            </div>

            <!-- Recycle -->
            <div class="col-md-6 col-lg-4">
                <div class="card-3r">
                    <div class="card-header-3r">
                        <img src="{{ asset('images/aset33r.png') }}" alt="Recycle Icon" class="icon-3r">
                        <h2 class="card-title-3r">Recycle</h2>
                    </div>
                    <p class="card-desc-3r">Daur ulang sampah menjadi barang baru yang bermanfaat.</p>
                    <ul class="list-3r">
                        <li><span class="list-icon">🌱</span> Sisa makanan dijadikan kompos</li>
                        <li><span class="list-icon">📦</span> Plastik didaur ulang menjadi produk baru</li>
                        <li><span class="list-icon">♻️</span> Botol plastik dibuat menjadi pot tanaman</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
