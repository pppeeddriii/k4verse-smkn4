<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Galeri;

class HomeController extends Controller
{
    public function index()
{
    $berita = Berita::orderBy('tanggal', 'desc')
        ->take(3)
        ->get();

    // FOTO UTAMA WAJIB ID 1
    $fotoUtama = Galeri::find(1);

    // FOTO KECIL WAJIB ID 2, 3, 4, 5
    $galeriKecil = Galeri::whereIn('id', [2, 3, 4, 5])
        ->orderBy('id', 'asc')
        ->get();

    return view('home', compact(
        'berita',
        'fotoUtama',
        'galeriKecil'
    ));
}
}