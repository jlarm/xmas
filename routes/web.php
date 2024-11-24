<?php

use App\Livewire\Grandma\Index;
use App\Livewire\ItemForm;
use App\Livewire\Kid\Show;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Route::get('dashboard', function () {
    return to_route('dashboard.kid', ['kid' => 1]);
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('kid/{kid}', ItemForm::class)->name('form');

Route::get('dashboard/kids/{kid}', Show::class)
    ->middleware(['auth', 'verified'])
    ->name('dashboard.kid');

Route::get('g', Index::class)->name('g');

require __DIR__ . '/auth.php';
