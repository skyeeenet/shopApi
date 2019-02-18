<?php

use Illuminate\Http\Request;

Route::group(['middleware' => ['api','cors']], function () {
    Route::post('auth/register', 'Auth\ApiRegisterController@register');
});

Route::group([

    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'Auth\AuthController@login');
    Route::post('logout', 'Auth\AuthController@logout');
    Route::post('refresh', 'Auth\AuthController@refresh');
    Route::post('me', 'Auth\AuthController@me');

});

Route::get('/products/sort/', 'ProductController@sort');
Route::apiResource('products', 'ProductController');

Route::group(['prefix'=>'products'], function (){

    Route::apiResource('/{product}/comments','CommentController');
});

Route::group(['prefix' => 'orders'], function () {

    //создание и удаление заказа целиком
    Route::post('/', 'OrderController@store');
    Route::delete('/{order}', 'OrderController@destroy');
    //***********************************************************//
});

Route::group(['prefix' => 'user'], function () {

    Route::post('/', 'UserController@index');//пользователь получает свой профиль
    Route::put('/{user}', 'UserController@update');//пользователь обновляет данные о себе


    Route::group(['prefix' => 'orders'], function () {

        Route::get('/', 'OrderController@index');
        //отображение всех заказов пользователя

        Route::get('/{order}', 'OrderController@show');
        //отображение данных по заказу у текущего пользователя

        Route::post('/{order}', 'OrderProductController@store');
        //добавление товара в уже существующий заказ(модер)

        Route::put('/{order}', 'OrderProductController@update');
        //обновление количества товара у существующего заказа(модер)

        Route::delete('/{order}', 'OrderProductController@destroy');
        //Удаление товара из существующего заказа(модер)
    });
});

Route::group(['prefix' => 'moder'], function () {

    Route::group(['prefix' => 'orders'], function() {

        Route::get('/', 'Moder\OrdersModerController@index');
        Route::get('/{order}', 'Moder\OrdersModerController@show');

        //Сортировка значений
        Route::any('/sort/values', 'Moder\OrdersModerController@sort');
    });
});



