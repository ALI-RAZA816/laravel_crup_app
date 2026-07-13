<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/add', function () {
    return view('add');
});
Route::get('/view', function () {
    return view('view');
});

Route::get('/',[UserController::class, 'showData'])->name('home');
Route::post('/add',[UserController::class, 'addData'])->name('addUser');
Route::get('/view/{id}',[UserController::class, 'viewData'])->name('view.user');
Route::get('/update/{id}',[UserController::class, 'updateData'])->name('view.update');
Route::post('/update/{id}',[UserController::class, 'updateUser'])->name('update.page');
Route::get('/delete/{id}',[UserController::class, 'deleteUser'])->name('user.delete');
