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

Route::group(
    [
        'prefix'     => 'admin/orders',
        'middleware' => ['web', 'has.admin.access'],
    ],
    function () {
        //------------------------------------------------
        Route::get( '/', 'DashboardController@index' )
            ->name( 'vh.admin.orders' );
        //------------------------------------------------
        Route::post( '/assets', 'OrderController@assets' )
            ->name( 'vh.admin.orders.assets' );
        //------------------------------------------------
        Route::post( '/customer/store', 'OrderController@storeCustomer' )
            ->name( 'vh.admin.orders.customer.store' );
        //------------------------------------------------
        Route::post( '/store', 'OrderController@store' )
            ->name( 'vh.admin.orders.store' );

        //------------------------------------------------
    });


Route::group(
    [
        'prefix'     => 'admin/orders/settings',
        'middleware' => ['web', 'has.admin.access'],
    ],
    function () {
        //------------------------------------------------
        Route::any( '/types', 'SettingController@getTypes' )
            ->name( 'vh.admin.orders.types' );
        //------------------------------------------------
        Route::any( '/general', 'SettingController@getGeneralSettings' )
            ->name( 'vh.admin.orders.general' );
        //------------------------------------------------
        Route::any( '/general/store', 'SettingController@storeGeneralSettings' )
            ->name( 'vh.admin.orders.general.store' );
        //------------------------------------------------
        Route::any( '/payment/gateways', 'SettingController@getPaymentGateways' )
            ->name( 'vh.admin.orders.payment.gateways' );
        //------------------------------------------------
        Route::any( '/payment/gateways/store', 'SettingController@storePaymentGateways' )
            ->name( 'vh.admin.orders.payment.gateways.store' );
        //------------------------------------------------
    });


