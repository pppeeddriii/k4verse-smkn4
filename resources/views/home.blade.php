@extends('layouts.app')

@section('title', 'Beranda - SMK Negeri 4 Bogor')

@section('content')

<style>
    /* FORCE HOME DESIGN */
    .hero-section {
        min-height: 460px !important;
        position: relative !important;
    }

    .stats-section {
        position: relative !important;
        z-index: 50 !important;
        margin-top: -84px !important;
        padding: 0 0 48px !important;
    }

    .stats-container {
        max-width: 1000px !important;
        margin: 0 auto !important;
    }

    .stats-section .row {
        --bs-gutter-x: 18px;
        --bs-gutter-y: 18px;
    }

    .stats-section .stat-card {
        height: 168px !important;
        width: 100% !important;
        background: #fff !important;
        border: 1px solid #e4eaf3 !important;
        border-radius: 12px !important;
        padding: 24px 16px !important;

        display: flex !important;
        flex-direction: column !important;
        align-items: center !important;
        justify-content: center !important;

        box-shadow: 0 4px 12px rgba(11,28,48,.12) !important;
    }

    .stats-section .stat-icon {
        color: #2563eb !important;
        font-size: 21px !important;
        margin-bottom: 12px !important;
    }

    .stats-section .stat-card h2 {
        color: #111827 !important;
        font-size: 30px !important;
        line-height: 1.1 !important;
        margin-bottom: 4px !important;
    }

    .stats-section .stat-card p {
        color: #64748b !important;
        font-size: 12px !important;
        line-height: 1.25 !important;
    }
</style>

    {{-- ============ HERO SECTION ============ --}}
    <section class="hero-section text-white d-flex align-items-center"
             style="background-image: url('{{ asset('images/lapangan.jpeg') }}');">

        <div class="hero-overlay"></div>

        <div class="container position-relative py-5">
            <h1 class="fw-bold display-5">SMK NEGERI 4 KOTA BOGOR</h1>
            <p class="mb-4" style="max-width: 500px;">
                Mewujudkan generasi unggul, berkarakter, dan kompeten di bidang
                teknologi dan kejuruan. Siap kerja, lanjut, dan mandiri.
            </p>

            <a href="{{ url('/profile') }}" class="btn btn-warning fw-semibold me-2">
                Tentang kami
            </a>

            <a href="{{ url('/gallery') }}" class="btn btn-outline-light">
                Lihat Galeri
            </a>
        </div>
    </section>


    {{-- ============ STATS SECTION ============ --}}
    <section class="stats-section bg-white text-center">
        <div class="container stats-container">
            <div class="row g-3">

                <div class="col-6 col-md-3">
                    <div class="stat-card">
                        <i class="bi bi-people-fill stat-icon"></i>
                        <h2 class="fw-bold mb-0">1,080+</h2>
                        <p class="text-muted text-uppercase small mb-0">
                            Siswa-Siswi Aktif
                        </p>
                    </div>
                </div>

                <div class="col-6 col-md-3">
                    <div class="stat-card">
                        <i class="bi bi-person-workspace stat-icon"></i>
                        <h2 class="fw-bold mb-0">59+</h2>
                        <p class="text-muted text-uppercase small mb-0">
                            Tenaga Pendidik dan Kependidikan
                        </p>
                    </div>
                </div>

                <div class="col-6 col-md-3">
                    <div class="stat-card">
                        <i class="bi bi-diagram-3-fill stat-icon"></i>
                        <h2 class="fw-bold mb-0">4</h2>
                        <p class="text-muted text-uppercase small mb-0">
                            Jurusan
                        </p>
                    </div>
                </div>

                <div class="col-6 col-md-3">
                    <div class="stat-card">
                        <i class="bi bi-trophy-fill stat-icon"></i>
                        <h2 class="fw-bold mb-0">40+</h2>
                        <p class="text-muted text-uppercase small mb-0">
                            Prestasi
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>


    {{-- ============ ABOUT SECTION ============ --}}
    <section class="py-3 pb-5 about-section">
        <div class="container">
            <div class="row align-items-center g-2">

                <div class="col-md-5">
                    <img src="{{ asset('images/kepsek.jpeg') }}"
                         alt="Kepala Sekolah"
                         class="about-img">
                </div>

                <div class="col-md-7">
                    <p class="about-label mb-2">
                        TENTANG SMK NEGERI 4 KOTA BOGOR
                    </p>

                    <h2 class="mb-3">
                        SELAMAT DATANG DI SMK NEGERI 4 BOGOR
                    </h2>

                    <p class="text-muted-custom mb-4">
                        SMKN 4 BOGOR merupakan salah satu sekolah jenjang SMK berstatus Negeri
                        yang berada di wilayah Kec. Bogor Selatan, Kota Bogor, Jawa Barat.
                        Didirikan pada tanggal 15 Juni 2009 dengan Nomor SK Pendirian
                        421-45-177 TAHUN 2009. Berakreditasi A.
                    </p>

                    <p class="fw-bold mb-0">
                        Drs. Mulyadi Murprihartono, M.Si.
                    </p>

                    <p class="text-muted-custom small">
                        Kepala sekolah, SMK Negeri 4
                    </p>
                </div>

            </div>
        </div>
    </section>


