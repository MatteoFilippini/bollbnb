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

// Route::get('/', function () {
//     return view('guest.home');
// });

Auth::routes();

Route::middleware('auth'
)->prefix('admin')
->name('admin.')
->namespace('Admin')
->group(function() {
    Route::resource('flats', 'FlatController');
});
// home di quando SEI loggato
Route::get('/admin', 'Admin\HomeController@index')->name('admin.home');



// qualunque rotta non admin e non registrata |  '?' parametro opzionale
Route::get('{any?}', function () {
    //home di quando NON SEI loggato
    return view('guest.home');
})->where("any", ".*");
