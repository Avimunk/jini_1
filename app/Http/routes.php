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

Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');
Route::get('about', 'PagesController@about');
Route::get('contact', 'PagesController@contact');

Route::get('categories/', 'CategoryController@getCategories');
Route::get('categories/{id}', 'CategoryController@getCategories');
Route::get('categories/{id}/content', 'CategoryController@getCategoryContent');
Route::get('categories/{id}/objects', 'CategoryController@getCategoryObjects');

Route::get('objects/search', 'ObjectController@getSearch');
Route::get('objects/map', 'ObjectController@getMap');
Route::get('objects/locations', 'ObjectController@getLocations');

Route::pattern('id', '[0-9]+');
Route::get('news/{id}', 'ArticlesController@show');
Route::get('video/{id}', 'VideoController@show');
Route::get('photo/{id}', 'PhotoController@show');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'namespace' => 'Admin'], function() {
    Route::pattern('id', '[0-9]+');
    Route::pattern('id2', '[0-9]+');

    # Admin Dashboard
    Route::get('dashboard', 'DashboardController@index');

    # Language
    Route::get('language', 'LanguageController@index');
    Route::get('language/create', 'LanguageController@getCreate');
    Route::post('language/create', 'LanguageController@postCreate');
    Route::get('language/{id}/edit', 'LanguageController@getEdit');
    Route::post('language/{id}/edit', 'LanguageController@postEdit');
    Route::get('language/{id}/delete', 'LanguageController@getDelete');
    Route::post('language/{id}/delete', 'LanguageController@postDelete');
    Route::get('language/data', 'LanguageController@data');
    Route::get('language/reorder', 'LanguageController@getReorder');

    # News category
    Route::get('newscategory', 'ArticleCategoriesController@index');
    Route::get('newscategory/create', 'ArticleCategoriesController@getCreate');
    Route::post('newscategory/create', 'ArticleCategoriesController@postCreate');
    Route::get('newscategory/{id}/edit', 'ArticleCategoriesController@getEdit');
    Route::post('newscategory/{id}/edit', 'ArticleCategoriesController@postEdit');
    Route::get('newscategory/{id}/delete', 'ArticleCategoriesController@getDelete');
    Route::post('newscategory/{id}/delete', 'ArticleCategoriesController@postDelete');
    Route::get('newscategory/data', 'ArticleCategoriesController@data');
    Route::get('newscategory/reorder', 'ArticleCategoriesController@getReorder');

    # News
    Route::get('news', 'ArticlesController@index');
    Route::get('news/create', 'ArticlesController@getCreate');
    Route::post('news/create', 'ArticlesController@postCreate');
    Route::get('news/{id}/edit', 'ArticlesController@getEdit');
    Route::post('news/{id}/edit', 'ArticlesController@postEdit');
    Route::get('news/{id}/delete', 'ArticlesController@getDelete');
    Route::post('news/{id}/delete', 'ArticlesController@postDelete');
    Route::get('news/data', 'ArticlesController@data');
    Route::get('news/reorder', 'ArticlesController@getReorder');

    # Photo Album
    Route::get('photoalbum', 'PhotoAlbumController@index');
    Route::get('photoalbum/create', 'PhotoAlbumController@getCreate');
    Route::post('photoalbum/create', 'PhotoAlbumController@postCreate');
    Route::get('photoalbum/{id}/edit', 'PhotoAlbumController@getEdit');
    Route::post('photoalbum/{id}/edit', 'PhotoAlbumController@postEdit');
    Route::get('photoalbum/{id}/delete', 'PhotoAlbumController@getDelete');
    Route::post('photoalbum/{id}/delete', 'PhotoAlbumController@postDelete');
    Route::get('photoalbum/data', 'PhotoAlbumController@data');
    Route::get('photoalbum/reorder', 'PhotoAlbumController@getReorder');

    # Photo
    Route::get('photo', 'PhotoController@index');
    Route::get('photo/create', 'PhotoController@getCreate');
    Route::post('photo/create', 'PhotoController@postCreate');
    Route::get('photo/{id}/edit', 'PhotoController@getEdit');
    Route::post('photo/{id}/edit', 'PhotoController@postEdit');
    Route::get('photo/{id}/delete', 'PhotoController@getDelete');
    Route::post('photo/{id}/delete', 'PhotoController@postDelete');
    Route::get('photo/{id}/itemsforalbum', 'PhotoController@itemsForAlbum');
    Route::get('photo/{id}/{id2}/slider', 'PhotoController@getSlider');
    Route::get('photo/{id}/{id2}/albumcover', 'PhotoController@getAlbumCover');
    Route::get('photo/data/{id}', 'PhotoController@data');
    Route::get('photo/reorder', 'PhotoController@getReorder');

    # Video
    Route::get('videoalbum', 'VideoAlbumController@index');
    Route::get('videoalbum/create', 'VideoAlbumController@getCreate');
    Route::post('videoalbum/create', 'VideoAlbumController@postCreate');
    Route::get('videoalbum/{id}/edit', 'VideoAlbumController@getEdit');
    Route::post('videoalbum/{id}/edit', 'VideoAlbumController@postEdit');
    Route::get('videoalbum/{id}/delete', 'VideoAlbumController@getDelete');
    Route::post('videoalbum/{id}/delete', 'VideoAlbumController@postDelete');
    Route::get('videoalbum/data', 'VideoAlbumController@data');
    Route::get('video/reorder', 'VideoAlbumController@getReorder');

    # Video
    Route::get('video', 'VideoController@index');
    Route::get('video/create', 'VideoController@getCreate');
    Route::post('video/create', 'VideoController@postCreate');
    Route::get('video/{id}/edit', 'VideoController@getEdit');
    Route::post('video/{id}/edit', 'VideoController@postEdit');
    Route::get('video/{id}/delete', 'VideoController@getDelete');
    Route::post('video/{id}/delete', 'VideoController@postDelete');
    Route::get('video/{id}/itemsforalbum', 'VideoController@itemsForAlbum');
    Route::get('video/{id}/{id2}/albumcover', 'VideoController@getAlbumCover');
    Route::get('video/data/{id}', 'VideoController@data');
    Route::get('video/reorder', 'VideoController@getReorder');

    # Users
    Route::get('users/', 'UserController@index');
    Route::get('users/create', 'UserController@getCreate');
    Route::post('users/create', 'UserController@postCreate');
    Route::get('users/{id}/edit', 'UserController@getEdit');
    Route::post('users/{id}/edit', 'UserController@postEdit');
    Route::get('users/{id}/delete', 'UserController@getDelete');
    Route::post('users/{id}/delete', 'UserController@postDelete');
    Route::get('users/data', 'UserController@data');

    # Object Types
    Route::get('object-types/', 'ObjectTypesController@index');
    Route::post('object-types/', 'ObjectTypesController@index');
    Route::get('object-types/create', 'ObjectTypesController@getCreate');
    Route::post('object-types/create', 'ObjectTypesController@postCreate');
    Route::get('object-types/{id}/edit', 'ObjectTypesController@getEdit');
    Route::post('object-types/{id}/edit', 'ObjectTypesController@postEdit');
    Route::post('object-types/{id}/categories', 'ObjectTypesController@postCategory');
    Route::get('object-types/{id}/delete', 'ObjectTypesController@getDelete');
    Route::post('object-types/{id}/delete', 'ObjectTypesController@postDelete');
    Route::get('object-types/data', 'ObjectTypesController@data');
    Route::get('object-types/{id}/export', 'ObjectTypesController@getExport');

    Route::get('object-types/{id}/fields', 'ObjectTypesController@getFields');
    Route::get('object-types/fields/{id}/delete', 'ObjectTypesController@deleteField');

    Route::get('object-types/{id}/categories', 'ObjectTypesController@getCategories');

    # Objects
    Route::get('objects/', 'ObjectController@index');
    Route::post('objects/', 'ObjectController@postIndex');
    Route::get('objects/create', 'ObjectController@getCreate');
    Route::post('objects/create', 'ObjectController@postCreate');
    Route::get('objects/{id}/edit', 'ObjectController@getEdit');
    Route::post('objects/{id}/edit', 'ObjectController@postEdit');
    Route::get('objects/{id}/delete', 'ObjectController@getDelete');
    Route::post('objects/{id}/delete', 'ObjectController@postDelete');
    Route::get('objects/data', 'ObjectController@data');

    Route::post('objects/import', 'ObjectController@postImport');

    Route::get('objects/{id}/fields', 'ObjectsController@getFields');
    
    # Categories
    Route::get('categories/', 'CategoryController@index');
    Route::get('categories/create', 'CategoryController@getCreate');
    Route::post('categories/create', 'CategoryController@postCreate');
    Route::get('categories/{id}/edit', 'CategoryController@getEdit');
    Route::post('categories/{id}/edit', 'CategoryController@postEdit');
    Route::get('categories/{id}/delete', 'CategoryController@getDelete');
    Route::post('categories/{id}/delete', 'CategoryController@postDelete');
    Route::get('categories/data', 'CategoryController@data');
    Route::get('categories/search', 'CategoryController@getSearch');
});
