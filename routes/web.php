<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\labcontroller;
use App\Http\Controllers\dosencontroller;
use App\Http\Controllers\kegiatancontroller;
// use App\Http\Controllers\dosendetailcontroller;

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
/*
Route::get('/', function () {
    return view('welcome');
});
Route::get('/index', function () {
    return view('index');
});
*/

Route::get('/', function () {
    return view('/index');
});
Route::get('/index', function () {
    return view('index');
});
// Route::get('/dosendetail', function () {
//     return view('dosendetail');
// });
// Route::get('/dosendetail/{id}/{lab}', [dosencontroller::class, 'detail'])->name('dosendetail');
Route::post('/dosendetail', [dosencontroller::class, 'detail'])->name('dosendetail');
Route::post('/kegiatandetail', [kegiatancontroller::class, 'detail'])->name('kegiatandetail');
Route::get('/dosen', [dosencontroller::class, 'show'])->name('dosen');
Route::get('/laboratorium', [labcontroller::class, 'show'])->name('lab');
