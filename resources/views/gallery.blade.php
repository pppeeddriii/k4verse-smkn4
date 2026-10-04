@extends('layouts.app')

@section('title', 'Galeri - SMK Negeri 4 Bogor')

@section('content')

{{-- =========================================================
    HERO
========================================================= --}}
<section class="news-hero py-5 text-center">
    <div class="container">
        <h1 class="fw-bold text-white mb-2">
            Menangkap Perjalanan Kami
        </h1>

        <p class="news-hero-desc mx-auto mb-0" style="max-width: 600px;">
            Jelajahi kehidupan SMK Negeri 4 yang penuh warna melalui arsip visual
            keunggulan, inovasi, dan kebersamaan.
        </p>
    </div>
</section>


{{-- =========================================================
    FILTER
========================================================= --}}
<section class="py-4 bg-white">
    <div class="container">
        <div class="d-flex justify-content-center gap-2 flex-wrap">

            <button
                type="button"
                class="news-filter-btn gallery-filter active"
                data-filter="all">
                Semua
            </button>

            <button
                type="button"
                class="news-filter-btn gallery-filter"
                data-filter="kegiatan">
                Kegiatan Siswa
            </button>

            <button
                type="button"
                class="news-filter-btn gallery-filter"
                data-filter="prestasi">
                Prestasi
            </button>

        </div>
    </div>
</section>


{{-- =========================================================
    GALLERY
========================================================= --}}
<section class="pb-5 bg-white">
    <div class="container">

{{-- =====================================================
    FOTO KEGIATAN
====================================================== --}}
<div class="gallery-mosaic" id="galleryKegiatan">

    @php
        /*
         * Urutan 16 foto awal dipertahankan berdasarkan ID database.
         * Jadi walaupun nama file diganti dari admin,
         * posisi fotonya tidak berubah.
         */
        $urutanKegiatan = [
            12, 1, 2, 6, 7, 3, 4, 8,
            9, 5, 10, 13, 14, 15, 11, 16
        ];

        /*
         * Ambil 16 foto awal berdasarkan ID.
         */
        $kegiatanAwal = collect($urutanKegiatan)
            ->map(function ($id) use ($kegiatan) {
                return $kegiatan->firstWhere('id', $id);
            })
            ->filter();

        /*
         * Foto kegiatan baru dari admin ditambahkan setelah
         * 16 foto awal.
         */
        $idAwal = collect($urutanKegiatan);

        $kegiatanBaru = $kegiatan->filter(function ($item) use ($idAwal) {
            return !$idAwal->contains($item->id);
        });

        $semuaKegiatan = $kegiatanAwal->concat($kegiatanBaru);
    @endphp

    @foreach($semuaKegiatan as $galeri)

        @php
            /*
             * Foto lama berada di public/images/
             * Foto upload baru berada di public/images/galeri/
             */
            $pathRoot = public_path('images/' . $galeri->gambar);

            if (file_exists($pathRoot)) {
                $gambarUrl = asset('images/' . $galeri->gambar);
            } else {
                $gambarUrl = asset('images/galeri/' . $galeri->gambar);
            }
        @endphp

        <a href="{{ $gambarUrl }}"
           class="gallery-photo
           @if($loop->first) gallery-big
           @elseif($loop->iteration == 5 || $loop->iteration == 9 || $loop->iteration == 12) gallery-tall
           @else gallery-small
           @endif"
           data-category="kegiatan">

            <img
                src="{{ $gambarUrl }}"
                alt="{{ $galeri->judul }}"
            >

        </a>

    @endforeach

</div>


