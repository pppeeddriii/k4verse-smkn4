@extends('layouts.admin')

@section('title', 'Kelola Produk - Admin')
@section('page-title', 'Kelola Produk')

@section('content')

<style>

/* =========================================================
   PAGE
========================================================= */

.produk-page {
    width: 100%;
}

.produk-page-heading {
    margin-bottom: 24px;
}

.produk-page-heading h1 {
    margin: 0 0 6px;
    font-size: 1.65rem;
    font-weight: 800;
    color: var(--admin-navy);
}

.produk-page-heading p {
    margin: 0;
    color: var(--admin-muted);
    font-size: .9rem;
}


/* =========================================================
   ALERT
========================================================= */

.produk-alert {
    margin-bottom: 20px;
    padding: 13px 16px;
    border-radius: 10px;
    font-size: .84rem;
    font-weight: 600;
}

.produk-alert-success {
    background: #ECFDF5;
    border: 1px solid #C9F0DF;
    color: #087A53;
}

.produk-alert-error {
    background: #FFF5F5;
    border: 1px solid #F3CCCC;
    color: #B83232;
}


/* =========================================================
   STATISTICS
========================================================= */

.produk-stats {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 16px;
    margin-bottom: 24px;
}

.produk-stat-card {
    padding: 20px 22px;
    border-radius: 14px;
    border: 1px solid transparent;

    display: flex;
    align-items: center;
    justify-content: space-between;
}

.produk-stat-content {
    min-width: 0;
}

.produk-stat-label {
    margin-bottom: 6px;
    font-size: .68rem;
    font-weight: 800;
    letter-spacing: .05em;
    text-transform: uppercase;
}

.produk-stat-value {
    margin: 0;
    font-size: 1.5rem;
    line-height: 1.1;
    font-weight: 800;
}

.produk-stat-description {
    margin-top: 4px;
    font-size: .74rem;
}

.produk-stat-icon {
    width: 42px;
    height: 42px;
    flex-shrink: 0;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 10px;
    font-size: 1.1rem;
}

.produk-stat-blue {
    background: #EEF4FF;
    border-color: #DCE8FF;
}

.produk-stat-blue .produk-stat-label,
.produk-stat-blue .produk-stat-description {
    color: #5B7FB8;
}

.produk-stat-blue .produk-stat-value {
    color: #1E4FA0;
}

.produk-stat-blue .produk-stat-icon {
    background: #DCE8FF;
    color: #2563EB;
}

.produk-stat-purple {
    background: #F5F0FF;
    border-color: #E5D8FF;
}

.produk-stat-purple .produk-stat-label,
.produk-stat-purple .produk-stat-description {
    color: #9482C4;
}

.produk-stat-purple .produk-stat-value {
    color: #6B3FBF;
}

.produk-stat-purple .produk-stat-icon {
    background: #E5D8FF;
    color: #7C3AED;
}

.produk-stat-orange {
    background: #FFF6EC;
    border-color: #FFE3C2;
}

.produk-stat-orange .produk-stat-label,
.produk-stat-orange .produk-stat-description {
    color: #C79154;
}

.produk-stat-orange .produk-stat-value {
    color: #B4650F;
}

.produk-stat-orange .produk-stat-icon {
    background: #FFE3C2;
    color: #E8830A;
}


/* =========================================================
   CARD
========================================================= */

.produk-card {
    background: #fff;
    border: 1px solid #E3EAF3;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 6px 20px rgba(18, 38, 63, .05);
}

.produk-card-header {
    padding: 22px 24px;

    display: flex;
    align-items: center;
    justify-content: space-between;

    gap: 20px;

    border-bottom: 1px solid #E8EDF4;
}

.produk-card-title {
    margin: 0;
    font-size: 1.15rem;
    font-weight: 750;
    color: var(--admin-navy);
}

.produk-card-count {
    margin: 5px 0 0;
    font-size: .82rem;
    color: var(--admin-muted);
}


/* =========================================================
   TOOLS
========================================================= */

.produk-card-tools {
    display: flex;
    align-items: center;
    gap: 9px;
    flex-shrink: 0;
}

.produk-search {
    position: relative;
    width: 285px;
}

.produk-search-icon {
    position: absolute;
    top: 50%;
    left: 13px;

    transform: translateY(-50%);

    color: #8EA0B5;
    font-size: .9rem;

    pointer-events: none;
}

