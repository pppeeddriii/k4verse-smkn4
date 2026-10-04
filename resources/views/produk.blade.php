@extends('layouts.app')

@section('title', 'Produk & Karya Siswa - SMK Negeri 4 Bogor')

@section('content')

<style>
/* =========================================================
   PRODUK PUBLIC PAGE
   Visual language mengikuti Admin Produk
========================================================= */

.produk-page {
    min-height: 100vh;
    background: #F5F8FD;
    color: #0B1C30;
}


/* =========================================================
   HERO
========================================================= */

.produk-hero {
    position: relative;
    overflow: hidden;
    background:
        linear-gradient(
            135deg,
            #00346F 0%,
            #0B4385 55%,
            #14569A 100%
        );
    color: #fff;
    padding: 72px 20px 76px;
}

.produk-hero::before {
    content: "";
    position: absolute;
    width: 420px;
    height: 420px;
    right: -160px;
    top: -220px;
    border-radius: 50%;
    background: rgba(255,255,255,.055);
}

.produk-hero::after {
    content: "";
    position: absolute;
    width: 300px;
    height: 300px;
    left: -150px;
    bottom: -210px;
    border-radius: 50%;
    background: rgba(255,255,255,.045);
}

.produk-hero-inner {
    position: relative;
    z-index: 1;
    max-width: 1180px;
    margin: 0 auto;
    text-align: center;
}

.produk-hero-kicker {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 14px;
    padding: 7px 12px;
    border: 1px solid rgba(255,255,255,.16);
    border-radius: 999px;
    background: rgba(255,255,255,.08);
    color: rgba(255,255,255,.9);
    font-size: .7rem;
    font-weight: 800;
    letter-spacing: .08em;
    text-transform: uppercase;
}

.produk-hero-kicker i {
    color: #D8B84C;
}

.produk-hero h1,
.produk-hero h1 * {
    margin: 0 0 14px;
    color: #fff !important;
    font-size: clamp(2rem, 4vw, 2.7rem);
    line-height: 1.15;
    font-weight: 800;
    letter-spacing: -.03em;
}

.produk-hero p,
.produk-hero p * {
    max-width: 700px;
    margin: 0 auto;
    color: rgba(255,255,255,.82) !important;
    font-size: .9rem;
    line-height: 1.75;
}


/* =========================================================
   CONTENT
========================================================= */

.produk-content {
    max-width: 1180px;
    margin: 0 auto;
    padding: 48px 20px 70px;
}


/* =========================================================
   INTRO
========================================================= */

.produk-intro {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    gap: 40px;
    margin-bottom: 24px;
}

.produk-intro-left {
    min-width: 0;
}

.produk-kicker {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 8px;
    color: #376BC8;
    font-size: .7rem;
    font-weight: 800;
    letter-spacing: .07em;
    text-transform: uppercase;
}

.produk-kicker::before {
    content: "";
    width: 7px;
    height: 7px;
    flex-shrink: 0;
    border-radius: 50%;
    background: #D28A2E;
}

.produk-intro h2 {
    margin: 0;
    color: #0B1C30;
    font-size: 1.65rem;
    line-height: 1.25;
    font-weight: 800;
    letter-spacing: -.025em;
}

.produk-intro-text {
    width: 400px;
    max-width: 100%;
    margin: 0;
    color: #737783;
    font-size: .82rem;
    line-height: 1.7;
}


/* =========================================================
   FILTER CARD
========================================================= */

.produk-filter-wrap {
    margin-bottom: 24px;
    padding: 14px;
    border: 1px solid #E3EAF3;
    border-radius: 14px;
    background: #fff;
    box-shadow: 0 4px 15px rgba(18,38,63,.035);
}

.produk-filter {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 8px;
}

.produk-filter-btn {
    height: 36px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 7px;
    padding: 0 13px;
    border: 1px solid #DCE5F2;
    border-radius: 9px;
    background: #fff;
    color: #60748A;
    font-size: .75rem;
    font-weight: 700;
    cursor: pointer;
    transition: .18s ease;
}

.produk-filter-btn:hover {
    border-color: #BFD1E8;
    background: #F8FAFD;
    color: #2563EB;
}

.produk-filter-btn.active {
    border-color: #00346F;
    background: #00346F;
    color: #fff;
    box-shadow: 0 4px 10px rgba(0,52,111,.15);
}

.produk-filter-btn i {
    font-size: .8rem;
}


/* =========================================================
   GRID
========================================================= */

.produk-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 20px;
}


/* =========================================================
   PRODUCT CARD
========================================================= */