{{-- =====================================================
    FOTO PRESTASI
    TERSEMBUNYI SAMPAI ARSIP DIBUKA
====================================================== --}}
<div class="gallery-mosaic gallery-prestasi"
     id="galleryPrestasi">

    @foreach($prestasi as $galeri)

        @php
            $pathRoot = public_path('images/' . $galeri->gambar);

            if (file_exists($pathRoot)) {
                $gambarUrl = asset('images/' . $galeri->gambar);
            } else {
                $gambarUrl = asset('images/galeri/' . $galeri->gambar);
            }
        @endphp

        <a href="{{ $gambarUrl }}"
           class="gallery-photo
           @if($loop->iteration == 1 || $loop->iteration == 6 || $loop->iteration == 13)
               gallery-big
           @elseif($loop->iteration == 4 || $loop->iteration == 11)
               gallery-tall
           @elseif($loop->iteration == 9 || $loop->iteration == 15)
               gallery-wide
           @else
               gallery-small
           @endif"
           data-category="prestasi">

            <img
                src="{{ $gambarUrl }}"
                alt="{{ $galeri->judul }}"
            >

        </a>

    @endforeach

</div>

</div>

<div class="archive-trigger" id="archiveButtonWrapper">
    <button type="button" id="archiveButton">
        <span>Lihat lainnya</span>
        <i class="bi bi-arrow-down"></i>
    </button>
</div>

        </div>

    </div>
</section>


{{-- =========================================================
    LIGHTBOX
========================================================= --}}
<div class="gallery-lightbox" id="galleryLightbox">

    <button
        type="button"
        class="gallery-lightbox-close"
        id="lightboxClose">
        <i class="bi bi-x-lg"></i>
    </button>

    <button
        type="button"
        class="gallery-lightbox-prev"
        id="lightboxPrev">
        <i class="bi bi-chevron-left"></i>
    </button>

    <img
        id="lightboxImage"
        src=""
        alt="Preview Galeri">

    <button
        type="button"
        class="gallery-lightbox-next"
        id="lightboxNext">
        <i class="bi bi-chevron-right"></i>
    </button>

</div>


<style>

/* =========================================================
   MOSAIC
========================================================= */

.gallery-mosaic {
    display: grid;

    grid-template-columns: repeat(4, 1fr);

    grid-auto-rows: 140px;

    gap: 10px;

    margin-bottom: 10px;
}


/* =========================================================
   FOTO DASAR
========================================================= */

.gallery-photo {
    display: block;

    width: 100%;
    height: 140px;

    overflow: hidden;

    border-radius: 12px;

    background: #e9eef4;
}


.gallery-photo img {
    width: 100%;
    height: 100%;

    display: block;

    object-fit: cover;

    object-position: center;

    transition: transform 0.3s ease;
}


.gallery-photo:hover img {
    transform: scale(1.03);
}

.archive-trigger {
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 40px;
    text-align: center;
}

.archive-trigger button {
    background: transparent;
    border: 0;
    border-bottom: 1px solid #1e3a5f;
    padding: 8px 2px;
    color: #1e3a5f;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    transition: all 0.25s ease;
}

.archive-trigger button i {
    font-size: 13px;
    transition: transform 0.25s ease;
}

.archive-trigger button:hover {
    color: #0d6efd;
    border-color: #0d6efd;
}

.archive-trigger button:hover i {
    transform: translateY(3px);
}


/* =========================================================
   UKURAN MOSAIC
========================================================= */


/* KECIL / KOTAK */
.gallery-small {
    grid-column: span 1;
    grid-row: span 1;

    height: 140px;
}


/* PANJANG HORIZONTAL */
.gallery-wide {
    grid-column: span 2;
    grid-row: span 1;

    height: 140px;
}


/* TINGGI */
.gallery-tall {
    grid-column: span 1;
    grid-row: span 2;

    height: 290px;
}


/* BESAR */
.gallery-big {
    grid-column: span 2;
    grid-row: span 2;

    height: 290px;
}


/* =========================================================
   POSISI KHUSUS FOTO KEGIATAN
   MEMBENTUK MOSAIC UTAMA
========================================================= */

#galleryKegiatan .gallery-photo:nth-child(1) {
    grid-column: 1;
    grid-row: 1 / span 3;
    height: 440px;
}

#galleryKegiatan .gallery-photo:nth-child(5) {
    grid-column: 2;
    grid-row: 2 / span 2;
    height: 290px;
}

