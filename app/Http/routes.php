<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', function() {
    return redirect('home');
});
Route::post('savephd', 'SaveController@savephd');
Route::post('savems', 'SaveController@savems');
Route::post('save2phd', 'SaveController@save2phd');
Route::post('save2ms', 'SaveController@save2ms');
Route::get('fetch/{phdorms}/{applNo}/{dob}', 'SaveController@fetch');
Route::post('admin/auth', 'AdminController@login');
Route::post('admin/change', 'AdminController@change');
Route::get('admin/ms/home', function () {
    return view('admin.all.ms.dept');
});
Route::get('admin/phd/home', function () {
    return view('admin.all.phd.dept');
});

Route::group(['middleware' => 'adminauth'], function () {
    Route::get('admin/home', function()
        {
            return view('admin.home');
        });
    Route::get('admin/{phdormsc}', 'AdminController@adminView');
    Route::get('admit/{phdormsc}/{regNo}/{dept}', 'AdminController@admitCard');
    Route::get('admin/{phdormsc}/{dept}', 'AdminController@adminall');
    Route::post('delete', 'AdminController@deleted' );
    Route::post('accept', 'AdminController@accepted');
    Route::get('logout', 'AdminController@logout');
});
Route::get('print/{phdormsc}/{regNo}', 'AdminController@printer' );

Route::post('phdvalidate', 'PhdController@validated');
Route::post('msvalidate', 'MsController@validated');
Route::post('application', 'ApplicationController@view');
Route::get('view', function() {
    return view('view');
});
Route::get('error', function()
    {
        return view('error');
    });

Route::get('contact', function()
    {
        return view('contact');
    });

Route::get('adminlogin', function()
    {
        return view('admin.login');
    });

Route::get('home', function()
    {
        return view('home');
    });
Route::get('continue', function()
    {
        return view('savedForm');
    });
Route::get('phd', function()
    {
        return view('phdForm_1');
    });
Route::get('ms', function()
    {
        return view('msForm_1');
    });
Route::get('msinstructions', function()
    {
        return view('msinstructions');
    });
Route::get('phdinstructions', function()
    {
        return view('phdinstructions');
    });
Route::get('change', function()
    {
        return view('admin.change');
    });
Route::get('phdpreview', function()
    {
        return view('saved.phd_preview');
    });
Route::get('mspreview', function()
    {
        return view('saved.ms_preview');
    });
Route::get('mspreview1', function()
    {
        return view('saved.ms_preview');
    });

Route::get('phdpreview1', function()
    {
        return view('admin.phd_preview');
    });