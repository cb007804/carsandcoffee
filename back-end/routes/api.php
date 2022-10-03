<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\GallaryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\mailController;
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

Route::get('v1/items',[ItemController::class, 'getItem'] );
Route::post('v1/sendmail',[mailController::class, 'sendMail'] );
Route::get('v1/items-last',[ItemController::class, 'getLastItem'] );
Route::get('v1/gallary',[GallaryController::class, 'getGallary'] );
Route::get('v1/events',[EventController::class, 'getEvents'] );

