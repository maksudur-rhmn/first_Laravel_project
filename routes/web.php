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
  // FrontendController
Route::get('/', 'FrontendController@index');
Route::get('/about', 'FrontendController@about')->middleware('verified');
Route::get('/contact', 'FrontendController@contact')->middleware('verified');
// FrontendController END

// FaqController END
  Route::get('/faq', 'FaqController@addfaq')->name('add_faq')->middleware('verified');
  Route::post('/faq_insert', 'FaqController@faq_insert')->name('faq_insert')->middleware('verified');
  Route::get('/faq/delete/{faq_id}', 'FaqController@faq_delete')->name('faq_delete')->middleware('verified');
  Route::get('/faq/edit/{faq_id}', 'FaqController@faq_edit')->name('faq_edit')->middleware('verified');
  Route::post('/faq/update', 'FaqController@faq_update')->name('faq_update')->middleware('verified');
  Route::get('/faq/restore/{faq_id}', 'FaqController@faq_restore')->name('faq_restore')->middleware('verified');
  Route::get('/faq/hDelete/{faq_id}', 'FaqController@faq_hardDelete')->name('faq_hardDelete')->middleware('verified');
// FaqController


// ProfileController

Route::get('/edit/profie', 'ProfileController@edit_profile')->name('edit_profile')->middleware('verified');
Route::post('/change/password', 'ProfileController@changePassword')->name('changePassword')->middleware('verified');
// END ProfileController



Auth::routes(['verify' => true]);

// HomeController
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
// HomeController END
