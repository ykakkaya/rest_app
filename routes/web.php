<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Admin\ReservationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Admin Panel Routes
    Route::middleware('admin')->prefix('admin')->group(function () {
        //category routes
        Route::get('/index', [CategoryController::class, 'index'])->name('admin.category');
        Route::get('/category/create', [CategoryController::class, 'create'])->name('admin.category.create');
        Route::post('/category/store', [CategoryController::class, 'store'])->name('admin.category.store');
        Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
        //menu routes
        Route::get('/category/destroy/{id}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');
        Route::get('/menu', [MenuController::class, 'index'])->name('admin.menu');
        Route::get('/menu/create', [MenuController::class, 'create'])->name('admin.menu.create');
        Route::post('/menu/store', [MenuController::class, 'store'])->name('admin.menu.store');
        Route::get('/menu/edit/{id}', [MenuController::class, 'edit'])->name('admin.menu.edit');
        Route::post('/menu/update/{id}', [MenuController::class, 'update'])->name('admin.menu.update');
        Route::get('/menu/destroy/{id}', [MenuController::class, 'destroy'])->name('admin.menu.destroy');
        //table routes
        Route::get('/table', [TableController::class, 'index'])->name('admin.table');
        Route::get('/table/create', [TableController::class, 'create'])->name('admin.table.create');
        Route::post('/table/store', [TableController::class, 'store'])->name('admin.table.store');
        Route::get('/table/edit/{id}', [TableController::class, 'edit'])->name('admin.table.edit');
        Route::post('/table/update/{id}', [TableController::class, 'update'])->name('admin.table.update');
        Route::get('/table/destroy/{id}', [TableController::class, 'destroy'])->name('admin.table.destroy');
        //reservation routes
        Route::get('/reservation', [ReservationController::class, 'index'])->name('admin.reservation');
        Route::get('/reservation/create', [ReservationController::class, 'create'])->name('admin.reservation.create');
        Route::post('/reservation/store', [ReservationController::class, 'store'])->name('admin.reservation.store');
        Route::get('/reservation/edit/{id}', [ReservationController::class, 'edit'])->name('admin.reservation.edit');
        Route::post('/reservation/update/{id}', [ReservationController::class, 'update'])->name('admin.reservation.update');
        Route::get('/reservation/destroy/{id}', [ReservationController::class, 'destroy'])->name('admin.reservation.destroy');

    });

});



require __DIR__.'/auth.php';
