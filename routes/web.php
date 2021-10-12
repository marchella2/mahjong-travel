<?php

use Illuminate\Support\Facades\Auth;
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


Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->name('home');
Route::get('/detail/{slug}', 'DetailController@index')->name('detail');

// Bagian Checkout
Route::post('/checkout/{id}', 'CheckoutController@process')->name('checkout_process')->middleware(['auth', 'verified']);
Route::get('/checkout/{id}', 'CheckoutController@index')->name('checkout')->middleware(['auth', 'verified']);
Route::post('/checkout/create/{detail_id}', 'CheckoutController@create')->name('checkout-create')->middleware(['auth', 'verified']);
Route::get('/checkout/remove/{detail_id}', 'CheckoutController@remove')->name('checkout-remove')->middleware(['auth', 'verified']);
Route::get('/checkout/confirm/{id}', 'CheckoutController@success')->name('checkout-success')->middleware(['auth', 'verified']);

// Role Admin
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function() {
    Route::get('/', 'HomeController@adminDashboard')->name('dashboard');

    // CRUD Travel Package
    Route::resource('travel-package', 'Admin\TravelPackageController');
    // CRUD Gallery
    Route::resource('gallery', 'Admin\GalleryController');
    // CRUD Transaction
    Route::resource('transaction', 'Admin\TransactionController');

    // Soft Deletes CRUD Travel Package
    Route::get('/trash', 'Admin\TravelPackageController@travel')->name('travel-package.trash');
    Route::get('/restore/{id}', 'Admin\TravelPackageController@restoretravel')->name('travel-package.restore');
    Route::get('/restore_all', 'Admin\TravelPackageController@restore_alltravel')->name('travel-package.restoreall');
    Route::get('/delete/{id}', 'Admin\TravelPackageController@deletetravel')->name('travel-package.delete');
    Route::get('/delete_all', 'Admin\TravelPackageController@delete_alltravel')->name('travel-package.deleteall');

    //Soft Deletes CRUD Gallery
    Route::get('/galleries/trash', 'Admin\GalleryController@gallery')->name('gallery.trash');
    Route::get('/galleries/restore/{id}', 'Admin\GalleryController@restoregallery')->name('gallery.restore');
    Route::get('/galleries/restore_all', 'Admin\GalleryController@restore_allgallery')->name('gallery.restoreall');
    Route::get('/galleries/delete/{id}', 'Admin\GalleryController@deletegallery')->name('gallery.delete');
    Route::get('/galleries/delete_all', 'Admin\GalleryController@delete_allgallery')->name('gallery.deleteall');

    // Soft Deletes Transaction
    Route::get('/trans/trash', 'Admin\TransactionController@transactionTrash')->name('transaction.trash');
    Route::get('/trans/restore/{id}', 'Admin\TransactionController@restoretransaction')->name('transaction.restore');
    Route::get('/trans/restore_all', 'Admin\TransactionController@restore_alltransaction')->name('transaction.restoreall');
    Route::get('/trans/delete/{id}', 'Admin\TransactionController@deletetransaction')->name('transaction.delete');
    Route::get('/trans/delete_all', 'Admin\TransactionController@delete_alltransaction')->name('transaction.deleteall');
});
