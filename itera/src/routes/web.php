<?php

use App\Http\Controllers\ProfileController;
//Importa el controlador de imágenes
use App\Http\Controllers\PictureUrlController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', function () {
    return inertia('Welcome');
});

//Rutas a las que pueden acceder los usuarios autentificados
Route::middleware('auth')->group(function () {

    Route::get('home', [PictureUrlController::class, 'publicIndex'])->name('home');
    Route::get('create', [PictureUrlController::class, 'create'])->name('create');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Genera las rutas automáticamente
    //picture.index | .store ...
    Route::resource('pictures', PictureUrlController::class);


});

require __DIR__ . '/auth.php';
