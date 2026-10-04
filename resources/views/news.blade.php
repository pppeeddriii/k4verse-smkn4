@extends('layouts.app')

@section('title', 'Berita - SMK Negeri 4 Bogor')

@section('content')

    {{-- =========================================================
         HERO
    ========================================================== --}}

    <section class="news-hero py-5">
        <div class="container">

            <h1 class="fw-bold text-white mb-2">
                Berita Terbaru SMKN 4 Bogor
            </h1>

            <p class="news-hero-desc mb-0">
                Ikuti berita terbaru, perkembangan akademik, dan prestasi siswa SMK Negeri 4.
            </p>

        </div>
    </section>


    {{-- =========================================================
         FILTER & SEARCH
    ========================================================== --}}

    <section class="py-4 bg-white">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                {{-- FILTER --}}

                <div class="d-flex gap-2 flex-wrap">

                    <a href="{{ url('/news') }}"
                       class="news-filter-btn text-decoration-none {{ $category === 'Semua' ? 'active' : '' }}">
                        Semua
                    </a>

                    <a href="{{ url('/news?category=Prestasi') }}"
                       class="news-filter-btn text-decoration-none {{ $category === 'Prestasi' ? 'active' : '' }}">
                        Prestasi
                    </a>

                    <a href="{{ url('/news?category=Kegiatan') }}"
                       class="news-filter-btn text-decoration-none {{ $category === 'Kegiatan' ? 'active' : '' }}">
                        Kegiatan
                    </a>

                    <a href="{{ url('/news?category=Pengumuman') }}"
                       class="news-filter-btn text-decoration-none {{ $category === 'Pengumuman' ? 'active' : '' }}">
                        Pengumuman
                    </a>

                </div>


                {{-- SEARCH --}}

                <form action="{{ url('/news') }}"
                      method="GET"
                      class="news-search-box">

                    @if ($category !== 'Semua')
                        <input
                            type="hidden"
                            name="category"
                            value="{{ $category }}"
                        >
                    @endif

                    <i class="bi bi-search"></i>

                    <input
                        type="text"
                        name="search"
                        value="{{ $search }}"
                        placeholder="Cari berita..."
                    >

                </form>

            </div>

        </div>
    </section>


    {{-- =========================================================
         HASIL BERITA
    ========================================================== --}}

    <section class="pb-5 bg-white">
        <div class="container">

           @php

    $items = $berita->getCollection();

    $cards = $items;

