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

Route::get('/', 'HomeController@index');

Route::resource('listing', 'ListingController');
Route::post('listing/showListings', 'ListingController@showListings')->name('listing.showListings');

Route::get('careers', 'CareersController@index')->name('careers');

Route::resource('careers/apply', 'ApplicantController');

Route::resource('contact', 'ContactController');