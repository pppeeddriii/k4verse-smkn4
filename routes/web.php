<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\ProdukController as AdminProdukController;
use App\Http\Controllers\Admin\PesanController as AdminPesanController;

use App\Http\Controllers\ProdukController as FrontendProdukController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PesanController;

use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Produk;
use App\Models\Pesan;
use App\Models\ActivityLog;


/*
|--------------------------------------------------------------------------
| BERANDA
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index']);


/*
|--------------------------------------------------------------------------
| PROFIL
|--------------------------------------------------------------------------
*/

Route::get('/profile', function () {
    return view('profile');
});


/*
|--------------------------------------------------------------------------
| BERITA
|--------------------------------------------------------------------------
*/

Route::get('/news', function () {

    $category = request('category', 'Semua');

    $search = trim(request('search', ''));


    /*
    |--------------------------------------------------------------------------
    | BERITA FEATURED
    |--------------------------------------------------------------------------
    */

    $featured = ($category === 'Semua' || $category === 'Prestasi')
        ? Berita::find(1)
        : null;


    /*
    |--------------------------------------------------------------------------
    | BERITA LAINNYA
    |--------------------------------------------------------------------------
    */

    $query = Berita::where('id', '!=', 1);


    /*
    |--------------------------------------------------------------------------
    | FILTER KATEGORI
    |--------------------------------------------------------------------------
    */

    if ($category !== 'Semua') {
        $query->where('category', $category);
    }


    /*
    |--------------------------------------------------------------------------
    | SEARCH
    |--------------------------------------------------------------------------
    */

    if ($search !== '') {

        $query->where(function ($q) use ($search) {

            $q->where(
                'title',
                'like',
                '%' . $search . '%'
            )
            ->orWhere(
                'excerpt',
                'like',
                '%' . $search . '%'
            )
            ->orWhere(
                'content',
                'like',
                '%' . $search . '%'
            );

        });
    }


    /*
    |--------------------------------------------------------------------------
    | PAGINATION
    |--------------------------------------------------------------------------
    */

    $berita = $query
        ->orderBy('tanggal', 'desc')
        ->paginate(6)
        ->withQueryString();


    return view('news', [

        'berita' => $berita,

        'featured' => $featured,

        'category' => $category,

        'search' => $search,

    ]);
});


/*
|--------------------------------------------------------------------------
| DETAIL BERITA
|--------------------------------------------------------------------------
*/

Route::get('/news/{berita}', function (Berita $berita) {

    $related = Berita::where(
        'id',
        '!=',
        $berita->id
    )
        ->orderBy('tanggal', 'desc')
        ->take(3)
        ->get();


    return view('news-detail', [

        'berita' => $berita,

        'related' => $related,

    ]);
});


/*
|--------------------------------------------------------------------------
| GALERI FRONTEND
|--------------------------------------------------------------------------
*/

Route::get('/gallery', function () {

    $kegiatan = Galeri::where(
        'kategori',
        'kegiatan'
    )
        ->orderBy('id', 'asc')
        ->get();


    $prestasi = Galeri::where(
        'kategori',
        'prestasi'
    )
        ->orderBy('id', 'asc')
        ->get();


    return view(
        'gallery',
        compact(
            'kegiatan',
            'prestasi'
        )
    );
});


/*
|--------------------------------------------------------------------------
| PRODUK FRONTEND
|--------------------------------------------------------------------------
*/

Route::get(
    '/produk',
    [FrontendProdukController::class, 'index']
)->name('produk.index');


/*
|--------------------------------------------------------------------------
| KONTAK
|--------------------------------------------------------------------------
*/

Route::get('/contact', function () {
    return view('contact');
});


/*
|--------------------------------------------------------------------------
| KIRIM PESAN DARI KONTAK
|--------------------------------------------------------------------------
*/

Route::post(
    '/contact/pesan',
    [PesanController::class, 'store']
)->name('pesan.store');


/*
|--------------------------------------------------------------------------
| JURUSAN
|--------------------------------------------------------------------------
*/

Route::get('/jurusan', function () {
    return view('jurusan');
});


/*
|--------------------------------------------------------------------------
| ADMIN LOGIN
|--------------------------------------------------------------------------
*/

Route::get('/admin/login', function () {

    return view('admin.login');

})->name('admin.login');