{{-- ============ JURUSAN SECTION ============ --}}
<section class="py-5 bg-light-custom">
    <div class="container">

        <div class="d-flex justify-content-between align-items-end mb-4 flex-wrap gap-2">
            <div>
                <h2 class="mb-1">
                    Program Keahlian & Kompetensi Masa Depan
                </h2>

                <p class="text-muted-custom mb-0">
                    Ada 4 jurusan keahlian di SMKN 4 BOGOR
                </p>
            </div>

            {{-- INI TETAP BISA DIKLIK --}}
            <a href="{{ url('/jurusan') }}" class="produk-view-all">
                Lihat semua jurusan
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>


        <div class="row g-4">

            {{-- PPLG --}}
            <div class="col-6 col-md-3">
                <div class="produk-card">

                    <img src="{{ asset('images/produk-pplg.JPG') }}"
                         alt="PPLG"
                         class="produk-img">

                    <div class="produk-body">
                        <p class="produk-label mb-1">
                            KEAHLIAN
                        </p>

                        <h6 class="mb-0">
                            PPLG
                        </h6>
                    </div>

                </div>
            </div>


            {{-- TJKT --}}
            <div class="col-6 col-md-3">
                <div class="produk-card">

                    <img src="{{ asset('images/produk-tjkt.jpg') }}"
                         alt="TJKT"
                         class="produk-img">

                    <div class="produk-body">
                        <p class="produk-label mb-1">
                            KEAHLIAN
                        </p>

                        <h6 class="mb-0">
                            TJKT
                        </h6>
                    </div>

                </div>
            </div>


            {{-- TPFL --}}
            <div class="col-6 col-md-3">
                <div class="produk-card">

                    <img src="{{ asset('images/produk-tpfl.jpg') }}"
                         alt="TPFL"
                         class="produk-img">

                    <div class="produk-body">
                        <p class="produk-label mb-1">
                            KEAHLIAN
                        </p>

                        <h6 class="mb-0">
                            TPFL
                        </h6>
                    </div>

                </div>
            </div>


            {{-- TO --}}
            <div class="col-6 col-md-3">
                <div class="produk-card">

                    <img src="{{ asset('images/produk-to.jpg') }}"
                         alt="TO"
                         class="produk-img">

                    <div class="produk-body">
                        <p class="produk-label mb-1">
                            KEAHLIAN
                        </p>

                        <h6 class="mb-0">
                            TKRO
                        </h6>
                    </div>

                </div>
            </div>

        </div>

    </div>
</section>


{{-- ============ LATEST NEWS & EVENTS SECTION ============ --}}
<section class="py-5 bg-white">
    <div class="container">

        <div class="d-flex justify-content-between align-items-end mb-4 flex-wrap gap-2">
            <h2 class="mb-0">
                Berita & kegiatan terbaru
            </h2>

            <a href="{{ url('/news') }}" class="produk-view-all">
                Lihat semua berita
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>


        <div class="row g-4">

            @foreach ($berita as $item)

                <div class="col-md-4">
                    <a href="{{ url('/news/' . $item->id) }}"
                       class="text-decoration-none text-reset">

                        <div class="news-card">

                            {{-- GAMBAR --}}
                            @if ($item->image)
                                <img
                                    src="{{ asset('images/berita/' . $item->image) }}"
                                    alt="{{ $item->title }}"
                                    class="news-img"
                                >
                            @else
                                <div class="news-img d-flex align-items-center justify-content-center bg-light">
                                    <i class="bi bi-image fs-1 text-muted"></i>
                                </div>
                            @endif


                            <div class="news-body">

                                {{-- TANGGAL --}}
                                <p class="news-date mb-2">
                                    {{ \Carbon\Carbon::parse($item->tanggal)->locale('id')->translatedFormat('d F Y') }}
                                </p>


                                {{-- JUDUL --}}
                                <h6 class="news-title mb-2">
                                    {{ $item->title }}
                                </h6>


                                {{-- EXCERPT --}}
                                <p class="news-excerpt mb-0">
                                    {{ $item->excerpt }}
                                </p>

                            </div>

                        </div>

                    </a>
                </div>

            @endforeach

        </div>

    </div>
