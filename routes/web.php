<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('public.index');
});

Route::get('/blog', function () {
    return view('public.blog');
});



