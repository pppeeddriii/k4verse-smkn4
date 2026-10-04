@extends('layouts.admin')

@section('title', 'Kelola Galeri - Admin')
@section('page-title', 'Kelola Galeri')

@section('content')

<style>

/* =========================================================
   PAGE
========================================================= */

.gallery-page {
    width: 100%;
}

.gallery-page-heading {
    margin-bottom: 24px;
}

.gallery-page-heading h1 {
    margin: 0 0 6px;
    font-size: 1.65rem;
    font-weight: 800;
    color: var(--admin-navy);
}

.gallery-page-heading p {
    margin: 0;
    color: var(--admin-muted);
    font-size: .9rem;
}


/* =========================================================
   ALERT
========================================================= */

.gallery-alert {
    margin-bottom: 20px;
    padding: 13px 16px;
    border-radius: 10px;
    font-size: .84rem;
    font-weight: 600;
}

.gallery-alert-success {
    background: #ECFDF5;
    border: 1px solid #C9F0DF;
    color: #087A53;
}

.gallery-alert-error {
    background: #FFF5F5;
    border: 1px solid #F3CCCC;
    color: #B83232;
}


/* =========================================================
   STATISTICS
========================================================= */

.gallery-stats {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 16px;
    margin-bottom: 24px;
}

.gallery-stat-card {
    padding: 20px 22px;
    border-radius: 14px;
    border: 1px solid transparent;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.gallery-stat-content {
    min-width: 0;
}

.gallery-stat-label {
    margin-bottom: 6px;
    font-size: .68rem;
    font-weight: 800;
    letter-spacing: .05em;
    text-transform: uppercase;
}

.gallery-stat-value {
    margin: 0;
    font-size: 1.5rem;
    line-height: 1.1;
    font-weight: 800;
}

.gallery-stat-description {
    margin-top: 4px;
    font-size: .74rem;
}

.gallery-stat-icon {
    width: 42px;
    height: 42px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 10px;
    font-size: 1.1rem;
}

/* Kartu 1 - Biru */
.gallery-stat-blue {
    background: #EEF4FF;
    border-color: #DCE8FF;
}
.gallery-stat-blue .gallery-stat-label,
.gallery-stat-blue .gallery-stat-description {
    color: #5B7FB8;
}
.gallery-stat-blue .gallery-stat-value {
    color: #1E4FA0;
}
.gallery-stat-blue .gallery-stat-icon {
    background: #DCE8FF;
    color: #2563EB;
}

/* Kartu 2 - Ungu */
.gallery-stat-purple {
    background: #F5F0FF;
    border-color: #E5D8FF;
}
.gallery-stat-purple .gallery-stat-label,
.gallery-stat-purple .gallery-stat-description {
    color: #9482C4;
}
.gallery-stat-purple .gallery-stat-value {
    color: #6B3FBF;
}
.gallery-stat-purple .gallery-stat-icon {
    background: #E5D8FF;
    color: #7C3AED;
}

/* Kartu 3 - Oranye */
.gallery-stat-orange {
    background: #FFF6EC;
    border-color: #FFE3C2;
}
.gallery-stat-orange .gallery-stat-label,
.gallery-stat-orange .gallery-stat-description {
    color: #C79154;
}
.gallery-stat-orange .gallery-stat-value {
    color: #B4650F;
}
.gallery-stat-orange .gallery-stat-icon {
    background: #FFE3C2;
    color: #E8830A;
}


/* =========================================================
   CARD
========================================================= */

.gallery-card {
    background: #fff;
    border: 1px solid #E3EAF3;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 6px 20px rgba(18, 38, 63, .05);
}

.gallery-card-header {
    padding: 22px 24px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
    border-bottom: 1px solid #E8EDF4;
}

.gallery-card-title {
    margin: 0;
    font-size: 1.15rem;
    font-weight: 750;
    color: var(--admin-navy);
}

.gallery-card-count {
    margin: 5px 0 0;
    font-size: .82rem;
    color: var(--admin-muted);
}


/* =========================================================
   TOOLS
========================================================= */

.gallery-card-tools {
    display: flex;
    align-items: center;
    gap: 9px;
    flex-shrink: 0;
}

.gallery-search {
    position: relative;
    width: 285px;
}

.gallery-search-icon {
    position: absolute;
    top: 50%;
    left: 13px;
    transform: translateY(-50%);
    color: #8EA0B5;
    font-size: .9rem;
    pointer-events: none;
}

.gallery-search-input {
    width: 100%;
    height: 38px;
    padding: 0 13px 0 36px;
    border: 1px solid #DCE5EF;
    border-radius: 9px;
    outline: none;
    background: #fff;
    color: var(--admin-navy);
    font-size: .78rem;
    transition: .18s ease;
}

.gallery-search-input::placeholder {
    color: #9AA9BA;
}

.gallery-search-input:focus {
    border-color: #AFC6E8;
    box-shadow: 0 0 0 3px rgba(37, 99, 235, .07);
}

.gallery-filter {
    height: 38px;
    min-width: 145px;
    padding: 0 34px 0 12px;
    border: 1px solid #DCE5EF;
    border-radius: 9px;
    outline: none;
    background-color: #fff;
    color: #334155;
    font-size: .78rem;
    cursor: pointer;
    transition: .18s ease;
}

.gallery-filter:focus {
    border-color: #AFC6E8;
    box-shadow: 0 0 0 3px rgba(37, 99, 235, .07);
}

.gallery-reset {
    width: 38px;
    height: 38px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border: 1px solid #DCE5EF;
    border-radius: 9px;
    background: #fff;
    color: #718198;
    text-decoration: none;
    transition: .18s ease;
}

.gallery-reset:hover {
    background: #F5F8FC;
    color: var(--admin-primary);
    border-color: #C9D8ED;
}

.btn-tambah-galeri {
    height: 38px;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 0 15px;
    border-radius: 9px;
    background: var(--admin-primary);
    color: #fff !important;
    text-decoration: none !important;
    font-size: .78rem;
    font-weight: 700;
    white-space: nowrap;
    transition: .2s ease;
    box-shadow: 0 5px 14px rgba(37, 99, 235, .18);
}

.btn-tambah-galeri:hover {
    transform: translateY(-1px);
    box-shadow: 0 8px 18px rgba(37, 99, 235, .25);
}


/* =========================================================
   TABLE
========================================================= */

.gallery-table-wrapper {
    width: 100%;
    overflow-x: auto;
}

.gallery-table {
    width: 100%;
    min-width: 900px;
    border-collapse: collapse;
}

.gallery-table thead th {
    padding: 15px 18px;
    background: #F8FAFD;
    border-bottom: 1px solid #E5EBF3;
    color: #708198;
    font-size: .72rem;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: .05em;
    text-align: left;
    white-space: nowrap;
}

.gallery-table tbody td {
    padding: 16px 18px;
    border-bottom: 1px solid #EDF1F6;
    vertical-align: middle;
    background: #fff;
}

.gallery-table tbody tr {
    transition: .18s ease;
}

.gallery-table tbody tr:hover td {
    background: #F9FBFF;
}

.gallery-table tbody tr:last-child td {
    border-bottom: none;
}

.gallery-col-check {
    width: 52px;
    text-align: center !important;
}

.gallery-checkbox {
    width: 18px;
    height: 18px;
    cursor: pointer;
    accent-color: var(--admin-primary);
}

.gallery-number {
    width: 55px;
    color: #8B9AAF;
    font-size: .82rem;
    font-weight: 700;
}


/* =========================================================
   FOTO
========================================================= */

.gallery-photo {
    display: flex;
    align-items: center;
    gap: 14px;
    min-width: 300px;
}

.gallery-thumbnail {
    width: 76px;
    height: 56px;
    flex-shrink: 0;
    border-radius: 10px;
    overflow: hidden;
    background: #EEF3F8;
}

.gallery-thumbnail img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

.gallery-thumbnail-placeholder {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #8CA0B8;
    font-size: 1.2rem;
}

.gallery-photo-info {
    min-width: 0;
}

.gallery-photo-title {
    color: var(--admin-navy);
    font-size: .88rem;
    font-weight: 750;
    line-height: 1.4;
}

.gallery-photo-filename {
    margin-top: 4px;
    color: #8A99AA;
    font-size: .73rem;
}


/* =========================================================
   KATEGORI
========================================================= */

.gallery-category {
    display: inline-flex;
    align-items: center;
    padding: 6px 10px;
    border-radius: 999px;
    font-size: .72rem;
    font-weight: 750;
    white-space: nowrap;
}

.gallery-category-kegiatan {
    background: #EEF4FF;
    color: #376BC8;
}

.gallery-category-prestasi {
    background: #ECFDF5;
    color: #087A53;
}


/* =========================================================
   AKSI
========================================================= */

.gallery-actions {
    display: flex;
    align-items: center;
    gap: 7px;
    white-space: nowrap;
}

.gallery-btn-action {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    padding: 7px 10px;
    border-radius: 8px;
    border: 1px solid transparent;
    text-decoration: none !important;
    font-size: .73rem;
    font-weight: 700;
    cursor: pointer;
    transition: .18s ease;
}

.gallery-btn-edit {
    background: #EEF4FF;
    color: #2563EB !important;
    border-color: #DCE8FF;
}

.gallery-btn-edit:hover {
    background: #E1EBFF;
}

.gallery-btn-view {
    background: #F2F7F4;
    color: #15966A !important;
    border-color: #DDEFE6;
}

.gallery-btn-view:hover {
    background: #E3F4EB;
}


/* =========================================================
   BULK
========================================================= */

.gallery-bulk-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    padding: 17px 24px;
    background: #FBFCFE;
    border-top: 1px solid #E8EDF4;
}