</section>

{{-- ============ RECENT GALLERY SECTION ============ --}}
<section class="py-5 bg-light-custom">
    <div class="container">

        <div class="d-flex justify-content-between align-items-end mb-4 flex-wrap gap-2">
            <h2 class="mb-0">
                Galeri Sekolah
            </h2>

            <a href="{{ url('/gallery') }}" class="produk-view-all">
                Lihat semua galeri
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>

@if ($fotoUtama)

    @php
        $gambarUtama = $fotoUtama->gambar;

        if (file_exists(public_path('images/galeri/' . $gambarUtama))) {
            $urlGambarUtama = asset('images/galeri/' . $gambarUtama);
        } elseif (file_exists(public_path('images/' . $gambarUtama))) {
            $urlGambarUtama = asset('images/' . $gambarUtama);
        } else {
            $urlGambarUtama = asset('images/default.jpg');
        }
    @endphp

    <div class="home-gallery-grid">

        {{-- FOTO UTAMA --}}
        <div class="home-gallery-featured">

            <img
                src="{{ $urlGambarUtama }}"
                alt="{{ $fotoUtama->judul }}"
                class="gallery-preview"
                data-image="{{ $urlGambarUtama }}"
            >

        </div>


        {{-- 4 FOTO LAINNYA --}}
        <div class="home-gallery-side">

            @foreach ($galeriKecil as $item)

                @php
                    $namaGambar = $item->gambar;

                    if (file_exists(public_path('images/galeri/' . $namaGambar))) {
                        $urlGambar = asset('images/galeri/' . $namaGambar);
                    } elseif (file_exists(public_path('images/' . $namaGambar))) {
                        $urlGambar = asset('images/' . $namaGambar);
                    } else {
                        $urlGambar = asset('images/default.jpg');
                    }
                @endphp

                <div class="home-gallery-item">

                    <img
                        src="{{ $urlGambar }}"
                        alt="{{ $item->judul }}"
                        class="gallery-preview"
                        data-image="{{ $urlGambar }}"
                    >

                </div>

            @endforeach

        </div>

    </div>

@else

    <div class="text-center py-5">
        <i class="bi bi-images fs-1 text-muted"></i>

        <p class="text-muted mt-3 mb-0">
            Foto utama galeri belum ditemukan.
        </p>
    </div>

@endif
    </div>
</section>

{{-- ============ GALLERY PREVIEW ============ --}}
<div id="galleryPreview" class="gallery-preview-overlay">

    <button type="button" id="galleryPreviewClose" class="gallery-preview-close">
        <i class="bi bi-x-lg"></i>
    </button>

    <img id="galleryPreviewImage" src="" alt="Preview Galeri">

</div>


