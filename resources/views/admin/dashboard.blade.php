@extends('layouts.admin')

@section('title', 'Dashboard Admin - SMK Negeri 4 Bogor')

@section('page-title', 'Dashboard')

@section('content')

    {{-- PAGE HEADING --}}
    <div class="admin-page-heading mb-4">
        <h1>Selamat datang, Administrator</h1>
        <p>
            Kelola konten dan informasi website SMK Negeri 4 Bogor melalui dashboard ini.
        </p>
    </div>


    {{-- STATISTICS --}}
    <div class="row g-3 mb-4">

        {{-- TOTAL BERITA --}}
        <div class="col-xl col-md-6">
            <div class="admin-stat-card dashboard-stat-card stat-blue">

                <div class="dashboard-stat-header">
                    <div class="admin-stat-icon">
                        <i class="bi bi-newspaper"></i>
                    </div>

                    <span class="dashboard-stat-status">
                        Aktif
                    </span>
                </div>

                <p class="admin-stat-number">
                    {{ $totalBerita }}
                </p>

                <p class="admin-stat-label">
                    Total Berita
                </p>

            </div>
        </div>


        {{-- TOTAL FOTO --}}
        <div class="col-xl col-md-6">
            <div class="admin-stat-card dashboard-stat-card stat-purple">

                <div class="dashboard-stat-header">
                    <div class="admin-stat-icon">
                        <i class="bi bi-images"></i>
                    </div>

                    <span class="dashboard-stat-status">
                        Galeri
                    </span>
                </div>

                <p class="admin-stat-number">
                    {{ $totalGaleri }}
                </p>

                <p class="admin-stat-label">
                    Total Foto
                </p>

            </div>
        </div>


        {{-- PRODUK --}}
        <div class="col-xl col-md-6">
            <div class="admin-stat-card dashboard-stat-card stat-orange">

                <div class="dashboard-stat-header">
                    <div class="admin-stat-icon">
                        <i class="bi bi-trophy"></i>
                    </div>

                    <span class="dashboard-stat-status">
                        Karya
                    </span>
                </div>

                <p class="admin-stat-number">
                    {{ $totalProduk }}
                </p>

                <p class="admin-stat-label">
                    Produk & Karya
                </p>

            </div>
        </div>

        {{-- PESAN --}}
        <div class="col-xl col-md-6">
            <div class="admin-stat-card dashboard-stat-card stat-pink">

                <div class="dashboard-stat-header">
                    <div class="admin-stat-icon">
                        <i class="bi bi-envelope"></i>
                    </div>

                    <span class="dashboard-stat-status">
                        Pesan
                    </span>
                </div>

                <p class="admin-stat-number">
                    {{ $totalPesan }}
                </p>

                <p class="admin-stat-label">
                    Pesan
                </p>

            </div>
        </div>

    </div>


    {{-- QUICK ACTIONS --}}
    <div class="admin-card mb-4">

        <div class="admin-card-header">
            <div>
                <h2>Quick Actions</h2>
                <p class="dashboard-section-desc">
                    Akses cepat untuk mengelola konten website.
                </p>
            </div>
        </div>

        <div class="admin-card-body">

            <div class="row g-3">

                {{-- TAMBAH BERITA --}}
                <div class="col-lg-3 col-md-6">
                    <a href="{{ route('admin.berita.create') }}" class="admin-action action-blue">

                        <div class="admin-action-icon">
                            <i class="bi bi-plus-lg"></i>
                        </div>

                        <div>
                            <p class="admin-action-title">
                                Tambah Berita
                            </p>

                            <p class="admin-action-desc">
                                Buat berita baru
                            </p>
                        </div>

                    </a>
                </div>


                {{-- UNGGAH GALERI --}}
                <div class="col-lg-3 col-md-6">
                    <a href="{{ route('admin.galeri.create') }}" class="admin-action action-purple">

                        <div class="admin-action-icon">
                            <i class="bi bi-cloud-arrow-up"></i>
                        </div>

                        <div>
                            <p class="admin-action-title">
                                Unggah Galeri
                            </p>

                            <p class="admin-action-desc">
                                Tambahkan foto baru
                            </p>
                        </div>

                    </a>
                </div>


                {{-- KELOLA PRODUK --}}
                <div class="col-lg-3 col-md-6">
                    <a href="{{ route('admin.produk.index') }}" class="admin-action action-orange">

                        <div class="admin-action-icon">
                            <i class="bi bi-trophy"></i>
                        </div>

                        <div>
                            <p class="admin-action-title">
                                Kelola Produk
                            </p>

                            <p class="admin-action-desc">
                                Atur karya siswa
                            </p>
                        </div>

                    </a>
                </div>


                {{-- KELOLA JURUSAN --}}
                <div class="col-lg-3 col-md-6">
                    <a href="#" class="admin-action action-green">

                        <div class="admin-action-icon">
                            <i class="bi bi-mortarboard"></i>
                        </div>

                        <div>
                            <p class="admin-action-title">
                                Kelola Jurusan
                            </p>

                            <p class="admin-action-desc">
                                Atur program keahlian
                            </p>
                        </div>

                    </a>
                </div>

            </div>

        </div>

    </div>


    {{-- BOTTOM SECTION --}}
    <div class="row g-4">

        {{-- AKTIVITAS TERKINI --}}
        <div class="col-lg-7">

            <div class="admin-card">

                <div class="admin-card-header">
                    <div>
                        <h2>Aktivitas Terkini</h2>
                        <p class="dashboard-section-desc">
                            Aktivitas terbaru pada website.
                        </p>
                    </div>

                    <span class="dashboard-realtime-badge">
                        <span></span>
                        Realtime
                    </span>
                </div>

