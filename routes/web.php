<?php
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $posts = App\Models\Post::where('status', 'publish')->latest()->get();
    return view('home', compact('posts'));
})->name('home');

// Rute untuk Admin (CRUD Posts)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('posts', PostController::class);
});