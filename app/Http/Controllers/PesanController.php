<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use App\Models\ActivityLog;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subjek' => 'required|string|max:255',
            'pesan' => 'required|string',
        ], [
            'nama.required' => 'Nama lengkap wajib diisi.',
            'email.required' => 'Alamat email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'subjek.required' => 'Silakan pilih subjek pesan.',
            'pesan.required' => 'Pesan wajib diisi.',
        ]);

        Pesan::create([
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'subjek' => $validated['subjek'],
            'pesan' => $validated['pesan'],
            'is_read' => false,
        ]);

        ActivityLog::create([
            'action' => 'pesan_baru',
            'description' => 'Pengunjung mengirim pesan baru',
        ]);

        return back()->with(
            'success',
            'Pesan berhasil dikirim. Terima kasih telah menghubungi SMK Negeri 4 Bogor.'
        );
    }
}