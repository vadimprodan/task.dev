<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group and "admin" prefix.
|
*/

/**
 * Helper function for fast register template routes
 *
 * @param $name template name `foo_bar(s) => FooBarsController`
 */
function template($name) {
    $name_plural = str_plural($name);
    if ($name_plural == $name) $name = str_singular($name);

    $ctrl_name = str_replace('_', '', ucwords($name_plural, '_')).'Controller';

    Route::group(['prefix' => str_plural($name_plural)], function() use ($name_plural, $ctrl_name) {
        Route::get('/', "$ctrl_name@index")->name("admin.$name_plural");
        Route::get('add', "$ctrl_name@form")->name("admin.$name_plural.add");
        Route::get('edit/{id}', "$ctrl_name@form")->name("admin.$name_plural.edit");
    });
    Route::any("/$name/{id?}", "$ctrl_name@action")->name("admin.$name");
}

// Admin section
Route::group(['middleware' => 'auth'], function() {
    Route::get('/', 'MainController@index');
    // Templates
    template('students');
    template('instructors');
    template('classes');
    template('subjects');
    // Main
    Route::any('/profile', 'MainController@profile')->name('admin.profile');
});

Route::group(['namespace' => 'Auth'], function() {
    // Authentication Routes...
    Route::get('login', 'LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'LoginController@login');
    Route::get('logout', 'LoginController@logout')->name('admin.logout');
});
