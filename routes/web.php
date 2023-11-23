<?php

use App\Http\Controllers\MedewerkerController;
use App\Http\Controllers\JongereController;
use App\Http\Controllers\ActiviteitController;
use App\Http\Controllers\InstituutController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
});

//Medewerker
Route::get('/create', [MedewerkerController::class, 'create'])->name('medewerker.create');
Route::post('/dashboard', [MedewerkerController::class, 'store'])->name('medewerker.store');
Route::get('/dashboard', [MedewerkerController::class, 'show'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/delete/{id}', [MedewerkerController::class, 'destroy'])->name('medewerker.destroy');

//Jongere
Route::get('/jongeren', [JongereController::class, 'index'])->name('jongeren.index');
Route::get('/jongeren/create', [JongereController::class, 'create'])->name('jongeren.create');
Route::post('/jongeren/store', [JongereController::class, 'store'])->name('jongeren.store');
Route::get('/jongeren/show', [JongereController::class, 'show'])->middleware(['auth', 'verified'])->name('jongeren.show');
Route::get('/jongeren/delete/{id}', [JongereController::class, 'destroy'])->name('jongere.destroy');
Route::get('/jongeren/edit/{id}', [JongereController::class, 'edit'])->name('jongere.edit');
Route::post('/jongeren/edit/{id}', [JongereController::class, 'update']);

//Activiteit
Route::get('/activiteiten', [ActiviteitController::class, 'index'])->name('activiteiten.index');
Route::get('/activiteiten/delete/{id}', [ActiviteitController::class, 'destroy'])->name('activiteiten.destroy');
Route::get('/activiteiten/edit/{id}', [ActiviteitController::class, 'edit'])->name('activiteiten.edit');
Route::post('/activiteiten/edit/{id}', [ActiviteitController::class, 'update']);
Route::get('/activiteiten/create', [ActiviteitController::class, 'create'])->name('activiteiten.create');
Route::post('/activiteiten/store', [ActiviteitController::class, 'store'])->name('activiteiten.store');

//Instituut
Route::get('/instituten', [InstituutController::class, 'index'])->name('instituten.index');
Route::get('/instituten/delete/{id}', [InstituutController::class, 'destroy'])->name('instituten.destroy');
Route::get('/instituten/edit/{id}', [InstituutController::class, 'edit'])->name('instituten.edit');
Route::post('/instituten/edit/{id}', [InstituutController::class, 'update']);
Route::get('/instituten/create', [InstituutController::class, 'create'])->name('instituten.create');
Route::post('/instituten/store', [InstituutController::class, 'store'])->name('instituten.store');

require __DIR__.'/auth.php';
