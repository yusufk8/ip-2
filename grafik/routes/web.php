<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserOrderController;
use App\Http\Controllers\MessageController;

Route::get('/messages/designer/{designer}', [MessageController::class, 'getDesignerMessages'])
    ->name('messages.designer');
Route::middleware(['auth'])->group(function () {
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::get('/messages/{user}', [MessageController::class, 'show'])->name('messages.show');
    Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
});
Route::get('/my-orders', [OrderController::class, 'index'])->name('orders.index')->middleware('auth');
Route::get('/services', [ServiceController::class, 'index']);
Route::get('/services/{id}', [ServiceController::class, 'show'])->name('services.show');
Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
Route::get('/order/{designer_id}', [OrderController::class, 'create'])->name('order.create');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');
Route::get('/', [PageController::class, 'main'])->name('main');
Route::get('main', [PageController::class, 'main'])->name('anasayfa');
Route::get('/hakkimizda', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact']);
Route::get('/services', [PageController::class, 'services']);
route::get('/services', [ServiceController::class, 'index']);
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/contact', [ContactController::class, 'contact']);
Route::get('/login', [PageController::class, 'login']);
Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'registerPage'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');


