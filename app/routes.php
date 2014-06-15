<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// =============================================
// HOME PAGE ===================================
// =============================================
Route::get('/', function()
{
	// we dont need to use Laravel Blade
	// we will return a PHP file that will hold all of our Angular content
	return View::make('index'); // will return app/views/index.php
});

// =============================================
// API ROUTES ==================================
// =============================================
Route::group(array('prefix' => 'api'), function() {

	// since we will be using this just for CRUD, we won't need create and edit
	// Angular will handle both of those forms
	// this ensures that a user can't access api/create or api/edit when there's nothing there
	Route::resource('jobs', 'JobController', 
		array('only' => array('index')));

	Route::resource('job', 'JobController', 
		array('only' => array('store', 'show', 'update', 'destroy')));

	Route::resource('clients', 'ClientController', 
		array('only' => array('index')));

	Route::resource('creativepartners', 'CreativePartnerController', 
		array('only' => array('index')));

	Route::resource('agencyproducers', 'AgencyProducerController', 
		array('only' => array('index')));

	Route::resource('agencydirectors', 'AgencyDirectorController', 
		array('only' => array('index')));


});

// =============================================
// CATCH ALL ROUTE =============================
// =============================================
// all routes that are not home or api will be redirected to the frontend
// this allows angular to route them
App::missing(function($exception)
{
	return View::make('index');
});