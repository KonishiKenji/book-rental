<?php

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
// ======================================================================
// For LibraryController
// Route::get('/libraryHome', 'LibraryController@index');
// Route::get('/libraryBorrowingList', 'LibraryController@borrowingList');
// Route::get('/libraryBorrowHistory', 'LibraryController@borrowHistory');

// ======================================================================
// For BooksController - Rent_logsController
// Route::get('/libraryHome', 'BooksController@index');
// Route::get('/libraryBorrowingList', 'BooksController@borrowingList');
// Route::get('/libraryBookSignUp', 'BooksController@bookSignUp');
Route::post('library/bookRegister', 'BooksController@bookRegister');
// Route::get('/libraryBookEdit/{id}', 'BooksController@bookEdit');
Route::post('library/bookUpdate', 'BooksController@bookUpdate');
Route::post('library/bookDelete/{id}', 'BooksController@bookDelete');

// Route::get('/libraryBorrowHistory', 'Rent_logsController@index');

// ======================================================================

// Route::get('/', function () {
//   // return view('welcome');
// });

Route::get('/', 'LoginController@index');

Route::post('/library/bookBorrow', 'BooksController@bookBorrow');
Route::post('/library/bookReturn', 'BooksController@bookReturn');

// Auth::routes();
// Email Verification機能を使えるようにするため下記に変更
Auth::routes(['verify' => true]);

// Route::middleware('verified')->group(function() {
    // 本登録ユーザーだけ表示できるページ
    // For BooksController - Rent_logsController
    Route::get('/libraryHome', 'BooksController@index');
    Route::get('/libraryBorrowingList', 'BooksController@borrowingList');
    Route::get('/libraryBookSignUp', 'BooksController@bookSignUp');
    // Route::post('library/bookRegister', 'BooksController@bookRegister');
    Route::get('/libraryBookEdit/{id}', 'BooksController@bookEdit');
    // Route::post('library/bookUpdate', 'BooksController@bookUpdate');
    // Route::post('library/bookDelete/{id}', 'BooksController@bookDelete');

    Route::get('/libraryBorrowHistory', 'Rent_logsController@index');


// });


Route::get('/home', 'HomeController@index')->name('home');
