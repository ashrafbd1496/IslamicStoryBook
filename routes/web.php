<?php
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoryController;

Route::inertia('/', 'Welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';


Route::get('/categories', [
    StoryController::class,
    'categoryIndex',
])->name('categories.index');


Route::get('/stories', function () {
    return Inertia::render('Stories/Index');
})->name('stories.index');

Route::get('/stories/{story}/read', [
    StoryController::class,
    'read',
])->name('stories.read');

Route::get('/stories/{story}', [
    StoryController::class,
    'show',
])->name('stories.show');



Route::get('/categories/{slug}', [
    StoryController::class,
    'categoryShow',
])->name('categories.show');

