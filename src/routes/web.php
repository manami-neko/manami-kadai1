<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
// use App\Http\

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ContactController::class, 'index']);
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/thanks', [ContactController::class, 'thanks']);
// Route::middleware('auth')->group(function () {
Route::post('/admin', [ContactController::class, 'admin']);
// });
Route::get('/register', [ContactController::class, 'register']);
Route::post('/register', [ContactController::class, 'create']);
Route::get('/login', [ContactController::class, 'login']);
Route::post('/login', [ContactController::class, 'login']);
