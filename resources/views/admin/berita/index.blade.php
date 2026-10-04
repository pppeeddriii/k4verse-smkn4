@extends('layouts.admin')

@section('title', 'Kelola Berita - Admin')
@section('page-title', 'Kelola Berita')

@section('content')

<style>
    /* =========================
       HALAMAN BERITA
    ========================= */

    .berita-page {
        width: 100%;
    }

    .berita-page-heading {
        margin-bottom: 24px;
    }

    .berita-page-heading h1 {
        margin: 0 0 6px;
        font-size: 1.65rem;
        font-weight: 800;
        color: var(--admin-navy);
    }

    .berita-page-heading p {
        margin: 0;
        color: var(--admin-muted);
        font-size: .9rem;
    }

    /* =========================
       CARD
    ========================= */

    .berita-main-card {
        background: #fff;
        border: 1px solid #E3EAF3;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 6px 20px rgba(18, 38, 63, .05);
    }

    .berita-main-header {
        padding: 22px 24px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        border-bottom: 1px solid #E8EDF4;
    }

    .berita-main-title {
        margin: 0;
        font-size: 1.15rem;
        font-weight: 750;
        color: var(--admin-navy);
    }

    .berita-main-count {
        margin: 5px 0 0;
        font-size: .82rem;
        color: var(--admin-muted);
    }

    /* =========================
       TOOLS (search, filter, reset, tambah)
    ========================= */

    .berita-card-tools {
        display: flex;
        align-items: center;
        gap: 9px;
        flex-shrink: 0;
    }

    .berita-search {
        position: relative;
        width: 260px;
    }

    .berita-search-icon {
        position: absolute;
        top: 50%;
        left: 13px;
        transform: translateY(-50%);
        color: #8EA0B5;
        font-size: .9rem;
        pointer-events: none;
    }

    .berita-search-input {
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

    .berita-search-input:focus {
        border-color: #AFC6E8;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, .07);
    }

    .berita-category-select {
        height: 38px;
        min-width: 145px;
        padding: 0 12px;
        border: 1px solid #DCE5EF;
        border-radius: 9px;
        outline: none;
        background: #fff;
        color: #334155;
        font-size: .78rem;
        cursor: pointer;
    }

    .berita-reset {
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

    .berita-reset:hover {
        background: #F5F8FC;
        color: var(--admin-primary);
        border-color: #C9D8ED;
    }

    /* =========================
       BUTTON TAMBAH
    ========================= */

    .btn-tambah-berita {
        height: 38px;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 0 16px;
        border-radius: 9px;
        background: var(--admin-primary);
        color: #fff !important;
        text-decoration: none !important;
        font-size: .82rem;
        font-weight: 700;
        white-space: nowrap;
        transition: .2s ease;
        box-shadow: 0 5px 14px rgba(37, 99, 235, .18);
    }

    .btn-tambah-berita:hover {
        transform: translateY(-1px);
        box-shadow: 0 8px 18px rgba(37, 99, 235, .25);
    }

    /* =========================
       TABLE
    ========================= */

    .berita-table-wrapper {
        width: 100%;
        overflow-x: auto;
    }

    .berita-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 900px;
    }

    .berita-table thead th {
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

    .berita-table tbody td {
        padding: 17px 18px;
        border-bottom: 1px solid #EDF1F6;
        vertical-align: middle;
        background: #fff;
    }

    .berita-table tbody tr {
        transition: .18s ease;
    }

    .berita-table tbody tr:hover td {
        background: #F9FBFF;
    }

    .berita-table tbody tr:last-child td {
        border-bottom: none;
    }

    /* =========================
       CHECKBOX
    ========================= */

    .berita-checkbox {
        width: 18px;
        height: 18px;
        cursor: pointer;
        accent-color: var(--admin-primary);
    }

    .col-check {
        width: 52px;
        text-align: center !important;
    }

    .col-number {
        width: 55px;
    }

    /* =========================
       ARTIKEL
    ========================= */

    .berita-article {
        display: flex;
        align-items: center;
        gap: 13px;
        min-width: 320px;
    }

    .berita-thumbnail {
        width: 62px;
        height: 48px;
        flex-shrink: 0;
        border-radius: 9px;
        overflow: hidden;
        background: #EEF3F8;
    }

    .berita-thumbnail img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .berita-thumbnail-placeholder {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #8CA0B8;
        font-size: 1.1rem;
    }

    .berita-info {
        min-width: 0;
    }

    .berita-title {
        color: var(--admin-navy);
        font-size: .88rem;
        font-weight: 750;
        line-height: 1.35;
        margin-bottom: 4px;
    }

    .berita-excerpt {
        max-width: 430px;
        color: #8797AA;
        font-size: .75rem;
        line-height: 1.4;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .berita-number {
        color: #8B9AAF;
        font-size: .82rem;
        font-weight: 700;
    }

    /* =========================
       CATEGORY
    ========================= */

    .berita-category {
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

    /* =========================
       DATE
    ========================= */

    .berita-date {
        color: #64748B;
        font-size: .78rem;
        font-weight: 600;
        white-space: nowrap;
    }

    /* =========================
       ACTION
    ========================= */

    .berita-actions {
        display: flex;
        align-items: center;
        gap: 7px;
        white-space: nowrap;
    }

    .btn-action {
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

    .btn-edit {
        background: #EEF4FF;
        color: #2563EB !important;
        border-color: #DCE8FF;
    }

    .btn-edit:hover {
        background: #E1EBFF;
    }

    .btn-view {
        background: #F2F7F4;
        color: #15966A !important;
        border-color: #DDEFE6;
    }

    .btn-view:hover {
        background: #E3F4EB;
    }

    /* =========================
       FOOTER BULK ACTION
    ========================= */

    .berita-bulk-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        padding: 17px 24px;
        background: #FBFCFE;
        border-top: 1px solid #E8EDF4;
    }

    .berita-selected-info {
        color: #8291A5;
        font-size: .8rem;
    }

    .berita-selected-info strong {
        color: var(--admin-navy);
    }

    .btn-bulk-delete {
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

    .btn-bulk-delete:disabled {
        background: #E9EDF2;
        border-color: #D9DEE6;
        color: #9AA3AF;
        cursor: not-allowed;
        opacity: 1;
        box-shadow: none;
        transform: none;
    }

    .btn-bulk-delete.active {
        background: #D14343;
        border-color: #D14343;
        color: #fff;
        cursor: pointer;
    }

    .btn-bulk-delete.active:hover {
        background: #B83232;
        border-color: #B83232;
    }

    /* =========================
       EMPTY
    ========================= */

    .berita-empty {
        padding: 60px 20px !important;
        text-align: center;
    }

    .berita-empty i {
        display: block;
        margin-bottom: 12px;
        font-size: 2rem;
        color: #A8B6C8;
    }

    .berita-empty strong {
        display: block;
        color: var(--admin-navy);
        margin-bottom: 5px;
    }

    .berita-empty span {
        color: var(--admin-muted);
        font-size: .82rem;
    }

    /* =========================
       ALERT
    ========================= */

    .berita-alert {
        margin-bottom: 20px;
        padding: 13px 16px;
        border-radius: 10px;
        font-size: .84rem;
        font-weight: 600;
    }

    .berita-alert-success {
        background: #ECFDF5;
        border: 1px solid #C9F0DF;
        color: #087A53;
    }

    .berita-alert-error {
        background: #FFF5F5;
        border: 1px solid #F3CCCC;
        color: #B83232;
    }

    /* =========================
       STAT CARDS
    ========================= */

    .berita-stats-row {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 16px;
        margin-bottom: 24px;
    }

    .berita-stat-card {
        border-radius: 14px;
        padding: 20px 22px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        border: 1px solid transparent;
    }

    .berita-stat-label {
        font-size: .68rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .05em;
        margin-bottom: 6px;
    }

    .berita-stat-value {
        font-size: 1.5rem;
        font-weight: 800;
        line-height: 1.1;
    }

    .berita-stat-value-small {
        font-size: 1.15rem;
        font-weight: 800;
        line-height: 1.2;
    }

    .berita-stat-caption {
        font-size: .74rem;
        margin-top: 4px;
    }

    .berita-stat-icon {
        width: 42px;
        height: 42px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
        flex-shrink: 0;
    }

    .berita-stat-blue {
        background: #EEF4FF;
        border-color: #DCE8FF;
    }
    .berita-stat-blue .berita-stat-label,
    .berita-stat-blue .berita-stat-caption {
        color: #5B7FB8;
    }
    .berita-stat-blue .berita-stat-value {
        color: #1E4FA0;
    }
    .berita-stat-blue .berita-stat-icon {
        background: #DCE8FF;
        color: #2563EB;
    }

    .berita-stat-purple {
        background: #F5F0FF;
        border-color: #E5D8FF;
    }
    .berita-stat-purple .berita-stat-label,
    .berita-stat-purple .berita-stat-caption {
        color: #9482C4;
    }
    .berita-stat-purple .berita-stat-value {
        color: #6B3FBF;
    }
    .berita-stat-purple .berita-stat-icon {
        background: #E5D8FF;
        color: #7C3AED;
    }

    .berita-stat-orange {
        background: #FFF6EC;
        border-color: #FFE3C2;
    }
    .berita-stat-orange .berita-stat-label,
    .berita-stat-orange .berita-stat-caption {
        color: #C79154;
    }
    .berita-stat-orange .berita-stat-value {
        color: #B4650F;
    }
    .berita-stat-orange .berita-stat-icon {
        background: #FFE3C2;
        color: #E8830A;
    }

    @media (max-width: 767px) {
        .berita-stats-row {
            grid-template-columns: 1fr;
        }
    }

    /* =========================
       PAGINATION
    ========================= */

    .berita-pagination {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        padding: 18px 24px;
        border-top: 1px solid #E8EDF4;
        background: #fff;
        flex-wrap: wrap;
    }

    .berita-pagination-info {
        color: #8291A5;
        font-size: .78rem;
    }

    .berita-pagination-links {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .berita-pagination-links a,
    .berita-pagination-links span {
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

    .berita-pagination-links a:hover {
        background: #F5F8FC;
        color: var(--admin-primary);
        border-color: #C9D8ED;
    }

    .berita-pagination-links span[aria-current="page"] {
        background: var(--admin-primary);
        border-color: var(--admin-primary);
        color: #fff;
    }

    .berita-pagination-links span[aria-disabled="true"] {
        opacity: .45;
        cursor: not-allowed;
    }

    @media (max-width: 800px) {
        .berita-main-header {
            flex-direction: column;
            align-items: flex-start;
        }
        .berita-card-tools {
            width: 100%;
            flex-wrap: wrap;
        }
        .berita-search {
            flex: 1;
            min-width: 180px;
        }
    }
</style>


<div class="berita-page">

    {{-- PAGE HEADING --}}
    <div class="berita-page-heading">
        <h1>Kelola Berita</h1>
        <p>Tambah, edit, atau hapus berita yang tampil di website.</p>
    </div>


    {{-- ALERT SUCCESS --}}
    @if (session('success'))
        <div class="berita-alert berita-alert-success">
            <i class="bi bi-check-circle-fill me-1"></i>
            {{ session('success') }}
        </div>
    @endif


    {{-- ALERT ERROR --}}
    @if (session('error'))
        <div class="berita-alert berita-alert-error">
            <i class="bi bi-exclamation-circle-fill me-1"></i>
            {{ session('error') }}
        </div>
    @endif


    {{-- STAT CARDS --}}
    <div class="berita-stats-row">

        <div class="berita-stat-card berita-stat-blue">
            <div>
                <div class="berita-stat-label">Total Berita</div>
                <div class="berita-stat-value">{{ $totalBerita }}</div>
                <div class="berita-stat-caption">Semua artikel terdaftar</div>
            </div>
            <div class="berita-stat-icon"><i class="bi bi-file-earmark-text-fill"></i></div>
        </div>

        <div class="berita-stat-card berita-stat-purple">
            <div>
                <div class="berita-stat-label">Kategori Berita</div>
                <div class="berita-stat-value">{{ $kategoriCount }}</div>
                <div class="berita-stat-caption">Prestasi, Kegiatan, Pengumuman</div>
            </div>
            <div class="berita-stat-icon"><i class="bi bi-tags-fill"></i></div>
        </div>

        <div class="berita-stat-card berita-stat-orange">
            <div>
                <div class="berita-stat-label">Berita Bulan Ini</div>
                <div class="berita-stat-value berita-stat-value-small">{{ $beritaBulanIni }} Baru</div>
                <div class="berita-stat-caption">{{ now()->locale('id')->translatedFormat('F') }}</div>
            </div>
            <div class="berita-stat-icon"><i class="bi bi-calendar-event-fill"></i></div>
        </div>

    </div>


    {{-- MAIN CARD --}}
    <div class="berita-main-card">

        {{-- HEADER --}}
        <div class="berita-main-header">

            <div>
                <h2 class="berita-main-title">Daftar Berita</h2>
                <p class="berita-main-count" id="beritaResultInfo">
                    @if ($beritas->total() > 0)
                        Menampilkan {{ $beritas->firstItem() }} - {{ $beritas->lastItem() }} dari {{ $beritas->total() }} berita
                    @else
                        Tidak ada berita ditemukan
                    @endif
                </p>
            </div>

            <form
                action="{{ route('admin.berita.index') }}"
                method="GET"
                class="berita-card-tools"
                id="beritaSearchForm"
            >

                <div class="berita-search">
                    <i class="bi bi-search berita-search-icon"></i>
                    <input
                        type="text"
                        name="search"
                        id="beritaSearchInput"
                        value="{{ $search }}"
                        class="berita-search-input"
                        placeholder="Cari judul berita..."
                        autocomplete="off"
                    >
                </div>

                <select name="category" id="beritaCategoryFilter" class="berita-category-select">
                    <option value="Semua" {{ $category === 'Semua' ? 'selected' : '' }}>Semua Kategori</option>
                    <option value="Prestasi" {{ $category === 'Prestasi' ? 'selected' : '' }}>Prestasi</option>
                    <option value="Kegiatan" {{ $category === 'Kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                    <option value="Pengumuman" {{ $category === 'Pengumuman' ? 'selected' : '' }}>Pengumuman</option>
                </select>

                <a
                    href="{{ route('admin.berita.index') }}"
                    class="berita-reset"
                    id="beritaResetButton"
                    title="Reset pencarian"
                    style="{{ $search === '' && $category === 'Semua' ? 'display:none;' : '' }}"
                >
                    <i class="bi bi-arrow-counterclockwise"></i>
                </a>

                <a href="{{ route('admin.berita.create') }}" class="btn-tambah-berita">
                    <i class="bi bi-plus-lg"></i>
                    Tambah Berita
                </a>

            </form>

        </div>


        {{-- BULK DELETE FORM --}}
        <form
            id="bulkDeleteForm"
            action="{{ route('admin.berita.bulk-delete') }}"
            method="POST"
        >

            @csrf


            {{-- TABLE --}}
            <div class="berita-table-wrapper">

                <table class="berita-table">

                    <thead>
                        <tr>
                            <th class="col-check">
                                <input type="checkbox" id="selectAll" class="berita-checkbox" title="Pilih semua">
                            </th>
                            <th class="col-number">#</th>
                            <th>Artikel</th>
                            <th>Kategori</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>


                    <tbody id="beritaTableBody">

                        @forelse ($beritas as $index => $berita)

                            <tr>

                                <td class="col-check">
                                    <input
                                        type="checkbox"
                                        name="selected[]"
                                        value="{{ $berita->id }}"
                                        class="berita-checkbox berita-item-checkbox"
                                    >
                                </td>

                                <td class="berita-number">
                                    {{ $beritas->firstItem() + $index }}
                                </td>

                                <td>
                                    <div class="berita-article">

                                        <div class="berita-thumbnail">
                                            @if ($berita->image)
                                                @if (file_exists(public_path('images/berita/' . $berita->image)))
                                                    <img src="{{ asset('images/berita/' . $berita->image) }}" alt="{{ $berita->title }}">
                                                @elseif (file_exists(public_path('images/' . $berita->image)))
                                                    <img src="{{ asset('images/' . $berita->image) }}" alt="{{ $berita->title }}">
                                                @else
                                                    <div class="berita-thumbnail-placeholder"><i class="bi bi-image"></i></div>
                                                @endif
                                            @else
                                                <div class="berita-thumbnail-placeholder"><i class="bi bi-newspaper"></i></div>
                                            @endif
                                        </div>

                                        <div class="berita-info">
                                            <div class="berita-title">{{ $berita->title }}</div>
                                            @if ($berita->excerpt)
                                                <div class="berita-excerpt">{{ $berita->excerpt }}</div>
                                            @endif
                                        </div>

                                    </div>
                                </td>

                                <td>
                                    <span class="berita-category">{{ $berita->category }}</span>
                                </td>

                                <td class="berita-date">
                                    {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y') }}
                                </td>

                                <td>
                                    <div class="berita-actions">
                                        <a href="{{ route('admin.berita.edit', $berita) }}" class="btn-action btn-edit" title="Edit berita">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                        <a href="{{ url('/news/' . $berita->id) }}" target="_blank" class="btn-action btn-view" title="Lihat berita">
                                            <i class="bi bi-eye"></i> Lihat
                                        </a>
                                    </div>
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="6" class="berita-empty">
                                    <i class="bi bi-newspaper"></i>
                                    <strong>
                                        @if ($search !== '' || $category !== 'Semua')
                                            Berita tidak ditemukan
                                        @else
                                            Belum ada berita
                                        @endif
                                    </strong>
                                    <span>
                                        @if ($search !== '' || $category !== 'Semua')
                                            Coba ubah kata pencarian atau kategori.
                                        @else
                                            Tambahkan berita pertama kamu.
                                        @endif
                                    </span>
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- BULK FOOTER --}}
            <div class="berita-bulk-footer" id="beritaBulkFooter" style="{{ $beritas->count() === 0 ? 'display:none;' : '' }}">

                <div class="berita-selected-info">
                    <strong id="selectedCount">0</strong> berita dipilih
                </div>

                <button type="button" id="bulkDeleteButton" class="btn-bulk-delete" disabled>
                    <i class="bi bi-trash3"></i>
                    Hapus Terpilih
                </button>

            </div>

        </form>


        {{-- PAGINATION --}}
        @if ($beritas->hasPages())

            <div class="berita-pagination" id="beritaPagination">

                <div class="berita-pagination-info">
                    Menampilkan {{ $beritas->firstItem() }} - {{ $beritas->lastItem() }} dari {{ $beritas->total() }} berita
                </div>

                <div class="berita-pagination-links">

                    @if ($beritas->onFirstPage())
                        <span aria-disabled="true"><i class="bi bi-chevron-left"></i></span>
                    @else
                        <a href="{{ $beritas->previousPageUrl() }}" rel="prev"><i class="bi bi-chevron-left"></i></a>
                    @endif

                    @foreach ($beritas->getUrlRange(max(1, $beritas->currentPage() - 2), min($beritas->lastPage(), $beritas->currentPage() + 2)) as $page => $url)
                        @if ($page == $beritas->currentPage())
                            <span aria-current="page">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach

                    @if ($beritas->hasMorePages())
                        <a href="{{ $beritas->nextPageUrl() }}" rel="next"><i class="bi bi-chevron-right"></i></a>
                    @else
                        <span aria-disabled="true"><i class="bi bi-chevron-right"></i></span>
                    @endif

                </div>

            </div>

        @endif

    </div>

</div>


{{-- MODAL KONFIRMASI --}}
<div id="bulkDeleteModal" class="delete-modal-overlay">
    <div class="delete-modal">

        <div class="delete-modal-icon">
            <i class="bi bi-trash3"></i>
        </div>

        <h3>Hapus Berita?</h3>

        <p>Berita yang dipilih akan dihapus dari sistem. Tindakan ini tidak dapat dibatalkan.</p>

        <div class="delete-modal-actions">
            <button type="button" class="delete-modal-cancel" id="cancelBulkDelete">Batal</button>
            <button type="button" class="delete-modal-confirm" id="confirmBulkDelete">
                <i class="bi bi-trash3"></i> Hapus Berita
            </button>
        </div>

    </div>
</div>


<script>
document.addEventListener('DOMContentLoaded', function () {

    /* =====================================================
       ELEMENTS
    ===================================================== */

    const selectAll = document.getElementById('selectAll');
    const beritaTableBody = document.getElementById('beritaTableBody');
    const selectedCount = document.getElementById('selectedCount');
    const bulkDeleteButton = document.getElementById('bulkDeleteButton');
    const beritaBulkFooter = document.getElementById('beritaBulkFooter');
    const bulkDeleteForm = document.getElementById('bulkDeleteForm');
    const bulkDeleteModal = document.getElementById('bulkDeleteModal');
    const cancelBulkDelete = document.getElementById('cancelBulkDelete');
    const confirmBulkDelete = document.getElementById('confirmBulkDelete');

    const beritaSearchInput = document.getElementById('beritaSearchInput');
    const beritaCategoryFilter = document.getElementById('beritaCategoryFilter');
    const beritaSearchForm = document.getElementById('beritaSearchForm');
    const beritaResultInfo = document.getElementById('beritaResultInfo');
    const beritaPagination = document.getElementById('beritaPagination');
    const beritaResetButton = document.getElementById('beritaResetButton');

    let searchController = null;
    let searchRequestId = 0;


    /* =====================================================
       CHECKBOX
    ===================================================== */

    function getCheckboxes() {
        if (!beritaTableBody) return [];
        return Array.from(beritaTableBody.querySelectorAll('.berita-item-checkbox'));
    }

    function updateSelectedCount() {
        const checkboxes = getCheckboxes();
        const checked = checkboxes.filter(c => c.checked);
        const count = checked.length;

        if (selectedCount) selectedCount.textContent = count;

        if (selectAll) {
            selectAll.checked = checkboxes.length > 0 && count === checkboxes.length;
            selectAll.indeterminate = count > 0 && count < checkboxes.length;
        }

        if (bulkDeleteButton) {
            const hasSelection = count > 0;
            bulkDeleteButton.disabled = !hasSelection;
            bulkDeleteButton.classList.toggle('active', hasSelection);
        }
    }

    if (selectAll) {
        selectAll.addEventListener('change', function () {
            getCheckboxes().forEach(c => c.checked = selectAll.checked);
            updateSelectedCount();
        });
    }

    if (beritaTableBody) {
        beritaTableBody.addEventListener('change', function (event) {
            if (event.target.classList.contains('berita-item-checkbox')) {
                updateSelectedCount();
            }
        });
    }


    /* =====================================================
       DELETE MODAL
    ===================================================== */

    function closeBulkDeleteModal() {
        if (!bulkDeleteModal) return;
        bulkDeleteModal.classList.remove('show');
        document.body.classList.remove('modal-open');
    }

    if (bulkDeleteButton) {
        bulkDeleteButton.addEventListener('click', function () {
            const selected = getCheckboxes().filter(c => c.checked);
            if (selected.length === 0) return;
            bulkDeleteModal.classList.add('show');
            document.body.classList.add('modal-open');
        });
    }

    if (cancelBulkDelete) {
        cancelBulkDelete.addEventListener('click', closeBulkDeleteModal);
    }

    if (confirmBulkDelete) {
        confirmBulkDelete.addEventListener('click', function () {
            if (bulkDeleteForm) bulkDeleteForm.submit();
        });
    }

    if (bulkDeleteModal) {
        bulkDeleteModal.addEventListener('click', function (event) {
            if (event.target === bulkDeleteModal) closeBulkDeleteModal();
        });
    }

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') closeBulkDeleteModal();
    });


    /* =====================================================
       ESCAPE HTML
    ===================================================== */

    function escapeHtml(value) {
        const div = document.createElement('div');
        div.textContent = value ?? '';
        return div.innerHTML;
    }


    /* =====================================================
       RESULT INFO
    ===================================================== */

    function updateResultInfo(count) {
        if (!beritaResultInfo) return;
        beritaResultInfo.textContent = count === 0
            ? 'Tidak ada berita ditemukan'
            : `Ditemukan ${count} berita`;
    }

    function updateBulkFooter(hasResults) {
        if (!beritaBulkFooter) return;
        beritaBulkFooter.style.display = hasResults ? 'flex' : 'none';
    }


    /* =====================================================
       RENDER EMPTY / RESULTS
    ===================================================== */

    function renderEmptyResults() {
        beritaTableBody.innerHTML = `
            <tr>
                <td colspan="6" class="berita-empty">
                    <i class="bi bi-newspaper"></i>
                    <strong>Berita tidak ditemukan</strong>
                    <span>Coba ubah kata pencarian atau kategori.</span>
                </td>
            </tr>
        `;

        if (selectAll) {
            selectAll.checked = false;
            selectAll.indeterminate = false;
        }

        updateBulkFooter(false);
        updateSelectedCount();
    }

    function renderResults(beritas) {
        if (!beritaTableBody) return;

        if (!beritas || beritas.length === 0) {
            renderEmptyResults();
            return;
        }

        let html = '';

        beritas.forEach(function (berita, index) {
            const title = escapeHtml(berita.title);
            const excerpt = escapeHtml(berita.excerpt || '');
            const category = escapeHtml(berita.category);
            const tanggal = escapeHtml(berita.tanggal);
            const imageUrl = escapeHtml(berita.image_url || '');
            const editUrl = escapeHtml(berita.edit_url);
            const viewUrl = escapeHtml(berita.view_url);

            html += `
                <tr>
                    <td class="col-check">
                        <input type="checkbox" name="selected[]" value="${berita.id}" class="berita-checkbox berita-item-checkbox">
                    </td>
                    <td class="berita-number">${index + 1}</td>
                    <td>
                        <div class="berita-article">
                            <div class="berita-thumbnail">
                                ${
                                    imageUrl
                                        ? `<img src="${imageUrl}" alt="${title}">`
                                        : `<div class="berita-thumbnail-placeholder"><i class="bi bi-newspaper"></i></div>`
                                }
                            </div>
                            <div class="berita-info">
                                <div class="berita-title">${title}</div>
                                ${excerpt ? `<div class="berita-excerpt">${excerpt}</div>` : ''}
                            </div>
                        </div>
                    </td>
                    <td><span class="berita-category">${category}</span></td>
                    <td class="berita-date">${tanggal}</td>
                    <td>
                        <div class="berita-actions">
                            <a href="${editUrl}" class="btn-action btn-edit"><i class="bi bi-pencil"></i> Edit</a>
                            <a href="${viewUrl}" target="_blank" class="btn-action btn-view"><i class="bi bi-eye"></i> Lihat</a>
                        </div>
                    </td>
                </tr>
            `;
        });

        beritaTableBody.innerHTML = html;

        updateBulkFooter(true);
        updateSelectedCount();
    }


    /* =====================================================
       REALTIME SEARCH (AJAX, sama seperti Galeri)
    ===================================================== */

    function performSearch() {

        const keyword = beritaSearchInput ? beritaSearchInput.value.trim() : '';
        const category = beritaCategoryFilter ? beritaCategoryFilter.value : '';

        if (searchController) searchController.abort();
        searchController = new AbortController();

        const requestId = ++searchRequestId;

        const params = new URLSearchParams();
        if (keyword !== '') params.set('search', keyword);
        if (category !== '' && category !== 'Semua') params.set('category', category);

        if (beritaResetButton) {
            beritaResetButton.style.display = (keyword !== '' || (category !== '' && category !== 'Semua'))
                ? 'inline-flex'
                : 'none';
        }

        fetch("{{ route('admin.berita.search') }}?" + params.toString(), {
            method: 'GET',
            signal: searchController.signal,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            },
            cache: 'no-store'
        })
        .then(function (response) {
            if (!response.ok) throw new Error('Gagal mengambil data berita.');
            return response.json();
        })
        .then(function (data) {
            if (requestId !== searchRequestId) return;

            const beritas = data.beritas || [];

            renderResults(beritas);
            updateResultInfo(beritas.length);

            if (beritaPagination) {
                beritaPagination.style.display = 'none';
            }
        })
        .catch(function (error) {
            if (error.name === 'AbortError') return;
            console.error('Berita search error:', error);
        });
    }

    if (beritaSearchInput) {
        beritaSearchInput.addEventListener('input', performSearch);
        beritaSearchInput.addEventListener('keydown', function (event) {
            if (event.key === 'Enter') event.preventDefault();
        });
    }

    if (beritaCategoryFilter) {
        beritaCategoryFilter.addEventListener('change', performSearch);
    }

    if (beritaResetButton) {
        beritaResetButton.addEventListener('click', function (event) {
            event.preventDefault();
            if (beritaSearchInput) beritaSearchInput.value = '';
            if (beritaCategoryFilter) beritaCategoryFilter.value = 'Semua';
            performSearch();
        });
    }

    if (beritaSearchForm) {
        beritaSearchForm.addEventListener('submit', function (event) {
            event.preventDefault();
            performSearch();
        });
    }


    /* =====================================================
       INITIAL
    ===================================================== */

    updateSelectedCount();

});
</script>

@endsection