<div class="admin-card-body">

    @if ($aktivitasTerbaru->count())

        <div class="dashboard-activity-list">

            @foreach ($aktivitasTerbaru as $aktivitas)

                <div class="dashboard-activity-item">

                    <div class="dashboard-activity-icon">
                        <i class="bi bi-activity"></i>
                    </div>

                    <div class="dashboard-activity-content">

                        <p class="dashboard-activity-title">
                            {{ $aktivitas->description }}
                        </p>

                        <p class="dashboard-activity-time">
                            {{ $aktivitas->created_at->diffForHumans() }}
                        </p>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        <div class="dashboard-empty-state">

            <div class="dashboard-empty-icon">
                <i class="bi bi-activity"></i>
            </div>

            <div>
                <p class="dashboard-empty-title">
                    Belum ada aktivitas
                </p>

                <p class="dashboard-empty-desc">
                    Aktivitas sistem akan muncul di sini.
                </p>
            </div>

        </div>

    @endif

</div>
            </div>

        </div>


        {{-- PESAN TERBARU --}}
        <div class="col-lg-5">

            <div class="admin-card">

                <div class="admin-card-header">
                    <div>
                        <h2>Pesan Masuk Terbaru</h2>
                        <p class="dashboard-section-desc">
                            Pesan terbaru dari pengunjung.
                        </p>
                    </div>
                </div>

                <div class="admin-card-body">

    @if ($pesanTerbaru->count())

        <div class="dashboard-message-list">

            @foreach ($pesanTerbaru as $pesan)

                <div class="dashboard-message-item">

                    <div class="dashboard-message-icon">
                        <i class="bi bi-envelope"></i>
                    </div>

                    <div class="dashboard-message-content">

                        <div class="dashboard-message-top">
                            <p class="dashboard-message-name">
                                {{ $pesan->nama }}
                            </p>

                            @if (!$pesan->is_read)
                                <span class="dashboard-message-new">
                                    Baru
                                </span>
                            @endif
                        </div>

                        <p class="dashboard-message-subject">
                            {{ $pesan->subjek }}
                        </p>

                        <p class="dashboard-message-preview">
                            {{ \Illuminate\Support\Str::limit($pesan->pesan, 65) }}
                        </p>

                        <p class="dashboard-message-time">
                            {{ $pesan->created_at->diffForHumans() }}
                        </p>

                    </div>

                </div>

            @endforeach

        </div>

        <div class="dashboard-message-footer">
            <a href="{{ route('admin.pesan.index') }}">
                Lihat Semua Pesan
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>

    @else

        <div class="dashboard-empty-state">

            <div class="dashboard-empty-icon">
                <i class="bi bi-envelope"></i>
            </div>

            <div>
                <p class="dashboard-empty-title">
                    Belum ada pesan
                </p>

                <p class="dashboard-empty-desc">
                    Pesan masuk akan muncul di sini.
                </p>
            </div>

        </div>

    @endif

