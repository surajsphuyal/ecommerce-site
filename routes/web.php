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


Route::get('/', 'WelcomeController@index')->name('/');

Route::get('/product_details/{product_details}' , 'ProductController@product_details');

Route::get('/products' , 'ProductController@products');

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', function (){
        return view('backend.index');
    })->name('backend.index');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/backend/category', 'CategoriesController',[
    'names' => [
        'create' => 'backend.category.create',
        'index' => 'backend.category.index',
        'store' => 'backend.category.store',
        'destroy' => 'backend.category.destroy',
        'edit' => 'backend.category.edit',
        'update' => 'backend.category.update',
    ]
]);

Route::resource('/backend/product', 'ProductController',[
    'names' => [
        'create' => 'backend.product.create',
        'index' => 'backend.product.index',
        'store' => 'backend.product.store',
        'destroy' => 'backend.product.destroy',
        'edit' => 'backend.product.edit',
        'update' => 'backend.product.update',
    ]
]);

Route::resource('/backend/user', 'UserController',[
    'names' => [

        'index' => 'backend.user.index',
        'store' => 'backend.user.store',
        'destroy' => 'backend.user.destroy',
        'edit' => 'backend.user.edit',
        'update' => 'backend.user.update',
    ]
]);

Route::resource('/checkout', 'CheckoutController',[
    'names' => [
        'create' => 'checkout.create',
        'index' => 'checkout.index',
        'store' => 'checkout.store',
        'destroy' => 'checkout.destroy',
        'edit' => 'checkout.edit',
        'update' => 'checkout.update',
    ]
]);

Route::get('/signout', 'WelcomeController@signout');
 
Route::get('/cart', 'WelcomeController@cart');
 
Route::get('/add-to-cart/{id}', 'WelcomeController@addToCart');

Route::patch('/update-cart', 'WelcomeController@update');
 
Route::delete('/remove-from-cart', 'WelcomeController@remove');
