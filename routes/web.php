<?php

use App\Livewire\ItemForm;
use App\Livewire\Page\Kid;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', function () {
    return to_route('dashboard.kid', ['kid' => 1]);
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('kid/{kid}', ItemForm::class)->name('form');

Route::get('dashboard/kids/{kid}', Kid::class)
    ->middleware(['auth', 'verified'])
    ->name('dashboard.kid');

require __DIR__ . '/auth.php';
