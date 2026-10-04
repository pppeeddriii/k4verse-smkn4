@extends('layouts.app') 
 
@section('title', $berita->title . ' - SMK Negeri 4 Bogor') 
 
@section('content') 
 
    {{-- ============ HERO DETAIL BERITA ============ --}} 
    <section class="news-hero py-5"> 
        <div class="container"> 
 
            <div style="display: flex; flex-direction: column; gap: 18px; align-items: flex-start;">
                
                <a href="{{ url()->previous() }}" class="text-white">
                    <i class="bi bi-arrow-left"></i> 
                    Kembali  
                </a> 
 
                <div> 
                    <span class="article-badge badge-featured"> 
                        {{ $berita->category }} 
                    </span> 
                </div>

            </div>
 
            <h1 class="fw-bold text-white mt-3 mb-3" style="max-width: 900px;"> 
                {{ $berita->title }} 
            </h1> 
 
            <div class="news-detail-date text-white"> 
                <i class="bi bi-calendar3 me-2"></i> 
                <span> 
                    {{ $berita->tanggal->locale('id')->translatedFormat('d F Y') }} 
                </span> 
            </div> 
 
        </div> 
    </section> 
 
 
    {{-- ============ DETAIL BERITA + SIDEBAR ============ --}} 
    <section class="py-5 bg-white"> 
        <div class="container"> 
            <div class="row g-4"> 
 
                {{-- Kolom Kiri: Isi Artikel --}} 
                <div class="col-lg-8"> 
 
                    @if ($berita->image_url) 
 
                        <img 
                            src="{{ $berita->image_url }}" 
                            alt="{{ $berita->title }}" 
                            class="img-fluid w-100 rounded mb-4" 
                        > 
 
                    @else 
 
                        <div class="bg-light rounded mb-4 d-flex align-items-center justify-content-center" 
                             style="height: 300px;"> 
                            <i class="bi bi-image text-muted" style="font-size: 4rem;"></i> 
                        </div> 
 
                    @endif 
 
 
                    <div class="news-detail-content"> 
 
                        <p class="text-muted-custom mb-4"> 
                            {{ $berita->content }} 
                        </p> 
 
                    </div> 
 
 
                    <div class="d-flex align-items-center gap-3 pt-4 border-top"> 
 
                        <span class="fw-semibold text-muted-custom"> 
                            Bagikan artikel ini: 
                        </span> 
 
                        <a href="#" class="news-share-btn news-share-fb"> 
                            <i class="bi bi-facebook"></i> 
                            Facebook 
                        </a> 
 
                        <a href="#" class="news-share-btn news-share-tw"> 
                            <i class="bi bi-twitter-x"></i> 
                            Twitter 
                        </a> 
 
                    </div> 
 
                </div> 
 
 
                {{-- Kolom Kanan: Berita Terkait --}} 
                <div class="col-lg-4"> 
 
                    <div class="related-news-card"> 
 
                        <h6 class="fw-bold mb-3"> 
                            Berita Terkait 
                        </h6> 
 
                        @foreach ($related as $item) 
 
                            <a 
                                href="{{ url('/news/' . $item->id) }}" 
                                class="related-news-item" 
                            > 
 
                                @if ($item->image_url) 
 
                                    <img 
                                        src="{{ $item->image_url }}" 
                                        alt="{{ $item->title }}" 
                                    > 
 
                                @endif 
 
                                <div> 
 
                                    <span class="related-news-category"> 
                                        {{ $item->category }} 
                                    </span> 
 
                                    <p class="related-news-title"> 
                                        {{ $item->title }} 
                                    </p> 
 
                                    <span class="related-news-date"> 
                                        {{ $item->tanggal->locale('id')->translatedFormat('d F Y') }} 
                                    </span> 
 
                                </div> 
 
                            </a> 
 
                        @endforeach 
 
                    </div> 
 
                </div> 
 
            </div> 
        </div> 
    </section> 
 
@endsection