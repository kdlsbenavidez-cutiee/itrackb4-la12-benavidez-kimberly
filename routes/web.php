<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SkincareController;

Route::get('/', function () {
    return 'Kimberly D. Benavidez | 2023-70908 | Block 4C | ITRACKB4 Laravel 12';
});

Route::get('/skincare/featured', [SkincareController::class, 'featured'])
    ->name('skincare.featured');

Route::get('/skincare/filter/{value?}', function ($value = null) {
    if ($value === null) {
        return redirect()->route('skincare.index');
    }

    return redirect()->route('skincare.index', [
        'category_id' => $value
    ]);
})->name('skincare.filter');

Route::resource('skincare', SkincareController::class);
