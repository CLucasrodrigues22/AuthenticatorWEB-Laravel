<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Mail\MessageTestMail;
use Illuminate\Support\Facades\Mail;

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

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
->name('home')->middleware('verified');
Route::get('/task/export/{extension}', [App\Http\Controllers\TaskController::class, 'exportfiles'])->name('task.export')->middleware('auth', 'verified');;
Route::resource('/task', App\Http\Controllers\TaskController::class)->middleware('auth', 'verified');

Route::get('/email-message', function() {
    return new MessageTestMail();
});