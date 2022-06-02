<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuizController;

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
    return view('top');
});


Route::get('/home', function () {
    return view('welcome');
});

Route::get('/index', [HomeController::class, 'index'])->name('index');
Route::get('/quiz', [HomeController::class, 'quiz'])->name('quiz');

Route::get('/answer', [HomeController::class, 'answer'])->name('answer');
Route::get('/create', [HomeController::class, 'create']);
Route::post('/create', [QuizController::class, 'index']);
Route::get('/complete', [QuizController::class, 'create']);
Route::get('/answer/{id}', [HomeController::class, 'answer']);
Route::post('/answer', [QuizController::class, 'answer']);
Route::get('/user', [HomeController::class, 'user']);
Route::get('/edit/{id}', [HomeController::class, 'edit']);
Route::post('/edit/{id}', [QuizController::class, 'edit']);
Route::get('/delete/{id}', [QuizController::class, 'delete']);

Route::post('/good', [QuizController::class, 'good'])->name('good');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