.produk-search-input {
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

.produk-search-input::placeholder {
    color: #9AA9BA;
}

.produk-search-input:focus {
    border-color: #AFC6E8;
    box-shadow: 0 0 0 3px rgba(37, 99, 235, .07);
}


/* =========================================================
   FILTER
========================================================= */

.produk-filter {
    height: 38px;

    padding: 0 32px 0 11px;

    border: 1px solid #DCE5EF;
    border-radius: 9px;

    outline: none;

    background: #fff;
    color: #60748A;

    font-size: .76rem;
    font-weight: 600;

    cursor: pointer;
}

.produk-filter:focus {
    border-color: #AFC6E8;
    box-shadow: 0 0 0 3px rgba(37, 99, 235, .07);
}


/* =========================================================
   BUTTON TAMBAH
========================================================= */

.btn-tambah-produk {
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

.btn-tambah-produk:hover {
    transform: translateY(-1px);
    box-shadow: 0 8px 18px rgba(37, 99, 235, .25);
}


/* =========================================================
   TABLE
========================================================= */

.produk-table-wrapper {
    width: 100%;
    overflow-x: auto;
}

.produk-table {
    width: 100%;
    min-width: 950px;
    border-collapse: collapse;
}

.produk-table thead th {
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

.produk-table tbody td {
    padding: 16px 18px;

    border-bottom: 1px solid #EDF1F6;

    vertical-align: middle;

    background: #fff;
}

.produk-table tbody tr {
    transition: .18s ease;
}

.produk-table tbody tr:hover td {
    background: #F9FBFF;
}

.produk-table tbody tr:last-child td {
    border-bottom: none;
}


/* =========================================================
   CHECKBOX
========================================================= */

.produk-checkbox-cell {
    width: 48px;
    text-align: center !important;
}

.produk-checkbox {
    width: 16px;
    height: 16px;

    margin: 0;

    cursor: pointer;

    accent-color: #2563EB;
}


/* =========================================================
   FOTO
========================================================= */

.produk-photo {
    display: flex;
    align-items: center;
    gap: 14px;

    min-width: 250px;
}

.produk-thumbnail {
    width: 76px;
    height: 56px;

    flex-shrink: 0;

    border-radius: 10px;

    overflow: hidden;

    background: #EEF3F8;
}

.produk-thumbnail img {
    width: 100%;
    height: 100%;

    object-fit: cover;

    display: block;
}

.produk-thumbnail-placeholder {
    width: 100%;
    height: 100%;

    display: flex;
    align-items: center;
    justify-content: center;

    color: #8CA0B8;

    font-size: 1.2rem;
}


/* =========================================================
   NAMA
========================================================= */

.produk-photo-info {
    min-width: 0;
}

.produk-photo-title {
    color: var(--admin-navy);

    font-size: .88rem;
    font-weight: 750;

    line-height: 1.4;
}

.produk-photo-filename {
    margin-top: 4px;

    color: #8A99AA;

    font-size: .73rem;

    max-width: 300px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}


/* =========================================================
   KATEGORI
========================================================= */

.produk-kategori {
    display: inline-flex;
    align-items: center;

    padding: 6px 10px;

    border-radius: 999px;

    background: #EEF4FF;
    color: #376BC8;

    font-size: .72rem;
    font-weight: 750;

    white-space: nowrap;
}

.produk-kategori-description {
    display: block;

    margin-top: 5px;

    color: #8A99AA;

    font-size: .68rem;
}


/* =========================================================
   INFORMASI
========================================================= */

.produk-info {
    max-width: 330px;

    color: #64748B;

    font-size: .78rem;
    line-height: 1.55;
}

.produk-info-empty {
    color: #A0ACBA;
}


/* =========================================================
   AKSI
========================================================= */

.produk-actions {
    display: flex;
    align-items: center;

    gap: 7px;

    white-space: nowrap;
}

.produk-btn-action {
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

.produk-btn-edit {
    background: #EEF4FF;
    color: #2563EB !important;
    border-color: #DCE8FF;
}

.produk-btn-edit:hover {
    background: #E1EBFF;
}

.produk-btn-view {
    background: #F2F7F4;
    color: #15966A !important;
    border-color: #DDEFE6;
}

.produk-btn-view:hover {
    background: #E3F4EB;
}


/* =========================================================
   EMPTY
========================================================= */

.produk-empty {
    padding: 60px 20px !important;

    text-align: center;
}

.produk-empty i {
    display: block;

    margin-bottom: 12px;

    font-size: 2rem;

    color: #A8B6C8;
}

.produk-empty strong {
    display: block;

    color: var(--admin-navy);

    margin-bottom: 5px;
}

.produk-empty span {
    color: var(--admin-muted);

    font-size: .82rem;
}


/* =========================================================
   BULK FOOTER
========================================================= */

.produk-bulk-footer {
    min-height: 72px;

    padding: 15px 18px;

    display: flex;
    align-items: center;
    justify-content: space-between;

    border-top: 1px solid #E8EDF4;

    background: #fff;
}

.produk-selected-info {
    color: #718096;
    font-size: .78rem;
}

.produk-selected-info strong {
    color: var(--admin-navy);
    font-weight: 800;
}

.produk-bulk-delete {
    height: 38px;

    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 7px;

    padding: 0 13px;

    border: 1px solid #DCE3EC;
    border-radius: 9px;

    background: #EEF2F6;
    color: #94A3B8;

    font-size: .76rem;
    font-weight: 700;

    cursor: not-allowed;

    transition: .18s ease;
}

.produk-bulk-delete.active {
    background: #D14343;
    border-color: #D14343;
    color: #fff;

    cursor: pointer;

    box-shadow: 0 5px 14px rgba(209, 67, 67, .16);
}

.produk-bulk-delete.active:hover {
    background: #BE3838;
    border-color: #BE3838;
}


/* =========================================================
   PAGINATION
========================================================= */

.produk-pagination {
    padding: 16px 18px;

    display: flex;
    align-items: center;
    justify-content: space-between;

    border-top: 1px solid #E8EDF4;

    background: #fff;
}

.produk-pagination-info {
    color: #718096;
    font-size: .78rem;
}

.produk-pagination-links {
    display: flex;
    align-items: center;
    gap: 6px;
}

.produk-pagination-links a,
.produk-pagination-links span {
    min-width: 34px;
    height: 34px;

    display: inline-flex;
    align-items: center;
    justify-content: center;

    padding: 0 8px;

    border: 1px solid #DCE5EF;
    border-radius: 8px;

    background: #fff;

    color: #60748A;

    font-size: .76rem;
    font-weight: 700;

    text-decoration: none;
}

.produk-pagination-links .active {
    background: #0B4385;
    border-color: #0B4385;
    color: #fff;
}

.produk-pagination-links .disabled {
    color: #C1CBD7;
    background: #F8FAFD;
}


/* =========================================================
   PREVIEW MODAL
========================================================= */

.produk-preview-overlay {
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

.produk-preview-overlay.show {
    opacity: 1;
    visibility: visible;
}

.produk-preview-modal {
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

.produk-preview-overlay.show .produk-preview-modal {
    transform: translateY(0) scale(1);
}

.produk-preview-close {
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

    cursor: pointer;

    box-shadow: 0 4px 14px rgba(0, 0, 0, .15);
}

.produk-preview-image {
    width: 100%;
    height: 430px;

    background: #EEF3F8;

    overflow: hidden;
}

.produk-preview-image img {
    width: 100%;
    height: 100%;

    object-fit: contain;

    display: block;
}

.produk-preview-content {
    padding: 26px 30px 30px;
}

.produk-preview-jurusan {
    display: inline-flex;
    align-items: center;

    padding: 6px 11px;

    margin-bottom: 11px;

    border-radius: 999px;

    background: #EEF4FF;
    color: #376BC8;

    font-size: .72rem;
    font-weight: 750;
}

.produk-preview-content h2 {
    margin: 0 0 10px;

    color: var(--admin-navy);

    font-size: 1.45rem;
    line-height: 1.35;

    font-weight: 800;
}

.produk-preview-description {
    color: #64748B;

    font-size: .86rem;

    line-height: 1.7;
}


/* =========================================================
   DELETE MODAL
========================================================= */

.produk-delete-overlay {
    position: fixed;
    inset: 0;

    z-index: 10000;

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

.produk-delete-overlay.show {
    opacity: 1;
    visibility: visible;
}

.produk-delete-modal {
    width: min(375px, 100%);

    background: #fff;

    border-radius: 18px;

    padding: 28px;

    text-align: center;

    box-shadow: 0 25px 60px rgba(15, 23, 42, .22);

    transform: translateY(12px) scale(.98);

    transition: .2s ease;
}

.produk-delete-overlay.show .produk-delete-modal {
    transform: translateY(0) scale(1);
}

.produk-delete-icon {
    width: 52px;
    height: 52px;

    margin: 0 auto 16px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 50%;

    background: #FFF1F1;
    color: #D14343;

    font-size: 1.25rem;
}

.produk-delete-modal h3 {
    margin: 0 0 8px;

    color: var(--admin-navy);

    font-size: 1.05rem;
    font-weight: 800;
}

.produk-delete-modal p {
    margin: 0 auto;

    max-width: 285px;

    color: #8291A5;

    font-size: .78rem;
    line-height: 1.6;
}

.produk-delete-actions {
    margin-top: 22px;

    display: flex;
    align-items: center;
    justify-content: center;

    gap: 9px;
}

.produk-delete-btn {
    min-width: 86px;
    height: 38px;

    display: inline-flex;
    align-items: center;
    justify-content: center;

    gap: 6px;

    padding: 0 14px;

    border-radius: 8px;

    font-size: .75rem;
    font-weight: 700;

    cursor: pointer;
}

.produk-delete-btn-cancel {
    background: #fff;
    color: #60748A;
    border: 1px solid #DCE5EF;
}

.produk-delete-btn-confirm {
    background: #fff;
    color: #D14343;
    border: 1px solid #F1B8B8;
}

.produk-delete-btn-confirm:hover {
    background: #D14343;
    border-color: #D14343;
    color: #fff;
}

body.modal-open {
    overflow: hidden;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 1200px) {

    .produk-card-header {
        align-items: flex-start;
        flex-direction: column;
    }

    .produk-card-tools {
        width: 100%;
        flex-wrap: wrap;
    }

    .produk-search {
        flex: 1;
    }

}

@media (max-width: 900px) {

    .produk-stats {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

}

@media (max-width: 700px) {

    .produk-stats {
        grid-template-columns: 1fr;
    }

    .produk-search {
        width: 100%;
        min-width: 100%;
        flex: none;
    }

    .produk-filter,
    .btn-tambah-produk {
        flex: 1;
        justify-content: center;
    }

    .produk-bulk-footer {
        gap: 12px;
        align-items: stretch;
        flex-direction: column;
    }

    .produk-bulk-delete {
        width: 100%;
    }

    .produk-pagination {
        align-items: flex-start;
        flex-direction: column;
        gap: 12px;
    }

    .produk-preview-overlay {
        padding: 15px;
    }

    .produk-preview-modal {
        max-height: calc(100vh - 30px);
    }

    .produk-preview-image {
        height: 280px;
    }

    .produk-preview-content {
        padding: 22px;
    }

}

</style>


<div class="produk-page">

    {{-- HEADER --}}
    <div class="produk-page-heading">

        <h1>
            Kelola Produk & Karya Siswa
        </h1>

        <p>
            Kelola produk dan karya siswa yang ditampilkan di website.
        </p>

    </div>


    {{-- ALERT --}}
    @if (session('success'))

        <div class="produk-alert produk-alert-success">

            <i class="bi bi-check-circle-fill me-1"></i>

            {{ session('success') }}

        </div>

    @endif


    @if (session('error'))

        <div class="produk-alert produk-alert-error">

            <i class="bi bi-exclamation-circle-fill me-1"></i>

            {{ session('error') }}

        </div>

    @endif


    {{-- STATISTICS --}}
    <div class="produk-stats">

        <div class="produk-stat-card produk-stat-blue">

            <div class="produk-stat-content">

                <div class="produk-stat-label">
                    Total Produk
                </div>

                <p class="produk-stat-value">
                    {{ $totalProduk }}
                </p>

                <div class="produk-stat-description">
                    Tersimpan di website
                </div>

            </div>

            <div class="produk-stat-icon">
                <i class="bi bi-box-seam"></i>
            </div>

        </div>


        <div class="produk-stat-card produk-stat-purple">

            <div class="produk-stat-content">

                <div class="produk-stat-label">
                    Kategori Aktif
                </div>

                <p class="produk-stat-value">
                    {{ $kategoriAktif }}
                </p>

                <div class="produk-stat-description">
                    PPLG · TJKT · TPFL · TKRO
                </div>

            </div>

            <div class="produk-stat-icon">
                <i class="bi bi-grid"></i>
            </div>

        </div>


        <div class="produk-stat-card produk-stat-orange">

            <div class="produk-stat-content">

                <div class="produk-stat-label">
                    Produk Ditambahkan
                </div>

                <p class="produk-stat-value">
                    {{ $produkBulanIni }}
                </p>

                <div class="produk-stat-description">
                    {{ now()->translatedFormat('F Y') }}
                </div>

            </div>

            <div class="produk-stat-icon">
                <i class="bi bi-calendar3"></i>
            </div>

        </div>

    </div>


    {{-- PRODUCT CARD --}}
    <div class="produk-card">

        <div class="produk-card-header">

            <div>

                <h2 class="produk-card-title">
                    Daftar Produk & Karya Siswa
                </h2>

                <p
                    class="produk-card-count"
                    id="produkResultInfo"
                >
                    @if ($produk->count() > 0)

                        Menampilkan
                        {{ $produk->firstItem() }} -
                        {{ $produk->lastItem() }}
                        dari {{ $produk->total() }} produk

                    @else

                        Tidak ada produk ditemukan

                    @endif
                </p>

            </div>


            <div class="produk-card-tools">

                {{-- SEARCH --}}
                <form
                    id="produkSearchForm"
                    action="{{ route('admin.produk.index') }}"
                    method="GET"
                    style="display: contents;"
                >

                    <div class="produk-search">

                        <i class="bi bi-search produk-search-icon"></i>

                        <input
                            type="text"
                            id="produkSearchInput"
                            name="search"
                            value="{{ $search }}"
                            class="produk-search-input"
                            placeholder="Cari nama produk atau kategori..."
                            autocomplete="off"
                        >

                    </div>


                    {{-- FILTER --}}
                    <select
                        id="produkCategoryFilter"
                        name="kategori"
                        class="produk-filter"
                    >

                        <option value="">
                            Semua Kategori
                        </option>

                        <option
                            value="PPLG"
                            @selected($kategori === 'PPLG')
                        >
                            PPLG
                        </option>

                        <option
                            value="TJKT"
                            @selected($kategori === 'TJKT')
                        >
                            TJKT
                        </option>

                        <option
                            value="TPFL"
                            @selected($kategori === 'TPFL')
                        >
                            TPFL
                        </option>

                        <option
                            value="TKRO"
                            @selected($kategori === 'TKRO')
                        >
                            TKRO
                        </option>

                    </select>

                </form>


                {{-- TAMBAH --}}
                <a
                    href="{{ route('admin.produk.create') }}"
                    class="btn-tambah-produk"
                >

                    <i class="bi bi-plus-lg"></i>

                    Tambah Produk

                </a>

            </div>

        </div>


        {{-- BULK DELETE --}}
        <form
            id="bulkDeleteForm"
            action="{{ route('admin.produk.bulkDelete') }}"
            method="POST"
        >

            @csrf

            @method('DELETE')


            {{-- TABLE --}}
            <div class="produk-table-wrapper">

                <table class="produk-table">

                    <thead>

                        <tr>

                            <th class="produk-checkbox-cell">

                                <input
                                    type="checkbox"
                                    id="checkAllProduk"
                                    class="produk-checkbox"
                                    title="Pilih semua"
                                >

                            </th>

                            <th>Foto</th>

                            <th>Nama Produk</th>

                            <th>Kategori</th>

                            <th>Informasi</th>

                            <th>Aksi</th>

                        </tr>

                    </thead>


                    <tbody id="produkTableBody">

                        @forelse ($produk as $item)

                            @php

                                $produkImage = null;

                                if ($item->gambar) {

                                    if (
                                        file_exists(
                                            public_path(
                                                'images/produk/' . $item->gambar
                                            )
                                        )
                                    ) {

                                        $produkImage =
                                            asset(
                                                'images/produk/' . $item->gambar
                                            );

                                    } elseif (
                                        file_exists(
                                            public_path(
                                                'images/' . $item->gambar
                                            )
                                        )
                                    ) {

                                        $produkImage =
                                            asset(
                                                'images/' . $item->gambar
                                            );

                                    }

                                }

                                $kategori = strtoupper(
                                    $item->kategori ?? ''
                                );

                                $kategoriDescription = match ($kategori) {

                                    'PPLG' => 'Software & Apps',

                                    'TJKT' => 'Teknologi Cerdas & IoT',

                                    'TPFL' => 'Fabrikasi Besi & Furniture',

                                    'TKRO' => 'Mobilitas & Otomotif',

                                    default => 'Karya Siswa'

                                };

                            @endphp


                            <tr class="produk-row">

                                <td class="produk-checkbox-cell">

                                    <input
                                        type="checkbox"
                                        name="selected[]"
                                        value="{{ $item->id }}"
                                        class="produk-checkbox produk-item-checkbox"
                                    >

                                </td>


                                <td>

                                    <div class="produk-photo">

                                        <div class="produk-thumbnail">

                                            @if ($produkImage)

                                                <img
                                                    src="{{ $produkImage }}"
                                                    alt="{{ $item->nama }}"
                                                >

                                            @else

                                                <div class="produk-thumbnail-placeholder">

                                                    <i class="bi bi-image"></i>

                                                </div>

                                            @endif

                                        </div>

                                    </div>

                                </td>


                                <td>

                                    <div class="produk-photo-info">

                                        <div class="produk-photo-title">
                                            {{ $item->nama }}
                                        </div>

                                        <div class="produk-photo-filename">
                                            {{ $item->gambar ?: 'Tidak ada gambar' }}
                                        </div>

                                    </div>

                                </td>


                                <td>

                                    @if ($kategori)

                                        <span class="produk-kategori">
                                            {{ $kategori }}
                                        </span>

                                        <span class="produk-kategori-description">
                                            {{ $kategoriDescription }}
                                        </span>

                                    @else

                                        <span class="produk-info-empty">
                                            —
                                        </span>

                                    @endif

                                </td>


                                <td>

                                    @if ($item->deskripsi)

                                        <div
                                            class="produk-info"
                                            title="{{ $item->deskripsi }}"
                                        >

                                            {{ \Illuminate\Support\Str::limit(
                                                $item->deskripsi,
                                                100
                                            ) }}

                                        </div>

                                    @else

                                        <span class="produk-info-empty">
                                            Belum ada informasi
                                        </span>

                                    @endif

                                </td>


                                <td>

                                    <div class="produk-actions">

                                        <button
                                            type="button"
                                            class="produk-btn-action produk-btn-view produk-preview-button"

                                            data-title="{{ $item->nama }}"

                                            data-category="{{ $item->kategori }}"

                                            data-description="{{ $item->deskripsi }}"

                                            data-image="{{ $produkImage ?? '' }}"
                                        >

                                            <i class="bi bi-eye"></i>

                                            Lihat

                                        </button>


                                        <a
                                            href="{{ route('admin.produk.edit', $item) }}"
                                            class="produk-btn-action produk-btn-edit"
                                        >

                                            <i class="bi bi-pencil"></i>

                                            Edit

                                        </a>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr id="produkEmptyRow">

                                <td
                                    colspan="6"
                                    class="produk-empty"
                                >

                                    <i class="bi bi-box-seam"></i>

                                    <strong>
                                        Belum ada produk atau karya siswa
                                    </strong>

                                    <span>
                                        Tambahkan produk atau karya siswa pertama.
                                    </span>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- BULK FOOTER --}}
            <div class="produk-bulk-footer">

                <div
                    class="produk-selected-info"
                    id="produkSelectedInfo"
                >

                    <strong id="produkSelectedCount">
                        0
                    </strong>

                    produk dipilih

                </div>


                <button
                    type="button"
                    id="produkBulkDelete"
                    class="produk-bulk-delete"
                    disabled
                >

                    <i class="bi bi-trash3"></i>

                    Hapus Terpilih

                </button>

            </div>


            {{-- PAGINATION --}}
            @if ($produk->hasPages())

                <div
                    class="produk-pagination"
                    id="produkPagination"
                >

                    <div class="produk-pagination-info">

                        Menampilkan
                        {{ $produk->firstItem() }}
                        -
                        {{ $produk->lastItem() }}
                        dari
                        {{ $produk->total() }}
                        produk

                    </div>


                    <div class="produk-pagination-links">

                        @if ($produk->onFirstPage())

                            <span class="disabled">
                                <i class="bi bi-chevron-left"></i>
                            </span>

                        @else

                            <a href="{{ $produk->previousPageUrl() }}">
                                <i class="bi bi-chevron-left"></i>
                            </a>

                        @endif


                        @foreach (
                            $produk->getUrlRange(
                                max(1, $produk->currentPage() - 2),
                                min($produk->lastPage(), $produk->currentPage() + 2)
                            )
                            as $page => $url
                        )

                            @if ($page == $produk->currentPage())

                                <span class="active">
                                    {{ $page }}
                                </span>

                            @else

                                <a href="{{ $url }}">
                                    {{ $page }}
                                </a>

                            @endif

                        @endforeach


                        @if ($produk->hasMorePages())

                            <a href="{{ $produk->nextPageUrl() }}">
                                <i class="bi bi-chevron-right"></i>
                            </a>

                        @else

                            <span class="disabled">
                                <i class="bi bi-chevron-right"></i>
                            </span>

                        @endif

                    </div>

                </div>

            @endif

        </form>

    </div>

</div>


{{-- =========================================================
     PREVIEW MODAL
========================================================= --}}

<div
    id="produkPreviewModal"
    class="produk-preview-overlay"
>

    <div class="produk-preview-modal">

        <button
            type="button"
            id="produkPreviewClose"
            class="produk-preview-close"
        >

            <i class="bi bi-x-lg"></i>

        </button>


        <div class="produk-preview-image">

            <img
                id="produkPreviewImage"
                src=""
                alt=""
            >

        </div>


        <div class="produk-preview-content">

            <span
                id="produkPreviewJurusan"
                class="produk-preview-jurusan"
            >
                -
            </span>

            <h2 id="produkPreviewTitle">
                -
            </h2>

            <div
                id="produkPreviewDescription"
                class="produk-preview-description"
            >
                -
            </div>

        </div>

    </div>

</div>


{{-- =========================================================
     DELETE MODAL
========================================================= --}}

<div
    id="produkDeleteModal"
    class="produk-delete-overlay"
>

    <div class="produk-delete-modal">

        <div class="produk-delete-icon">

            <i class="bi bi-trash3"></i>

        </div>

        <h3>
            Hapus Produk?
        </h3>

        <p id="produkDeleteDescription">
            Produk yang dipilih akan dihapus dari sistem.
            Tindakan ini tidak dapat dibatalkan.
        </p>

        <div class="produk-delete-actions">

            <button
                type="button"
                id="produkDeleteCancel"
                class="produk-delete-btn produk-delete-btn-cancel"
            >
                Batal
            </button>


            <button
                type="button"
                id="produkDeleteConfirm"
                class="produk-delete-btn produk-delete-btn-confirm"
            >

                <i class="bi bi-trash3"></i>

                Hapus Produk

            </button>

        </div>

    </div>

</div>


<script>

document.addEventListener('DOMContentLoaded', function () {

    /* =====================================================
       ELEMENT
    ===================================================== */

    const searchForm =
        document.getElementById('produkSearchForm');

    const searchInput =
        document.getElementById('produkSearchInput');

    const categoryFilter =
        document.getElementById('produkCategoryFilter');

    const resultInfo =
        document.getElementById('produkResultInfo');

    const tableBody =
        document.getElementById('produkTableBody');

    const pagination =
        document.getElementById('produkPagination');

    const checkAll =
        document.getElementById('checkAllProduk');

    const bulkDeleteButton =
        document.getElementById('produkBulkDelete');

    const selectedCount =
        document.getElementById('produkSelectedCount');

    const bulkDeleteForm =
        document.getElementById('bulkDeleteForm');


    /* =====================================================
       URL SEARCH
    ===================================================== */

    const searchUrl =
        @json(route('admin.produk.search'));


    let requestController = null;

    let requestId = 0;


    /* =====================================================
       ESCAPE HTML
    ===================================================== */

    function escapeHtml(value) {

        return String(value ?? '')
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#039;');

    }


    /* =====================================================
       CATEGORY DESCRIPTION
    ===================================================== */

    function getCategoryDescription(category) {

        switch (
            String(category || '').toUpperCase()
        ) {

            case 'PPLG':
                return 'Software & Apps';

            case 'TJKT':
                return 'Teknologi Cerdas & IoT';

            case 'TPFL':
                return 'Fabrikasi Besi & Furniture';

            case 'TKRO':
                return 'Mobilitas & Otomotif';

            default:
                return 'Karya Siswa';

        }

    }


    /* =====================================================
       IMAGE
    ===================================================== */

    function imageHtml(item) {

        if (item.image_url) {

            return `
                <img
                    src="${escapeHtml(item.image_url)}"
                    alt="${escapeHtml(item.nama)}"
                >
            `;

        }

        return `
            <div class="produk-thumbnail-placeholder">
                <i class="bi bi-image"></i>
            </div>
        `;

    }


    /* =====================================================
       EMPTY
    ===================================================== */

    function renderEmptyResults() {

        tableBody.innerHTML = `

            <tr>

                <td
                    colspan="6"
                    class="produk-empty"
                >

                    <i class="bi bi-box-seam"></i>

                    <strong>
                        Tidak ada produk ditemukan
                    </strong>

                    <span>
                        Coba ubah kata pencarian atau filter kategori.
                    </span>

                </td>

            </tr>

        `;

        if (resultInfo) {

            resultInfo.textContent =
                'Tidak ada produk ditemukan';

        }

        updateSelection();

    }


    /* =====================================================
       RENDER AJAX RESULTS
    ===================================================== */

    function renderResults(items) {

        if (!items || items.length === 0) {

            renderEmptyResults();

            return;

        }


        tableBody.innerHTML =
            items.map(function (item) {

                const kategori =
                    String(
                        item.kategori || ''
                    ).toUpperCase();

                const description =
                    item.deskripsi || '';


                return `

                    <tr class="produk-row">

                        <td class="produk-checkbox-cell">

                            <input
                                type="checkbox"
                                name="selected[]"
                                value="${escapeHtml(item.id)}"
                                class="produk-checkbox produk-item-checkbox"
                            >

                        </td>


                        <td>

                            <div class="produk-photo">

                                <div class="produk-thumbnail">

                                    ${imageHtml(item)}

                                </div>

                            </div>

                        </td>


                        <td>

                            <div class="produk-photo-info">

                                <div class="produk-photo-title">

                                    ${escapeHtml(
                                        item.nama || 'Produk Siswa'
                                    )}

                                </div>

                                <div class="produk-photo-filename">

                                    ${escapeHtml(
                                        item.gambar ||
                                        'Tidak ada gambar'
                                    )}

                                </div>

                            </div>

                        </td>


                        <td>

                            ${
                                kategori
                                ? `
                                    <span class="produk-kategori">

                                        ${escapeHtml(kategori)}

                                    </span>

                                    <span class="produk-kategori-description">

                                        ${escapeHtml(
                                            getCategoryDescription(kategori)
                                        )}

                                    </span>
                                `
                                : `
                                    <span class="produk-info-empty">
                                        —
                                    </span>
                                `
                            }

                        </td>


                        <td>

                            ${
                                description
                                ? `
                                    <div
                                        class="produk-info"
                                        title="${escapeHtml(description)}"
                                    >

                                        ${escapeHtml(
                                            description.length > 100
                                                ? description.substring(0, 100) + '...'
                                                : description
                                        )}

                                    </div>
                                `
                                : `
                                    <span class="produk-info-empty">
                                        Belum ada informasi
                                    </span>
                                `
                            }

                        </td>


                        <td>

                            <div class="produk-actions">

                                <button
                                    type="button"
                                    class="produk-btn-action produk-btn-view produk-preview-button"

                                    data-title="${escapeHtml(
                                        item.nama || 'Produk Siswa'
                                    )}"

                                    data-category="${escapeHtml(
                                        item.kategori || '-'
                                    )}"

                                    data-description="${escapeHtml(
                                        item.deskripsi || ''
                                    )}"

                                    data-image="${escapeHtml(
                                        item.image_url || ''
                                    )}"
                                >

                                    <i class="bi bi-eye"></i>

                                    Lihat

                                </button>


                                <a
                                    href="${escapeHtml(item.edit_url)}"
                                    class="produk-btn-action produk-btn-edit"
                                >

                                    <i class="bi bi-pencil"></i>

                                    Edit

                                </a>

                            </div>

                        </td>

                    </tr>

                `;

            }).join('');


        if (resultInfo) {

            resultInfo.textContent =
                `Ditemukan ${items.length} produk`;

        }


        bindCheckboxes();

        bindPreviewButtons();

        updateSelection();

    }


    /* =====================================================
       AJAX SEARCH
    ===================================================== */

    function performSearch() {

        const search =
            searchInput
                ? searchInput.value.trim()
                : '';

        const kategori =
            categoryFilter
                ? categoryFilter.value
                : '';


        requestId++;

        const currentRequestId =
            requestId;


        if (requestController) {

            requestController.abort();

        }


        requestController =
            new AbortController();


        const params =
            new URLSearchParams();


        if (search !== '') {
            params.set('search', search);
        }

        if (kategori !== '') {
            params.set('kategori', kategori);
        }


        if (pagination) {

            pagination.style.display =
                'none';

        }


        fetch(
            `${searchUrl}?${params.toString()}`,
            {
                method: 'GET',

                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                },

                cache: 'no-store',

                signal:
                    requestController.signal
            }
        )
        .then(function (response) {

            if (!response.ok) {

                throw new Error(
                    'Gagal mengambil data produk.'
                );

            }

            return response.json();

        })
        .then(function (data) {

            if (
                currentRequestId !==
                requestId
            ) {
                return;
            }


            renderResults(
                data.produks || []
            );

        })
        .catch(function (error) {

            if (
                error.name ===
                'AbortError'
            ) {
                return;
            }


            console.error(error);

            renderEmptyResults();

        });

    }


    /* =====================================================
       SEARCH REALTIME
    ===================================================== */

    if (searchInput) {

        searchInput.addEventListener(
            'input',
            performSearch
        );

    }


    /* =====================================================
       CATEGORY REALTIME
    ===================================================== */

    if (categoryFilter) {

        categoryFilter.addEventListener(
            'change',
            performSearch
        );

    }


    /* =====================================================
       PREVENT FORM SUBMIT
    ===================================================== */

    if (searchForm) {

        searchForm.addEventListener(
            'submit',
            function (event) {

                event.preventDefault();

                performSearch();

            }
        );

    }


    /* =====================================================
       CHECKBOX
    ===================================================== */

    function getItemCheckboxes() {

        return document.querySelectorAll(
            '.produk-item-checkbox'
        );

    }


    function updateSelection() {

        const itemCheckboxes =
            getItemCheckboxes();


        const checked =
            document.querySelectorAll(
                '.produk-item-checkbox:checked'
            ).length;


        if (selectedCount) {

            selectedCount.textContent =
                checked;

        }


        if (bulkDeleteButton) {

            const hasSelection =
                checked > 0;


            bulkDeleteButton.disabled =
                !hasSelection;


            bulkDeleteButton.classList.toggle(
                'active',
                hasSelection
            );


            bulkDeleteButton.innerHTML =
                hasSelection
                    ? `<i class="bi bi-trash3"></i> Hapus ${checked} Terpilih`
                    : `<i class="bi bi-trash3"></i> Hapus Terpilih`;

        }


        if (checkAll) {

            checkAll.checked =
                itemCheckboxes.length > 0 &&
                checked === itemCheckboxes.length;


            checkAll.indeterminate =
                checked > 0 &&
                checked < itemCheckboxes.length;

        }

    }


    function bindCheckboxes() {

        const itemCheckboxes =
            getItemCheckboxes();


        itemCheckboxes.forEach(
            function (checkbox) {

                checkbox.addEventListener(
                    'change',
                    updateSelection
                );

            }
        );


        updateSelection();

    }


    if (checkAll) {

        checkAll.addEventListener(
            'change',
            function () {

                const itemCheckboxes =
                    getItemCheckboxes();


                itemCheckboxes.forEach(
                    function (checkbox) {

                        checkbox.checked =
                            checkAll.checked;

                    }
                );


                updateSelection();

            }
        );

    }


    /* =====================================================
       DELETE MODAL
    ===================================================== */

    const deleteModal =
        document.getElementById(
            'produkDeleteModal'
        );

    const deleteCancel =
        document.getElementById(
            'produkDeleteCancel'
        );

    const deleteConfirm =
        document.getElementById(
            'produkDeleteConfirm'
        );

    const deleteDescription =
        document.getElementById(
            'produkDeleteDescription'
        );


    function openDeleteModal() {

        const checked =
            document.querySelectorAll(
                '.produk-item-checkbox:checked'
            );


        if (
            !deleteModal ||
            checked.length === 0
        ) {
            return;
        }


        if (deleteDescription) {

            deleteDescription.textContent =
                `${checked.length} produk yang dipilih akan dihapus dari sistem. Tindakan ini tidak dapat dibatalkan.`;

        }


        deleteModal.classList.add('show');

        document.body.classList.add(
            'modal-open'
        );

    }


    function closeDeleteModal() {

        if (!deleteModal) {
            return;
        }


        deleteModal.classList.remove(
            'show'
        );

        document.body.classList.remove(
            'modal-open'
        );

    }


    if (bulkDeleteButton) {

        bulkDeleteButton.addEventListener(
            'click',
            openDeleteModal
        );

    }


    if (deleteCancel) {

        deleteCancel.addEventListener(
            'click',
            closeDeleteModal
        );

    }


    if (deleteConfirm) {

        deleteConfirm.addEventListener(
            'click',
            function () {

                const checked =
                    document.querySelectorAll(
                        '.produk-item-checkbox:checked'
                    );


                if (
                    checked.length === 0
                ) {

                    closeDeleteModal();

                    return;

                }


                if (bulkDeleteForm) {

                    bulkDeleteForm.submit();

                }

            }
        );

    }


    if (deleteModal) {

        deleteModal.addEventListener(
            'click',
            function (event) {

                if (
                    event.target ===
                    deleteModal
                ) {

                    closeDeleteModal();

                }

            }
        );

    }


    /* =====================================================
       PREVIEW
    ===================================================== */

    const previewModal =
        document.getElementById(
            'produkPreviewModal'
        );

    const previewClose =
        document.getElementById(
            'produkPreviewClose'
        );

    const previewImage =
        document.getElementById(
            'produkPreviewImage'
        );

    const previewTitle =
        document.getElementById(
            'produkPreviewTitle'
        );

    const previewJurusan =
        document.getElementById(
            'produkPreviewJurusan'
        );

    const previewDescription =
        document.getElementById(
            'produkPreviewDescription'
        );


    function closePreview() {

        if (!previewModal) {
            return;
        }


        previewModal.classList.remove(
            'show'
        );

        document.body.classList.remove(
            'modal-open'
        );


        if (previewImage) {

            previewImage.src = '';

        }

    }


    function bindPreviewButtons() {

        document.querySelectorAll(
            '.produk-preview-button'
        ).forEach(
            function (button) {

                button.addEventListener(
                    'click',
                    function () {

                        const image =
                            this.dataset.image || '';

                        const title =
                            this.dataset.title || '-';

                        const category =
                            this.dataset.category || '-';

                        const description =
                            this.dataset.description ||
                            'Belum ada informasi.';


                        if (previewImage) {

                            previewImage.src =
                                image;

                            previewImage.alt =
                                title;

                        }


                        if (previewTitle) {

                            previewTitle.textContent =
                                title;

                        }


                        if (previewJurusan) {

                            previewJurusan.textContent =
                                category;

                        }


                        if (previewDescription) {

                            previewDescription.textContent =
                                description;

                        }


                        if (previewModal) {

                            previewModal.classList.add(
                                'show'
                            );

                        }


                        document.body.classList.add(
                            'modal-open'
                        );

                    }
                );

            }
        );

    }


    if (previewClose) {

        previewClose.addEventListener(
            'click',
            closePreview
        );

    }


    if (previewModal) {

        previewModal.addEventListener(
            'click',
            function (event) {

                if (
                    event.target ===
                    previewModal
                ) {

                    closePreview();

                }

            }
        );

    }


    /* =====================================================
       ESC
    ===================================================== */

    document.addEventListener(
        'keydown',
        function (event) {

            if (
                event.key !==
                'Escape'
            ) {
                return;
            }


            if (
                deleteModal &&
                deleteModal.classList.contains('show')
            ) {

                closeDeleteModal();

                return;

            }


            if (
                previewModal &&
                previewModal.classList.contains('show')
            ) {

                closePreview();

            }

        }
    );


    /* =====================================================
       INITIAL
    ===================================================== */

    bindCheckboxes();

    bindPreviewButtons();

    updateSelection();

});

</script>

@endsection