</div>

            </div>

        </div>

    </div>

    @push('styles')
<style>
    /* =========================
       PESAN TERBARU
    ========================= */

    .dashboard-message-list {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .dashboard-message-item {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        padding: 13px 10px;
        border-bottom: 1px solid #EEF2F7;
        transition: background .2s ease;
    }

    .dashboard-message-item:last-child {
        border-bottom: 0;
    }

    .dashboard-message-item:hover {
        background: #F8FAFD;
        border-radius: 10px;
    }

    .dashboard-message-icon {
        width: 36px;
        height: 36px;
        flex: 0 0 36px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 10px;
        background: #EEF4FF;
        color: #2563EB;

        font-size: .9rem;
    }

    .dashboard-message-content {
        min-width: 0;
        flex: 1;
    }

    .dashboard-message-top {
        display: flex;
        align-items: center;
        gap: 7px;
        margin-bottom: 2px;
    }

    .dashboard-message-name {
        margin: 0;
        color: #1B2638;
        font-size: .82rem;
        font-weight: 700;

        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .dashboard-message-new {
        flex-shrink: 0;

        padding: 2px 7px;
        border-radius: 999px;

        background: #E8F1FF;
        color: #2563EB;

        font-size: .58rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .04em;
    }

    .dashboard-message-subject {
        margin: 0 0 2px;

        color: #334155;
        font-size: .72rem;
        font-weight: 600;

        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .dashboard-message-preview {
        margin: 0;

        color: #8A94A6;
        font-size: .68rem;
        line-height: 1.45;

        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .dashboard-message-time {
        margin: 4px 0 0;

        color: #A0A9B8;
        font-size: .61rem;
    }

    .dashboard-message-footer {
        margin-top: 10px;
        padding-top: 12px;
        border-top: 1px solid #EEF2F7;
        text-align: right;
    }

    .dashboard-message-footer a {
        display: inline-flex;
        align-items: center;
        gap: 6px;

        color: #2563EB;
        font-size: .7rem;
        font-weight: 700;
        text-decoration: none;

        transition: gap .2s ease;
    }

    .dashboard-message-footer a:hover {
        gap: 9px;
    }

    .dashboard-activity-list {
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.dashboard-activity-item {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    padding: 13px 10px;
    border-bottom: 1px solid #EEF2F7;
}

.dashboard-activity-item:last-child {
    border-bottom: 0;
}

.dashboard-activity-item:hover {
    background: #F8FAFD;
    border-radius: 10px;
}

.dashboard-activity-icon {
    width: 36px;
    height: 36px;
    flex: 0 0 36px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 10px;
    background: #EEF4FF;
    color: #2563EB;
    font-size: .9rem;
}

.dashboard-activity-content {
    min-width: 0;
    flex: 1;
}

.dashboard-activity-title {
    margin: 2px 0 4px;
    color: #334155;
    font-size: .76rem;
    font-weight: 600;
}

.dashboard-activity-time {
    margin: 0;
    color: #A0A9B8;
    font-size: .61rem;
}


    /* =========================
       RESPONSIVE
    ========================= */

    @media (max-width: 576px) {

        .dashboard-message-item {
            padding: 11px 6px;
        }

        .dashboard-message-icon {
            width: 34px;
            height: 34px;
            flex-basis: 34px;
        }

    }
</style>
@endpush

@endsection