.gallery-selected-info {
    color: #8291A5;
    font-size: .8rem;
}

.gallery-selected-info strong {
    color: var(--admin-navy);
}

.btn-gallery-delete {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 9px 14px;
    border: 1px solid #D9DEE6;
    border-radius: 9px;
    background: #E9EDF2;
    color: #9AA3AF;
    font-size: .78rem;
    font-weight: 750;
    cursor: not-allowed;
    transition: .18s ease;
}

.btn-gallery-delete:disabled {
    background: #E9EDF2;
    border-color: #D9DEE6;
    color: #9AA3AF;
    cursor: not-allowed;
    opacity: 1;
    box-shadow: none;
    transform: none;
}

.btn-gallery-delete.active {
    background: #D14343;
    border-color: #D14343;
    color: #fff;
    cursor: pointer;
}

.btn-gallery-delete.active:hover {
    background: #B83232;
    border-color: #B83232;
}


/* =========================================================
   EMPTY
========================================================= */

.gallery-empty {
    padding: 60px 20px !important;
    text-align: center;
}

.gallery-empty i {
    display: block;
    margin-bottom: 12px;
    font-size: 2rem;
    color: #A8B6C8;
}

.gallery-empty strong {
    display: block;
    color: var(--admin-navy);
    margin-bottom: 5px;
}

.gallery-empty span {
    color: var(--admin-muted);
    font-size: .82rem;
}


/* =========================================================
   PAGINATION
========================================================= */

.gallery-pagination {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
    padding: 18px 24px;
    border-top: 1px solid #E8EDF4;
    background: #fff;
}

.gallery-pagination-info {
    color: #8291A5;
    font-size: .78rem;
}

.gallery-pagination-links {
    display: flex;
    align-items: center;
    gap: 6px;
}

.gallery-pagination-links a,
.gallery-pagination-links span {
    min-width: 34px;
    height: 34px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 0 9px;
    border: 1px solid #E0E7EF;
    border-radius: 8px;
    background: #fff;
    color: #64748B;
    text-decoration: none;
    font-size: .78rem;
    font-weight: 700;
}

.gallery-pagination-links a:hover {
    background: #F5F8FC;
    color: var(--admin-primary);
    border-color: #C9D8ED;
}

.gallery-pagination-links span[aria-current="page"] {
    background: var(--admin-primary);
    border-color: var(--admin-primary);
    color: #fff;
}

