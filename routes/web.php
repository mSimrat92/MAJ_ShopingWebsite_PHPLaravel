<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get( '/', 'Account\AccountController@login' )->name( "login" );

Route::group( ['prefix' => 'account'], function () {
    Route::get( 'login', [
        'uses' => 'Account\AccountController@login',
        'as' => 'login'
    ] );

    Route::post( 'login', [
        'uses' => 'Account\AccountController@postLogin',
        'as' => 'login'
    ] );

    Route::get( 'register', [
        'uses' => 'Account\AccountController@register',
        'as' => 'register'
    ] );

    Route::post( 'register', [
        'uses' => 'Account\AccountController@postLogin',
        'as' => 'register'
    ] );
} );

Route::group( ['prefix' => 'home'], function () {
    Route::get( '/', [
        'uses' => 'Home\HomeController@index',
        'as' => 'dashboard'
    ] );
} );

Route::group( ['prefix' => 'profile/supplier'], function () {
    Route::get( '/', [
        'uses' => 'Entity\SupplierController@index',
        'as' => 'supplier'
    ] );

    Route::get( 'edit/{id}', [
        'uses' => 'Entity\SupplierController@edit',
        'as' => 'supplier.edit'
    ] );

    Route::post( 'edit', [
        'uses' => 'Entity\SupplierController@post_edit',
        'as' => 'supplier.edit.post'
    ] );
} );

Route::group( ['prefix' => 'profile/client'], function () {
    Route::get( '/', [
        'uses' => 'Entity\ClientController@index',
        'as' => 'client'
    ] );

    Route::get( 'edit/{id}', [
        'uses' => 'Entity\ClientController@edit',
        'as' => 'client.edit'
    ] );

    Route::post( 'edit', [
        'uses' => 'Entity\ClientController@post_edit',
        'as' => 'client.edit.post'
    ] );
} );

Route::group( ['prefix' => 'category'], function () {
    Route::get( '/', [
        'uses' => 'Product\CategoryController@index',
        'as' => 'category'
    ] );

    Route::get( 'create', [
        'uses' => 'Product\CategoryController@create',
        'as' => 'category.create'
    ] );

    Route::post( 'create', [
        'uses' => 'Product\CategoryController@post_create',
        'as' => 'category.create.post'
    ] );

    Route::get( 'edit/{id}', [
        'uses' => 'Product\CategoryController@edit',
        'as' => 'category.edit'
    ] );

    Route::post( 'edit', [
        'uses' => 'Product\CategoryController@post_edit',
        'as' => 'category.edit.post'
    ] );

    Route::get( 'delete/{id}', [
        'uses' => 'Product\CategoryController@delete',
        'as' => 'category.delete'
    ] );

    Route::post( 'delete', [
        'uses' => 'Product\CategoryController@post_delete',
        'as' => 'category.delete.post'
    ] );
} );


Route::group( ['prefix' => 'subcategory'], function () {
    Route::get( '/', [
        'uses' => 'Product\SubCategoryController@index',
        'as' => 'subcategory'
    ] );

    Route::get( 'create', [
        'uses' => 'Product\SubCategoryController@create',
        'as' => 'subcategory.create'
    ] );

    Route::post( 'create', [
        'uses' => 'Product\SubCategoryController@post_create',
        'as' => 'subcategory.create.post'
    ] );

    Route::get( 'edit/{id}', [
        'uses' => 'Product\SubCategoryController@edit',
        'as' => 'subcategory.edit'
    ] );

    Route::post( 'edit', [
        'uses' => 'Product\SubCategoryController@post_edit',
        'as' => 'subcategory.edit.post'
    ] );

    Route::get( 'delete/{id}', [
        'uses' => 'Product\SubCategoryController@delete',
        'as' => 'subcategory.delete'
    ] );

    Route::post( 'delete', [
        'uses' => 'Product\SubCategoryController@post_delete',
        'as' => 'subcategory.delete.post'
    ] );
} );

