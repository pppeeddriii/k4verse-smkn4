@extends('layouts.app')

@section('title', 'Jurusan - SMK Negeri 4 Bogor')

@section('content')

{{-- =========================================================
     HERO
========================================================= --}}
<section class="jk-hero">
    <div class="container text-center">
        <h1>Program Keahlian SMKN 4 Bogor</h1>
        <p>
            Ikuti informasi program keahlian, kurikulum berbasis industri,
            dan kompetensi kejuruan di SMK Negeri 4 Bogor.
        </p>
    </div>
</section>


{{-- =========================================================
     INTRO
========================================================= --}}
<section class="jk-intro bg-white">
    <div class="container">
        <div class="row align-items-end g-3">
            <div class="col-lg-6">
                <span class="jk-intro-label">PILIHAN KEAHLIAN</span>
                <h2 class="jk-intro-title">Temukan Keahlianmu.</h2>
            </div>
            <div class="col-lg-6">
                <p class="jk-intro-desc">
                    Beragam program keahlian dengan pembelajaran berbasis praktik
                    dan industri untuk membekali siswa menghadapi kebutuhan dunia
                    kerja dan perkembangan teknologi.
                </p>
            </div>
        </div>
    </div>
</section>


{{-- =========================================================
     GRID 4 JURUSAN
========================================================= --}}
<section class="jk-grid-section bg-white">
    <div class="container">
        <div class="row g-4">

            {{-- ============ PPLG ============ --}}
            <div class="col-lg-6">
                <div class="jk-card jk-blue">

                    <div class="jk-card-image">
                        <img src="{{ asset('images/produk-pplg.JPG') }}" alt="PPLG">
                        <span class="jk-badge-corner">PPLG</span>
                    </div>

                    <div class="jk-card-body">

                        <div class="jk-card-head">
                            <i class="bi bi-code-slash"></i>
                            <span>Teknologi Informasi &amp; Software</span>
                        </div>

                        <h3 class="jk-card-title">Pengembangan Perangkat Lunak &amp; Gim (PPLG)</h3>

                        <p class="jk-desc">
                            Program ini membekali siswa dengan keahlian dalam perancangan, pembuatan, dan pengujian perangkat lunak serta aplikasi game. Siswa dilatih logika pemrograman tingkat lanjut, manajemen basis data, hingga implementasi teknologi web dan mobile terkini.
                        </p>

                        <div class="jk-boxes">

                            <div class="jk-box">
                                <div class="jk-box-title"><i class="bi bi-patch-check-fill"></i> KOMPETENSI UTAMA</div>
                                <ul class="jk-list jk-list-check">
                                    <li>Web Development</li>
                                    <li>Mobile App (Android/iOS)</li>
                                    <li>Game Development</li>
                                    <li>UI/UX Design</li>
                                </ul>
                            </div>

                            <div class="jk-box">
                                <div class="jk-box-title"><i class="bi bi-briefcase-fill"></i> PROSPEK KARIR</div>
                                <ul class="jk-list jk-list-briefcase">
                                    <li>Software Engineer</li>
                                    <li>Fullstack Developer</li>
                                    <li>Game Programmer</li>
                                    <li>Data Scientist</li>
                                </ul>
                            </div>

                        </div>

                    </div>

                </div>
            </div>


            {{-- ============ TJKT ============ --}}
            <div class="col-lg-6">
                <div class="jk-card jk-purple">

                    <div class="jk-card-image">
                        <img src="{{ asset('images/produk-tjkt.JPG') }}" alt="TJKT">
                        <span class="jk-badge-corner">TJKT</span>
                    </div>

                    <div class="jk-card-body">

                        <div class="jk-card-head">
                            <i class="bi bi-hdd-network-fill"></i>
                            <span>Infrastruktur Digital &amp; Cyber</span>
                        </div>

                        <h3 class="jk-card-title">Teknik Jaringan Komputer &amp; Telekomunikasi (TJKT)</h3>

                        <p class="jk-desc">
                            TJKT berfokus pada instalasi, konfigurasi, dan pemeliharaan infrastruktur jaringan komputer dan sistem telekomunikasi. Siswa dibekali kemampuan mendesain topologi jaringan, keamanan siber, administrasi server, hingga teknologi cloud computing.
                        </p>

                        <div class="jk-boxes">

                            <div class="jk-box">
                                <div class="jk-box-title"><i class="bi bi-patch-check-fill"></i> KOMPETENSI UTAMA</div>
                                <ul class="jk-list jk-list-check">
                                    <li>Network Engineering</li>
                                    <li>Cyber Security</li>
                                    <li>Server Administration</li>
                                    <li>Fiber Optic Tech</li>
                                </ul>
                            </div>

                            <div class="jk-box">
                                <div class="jk-box-title"><i class="bi bi-briefcase-fill"></i> PROSPEK KARIR</div>
                                <ul class="jk-list jk-list-briefcase">
                                    <li>Network Administrator</li>
                                    <li>System Integrator</li>
                                    <li>Cloud Engineer</li>
                                    <li>IT Support Specialist</li>
                                </ul>
                            </div>

                        </div>

                    </div>

                </div>
            </div>


            {{-- ============ TPFL ============ --}}
            <div class="col-lg-6">
                <div class="jk-card jk-orange">

                    <div class="jk-card-image">
                        <img src="{{ asset('images/produk-tpfl.JPG') }}" alt="TPFL">
                        <span class="jk-badge-corner">TPFL</span>
                    </div>

                    <div class="jk-card-body">

                        <div class="jk-card-head">
                            <i class="bi bi-tools"></i>
                            <span>Fabrikasi Logam &amp; Manufaktur</span>
                        </div>

                        <h3 class="jk-card-title">Teknik Pengelasan &amp; Fabrikasi Logam (TPFL)</h3>

                        <p class="jk-desc">
                            Program TPFL melatih siswa dalam teknik penyambungan logam dan fabrikasi konstruksi logam. Fokus utama meliputi berbagai metode pengelasan (SMAW, GMAW, GTAW), pembacaan gambar teknik, dan penggunaan mesin-mesin industri berat untuk menciptakan komponen struktural yang presisi.
                        </p>

                        <div class="jk-boxes">

                            <div class="jk-box">
                                <div class="jk-box-title"><i class="bi bi-patch-check-fill"></i> KOMPETENSI UTAMA</div>
                                <ul class="jk-list jk-list-check">
                                    <li>Advanced Welding (SMAW/TIG)</li>
                                    <li>Metal Fabrication</li>
                                    <li>Technical Drawing &amp; CAD</li>
                                    <li>Industrial Safety (K3)</li>
                                </ul>
                            </div>

                            <div class="jk-box">
                                <div class="jk-box-title"><i class="bi bi-briefcase-fill"></i> PROSPEK KARIR</div>
                                <ul class="jk-list jk-list-briefcase">
                                    <li>Certified Welder</li>
                                    <li>Fabrication Foreman</li>
                                    <li>QC Inspector</li>
                                    <li>Marine/Civil Constructor</li>
                                </ul>
                            </div>

                        </div>

                    </div>

                </div>
            </div>


            {{-- ============ TKRO ============ --}}
            <div class="col-lg-6">
                <div class="jk-card jk-red">

                    <div class="jk-card-image">
                        <img src="{{ asset('images/produk-to.JPG') }}" alt="TKRO">
                        <span class="jk-badge-corner">TKRO</span>
                    </div>

                    <div class="jk-card-body">

                        <div class="jk-card-head">
                            <i class="bi bi-lightning-charge-fill"></i>
                            <span>Teknik Otomotif &amp; Mobilitas Listrik</span>
                        </div>

                        <h3 class="jk-card-title">Teknik Kendaraan Ringan Otomotif (TKRO)</h3>

                        <p class="jk-desc">
                            TKRO membekali siswa dengan keterampilan teknis merawat, memperbaiki, dan mendiagnosis mesin kendaraan roda empat. Kurikulum mencakup sistem kelistrikan otomotif, manajemen mesin diesel, hingga penggunaan alat diagnostik modern (EFI).
                        </p>

                        <div class="jk-boxes">

                            <div class="jk-box">
                                <div class="jk-box-title"><i class="bi bi-patch-check-fill"></i> KOMPETENSI UTAMA</div>
                                <ul class="jk-list jk-list-check">
                                    <li>Engine Overhaul</li>
                                    <li>Automotive Electrical</li>
                                    <li>Chassis Management</li>
                                    <li>EFI Diagnostics</li>
                                </ul>
                            </div>

                            <div class="jk-box">
                                <div class="jk-box-title"><i class="bi bi-briefcase-fill"></i> PROSPEK KARIR</div>
                                <ul class="jk-list jk-list-briefcase">
                                    <li>Automotive Technician</li>
                                    <li>Service Advisor</li>
                                    <li>Spare Parts Manager</li>
                                    <li>Automotive Entrepreneur</li>
                                </ul>
                            </div>

                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
