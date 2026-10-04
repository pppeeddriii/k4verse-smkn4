@extends('layouts.app')

@section('title', 'Profil - SMK Negeri 4 Bogor')

@section('content')

    {{-- ============ HERO SECTION ============ --}}
    <section class="hero-section text-white d-flex align-items-center text-center"
             style="background-image: url('{{ asset('images/profilelapangan.png') }}');">

        <div class="hero-overlay"></div>

        <div class="container position-relative py-5">
            <h1 class="fw-bold display-5 mx-auto" style="max-width: 700px;">Memberdayakan Generasi Masa Depan</h1>
            <p class="mx-auto" style="max-width: 600px;">
                Temukan warisan dan komitmen keunggulan SMK Negeri 4, tempat keterampilan
                profesional bertemu pembentukan karakter.
            </p>
        </div>
    </section>

    {{-- ============ SEJARAH (OUR LEGACY) SECTION ============ --}}
    <section class="py-5 bg-white">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-md-7">
                    <p class="about-label mb-2">WARISAN KAMI</p>
                    <h2 class="mb-3">Sejarah Keunggulan</h2>
                    <p class="text-muted-custom mb-4">
                        Sekolah Menengah Kejuruan Negeri (SMKN) 4 Kota Bogor pertama kali dirintis pada tahun 2008 
                        dan resmi dibuka pada 15 Juni 2009 berdasarkan SK Pendirian Nomor 421-45-177 Tahun 2009 yang 
                        diterbitkan oleh Pemerintah Kota Bogor serta berada di bawah naungan Kementerian Pendidikan dan 
                        Kebudayaan Indonesia. Pendirian sekolah ini merupakan bagian dari Program Pemerintah Pusat 
                        untuk mempersiapkan tenaga kerja terampil dan menyeimbangkan pendidikan SMA dan SMK di Kota Bogor. 
                        Sekolah dibangun di atas lahan seluas 12.724 m² di Jalan Raya Tajur, Kp. Buntar, Kelurahan Muarasari, 
                        Kecamatan Kota Bogor Selatan, Kota Bogor. Kami tetap menjadi yang terdepan dalam inovasi pendidikan, menyesuaikan kurikulum 
                        dengan perkembangan industri yang pesat sambil mempertahankan nilai-nilai integritas 
                        dan profesionalisme, mewujudkan generasi unggul dan berkarakter, yang memiliki etos kerja, 
                        sopan santun, kemandirian, dan kreativitas. 
                    </p>
                    <div class="d-flex gap-5">
    <div>
        <h2 class="fw-bold mb-0">
            <span class="profile-counter" data-target="50">0</span>+
        </h2>
        <p class="text-muted-custom small mb-0">Prestasi</p>
    </div>

    <div>
        <h2 class="fw-bold mb-0">
            <span class="profile-counter" data-target="5000">0</span>rb+
        </h2>
        <p class="text-muted-custom small mb-0">Alumni Sukses</p>
    </div>
</div>
                </div>
                <div class="col-md-5">
                    <div class="legacy-frame">
                        <img src="{{ asset('images/sejarah.png') }}" alt="Sejarah SMK Negeri 4" class="legacy-img">
                    </div>
                </div>
            </div>
        </div>
    </section>
        {{-- ============ VISI & MISI SECTION ============ --}}
    <section class="py-5 bg-light-custom">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-5">
                    <div class="vision-card">
                        <i class="bi bi-eye-fill vision-icon"></i>
                        <h3 class="fw-bold text-white mb-3">Visi Kami</h3>
                        <p class="text-white mb-0">
                            "Terwujudnya tamatan yang unggul dalam
                            kompetensi, berkarakter, dan berdaya saing
                            global di bidang teknologi dan industri,
                            menuju masa depan cerah."
                        </p>
                    </div>
                </div>

                <div class="col-md-7">
                    <p class="mission-heading mb-3"><i class="bi bi-rocket-takeoff-fill me-2"></i>Misi Strategis Kami</p>

                    <div class="mission-item mb-3">
                        <span class="mission-number">01</span>
                        <div>
                            <h6 class="fw-bold mb-1">Keunggulan Akademik</h6>
                            <p class="text-muted-custom small mb-0">
                                Mengembangkan kompetensi siswa sesuai kebutuhan industri.
                            </p>
                        </div>
                    </div>

                    <div class="mission-item mb-3">
                        <span class="mission-number">02</span>
                        <div>
                            <h6 class="fw-bold mb-1">Pembentukan Karakter</h6>
                            <p class="text-muted-custom small mb-0">
                                Mengembangkan sikap dan perilaku dalam mengamalkan
                                ajaran agama yang dianutnya.
                            </p>
                        </div>
                    </div>

                    <div class="mission-item">
                        <span class="mission-number">03</span>
                        <div>
                            <h6 class="fw-bold mb-1">Kemitraan Global</h6>
                            <p class="text-muted-custom small mb-0">
                                Memperkuat kerja sama dengan industri internasional
                                untuk kegiatan magang dan penempatan kerja.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
        {{-- ============ KEPEMIMPINAN & STRUKTUR SECTION ============ --}}
    <section class="py-5 bg-white text-center">
        <div class="container">
            <h2 class="mb-2">Kepemimpinan & Struktur</h2>
            <p class="text-muted-custom mb-5">Dipimpin oleh para profesional dan pendidik berpengalaman yang berkomitmen pada keberhasilan siswa.</p>

            {{-- Kepala Sekolah & Wakil Kepala Sekolah --}}