.gallery-pagination-links span[aria-disabled="true"] {
    opacity: .45;
    cursor: not-allowed;
}


/* =========================================================
   DELETE MODAL
========================================================= */

.gallery-delete-modal-overlay {
    position: fixed;
    inset: 0;
    z-index: 9998;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    background: rgba(15, 23, 42, .60);
    backdrop-filter: blur(4px);
    opacity: 0;
    visibility: hidden;
    transition: .2s ease;
}

.gallery-delete-modal-overlay.show {
    opacity: 1;
    visibility: visible;
}

.gallery-delete-modal {
    width: min(430px, 100%);
    padding: 30px;
    background: #fff;
    border-radius: 18px;
    text-align: center;
    box-shadow: 0 25px 70px rgba(0, 0, 0, .20);
    transform: translateY(12px) scale(.98);
    transition: .2s ease;
}

.gallery-delete-modal-overlay.show .gallery-delete-modal {
    transform: translateY(0) scale(1);
}

.gallery-delete-icon {
    width: 58px;
    height: 58px;
    margin: 0 auto 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    background: #FFF1F1;
    color: #D14343;
    font-size: 1.35rem;
}

.gallery-delete-modal h3 {
    margin: 0 0 8px;
    color: var(--admin-navy);
    font-size: 1.2rem;
    font-weight: 800;
}

.gallery-delete-modal p {
    margin: 0 auto 24px;
    max-width: 330px;
    color: #7B8BA0;
    font-size: .84rem;
    line-height: 1.6;
}

.gallery-delete-actions {
    display: flex;
    justify-content: center;
    gap: 10px;
}

.gallery-delete-cancel,
.gallery-delete-confirm {
    padding: 10px 17px;
    border-radius: 9px;
    font-size: .8rem;
    font-weight: 750;
    cursor: pointer;
    transition: .18s ease;
}

.gallery-delete-cancel {
    border: 1px solid #DCE3EC;
    background: #fff;
    color: #64748B;
}

.gallery-delete-cancel:hover {
    background: #64748B;
    border-color: #64748B;
    color: #fff;
    transform: translateY(-2px);
}

.gallery-delete-confirm {
    border: 1px solid #E8A9A9;
    background: #fff;
    color: #D14343;
}

.gallery-delete-confirm:hover {
    background: #D14343;
    border-color: #D14343;
    color: #fff;
    transform: translateY(-2px);
}


/* =========================================================
   PREVIEW
========================================================= */

.gallery-preview-overlay {
    position: fixed;
    inset: 0;
    z-index: 9999;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 30px;
    background: rgba(15, 23, 42, .70);
    backdrop-filter: blur(5px);
    opacity: 0;
    visibility: hidden;
    transition: .2s ease;
}

.gallery-preview-overlay.show {
    opacity: 1;
    visibility: visible;
}

.gallery-preview-modal {
    position: relative;
    width: min(850px, 100%);
    max-height: calc(100vh - 60px);
    overflow-y: auto;
    background: #fff;
    border-radius: 20px;
    box-shadow: 0 25px 70px rgba(0, 0, 0, .30);
    transform: translateY(15px) scale(.98);
    transition: .2s ease;
}

.gallery-preview-overlay.show .gallery-preview-modal {
    transform: translateY(0) scale(1);
}

.gallery-preview-close {
    position: absolute;
    top: 16px;
    right: 16px;
    z-index: 5;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: none;
    border-radius: 50%;
    background: rgba(255, 255, 255, .96);
    color: #334155;
    font-size: 16px;
    cursor: pointer;
    box-shadow: 0 4px 14px rgba(0, 0, 0, .15);
    transition: .18s ease;
}

.gallery-preview-close:hover {
    background: #F1F5F9;
    transform: rotate(90deg);
}

.gallery-preview-image {
    width: 100%;
    height: 430px;
    background: #EEF3F8;
    overflow: hidden;
}

.gallery-preview-image img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    display: block;
}

.gallery-preview-content {
    padding: 26px 30px 30px;
}

.gallery-preview-category {
    display: inline-flex;
    align-items: center;
    padding: 6px 11px;
    margin-bottom: 11px;
    border-radius: 999px;
    font-size: .72rem;
    font-weight: 750;
}

.gallery-preview-category.kegiatan {
    background: #EEF4FF;
    color: #376BC8;
}

.gallery-preview-category.prestasi {
    background: #ECFDF5;
    color: #087A53;
}

.gallery-preview-content h2 {
    margin: 0 0 8px;
    color: var(--admin-navy);
    font-size: 1.45rem;
    line-height: 1.35;
    font-weight: 800;
}

.gallery-preview-filename {
    display: flex;
    align-items: center;
    gap: 7px;
    color: #7B8BA0;
    font-size: .8rem;
}

body.modal-open {
    overflow: hidden;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 1100px) {

    .gallery-card-header {
        align-items: flex-start;
        flex-direction: column;
    }

    .gallery-card-tools {
        width: 100%;
    }

    .gallery-search {
        flex: 1;
        width: auto;
    }

}

