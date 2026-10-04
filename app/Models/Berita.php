<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'category',
        'tanggal',
        'image',
        'excerpt',
        'content',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function getImageUrlAttribute(): ?string
    {
        if (!$this->image) {
            return null;
        }

        // Gambar hasil upload dari admin
        if (file_exists(public_path('images/berita/' . $this->image))) {
            return asset('images/berita/' . $this->image);
        }

        // Gambar lama di folder images
        if (file_exists(public_path('images/' . $this->image))) {
            return asset('images/' . $this->image);
        }

        // File tidak ditemukan -> tampilkan placeholder
        return null;
    }
}