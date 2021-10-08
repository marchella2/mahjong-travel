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
Route::get('/detail', 'DetailController@index')->name('detail');
Route::get('/checkout', 'CheckoutController@index')->name('checkout');
Route::get('/checkout/success', 'CheckoutController@success')->name('checkout-success');

Route::prefix('admin')->namespace('Admin')->middleware(['auth', 'admin'])->group(function() {
    Route::get('/', 'DashboardController@index')->name('dashboard');

    // CRUD Travel Package
    Route::resource('travel-package', 'TravelPackageController');
    // CRUD Gallery
    Route::resource('gallery', 'GalleryController');
    // CRUD Transaction
    Route::resource('transaction', 'TransactionController');

    // Soft Deletes CRUD Travel Package
    Route::get('/trash', 'TravelPackageController@travel')->name('travel-package.trash');
    Route::get('/restore/{id}', 'TravelPackageController@restoretravel')->name('travel-package.restore');
    Route::get('/restore_all', 'TravelPackageController@restore_alltravel')->name('travel-package.restoreall');
    Route::get('/delete/{id}', 'TravelPackageController@deletetravel')->name('travel-package.delete');
    Route::get('/delete_all', 'TravelPackageController@delete_alltravel')->name('travel-package.deleteall');

    //Soft Deletes CRUD Gallery
    Route::get('/galleries/trash', 'GalleryController@gallery')->name('gallery.trash');
    Route::get('/galleries/restore/{id}', 'GalleryController@restoregallery')->name('gallery.restore');
    Route::get('/galleries/restore_all', 'GalleryController@restore_allgallery')->name('gallery.restoreall');
    Route::get('/galleries/delete/{id}', 'GalleryController@deletegallery')->name('gallery.delete');
    Route::get('/galleries/delete_all', 'GalleryController@delete_allgallery')->name('gallery.deleteall');

    // Soft Deletes Transaction
    Route::get('/transaction/trash', 'TransactionController@transaction')->name('transaction.trash');
    Route::get('/transaction/restore/{id}', 'Admin\TransactionController@restoretransaction')->name('transaction.restore');
    Route::get('/transaction/restore_all', 'Admin\TransactionController@restore_alltransaction')->name('transaction.restoreall');
    Route::get('/transaction/delete/{id}', 'Admin\TransactionController@deletetransaction')->name('transaction.delete');
    Route::get('/transaction/delete_all', 'Admin\TransactionController@delete_alltransaction')->name('transaction.deleteall');
});