@endphp


            {{-- =================================================
                 JIKA TIDAK ADA BERITA
            ================================================== --}}

            @if ($items->count() === 0)

                <div class="text-center py-5">

                    <i class="bi bi-newspaper fs-1 text-muted"></i>

                    <h5 class="fw-bold mt-3">
                        Berita tidak ditemukan
                    </h5>

                    <p class="text-muted">
                        Coba gunakan kata kunci atau kategori lainnya.
                    </p>

                    <a href="{{ url('/news') }}"
                       class="btn btn-primary">
                        Lihat Semua Berita
                    </a>

                </div>


            @else


                {{-- =================================================
                     BERITA UTAMA / FEATURED
                ================================================== --}}

                @if ($featured && $berita->currentPage() == 1)

                    @php

                        $featuredBadge = match ($featured->category) {
                            'Prestasi' => 'badge-prestasi',
                            'Kegiatan' => 'badge-kegiatan',
                            'Pengumuman' => 'badge-pengumuman',
                            default => 'badge-featured',
                        };

                    @endphp


                    <a href="{{ url('/news/' . $featured->id) }}"
                       class="featured-article-card d-block text-decoration-none mb-4">

                        <div class="row g-0">

                            {{-- GAMBAR FEATURED --}}

                            <div class="col-md-6 d-flex align-items-center justify-content-center">

                                @if ($featured->image_url)

                                    <img
                                        src="{{ $featured->image_url }}"
                                        alt="{{ $featured->title }}"
                                        class="featured-article-img"
                                    >

                                @else

                                    <i
                                        class="bi bi-image text-muted py-5"
                                        style="font-size: 4rem;"
                                    ></i>

                                @endif

                            </div>


                            {{-- ISI FEATURED --}}

                            <div class="col-md-6 d-flex align-items-center">

                                <div class="p-4">

                                    <div class="d-flex align-items-center gap-2 mb-2">

                                        <span class="article-badge {{ $featuredBadge }} {{ $featuredBadge !== 'badge-featured' ? 'text-white' : '' }}">
                                            {{ strtoupper($featured->category) }}
                                        </span>

                                        <span class="article-date">
                                            {{ $featured->tanggal->locale('id')->translatedFormat('d F Y') }}
                                        </span>

                                    </div>


                                    <h3 class="fw-bold mb-2">
                                        {{ $featured->title }}
                                    </h3>


                                    <p class="text-muted-custom mb-3">
                                        {{ $featured->excerpt }}
                                    </p>


                                    <span class="read-more-link">
                                        Baca Selengkapnya
                                        <i class="bi bi-arrow-right"></i>
                                    </span>

                                </div>

                            </div>

                        </div>

                    </a>

                @endif


                {{-- =================================================
                     GRID BERITA
                ================================================== --}}

                @if ($cards->count() > 0)

                    <div class="row g-4">

                        @foreach ($cards as $item)

                            @php

                                $badge = match ($item->category) {
                                    'Prestasi' => 'badge-prestasi',
                                    'Kegiatan' => 'badge-kegiatan',
                                    'Pengumuman' => 'badge-pengumuman',
                                    default => 'badge-featured',
                                };

                            @endphp


                            {{-- =================================================
                                 SATU CARD BERITA
                            ================================================== --}}

                            <div class="col-md-4">

                                <a
                                    href="{{ url('/news/' . $item->id) }}"
                                    class="news-article-card d-block text-decoration-none"
                                >

                                    {{-- ===============================
                                         GAMBAR
                                    ================================ --}}

                                    <div class="position-relative">

                                        @if ($item->image_url)

                                            <img
                                                src="{{ $item->image_url }}"
                                                alt="{{ $item->title }}"
                                                class="news-article-img"
                                            >

                                        @else

                                            <div class="news-article-img d-flex align-items-center justify-content-center bg-light text-muted">

                                                <i class="bi bi-image fs-1"></i>

                                            </div>

                                        @endif


                                        {{-- BADGE KATEGORI --}}

                                        <span class="article-badge-overlay {{ $badge }}">
                                            {{ strtoupper($item->category) }}
                                        </span>

                                    </div>


                                    {{-- ===============================
                                         ISI CARD
                                    ================================ --}}

                                    <div class="p-3">

                                        {{-- TANGGAL --}}

                                        <p class="article-date mb-2">
                                            {{ $item->tanggal->locale('id')->translatedFormat('d F Y') }}
                                        </p>


                                        {{-- JUDUL --}}

                                        <h6 class="article-title mb-2">
                                            {{ $item->title }}
                                        </h6>


                                        {{-- DESKRIPSI --}}

                                        <p class="article-excerpt mb-3">
                                            {{ $item->excerpt }}
                                        </p>


                                        {{-- BACA SELENGKAPNYA --}}

                                        <div class="d-flex align-items-center gap-2 mt-3">

                                            <span class="read-more-link text-nowrap">
                                                Baca selengkapnya
                                            </span>

                                            <i class="bi bi-arrow-right"></i>

                                        </div>

                                    </div>

                                </a>

                            </div>


                        @endforeach

                    </div>

                @endif

            @endif

        </div>

    </section>


    {{-- =========================================================
         PAGINATION
    ========================================================== --}}

    @if ($berita->lastPage() > 1)

        <section class="pb-5 bg-white">

            <div class="container">

                <div class="d-flex justify-content-center align-items-center gap-2">

                    @for ($i = 1; $i <= $berita->lastPage(); $i++)

                        <a
                            href="{{ $berita->url($i) }}"
                            class="pagination-btn {{ $berita->currentPage() == $i ? 'active' : '' }}"
                        >
                            {{ $i }}
                        </a>

                    @endfor

                </div>

            </div>

        </section>

    @endif

@endsection