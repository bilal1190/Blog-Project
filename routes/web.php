<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('frontblog/list', [BlogController::class, 'index'])->name('frontblog.list');
    Route::get('frontblog/about', [HomeController::class, 'about'])->name('frontblog.about');
    Route::get('frontblog/contact', [HomeController::class, 'contact'])->name('frontblog.contact');
    Route::get('frontblog/show/{id}', [BlogController::class, 'show'])->name('frontblog.show');


    // Route::post('/blogs', [BlogController::class, 'store'])->name('admin.blogs.store');


});

Route::middleware(['auth', 'admin'])->group(function () {
  
    Route::get('admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
    Route::get('admin/blogs/list', [BlogController::class, 'index'])->name('admin.blogs.list');
    Route::get('admin/blogs/create', [BlogController::class, 'create'])->name('admin.blogs.create');
    Route::post('admin/blogs', [BlogController::class, 'store'])->name('admin.blogs.store');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::delete('/admin/blogs/{id}', [BlogController::class, 'destroy'])->name('admin.blogs.destroy');
    Route::get('admin/blogs/edit/{id}', [BlogController::class, 'edit'])->name('admin.blogs.edit');
    Route::post('admin/blogs/{id}', [BlogController::class, 'update'])->name('admin.blogs.update');

});


require __DIR__.'/auth.php';


// Route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'admin']);
// Route::get('admin/blog/list', [BlogController::class, 'index'])->middleware(['auth', 'admin']);