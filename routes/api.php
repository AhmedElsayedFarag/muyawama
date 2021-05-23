<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'auth'], function () {
    Route::post('register', 'Api\AuthController@register');
    Route::post('login', 'Api\AuthController@login');
    Route::post('verify_phone', 'Api\AuthController@verify_phone');
    Route::post('forget_password', 'Api\AuthController@forget_password');
    Route::post('check_phone_code', 'Api\AuthController@check_phone_code');
//    Route::get('logout', 'api\AuthController@logout');
//    Route::post('forget/password', 'api\AuthController@forget_password');
//    Route::post('resset/password', 'api\AuthController@resset_password');
});

Route::middleware(['auth:api'])->group(function () {

    Route::post('update_profile', 'Api\UserController@update_profile');
    Route::post('auth/change_password', 'Api\AuthController@change_password');
    Route::post('auth/new_password', 'Api\AuthController@new_password');
    Route::post('auth/update_device_token', 'Api\AuthController@update_device_token');
    Route::post('auth/getUserDetails', 'Api\UserController@getUserDetails');


    //request apis
    Route::post('make_request', 'Api\RequestController@make_request');
    Route::post('my_requests', 'Api\RequestController@my_requests');
    Route::post('available_requests', 'Api\RequestController@available_requests');
    Route::post('in_progress_requests', 'Api\RequestController@in_progress_requests');
    Route::post('completed_requests', 'Api\RequestController@completed_requests');
    Route::post('get_request_details/{id}', 'Api\RequestController@get_request_details');
    Route::post('provider_complete_service/{id}', 'Api\RequestController@provider_complete_service');
    Route::post('get_offer_details/{id}', 'Api\RequestController@get_offer_details');
    Route::post('user_cancel_request/{id}', 'Api\RequestController@user_cancel_request');
    Route::post('add_offer/{id}', 'Api\RequestController@add_offer');
    Route::post('request_offers/{id}', 'Api\RequestController@request_offers');
    Route::post('user_accept_offer/{id}', 'Api\RequestController@user_accept_offer');
    Route::post('my_offers', 'Api\RequestController@my_offers');


    //rate_user
    Route::post('rate_user', 'Api\UserController@rate_user');

    //chat
    Route::post('open_chat', 'Api\ChatController@openChat');
    Route::post('send_message', 'Api\ChatController@sendMessage');
    Route::post('get_all_chat_messages', 'Api\ChatController@get_all_chat_messages');

});
//home
Route::get('services/{parent_id}', 'Api\HomeController@services');
Route::get('service_options/{parent_id}', 'Api\HomeController@service_options');
Route::get('global_values', 'Api\HomeController@global_values');
Route::get('slider', 'Api\HomeController@slider');
