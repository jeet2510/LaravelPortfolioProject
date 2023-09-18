<?php

use App\Http\Controllers\AdminDashboard\UsersController;
use App\Http\Controllers\Data\DataOperationController;
use App\Http\Controllers\HomeController;
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

Auth::routes();
Route::get('admin/home',[HomeController::class, 'handleAdmin'])->name('admin.route')->middleware('admin');
Route::get('/home', [HomeController::class, 'index'])->name('users.home');

Route::get('/users', [UsersController::class, 'index'])->name('users.index');
Route::post('/users/store', [UsersController::class, 'store'])->name('users.store');
Route::patch('/users/{id}/update-role', [UsersController::class, 'updateRole'])->name('users.update.role');
Route::get('/users/{id}/change-status', [UsersController::class, 'changeStatus'])->name('users.change.status');
Route::get('/users/{id}', [UsersController::class, 'destroy'])->name('users.destroy');
Route::post('/users/bulk-actions', [UsersController::class, 'bulkActions'])->name('users.bulk.actions');
Route::get('users/{id}/edit', [UsersController::class, 'edit'])->name('users.edit');
Route::put('users/{id}', [UsersController::class, 'update'])->name('users.update');

Route::get('/data-operation', [DataOperationController::class, 'index'])->name('dataOpration.index');
Route::get('/user-excel-download', [DataOperationController::class, 'get_user_data'])->name('users.excel');
Route::get('/user-pdf-download', [DataOperationController::class, 'createPDF'])->name('users.pdf');