#galleryKegiatan .gallery-photo:nth-child(12) {
    grid-column: 4;
    grid-row: 2 / span 2;
    height: 290px;
}

#galleryKegiatan .gallery-photo:nth-child(7) {
    grid-column: 3;
    grid-row: 3;
    height: 140px;
}

#galleryKegiatan .gallery-photo:nth-child(9) {
    grid-column: 2;
    grid-row: 4 / span 2;
    height: 290px;
}

#galleryKegiatan .gallery-photo:nth-child(13) {
    grid-column: 3;
    grid-row: 5;
    height: 140px;
}

#galleryKegiatan .gallery-photo:nth-child(14) {
    grid-column: 3;
    grid-row: 6;
    height: 140px;
}

#galleryKegiatan .gallery-photo:nth-child(16) {
    grid-column: 4;
    grid-row: 5;
    height: 140px;
}


/* =========================================================
   PRESTASI
   AWALNYA HIDDEN
========================================================= */

.gallery-prestasi {
    display: none;
}


/* KETIKA DIBUKA */
.gallery-prestasi.show {
    display: grid;
}


/* =========================================================
   POSISI MOSAIC PRESTASI
========================================================= */

#galleryPrestasi .gallery-photo:nth-child(1) {
    grid-column: 1 / span 2;
    grid-row: 1;
    height: 140px;
}

#galleryPrestasi .gallery-photo:nth-child(4) {
    grid-column: 4;
    grid-row: 1 / span 2;
    height: 290px;
}

#galleryPrestasi .gallery-photo:nth-child(6) {
    grid-column: 1 / span 2;
    grid-row: 2 / span 2;
    height: 290px;
}

#galleryPrestasi .gallery-photo:nth-child(9) {
    grid-column: 3;
    grid-row: 3;
    height: 140px;
}

#galleryPrestasi .gallery-photo:nth-child(11) {
    grid-column: 4;
    grid-row: 4 / span 2;
    height: 290px;
}

#galleryPrestasi .gallery-photo:nth-child(13) {
    grid-column: 1 / span 2;
    grid-row: 5 / span 2;
    height: 290px;
}

#galleryPrestasi .gallery-photo:nth-child(15) {
    grid-column: 3;
    grid-row: 6;
    height: 140px;
}


/* =========================================================
   LIGHTBOX
========================================================= */

.gallery-lightbox {
    position: fixed;

    inset: 0;

    z-index: 9999;

    background: rgba(0, 0, 0, 0.88);

    display: none;

    align-items: center;
    justify-content: center;

    padding: 30px;
}


.gallery-lightbox.show {
    display: flex;
}


.gallery-lightbox img {
    max-width: 90vw;
    max-height: 85vh;

    width: auto;
    height: auto;

    object-fit: contain;

    border-radius: 10px;
}


.gallery-lightbox-close,
.gallery-lightbox-prev,
.gallery-lightbox-next {
    position: fixed;

    border: none;

    background: rgba(255, 255, 255, 0.15);

    color: white;

    width: 44px;
    height: 44px;

    border-radius: 50%;

    display: flex;

    align-items: center;
    justify-content: center;

    cursor: pointer;

    transition: background 0.2s ease;
}


.gallery-lightbox-close:hover,
.gallery-lightbox-prev:hover,
.gallery-lightbox-next:hover {
    background: rgba(255, 255, 255, 0.3);
}


.gallery-lightbox-close {
    top: 25px;
    right: 25px;
}


.gallery-lightbox-prev {
    left: 25px;
    top: 50%;

    transform: translateY(-50%);
}


.gallery-lightbox-next {
    right: 25px;
    top: 50%;

    transform: translateY(-50%);
}


/* =========================================================
   TABLET
========================================================= */

