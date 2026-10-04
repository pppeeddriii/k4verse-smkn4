<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\ActivityLog;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * ================================
     * INDEX
     * ================================
     */
    public function index(Request $request)
    {
        $search = trim($request->get('search', ''));
        $kategori = $request->get('kategori', '');

        $query = Produk::query();

        if ($search !== '') {
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', '%' . $search . '%')
                    ->orWhere('kategori', 'like', '%' . $search . '%')
                    ->orWhere('deskripsi', 'like', '%' . $search . '%')
                    ->orWhere('status', 'like', '%' . $search . '%')
                    ->orWhere('harga', 'like', '%' . $search . '%');
            });
        }

        if ($kategori !== '') {
            $query->where('kategori', $kategori);
        }

        $produk = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $totalProduk = Produk::count();

        $kategoriAktif = Produk::query()
            ->whereIn('kategori', [
            'PPLG',
            'TJKT',
            'TPFL',
            'TKRO',
        ])
        ->distinct()
        ->count('kategori');

        $produkBulanIni = Produk::whereMonth(
            'created_at',
            now()->month
        )
            ->whereYear(
                'created_at',
                now()->year
            )
            ->count();

        return view('admin.produk.index', compact(
            'produk',
            'search',
            'kategori',
            'totalProduk',
            'kategoriAktif',
            'produkBulanIni'
        ));
    }


    /**
     * ================================
     * CREATE
     * ================================
     */
    public function create()
    {
        return view('admin.produk.create');
    }


    /**
     * ================================
     * STORE
     * ================================
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|in:PPLG,TJKT,TPFL,TKRO',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
            'status' => 'nullable|string|max:255',
            'harga' => 'nullable|string|max:255',
        ]);

        $data = $request->only([
            'nama',
            'kategori',
            'deskripsi',
            'status',
            'harga',
        ]);

        /*
        |--------------------------------------------------------------------------
        | UPLOAD GAMBAR
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('gambar')) {

            $folder = public_path('images/produk');

            // Buat folder otomatis kalau belum ada
            if (!is_dir($folder)) {
                mkdir($folder, 0755, true);
            }

            $file = $request->file('gambar');

            $filename = time() . '_' . $file->hashName();

            $file->move($folder, $filename);

            $data['gambar'] = $filename;
        }

        Produk::create($data);

        ActivityLog::create([
    'action' => 'produk_tambah',
    'description' => 'Administrator menambahkan produk/karya baru',
]);

        return redirect()
            ->route('admin.produk.index')
            ->with(
                'success',
                'Produk berhasil ditambahkan.'
            );
    }


    /**
     * ================================
     * EDIT
     * ================================
     */
    public function edit(Produk $produk)
    {
        return view(
            'admin.produk.edit',
            compact('produk')
        );
    }


    /**
     * ================================
     * UPDATE
     * ================================
     */
    public function update(
        Request $request,
        Produk $produk
    ) {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|in:PPLG,TJKT,TPFL,TKRO',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
            'status' => 'nullable|string|max:255',
            'harga' => 'nullable|string|max:255',
        ]);

        $data = $request->only([
            'nama',
            'kategori',
            'deskripsi',
            'status',
            'harga',
        ]);

        /*
        |--------------------------------------------------------------------------
        | GANTI GAMBAR
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('gambar')) {

            // Hapus gambar lama dari images/produk
            $oldImageProduk = public_path(
                'images/produk/' . $produk->gambar
            );

            // Hapus gambar lama dari images
            $oldImage = public_path(
                'images/' . $produk->gambar
            );

            if ($produk->gambar) {

                if (file_exists($oldImageProduk)) {
                    unlink($oldImageProduk);
                }

                if (file_exists($oldImage)) {
                    unlink($oldImage);
                }
            }

            // Folder upload baru
            $folder = public_path('images/produk');

            if (!is_dir($folder)) {
                mkdir($folder, 0755, true);
            }

            $file = $request->file('gambar');

            $filename = time() . '_' . $file->hashName();

            $file->move($folder, $filename);

            $data['gambar'] = $filename;
        }

        $produk->update($data);

        ActivityLog::create([
    'action' => 'produk_edit',
    'description' => 'Administrator memperbarui produk/karya',
]);

        return redirect()
            ->route('admin.produk.index')
            ->with(
                'success',
                'Produk berhasil diperbarui.'
            );
    }


    /**
     * ================================
     * DELETE SATU
     * ================================
     */
    public function destroy(Produk $produk)
    {
        if ($produk->gambar) {

            $imageProduk = public_path(
                'images/produk/' . $produk->gambar
            );

            $image = public_path(
                'images/' . $produk->gambar
            );

            if (file_exists($imageProduk)) {
                unlink($imageProduk);
            }

            if (file_exists($image)) {
                unlink($image);
            }
        }

        $produk->delete();

        ActivityLog::create([
    'action' => 'produk_hapus',
    'description' => 'Administrator menghapus produk/karya',
]);

        return redirect()
            ->route('admin.produk.index')
            ->with(
                'success',
                'Produk berhasil dihapus.'
            );
    }


    /**
     * ================================
     * BULK DELETE
     * ================================
     */
    public function bulkDestroy(Request $request)
    {
        $request->validate([
            'selected' => 'required|array',
            'selected.*' => 'integer|exists:produks,id',
        ]);

        $produks = Produk::whereIn(
            'id',
            $request->selected
        )->get();

        foreach ($produks as $produk) {

            if ($produk->gambar) {

                $imageProduk = public_path(
                    'images/produk/' . $produk->gambar
                );

                $image = public_path(
                    'images/' . $produk->gambar
                );

                if (file_exists($imageProduk)) {
                    unlink($imageProduk);
                }

                if (file_exists($image)) {
                    unlink($image);
                }
            }

            $produk->delete();
        }

        ActivityLog::create([
    'action' => 'produk_bulk_hapus',
    'description' => count($request->selected) . ' produk/karya dihapus oleh administrator',
]);

        return redirect()
            ->route('admin.produk.index')
            ->with(
                'success',
                count($request->selected) .
                ' produk berhasil dihapus.'
            );
    }


    /**
     * ================================
     * AJAX SEARCH
     * ================================
     */
    public function search(Request $request)
    {
        $search = trim(
            $request->get('search', '')
        );

        $kategori = $request->get(
            'kategori',
            ''
        );

        $query = Produk::query();

        if ($search !== '') {

            $query->where(function ($q) use ($search) {

                $q->where(
                    'nama',
                    'like',
                    '%' . $search . '%'
                )
                ->orWhere(
                    'kategori',
                    'like',
                    '%' . $search . '%'
                )
                ->orWhere(
                    'deskripsi',
                    'like',
                    '%' . $search . '%'
                )
                ->orWhere(
                    'status',
                    'like',
                    '%' . $search . '%'
                )
                ->orWhere(
                    'harga',
                    'like',
                    '%' . $search . '%'
                );

            });
        }

        if ($kategori !== '') {
            $query->where(
                'kategori',
                $kategori
            );
        }

        $produk = $query
            ->latest()
            ->get();

        return response()->json([
            'produks' => $produk->map(function ($item) {

                /*
                |--------------------------------------------------------------------------
                | CEK LOKASI GAMBAR
                |--------------------------------------------------------------------------
                */

                $imageUrl = '';

                if ($item->gambar) {

                    if (
                        file_exists(
                            public_path(
                                'images/produk/' . $item->gambar
                            )
                        )
                    ) {
                        $imageUrl = asset(
                            'images/produk/' . $item->gambar
                        );
                    } elseif (
                        file_exists(
                            public_path(
                                'images/' . $item->gambar
                            )
                        )
                    ) {
                        $imageUrl = asset(
                            'images/' . $item->gambar
                        );
                    }
                }

                return [
                    'id' => $item->id,

                    'nama' => $item->nama,

                    'kategori' => $item->kategori,

                    'deskripsi' => $item->deskripsi,

                    'status' => $item->status,

                    'harga' => $item->harga,

                    'gambar' => $item->gambar,

                    'image_url' => $imageUrl,

                    'created_at' =>
                        optional(
                            $item->created_at
                        )->translatedFormat(
                            'd F Y'
                        ),

                    'edit_url' =>
                        route(
                            'admin.produk.edit',
                            $item
                        ),
                ];
            }),
        ]);
    }
}