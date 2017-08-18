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
    return view('auth.login');
})->middleware('guest');

// Rutas para pagina de usuarios

    Route::get('user/home', 'FrontController@index')->name('front.index');

    Route::get('categories/{name}','FrontController@searchCategory')->name('front.search.category');
    
    Route::get('tags/{name}','FrontController@searchTag')->name('front.search.tag');

    Route::get('articles/{slug}','FrontController@viewArticle')->name('front.view.article');

// Rutas para el panel de administración

Route::group(['prefix' => 'admin','middleware'=>'auth'], function() {

    Route::get('home',function(){
        return view('admin.index');
    })->name('admin.home');
    
    
    Route::group(['middleware' => 'admin'],function(){
        Route::resource('users', 'UserController');
        Route::get('users/{id}/destroy',[
            'uses'  =>  'UserController@destroy',
            'as'    =>  'admin.users.destroy'
            ]);

    });
    

    Route::resource('categories', 'CategoriesController');
    Route::get('categories/{id}/destroy',[
    	'uses'	=>	'CategoriesController@destroy',
    	'as'	=>	'admin.categories.destroy'
    	]);

    Route::resource('tags', 'TagsController');
    Route::get('tags/{id}/destroy',[
        'uses'  =>  'TagsController@destroy',
        'as'    =>  'admin.tags.destroy'
        ]);
    Route::resource('articles', 'ArticlesController');
    Route::get('articles/{id}/destroy',[
        'uses'  =>  'ArticlesController@destroy',
        'as'    =>  'admin.articles.destroy'
        ]);

    Route::get('images','ImagesController@index')->name('images.index');

});

 // Authentication Routes...
        Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
        Route::post('login', 'Auth\LoginController@login');
        Route::post('logout', 'Auth\LoginController@logout')->name('logout');

        // Registration Routes...
        Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
        Route::post('register', 'Auth\RegisterController@register');

        // Password Reset Routes...
        Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('password/reset', 'Auth\ResetPasswordController@reset');


