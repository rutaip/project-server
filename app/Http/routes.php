<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/




/* Rutas de autenticación */


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');

    /*Ruta de paginas*/

    Route::get('/', 'DashboardsController@index');

    Route::post('search', 'SearchController@search');
    Route::resource('comments', 'CommentsController');
    Route::resource('tasks', 'TasksController');
    Route::post('projects/filter', 'ProjectsController@search');
    Route::resource('projects', 'ProjectsController');
    Route::resource('regions', 'RegionsController');
    Route::resource('partners', 'PartnersController');
    Route::resource('pms', 'PmsController');
    Route::resource('acds', 'AcdsController');
    Route::resource('customers', 'CustomersController');
    Route::get('roles/{id}/permissions', 'RolesController@permissions');
    Route::post('roles/role_permissions', 'RolesController@rolePermissions');
    Route::resource('users', 'UsersController');
    Route::resource('roles', 'RolesController');
    Route::resource('modules', 'ModulesController');
    Route::resource('permissions', 'PermissionsController');
    Route::resource('resources', 'ResourcesController');
    Route::resource('projectlicenses', 'ProjectLicensesController');
    Route::resource('integrations', 'IntegrationsController');
    Route::post('offerings/filter', 'OfferingsController@search');
    Route::resource('offerings', 'OfferingsController');

});
