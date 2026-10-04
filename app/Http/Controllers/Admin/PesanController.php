<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pesan;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function index(Request $request)
{
    $query = Pesan::query();

    // SEARCH
    if ($request->filled('search')) {
        $search = $request->search;

        $query->where(function ($q) use ($search) {
            $q->where('nama', 'like', "%{$search}%")
              ->orWhere('email', 'like', "%{$search}%")
              ->orWhere('subjek', 'like', "%{$search}%")
              ->orWhere('pesan', 'like', "%{$search}%");
        });
    }

    // FILTER KATEGORI
    if ($request->filled('kategori')) {
        $query->where('subjek', $request->kategori);
    }

    $pesans = $query
        ->latest()
        ->paginate(10)
        ->withQueryString();

    $totalPesan = Pesan::count();

    $belumDibaca = Pesan::where(
        'is_read',
        false
    )->count();

    return view('admin.pesan.index', compact(
        'pesans',
        'totalPesan',
        'belumDibaca'
    ));
}

    public function read(Pesan $pesan)
    {
        $pesan->update([
            'is_read' => true
        ]);

        return back()->with(
            'success',
            'Pesan ditandai sebagai sudah dibaca.'
        );
    }

    public function destroy(Pesan $pesan)
    {
        $pesan->delete();

        return back()->with(
            'success',
            'Pesan berhasil dihapus.'
        );
    }
}