<?php

use App\Http\Controllers\AdminDashboard\DashboardController;
use App\Http\Controllers\AdminDashboard\UsersController;
use App\Http\Controllers\GoogleSocialiteController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\Data\DataOperationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\TicketsController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
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
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/users/store', [UsersController::class,'store'])->name('users.store');


Route::group(['middleware' => ('admin')], function(){

Route::group(['prefix' => 'admin'], function(){
Route::get('/tickets', [TicketsController::class, 'index'])->name('admin.ticket');
Route::post('/close_ticket/{ticket_id}', [TicketsController::class, 'close'])->name('admin.close');
});

Route::group(['prefix' =>'users'], function(){

    Route::controller(UsersController::class)->group(function () {
        // Create Controller group

        Route::get('/', 'index')->name('users.index');
        Route::patch('/{id}/update-role', 'updateRole')->name('users.update.role');
        Route::get('/{id}/change-status', 'changeStatus')->name('users.change.status');
        Route::get('/{id}', 'destroy')->name('users.destroy');
        Route::post('/bulk-actions', 'bulkActions')->name('users.bulk.actions');
        Route::get('/{id}/edit', 'edit')->name('users.edit');
        Route::put('/{id}', 'update')->name('users.update');
});
});

Route::get('/data-operation', [DataOperationController::class, 'index'])->name('dataOpration.index');
Route::get('/user-excel-download', [DataOperationController::class, 'get_user_data'])->name('users.excel');
Route::get('/user-pdf-download', [DataOperationController::class, 'createPDF'])->name('users.pdf');
});
Route::post('/stripe-payment', [StripeController::class, 'handlePost'])->name('stripe.payment');
Route::get('/stripe-payment', [StripeController::class, 'handleGet'])->name('stripe');
Route::get('/stripe-paymentlist', [StripeController::class, 'listOfPayments'])->name('stripe.list');

Route::get('/new-ticket', [TicketsController::class, 'create'])->name('create.ticket');
Route::post('/new-ticket', [TicketsController::class, 'store'])->name('store.ticket');
Route::get('/tickets/{ticket_id}', [TicketsController::class, 'show'])->name('get.ticket');
Route::post('/my_tickets', [TicketsController::class, 'userTickets'])->name('user.ticket');
Route::post('/comment', [CommentsController::class, 'postComment'])->name('post.comment');

Route::get('auth/google', [GoogleSocialiteController::class, 'redirectToGoogle']);
Route::get('callback/google', [GoogleSocialiteController::class, 'handleCallback']);