@media (max-width: 900px) {

    .gallery-stats {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

}

@media (max-width: 800px) {

    .gallery-card-tools {
        flex-wrap: wrap;
    }

    .gallery-search {
        min-width: 200px;
    }

}

@media (max-width: 700px) {

    .gallery-stats {
        grid-template-columns: 1fr;
    }

    .gallery-card-tools {
        flex-direction: column;
        align-items: stretch;
    }

    .gallery-search {
        width: 100%;
    }

    .gallery-filter {
        width: 100%;
    }

    .gallery-reset {
        width: 38px;
        align-self: flex-end;
    }

    .btn-tambah-galeri {
        width: 100%;
        justify-content: center;
    }

    .gallery-bulk-footer {
        align-items: flex-start;
        flex-direction: column;
    }

    .gallery-pagination {
        align-items: flex-start;
        flex-direction: column;
    }

    .gallery-preview-overlay {
        padding: 15px;
    }

    .gallery-preview-modal {
        max-height: calc(100vh - 30px);
        border-radius: 16px;
    }

    .gallery-preview-image {
        height: 280px;
    }

    .gallery-preview-content {
        padding: 22px;
    }

    .gallery-preview-content h2 {
        font-size: 1.2rem;
    }

}

</style>


<div class="gallery-page">

    <div class="gallery-page-heading">

        <h1>Kelola Galeri</h1>

        <p>
            Tambah, edit, lihat, atau hapus foto galeri website.
        </p>

    </div>


    @if (session('success'))

        <div class="gallery-alert gallery-alert-success">

            <i class="bi bi-check-circle-fill me-1"></i>

            {{ session('success') }}

        </div>

    @endif


    @if (session('error'))

        <div class="gallery-alert gallery-alert-error">

            <i class="bi bi-exclamation-circle-fill me-1"></i>

            {{ session('error') }}

        </div>

    @endif


    {{-- =====================================================
         STATISTICS
    ====================================================== --}}

    <div class="gallery-stats">

        <div class="gallery-stat-card gallery-stat-blue">

            <div class="gallery-stat-content">

                <div class="gallery-stat-label">
                    Total Foto
                </div>

                <p class="gallery-stat-value">
                    {{ $totalFoto }}
                </p>

                <div class="gallery-stat-description">
                    Tersimpan di website
                </div>

            </div>

            <div class="gallery-stat-icon">
                <i class="bi bi-images"></i>
            </div>

        </div>


        <div class="gallery-stat-card gallery-stat-purple">

            <div class="gallery-stat-content">

                <div class="gallery-stat-label">
                    Kategori Aktif
                </div>

                <p class="gallery-stat-value">
                    {{ $kategoriAktif }}
                </p>

                <div class="gallery-stat-description">
                    Kegiatan Siswa, Prestasi
                </div>

            </div>

            <div class="gallery-stat-icon">
                <i class="bi bi-folder2-open"></i>
            </div>

        </div>


        <div class="gallery-stat-card gallery-stat-orange">

            <div class="gallery-stat-content">

                <div class="gallery-stat-label">
                    Foto Ditambahkan
                </div>

                <p class="gallery-stat-value">
                    {{ $fotoBulanIni }}
                </p>

                <div class="gallery-stat-description">
                    {{ now()->translatedFormat('F Y') }}
                </div>

            </div>

            <div class="gallery-stat-icon">
                <i class="bi bi-calendar3"></i>
            </div>

        </div>

    </div>


    {{-- =====================================================
         GALLERY CARD
    ====================================================== --}}

    <div class="gallery-card">

        <div class="gallery-card-header">

            <div>

                <h2 class="gallery-card-title">
                    Daftar Galeri
                </h2>

                <p
                    class="gallery-card-count"
                    id="galleryResultInfo"
                >

                    @if ($galeris->total() > 0)

                        Menampilkan
                        {{ $galeris->firstItem() }}
                        -
                        {{ $galeris->lastItem() }}
                        dari
                        {{ $galeris->total() }}
                        foto

                    @else

                        Tidak ada foto ditemukan

                    @endif

                </p>

            </div>


            {{-- =================================================
                 SEARCH
            ================================================== --}}

            <form
                action="{{ route('admin.galeri.index') }}"
                method="GET"
                class="gallery-card-tools"
                id="gallerySearchForm"
            >

                <div
                    class="gallery-search"
                    id="gallerySearchWrapper"
                >

                    <i class="bi bi-search gallery-search-icon"></i>

                    <input
                        type="text"
                        name="search"
                        id="gallerySearchInput"
                        value="{{ $search }}"
                        class="gallery-search-input"
                        placeholder="Cari judul atau nama file..."
                        autocomplete="off"
                    >

                </div>


                <select
                    name="kategori"
                    id="galleryCategoryFilter"
                    class="gallery-filter"
                >

                    <option value="">
                        Semua Kategori
                    </option>

                    <option
                        value="kegiatan"
                        {{ $kategori === 'kegiatan' ? 'selected' : '' }}
                    >
                        Kegiatan Siswa
                    </option>

                    <option
                        value="prestasi"
                        {{ $kategori === 'prestasi' ? 'selected' : '' }}
                    >
                        Prestasi
                    </option>

                </select>


                <a
                    href="{{ route('admin.galeri.index') }}"
                    class="gallery-reset"
                    id="galleryResetButton"
                    title="Reset pencarian"
                    style="{{ $search === '' && $kategori === '' ? 'display:none;' : '' }}"
                >

                    <i class="bi bi-arrow-counterclockwise"></i>

                </a>


                <a
                    href="{{ route('admin.galeri.create') }}"
                    class="btn-tambah-galeri"
                >

                    <i class="bi bi-plus-lg"></i>

                    Tambah Foto

                </a>

            </form>

        </div>


        {{-- =====================================================
             BULK DELETE
        ====================================================== --}}

        <form
            id="bulkGalleryDeleteForm"
            action="{{ route('admin.galeri.bulk-delete') }}"
            method="POST"
        >

            @csrf

            <div class="gallery-table-wrapper">

                <table class="gallery-table">

                    <thead>

                        <tr>

                            <th class="gallery-col-check">

                                <input
                                    type="checkbox"
                                    id="gallerySelectAll"
                                    class="gallery-checkbox"
                                    title="Pilih semua"
                                >

                            </th>

                            <th>#</th>

                            <th>Foto</th>

                            <th>Kategori</th>

                            <th>Dibuat</th>

                            <th>Aksi</th>

                        </tr>

                    </thead>


                    <tbody id="galleryTableBody">

                        @forelse ($galeris as $index => $galeri)

                            <tr>

                                <td class="gallery-col-check">

                                    <input
                                        type="checkbox"
                                        name="selected[]"
                                        value="{{ $galeri->id }}"
                                        class="gallery-checkbox gallery-item-checkbox"
                                    >

                                </td>


                                <td class="gallery-number">

                                    {{ $galeris->firstItem() + $index }}

                                </td>


                                <td>

                                    <div class="gallery-photo">

                                        <div class="gallery-thumbnail">

                                            @if (
                                                file_exists(
                                                    public_path(
                                                        'images/galeri/' . $galeri->gambar
                                                    )
                                                )
                                            )

                                                <img
                                                    src="{{ asset('images/galeri/' . $galeri->gambar) }}"
                                                    alt="{{ $galeri->judul }}"
                                                >

                                            @elseif (
                                                file_exists(
                                                    public_path(
                                                        'images/' . $galeri->gambar
                                                    )
                                                )
                                            )

                                                <img
                                                    src="{{ asset('images/' . $galeri->gambar) }}"
                                                    alt="{{ $galeri->judul }}"
                                                >

                                            @else

                                                <div class="gallery-thumbnail-placeholder">

                                                    <i class="bi bi-image"></i>

                                                </div>

                                            @endif

                                        </div>


                                        <div class="gallery-photo-info">

                                            <div class="gallery-photo-title">
                                                {{ $galeri->judul }}
                                            </div>

                                            <div class="gallery-photo-filename">
                                                {{ $galeri->gambar }}
                                            </div>

                                        </div>

                                    </div>

                                </td>


                                <td>

                                    @if ($galeri->kategori === 'kegiatan')

                                        <span class="gallery-category gallery-category-kegiatan">
                                            Kegiatan Siswa
                                        </span>

                                    @else

                                        <span class="gallery-category gallery-category-prestasi">
                                            Prestasi
                                        </span>

                                    @endif

                                </td>


                                <td>

                                    <span class="berita-date">
                                        {{ $galeri->created_at->translatedFormat('d F Y') }}
                                    </span>

                                </td>


                                <td>

                                    <div class="gallery-actions">

                                        <a
                                            href="{{ route('admin.galeri.edit', $galeri) }}"
                                            class="gallery-btn-action gallery-btn-edit"
                                        >

                                            <i class="bi bi-pencil"></i>

                                            Edit

                                        </a>


                                        <button
                                            type="button"
                                            class="gallery-btn-action gallery-btn-view gallery-preview-button"
                                            data-title="{{ $galeri->judul }}"
                                            data-category="{{ $galeri->kategori }}"
                                            data-image="{{
                                                file_exists(
                                                    public_path(
                                                        'images/galeri/' . $galeri->gambar
                                                    )
                                                )
                                                    ? asset('images/galeri/' . $galeri->gambar)
                                                    : (
                                                        file_exists(
                                                            public_path(
                                                                'images/' . $galeri->gambar
                                                            )
                                                        )
                                                            ? asset('images/' . $galeri->gambar)
                                                            : ''
                                                    )
                                            }}"
                                            data-filename="{{ $galeri->gambar }}"
                                        >

                                            <i class="bi bi-eye"></i>

                                            Lihat

                                        </button>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="6"
                                    class="gallery-empty"
                                >

                                    <i class="bi bi-images"></i>

                                    <strong>

                                        @if ($search !== '' || $kategori !== '')

                                            Foto tidak ditemukan

                                        @else

                                            Belum ada foto galeri

                                        @endif

                                    </strong>

                                    <span>

                                        @if ($search !== '' || $kategori !== '')

                                            Coba ubah kata pencarian atau kategori.

                                        @else

                                            Tambahkan foto galeri pertama kamu.

                                        @endif

                                    </span>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            <div
                class="gallery-bulk-footer"
                id="galleryBulkFooter"
                style="{{ $galeris->count() === 0 ? 'display:none;' : '' }}"
            >

                <div class="gallery-selected-info">

                    <strong id="gallerySelectedCount">
                        0
                    </strong>

                    foto dipilih

                </div>


                <button
                    type="button"
                    id="galleryBulkDeleteButton"
                    class="btn-gallery-delete"
                    disabled
                >

                    <i class="bi bi-trash3"></i>

                    Hapus Terpilih

                </button>

            </div>

        </form>


        {{-- =====================================================
             PAGINATION
        ====================================================== --}}

        @if ($galeris->hasPages())

            <div
                class="gallery-pagination"
                id="galleryPagination"
            >

                <div class="gallery-pagination-info">

                    Menampilkan
                    {{ $galeris->firstItem() }}
                    -
                    {{ $galeris->lastItem() }}
                    dari
                    {{ $galeris->total() }}
                    foto

                </div>


                <div class="gallery-pagination-links">

                    @if ($galeris->onFirstPage())

                        <span aria-disabled="true">
                            <i class="bi bi-chevron-left"></i>
                        </span>

                    @else

                        <a
                            href="{{ $galeris->previousPageUrl() }}"
                            rel="prev"
                        >

                            <i class="bi bi-chevron-left"></i>

                        </a>

                    @endif


                    @foreach (
                        $galeris->getUrlRange(
                            max(1, $galeris->currentPage() - 2),
                            min($galeris->lastPage(), $galeris->currentPage() + 2)
                        ) as $page => $url
                    )

                        @if ($page == $galeris->currentPage())

                            <span aria-current="page">
                                {{ $page }}
                            </span>

                        @else

                            <a href="{{ $url }}">
                                {{ $page }}
                            </a>

                        @endif

                    @endforeach


                    @if ($galeris->hasMorePages())

                        <a
                            href="{{ $galeris->nextPageUrl() }}"
                            rel="next"
                        >

                            <i class="bi bi-chevron-right"></i>

                        </a>

                    @else

                        <span aria-disabled="true">

                            <i class="bi bi-chevron-right"></i>

                        </span>

                    @endif

                </div>

            </div>

        @endif

    </div>

