<?php

use Domain\Users\Controllers\OAuthLoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('oauth')->group(function() {
    Route::get('/google', [OAuthLoginController::class, 'redirectToProvider'])->name('google');
    Route::get('/google/callback', [OAuthLoginController::class, 'handleProviderResponse'])->name('google');

});
