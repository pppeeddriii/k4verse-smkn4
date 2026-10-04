<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use App\Models\ActivityLog;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index(Request $request)
    {
        $search = trim($request->input('search', ''));
        $kategori = $request->input('kategori', '');

        $query = Galeri::query();

        if ($search !== '') {
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', '%' . $search . '%')
                    ->orWhere('gambar', 'like', '%' . $search . '%');
            });
        }

        if (
            $kategori !== '' &&
            in_array($kategori, ['kegiatan', 'prestasi'], true)
        ) {
            $query->where('kategori', $kategori);
        }

        $galeris = $query
            ->orderBy('created_at', 'desc')
            ->paginate(10)
            ->withQueryString();

        $totalFoto = Galeri::count();

        $kategoriAktif = Galeri::query()
            ->whereIn('kategori', ['kegiatan', 'prestasi'])
            ->distinct('kategori')
            ->count('kategori');

        $fotoBulanIni = Galeri::query()
            ->whereYear('created_at', now()->year)
            ->whereMonth('created_at', now()->month)
            ->count();

        return view('admin.galeri.index', compact(
            'galeris',
            'search',
            'kategori',
            'totalFoto',
            'kategoriAktif',
            'fotoBulanIni'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | REALTIME SEARCH
    |--------------------------------------------------------------------------
    */

    public function search(Request $request)
{
    $search = trim($request->input('search', ''));
    $kategori = $request->input('kategori', '');

    $query = Galeri::query();

    if ($search !== '') {
        $query->where(function ($q) use ($search) {
            $q->where('judul', 'like', '%' . $search . '%')
                ->orWhere('gambar', 'like', '%' . $search . '%');
        });
    }

    if (
        $kategori !== '' &&
        in_array($kategori, ['kegiatan', 'prestasi'], true)
    ) {
        $query->where('kategori', $kategori);
    }

    $galeris = $query
        ->orderBy('created_at', 'desc')
        ->get();

    return response()->json([
        'galeris' => $galeris->map(function ($galeri) {

            $pathGaleri = public_path(
                'images/galeri/' . $galeri->gambar
            );

            $pathImages = public_path(
                'images/' . $galeri->gambar
            );

            $imageExists =
                file_exists($pathGaleri) ||
                file_exists($pathImages);

            $imageUrl = '';

            if (file_exists($pathGaleri)) {

                $imageUrl = asset(
                    'images/galeri/' . $galeri->gambar
                );

            } elseif (file_exists($pathImages)) {

                $imageUrl = asset(
                    'images/' . $galeri->gambar
                );
            }

            return [
                'id' => $galeri->id,
                'judul' => $galeri->judul,
                'gambar' => $galeri->gambar,
                'kategori' => $galeri->kategori,
                'created_at' => $galeri->created_at
                    ->translatedFormat('d F Y'),
                'image_exists' => $imageExists,
                'image_url' => $imageUrl,
                'edit_url' => route(
                    'admin.galeri.edit',
                    $galeri
                ),
            ];

        })->values(),
    ]);
}
    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|in:kegiatan,prestasi',
            'gambar' => 'required|image|mimes:jpg,jpeg,png,webp|max:10240',
        ]);

        $file = $request->file('gambar');

        $filename = time() . '_' . $file->getClientOriginalName();

        $file->move(
            public_path('images/galeri'),
            $filename
        );

        $validated['gambar'] = $filename;

        Galeri::create($validated);

        ActivityLog::create([
    'action' => 'galeri_tambah',
    'description' => 'Administrator menambahkan foto galeri',
]);

        return redirect()
            ->route('admin.galeri.index')
            ->with('success', 'Foto galeri berhasil ditambahkan.');
    }

    public function edit(Galeri $galeri)
    {
        return view(
            'admin.galeri.edit',
            compact('galeri')
        );
    }

    public function update(
        Request $request,
        Galeri $galeri
    ) {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|in:kegiatan,prestasi',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');

            $filename =
                time() . '_' . $file->getClientOriginalName();

            $file->move(
                public_path('images/galeri'),
                $filename
            );

            $validated['gambar'] = $filename;
        }

        $galeri->update($validated);

        ActivityLog::create([
    'action' => 'galeri_edit',
    'description' => 'Administrator memperbarui foto galeri',
]);

        return redirect()
            ->route('admin.galeri.index')
            ->with('success', 'Foto galeri berhasil diperbarui.');
    }

    public function destroy(Galeri $galeri)
    {
        $galeri->delete();

        ActivityLog::create([
    'action' => 'galeri_hapus',
    'description' => 'Administrator menghapus foto galeri',
]);


        return redirect()
            ->route('admin.galeri.index')
            ->with('success', 'Foto galeri berhasil dihapus.');
    }

    public function bulkDestroy(Request $request)
    {
        $ids = $request->input('selected', []);

        if (empty($ids)) {
            return redirect()
                ->route('admin.galeri.index')
                ->with(
                    'error',
                    'Pilih minimal satu foto untuk dihapus.'
                );
        }

        Galeri::whereIn('id', $ids)->delete();

        ActivityLog::create([
    'action' => 'galeri_bulk_hapus',
    'description' => count($ids) . ' foto galeri dihapus oleh administrator',
]);


        return redirect()
            ->route('admin.galeri.index')
            ->with(
                'success',
                count($ids) . ' foto galeri berhasil dihapus.'
            );
    }
}