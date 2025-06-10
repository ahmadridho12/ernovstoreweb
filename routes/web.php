<?php


use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route untuk halaman publik (tidak perlu login)
// Di routes/web.php, untuk halaman publik detail produk:
// Route::get('/detail/{id}', [\App\Http\Controllers\HomeController::class, 'detail'])
//     ->name('home.detail');
//     Route::get('/product/{id}', [ProductController::class, 'detail'])
//      ->name('product.detail');
Route::get('/detail/{slug}', [\App\Http\Controllers\HomeController::class, 'detail'])
    ->name('home.detail');

Route::get('/product/{slug}', [ProductController::class, 'detail'])
    ->name('product.detail');

// Route untuk halaman daftar produk
Route::get('/productss', [ProductsController::class, 'index'])->name('home.productss');
Route::get('/about', [\App\Http\Controllers\AboutController::class, 'index'])->name('home.about');
Route::get('/order', [\App\Http\Controllers\OrderController::class, 'index'])->name('home.order');
Route::get('/shippinginfo', [\App\Http\Controllers\ShippingController::class, 'index'])->name('home.shippinginfo');
Route::get('/faq', [\App\Http\Controllers\FaqController::class, 'index'])->name('home.faq');
Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'index'])->name('home.contact');
// Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');
// Rute yang memerlukan login
Route::middleware(['auth', 'session.timeout'])->group(function () {
    // Halaman yang sebelumnya ditandai sebagai home sekarang diubah menjadi PageController
    Route::get('/pages', [\App\Http\Controllers\PageController::class, 'index'])->name('pages.index');

    // Rute User hanya bisa diakses oleh Admin
    Route::resource('user', \App\Http\Controllers\UserController::class)
        ->except(['show', 'edit', 'create'])
        ->middleware(['role:admin']);

    // Profile
    Route::get('profile', [\App\Http\Controllers\PageController::class, 'profile'])
        ->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\PageController::class, 'profileUpdate'])
        ->name('profile.update');
    Route::put('profile', [\App\Http\Controllers\PageController::class, 'profileUpdate'])
        ->name('profile.update');
    Route::put('profile/deactivate', [\App\Http\Controllers\PageController::class, 'deactivate'])
        ->name('profile.deactivate')
        ->middleware(['role:staff']);

    Route::get('settings', [\App\Http\Controllers\PageController::class, 'settings'])
        ->name('settings.show')
        ->middleware(['role:admin']);
    Route::put('settings', [\App\Http\Controllers\PageController::class, 'settingsUpdate'])
        ->name('settings.update')
        ->middleware(['role:admin']);

    Route::delete('attachment', [\App\Http\Controllers\PageController::class, 'removeAttachment'])
        ->name('attachment.destroy');
      // Tambahkan route untuk chart di sini, karena controller-nya adalah PageController
      Route::get('/chart/ayamMati', [\App\Http\Controllers\PageController::class, 'chartAyamMati'])->name('chart.ayamMati');
      Route::get('/chart/ayamPanen', [\App\Http\Controllers\PageController::class, 'chartAyamPanen'])->name('chart.ayamPanen');
      Route::get('/chart/combined', [\App\Http\Controllers\PageController::class, 'chartCombined'])->name('chart.combined');

    // // Rute admin
    // Route::get('/admin', [UserController::class, 'index'])->name('admin.index');

    // Rute transaksi
    Route::prefix('transaction')->as('transaction.')->group(function () {
        Route::resource('incoming', \App\Http\Controllers\IncomingLetterController::class);
        Route::resource('outgoing', \App\Http\Controllers\OutgoingLetterController::class);
        Route::resource('{letter}/disposition', \App\Http\Controllers\DispositionController::class)->except(['show']);
    });

   
    Route::prefix('agenda')->as('agenda.')->group(function () {
        Route::get('incoming', [\App\Http\Controllers\IncomingLetterController::class, 'agenda'])->name('incoming');
        Route::get('incoming/print', [\App\Http\Controllers\IncomingLetterController::class, 'print'])->name('incoming.print');
        Route::get('outgoing', [\App\Http\Controllers\OutgoingLetterController::class, 'agenda'])->name('outgoing');
        Route::get('outgoing/print', [\App\Http\Controllers\OutgoingLetterController::class, 'print'])->name('outgoing.print');
    });

    Route::prefix('gallery')->as('gallery.')->group(function () {
        Route::get('incoming', [\App\Http\Controllers\LetterGalleryController::class, 'incoming'])->name('incoming');
        Route::get('outgoing', [\App\Http\Controllers\LetterGalleryController::class, 'outgoing'])->name('outgoing');
    });

    Route::prefix('reference')->as('reference.')->middleware(['role:admin'])->group(function () {
        Route::resource('classification', \App\Http\Controllers\ClassificationController::class)->except(['show', 'create', 'edit']);
        Route::resource('status', \App\Http\Controllers\LetterStatusController::class)->except(['show', 'create', 'edit']);
    });

    

    Route::prefix('master')->as('master.')->group(function () {
      
        Route::resource('slider', \App\Http\Controllers\SliderController::class)->except(['show', 'create', 'edit']);
        Route::resource('category', \App\Http\Controllers\CategorisController::class)->except(['show', 'create', 'edit']);
       


    
    });

    Route::prefix('product')->as('product.')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        // Rute statis harus didefinisikan terlebih dahulu
        Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/store', [ProductController::class, 'store'])->name('store');
        // Kemudian rute dinamis
        // Route::get('/{id}', [ProductController::class, 'show'])->name('show');
        Route::get('/{product:slug}', [ProductController::class, 'show'])->name('show');

        Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('edit');
        Route::put('/{id}', [ProductController::class, 'update'])->name('update');
        Route::delete('/{id}', [ProductController::class, 'destroy'])->name('destroy');
        Route::delete('/{id}/photo/{photoId}', [ProductController::class, 'deletePhoto'])->name('photo.destroy');
    });
    
});
