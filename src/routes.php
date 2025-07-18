<?php


use Illuminate\Support\Facades\Route;
use NanoDepo\Nexus\Controllers\ThumbnailController;

Route::get('/storage/images/{dir}/{method}/{size}/{file}', ThumbnailController::class)
    ->where('method', 'resize|crop|fit')
    ->where('size', '\d+x\d+')
    ->where('file', '.+\.(png|jpg|jpeg|webp)$')
    ->name('thumbnail');

