@extends('layouts.public')

@section('title', 'Video Edukasi Lingkungan - DigiHejo')

@push('styles')
<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<style>
    .video-page {
        font-family: 'Inter', sans-serif;
        background-color: #ffffff;
        padding-bottom: 80px;
    }
    
    .header-section {
        padding: 50px 0 40px;
    }

    .header-title {
        color: #166534;
        font-weight: 800;
        font-size: 2.5rem;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    /* Leaf icon styling */
    .leaf-icon {
        color: #65a30d;
        font-size: 2.2rem;
    }

    .header-subtitle {
        color: #4b5563;
        font-size: 1.1rem;
        line-height: 1.6;
        max-width: 600px;
        font-weight: 500;
    }

    .video-card {
        border-radius: 20px;
        border: 1px solid #e5e7eb;
        background: #fff;
        overflow: hidden;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        transition: transform 0.2s;
        height: 100%;
        display: flex;
        flex-direction: column;
        padding-bottom: 20px;
    }

    .video-card:hover {
        transform: translateY(-5px);
    }

    .thumbnail-wrapper {
        position: relative;
        width: 100%;
        padding-top: 56.25%; /* 16:9 Aspect Ratio */
        margin-bottom: 15px;
    }

    .thumbnail-img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 20px 20px 0 0;
    }

    .play-overlay {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 50px;
        height: 50px;
        background-color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #16a34a;
        font-size: 1.8rem;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        padding-left: 4px; /* visually center play icon */
    }

    .duration-badge {
        position: absolute;
        bottom: 15px;
        right: 15px;
        background-color: rgba(0, 0, 0, 0.8);
        color: white;
        font-size: 0.85rem;
        padding: 4px 10px;
        border-radius: 6px;
        font-weight: 600;
    }

    .card-body-custom {
        padding: 0 20px;
        text-align: center;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .video-title {
        font-weight: 800;
        font-size: 1.15rem;
        color: #111827;
        margin-bottom: 15px;
    }

    .btn-tonton {
        background-color: #22c55e;
        color: white;
        border-radius: 50px;
        padding: 8px 20px;
        font-weight: 700;
        font-size: 0.9rem;
        border: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        width: max-content;
        margin: 0 auto;
        transition: background-color 0.3s;
    }

    .btn-tonton i {
        font-size: 1.1rem;
    }

    .btn-tonton:hover {
        background-color: #16a34a;
        color: white;
    }

    /* Modal styling */
    .modal-content {
        background-color: transparent;
        border: none;
    }
    
    .modal-header {
        border-bottom: none;
        padding-bottom: 0;
    }

    .modal-header .btn-close {
        background-color: white;
        opacity: 1;
        border-radius: 50%;
        padding: 10px;
        margin-bottom: 10px;
    }

    .modal-body {
        background-color: black;
        border-radius: 12px;
        overflow: hidden;
    }
</style>
@endpush

@section('content')
<div class="video-page">
    <div class="container">
        <!-- Header -->
        <div class="header-section">
            <h1 class="header-title">
                Video Edukasi Lingkungan 
                <i class="bi bi-env leaf-icon" style="transform: rotate(-15deg);"></i>
            </h1>
            <p class="header-subtitle">
                Belajar tentang sampah, lingkungan, dan budaya 3R (Reduce, Reuse, Recycle) melalui video yang seru dan mudah dipahami.
            </p>
        </div>

        <!-- Video Grid -->
        <div class="row g-4">
            @forelse($videos as $video)
            <div class="col-md-4">
                <div class="video-card">
                    <div class="thumbnail-wrapper" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#videoModal" data-video-src="{{ asset('storage/' . $video->video_path) }}">
                        @if($video->thumbnail)
                            <img src="{{ asset('storage/' . $video->thumbnail) }}" alt="{{ $video->title }}" class="thumbnail-img">
                        @else
                            <img src="{{ asset('images/aset1video.png') }}" alt="{{ $video->title }}" class="thumbnail-img">
                        @endif
                        <div class="play-overlay">
                            <i class="bi bi-play-fill"></i>
                        </div>
                        <div class="duration-badge">{{ $video->duration }}</div>
                    </div>
                    <div class="card-body-custom">
                        <h3 class="video-title">{{ $video->title }}</h3>
                        <button class="btn-tonton" data-bs-toggle="modal" data-bs-target="#videoModal" data-video-src="{{ asset('storage/' . $video->video_path) }}">
                            <i class="bi bi-play-circle"></i> Tonton Video
                        </button>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <p class="text-gray-500">Belum ada video edukasi yang tersedia.</p>
            </div>
            @endforelse
        </div>
    </div>
</div>

<!-- Video Modal -->
<div class="modal fade" id="videoModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header justify-content-end">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-0">
        <video id="edukasiVideo" width="100%" controls>
          <source id="videoSource" src="" type="video/mp4">
          Browser Anda tidak mendukung tag video.
        </video>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
    // Stop video when modal is closed
    const videoModal = document.getElementById('videoModal');
    const edukasiVideo = document.getElementById('edukasiVideo');
    
    videoModal.addEventListener('hidden.bs.modal', function () {
        edukasiVideo.pause();
        edukasiVideo.currentTime = 0;
    });

    // Play video when modal is opened
    videoModal.addEventListener('shown.bs.modal', function (event) {
        var button = event.relatedTarget;
        var videoSrc = button.getAttribute('data-video-src');
        
        // Use direct property instead of child source tag for wider browser compatibility when changing dynamically
        edukasiVideo.src = videoSrc; 
        edukasiVideo.play();
    });
</script>
@endpush
