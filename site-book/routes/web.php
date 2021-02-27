<?php

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

/*
Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
Route::get('/', 'MainController@index')->name('admin.index');
});
*/

//Route::get('/admin', 'Admin\MainController@index')->name('admin.index');

// https://laravel.demiart.ru/target-class-does-not-exist-in-laravel-8/







use App\Http\Controllers\Catalog2Controller;
Route::get('/', [ Catalog2Controller::class, 'index' ])->name('home');
Route::get('/book/{slug}', [ Catalog2Controller::class, 'show' ])->name('detail');




use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\GenreController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\CatalogController;


Route::group([  'middleware' => 'auth'], function () {

    Route::get('/admin', [ MainController::class, 'index' ])->name('admin.index');
    Route::resource('/admin/genres',  GenreController::class);
    Route::resource('/admin/authors',  AuthorController::class);
    Route::resource('/admin/catalogs',  CatalogController::class);

    Route::resource('/admin/catalogs',  CatalogController::class);

 //  переписать в будущем, выбирать авторов по api
 //   Route::get('/admin/catalogs/api1', [ AuthorController::class, 'getauthorapi1' ]);

});


use App\Http\Controllers\UserController;


Route::get('/register', [ UserController::class, 'create' ])->name('register.create');
Route::post('/register', [ UserController::class, 'store' ])->name('register.store');
Route::get('/login', [ UserController::class, 'loginForm' ])->name('login.create');
Route::post('/login', [ UserController::class, 'login' ])->name('login');


Route::get('/logout', [ UserController::class, 'logout' ])->name('logout');


