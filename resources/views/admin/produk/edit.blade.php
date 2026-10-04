@extends('layouts.admin')

@section('title', 'Edit Produk - Admin')
@section('page-title', 'Edit Produk')

@section('content')

<style>
    .produk-form-page {
        max-width: 1180px;
        margin: 0 auto;
    }

    .produk-form-heading {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 24px;
    }

    .produk-form-heading h1 {
        margin: 0 0 6px;
        color: var(--admin-navy);
        font-size: 1.65rem;
        font-weight: 800;
        letter-spacing: -0.02em;
    }

    .produk-form-heading p {
        margin: 0;
        color: var(--admin-muted);
        font-size: .9rem;
    }

    .produk-back-btn {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        height: 40px;
        padding: 0 14px;
        border: 1px solid #DCE5F2;
        border-radius: 9px;
        background: #fff;
        color: #4E5968;
        font-size: .84rem;
        font-weight: 700;
        text-decoration: none;
        transition: .2s ease;
        white-space: nowrap;
    }

    .produk-back-btn:hover {
        border-color: #C5D4E8;
        background: #F8FAFD;
        color: var(--admin-primary);
        transform: translateY(-1px);
    }

    .produk-form-grid {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 350px;
        gap: 20px;
        align-items: start;
    }

    .produk-form-card {
        background: #fff;
        border: 1px solid #E3EAF3;
        border-radius: 18px;
        box-shadow: 0 6px 20px rgba(18, 38, 63, .05);
        overflow: hidden;
    }

    .produk-form-card-header {
        padding: 20px 24px;
        border-bottom: 1px solid #E8EEF5;
        background: #fff;
    }

    .produk-form-card-header-inner {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .produk-form-icon {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        border-radius: 11px;
        background: #EEF4FF;
        color: var(--admin-primary);
        font-size: 1.05rem;
    }

    .produk-form-card-header h2 {
        margin: 0;
        color: var(--admin-navy);
        font-size: 1.05rem;
        font-weight: 800;
    }

    .produk-form-card-header p {
        margin: 3px 0 0;
        color: var(--admin-muted);
        font-size: .78rem;
    }

    .produk-form-card-body {
        padding: 24px;
    }

    .produk-field {
        margin-bottom: 20px;
    }

    .produk-field:last-child {
        margin-bottom: 0;
    }

    .produk-label {
        display: block;
        margin-bottom: 7px;
        color: #27364A;
        font-size: .82rem;
        font-weight: 750;
    }

    .produk-required {
        color: #D14343;
    }

    .produk-input,
    .produk-select,
    .produk-textarea {
        width: 100%;
        border: 1px solid #DCE5F2;
        border-radius: 9px;
        background: #fff;
        color: #27364A;
        font-size: .86rem;
        outline: none;
        transition: .2s ease;
    }

    .produk-input,
    .produk-select {
        height: 42px;
        padding: 0 12px;
    }

    .produk-textarea {
        min-height: 145px;
        padding: 11px 12px;
        resize: vertical;
        line-height: 1.55;
    }

    .produk-input:focus,
    .produk-select:focus,
    .produk-textarea:focus {
        border-color: #7AA5D8;
        box-shadow: 0 0 0 3px rgba(0, 74, 153, .08);
    }

    .produk-input::placeholder,
    .produk-textarea::placeholder {
        color: #A3ACB9;
    }

    .produk-input.is-invalid,
    .produk-select.is-invalid,
    .produk-textarea.is-invalid {
        border-color: #D14343;
    }

    .produk-error {
        margin-top: 5px;
        color: #D14343;
        font-size: .75rem;
    }

    .produk-help {
        display: block;
        margin-top: 6px;
        color: #8A94A3;
        font-size: .73rem;
    }

    .produk-current-image {
        margin-bottom: 18px;
    }

    .produk-current-label {
        margin-bottom: 9px;
        color: #5D6878;
        font-size: .75rem;
        font-weight: 700;
    }

    .produk-current-image img {
        display: block;
        width: 100%;
        height: 190px;
        object-fit: cover;
        border-radius: 11px;
        border: 1px solid #E1E8F1;
        background: #F5F8FD;
    }

    .produk-no-image {
        height: 190px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px dashed #C9D7E8;
        border-radius: 11px;
        background: #F8FAFD;
        color: #929BA8;
        font-size: .8rem;
    }

    .produk-upload-box {
        position: relative;
        padding: 22px 18px;
        border: 1.5px dashed #C9D7E8;
        border-radius: 13px;
        background: #F8FAFD;
        text-align: center;
        transition: .2s ease;
    }

    .produk-upload-box:hover {
        border-color: #8FAED2;
        background: #F5F9FF;
    }

    .produk-upload-icon {
        width: 48px;
        height: 48px;
        margin: 0 auto 11px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 13px;
        background: #EEF4FF;
        color: var(--admin-primary);
        font-size: 1.2rem;
    }

    .produk-upload-title {
        margin-bottom: 4px;
        color: #27364A;
        font-size: .83rem;
        font-weight: 750;
    }

    .produk-upload-subtitle {
        margin-bottom: 14px;
        color: #8A94A3;
        font-size: .72rem;
    }

    .produk-file {
        width: 100%;
        font-size: .75rem;
        color: #667085;
    }

    .produk-preview {
        display: none;
        margin-top: 18px;
        padding-top: 18px;
        border-top: 1px solid #E5EBF3;
    }

    .produk-preview-label {
        margin-bottom: 9px;
        color: #5D6878;
        font-size: .75rem;
        font-weight: 700;
        text-align: left;
    }

    .produk-preview-image {
        width: 100%;
        height: 190px;
        object-fit: cover;
        border-radius: 11px;
        border: 1px solid #E1E8F1;
        background: #F5F8FD;
    }

    .produk-info-box {
        margin-top: 14px;
        padding: 12px 13px;
        border: 1px solid #DCE8F8;
        border-radius: 10px;
        background: #F4F8FE;
        color: #657286;
        font-size: .72rem;
        line-height: 1.55;
    }

    .produk-info-box i {
        color: var(--admin-primary);
    }

    .produk-tips {
        margin-top: 20px;
        padding: 17px 18px;
        border: 1px solid #E3EAF3;
        border-radius: 14px;
        background: #F8FAFD;
    }

    .produk-tips-title {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 8px;
        color: var(--admin-navy);
        font-size: .82rem;
        font-weight: 800;
    }

    .produk-tips-title i {
        color: #D28A2E;
    }

    .produk-tips ul {
        margin: 0;
        padding-left: 18px;
        color: #737783;
        font-size: .75rem;
        line-height: 1.65;
    }

    .produk-action-bar {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 10px;
        margin-top: 22px;
        padding-top: 20px;
        border-top: 1px solid #E3EAF3;
    }

    .produk-btn-cancel,
    .produk-btn-save {
        height: 40px;
        padding: 0 17px;
        border-radius: 9px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        font-size: .82rem;
        font-weight: 750;
        text-decoration: none;
        transition: .2s ease;
        cursor: pointer;
    }

    .produk-btn-cancel {
        border: 1px solid #DCE5F2;
        background: #fff;
        color: #596575;
    }

    .produk-btn-cancel:hover {
        background: #F8FAFD;
        color: #27364A;
    }

    .produk-btn-save {
        border: 0;
        background: var(--admin-primary);
        color: #fff;
        box-shadow: 0 4px 10px rgba(0, 52, 111, .16);
    }

    .produk-btn-save:hover {
        background: #002A59;
        color: #fff;
        transform: translateY(-1px);
    }

    @media (max-width: 900px) {
        .produk-form-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 600px) {
        .produk-form-heading {
            flex-direction: column;
        }

        .produk-back-btn {
            width: 100%;
            justify-content: center;
        }

        .produk-form-card-body {
            padding: 18px;
        }

        .produk-form-card-header {
            padding: 18px;
        }

        .produk-action-bar {
            flex-direction: column-reverse;
        }

        .produk-btn-cancel,
        .produk-btn-save {
            width: 100%;
        }
    }
</style>

<div class="produk-form-page">

    <div class="produk-form-heading">
        <div>
            <h1>Edit Produk</h1>
            <p>Perbarui informasi produk atau karya siswa.</p>
        </div>

        <a href="{{ route('admin.produk.index') }}" class="produk-back-btn">
            <i class="bi bi-arrow-left"></i>
            Kembali
        </a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger mb-4" style="border-radius: 12px;">
            <div class="fw-semibold mb-2">
                <i class="bi bi-exclamation-circle me-1"></i>
                Ada data yang perlu diperbaiki
            </div>

            <ul class="mb-0 ps-3 small">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form
        action="{{ route('admin.produk.update', $produk) }}"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf
        @method('PUT')

        <div class="produk-form-grid">

            {{-- INFORMASI PRODUK --}}
            <div class="produk-form-card">

                <div class="produk-form-card-header">
                    <div class="produk-form-card-header-inner">
                        <div class="produk-form-icon">
                            <i class="bi bi-box-seam"></i>
                        </div>

                        <div>
                            <h2>Informasi Produk</h2>
                            <p>Perbarui informasi utama produk atau karya siswa.</p>
                        </div>
                    </div>
                </div>

                <div class="produk-form-card-body">

                    <div class="produk-field">
                        <label for="nama" class="produk-label">
                            Nama Produk
                            <span class="produk-required">*</span>
                        </label>

                        <input
                            type="text"
                            id="nama"
                            name="nama"
                            class="produk-input @error('nama') is-invalid @enderror"
                            value="{{ old('nama', $produk->nama) }}"
                            required
                        >

                        @error('nama')
                            <div class="produk-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="produk-field">
                        <label for="kategori" class="produk-label">
                            Kategori
                            <span class="produk-required">*</span>
                        </label>

                        <select
                            id="kategori"
                            name="kategori"
                            class="produk-select @error('kategori') is-invalid @enderror"
                            required
                        >
                            <option value="">Pilih kategori</option>

                            <option value="PPLG"
                                {{ old('kategori', $produk->kategori) === 'PPLG' ? 'selected' : '' }}>
                                PPLG
                            </option>

                            <option value="TJKT"
                                {{ old('kategori', $produk->kategori) === 'TJKT' ? 'selected' : '' }}>
                                TJKT
                            </option>

                            <option value="TPFL"
                                {{ old('kategori', $produk->kategori) === 'TPFL' ? 'selected' : '' }}>
                                TPFL
                            </option>

                            <option value="TKRO"
                                {{ old('kategori', $produk->kategori) === 'TKRO' ? 'selected' : '' }}>
                                TKRO
                            </option>
                        </select>

                        @error('kategori')
                            <div class="produk-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="produk-field">
                        <label for="deskripsi" class="produk-label">
                            Deskripsi
                        </label>

                        <textarea
                            id="deskripsi"
                            name="deskripsi"
                            class="produk-textarea @error('deskripsi') is-invalid @enderror"
                        >{{ old('deskripsi', $produk->deskripsi) }}</textarea>

                        @error('deskripsi')
                            <div class="produk-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row g-3">

                        <div class="col-md-6">
                            <div class="produk-field">
                                <label for="status" class="produk-label">
                                    Status
                                </label>

                                <select
                                    id="status"
                                    name="status"
                                    class="produk-select @error('status') is-invalid @enderror"
                                >
                                    <option value="">Pilih status</option>

                                    <option value="Tersedia"
                                        {{ old('status', $produk->status) === 'Tersedia' ? 'selected' : '' }}>
                                        Tersedia
                                    </option>

                                    <option value="Selesai"
                                        {{ old('status', $produk->status) === 'Selesai' ? 'selected' : '' }}>
                                        Selesai
                                    </option>

                                    <option value="Dalam Pengembangan"
                                        {{ old('status', $produk->status) === 'Dalam Pengembangan' ? 'selected' : '' }}>
                                        Dalam Pengembangan
                                    </option>
                                </select>

                                @error('status')
                                    <div class="produk-error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="produk-field">
                                <label for="harga" class="produk-label">
                                    Harga
                                </label>

                                <input
                                    type="text"
                                    id="harga"
                                    name="harga"
                                    class="produk-input @error('harga') is-invalid @enderror"
                                    value="{{ old('harga', $produk->harga) }}"
                                    placeholder="Contoh: Rp 900.000"
                                >

                                @error('harga')
                                    <div class="produk-error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>

                </div>
            </div>

            {{-- FOTO --}}
            <div>

                <div class="produk-form-card">

                    <div class="produk-form-card-header">
                        <div class="produk-form-card-header-inner">
                            <div class="produk-form-icon">
                                <i class="bi bi-image"></i>
                            </div>

                            <div>
                                <h2>Foto Produk</h2>
                                <p>Kelola foto produk atau karya siswa.</p>
                            </div>
                        </div>
                    </div>

                    <div class="produk-form-card-body">

                        <div class="produk-current-image">

                            <div class="produk-current-label">
                                Foto Saat Ini
                            </div>

                            @if ($produk->gambar)
                                @php
                                    $produkImagePath = public_path('images/produk/' . $produk->gambar);
                                    $oldImagePath = public_path('images/' . $produk->gambar);

                                    if (file_exists($produkImagePath)) {
                                        $produkImageUrl = asset('images/produk/' . $produk->gambar);
                                    } elseif (file_exists($oldImagePath)) {
                                        $produkImageUrl = asset('images/' . $produk->gambar);
                                    } else {
                                        $produkImageUrl = null;
                                    }
                                @endphp

                                @if ($produkImageUrl)
                                    <img
                                        src="{{ $produkImageUrl }}"
                                        alt="{{ $produk->nama }}"
                                    >
                                @else
                                    <div class="produk-no-image">
                                        Foto tidak ditemukan.
                                    </div>
                                @endif

                            @else
                                <div class="produk-no-image">
                                    <div>
                                        <i class="bi bi-image me-1"></i>
                                        Belum ada foto.
                                    </div>
                                </div>
                            @endif

                        </div>

                        <div class="produk-upload-box">

                            <div class="produk-upload-icon">
                                <i class="bi bi-cloud-arrow-up"></i>
                            </div>

                            <div class="produk-upload-title">
                                Ganti Foto
                            </div>

                            <div class="produk-upload-subtitle">
                                Kosongkan jika tidak ingin mengganti foto
                            </div>

                            <input
                                type="file"
                                name="gambar"
                                id="gambar"
                                class="produk-file @error('gambar') is-invalid @enderror"
                                accept="image/jpeg,image/png,image/webp"
                            >

                            @error('gambar')
                                <div class="produk-error text-start">{{ $message }}</div>
                            @enderror

                            <div id="produkPreview" class="produk-preview">

                                <div class="produk-preview-label">
                                    Preview Foto Baru
                                </div>

                                <img
                                    id="produkPreviewImage"
                                    class="produk-preview-image"
                                    src=""
                                    alt="Preview foto baru"
                                >

                            </div>

                        </div>

                        <small class="produk-help">
                            Format JPG, JPEG, PNG, atau WEBP. Maksimal 10 MB.
                        </small>

                        <div class="produk-info-box">
                            <i class="bi bi-info-circle me-1"></i>
                            Foto lama akan tetap digunakan apabila kamu tidak mengunggah foto baru.
                        </div>

                    </div>

                </div>

                <div class="produk-tips">
                    <div class="produk-tips-title">
                        <i class="bi bi-lightbulb-fill"></i>
                        Tips Foto Produk
                    </div>

                    <ul>
                        <li>Gunakan foto yang jelas dan tidak buram.</li>
                        <li>Pilih gambar dengan pencahayaan yang cukup.</li>
                        <li>Gunakan foto yang sesuai dengan produk.</li>
                    </ul>
                </div>

            </div>

        </div>

        {{-- ACTION --}}
        <div class="produk-action-bar">

            <a
                href="{{ route('admin.produk.index') }}"
                class="produk-btn-cancel"
            >
                Batal
            </a>

            <button type="submit" class="produk-btn-save">
                <i class="bi bi-check-lg"></i>
                Simpan Perubahan
            </button>

        </div>

    </form>

</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {

        const input = document.getElementById('gambar');
        const preview = document.getElementById('produkPreview');
        const previewImage = document.getElementById('produkPreviewImage');

        if (!input) return;

        input.addEventListener('change', function () {

            const file = this.files[0];

            if (!file) {
                preview.style.display = 'none';
                previewImage.src = '';
                return;
            }

            if (!file.type.startsWith('image/')) {
                preview.style.display = 'none';
                previewImage.src = '';
                return;
            }

            const reader = new FileReader();

            reader.onload = function (event) {
                previewImage.src = event.target.result;
                preview.style.display = 'block';
            };

            reader.readAsDataURL(file);
        });

    });
</script>
@endpush

@endsection