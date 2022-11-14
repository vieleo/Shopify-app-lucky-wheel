<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LuckyController;
use App\Http\Controllers\SetupController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\CheckEmailController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;



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

Route::get('/login', function () {
    if (Auth::user()) {
        return redirect()->route('home');
    }
    return view('login');
})->name('login');


//langue
Route::get('lang/{locale}', function($locale){
    if (! in_array($locale, ['en', 'vi', 'cn'])) {
        abort(404);
    }
    session()->put('locale', $locale);

    return redirect()->back();
});



Route::get('/', [LuckyController::class, 'index'])->middleware(['verify.shopify'])->name('home');


Route::group(['prefix' => 'config'], function () {
    Route::get('/', [ConfigController::class, 'index'])->middleware(['verify.shopify'])->name('config_index');
    Route::post('/', [ConfigController::class, 'store'])->name('lucky_config_create');
    // Route::get('/delete/{id}', [ColorController::class, 'delete']);
});



Route::group(['prefix' => 'lucky'], function () {
    Route::get('/', [LuckyController::class, 'index'])->middleware(['verify.shopify'])->name('lucky_index');
    Route::post('/', [LuckyController::class, 'store'])->name('lucky_create');
    Route::get('/delete/{id}', [LuckyController::class, 'delete']);
});


Route::get('/setup', SetupController::class.'@index')->name('setup');
Route::get('/view', ViewController::class.'@index')->name('view');



// kiểm tra email đã tồn tại


// Route::resource('/', CheckEmailController::class);

