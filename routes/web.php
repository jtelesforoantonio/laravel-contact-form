<?php

/*
|--------------------------------------------------------------------------
| Routes
|--------------------------------------------------------------------------
|
| The routes for the contact form.
|
*/

Route::get('/contact', 'ContactController@showContactForm');
Route::post('/contact', 'ContactController@contact')->name('contact');
