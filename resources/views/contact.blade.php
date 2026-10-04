@extends('layouts.app')

@section('title', 'Kontak - SMK Negeri 4 Bogor')

@section('content')

    {{-- ============ HERO SECTION ============ --}}
    <section class="hero-section text-white d-flex align-items-center"
             style="background-image: url('{{ asset('images/contact-hero.JPG') }}'); min-height: 400px;">
        <div class="hero-overlay"></div>
        <div class="container position-relative py-5">
            <h1 class="fw-bold display-5 mb-3">Hubungi Kami</h1>
            <p class="mb-0" style="max-width: 600px;">
                Baik Anda mitra industri, calon siswa, maupun alumni, kami siap
                membantu segala pertanyaan Anda seputar SMK Negeri 4.
            </p>
        </div>
    </section>

    @if (session('success'))
    <div class="container pt-4">
        <div class="alert alert-success d-flex align-items-center gap-2 mb-0" role="alert">
            <i class="bi bi-check-circle-fill"></i>
            <span>{{ session('success') }}</span>
        </div>
    </div>
@endif

@if ($errors->any())
    <div class="container pt-4">
        <div class="alert alert-danger mb-0" role="alert">
            <strong>Pesan belum dapat dikirim.</strong>

            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

    {{-- ============ CONTACT INFO + FORM SECTION ============ --}}
    <section class="pt-5 pb-4 bg-white">
        <div class="container">
            <div class="row g-4">

                {{-- Kolom Kiri: Contact Info + Jam Operasional --}}
                <div class="col-lg-5">
                    <div class="contact-card mb-4">
                        <h5 class="fw-bold mb-4">Informasi Kontak</h5>

                        <div class="contact-item mb-4">
                            <i class="bi bi-geo-alt-fill contact-icon"></i>
                            <div>
                                <p class="contact-label mb-1">Alamat Kampus</p>
                                <p class="contact-value mb-0">Jl. Raya Tajur Kp. Buntar RT02/RW08 Kel. Muarasari Kec. Bogor Selatan Kota Bogor - Jawa Barat 16137</p>
                            </div>
                        </div>

                        <div class="contact-item mb-4">
                            <i class="bi bi-telephone-fill contact-icon"></i>
                            <div>
                                <p class="contact-label mb-1">Layanan Telepon</p>
                                <p class="contact-value mb-0">(0251) 754 7381</p>
                            </div>
                        </div>

                        <div class="contact-item mb-4">
                            <i class="bi bi-envelope-fill contact-icon"></i>
                            <div>
                                <p class="contact-label mb-1">Layanan Email</p>
                                <p class="contact-value mb-0">smkn4@smkn4bogor.sch.id</p>
                            </div>
                        </div>

                        <hr class="my-4">

                        <p class="fw-bold mb-2">Terhubung Dengan Kami</p>

<div class="contact-social">

    {{-- WhatsApp --}}
    <a
        href="https://wa.me/62895345611414"
        class="contact-social-link"
        target="_blank"
        rel="noopener noreferrer"
        title="WhatsApp"
    >
        <i class="bi bi-whatsapp"></i>
    </a>

    {{-- YouTube --}}
    <a
        href="https://www.youtube.com/@smknegeri4bogor905"
        class="contact-social-link"
        target="_blank"
        rel="noopener noreferrer"
        title="YouTube"
    >
        <i class="bi bi-youtube"></i>
    </a>

    {{-- Facebook --}}
    <a
        href="https://www.facebook.com/people/SMK-NEGERI-4-KOTA-BOGOR/100054636630766/"
        class="contact-social-link"
        target="_blank"
        rel="noopener noreferrer"
        title="Facebook"
    >
        <i class="bi bi-facebook"></i>
    </a>

    {{-- Instagram --}}
    <a
        href="https://www.instagram.com/smkn4bogor"
        class="contact-social-link"
        target="_blank"
        rel="noopener noreferrer"
        title="Instagram"
    >
        <i class="bi bi-instagram"></i>
    </a>

</div>
                    </div>

                    <div class="operational-box">
                        <p class="fw-bold mb-3"><i class="bi bi-clock-fill me-2"></i>Jam Operasional</p>
                        <div class="d-flex justify-content-between mb-1">
                            <span class="contact-label">Senin - Jumat:</span>
                            <span class="contact-value">07:00 - 16:00</span>
                        </div>
                        <div class="d-flex justify-content-between mb-1">
                            <span class="contact-label">Sabtu:</span>
                            <span class="contact-value">08:00 - 12:00</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="contact-label">Minggu & Hari Libur:</span>
                            <span class="contact-value">Tutup</span>
                        </div>
                    </div>
                </div>

                {{-- Kolom Kanan: Form Kirim Pesan --}}
                <div class="col-lg-7">
                    <div class="contact-form-card">
                        <h5 class="fw-bold mb-1">Kirim Pesan</h5>
                        <p class="text-muted-custom mb-4">Kami akan merespons pertanyaan Anda dalam 24-48 jam kerja.</p>

                        <form action="{{ route('pesan.store') }}" method="POST">
                            @csrf
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label-custom">Nama Lengkap</label>
                                    <input
                                        type="text"
                                        name="nama"
                                        class="form-control-custom"
                                        placeholder="Masukkan nama lengkap"
                                        value="{{ old('nama') }}"
                                        required
                                    >
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label-custom">Alamat Email</label>
                                    <input
                                        type="email"
                                        name="email"
                                        class="form-control-custom"
                                        placeholder="email@contoh.com"
                                        value="{{ old('email') }}"
                                        required
                                    >
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label-custom">Subjek</label>
                                <select name="subjek" class="form-control-custom" required>
                                    <option value="">Pilih kategori</option>
                                    <option value="Pendaftaran">Pendaftaran</option>
                                    <option value="Kerja Sama Industri">Kerja Sama Industri</option>
                                    <option value="Informasi Umum">Informasi Umum</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label class="form-label-custom">Pesan</label>
                                <textarea
                                        name="pesan"
                                        class="form-control-custom"
                                        rows="5"
                                        placeholder="Ada yang bisa kami bantu?"
                                        required
                                    >{{ old('pesan') }}</textarea>
                            </div>

                            <button type="submit" class="btn-send-message">
                                Kirim Pesan <i class="bi bi-send-fill ms-1"></i>
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ============ MAP SECTION ============ --}}
    <section class="pt-4 pb-5 bg-white text-center">
        <div class="container">
            <p class="fw-bold mb-1">Temukan Kami</p>
            <p class="text-muted-custom mb-4">Kunjungi kampus utama kami untuk tur fasilitas berpemandu.</p>
            <div class="map-wrapper map-wrapper-tall mx-auto" style="max-width: 100%;">
                <iframe
                    src="https://www.google.com/maps?q=-6.6255,106.8146&z=16&output=embed"
                    width="100%"
                    height="100%"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy">
                </iframe>
            </div>
        </div>
    </section>

@endsection