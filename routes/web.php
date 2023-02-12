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

//Route::get('/', function () {
//    return view('welcome');
//});
//Route::get('/', 'WelcomeController@index');
//Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');


Route::get('/', 'WelcomeController@index');
Route::get('/categoryView/{id}', 'WelcomeController@category');
Route::get('/contact', 'WelcomeController@contact');
Route::get('/product-details', 'WelcomeController@productDetails');
Route::get('/product-details/{id}', 'WelcomeController@productDetails');
//
//Route::get('/showCart', 'CartController@cartDetails');
//Route::get('/delete/{id}', 'CartController@deleteCartProduct');

//Route::get('/cart/add', 'CartController@addToCart');
Route::get('/cart/add/{id}', 'CartController@addToCart');
Route::get('/cart/show', 'CartController@showCart');
Route::get('/cart/delete/{id}', 'CartController@deleteCartProduct');

Route::get('/checkout', 'checkoutController@index');

Route::post('/checkout/sign-up', 'checkoutController@customerRegistration');
Route::get('/checkout/shipping', 'checkoutController@showShippingForm');
Route::post('/checkout/save-shipping', 'checkoutController@saveShippingInfo');
Route::get('/checkout/payment', 'checkoutController@showPaymentForm');
Route::post('/checkout/save-order', 'checkoutController@saveOrderInfo');
Route::get('/checkout/my-home', 'checkoutController@customerHome');

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('home');

Route::group(['middleware' => 'AuthenticateMiddleware'], function () {
    /* Category info */
    Route::get('/category/add', 'CategoryController@createCategory');
    Route::post('/category/save', 'CategoryController@storeCategory');
    Route::get('/category/manage', 'CategoryController@manageCategory');
    Route::get('/category/edit/{id}', 'CategoryController@editCategory');
    Route::post('/category/update', 'CategoryController@updateCategory');
    Route::get('/category/delete/{id}', 'CategoryController@deleteCategory');
    /* Manufacturer info */
    Route::get('/manufacturer/add', 'ManufacturerController@createManufacturer');
    Route::post('/manufacturer/save', 'ManufacturerController@storeManufacturer');
    Route::get('/manufacturer/manage', 'ManufacturerController@manageManufacturer');
    Route::get('/manufacturer/edit/{id}', 'ManufacturerController@editManufacturer');
    Route::post('/manufacturer/update', 'ManufacturerController@updateManufacturer');
    Route::get('/manufacturer/delete/{id}', 'ManufacturerController@deleteManufacturer');
    /* Product info */
    Route::get('/product/add', 'ProductController@createProduct');
    Route::post('/product/save', 'ProductController@storeProduct');
    Route::get('/product/manage', 'ProductController@manageProduct');
    Route::get('/product/view/{id}', 'ProductController@viewProduct');
    Route::get('/product/edit/{id}', 'ProductController@editProduct');
    Route::post('/product/update', 'ProductController@updateProduct');
    Route::get('/product/delete/{id}', 'ProductController@deleteProduct');
    /* User */
    Route::get('/user/manage', 'UserController@manageUser');
    Route::get('/user/edit/{id}', 'UserController@editUser');
    Route::post('/user/update', 'UserController@updateUser');
    Route::get('/user/delete/{id}', 'UserController@deleteUser');
});