Route::group( ['prefix' => 'brand'], function () {
    Route::get( '/', [
        'uses' => 'Product\BrandController@index',
        'as' => 'brand'
    ] );

    Route::get( 'create', [
        'uses' => 'Product\BrandController@create',
        'as' => 'brand.create'
    ] );

    Route::post( 'create', [
        'uses' => 'Product\BrandController@post_create',
        'as' => 'brand.create.post'
    ] );

    Route::get( 'edit/{id}', [
        'uses' => 'Product\BrandController@edit',
        'as' => 'brand.edit'
    ] );

    Route::post( 'edit', [
        'uses' => 'Product\BrandController@post_edit',
        'as' => 'brand.edit.post'
    ] );

    Route::get( 'delete/{id}', [
        'uses' => 'Product\BrandController@delete',
        'as' => 'brand.delete'
    ] );

    Route::post( 'delete', [
        'uses' => 'Product\BrandController@post_delete',
        'as' => 'brand.delete.post'
    ] );
} );


Route::group( ['prefix' => 'product'], function () {
    Route::get( '/', [
        'uses' => 'Product\ItemController@index',
        'as' => 'product'
    ] );

    Route::get( 'create', [
        'uses' => 'Product\ItemController@create',
        'as' => 'product.create'
    ] );

    Route::post( 'create', [
        'uses' => 'Product\ItemController@post_create',
        'as' => 'product.create.post'
    ] );

    Route::get( 'edit/{id}', [
        'uses' => 'Product\ItemController@edit',
        'as' => 'product.edit'
    ] );

    Route::post( 'edit', [
        'uses' => 'Product\ItemController@post_edit',
        'as' => 'product.edit.post'
    ] );

    Route::get( 'delete/{id}', [
        'uses' => 'Product\ItemController@delete',
        'as' => 'product.delete'
    ] );

    Route::post( 'delete', [
        'uses' => 'Product\ItemController@post_delete',
        'as' => 'product.delete.post'
    ] );
} );


Route::group( ['prefix' => 'status'], function () {
    Route::get( '/', [
        'uses' => 'Order\StatusController@index',
        'as' => 'status'
    ] );

    Route::get( 'create', [
        'uses' => 'Order\StatusController@create',
        'as' => 'status.create'
    ] );

    Route::post( 'create', [
        'uses' => 'Order\StatusController@post_create',
        'as' => 'status.create.post'
    ] );

    Route::get( 'edit/{id}', [
        'uses' => 'Order\StatusController@edit',
        'as' => 'status.edit'
    ] );

    Route::post( 'edit', [
        'uses' => 'Order\StatusController@post_edit',
        'as' => 'status.edit.post'
    ] );

    Route::get( 'delete/{id}', [
        'uses' => 'Order\StatusController@delete',
        'as' => 'status.delete'
    ] );

    Route::post( 'delete', [
        'uses' => 'Order\StatusController@post_delete',
        'as' => 'status.delete.post'
    ] );
} );

Route::group( ['prefix' => 'orders'], function () {
    Route::get( '/', [
        'uses' => 'Order\OrderController@index',
        'as' => 'orders'
    ] );

    Route::get( 'edit/{id}', [
        'uses' => 'Order\OrderController@edit',
        'as' => 'orders.edit'
    ] );

    Route::post( 'edit', [
        'uses' => 'Order\OrderController@post_edit',
        'as' => 'orders.edit.post'
    ] );

    Route::get( 'detail/{id}', [
        'uses' => 'Order\OrderController@detail',
        'as' => 'orders.detail'
    ] );

    Route::get( 'detail/edit/{id}', [
        'uses' => 'Order\OrderDetailController@edit',
        'as' => 'orders.detail.edit'
    ] );

    Route::post( 'detail/edit', [
        'uses' => 'Order\OrderDetailController@post_edit',
        'as' => 'orders.detail.edit.post'
    ] );

    Route::get( 'invoice/{id}', [
        'uses' => 'Order\InvoiceController@invoice',
        'as' => 'orders.invoice'
    ] );

    Route::get( 'ship/{id}', [
        'uses' => 'Order\ShippingController@ship',
        'as' => 'orders.ship'
    ] );

    Route::post( 'ship', [
        'uses' => 'Order\ShippingController@post_ship',
        'as' => 'orders.ship.post'
    ] );
} );