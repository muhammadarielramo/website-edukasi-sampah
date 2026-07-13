@extends('layouts.public')

@section('title', 'Kumpulan Artikel - Sampah Pintar')

@push('styles')
<style>
    .article-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 12px;
        overflow: hidden;
        border: none;
        box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    
    .article-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    
    .article-img-wrapper {
        height: 200px;
        overflow: hidden;
    }
    
    .article-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .article-card:hover .article-img {
        transform: scale(1.05);
    }
    
    .article-content {
        padding: 20px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }
    
    .article-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 10px;
        line-height: 1.4;
    }
    
    .article-title a {
        color: inherit;
        text-decoration: none;
        transition: color 0.3s;
    }
    
    .article-title a:hover {
        color: #2563eb;
    }
    
    .article-excerpt {
        color: #4b5563;
        font-size: 0.95rem;
        margin-bottom: 15px;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        flex-grow: 1;
    }
    
    .article-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: auto;
        font-size: 0.85rem;
        color: #6b7280;
    }
    
    .page-header {
        background-color: #f3f4f6;
        padding: 60px 0;
        margin-bottom: 40px;
    }
    
    .page-title {
        font-size: 2.5rem;
        font-weight: 800;
        color: #111827;
        margin-bottom: 10px;
    }
    
    .page-subtitle {
        font-size: 1.1rem;
        color: #4b5563;
    }
</style>
@endpush

@section('content')
<div class="page-header text-center">
    <div class="container">
        <h1 class="page-title">Artikel Edukasi</h1>
        <p class="page-subtitle">Kumpulan informasi dan wawasan seputar pengelolaan sampah</p>
    </div>
</div>

<div class="container mb-5">
    @if($articles->count() > 0)
        <div class="row g-4">
            @foreach($articles as $article)
                <div class="col-md-6 col-lg-4">
                    <div class="card article-card">
                        <a href="{{ route('artikel.show', $article->slug) }}" class="article-img-wrapper">
                            @if($article->image)
                                <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="article-img">
                            @else
                                <img src="{{ asset('images/backgroundlandingpage.jpeg') }}" alt="Default Image" class="article-img">
                            @endif
                        </a>
                        <div class="article-content">
                            <h3 class="article-title">
                                <a href="{{ route('artikel.show', $article->slug) }}">{{ $article->title }}</a>
                            </h3>
                            <p class="article-excerpt">
                                {{ Str::limit(strip_tags($article->content), 120) }}
                            </p>
                            <div class="article-meta">
                                <span><i class="bi bi-calendar3"></i> {{ $article->created_at->format('d M Y') }}</span>
                                <a href="{{ route('artikel.show', $article->slug) }}" class="text-primary text-decoration-none fw-semibold">Baca selengkapnya &rarr;</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="d-flex justify-content-center mt-5">
            {{ $articles->links('pagination::bootstrap-5') }}
        </div>
    @else
        <div class="text-center py-5">
            <h4 class="text-muted">Belum ada artikel yang diterbitkan.</h4>
        </div>
    @endif
</div>
@endsection