@media (max-width: 991px) {

    .gallery-mosaic {
        grid-template-columns: repeat(2, 1fr);

        grid-auto-rows: 170px;
    }


    #galleryKegiatan .gallery-photo,
    #galleryPrestasi .gallery-photo {

        grid-column: auto;
        grid-row: auto;

        height: 170px;
    }


    #galleryKegiatan .gallery-photo:nth-child(1),
    #galleryKegiatan .gallery-photo:nth-child(5),
    #galleryKegiatan .gallery-photo:nth-child(7),
    #galleryKegiatan .gallery-photo:nth-child(9),
    #galleryKegiatan .gallery-photo:nth-child(12),
    #galleryKegiatan .gallery-photo:nth-child(13),
    #galleryKegiatan .gallery-photo:nth-child(14),
    #galleryKegiatan .gallery-photo:nth-child(16),

    #galleryPrestasi .gallery-photo:nth-child(1),
    #galleryPrestasi .gallery-photo:nth-child(4),
    #galleryPrestasi .gallery-photo:nth-child(6),
    #galleryPrestasi .gallery-photo:nth-child(9),
    #galleryPrestasi .gallery-photo:nth-child(11),
    #galleryPrestasi .gallery-photo:nth-child(13),
    #galleryPrestasi .gallery-photo:nth-child(15) {

        grid-column: auto;
        grid-row: auto;

        height: 170px;
    }

}


/* =========================================================
   HP
========================================================= */

@media (max-width: 576px) {

    .gallery-mosaic {
        grid-template-columns: 1fr;

        grid-auto-rows: 220px;

        gap: 10px;
    }


    #galleryKegiatan .gallery-photo,
    #galleryPrestasi .gallery-photo {

        grid-column: auto !important;
        grid-row: auto !important;

        height: 220px !important;
    }


    .gallery-lightbox {
        padding: 15px;
    }


    .gallery-lightbox img {
        max-width: 94vw;
        max-height: 80vh;
    }


    .gallery-lightbox-prev {
        left: 10px;
    }


    .gallery-lightbox-next {
        right: 10px;
    }

}

</style>


<script>

