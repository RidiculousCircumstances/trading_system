<?php

use Domain\Users\Controllers\OAuthLoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('oauth')->group(function() {
    dump(request()->all());
    Route::get('/google', [OAuthLoginController::class, 'redirectToProvider'])->name('google');
    Route::get('/google/callback', [OAuthLoginController::class, 'handleProviderResponse'])->name('google');
    Route::get('/test', function() {
        return 'Yes we are';
    });
});
