<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [PostController::class, 'index']); //mengarah ke method index() di PostController

Route::resource('posts', PostController::class)->except('index'); //Rute ini secara otomatis menghasilkan rute CRUD standar untuk resource posts 

