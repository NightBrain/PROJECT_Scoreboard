<?php

use App\Http\Controllers\AdminController;
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
})->name('home');


// Route::get('/get-time',             [AdminController::class, 'getTime']);
// Route::post('/update-value',        [AdminController::class, 'updateTime']);

Route::get('/get-time',             [AdminController::class, 'getTime']);
Route::get('/get-ready',            [AdminController::class, 'getReady']);
Route::post('/update-value',        [AdminController::class, 'updateTime']);


Route::get('/get-stime',            [AdminController::class, 'getsTime']);
Route::get('/get-sready',           [AdminController::class, 'getsReady']);
Route::post('/update-svalue',       [AdminController::class, 'updatesTime']);


Route::get('/data',                 [AdminController::class, 'getData']);


Route::put('/api/team01/{id}',           [AdminController::class, 'team01']);
Route::put('/api/team02/{id}',           [AdminController::class, 'team02']);
Route::put('/api/p/score01/{id}',        [AdminController::class, 'p_score01']);
Route::put('/api/m/score01/{id}',        [AdminController::class, 'm_score01']);
Route::put('/api/r/score01/{id}',        [AdminController::class, 'r_score01']);
Route::put('/api/p/score02/{id}',        [AdminController::class, 'p_score02']);
Route::put('/api/m/score02/{id}',        [AdminController::class, 'm_score02']);
Route::put('/api/r/score02/{id}',        [AdminController::class, 'r_score02']);
Route::put('/api/t/set/{id}',            [AdminController::class, 't_set']);
Route::put('/api/t/start/{id}',          [AdminController::class, 't_start']);
Route::put('/api/t/stop/{id}',           [AdminController::class, 't_stop']);
Route::put('/api/t/re/{id}',             [AdminController::class, 't_reset']);
Route::put('/api/s/set/01/{id}',         [AdminController::class, 's_set_01']);
Route::put('/api/s/set/02/{id}',         [AdminController::class, 's_set_02']);
Route::put('/api/s/set/03/{id}',         [AdminController::class, 's_set_03']);
Route::put('/api/s/set/04/{id}',         [AdminController::class, 's_set_04']);
Route::put('/api/s/re/01/{id}',          [AdminController::class, 's_re_01']);
Route::put('/api/s/re/02/{id}',          [AdminController::class, 's_re_02']);
Route::put('/api/s/re/03/{id}',          [AdminController::class, 's_re_03']);
Route::put('/api/s/re/04/{id}',          [AdminController::class, 's_re_04']);
Route::put('/api/l/set/{id}',            [AdminController::class, 'l_set']);
Route::put('/api/l/reset/{id}',          [AdminController::class, 'l_reset']);
Route::put('/api/r/set/{id}',            [AdminController::class, 'r_set']);
Route::put('/api/r/reset/{id}',          [AdminController::class, 'r_reset']);
Route::put('/api/p/fouls01/{id}',        [AdminController::class, 'p_fouls01']);
Route::put('/api/m/fouls01/{id}',        [AdminController::class, 'm_fouls01']);
Route::put('/api/r/fouls01/{id}',        [AdminController::class, 'r_fouls01']);
Route::put('/api/p/fouls02/{id}',        [AdminController::class, 'p_fouls02']);
Route::put('/api/m/fouls02/{id}',        [AdminController::class, 'm_fouls02']);
Route::put('/api/r/fouls02/{id}',        [AdminController::class, 'r_fouls02']);
Route::put('/api/shot/24m/{id}',         [AdminController::class, 'shot_24m']);
Route::put('/api/shot/30m/{id}',         [AdminController::class, 'shot_30m']);
Route::put('/api/shot/35m/{id}',         [AdminController::class, 'shot_35m']);
Route::put('/api/shot/s/{id}',           [AdminController::class, 'shot_s']);
Route::put('/api/shot/t/{id}',           [AdminController::class, 'shot_t']);
Route::put('/api/reset/all/{id}',        [AdminController::class, 'reset_all']);




Route::get('/dashboard', [AdminController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