document.addEventListener('DOMContentLoaded', function () {

    const galleryKegiatan =
        document.getElementById('galleryKegiatan');

    const galleryPrestasi =
        document.getElementById('galleryPrestasi');

    const archiveButton =
        document.getElementById('archiveButton');

    const archiveButtonWrapper =
        document.getElementById('archiveButtonWrapper');

    const filterButtons =
        document.querySelectorAll('.gallery-filter');


    const kegiatanPhotos =
        Array.from(
            document.querySelectorAll(
                '#galleryKegiatan .gallery-photo'
            )
        );


    const prestasiPhotos =
        Array.from(
            document.querySelectorAll(
                '#galleryPrestasi .gallery-photo'
            )
        );


    let currentFilter = 'all';

    let archiveOpen = false;

    let currentIndex = 0;


    /* =====================================================
       FILTER
    ===================================================== */

    function applyFilter(filter) {

        currentFilter = filter;


        /* =================================================
           SEMUA
        ================================================= */

        if (filter === 'all') {

            galleryKegiatan.style.display =
                'grid';


            if (archiveOpen) {

                galleryPrestasi.classList.add('show');

                archiveButton.innerHTML =
                '<span>Sembunyikan</span>' +
                '<i class="bi bi-arrow-up"></i>';

            } else {

                galleryPrestasi.classList.remove('show');

                archiveButton.innerHTML =
                '<span>Lihat lainnya</span>' +
                '<i class="bi bi-arrow-down"></i>';

            }


            archiveButtonWrapper.style.display =
                'block';

            return;
        }


        /* =================================================
           KEGIATAN
        ================================================= */

        if (filter === 'kegiatan') {

            galleryKegiatan.style.display =
                'grid';

            galleryPrestasi.classList.remove('show');

            archiveButtonWrapper.style.display =
                'none';

            return;
        }


        /* =================================================
           PRESTASI
        ================================================= */

        if (filter === 'prestasi') {

            galleryKegiatan.style.display =
                'none';

            galleryPrestasi.classList.add('show');

            archiveButtonWrapper.style.display =
                'none';

        }

    }


    /* =====================================================
       FILTER BUTTON
    ===================================================== */

    filterButtons.forEach(function (button) {

        button.addEventListener(
            'click',
            function () {

                filterButtons.forEach(
                    function (btn) {

                        btn.classList.remove(
                            'active'
                        );

                    }
                );


                this.classList.add('active');


                applyFilter(
                    this.dataset.filter
                );

            }
        );

    });


    /* =====================================================
       ARSIP
    ===================================================== */

    archiveButton.addEventListener(
        'click',
        function () {

            archiveOpen = !archiveOpen;

            applyFilter('all');

        }
    );


    /* =====================================================
       LIGHTBOX
    ===================================================== */

    const lightbox =
        document.getElementById(
            'galleryLightbox'
        );


    const lightboxImage =
        document.getElementById(
            'lightboxImage'
        );


    const lightboxClose =
        document.getElementById(
            'lightboxClose'
        );


    const lightboxPrev =
        document.getElementById(
            'lightboxPrev'
        );


    const lightboxNext =
        document.getElementById(
            'lightboxNext'
        );


    function getVisiblePhotos() {

        if (currentFilter === 'kegiatan') {

            return kegiatanPhotos;

        }


        if (currentFilter === 'prestasi') {

            return prestasiPhotos;

        }


        if (archiveOpen) {

            return [
                ...kegiatanPhotos,
                ...prestasiPhotos
            ];

        }


        return kegiatanPhotos;

    }


    function openLightbox(photo) {

        const visiblePhotos =
            getVisiblePhotos();


        currentIndex =
            visiblePhotos.indexOf(photo);


        if (currentIndex < 0) {

            currentIndex = 0;

        }


        lightboxImage.src =
            visiblePhotos[currentIndex]
                .getAttribute('href');


        lightbox.classList.add('show');


        document.body.style.overflow =
            'hidden';

    }


    function closeLightbox() {

        lightbox.classList.remove(
            'show'
        );


        document.body.style.overflow =
            '';

    }


    function showNext() {

        const visiblePhotos =
            getVisiblePhotos();


        if (!visiblePhotos.length) {
            return;
        }


        currentIndex =
            (currentIndex + 1)
            % visiblePhotos.length;


        lightboxImage.src =
            visiblePhotos[currentIndex]
                .getAttribute('href');

    }


    function showPrevious() {

        const visiblePhotos =
            getVisiblePhotos();


        if (!visiblePhotos.length) {
            return;
        }


        currentIndex =
            (currentIndex - 1
                + visiblePhotos.length)
            % visiblePhotos.length;


        lightboxImage.src =
            visiblePhotos[currentIndex]
                .getAttribute('href');

    }


    /* FOTO KEGIATAN */

    kegiatanPhotos.forEach(function (photo) {

        photo.addEventListener(
            'click',
            function (event) {

                event.preventDefault();

                openLightbox(this);

            }
        );

    });


    /* FOTO PRESTASI */

    prestasiPhotos.forEach(function (photo) {

        photo.addEventListener(
            'click',
            function (event) {

                event.preventDefault();

                openLightbox(this);

            }
        );

    });


    /* CLOSE */

    lightboxClose.addEventListener(
        'click',
        closeLightbox
    );


    /* NEXT */

    lightboxNext.addEventListener(
        'click',
        showNext
    );


    /* PREVIOUS */

    lightboxPrev.addEventListener(
        'click',
        showPrevious
    );


    /* CLICK OUTSIDE */

    lightbox.addEventListener(
        'click',
        function (event) {

            if (
                event.target === lightbox
            ) {

                closeLightbox();

            }

        }
    );


    /* KEYBOARD */

    document.addEventListener(
        'keydown',
        function (event) {

            if (
                !lightbox.classList.contains(
                    'show'
                )
            ) {

                return;

            }


            if (event.key === 'Escape') {

                closeLightbox();

            }


            if (event.key === 'ArrowRight') {

                showNext();

            }


            if (event.key === 'ArrowLeft') {

                showPrevious();

            }

        }
    );


    /* =====================================================
       DEFAULT
    ===================================================== */

    applyFilter('all');

});

</script>

@endsection