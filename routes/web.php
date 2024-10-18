<?php

use App\Livewire\ItemForm;
use Illuminate\Support\Facades\Route;

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('kid/{kid}', ItemForm::class)->name('form');

require __DIR__ . '/auth.php';