.produk-card {
    display: flex;
    flex-direction: column;
    overflow: hidden;
    min-width: 0;
    border: 1px solid #E3EAF3;
    border-radius: 18px;
    background: #fff;
    box-shadow: 0 6px 20px rgba(18,38,63,.05);
    transition:
        transform .2s ease,
        box-shadow .2s ease,
        border-color .2s ease;
}

.produk-card:hover {
    transform: translateY(-3px);
    border-color: #D3DFEE;
    box-shadow: 0 13px 32px rgba(18,38,63,.09);
}


/* =========================================================
   IMAGE
========================================================= */

.produk-image-wrap {
    position: relative;
    width: 100%;
    height: 270px;
    overflow: hidden;
    background: #EEF3F8;
}

.produk-image {
    width: 100%;
    height: 100%;
    display: block;
    object-fit: cover;
    object-position: center;
    transition: transform .35s ease;
}

.produk-card:hover .produk-image {
    transform: scale(1.025);
}

.produk-image-placeholder {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #9AA9BA;
    background: #F3F6FA;
}

.produk-image-placeholder i {
    font-size: 2.5rem;
}


/* =========================================================
   BADGES
========================================================= */

.produk-category {
    position: absolute;
    top: 14px;
    left: 14px;
    display: inline-flex;
    align-items: center;
    max-width: calc(100% - 28px);
    padding: 7px 10px;
    border: 1px solid rgba(255,255,255,.15);
    border-radius: 8px;
    background: rgba(0,52,111,.94);
    color: #fff;
    font-size: .66rem;
    line-height: 1.2;
    font-weight: 800;
    letter-spacing: .025em;
    box-shadow: 0 4px 12px rgba(0,0,0,.14);
}

.produk-version {
    position: absolute;
    right: 14px;
    bottom: 14px;
    padding: 7px 10px;
    border: 1px solid #E3EAF3;
    border-radius: 8px;
    background: rgba(255,255,255,.96);
    color: #60748A;
    font-size: .66rem;
    font-weight: 750;
    box-shadow: 0 4px 12px rgba(18,38,63,.12);
}


/* =========================================================
   BODY
========================================================= */

.produk-body {
    display: flex;
    flex-direction: column;
    flex: 1;
    padding: 21px;
}

.produk-owner {
    display: flex;
    align-items: center;
    gap: 7px;
    margin-bottom: 9px;
    color: #718096;
    font-size: .7rem;
    font-weight: 650;
}

.produk-owner i {
    color: #2563EB;
    font-size: .78rem;
}

.produk-title {
    margin: 0 0 9px;
    color: #0B1C30;
    font-size: 1.05rem;
    line-height: 1.4;
    font-weight: 800;
}

.produk-description {
    display: -webkit-box;
    margin: 0 0 16px;
    overflow: hidden;
    color: #64748B;
    font-size: .77rem;
    line-height: 1.65;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 3;
}


/* =========================================================
   BOTTOM INFO
========================================================= */

.produk-bottom {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 14px;
    min-height: 66px;
    margin-top: auto;
    padding: 12px;
    border: 1px solid #E3EAF3;
    border-radius: 12px;
    background: #F8FAFD;
}

.produk-info-label {
    margin-bottom: 4px;
    color: #8A99AA;
    font-size: .62rem;
    font-weight: 650;
}

.produk-info-value {
    color: #00346F;
    font-size: .82rem;
    line-height: 1.4;
    font-weight: 800;
}


/* =========================================================
   WHATSAPP
========================================================= */

.produk-wa {
    flex-shrink: 0;
    height: 38px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 7px;
    padding: 0 12px;
    border: 1px solid #087A53;
    border-radius: 9px;
    background: #087A53;
    color: #fff !important;
    font-size: .68rem;
    font-weight: 750;
    text-decoration: none !important;
    box-shadow: 0 4px 10px rgba(8,122,83,.13);
    transition: .18s ease;
}

.produk-wa:hover {
    background: #066B4D;
    border-color: #066B4D;
    color: #fff !important;
    transform: translateY(-1px);
}


/* =========================================================
   EMPTY
========================================================= */

.produk-empty {
    grid-column: 1 / -1;
    padding: 65px 20px;
    border: 1px solid #E3EAF3;
    border-radius: 18px;
    background: #fff;
    text-align: center;
    box-shadow: 0 6px 20px rgba(18,38,63,.04);
}

.produk-empty i {
    display: block;
    margin-bottom: 14px;
    color: #A8B6C8;
    font-size: 2.5rem;
}

.produk-empty strong {
    display: block;
    margin-bottom: 5px;
    color: #0B1C30;
    font-size: .95rem;
}