</div>


{{-- =========================================================
     DELETE MODAL
========================================================= --}}

<div
    id="galleryDeleteModal"
    class="gallery-delete-modal-overlay"
>

    <div class="gallery-delete-modal">

        <div class="gallery-delete-icon">
            <i class="bi bi-trash3"></i>
        </div>

        <h3>
            Hapus Foto?
        </h3>

        <p>
            Foto galeri yang dipilih akan dihapus dari sistem.
            Tindakan ini tidak dapat dibatalkan.
        </p>

        <div class="gallery-delete-actions">

            <button
                type="button"
                class="gallery-delete-cancel"
                id="galleryDeleteCancel"
            >
                Batal
            </button>

            <button
                type="button"
                class="gallery-delete-confirm"
                id="galleryDeleteConfirm"
            >

                <i class="bi bi-trash3"></i>

                Hapus Foto

            </button>

        </div>

    </div>

</div>


{{-- =========================================================
     PREVIEW MODAL
========================================================= --}}

<div
    id="galleryPreviewModal"
    class="gallery-preview-overlay"
>

    <div class="gallery-preview-modal">

        <button
            type="button"
            id="galleryPreviewClose"
            class="gallery-preview-close"
        >

            <i class="bi bi-x-lg"></i>

        </button>


        <div class="gallery-preview-image">

            <img
                id="galleryPreviewImage"
                src=""
                alt=""
            >

        </div>


        <div class="gallery-preview-content">

            <span
                id="galleryPreviewCategory"
                class="gallery-preview-category"
            >
                -
            </span>

            <h2 id="galleryPreviewTitle">
                -
            </h2>

            <div class="gallery-preview-filename">

                <i class="bi bi-image"></i>

                <span id="galleryPreviewFilename">
                    -
                </span>

            </div>

        </div>

    </div>

