<?php

namespace App\Http\Controllers;

use App\Models\Produk;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::latest()->get();

        return view('produk', compact('produk'));
    }
}