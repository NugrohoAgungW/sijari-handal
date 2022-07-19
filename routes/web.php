<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\FeedbackbukuController;
use App\Http\Controllers\FeedbackarsipController;
use App\Http\Controllers\PerpustakaanController;
use App\Http\Controllers\AboutController;
use Laravel\Socialite\Facades\Socialite;

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
    return view('home');
});

Route::get('/login', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout']);
Route::get('/user', [UserController::class, 'user']);
Route::post('/dologin', [UserController::class, 'dologin']);
Route::post('/update_profil', [UserController::class, 'update_profil']);

Route::get('/register', [UserController::class, 'register']);
Route::post('/doregister', [UserController::class, 'doregister']);

Route::get('/auth/callback', [UserController::class, 'callback']);

Route::get('/home', [HomeController::class, 'home']);

Route::get('/auth/redirect', function () {
    return Socialite::driver('google')->redirect();
});


Route::get('/hasil/{keyword}', [BukuController::class, 'hasil']);
Route::post('/cari', [BukuController::class, 'cari']);

Route::get('/buku/detail/{id}', [BukuController::class, 'detail']);
Route::get('/buku/search', [BukuController::class, 'search']);
Route::get('/buku', [BukuController::class, 'index']);
Route::post('/feedback/buku/store/{id}', [FeedbackbukuController::class, 'store']);

Route::get('/arsip/detail/{id}', [ArsipController::class, 'detail']);
Route::get('/arsip/search', [ArsipController::class, 'search']);
Route::get('/arsip', [ArsipController::class, 'index']);
Route::post('/feedback/arsip/store/{id}', [FeedbackarsipController::class, 'store']);

//masih sementara
Route::get('/about', [AboutController::class, 'index']);

//mitra
Route::get('/mitra', [PerpustakaanController::class, 'index']);