.produk-empty p {
    margin: 0;
    color: #737783;
    font-size: .78rem;
}


/* =========================================================
   ORDER SECTION
========================================================= */

.produk-order {
    padding: 60px 20px 70px;
    border-top: 1px solid #DCE5F2;
    background: #F8FAFD;
}

.produk-order-inner {
    max-width: 1180px;
    margin: 0 auto;
}

.produk-order-heading {
    max-width: 680px;
    margin: 0 auto 34px;
    text-align: center;
}

.produk-order-kicker {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    margin-bottom: 8px;
    color: #376BC8;
    font-size: .68rem;
    font-weight: 800;
    letter-spacing: .07em;
    text-transform: uppercase;
}

.produk-order-kicker::before {
    content: "";
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: #D28A2E;
}

.produk-order-heading h2 {
    margin: 0 0 9px;
    color: #0B1C30;
    font-size: 1.5rem;
    line-height: 1.3;
    font-weight: 800;
}

.produk-order-heading p {
    max-width: 620px;
    margin: 0 auto;
    color: #718096;
    font-size: .76rem;
    line-height: 1.7;
}


/* =========================================================
   STEPS
========================================================= */

.produk-steps {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 16px;
}

.produk-step {
    min-height: 205px;
    padding: 20px;
    border: 1px solid #E0E8F3;
    border-radius: 15px;
    background: #fff;
    box-shadow: 0 5px 16px rgba(18,38,63,.035);
    transition: .2s ease;
}

.produk-step:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(18,38,63,.07);
}

.produk-step-number {
    width: 34px;
    height: 34px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 16px;
    border-radius: 10px;
    background: #EEF4FF;
    color: #2563EB;
    font-size: .72rem;
    font-weight: 800;
}

.produk-step h3 {
    margin: 0 0 8px;
    color: #0B1C30;
    font-size: .88rem;
    line-height: 1.4;
    font-weight: 800;
}

.produk-step p {
    margin: 0 0 16px;
    color: #718096;
    font-size: .7rem;
    line-height: 1.7;
}