{{-- ============ GALLERY PREVIEW SCRIPT ============ --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {

        const previewImages = document.querySelectorAll('.gallery-preview');
        const previewOverlay = document.getElementById('galleryPreview');
        const previewImage = document.getElementById('galleryPreviewImage');
        const closeButton = document.getElementById('galleryPreviewClose');

        previewImages.forEach(function (image) {

            image.addEventListener('click', function () {

                previewImage.src = this.dataset.image;
                previewOverlay.classList.add('show');

            });

        });

        closeButton.addEventListener('click', function () {
            previewOverlay.classList.remove('show');
            previewImage.src = '';
        });

        previewOverlay.addEventListener('click', function (event) {

            if (event.target === previewOverlay) {
                previewOverlay.classList.remove('show');
                previewImage.src = '';
            }

        });

    });
</script>


    {{-- ============ CONTACT SECTION ============ --}}
    <section class="home-contact-section py-5 bg-white">
        <div class="container">

            <div class="row g-4 align-items-center">

                {{-- CONTACT INFORMATION --}}
                <div class="col-lg-6">

                    <div class="contact-card home-contact-card">

                        <h2 class="mb-4">
                            Contact Information
                        </h2>

                        {{-- Campus Address --}}
                        <div class="contact-item mb-4">

                            <div class="contact-icon">
                                <i class="bi bi-geo-alt-fill"></i>
                            </div>

                            <div>
                                <span class="contact-label">
                                    Campus Address
                                </span>

                                <div class="contact-value">
                                    Jalan Raya Tajur Kp. Buntar RT02/RW08 Kel. Muarasari
                                    Kec. Bogor Selatan Kota Bogor - Jawa Barat 16137
                                </div>
                            </div>

                        </div>


                        {{-- Call Center --}}
                        <div class="contact-item mb-4">

                            <div class="contact-icon">
                                <i class="bi bi-telephone-fill"></i>
                            </div>

                            <div>
                                <span class="contact-label">
                                    Call Center
                                </span>

                                <div class="contact-value">
                                    +62 821 226 2442
                                    <br>
                                    (0251) 7547381
                                </div>
                            </div>

                        </div>


                        {{-- Email --}}
                        <div class="contact-item mb-4">

                            <div class="contact-icon">
                                <i class="bi bi-envelope-fill"></i>
                            </div>

                            <div>
                                <span class="contact-label">
                                    Email Support
                                </span>

                                <div class="contact-value">
                                    smkn4@smkn4bogor.sch.id
                                </div>
                            </div>

                        </div>


                        <hr class="my-3">


                        {{-- Operational Hours --}}
                        <div class="operational-box mb-4">

                            <div class="d-flex align-items-center gap-2 mb-2">
                                <i class="bi bi-clock"></i>

                                <span class="contact-label mb-0">
                                    Operational Hours
                                </span>
                            </div>

                            <div class="operational-row">
                                <span>Monday - Friday:</span>
                                <strong>07:00 AM - 16:00 PM</strong>
                            </div>

                            <div class="operational-row">
                                <span>Saturday:</span>
                                <strong>08:00 AM - 12:00 PM</strong>
                            </div>

                            <div class="operational-row">
                                <span>Sunday & Holidays:</span>
                                <strong>Closed</strong>
                            </div>

                        </div>


                        {{-- Connect With Us --}}
<div>

    <p class="fw-bold small mb-2">
        Connect With Us
    </p>

    <div class="contact-social">

        {{-- SHARE --}}
        <a href="javascript:void(0)"
           class="contact-social-link"
           onclick="shareWebsite()"
           title="Bagikan website">
            <i class="bi bi-share-fill"></i>
        </a>

        {{-- CONTACT --}}
        <a href="{{ url('/contact') }}"
           class="contact-social-link"
           title="Hubungi kami">
            <i class="bi bi-people-fill"></i>
        </a>

        {{-- INSTAGRAM --}}
        <a href="https://www.instagram.com/smkn4kotabogor/"
           target="_blank"
           rel="noopener noreferrer"
           class="contact-social-link"
           title="Instagram">
            <i class="bi bi-instagram"></i>
        </a>

    </div>

</div>

                    </div>
                </div>


                {{-- MAP --}}
                <div class="col-lg-6">

                    <div class="home-map-content">

                        <div class="text-center mb-4">

                            <h2 class="home-map-title mb-2">
                                Locate Us
                            </h2>

                            <p class="text-muted-custom mb-0">
                                Visit our main campus for a guided tour of our facilities.
                            </p>

                        </div>

                        <div class="map-wrapper map-wrapper-tall">

                            <iframe
                                src="https://www.google.com/maps?q=SMKN%204%20Bogor&output=embed"
                                width="100%"
                                height="100%"
                                style="border:0;"
                                allowfullscreen=""
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>

                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>

    <style>
/* ===== FIX STAT CARD POSISI FIGMA ===== */

.stats-section {
    position: relative !important;
    z-index: 100 !important;
    margin-top: 0 !important;
    padding-top: 0 !important;
    padding-bottom: 0 !important;
}

.stats-section .stats-container {
    position: relative !important;
    z-index: 100 !important;

    /* NAIKKAN KOTAK 84px */
    transform: translateY(-84px) !important;

    /* supaya section setelahnya ikut naik */
    margin-bottom: -84px !important;

    max-width: 1000px !important;
}

.stats-section .stat-card {
    height: 168px !important;
    background: #ffffff !important;
    border: 1px solid #e4eaf3 !important;
    border-radius: 12px !important;
    box-shadow: 0 4px 12px rgba(11, 28, 48, 0.12) !important;

    display: flex !important;
    flex-direction: column !important;
    justify-content: center !important;
    align-items: center !important;

    padding: 24px 16px !important;
}

.stats-section .stat-icon {
    color: #2563eb !important;
    font-size: 21px !important;
    margin-bottom: 12px !important;
}

.stats-section .stat-card h2 {
    color: #111827 !important;
    font-size: 30px !important;
    line-height: 1.1 !important;
}

.stats-section .stat-card p {
    color: #64748b !important;
    font-size: 12px !important;
}

/* DESKTOP: 4 kotak */
@media (min-width: 992px) {
    .stats-section .row {
        --bs-gutter-x: 18px !important;
    }
}

/* MOBILE */
@media (max-width: 991px) {
    .stats-section .stats-container {
        transform: translateY(-55px) !important;
        margin-bottom: -55px !important;
    }
}

@media (max-width: 576px) {
    .stats-section .stats-container {
        transform: translateY(-35px) !important;
        margin-bottom: -35px !important;
    }

    .stats-section .stat-card {
        height: 145px !important;
    }
}

/* =====================================================
   HOME GALLERY - MODERN FEATURED LAYOUT
===================================================== */

.home-gallery-grid {
    display: grid;
    grid-template-columns: 1.15fr 0.85fr;
    gap: 14px;
    height: 390px;
}

/* FOTO BESAR */
.home-gallery-featured {
    position: relative;
    overflow: hidden;
    border-radius: 14px;
    height: 390px;
    background: #e9edf3;
}

/* AREA 4 FOTO */
.home-gallery-side {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    grid-template-rows: repeat(2, 1fr);
    gap: 14px;
}

/* FOTO KECIL */
.home-gallery-item {
    position: relative;
    overflow: hidden;
    border-radius: 14px;
    background: #e9edf3;
}

/* SEMUA GAMBAR */
.home-gallery-featured img,
.home-gallery-item img {
    width: 100%;
    height: 100%;
    display: block;
    object-fit: cover;
    transition: transform .4s ease;
}

/* HOVER */
.home-gallery-featured:hover img,
.home-gallery-item:hover img {
    transform: scale(1.05);
}

/* OVERLAY */
.home-gallery-overlay {
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;

    padding: 45px 18px 16px;

    background: linear-gradient(
        to top,
        rgba(0,0,0,.65),
        rgba(0,0,0,0)
    );

    color: white;
    opacity: 0;
    transition: opacity .3s ease;
}

/* =====================================================
   TABLET
===================================================== */

@media (max-width: 991px) {

    .home-gallery-grid {
        grid-template-columns: 1fr;
        height: auto;
    }

    .home-gallery-featured {
        height: 360px;
    }

    .home-gallery-side {
        height: 360px;
    }
}


/* =====================================================
   MOBILE
===================================================== */

@media (max-width: 576px) {

    .home-gallery-featured {
        height: 280px;
    }

    .home-gallery-side {
        height: auto;
        grid-template-columns: repeat(2, 1fr);
        grid-template-rows: repeat(2, 140px);
        gap: 10px;
    }

    .home-gallery-grid {
        gap: 10px;
    }

    .home-gallery-overlay {
        opacity: 1;
        padding: 30px 10px 10px;
    }

    .home-gallery-overlay span {
        font-size: 11px;
    }
}

</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const counters = document.querySelectorAll('.stat-card h2');

    const targets = [1080, 59, 4, 40];
    const suffixes = ['+', '+', '', '+'];

    function animateCounter(element, target, suffix) {
        const duration = 1500; // 1.5 detik
        const startTime = performance.now();

        function update(currentTime) {
            const progress = Math.min(
                (currentTime - startTime) / duration,
                1
            );

            // easing supaya awal cepat lalu melambat sedikit
            const eased = 1 - Math.pow(1 - progress, 3);
            const current = Math.floor(eased * target);

            element.textContent =
                current.toLocaleString('en-US') + suffix;

            if (progress < 1) {
                requestAnimationFrame(update);
            } else {
                element.textContent =
                    target.toLocaleString('en-US') + suffix;
            }
        }

        requestAnimationFrame(update);
    }

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {

                counters.forEach((counter, index) => {
                    animateCounter(
                        counter,
                        targets[index],
                        suffixes[index]
                    );
                });

                observer.disconnect();
            }
        });
    }, {
        threshold: 0.3
    });

    const statsSection = document.querySelector('.stats-section');

    if (statsSection) {
        observer.observe(statsSection);
    }
});

function shareWebsite() {

    const shareData = {
        title: 'SMK Negeri 4 Bogor',
        text: 'Kunjungi website SMK Negeri 4 Bogor',
        url: window.location.href
    };

    if (navigator.share) {

        navigator.share(shareData)
            .catch(() => {});

    } else {

        navigator.clipboard.writeText(window.location.href);

        alert('Link website berhasil disalin!');
    }
}
</script>

@endsection