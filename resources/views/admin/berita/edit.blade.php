@extends('layouts.admin')

@section('title', 'Edit Berita - Admin')
@section('page-title', 'Edit Berita')

@section('content')

<style>
    .admin-form-page {
        max-width: 1180px;
        margin: 0 auto;
    }

    .admin-form-heading {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 24px;
    }

    .admin-form-heading h1 {
        margin: 0 0 6px;
        color: var(--admin-navy);
        font-size: 1.65rem;
        font-weight: 800;
        letter-spacing: -0.02em;
    }

    .admin-form-heading p {
        margin: 0;
        color: var(--admin-muted);
        font-size: .9rem;
    }

    .admin-form-back {
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

    .admin-form-back:hover {
        border-color: #C5D4E8;
        background: #F8FAFD;
        color: var(--admin-primary);
        transform: translateY(-1px);
    }

    .admin-form-grid {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 350px;
        gap: 20px;
        align-items: start;
    }

    .admin-form-card {
        background: #fff;
        border: 1px solid #E3EAF3;
        border-radius: 18px;
        box-shadow: 0 6px 20px rgba(18, 38, 63, .05);
        overflow: hidden;
    }

    .admin-form-card-header {
        padding: 20px 24px;
        border-bottom: 1px solid #E8EEF5;
    }

    .admin-form-card-header-inner {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .admin-form-icon {
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

    .admin-form-card-header h2 {
        margin: 0;
        color: var(--admin-navy);
        font-size: 1.05rem;
        font-weight: 800;
    }

    .admin-form-card-header p {
        margin: 3px 0 0;
        color: var(--admin-muted);
        font-size: .78rem;
    }

    .admin-form-card-body {
        padding: 24px;
    }

    .admin-form-field {
        margin-bottom: 20px;
    }

    .admin-form-label {
        display: block;
        margin-bottom: 7px;
        color: #27364A;
        font-size: .82rem;
        font-weight: 750;
    }

    .admin-form-required {
        color: #D14343;
    }

    .admin-form-input,
    .admin-form-select,
    .admin-form-textarea {
        width: 100%;
        border: 1px solid #DCE5F2;
        border-radius: 9px;
        background: #fff;
        color: #27364A;
        font-size: .86rem;
        outline: none;
        transition: .2s ease;
    }

    .admin-form-input,
    .admin-form-select {
        height: 42px;
        padding: 0 12px;
    }

    .admin-form-textarea {
        min-height: 125px;
        padding: 11px 12px;
        resize: vertical;
        line-height: 1.55;
    }

    .admin-form-textarea-content {
        min-height: 230px;
    }

    .admin-form-input:focus,
    .admin-form-select:focus,
    .admin-form-textarea:focus {
        border-color: #7AA5D8;
        box-shadow: 0 0 0 3px rgba(0, 74, 153, .08);
    }

    .admin-form-input.is-invalid,
    .admin-form-select.is-invalid,
    .admin-form-textarea.is-invalid {
        border-color: #D14343;
    }

    .admin-form-error {
        margin-top: 5px;
        color: #D14343;
        font-size: .75rem;
    }

    .admin-form-help {
        display: block;
        margin-top: 6px;
        color: #8A94A3;
        font-size: .73rem;
    }

    .admin-current-label {
        margin-bottom: 9px;
        color: #5D6878;
        font-size: .75rem;
        font-weight: 700;
    }

    .admin-current-image {
        width: 100%;
        height: 190px;
        object-fit: cover;
        border-radius: 11px;
        border: 1px solid #E1E8F1;
        background: #F5F8FD;
        display: block;
        margin-bottom: 18px;
    }

    .admin-no-image {
        height: 190px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px dashed #C9D7E8;
        border-radius: 11px;
        background: #F8FAFD;
        color: #929BA8;
        font-size: .8rem;
        margin-bottom: 18px;
    }

    .admin-upload-box {
        padding: 22px 18px;
        border: 1.5px dashed #C9D7E8;
        border-radius: 13px;
        background: #F8FAFD;
        text-align: center;
        transition: .2s ease;
    }

    .admin-upload-box:hover {
        border-color: #8FAED2;
        background: #F5F9FF;
    }

    .admin-upload-icon {
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

    .admin-upload-title {
        margin-bottom: 4px;
        color: #27364A;
        font-size: .83rem;
        font-weight: 750;
    }

    .admin-upload-subtitle {
        margin-bottom: 14px;
        color: #8A94A3;
        font-size: .72rem;
    }

    .admin-file {
        width: 100%;
        font-size: .75rem;
        color: #667085;
    }

    .admin-preview {
        display: none;
        margin-top: 18px;
        padding-top: 18px;
        border-top: 1px solid #E5EBF3;
    }

    .admin-preview-label {
        margin-bottom: 9px;
        color: #5D6878;
        font-size: .75rem;
        font-weight: 700;
        text-align: left;
    }

    .admin-preview-image {
        width: 100%;
        height: 190px;
        object-fit: cover;
        border-radius: 11px;
        border: 1px solid #E1E8F1;
    }

    .admin-info-box {
        margin-top: 14px;
        padding: 12px 13px;
        border: 1px solid #DCE8F8;
        border-radius: 10px;
        background: #F4F8FE;
        color: #657286;
        font-size: .72rem;
        line-height: 1.55;
    }

    .admin-info-box i {
        color: var(--admin-primary);
    }

    .admin-tips {
        margin-top: 20px;
        padding: 17px 18px;
        border: 1px solid #E3EAF3;
        border-radius: 14px;
        background: #F8FAFD;
    }

    .admin-tips-title {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 8px;
        color: var(--admin-navy);
        font-size: .82rem;
        font-weight: 800;
    }

    .admin-tips-title i {
        color: #D28A2E;
    }

    .admin-tips ul {
        margin: 0;
        padding-left: 18px;
        color: #737783;
        font-size: .75rem;
        line-height: 1.65;
    }

    .admin-form-action {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 10px;
        margin-top: 22px;
        padding-top: 20px;
        border-top: 1px solid #E3EAF3;
    }

    .admin-btn-cancel,
    .admin-btn-save {
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

    .admin-btn-cancel {
        border: 1px solid #DCE5F2;
        background: #fff;
        color: #596575;
    }

    .admin-btn-cancel:hover {
        background: #F8FAFD;
        color: #27364A;
    }

    .admin-btn-save {
        border: 0;
        background: var(--admin-primary);
        color: #fff;
        box-shadow: 0 4px 10px rgba(0, 52, 111, .16);
    }

    .admin-btn-save:hover {
        background: #002A59;
        color: #fff;
        transform: translateY(-1px);
    }

    @media (max-width: 900px) {
        .admin-form-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 600px) {
        .admin-form-heading {
            flex-direction: column;
        }

        .admin-form-back {
            width: 100%;
            justify-content: center;
        }

        .admin-form-card-body {
            padding: 18px;
        }

        .admin-form-card-header {
            padding: 18px;
        }

        .admin-form-action {
            flex-direction: column-reverse;
        }

        .admin-btn-cancel,
        .admin-btn-save {
            width: 100%;
        }
    }
</style>

<div class="admin-form-page">

    <div class="admin-form-heading">

        <div>
            <h1>Edit Berita</h1>
            <p>Perbarui informasi berita yang sudah ada.</p>
        </div>

        <a href="{{ route('admin.berita.index') }}" class="admin-form-back">
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
        action="{{ route('admin.berita.update', $berita) }}"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf
        @method('PUT')

        <div class="admin-form-grid">

            <div class="admin-form-card">

                <div class="admin-form-card-header">

                    <div class="admin-form-card-header-inner">

                        <div class="admin-form-icon">
                            <i class="bi bi-newspaper"></i>
                        </div>

                        <div>
                            <h2>Informasi Berita</h2>
                            <p>Perbarui informasi dan isi berita.</p>
                        </div>

                    </div>

                </div>

                <div class="admin-form-card-body">

                    <div class="admin-form-field">

                        <label for="title" class="admin-form-label">
                            Judul Berita
                            <span class="admin-form-required">*</span>
                        </label>

                        <input
                            type="text"
                            name="title"
                            id="title"
                            class="admin-form-input @error('title') is-invalid @enderror"
                            value="{{ old('title', $berita->title) }}"
                            required
                        >

                        @error('title')
                            <div class="admin-form-error">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="row g-3">

                        <div class="col-md-6">

                            <div class="admin-form-field">

                                <label for="category" class="admin-form-label">
                                    Kategori
                                    <span class="admin-form-required">*</span>
                                </label>

                                <select
                                    name="category"
                                    id="category"
                                    class="admin-form-select @error('category') is-invalid @enderror"
                                    required
                                >
                                    <option value="Prestasi"
                                        {{ old('category', $berita->category) === 'Prestasi' ? 'selected' : '' }}>
                                        Prestasi
                                    </option>

                                    <option value="Kegiatan"
                                        {{ old('category', $berita->category) === 'Kegiatan' ? 'selected' : '' }}>
                                        Kegiatan
                                    </option>

                                    <option value="Pengumuman"
                                        {{ old('category', $berita->category) === 'Pengumuman' ? 'selected' : '' }}>
                                        Pengumuman
                                    </option>
                                </select>

                                @error('category')
                                    <div class="admin-form-error">{{ $message }}</div>
                                @enderror

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="admin-form-field">

                                <label for="tanggal" class="admin-form-label">
                                    Tanggal
                                    <span class="admin-form-required">*</span>
                                </label>

                                <input
                                    type="date"
                                    name="tanggal"
                                    id="tanggal"
                                    class="admin-form-input @error('tanggal') is-invalid @enderror"
                                    value="{{ old('tanggal', \Carbon\Carbon::parse($berita->tanggal)->format('Y-m-d')) }}"
                                    required
                                >

                                @error('tanggal')
                                    <div class="admin-form-error">{{ $message }}</div>
                                @enderror

                            </div>

                        </div>

                    </div>

                    <div class="admin-form-field">

                        <label for="excerpt" class="admin-form-label">
                            Ringkasan
                            <span class="admin-form-required">*</span>
                        </label>

                        <textarea
                            name="excerpt"
                            id="excerpt"
                            class="admin-form-textarea @error('excerpt') is-invalid @enderror"
                            required
                        >{{ old('excerpt', $berita->excerpt) }}</textarea>

                        @error('excerpt')
                            <div class="admin-form-error">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="admin-form-field">

                        <label for="content" class="admin-form-label">
                            Isi Berita
                            <span class="admin-form-required">*</span>
                        </label>

                        <textarea
                            name="content"
                            id="content"
                            class="admin-form-textarea admin-form-textarea-content @error('content') is-invalid @enderror"
                            required
                        >{{ old('content', $berita->content) }}</textarea>

                        @error('content')
                            <div class="admin-form-error">{{ $message }}</div>
                        @enderror

                    </div>

                </div>

            </div>

            <div>

                <div class="admin-form-card">

                    <div class="admin-form-card-header">

                        <div class="admin-form-card-header-inner">

                            <div class="admin-form-icon">
                                <i class="bi bi-image"></i>
                            </div>

                            <div>
                                <h2>Gambar Berita</h2>
                                <p>Kelola gambar utama berita.</p>
                            </div>

                        </div>

                    </div>

                    <div class="admin-form-card-body">

                        <div class="mb-4">

                            <div class="admin-current-label">
                                Gambar Saat Ini
                            </div>

                            @if ($berita->image)

                                <img
                                    src="{{ asset('images/berita/' . $berita->image) }}"
                                    alt="{{ $berita->title }}"
                                    class="admin-current-image"
                                >

                            @else

                                <div class="admin-no-image">
                                    <i class="bi bi-image me-1"></i>
                                    Belum ada gambar.
                                </div>

                            @endif

                        </div>

                        <div class="admin-upload-box">

                            <div class="admin-upload-icon">
                                <i class="bi bi-cloud-arrow-up"></i>
                            </div>

                            <div class="admin-upload-title">
                                Ganti Gambar
                            </div>

                            <div class="admin-upload-subtitle">
                                Kosongkan jika tidak ingin mengganti gambar
                            </div>

                            <input
                                type="file"
                                name="image"
                                id="image"
                                class="admin-file @error('image') is-invalid @enderror"
                                accept="image/jpeg,image/png,image/webp"
                            >

                            @error('image')
                                <div class="admin-form-error text-start">
                                    {{ $message }}
                                </div>
                            @enderror

                            <div id="beritaPreview" class="admin-preview">

                                <div class="admin-preview-label">
                                    Preview Gambar Baru
                                </div>

                                <img
                                    id="beritaPreviewImage"
                                    class="admin-preview-image"
                                    src=""
                                    alt="Preview gambar baru"
                                >

                            </div>

                        </div>

                        <small class="admin-form-help">
                            Kosongkan jika tidak ingin mengganti gambar.
                        </small>

                        <div class="admin-info-box">
                            <i class="bi bi-info-circle me-1"></i>
                            Gambar lama akan tetap digunakan apabila tidak ada gambar baru.
                        </div>

                    </div>

                </div>

                <div class="admin-tips">

                    <div class="admin-tips-title">
                        <i class="bi bi-lightbulb-fill"></i>
                        Tips Menulis Berita
                    </div>

                    <ul>
                        <li>Gunakan judul yang singkat dan jelas.</li>
                        <li>Pastikan informasi yang ditulis sesuai kegiatan.</li>
                        <li>Gunakan gambar yang relevan dengan berita.</li>
                    </ul>

                </div>

            </div>

        </div>

        <div class="admin-form-action">

            <a
                href="{{ route('admin.berita.index') }}"
                class="admin-btn-cancel"
            >
                Batal
            </a>

            <button type="submit" class="admin-btn-save">
                <i class="bi bi-check-lg"></i>
                Simpan Perubahan
            </button>

        </div>

    </form>

</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {

        const input = document.getElementById('image');
        const preview = document.getElementById('beritaPreview');
        const previewImage = document.getElementById('beritaPreviewImage');

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