.produk-step-link {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    color: #376BC8;
    font-size: .67rem;
    font-weight: 750;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 1000px) {

    .produk-intro {
        align-items: flex-start;
        flex-direction: column;
        gap: 12px;
    }

    .produk-intro-text {
        width: 100%;
    }

    .produk-steps {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

@media (max-width: 800px) {

    .produk-grid {
        grid-template-columns: 1fr;
    }

    .produk-image-wrap {
        height: 280px;
    }

    .produk-steps {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

@media (max-width: 600px) {

    .produk-hero {
        padding: 55px 18px 60px;
    }

    .produk-content {
        padding: 38px 16px 55px;
    }

    .produk-hero p br {
        display: none;
    }

    .produk-filter-wrap {
        padding: 12px;
    }

    .produk-filter-btn {
        flex: 1 1 calc(50% - 8px);
    }

    .produk-image-wrap {
        height: 250px;
    }

    .produk-body {
        padding: 18px;
    }

    .produk-bottom {
        align-items: stretch;
        flex-direction: column;
    }

    .produk-wa {
        width: 100%;
    }

    .produk-order {
        padding: 48px 16px 55px;
    }

    .produk-steps {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 400px) {

    .produk-filter-btn {
        flex: 1 1 100%;
    }

    .produk-image-wrap {
        height: 225px;
    }

    .produk-hero h1 {
        font-size: 1.8rem;
    }

    .produk-intro h2 {
        font-size: 1.4rem;
    }
}
</style>


<div class="produk-page">

    {{-- =====================================================
         HERO
    ====================================================== --}}
    <section class="produk-hero">

        <div class="produk-hero-inner">

            <div class="produk-hero-kicker">
                <i class="bi bi-stars"></i>
                Produk & Karya Siswa
            </div>

            <h1>
                Produk & Karya Siswa<br>
                SMKN 4 Bogor
            </h1>

            <p>
                Eksplorasi karya inovasi, produk unggulan Teaching Factory
                (TEFA), dan jasa profesional hasil karya siswa
                berstandar industri.
            </p>

        </div>

    </section>


    {{-- =====================================================
         PRODUCT CONTENT
    ====================================================== --}}
    <section class="produk-content">

        {{-- INTRO --}}
        <div class="produk-intro">

            <div class="produk-intro-left">

                <div class="produk-kicker">
                    Karya Inovasi
                </div>

                <h2>
                    Karya Nyata dari Siswa-siswi
                </h2>

            </div>

            <p class="produk-intro-text">
                Produk dan layanan hasil pembelajaran berbasis proyek nyata
                yang diproduksi langsung oleh siswa di bawah bimbingan guru
                dan mitra industri.
            </p>

        </div>


        {{-- =================================================
             FILTER
        ================================================== --}}
        <div class="produk-filter-wrap">

            <div class="produk-filter">

                <button
                    type="button"
                    class="produk-filter-btn active"
                    data-filter="all"
                >
                    <i class="bi bi-grid"></i>
                    Semua Produk
                </button>

                <button
                    type="button"
                    class="produk-filter-btn"
                    data-filter="PPLG"
                >
                    PPLG
                </button>

                <button
                    type="button"
                    class="produk-filter-btn"
                    data-filter="TJKT"
                >
                    TJKT
                </button>

                <button
                    type="button"
                    class="produk-filter-btn"
                    data-filter="TPFL"
                >
                    TPFL
                </button>

                <button
                    type="button"
                    class="produk-filter-btn"
                    data-filter="TKRO"
                >
                    TKRO
                </button>

            </div>

        </div>


        {{-- =================================================
             PRODUCT GRID
        ================================================== --}}
        <div
            class="produk-grid"
            id="produkGrid"
        >

            @forelse ($produk as $item)

                @php

                    /*
                     * Gambar produk.
                     */
                    $gambar = $item->gambar
                        ?? $item->image
                        ?? $item->foto
                        ?? null;

                    $gambarUrl = null;

                    if ($gambar) {

                        if (
                            file_exists(
                                public_path(
                                    'images/produk/' . $gambar
                                )
                            )
                        ) {

                            $gambarUrl = asset(
                                'images/produk/' . $gambar
                            );

                        } elseif (
                            file_exists(
                                public_path(
                                    'images/' . $gambar
                                )
                            )
                        ) {

                            $gambarUrl = asset(
                                'images/' . $gambar
                            );

                        }

                    }


                    /*
                     * Kategori.
                     */
                    $kategori = strtoupper(
                        $item->kategori
                        ?? $item->category
                        ?? $item->jurusan
                        ?? 'PPLG'
                    );


                    /*
                     * Data utama.
                     */
                    $judul = $item->judul
                        ?? $item->title
                        ?? $item->nama
                        ?? 'Produk Siswa';

                    $deskripsi = $item->deskripsi
                        ?? $item->description
                        ?? $item->excerpt
                        ?? '';

                    $owner = $item->pemilik
                        ?? $item->pembuat
                        ?? $item->unit
                        ?? 'SMKN 4 Bogor';

                    $versi = $item->versi
                        ?? $item->label
                        ?? null;

                    $harga = $item->harga
                        ?? $item->price
                        ?? null;

                    $status = $item->status
                        ?? $item->status_produksi
                        ?? 'Siap Implementasi & Custom';

                @endphp


                <article
                    class="produk-card"
                    data-category="{{ $kategori }}"
                >

                    {{-- IMAGE --}}
                    <div class="produk-image-wrap">

                        @if ($gambarUrl)

                            <img
                                src="{{ $gambarUrl }}"
                                alt="{{ $judul }}"
                                class="produk-image"
                            >

                        @else

                            <div class="produk-image-placeholder">
                                <i class="bi bi-image"></i>
                            </div>

                        @endif


                        {{-- CATEGORY --}}
                        <div class="produk-category">

                            {{ $kategori }}

                            <span style="opacity:.65; margin:0 3px;">
                                •
                            </span>

                            @if ($kategori === 'PPLG')

                                SOFTWARE & APPS

                            @elseif ($kategori === 'TJKT')

                                TEKNOLOGI CERDAS & IOT

                            @elseif ($kategori === 'TPFL')

                                FABRIKASI BESI & FURNITURE

                            @elseif ($kategori === 'TKRO')

                                MOBILITAS & OTOMOTIF

                            @else

                                KARYA SISWA

                            @endif

                        </div>


                        {{-- VERSION / LABEL --}}
                        @if ($versi)

                            <div class="produk-version">
                                {{ $versi }}
                            </div>

                        @endif

                    </div>


                    {{-- BODY --}}
                    <div class="produk-body">

                        {{-- OWNER --}}
                        <div class="produk-owner">

                            <i class="bi bi-building"></i>

                            <span>
                                {{ $owner }}
                            </span>

                        </div>


                        {{-- TITLE --}}
                        <h3 class="produk-title">
                            {{ $judul }}
                        </h3>


                        {{-- DESCRIPTION --}}
                        <p class="produk-description">
                            {{ $deskripsi ?: 'Belum ada deskripsi produk.' }}
                        </p>


                        {{-- BOTTOM --}}
                        <div class="produk-bottom">

                            <div>

                                @if ($harga)

                                    <div class="produk-info-label">
                                        Estimasi Biaya
                                    </div>

                                    <div class="produk-info-value">
                                        {{ $harga }}
                                    </div>

                                @else

                                    <div class="produk-info-label">
                                        Status Produksi
                                    </div>

                                    <div class="produk-info-value">
                                        {{ $status }}
                                    </div>

                                @endif

                            </div>


                            <a
                                href="https://wa.me/62895345611414"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="produk-wa"
                            >

                                <i class="bi bi-whatsapp"></i>

                                <span>
                                    Pesan via WhatsApp
                                </span>

                            </a>

                        </div>

                    </div>

                </article>

            @empty

                <div class="produk-empty">

                    <i class="bi bi-box-seam"></i>

                    <strong>
                        Belum ada produk atau karya siswa
                    </strong>

                    <p>
                        Produk dan karya siswa akan ditampilkan di sini.
                    </p>

                </div>

            @endforelse

        </div>

    </section>


    {{-- =====================================================
         CARA PEMESANAN
    ====================================================== --}}
    <section class="produk-order">

        <div class="produk-order-inner">

            <div class="produk-order-heading">

                <div class="produk-order-kicker">
                    Alur Layanan & Pemesanan
                </div>

                <h2>
                    Bagaimana Cara Memesan Produk / Jasa Siswa Kami?
                </h2>

                <p>
                    Alur pemesanan dibuat sederhana agar calon pelanggan
                    dapat berkonsultasi langsung mengenai produk, spesifikasi,
                    estimasi biaya, hingga proses produksi.
                </p>

            </div>


            <div class="produk-steps">

                {{-- STEP 01 --}}
                <div class="produk-step">

                    <div class="produk-step-number">
                        01
                    </div>

                    <h3>
                        Pilih Produk & Spesifikasi
                    </h3>

                    <p>
                        Tentukan karya inovasi, produk, aplikasi,
                        atau layanan teknis yang Anda butuhkan
                        dari katalog produk siswa.
                    </p>

                    <span class="produk-step-link">
                        <i class="bi bi-box-seam"></i>
                        Eksplorasi Katalog
                    </span>

                </div>


                {{-- STEP 02 --}}
                <div class="produk-step">

                    <div class="produk-step-number">
                        02
                    </div>

                    <h3>
                        Klik Tombol WhatsApp
                    </h3>

                    <p>
                        Hubungi pihak sekolah atau PIC melalui WhatsApp
                        untuk menanyakan ketersediaan dan detail produk.
                    </p>

                    <span class="produk-step-link">
                        <i class="bi bi-whatsapp"></i>
                        Langsung ke Chat WA
                    </span>

                </div>


                {{-- STEP 03 --}}
                <div class="produk-step">

                    <div class="produk-step-number">
                        03
                    </div>

                    <h3>
                        Konsultasi & Kesepakatan
                    </h3>

                    <p>
                        Diskusikan detail kebutuhan, kustomisasi,
                        jadwal pengerjaan, serta estimasi biaya
                        bersama pihak terkait.
                    </p>

                    <span class="produk-step-link">
                        <i class="bi bi-handshake"></i>
                        Kesepakatan
                    </span>

                </div>


                {{-- STEP 04 --}}
                <div class="produk-step">

                    <div class="produk-step-number">
                        04
                    </div>

                    <h3>
                        Produksi & Serah Terima
                    </h3>

                    <p>
                        Produk dikerjakan sesuai kesepakatan dan
                        melalui proses pengecekan sebelum diserahkan
                        kepada pelanggan.
                    </p>

                    <span class="produk-step-link">
                        <i class="bi bi-patch-check"></i>
                        QC & Serah Terima
                    </span>

                </div>

            </div>

        </div>

    </section>

</div>


{{-- =========================================================
     FILTER SCRIPT
========================================================= --}}

<script>
document.addEventListener('DOMContentLoaded', function () {

    const buttons =
        document.querySelectorAll('.produk-filter-btn');

    const cards =
        document.querySelectorAll('.produk-card');


    buttons.forEach(function (button) {

        button.addEventListener('click', function () {

            const filter =
                this.dataset.filter;


            buttons.forEach(function (btn) {

                btn.classList.remove('active');

            });


            this.classList.add('active');


            cards.forEach(function (card) {

                const category =
                    String(
                        card.dataset.category || ''
                    ).toUpperCase();


                if (
                    filter === 'all' ||
                    category === filter
                ) {

                    card.style.display = '';

                } else {

                    card.style.display = 'none';

                }

            });

        });

    });

});
</script>

@endsection