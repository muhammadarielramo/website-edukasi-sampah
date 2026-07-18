@extends('layouts.public')

@section('title', $article->title . ' - DigiHejo')

@push('styles')
<style>
    .article-header {
        background-color: #f8fafc;
        padding: 60px 0;
        border-bottom: 1px solid #e2e8f0;
        margin-bottom: 40px;
    }
    
    .article-title-large {
        font-size: 2.5rem;
        font-weight: 800;
        color: #0f172a;
        line-height: 1.3;
        margin-bottom: 20px;
    }
    
    .article-meta-large {
        color: #64748b;
        font-size: 1rem;
        display: flex;
        align-items: center;
        gap: 15px;
    }
    
    .article-content-body {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #334155;
    }
    
    .article-content-body img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        margin: 20px 0;
    }
    
    .featured-image-container {
        margin-bottom: 40px;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    }
    
    .featured-image {
        width: 100%;
        max-height: 500px;
        object-fit: cover;
    }
    
    .back-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #4f46e5;
        font-weight: 600;
        text-decoration: none;
        margin-bottom: 20px;
        transition: color 0.3s;
    }
    
    .back-btn:hover {
        color: #3730a3;
    }
    
    .article-content-body ol {
        list-style-type: decimal;
        padding-left: 1.25rem;
        margin-bottom: 1rem;
    }
    
    .article-content-body ul {
        list-style-type: disc;
        padding-left: 1.25rem;
        margin-bottom: 1rem;
    }
    
    .article-content-body li {
        margin-bottom: 0.5rem;
    }
</style>
@endpush

@section('content')
<div class="article-header">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <a href="{{ route('artikel.index') }}" class="back-btn">
                    &larr; Kembali ke Daftar Artikel
                </a>
                <h1 class="article-title-large">{{ $article->title }}</h1>
                <div class="article-meta-large">
                    <span><i class="bi bi-calendar3"></i> Ditulis pada {{ $article->created_at->format('d M Y') }}</span>
                    @if($article->user)
                        <span><i class="bi bi-person"></i> Oleh {{ $article->user->name }}</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mb-5 pb-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            @if($article->image)
                <div class="featured-image-container">
                    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="featured-image">
                </div>
            @endif
            
            <div class="article-content-body">
                {!! $article->content !!}
            </div>
        </div>
    </div>
</div>
@endsection