</section>


{{-- =========================================================
     ROADMAP KARIR VOKASI
========================================================= --}}
<section class="jk-roadmap-section bg-white">
    <div class="container">

        <div class="jk-roadmap-card">

            <div class="text-center mb-4">
                <span class="jk-roadmap-badge">ROADMAP KARIR VOKASI</span>
                <h2 class="jk-roadmap-title">Alur Pembelajaran Terarah Selama 3 Tahun</h2>
                <p class="jk-roadmap-subtitle">
                    Didesain secara bertahap dari pemahaman dasar hingga siap
                    terserap langsung di dunia kerja global.
                </p>
            </div>

            <div class="row g-4">

                <div class="col-md-4">
                    <div class="jk-step">
                        <span class="jk-step-number jk-step-blue">01</span>
                        <h4>Tingkat X: Fondasi Kejuruan</h4>
                        <p class="jk-step-subtitle">Basic Engineering &amp; Soft Skills</p>
                        <p class="jk-step-desc">
                            Penguatan karakter kerja, keselamatan dan kesehatan kerja (K3LH),
                            logika komputasi, dasar mesin/kelistrikan, serta pengenalan budaya
                            industri presisi.
                        </p>
                        <hr>
                        <p class="jk-step-target">Target: Penanaman Etos Kerja 5R/5S</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="jk-step">
                        <span class="jk-step-number jk-step-navy">02</span>
                        <h4>Tingkat XI: Teaching Factory &amp; Sertifikasi</h4>
                        <p class="jk-step-subtitle">Praktek Skala Industri Nyata</p>
                        <p class="jk-step-desc">
                            Pembelajaran berbasis pesanan pasar (order-based learning),
                            simulasi project nyata, pengerjaan software, perakitan mesin,
                            dan sertifikasi BNSP per klaster.
                        </p>
                        <hr>
                        <p class="jk-step-target">Target: Penguasaan Job Order Produksi</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="jk-step">
                        <span class="jk-step-number jk-step-purple">03</span>
                        <h4>Tingkat XII: Prakerin &amp; Uji Kompetensi BNSP</h4>
                        <p class="jk-step-subtitle">Internship Industri &amp; Rekrutmen BKK</p>
                        <p class="jk-step-desc">
                            Praktik Kerja Lapangan (PKL) minimal 6 bulan di perusahaan mitra
                            nasional, dilanjutkan uji sertifikasi keahlian dan rekrutmen kerja
                            langsung.
                        </p>
                        <hr>
                        <p class="jk-step-target">Target: Lulus Langsung Kerja / Wirausaha</p>
                    </div>
                </div>

            </div>

        </div>

    </div>
</section>

@endsection