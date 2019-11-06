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

Route::get('/schools', 'schools\SchoolsController@index')->name('schools');
Route::post('/school/store', 'schools\SchoolsController@store')->name('school-store');

Route::get('/books', 'books\BooksController@index')->name('books');
Route::post('/books/store', 'books\BooksController@store')->name('books-store');


Route::get('/students', 'students\StudentsController@index')->name('students');
Route::post('/students/store', 'students\StudentsController@store')->name('students-store');


Route::get('/activities', 'activities\ActivitiesController@index')->name('activities');
Route::post('/activities/store', 'activities\ActivitiesController@store')->name('activities-store');

Route::get('/transactions', 'transactions\TransactionsController@index')->name('transactions');
Route::post('/transactions/store', 'transactions\TransactionsController@store')->name('transactions-store');
Route::post('/requests/store', 'transactions\TransactionsController@storeRequests')->name('requests-store');


Route::get('/reports/most/requested', 'reports\ReportsController@mostRequested')->name('most-requested');
Route::get('/reports/sourced/{id}', 'reports\ReportsController@markAsSourced')->name('mark-as-sourced');
Route::get('/reports/book/requests', 'reports\ReportsController@bookRequests')->name('book-requests');
Route::get('/reports/activities/by/day', 'reports\ReportsController@activities_by_day')->name('activities_by_day');
Route::get('/reports/activities/by/month', 'reports\ReportsController@activities_by_month')->name('activities_by_month');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
