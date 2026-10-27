<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\HealthFormController;
use App\Http\Controllers\FreeTrialController;
use App\Http\Controllers\LptfContactController;
use App\Http\Controllers\DownloadBrochureController;
use App\Http\Controllers\PriceSendToEmailController;
use App\Http\Controllers\OnlineApplicationController;
use App\Http\Controllers\DanceCampOnlineApplicationController;
use App\Http\Controllers\CareerController;

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

Route::post('/contact', [ContactController::class, 'store'])->middleware('throttle:contact');
Route::post('/careers', [CareerController::class, 'store']);
Route::post('/download-brochure', [DownloadBrochureController::class, 'store']);
Route::post('/free-trial', [FreeTrialController::class, 'store']);
Route::post('/online-application', [OnlineApplicationController::class, 'store']);
Route::put('/online-application/{id}/{key}', [OnlineApplicationController::class, 'sendEmail']);
Route::post('/dancecamp/online-application', [DanceCampOnlineApplicationController::class, 'store']);
Route::put('/dancecamp/online-application/{id}/{key}', [DanceCampOnlineApplicationController::class, 'sendEmail']);
Route::post('/online-application-l20', [OnlineApplicationController::class, 'l20']);
Route::put('/online-application-l20/{id}/{key}', [OnlineApplicationController::class, 'l20Mail']);
Route::post('/price-send-email', [PriceSendToEmailController::class, 'store']);
Route::post('/lptf', [LptfContactController::class, 'store']);
Route::post('/lptf/question', [LptfContactController::class, 'question']);

Route::post('payment/data',[PaymentController::class,'test']);
Route::get('success/{func}',[PaymentController::class,'success']);
Route::get('cancel/{func}',[PaymentController::class,'cancel']);
Route::post('/payment', [PaymentController::class, 'store']);
Route::put('/payment/{id}/{key}', [PaymentController::class, 'sendEmail']);
Route::post('/health-form', [HealthFormController::class, 'store']);


Route::get('download/{encrypted}',[CareerController::class,'download']);