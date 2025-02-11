<?php

use App\Http\Controllers\Api\CoinConvertionControllerApi;
use App\Http\Controllers\api\ConfigControllerApi;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => ['xss-filter', 'auth:api'],
], function() {
    Route::controller(CoinConvertionControllerApi::class)->group( function () {
        Route::post('/coin-convert', 'convertCoin')->name('api.coin-convert');
    });

    Route::controller(ConfigControllerApi::class)->group( function () {
        Route::post('/config-fee', 'changeConfig')->name('api.config-fee');
    });
});
