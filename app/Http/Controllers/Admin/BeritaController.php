<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    private function resolveImageUrl(?string $image): ?string
    {
        if (!$image) {
            return null;
        }

        if (file_exists(public_path('images/berita/' . $image))) {
            return asset('images/berita/' . $image);
        }

        if (file_exists(public_path('images/' . $image))) {
            return asset('images/' . $image);
        }

        return null;
    }

    public function index(Request $request)
    {
        $search = trim($request->get('search', ''));
        $category = $request->get('category', 'Semua');

        $query = Berita::query();

        if ($search !== '') {
            $query->where('title', 'like', '%' . $search . '%');
        }

        if ($category !== 'Semua') {
            $query->where('category', $category);
        }

        $beritas = $query
            ->orderBy('id', 'asc')
            ->paginate(10)
            ->withQueryString();

        $totalBerita = Berita::count();
        $kategoriCount = Berita::distinct('category')->count('category');
        $beritaBulanIni = Berita::whereMonth('tanggal', now()->month)
            ->whereYear('tanggal', now()->year)
            ->count();

        return view('admin.berita.index', compact(
            'beritas',
            'search',
            'category',
            'totalBerita',
            'kategoriCount',
            'beritaBulanIni'
        ));
    }

    /**
     * Endpoint AJAX untuk realtime search (dipanggil via fetch, bukan reload halaman)
     */
    public function search(Request $request)
    {
        $search = trim($request->get('search', ''));
        $category = $request->get('category', 'Semua');

        $query = Berita::query();

        if ($search !== '') {
            $query->where('title', 'like', '%' . $search . '%');
        }

        if ($category !== '' && $category !== 'Semua') {
            $query->where('category', $category);
        }

        $beritas = $query->orderBy('id', 'asc')->get();

        $data = $beritas->map(function ($berita) {
            return [
                'id' => $berita->id,
                'title' => $berita->title,
                'excerpt' => $berita->excerpt,
                'category' => $berita->category,
                'tanggal' => \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y'),
                'image_url' => $this->resolveImageUrl($berita->image),
                'edit_url' => route('admin.berita.edit', $berita),
                'view_url' => url('/news/' . $berita->id),
            ];
        });

        return response()->json([
            'beritas' => $data,
        ]);
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'tanggal' => 'required|date',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
            'excerpt' => 'required|string',
            'content' => 'required|string',
        ]);

        $validated['slug'] = Str::slug($validated['title']) . '-' . time();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/berita'), $filename);
            $validated['image'] = $filename;
        }

        Berita::create($validated);

        ActivityLog::create([
            'action' => 'berita_tambah',
            'description' => 'Administrator menambahkan berita baru',
        ]);



        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit(Berita $berita)
    {
        return view('admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, Berita $berita)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'tanggal' => 'required|date',
            'image' => 'nullable|image|max:10240',
            'excerpt' => 'required|string',
            'content' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/berita'), $filename);
            $validated['image'] = $filename;
        }

        $berita->update($validated);

        ActivityLog::create([
    'action' => 'berita_edit',
    'description' => 'Administrator memperbarui berita',
]);

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(Berita $berita)
    {
        $berita->delete();

        ActivityLog::create([
    'action' => 'berita_hapus',
    'description' => 'Administrator menghapus berita',
]);


        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil dihapus.');
    }

    public function bulkDestroy(Request $request)
    {
        $ids = $request->input('selected', []);

        if (empty($ids)) {
            return redirect()
                ->route('admin.berita.index')
                ->with('error', 'Pilih minimal satu berita untuk dihapus.');
        }

        Berita::whereIn('id', $ids)->delete();

        ActivityLog::create([
    'action' => 'berita_bulk_hapus',
    'description' => count($ids) . ' berita dihapus oleh administrator',
]);

        return redirect()
            ->route('admin.berita.index')
            ->with('success', count($ids) . ' berita berhasil dihapus.');
    }
}