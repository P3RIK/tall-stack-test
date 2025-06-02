<?php

use App\Livewire\Forms\PostCreateForm;
use App\Livewire\PostDashboard;
use App\Livewire\PostTable;
use App\Livewire\PostTableForm;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome');

Route::middleware('auth')->group(function () {
    Route::get('/posts/dashboard', PostDashboard::class)
        ->name('posts.dashboard'); 

    Route::get('/posts/table', PostTable::class)
        ->name('posts.table');

    Route::get('/posts/create', PostCreateForm::class)
        ->name('posts.create');

    Route::get('/posts/tableform', PostTableForm::class)
        ->name('posts.tableform');    
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
