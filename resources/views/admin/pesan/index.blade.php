@extends('layouts.admin')

@section('title', 'Pesan Masuk')

@section('page-title', 'Pesan Masuk')

@section('content')

<style>
    .pesan-page {
        padding-bottom: 30px;
    }

    /* =========================
       HEADER
    ========================= */

    .pesan-header {
        margin-bottom: 28px;
    }

    .pesan-header h2 {
        color: #0B1C30;
        font-size: 1.65rem;
        font-weight: 700;
        margin-bottom: 6px;
    }

    .pesan-header p {
        color: #737783;
        margin: 0;
        font-size: 0.92rem;
    }


    /* =========================
       STATISTICS
    ========================= */

    .pesan-stats {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
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

    /* Biru */

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

    /* Ungu */

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


    /* =========================
       ALERT
    ========================= */

    .pesan-alert {
        border: 0;
        border-radius: 12px;
        padding: 13px 16px;
        font-size: 0.9rem;
    }


    /* =========================
       MESSAGE CARD
    ========================= */

    .pesan-table-card {
        background: #FFFFFF;
        border: 1px solid #DCE5F2;
        border-radius: 16px;
        overflow: hidden;
    }

    .pesan-table-header {
        padding: 20px 22px;
        border-bottom: 1px solid #E8EEF6;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
    }

    .pesan-table-title {
        color: #0B1C30;
        font-size: 1rem;
        font-weight: 700;
        margin: 0;
    }

    .pesan-table-subtitle {
        color: #737783;
        font-size: 0.78rem;
        margin: 3px 0 0;
    }


    /* =========================
       SEARCH & FILTER
    ========================= */

    .pesan-toolbar {
        padding: 16px 22px;
        border-bottom: 1px solid #E8EEF6;
        display: flex;
        align-items: center;
        gap: 12px;
        background: #FFFFFF;
    }

    .pesan-search {
        position: relative;
        flex: 1;
    }

    .pesan-search i {
        position: absolute;
        left: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: #8A919D;
        font-size: 0.9rem;
        pointer-events: none;
    }

    .pesan-search input,
    .pesan-filter select {
        width: 100%;
        height: 42px;
        border: 1px solid #DCE5F2;
        border-radius: 10px;
        background: #FFFFFF;
        color: #29364A;
        font-size: 0.82rem;
        outline: none;
        transition: all 0.15s ease;
    }

    .pesan-search input {
        padding: 0 14px 0 40px;
    }

    .pesan-filter {
        width: 220px;
        flex-shrink: 0;
    }

    .pesan-filter select {
        padding: 0 12px;
        cursor: pointer;
    }

    .pesan-search input::placeholder {
        color: #A0A7B2;
    }

    .pesan-search input:focus,
    .pesan-filter select:focus {
        border-color: #9BBCEB;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.08);
    }


    /* =========================
       TABLE
    ========================= */

    .pesan-table {
        margin: 0;
    }

    .pesan-table thead th {
        background: #F7F9FC;
        color: #737783;
        border-bottom: 1px solid #E8EEF6;
        border-top: 0;
        padding: 14px 18px;
        font-size: 0.72rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.04em;
        white-space: nowrap;
    }

    .pesan-table tbody td {
        padding: 17px 18px;
        border-bottom: 1px solid #EDF1F6;
        color: #29364A;
        font-size: 0.86rem;
        vertical-align: middle;
    }

    .pesan-table tbody tr:last-child td {
        border-bottom: 0;
    }

    .pesan-table tbody tr {
        transition: background 0.15s ease;
    }

    .pesan-table tbody tr:hover {
        background: #FAFCFF;
    }

    .pesan-table tbody tr.pesan-unread {
        background: #F8FBFF;
    }

    .pesan-table tbody tr.pesan-unread:hover {
        background: #F2F7FF;
    }


    /* =========================
       SENDER
    ========================= */

    .pesan-sender {
        display: flex;
        align-items: center;
        gap: 11px;
        min-width: 200px;
    }

    .pesan-avatar {
        width: 38px;
        height: 38px;
        border-radius: 11px;
        background: #EAF2FF;
        color: #004A99;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.82rem;
        font-weight: 700;
        flex-shrink: 0;
    }

    .pesan-sender-name {
        color: #0B1C30;
        font-weight: 600;
        font-size: 0.86rem;
        margin-bottom: 2px;
    }

    .pesan-sender-email {
        color: #8A919D;
        font-size: 0.73rem;
    }


    /* =========================
       SUBJECT
    ========================= */

    .pesan-subject {
        color: #29364A;
        font-weight: 600;
        white-space: nowrap;
    }


    /* =========================
       MESSAGE PREVIEW
    ========================= */

    .pesan-preview {
        max-width: 280px;
        color: #737783;
        line-height: 1.5;
    }


    /* =========================
       DATE
    ========================= */

    .pesan-date {
        color: #4E5969;
        font-size: 0.8rem;
        white-space: nowrap;
    }

    .pesan-time {
        color: #9AA1AC;
        font-size: 0.72rem;
        margin-top: 2px;
    }


    /* =========================
       STATUS
    ========================= */

    .pesan-status {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        border-radius: 999px;
        padding: 6px 10px;
        font-size: 0.68rem;
        font-weight: 700;
        white-space: nowrap;
    }

    .pesan-status.new {
        background: #EAF2FF;
        color: #004A99;
    }

    .pesan-status.read {
        background: #F0F2F5;
        color: #697383;
    }


    /* =========================
       ACTION
    ========================= */

    .pesan-actions {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
    }

    .pesan-action-btn {
        width: 34px;
        height: 34px;
        border-radius: 9px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #DCE5F2;
        background: #FFFFFF;
        transition: all 0.15s ease;
    }

    .pesan-action-btn.view {
        color: #004A99;
    }

    .pesan-action-btn.view:hover {
        background: #EAF2FF;
        border-color: #C9DCF8;
    }

    .pesan-action-btn.delete {
        color: #C0392B;
    }

    .pesan-action-btn.delete:hover {
        background: #FFF0EF;
        border-color: #F3C7C2;
    }


    /* =========================
       PAGINATION
    ========================= */

    .pesan-pagination {
        padding: 16px 22px;
        border-top: 1px solid #E8EEF6;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        background: #FFFFFF;
    }

    .pesan-pagination-info {
        color: #737783;
        font-size: 0.76rem;
    }

    .pesan-pagination-info strong {
        color: #29364A;
        font-weight: 700;
    }

    .pesan-pagination .pagination {
        margin: 0;
    }

    .pesan-pagination .page-link {
        border: 0;
        margin: 0 2px;
        border-radius: 8px;
        color: #5B6B80;
        font-size: 0.78rem;
        min-width: 32px;
        height: 32px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .pesan-pagination .page-item.active .page-link {
        background: #00346F;
        color: #FFFFFF;
    }

    .pesan-pagination .page-link:hover {
        background: #EEF4FF;
        color: #00346F;
    }

    .pesan-pagination .page-item.disabled .page-link {
        color: #B6BDC7;
        background: transparent;
    }


    /* =========================
       EMPTY STATE
    ========================= */

    .pesan-empty {
        padding: 70px 25px;
        text-align: center;
    }

    .pesan-empty-icon {
        width: 74px;
        height: 74px;
        margin: 0 auto 18px;
        border-radius: 22px;
        background: #EAF2FF;
        color: #004A99;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.7rem;
    }

    .pesan-empty h5 {
        color: #0B1C30;
        font-weight: 700;
        margin-bottom: 7px;
    }

    .pesan-empty p {
        color: #8A919D;
        font-size: 0.85rem;
        margin: 0;
    }


    /* =========================
       MODAL
    ========================= */

    .pesan-modal .modal-content {
        border: 0;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 18px 55px rgba(11, 28, 48, 0.18);
    }

    .pesan-modal .modal-header {
        padding: 20px 22px;
        border-bottom: 1px solid #E8EEF6;
        background: #FFFFFF;
    }

    .pesan-modal-title-wrap {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .pesan-modal-icon {
        width: 42px;
        height: 42px;
        border-radius: 11px;
        background: #EAF2FF;
        color: #004A99;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .pesan-modal-title {
        font-size: 1rem;
        color: #0B1C30;
        font-weight: 700;
        margin: 0;
    }

    .pesan-modal-subtitle {
        font-size: 0.73rem;
        color: #8A919D;
        margin: 2px 0 0;
    }

    .pesan-modal .modal-body {
        padding: 24px;
    }

    .pesan-detail {
        margin-bottom: 19px;
    }

    .pesan-detail:last-child {
        margin-bottom: 0;
    }

    .pesan-detail-label {
        color: #8A919D;
        font-size: 0.7rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.04em;
        margin-bottom: 6px;
    }

    .pesan-detail-value {
        color: #29364A;
        font-size: 0.88rem;
    }

    .pesan-message-box {
        background: #F7F9FC;
        border: 1px solid #E7EDF5;
        border-radius: 12px;
        padding: 15px;
        color: #3E4A5B;
        font-size: 0.87rem;
        line-height: 1.7;
        white-space: normal;
    }

    .pesan-modal .modal-footer {
        padding: 16px 22px;
        border-top: 1px solid #E8EEF6;
        background: #FBFCFE;
        gap: 8px;
    }

    .pesan-modal .btn {
        border-radius: 9px;
        font-size: 0.8rem;
        font-weight: 600;
        padding: 9px 13px;
    }


    /* =========================
       RESPONSIVE
    ========================= */

    @media (max-width: 991.98px) {

        .pesan-table {
            min-width: 950px;
        }

        .pesan-table-card {
            overflow-x: auto;
        }

        .pesan-toolbar {
            min-width: 950px;
        }
    }

    @media (max-width: 767.98px) {

        .pesan-stats {
            grid-template-columns: 1fr;
        }

        .pesan-toolbar {
            flex-direction: column;
            align-items: stretch;
            min-width: 0;
        }

        .pesan-filter {
            width: 100%;
        }

        .pesan-pagination {
            flex-direction: column;
            align-items: flex-start;
        }
    }
</style>


<div class="pesan-page">

    {{-- =========================
         HEADER
    ========================= --}}

    <div class="pesan-header">

        <h2>
            Pesan Masuk
        </h2>

        <p>
            Kelola pertanyaan dan pesan yang dikirim pengunjung melalui halaman kontak.
        </p>

    </div>


    {{-- =========================
         SUCCESS ALERT
    ========================= --}}

    @if (session('success'))

        <div
            class="alert alert-success pesan-alert d-flex align-items-center gap-2 mb-4"
            role="alert"
        >

            <i class="bi bi-check-circle-fill"></i>

            <span>
                {{ session('success') }}
            </span>

        </div>

    @endif


    {{-- =========================
         STATISTICS
    ========================= --}}

    <div class="gallery-stats pesan-stats">

        <div class="gallery-stat-card gallery-stat-blue">

            <div class="gallery-stat-content">

                <div class="gallery-stat-label">
                    Total Pesan
                </div>

                <p class="gallery-stat-value">
                    {{ $totalPesan }}
                </p>

                <div class="gallery-stat-description">
                    Pesan masuk di website
                </div>

            </div>

            <div class="gallery-stat-icon">
                <i class="bi bi-envelope-fill"></i>
            </div>

        </div>


        <div class="gallery-stat-card gallery-stat-purple">

            <div class="gallery-stat-content">

                <div class="gallery-stat-label">
                    Belum Dibaca
                </div>

                <p class="gallery-stat-value">
                    {{ $belumDibaca }}
                </p>

                <div class="gallery-stat-description">
                    Menunggu untuk dibaca
                </div>

            </div>

            <div class="gallery-stat-icon">
                <i class="bi bi-envelope-open-fill"></i>
            </div>

        </div>

    </div>


    {{-- =========================
         MESSAGE TABLE CARD
    ========================= --}}

    <div class="pesan-table-card">

        {{-- TABLE HEADER --}}

        <div class="pesan-table-header">

            <div>

                <h5 class="pesan-table-title">
                    Daftar Pesan
                </h5>

                <p class="pesan-table-subtitle">
                    Pesan terbaru ditampilkan terlebih dahulu.
                </p>

            </div>

        </div>


        {{-- =========================
             SEARCH & FILTER
        ========================= --}}

        <form
            action="{{ route('admin.pesan.index') }}"
            method="GET"
            class="pesan-toolbar"
        >

            <div class="pesan-search">

                <i class="bi bi-search"></i>

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari nama, email, subjek, atau pesan..."
                >

            </div>


            <div class="pesan-filter">

                <select
                    name="kategori"
                    onchange="this.form.submit()"
                >

                    <option value="">
                        Semua Kategori
                    </option>

                    <option
                        value="Pendaftaran"
                        {{ request('kategori') === 'Pendaftaran' ? 'selected' : '' }}
                    >
                        Pendaftaran
                    </option>

                    <option
                        value="Kerja Sama Industri"
                        {{ request('kategori') === 'Kerja Sama Industri' ? 'selected' : '' }}
                    >
                        Kerja Sama Industri
                    </option>

                    <option
                        value="Informasi Umum"
                        {{ request('kategori') === 'Informasi Umum' ? 'selected' : '' }}
                    >
                        Informasi Umum
                    </option>

                    <option
                        value="Lainnya"
                        {{ request('kategori') === 'Lainnya' ? 'selected' : '' }}
                    >
                        Lainnya
                    </option>

                </select>

            </div>

        </form>


        {{-- =========================
             TABLE
        ========================= --}}

        @if ($pesans->count())

            <div class="table-responsive">

                <table class="table pesan-table align-middle">

                    <thead>

                        <tr>

                            <th class="ps-4">
                                Pengirim
                            </th>

                            <th>
                                Subjek
                            </th>

                            <th>
                                Pesan
                            </th>

                            <th>
                                Dikirim
                            </th>

                            <th>
                                Status
                            </th>

                            <th class="text-center pe-4">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @foreach ($pesans as $pesan)

                            @php

                                $initials = collect(
                                    preg_split('/\s+/', trim($pesan->nama))
                                )
                                ->filter()
                                ->take(2)
                                ->map(
                                    fn ($word) =>
                                        strtoupper(substr($word, 0, 1))
                                )
                                ->implode('');

                            @endphp


                            <tr
                                class="{{ !$pesan->is_read ? 'pesan-unread' : '' }}"
                            >

                                {{-- SENDER --}}

                                <td class="ps-4">

                                    <div class="pesan-sender">

                                        <div class="pesan-avatar">
                                            {{ $initials ?: '?' }}
                                        </div>

                                        <div>

                                            <div class="pesan-sender-name">
                                                {{ $pesan->nama }}
                                            </div>

                                            <div class="pesan-sender-email">
                                                {{ $pesan->email }}
                                            </div>

                                        </div>

                                    </div>

                                </td>


                                {{-- SUBJECT --}}

                                <td>

                                    <div class="pesan-subject">
                                        {{ $pesan->subjek }}
                                    </div>

                                </td>


                                {{-- MESSAGE PREVIEW --}}

                                <td>

                                    <div
                                        class="pesan-preview text-truncate"
                                        title="{{ $pesan->pesan }}"
                                    >
                                        {{ $pesan->pesan }}
                                    </div>

                                </td>


                                {{-- DATE --}}

                                <td>

                                    <div class="pesan-date">
                                        {{ $pesan->created_at->format('d M Y') }}
                                    </div>

                                    <div class="pesan-time">
                                        {{ $pesan->created_at->format('H:i') }} WIB
                                    </div>

                                </td>


                                {{-- STATUS --}}

                                <td>

                                    @if ($pesan->is_read)

                                        <span class="pesan-status read">

                                            <i class="bi bi-envelope-open"></i>

                                            Sudah Dibaca

                                        </span>

                                    @else

                                        <span class="pesan-status new">

                                            <i class="bi bi-envelope-fill"></i>

                                            Baru

                                        </span>

                                    @endif

                                </td>


                                {{-- ACTION --}}

                                <td class="pe-4">

                                    <div class="pesan-actions">

                                        {{-- VIEW --}}

                                        <button
                                            type="button"
                                            class="pesan-action-btn view"
                                            data-bs-toggle="modal"
                                            data-bs-target="#pesanModal{{ $pesan->id }}"
                                            title="Lihat pesan"
                                        >

                                            <i class="bi bi-eye"></i>

                                        </button>


                                        {{-- DELETE --}}

                                        <form
                                            action="{{ route('admin.pesan.destroy', $pesan) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus pesan dari {{ $pesan->nama }}?')"
                                            class="d-inline"
                                        >

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="pesan-action-btn delete"
                                                title="Hapus pesan"
                                            >

                                                <i class="bi bi-trash3"></i>

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>


            {{-- =========================
                 PAGINATION
            ========================= --}}

            @if ($pesans->hasPages())

                <div class="pesan-pagination">

                    <div class="pesan-pagination-info">

                        Menampilkan

                        <strong>
                            {{ $pesans->firstItem() }}
                        </strong>

                        -

                        <strong>
                            {{ $pesans->lastItem() }}
                        </strong>

                        dari

                        <strong>
                            {{ $pesans->total() }}
                        </strong>

                        pesan

                    </div>


                    <div>

                        {{ $pesans->onEachSide(1)->links() }}

                    </div>

                </div>

            @endif


            {{-- =========================
                 MODALS
            ========================= --}}

            @foreach ($pesans as $pesan)

                <div
                    class="modal fade pesan-modal"
                    id="pesanModal{{ $pesan->id }}"
                    tabindex="-1"
                    aria-labelledby="pesanModalLabel{{ $pesan->id }}"
                    aria-hidden="true"
                >

                    <div class="modal-dialog modal-dialog-centered modal-lg">

                        <div class="modal-content">


                            {{-- MODAL HEADER --}}

                            <div class="modal-header">

                                <div class="pesan-modal-title-wrap">

                                    <div class="pesan-modal-icon">
                                        <i class="bi bi-envelope-open"></i>
                                    </div>

                                    <div>

                                        <h5
                                            class="pesan-modal-title"
                                            id="pesanModalLabel{{ $pesan->id }}"
                                        >
                                            Detail Pesan
                                        </h5>

                                        <p class="pesan-modal-subtitle">
                                            Pesan dari {{ $pesan->nama }}
                                        </p>

                                    </div>

                                </div>

                                <button
                                    type="button"
                                    class="btn-close"
                                    data-bs-dismiss="modal"
                                    aria-label="Tutup"
                                ></button>

                            </div>


                            {{-- MODAL BODY --}}

                            <div class="modal-body">

                                <div class="row">

                                    <div class="col-md-6">

                                        {{-- NAMA --}}

                                        <div class="pesan-detail">

                                            <div class="pesan-detail-label">
                                                Nama Pengirim
                                            </div>

                                            <div class="pesan-detail-value fw-semibold">
                                                {{ $pesan->nama }}
                                            </div>

                                        </div>


                                        {{-- EMAIL --}}

                                        <div class="pesan-detail">

                                            <div class="pesan-detail-label">
                                                Alamat Email
                                            </div>

                                            <div class="pesan-detail-value">
                                                {{ $pesan->email }}
                                            </div>

                                        </div>

                                    </div>


                                    <div class="col-md-6">

                                        {{-- SUBJECT --}}

                                        <div class="pesan-detail">

                                            <div class="pesan-detail-label">
                                                Subjek
                                            </div>

                                            <div class="pesan-detail-value fw-semibold">
                                                {{ $pesan->subjek }}
                                            </div>

                                        </div>


                                        {{-- DATE --}}

                                        <div class="pesan-detail">

                                            <div class="pesan-detail-label">
                                                Dikirim Pada
                                            </div>

                                            <div class="pesan-detail-value">
                                                {{ $pesan->created_at->format('d M Y, H:i') }} WIB
                                            </div>

                                        </div>

                                    </div>

                                </div>


                                {{-- MESSAGE --}}

                                <div class="pesan-detail">

                                    <div class="pesan-detail-label">
                                        Isi Pesan
                                    </div>

                                    <div class="pesan-message-box">
                                        {!! nl2br(e($pesan->pesan)) !!}
                                    </div>

                                </div>


                                {{-- STATUS --}}

                                <div class="pesan-detail">

                                    <div class="pesan-detail-label">
                                        Status
                                    </div>

                                    @if ($pesan->is_read)

                                        <span class="pesan-status read">

                                            <i class="bi bi-check2-circle"></i>

                                            Pesan sudah dibaca

                                        </span>

                                    @else

                                        <span class="pesan-status new">

                                            <i class="bi bi-circle-fill"></i>

                                            Pesan baru

                                        </span>

                                    @endif

                                </div>

                            </div>


                            {{-- MODAL FOOTER --}}

                            <div class="modal-footer">

                                {{-- MARK AS READ --}}

                                @if (!$pesan->is_read)

                                    <form
                                        action="{{ route('admin.pesan.read', $pesan) }}"
                                        method="POST"
                                        class="me-auto"
                                    >

                                        @csrf
                                        @method('PUT')

                                        <button
                                            type="submit"
                                            class="btn btn-primary"
                                        >

                                            <i class="bi bi-check2-circle me-1"></i>

                                            Tandai Sudah Dibaca

                                        </button>

                                    </form>

                                @endif


                                {{-- REPLY EMAIL --}}

                                <a
                                    href="mailto:{{ $pesan->email }}?subject={{ rawurlencode('Re: ' . $pesan->subjek . ' - SMK Negeri 4 Bogor') }}&body={{ rawurlencode("Halo {$pesan->nama},\n\nTerima kasih telah menghubungi SMK Negeri 4 Bogor melalui website K4VERSE.\n\nMenanggapi pesan Anda mengenai \"{$pesan->subjek}\", kami akan memberikan informasi lebih lanjut melalui email ini.\n\nTerima kasih.\n\nHormat kami,\nAdmin K4VERSE\nSMK Negeri 4 Bogor") }}"
                                    class="btn btn-outline-primary"
                                >

                                    <i class="bi bi-reply-fill me-1"></i>

                                    Balas Email

                                </a>


                                {{-- CLOSE --}}

                                <button
                                    type="button"
                                    class="btn btn-light border"
                                    data-bs-dismiss="modal"
                                >
                                    Tutup
                                </button>

                            </div>

                        </div>

                    </div>

                </div>

            @endforeach


        @else

            {{-- =========================
                 EMPTY STATE
            ========================= --}}

            <div class="pesan-empty">

                <div class="pesan-empty-icon">
                    <i class="bi bi-envelope"></i>
                </div>

                <h5>
                    @if (request('search') || request('kategori'))
                        Pesan Tidak Ditemukan
                    @else
                        Belum Ada Pesan
                    @endif
                </h5>

                <p>

                    @if (request('search') || request('kategori'))

                        Tidak ada pesan yang sesuai dengan pencarian atau kategori yang dipilih.

                    @else

                        Pesan yang dikirim melalui halaman kontak
                        akan muncul di sini.

                    @endif

                </p>

            </div>

        @endif

    </div>

</div>

@endsection