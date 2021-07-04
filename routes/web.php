<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\InitialInvoiceController;

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


Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [HomeController::class , 'index']);
});

Route::group(['prefix' => 'stores',  'middleware' => 'auth'], function () {
    Route::get('/', [DashboardController::class , 'index'])->name('dashboard.stores.index');
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('vendors', VendorController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('stores', StoreController::class);
    Route::resource('units', UnitController::class);
    Route::resource('taxes', TaxController::class);
    Route::resource('items', ItemController::class);
    Route::resource('initials', InitialInvoiceController::class);
    Route::resource('invoices', InvoiceController::class);
    Route::resource('bills', BillController::class);
    Route::resource('methods', PaymentMethodController::class);
    Route::resource('payments', PaymentController::class);
    Route::resource('settings', SettingController::class);
    Route::post('profile', [UserController::class, 'profile'])->name('profile');


    // custome route 
    Route::get('store/items/{id}', [HomeController::class, 'storeItems']);
    Route::get('item/units/{id}', [HomeController::class, 'units']);
    Route::put('prices/update', [StoreController::class, 'updatePrices'])->name('prices.update'); 
});


Auth::routes();

