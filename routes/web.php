<?php

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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


/** return view modelo de email */
// Route::get('/email', function () {
//     return new \App\Mail\SeriesCreated(
//         'Sintonia',
//         1,
//         5,
//         10
//     );
// });

require __DIR__.'/auth.php';

/** return response em json object - fora da autenticação*/
// Route::get('/api/series', function () {
//     return [
//         'Grey\'s Anatomy'
//     ];
// });