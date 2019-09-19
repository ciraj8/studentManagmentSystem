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

Route::get('/', function () {
    return view('welcome');
});



Route::group(['middleware' => 'auth'], function (){

    Route::get('dashboard',              [ 'as'=>'dashboard',            'uses' => 'DashboardController@index']);
    Route::get('colleges',              [ 'as'=>'colleges',            'uses' => 'DashboardController@index']);

    Route::get('admindocuments',                   [ 'as'=>'admindocuments',                 'uses' => 'DocumentController@index1']);

   
   


    Route::get('documents',                   [ 'as'=>'documents',                 'uses' => 'DocumentController@index']);
    Route::get('documents/create',            [ 'as'=>'documents.create',          'uses' => 'DocumentController@create']);
    Route::post('documents/store',            [ 'as'=>'documents.store',           'uses' => 'DocumentController@store']);
    Route::get('documents/view/{id}',         [ 'as'=>'documents.view',            'uses' => 'DocumentController@view']);
    Route::get('documents/edit/{id}',         [ 'as'=>'documents.edit',            'uses' => 'DocumentController@edit']);
    Route::post('documents/update/{id}',      [ 'as'=>'documents.update',     'uses' => 'DocumentController@update']);
    Route::get('documents/delete/{id}',       [ 'as'=>'documents.delete',          'uses' => 'DocumentController@delete']);
    Route::get('documents/search',            [ 'as'=>'documents.search',      'uses' => 'DocumentController@search']);

    Route::get('adminmessage',                   [ 'as'=>'adminmessage',                 'uses' => 'MessageController@index']);
    Route::get('message/reply',            [ 'as'=>'message.reply',          'uses' => 'MessageController@replycreate']);
    Route::post('usermessage/store',            [ 'as'=>'usermessage.store',           'uses' => 'MessageController@replystore']);

    Route::get('message',                   [ 'as'=>'message',                 'uses' => 'MessageController@index']);
    Route::get('message/create',            [ 'as'=>'message.create',          'uses' => 'MessageController@create']);
    Route::post('message/store',            [ 'as'=>'message.store',           'uses' => 'MessageController@store']);
    Route::get('message/view/{id}',         [ 'as'=>'message.view',            'uses' => 'MessageController@view']);
    Route::get('message/edit/{id}',         [ 'as'=>'message.edit',            'uses' => 'MessageController@edit']);
    Route::post('message/update/{id}',      [ 'as'=>'message.update',     'uses' => 'MessageController@update']);
    Route::get('message/delete/{id}',       [ 'as'=>'message.delete',          'uses' => 'MessageController@delete']);
    Route::get('message/search',            [ 'as'=>'message.search',      'uses' => 'MessageController@search']);
   

    Route::get('courses',                   [ 'as'=>'courses',                 'uses' => 'CourseController@index']);
    Route::get('courses/create',            [ 'as'=>'courses.create',          'uses' => 'CourseController@create']);
    Route::post('courses/store',            [ 'as'=>'courses.store',           'uses' => 'CourseController@store']);
    Route::get('courses/view/{id}',         [ 'as'=>'courses.view',            'uses' => 'CourseController@view']);
    Route::get('courses/edit/{id}',         [ 'as'=>'courses.edit',            'uses' => 'CourseController@edit']);
    Route::post('courses/update/{id}',      [ 'as'=>'courses.update',     'uses' => 'CourseController@update']);
    Route::get('courses/delete/{id}',       [ 'as'=>'courses.delete',          'uses' => 'CourseController@delete']);
    Route::get('courses/search',            [ 'as'=>'courses.search',      'uses' => 'CourseController@search']);

    Route::get('campuses',                   [ 'as'=>'campuses',                 'uses' => 'CampusController@index']);
    Route::get('campuses/create',            [ 'as'=>'campuses.create',          'uses' => 'CampusController@create']);
    Route::post('campuses/store',            [ 'as'=>'campuses.store',           'uses' => 'CampusController@store']);
    Route::get('campuses/view/{id}',         [ 'as'=>'campuses.view',            'uses' => 'CampusController@view']);
    Route::get('campuses/edit/{id}',         [ 'as'=>'campuses.edit',            'uses' => 'CampusController@edit']);
    Route::post('campuses/update/{id}',      [ 'as'=>'campuses.update',     'uses' => 'CampusController@update']);
    Route::get('campuses/delete/{id}',       [ 'as'=>'campuses.delete',          'uses' => 'CampusController@delete']);
    Route::get('campuses/search',            [ 'as'=>'campuses.search',      'uses' => 'CampusController@search']);

    Route::get('user',                   [ 'as'=>'user',                 'uses' => 'UserController@index']);
    Route::get('user/create',            [ 'as'=>'user.create',          'uses' => 'UserController@create']);
    Route::post('user/store',            [ 'as'=>'user.store',           'uses' => 'UserController@store']);
    Route::get('user/view/{id}',         [ 'as'=>'user.view',            'uses' => 'UserController@view']);
    Route::get('user/edit/{id}',         [ 'as'=>'user.edit',            'uses' => 'UserController@edit']);
    Route::post('user/update/{id}',      [ 'as'=>'user.update',     'uses' => 'UserController@update']);
    Route::get('user/delete/{id}',       [ 'as'=>'user.delete',          'uses' => 'UserController@delete']);
    Route::get('user/search',            [ 'as'=>'user.search',      'uses' => 'UserController@search']);

    Route::get('user',                   [ 'as'=>'user',                 'uses' => 'UserController@index']);
    Route::get('user/create',            [ 'as'=>'user.create',          'uses' => 'UserController@create']);
    Route::post('user/store',            [ 'as'=>'user.store',           'uses' => 'UserController@store']);
    Route::get('user/view/{id}',         [ 'as'=>'user.view',            'uses' => 'UserController@view']);
    Route::get('user/edit/{id}',         [ 'as'=>'user.edit',            'uses' => 'UserController@edit']);
    Route::post('user/update/{id}',      [ 'as'=>'user.update',     'uses' => 'UserController@update']);
    Route::get('user/delete/{id}',       [ 'as'=>'user.delete',          'uses' => 'UserController@delete']);
    Route::get('user/search',            [ 'as'=>'user.search',      'uses' => 'UserController@search']);

    

    Route::get('profile',                   [ 'as'=>'profile',                   'uses' => 'ProfileController@index']);
    Route::get('change-password',           [ 'as'=>'change.password',           'uses' => 'ProfileController@changePassword']);

    Route::match(['get','match'],        'update-password',           [ 'as'=>'update.password',           'uses' => 'ProfileController@updatePassword']);

  
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');




