<?php

use App\Http\Controllers\CrudController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile', [CrudController::class, 'userEdit'])->name('profile');

    Route::get('/roles', [CrudController::class, 'role'])->middleware('roles:super_admin')->name('role.index');
    Route::get('/user', [CrudController::class, 'user'])->name('user.index');
    Route::get('/brands', [CrudController::class, 'brand'])->name('brand.index');
    Route::get('/boulis', [CrudController::class, 'bouli'])->name('bouli.index');
    Route::get('/bouli/{bouli?}', [CrudController::class, 'editOrCreateBouli'])->name('bouli.edit-or-create');

});

require __DIR__ . '/auth.php';