</div>


<script>

document.addEventListener('DOMContentLoaded', function () {

    /* =====================================================
       ELEMENTS
    ===================================================== */

    const gallerySelectAll =
        document.getElementById('gallerySelectAll');

    const galleryTableBody =
        document.getElementById('galleryTableBody');

    const gallerySelectedCount =
        document.getElementById('gallerySelectedCount');

    const galleryBulkDeleteButton =
        document.getElementById('galleryBulkDeleteButton');

    const galleryBulkFooter =
        document.getElementById('galleryBulkFooter');

    const bulkGalleryDeleteForm =
        document.getElementById('bulkGalleryDeleteForm');

    const galleryDeleteModal =
        document.getElementById('galleryDeleteModal');

    const galleryDeleteCancel =
        document.getElementById('galleryDeleteCancel');

    const galleryDeleteConfirm =
        document.getElementById('galleryDeleteConfirm');

    const galleryPreviewModal =
        document.getElementById('galleryPreviewModal');

    const galleryPreviewClose =
        document.getElementById('galleryPreviewClose');

    const galleryPreviewImage =
        document.getElementById('galleryPreviewImage');

    const galleryPreviewTitle =
        document.getElementById('galleryPreviewTitle');

    const galleryPreviewCategory =
        document.getElementById('galleryPreviewCategory');

    const galleryPreviewFilename =
        document.getElementById('galleryPreviewFilename');

    const gallerySearchInput =
        document.getElementById('gallerySearchInput');

    const gallerySearchForm =
        document.getElementById('gallerySearchForm');

    const galleryResultInfo =
        document.getElementById('galleryResultInfo');

    const galleryPagination =
        document.getElementById('galleryPagination');

    const galleryResetButton =
        document.getElementById('galleryResetButton');

    const galleryCategoryFilter =
        document.getElementById('galleryCategoryFilter');


    /* =====================================================
       SEARCH REQUEST
       
       TIDAK ADA:
       - setTimeout
       - debounce
       - spinner
       - loading
       
       SETIAP INPUT LANGSUNG REQUEST.
    ===================================================== */

    let gallerySearchController = null;

    let gallerySearchRequestId = 0;


    /* =====================================================
       CHECKBOX
    ===================================================== */

    function getGalleryCheckboxes() {

        if (!galleryTableBody) {
            return [];
        }

        return Array.from(
            galleryTableBody.querySelectorAll(
                '.gallery-item-checkbox'
            )
        );

    }


    function updateGallerySelectedCount() {

        const checkboxes =
            getGalleryCheckboxes();

        const checked =
            checkboxes.filter(
                function (checkbox) {
                    return checkbox.checked;
                }
            );

        const count =
            checked.length;


        if (gallerySelectedCount) {

            gallerySelectedCount.textContent =
                count;

        }


        if (gallerySelectAll) {

            gallerySelectAll.checked =
                checkboxes.length > 0 &&
                count === checkboxes.length;

            gallerySelectAll.indeterminate =
                count > 0 &&
                count < checkboxes.length;

        }


        if (galleryBulkDeleteButton) {

            const hasSelection =
                count > 0;

            galleryBulkDeleteButton.disabled =
                !hasSelection;

            galleryBulkDeleteButton.classList.toggle(
                'active',
                hasSelection
            );

        }

    }


    if (gallerySelectAll) {

        gallerySelectAll.addEventListener(
            'change',
            function () {

                getGalleryCheckboxes().forEach(
                    function (checkbox) {

                        checkbox.checked =
                            gallerySelectAll.checked;

                    }
                );

                updateGallerySelectedCount();

            }
        );

    }


    if (galleryTableBody) {

        galleryTableBody.addEventListener(
            'change',
            function (event) {

                if (
                    event.target.classList.contains(
                        'gallery-item-checkbox'
                    )
                ) {

                    updateGallerySelectedCount();

                }

            }
        );

    }


    /* =====================================================
       DELETE MODAL
    ===================================================== */

    function closeGalleryDeleteModal() {

        if (!galleryDeleteModal) {
            return;
        }

        galleryDeleteModal.classList.remove('show');

        document.body.classList.remove('modal-open');

    }


    if (galleryBulkDeleteButton) {

        galleryBulkDeleteButton.addEventListener(
            'click',
            function () {

                const selected =
                    getGalleryCheckboxes().filter(
                        function (checkbox) {
                            return checkbox.checked;
                        }
                    );

                if (selected.length === 0) {
                    return;
                }

                galleryDeleteModal.classList.add('show');

                document.body.classList.add(
                    'modal-open'
                );

            }
        );

    }


    if (galleryDeleteCancel) {

        galleryDeleteCancel.addEventListener(
            'click',
            closeGalleryDeleteModal
        );

    }


    if (galleryDeleteConfirm) {

        galleryDeleteConfirm.addEventListener(
            'click',
            function () {

                if (bulkGalleryDeleteForm) {

                    bulkGalleryDeleteForm.submit();

                }

            }
        );

    }


    if (galleryDeleteModal) {

        galleryDeleteModal.addEventListener(
            'click',
            function (event) {

                if (
                    event.target ===
                    galleryDeleteModal
                ) {

                    closeGalleryDeleteModal();

                }

            }
        );

    }


    /* =====================================================
       PREVIEW
    ===================================================== */

    function openGalleryPreview(button) {

        const image =
            button.dataset.image || '';

        const title =
            button.dataset.title || '-';

        const category =
            button.dataset.category || '';

        const filename =
            button.dataset.filename || '-';


        if (galleryPreviewImage) {

            galleryPreviewImage.src =
                image;

            galleryPreviewImage.alt =
                title;

        }


        if (galleryPreviewTitle) {

            galleryPreviewTitle.textContent =
                title;

        }


        if (galleryPreviewFilename) {

            galleryPreviewFilename.textContent =
                filename;

        }


        if (galleryPreviewCategory) {

            galleryPreviewCategory.textContent =
                category === 'kegiatan'
                    ? 'Kegiatan Siswa'
                    : 'Prestasi';

            galleryPreviewCategory.className =
                'gallery-preview-category ' +
                category;

        }


        galleryPreviewModal.classList.add(
            'show'
        );

        document.body.classList.add(
            'modal-open'
        );

    }


    if (galleryTableBody) {

        galleryTableBody.addEventListener(
            'click',
            function (event) {

                const button =
                    event.target.closest(
                        '.gallery-preview-button'
                    );

                if (!button) {
                    return;
                }

                openGalleryPreview(button);

            }
        );

    }


    function closeGalleryPreview() {

        galleryPreviewModal.classList.remove(
            'show'
        );

        document.body.classList.remove(
            'modal-open'
        );

        if (galleryPreviewImage) {

            galleryPreviewImage.src = '';

        }

    }


    if (galleryPreviewClose) {

        galleryPreviewClose.addEventListener(
            'click',
            closeGalleryPreview
        );

    }


    if (galleryPreviewModal) {

        galleryPreviewModal.addEventListener(
            'click',
            function (event) {

                if (
                    event.target ===
                    galleryPreviewModal
                ) {

                    closeGalleryPreview();

                }

            }
        );

    }


    document.addEventListener(
        'keydown',
        function (event) {

            if (event.key !== 'Escape') {
                return;
            }

            closeGalleryPreview();

            closeGalleryDeleteModal();

        }
    );


    /* =====================================================
       ESCAPE HTML
    ===================================================== */

    function escapeHtml(value) {

        const div =
            document.createElement('div');

        div.textContent =
            value ?? '';

        return div.innerHTML;

    }


    /* =====================================================
       RESULT INFO
    ===================================================== */

    function updateResultInfo(count) {

        if (!galleryResultInfo) {
            return;
        }

        if (count === 0) {

            galleryResultInfo.textContent =
                'Tidak ada foto ditemukan';

            return;

        }

        galleryResultInfo.textContent =
            `Ditemukan ${count} foto`;

    }


    /* =====================================================
       BULK FOOTER
    ===================================================== */

    function updateBulkFooter(hasResults) {

        if (!galleryBulkFooter) {
            return;
        }

        galleryBulkFooter.style.display =
            hasResults
                ? 'flex'
                : 'none';

    }


    /* =====================================================
       RENDER EMPTY
    ===================================================== */

    function renderEmptyGalleryResults() {

        galleryTableBody.innerHTML = `

            <tr>

                <td
                    colspan="6"
                    class="gallery-empty"
                >

                    <i class="bi bi-images"></i>

                    <strong>
                        Foto tidak ditemukan
                    </strong>

                    <span>
                        Coba ubah kata pencarian atau kategori.
                    </span>

                </td>

            </tr>

        `;


        if (gallerySelectAll) {

            gallerySelectAll.checked =
                false;

            gallerySelectAll.indeterminate =
                false;

        }


        updateBulkFooter(false);

        updateGallerySelectedCount();

    }


    /* =====================================================
       RENDER RESULTS
    ===================================================== */

    function renderGalleryResults(galeris) {

        if (!galleryTableBody) {
            return;
        }


        if (
            !galeris ||
            galeris.length === 0
        ) {

            renderEmptyGalleryResults();

            return;

        }


        let html = '';


        galeris.forEach(
            function (galeri, index) {

                const title =
                    escapeHtml(
                        galeri.judul
                    );

                const filename =
                    escapeHtml(
                        galeri.gambar
                    );

                const imageUrl =
                    escapeHtml(
                        galeri.image_url || ''
                    );

                const category =
                    escapeHtml(
                        galeri.kategori
                    );

                const createdAt =
                    escapeHtml(
                        galeri.created_at
                    );

                const editUrl =
                    escapeHtml(
                        galeri.edit_url
                    );

                const categoryLabel =
                    galeri.kategori === 'kegiatan'
                        ? 'Kegiatan Siswa'
                        : 'Prestasi';

                const categoryClass =
                    galeri.kategori === 'kegiatan'
                        ? 'gallery-category-kegiatan'
                        : 'gallery-category-prestasi';


                html += `

                    <tr>

                        <td class="gallery-col-check">

                            <input
                                type="checkbox"
                                name="selected[]"
                                value="${galeri.id}"
                                class="gallery-checkbox gallery-item-checkbox"
                            >

                        </td>


                        <td class="gallery-number">

                            ${index + 1}

                        </td>


                        <td>

                            <div class="gallery-photo">

                                <div class="gallery-thumbnail">

                                    ${
                                        imageUrl
                                            ? `
                                                <img
                                                    src="${imageUrl}"
                                                    alt="${title}"
                                                >
                                            `
                                            : `
                                                <div class="gallery-thumbnail-placeholder">

                                                    <i class="bi bi-image"></i>

                                                </div>
                                            `
                                    }

                                </div>


                                <div class="gallery-photo-info">

                                    <div class="gallery-photo-title">

                                        ${title}

                                    </div>

                                    <div class="gallery-photo-filename">

                                        ${filename}

                                    </div>

                                </div>

                            </div>

                        </td>


                        <td>

                            <span
                                class="gallery-category ${categoryClass}"
                            >

                                ${categoryLabel}

                            </span>

                        </td>


                        <td>

                            <span class="berita-date">

                                ${createdAt}

                            </span>

                        </td>


                        <td>

                            <div class="gallery-actions">

                                <a
                                    href="${editUrl}"
                                    class="gallery-btn-action gallery-btn-edit"
                                >

                                    <i class="bi bi-pencil"></i>

                                    Edit

                                </a>


                                <button
                                    type="button"
                                    class="gallery-btn-action gallery-btn-view gallery-preview-button"
                                    data-title="${title}"
                                    data-category="${category}"
                                    data-image="${imageUrl}"
                                    data-filename="${filename}"
                                >

                                    <i class="bi bi-eye"></i>

                                    Lihat

                                </button>

                            </div>

                        </td>

                    </tr>

                `;

            }
        );


        galleryTableBody.innerHTML =
            html;


        updateBulkFooter(true);

        updateGallerySelectedCount();

    }


    /* =====================================================
       REALTIME SEARCH
       
       INI BAGIAN UTAMANYA.
       
       Tidak ada:
       - debounce
       - timeout
       - spinner
       - reload
       - location.href
       
       Setiap karakter -> fetch langsung.
    ===================================================== */

    function performGallerySearch() {

        const keyword =
            gallerySearchInput
                ? gallerySearchInput.value.trim()
                : '';

        const kategori =
            galleryCategoryFilter
                ? galleryCategoryFilter.value
                : '';


        /* -----------------------------------------------
           Batalkan request sebelumnya
        ------------------------------------------------ */

        if (gallerySearchController) {

            gallerySearchController.abort();

        }


        gallerySearchController =
            new AbortController();


        const requestId =
            ++gallerySearchRequestId;


        /* -----------------------------------------------
           Parameter
        ------------------------------------------------ */

        const params =
            new URLSearchParams();


        if (keyword !== '') {

            params.set(
                'search',
                keyword
            );

        }


        if (kategori !== '') {

            params.set(
                'kategori',
                kategori
            );

        }


        /* -----------------------------------------------
           Reset button
        ------------------------------------------------ */

        if (galleryResetButton) {

            galleryResetButton.style.display =
                (
                    keyword !== '' ||
                    kategori !== ''
                )
                    ? 'inline-flex'
                    : 'none';

        }


        /* -----------------------------------------------
           AJAX LANGSUNG
           
           Bahkan ketika keyword kosong,
           request tetap dikirim.
           
           Jadi hapus search:
           
           "barak"
           ↓
           "bara"
           ↓
           "bar"
           ↓
           "ba"
           ↓
           "b"
           ↓
           ""
           
           semuanya request AJAX.
        ------------------------------------------------ */

        fetch(
            "{{ route('admin.galeri.search') }}?" +
            params.toString(),
            {
                method: 'GET',

                signal:
                    gallerySearchController.signal,

                headers: {
                    'X-Requested-With':
                        'XMLHttpRequest',

                    'Accept':
                        'application/json'
                },

                cache: 'no-store'
            }
        )
        .then(
            function (response) {

                if (!response.ok) {

                    throw new Error(
                        'Gagal mengambil data galeri.'
                    );

                }

                return response.json();

            }
        )
        .then(
            function (data) {

                /*
                 * Kalau ini bukan request terbaru,
                 * abaikan hasilnya.
                 */

                if (
                    requestId !==
                    gallerySearchRequestId
                ) {

                    return;

                }


                const galeris =
                    data.galeris || [];


                renderGalleryResults(
                    galeris
                );


                updateResultInfo(
                    galeris.length
                );


                /*
                 * Search AJAX mengambil seluruh
                 * hasil database, bukan paginate().
                 */

                if (galleryPagination) {

                    galleryPagination.style.display =
                        'none';

                }

            }
        )
        .catch(
            function (error) {

                /*
                 * Abort request lama = normal.
                 */

                if (
                    error.name ===
                    'AbortError'
                ) {

                    return;

                }


                console.error(
                    'Gallery search error:',
                    error
                );

            }
        );

    }


    /* =====================================================
       SEARCH INPUT
       
       INPUT = LANGSUNG SEARCH
    ===================================================== */

    if (gallerySearchInput) {

        gallerySearchInput.addEventListener(
            'input',
            function () {

                performGallerySearch();

            }
        );


        gallerySearchInput.addEventListener(
            'keydown',
            function (event) {

                if (event.key === 'Enter') {

                    event.preventDefault();

                }

            }
        );

    }


    /* =====================================================
       CATEGORY
       
       Juga AJAX, jadi tidak reload halaman.
    ===================================================== */

    if (galleryCategoryFilter) {

        galleryCategoryFilter.addEventListener(
            'change',
            function () {

                performGallerySearch();

            }
        );

    }


    /* =====================================================
       RESET
       
       Tidak reload.
       
       Klik reset:
       input kosong
       kategori kosong
       AJAX -> semua database
    ===================================================== */

    if (galleryResetButton) {

        galleryResetButton.addEventListener(
            'click',
            function (event) {

                event.preventDefault();


                if (gallerySearchInput) {

                    gallerySearchInput.value =
                        '';

                }


                if (galleryCategoryFilter) {

                    galleryCategoryFilter.value =
                        '';

                }


                performGallerySearch();

            }
        );

    }


    /* =====================================================
       FORM
       
       Cegah Enter / submit GET normal.
    ===================================================== */

    if (gallerySearchForm) {

        gallerySearchForm.addEventListener(
            'submit',
            function (event) {

                event.preventDefault();

                performGallerySearch();

            }
        );

    }


    /* =====================================================
       INITIAL
    ===================================================== */

    updateGallerySelectedCount();

});

</script>

@endsection