Route::post('/admin/login', function (Request $request) {

    $credentials = $request->validate([

        'email' => [
            'required',
            'email'
        ],

        'password' => [
            'required'
        ],

    ]);


    if (Auth::attempt($credentials)) {

        $request->session()->regenerate();

        return redirect()->route(
            'admin.dashboard'
        );
    }


    return back()

        ->withErrors([
            'email' => 'Email atau password salah.',
        ])

        ->withInput(
            $request->only('email')
        );

})->name('admin.login.submit');


/*
|--------------------------------------------------------------------------
| ADMIN DASHBOARD
|--------------------------------------------------------------------------
*/

Route::get('/admin', function () {

    $totalBerita = Berita::count();

    $totalGaleri = Galeri::count();

    $totalProduk = Produk::count();

    $totalPesan = Pesan::count();

    $belumDibaca = Pesan::where(
        'is_read',
        false
    )->count();

    $pesanTerbaru = Pesan::latest()
        ->take(5)
        ->get();

    $aktivitasTerbaru = ActivityLog::latest()
    ->take(6)
    ->get();

    return view('admin.dashboard', [

        'totalBerita' => $totalBerita,

        'totalGaleri' => $totalGaleri,

        'totalProduk' => $totalProduk,

        'totalPesan' => $totalPesan,

        'aktivitasTerbaru' => $aktivitasTerbaru,

        'belumDibaca' => $belumDibaca,

        'pesanTerbaru' => $pesanTerbaru,

    ]);

})->middleware('auth')->name('admin.dashboard');


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {


    /*
    |--------------------------------------------------------------------------
    | ADMIN - BERITA
    |--------------------------------------------------------------------------
    */

    Route::get(
        'admin/berita/search',
        [BeritaController::class, 'search']
    )->name('admin.berita.search');


    Route::post(
        'admin/berita/bulk-delete',
        [BeritaController::class, 'bulkDestroy']
    )->name('admin.berita.bulk-delete');


    Route::resource(
        'admin/berita',
        BeritaController::class
    )
        ->names('admin.berita')
        ->parameters([
            'berita' => 'berita'
        ]);


    /*
    |--------------------------------------------------------------------------
    | ADMIN - GALERI
    |--------------------------------------------------------------------------
    */

    Route::post(
        'admin/galeri/bulk-delete',
        [GaleriController::class, 'bulkDestroy']
    )->name('admin.galeri.bulk-delete');


    Route::get(
        'admin/galeri/search',
        [GaleriController::class, 'search']
    )->name('admin.galeri.search');


    Route::resource(
        'admin/galeri',
        GaleriController::class
    )
        ->names('admin.galeri')
        ->parameters([
            'galeri' => 'galeri'
        ]);


    /*
    |--------------------------------------------------------------------------
    | ADMIN - PRODUK
    |--------------------------------------------------------------------------
    */

    Route::prefix('admin')
        ->name('admin.')
        ->group(function () {


            Route::delete(
                '/produk/bulk-delete',
                [AdminProdukController::class, 'bulkDestroy']
            )->name('produk.bulkDelete');


            Route::get(
                '/produk/search',
                [AdminProdukController::class, 'search']
            )->name('produk.search');


            Route::get(
                '/produk',
                [AdminProdukController::class, 'index']
            )->name('produk.index');


            Route::get(
                '/produk/create',
                [AdminProdukController::class, 'create']
            )->name('produk.create');


            Route::post(
                '/produk',
                [AdminProdukController::class, 'store']
            )->name('produk.store');


            Route::get(
                '/produk/{produk}/edit',
                [AdminProdukController::class, 'edit']
            )->name('produk.edit');


            Route::put(
                '/produk/{produk}',
                [AdminProdukController::class, 'update']
            )->name('produk.update');


            Route::delete(
                '/produk/{produk}',
                [AdminProdukController::class, 'destroy']
            )->name('produk.destroy');

        });


    /*
    |--------------------------------------------------------------------------
    | ADMIN - PESAN MASUK
    |--------------------------------------------------------------------------
    */

    Route::get(
        'admin/pesan',
        [AdminPesanController::class, 'index']
    )->name('admin.pesan.index');


    Route::put(
        'admin/pesan/{pesan}/read',
        [AdminPesanController::class, 'read']
    )->name('admin.pesan.read');


    Route::delete(
        'admin/pesan/{pesan}',
        [AdminPesanController::class, 'destroy']
    )->name('admin.pesan.destroy');


    /*
    |--------------------------------------------------------------------------
    | ADMIN LOGOUT
    |--------------------------------------------------------------------------
    */

    Route::post('/admin/logout', function (Request $request) {

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login');

    })->name('admin.logout');

});