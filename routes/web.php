<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Apps\AgentController;
use App\Http\Controllers\Apps\AppsController;
use App\Http\Controllers\Apps\BillPlzStatusController;
use App\Http\Controllers\Apps\BillPlzWebhookController;
use App\Http\Controllers\Apps\BoothController;
use App\Http\Controllers\Apps\BoothExhibitionBookedController;
use App\Http\Controllers\Apps\BoothNumberController;
use App\Http\Controllers\Apps\HallController;
use App\Http\Controllers\Apps\LogsController;
use App\Http\Controllers\Apps\MHXCupBoardController;
use App\Http\Controllers\Apps\MHXCupCategoryController;
use App\Http\Controllers\Apps\MHXCupRaceController;
use App\Http\Controllers\Apps\MHXCupRacerController;
use App\Http\Controllers\Apps\MHXCupRegisterController;
use App\Http\Controllers\Apps\MHXCupResultController;
use App\Http\Controllers\Apps\MHXCupTrackController;
use App\Http\Controllers\Apps\MHXCupTShirtController;
use App\Http\Controllers\Apps\PermissionsController;
use App\Http\Controllers\Apps\PreRegisterController;
use App\Http\Controllers\Apps\RolesController;
use App\Http\Controllers\Apps\SectionController;
use App\Http\Controllers\Apps\UserController;
use App\Http\Controllers\Apps\VendorController;
use App\Http\Controllers\Apps\VisitorController;
use App\Http\Controllers\Apps\VisitorShopeeController;
use App\Http\Controllers\Front\MHXCupController;
use App\Http\Controllers\Front\ParticipantController;
use App\Http\Controllers\Front\RaceController;
use App\Http\Controllers\Front\RegisterController;
use App\Http\Controllers\Front\WebController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return response()->redirectTo(env('APP_MAIN_URL'));
})->name('welcome');

    Route::group([
        'namespace' => 'Front',
        'as'        => 'mhxcup.',
    ], function (){
        Route::get('welcome', [MHXCupController::class, 'welcome'])->name('welcome');
        Route::get('register', [MHXCupController::class, 'register'])->name('register');
        Route::post('category', [MHXCupController::class, 'categoryPost'])->name('categoryPost');
        Route::get('racer-register', [MHXCupController::class, 'registerFrom'])->name('registerFrom');
        Route::post('register', [MHXCupController::class, 'registerPost'])->name('registerPost');

        Route::post('mhx-payment', [MHXCupController::class, 'mhxPayment'])->name('mhxPayment');
        Route::get('mhx-redirect', [MHXCupController::class, 'redirectUrl'])->name('redirectHook');
        Route::post('mhx-webhook', [MHXCupController::class, 'webhook'])->name('webHook');

        Route::post('mhx-payment-cash', [MHXCupController::class, 'cashPayment'])->name('mhxCash');
        Route::get('mhx-payment-confirm', [MHXCupController::class, 'cashPaymentConfirm'])->name('mhxCashConfirm');

        Route::get('scoreboard/{category}/{track}', [RaceController::class, 'scoreboard'])->name('scoreboard');
    });
    Route::group([
        'prefix'  => 'mhx-cup',
        'as'     => 'mhx-cup.'
    ], function (){
        Route::resource('t-shirt', MHXCupTShirtController::class);
        Route::resource('register', MHXCupRegisterController::class);
        Route::get('registered-recer', [AppsController::class, 'categoryCup'])->name('categoryMhxCup');
        Route::post('approve-register', [AppsController::class, 'approveRegister'])->name('approveRegister');
        Route::post('approve-redeem', [AppsController::class, 'approveRedeem'])->name('approveRedeem');
    });
    Route::group([
        'prefix'  => 'event-mhx-cup',
        'as'     => 'event-mhx-cup.'
    ], function (){
        Route::resource('categories', MHXCupCategoryController::class);
        Route::resource('tracks', MHXCupTrackController::class);
        Route::resource('racers', MHXCupRacerController::class);
        Route::group([
            'prefix'  => 'screening-round',
        ], function (){
            Route::resource('races', MHXCupRaceController::class);
            Route::resource('results', MHXCupResultController::class);
            Route::resource('board', MHXCupBoardController::class);
            Route::get('race-start-round', [MHXCupRaceController::class, 'raceForm'])->name('raceForm');
        });
        Route::get('getCategoryData/{categoryId}', [MHXCupRaceController::class, 'getCategoryData'])->name('getCategoryData');
        Route::post('submit-result', [MHXCupRaceController::class, 'submitResult'])->name('result');
        Route::post('race-complete', [MHXCupRaceController::class, 'completeReport'])->name('completeRace');
        Route::post('round-races', [MHXCupRaceController::class, 'startRoundeRace'])->name('startRoundeRace');
    });
    Route::group([
        'prefix'  => 'race',
        'as'     => 'race.'
    ], function (){
        Route::get('racing-day', [MHXCupRaceController::class, 'racingDay'])->name('racing-day');
        Route::post('store', [MHXCupRaceController::class, 'store'])->name('store');
    });
