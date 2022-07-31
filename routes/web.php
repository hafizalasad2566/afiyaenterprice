<?php

use App\Http\Controllers\Admin\AdminDashboard;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UserController;
// use App\Http\Controllers\Admin\CmsController;
use App\Http\Controllers\Admin\TransactionController;
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
Route::redirect('/','admin');
Route::redirect('admin','admin/login');

Route::group(['prefix' => 'admin', 'middleware'=> 'auth:sanctum'], function(){
    Route::get('profile',[ProfileController::class,'getProfile'])->name('admin.profile');
    Route::get('/dashboard',[AdminDashboard::class,'getDashboard'])->name('admin.dashboard');
    Route::resources([
        'users' => UserController::class,
        'transactions' => TransactionController::class,
    ]);
    Route::get('users/transaction/{user}', [TransactionController::class, 'userTransaction'])->name('user.transaction');
    Route::get('users/transaction-list/{user}', [TransactionController::class, 'userTransactionList'])->name('user.transaction.list');
    Route::get('download-bill', [UserController::class, 'download_bill'])->name('user.download.bill');
    // Route::resource('cms', CmsController::class)->only([
    //     'index', 'edit', 'update'
    // ]);
});

Route::get('clear', function () {
    Artisan::call('optimize:clear');
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('clear-compiled');
    return 'Cleared.';
});

Route::get('migrate-seed', function () {
    Artisan::call('migrate:refresh');
    Artisan::call('db:seed');
    return 'Migration And Seeding Done.';
});