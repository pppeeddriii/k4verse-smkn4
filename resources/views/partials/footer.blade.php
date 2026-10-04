<footer class="site-footer-new">
    <div class="container py-5">
        <div class="row g-4 justify-content-center">
            <div class="col-lg-4">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <i class="bi bi-mortarboard-fill footer-logo-icon"></i>
                    <h5 class="fw-bold mb-0 footer-heading">SMK NEGERI 4 BOGOR</h5>
                </div>
                <p class="footer-tagline mb-3">
                    Lembaga pendidikan vokasi yang berdedikasi melahirkan tenaga
                    kerja profesional yang siap menghadapi tantangan industri global.
                </p>
                <div class="d-flex gap-2">
                    <a href="https://www.facebook.com/people/SMK-NEGERI-4-KOTA-BOGOR/100054636630766/"
                    class="footer-icon-link"
                    target="_blank">
                        <i class="bi bi-facebook"></i>
                    </a>

                    <a href="https://www.youtube.com/channel/UC4M-6Oc1ZvECz00MlMa4v_A/videos?app=desktop"
                    class="footer-icon-link"
                    target="_blank">
                        <i class="bi bi-youtube"></i>
                    </a>
 
                    <a href="https://www.instagram.com/smkn4kotabogor/"
                    class="footer-icon-link"
                    target="_blank">
                        <i class="bi bi-instagram"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3">
                <h6 class="fw-bold mb-3 footer-heading">Tautan Cepat</h6>

                <div class="d-flex gap-6">
                    <ul class="footer-link-list mb-2">
                        <li><a href="{{ url('/profile') }}">Profil</a></li>
                        <li><a href="{{ url('/produk') }}">Produk & karya siswa</a></li>
                        <li><a href="{{ url('/jurusan') }}">Program keahlian</a></li>
                        <li><a href="{{ url('/contact') }}">Kontak</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-6 col-lg-4">
                <h6 class="fw-bold mb-3 footer-heading">Kontak</h6>
                <div class="footer-contact-item mb-2">
                    <i class="bi bi-geo-alt-fill"></i>
                    <span>Jl. Raya Tajur Kp. Buntar RT02/RW08 Kel. Muarasari Kec. Bogor Selatan Kota Bogor - Jawa Barat 16137</span>
                </div>
                <div class="footer-contact-item mb-2">
                    <i class="bi bi-telephone-fill"></i>
                    <span>(0251) 754 7381</span>
                </div>
                <div class="footer-contact-item">
                    <i class="bi bi-envelope-fill"></i>
                    <span>smkn4@smkn4bogor.sch.id</span>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom-bar py-3">
    <div class="container text-center">
        <p class="mb-0 footer-copyright-new">
            <strong>&copy; {{ date('Y') }} SMK Negeri 4 Bogor.</strong>
            All rights reserved.
        </p>
    </div>
</div>
</footer>