<div class="row justify-content-center g-5">

    {{-- Kepala Sekolah --}}
    <div class="col-12 col-md-4">
        <img src="{{ asset('images/kepsek.jpeg') }}"
             alt="Kepala Sekolah"
             class="leader-img-main">

        <p class="fw-bold text-primary-dark mb-0 mt-3">
            Drs. Mulyadi Murprihartono, M.Si.
        </p>

        <p class="text-muted-custom small mb-0">
            Kepala Sekolah
        </p>
    </div>

    {{-- Wakil Kepala Sekolah --}}
    <div class="col-12 col-md-4">
        <img src="{{ asset('images/wakepsek.jpg') }}"
             alt="Siti Aminah"
             class="leader-img-main">

        <p class="fw-bold text-primary-dark mb-0 mt-3">
            Mulyadih
        </p>

        <p class="text-muted-custom small mb-0">
            Wakil Kepala Sekolah
        </p>
    </div>

</div>
        </div>
    </section>
        {{-- ============ FASILITAS MODERN SECTION ============ --}}
    <section class="py-5 facility-section">
        <div class="container">
            <div class="row align-items-end mb-4 g-3">
                <div class="col-md-7">
                    <p class="facility-label mb-2"></p>
                    <h2 class="text-white mb-0">Fasilitas</h2>
                </div>
                <div class="col-md-5">
                    <p class="facility-desc mb-0">
                        Sekolah kami dilengkapi teknologi terkini untuk memastikan
                        siswa memiliki sarana yang dibutuhkan untuk sukses di dunia modern.
                    </p>
                </div>
            </div>

<div class="row g-4">

    {{-- LABORATORIUM --}}
    <div class="col-md-4">
        <div class="facility-card facility-preview"
             data-image="{{ asset('images/laboratorium.jpeg') }}"
             data-title="Laboratorium">

            <img src="{{ asset('images/laboratorium.jpeg') }}"
                 alt="Laboratorium"
                 class="facility-img">

            <div class="facility-overlay-card">
                <i class="bi bi-laptop facility-icon"></i>
                <p class="fw-bold text-white mb-0">Laboratorium</p>
            </div>

        </div>
    </div>


    {{-- BENGKEL --}}
    <div class="col-md-4">
        <div class="facility-card facility-preview"
             data-image="{{ asset('images/bengkel.jpg') }}"
             data-title="Bengkel">

            <img src="{{ asset('images/bengkel.jpg') }}"
                 alt="Bengkel"
                 class="facility-img">

            <div class="facility-overlay-card">
                <i class="bi bi-gear-fill facility-icon"></i>
                <p class="fw-bold text-white mb-0">Bengkel</p>
            </div>

        </div>
    </div>


    {{-- RUANG KELAS --}}
    <div class="col-md-4">
        <div class="facility-card facility-preview"
             data-image="{{ asset('images/ruang-kelas.jpg') }}"
             data-title="Ruang Kelas">

            <img src="{{ asset('images/ruang-kelas.jpg') }}"
                 alt="Ruang Kelas"
                 class="facility-img">

            <div class="facility-overlay-card">
                <i class="bi bi-book-half facility-icon"></i>
                <p class="fw-bold text-white mb-0">Ruang Kelas</p>
            </div>

        </div>
    </div>

</div>
</div>
    </section>

    {{-- ============ FACILITY IMAGE PREVIEW ============ --}}
<div class="facility-modal" id="facilityModal">

    <div class="facility-modal-backdrop"></div>

    <div class="facility-modal-content">

        <button type="button"
                class="facility-modal-close"
                id="facilityModalClose">
            <i class="bi bi-x-lg"></i>
        </button>

        <img id="facilityModalImage"
             src=""
             alt="">

        <p id="facilityModalTitle"></p>

    </div>

</div>

    <script>
document.addEventListener('DOMContentLoaded', function () {

    const facilityItems = document.querySelectorAll('.facility-preview');

    const modal = document.getElementById('facilityModal');
    const modalImage = document.getElementById('facilityModalImage');
    const modalTitle = document.getElementById('facilityModalTitle');
    const modalClose = document.getElementById('facilityModalClose');
    const modalBackdrop = document.querySelector('.facility-modal-backdrop');


    function openFacilityPreview(item) {

        const image = item.dataset.image;
        const title = item.dataset.title;

        modalImage.src = image;
        modalImage.alt = title;
        modalTitle.textContent = title;

        modal.classList.add('show');

        document.body.style.overflow = 'hidden';
    }


    function closeFacilityPreview() {

        modal.classList.remove('show');

        document.body.style.overflow = '';

        setTimeout(() => {
            modalImage.src = '';
        }, 250);
    }


    facilityItems.forEach(item => {

        item.addEventListener('click', function () {
            openFacilityPreview(this);
        });

    });


    modalClose.addEventListener('click', closeFacilityPreview);

    modalBackdrop.addEventListener('click', closeFacilityPreview);


    document.addEventListener('keydown', function (event) {

        if (event.key === 'Escape' && modal.classList.contains('show')) {
            closeFacilityPreview();
        }

    });

});
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const counters = document.querySelectorAll('.profile-counter');

    counters.forEach(counter => {

        const target = Number(counter.dataset.target);
        const duration = 1500;
        const startTime = performance.now();

        function updateCounter(currentTime) {

            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);

            // efek mulai cepat lalu melambat
            const easeOut = 1 - Math.pow(1 - progress, 3);

            const currentValue = Math.floor(easeOut * target);

            counter.textContent = currentValue.toLocaleString('id-ID');

            if (progress < 1) {
                requestAnimationFrame(updateCounter);
            } else {
                counter.textContent = target.toLocaleString('id-ID');
            }
        }

        requestAnimationFrame(updateCounter);
    });

});
</script>

@endsection