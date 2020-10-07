<?php

use Illuminate\Support\Facades\Route;
use Obs\Validpackage\Validpackage;
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

Route::get('/', function () {
    return view('welcome');
});
Route::resource('purchaseOrder', 'PurchaseOrderController');

Route::get('/validpackage/{name}', function($sName) {
    $oGreetr = new Validpackage();
    return $oGreetr->greet($sName);
});

Route::get('/emailvalidate',function() {
return view('emailvalidate');
});

Route::post('emailvalidation/validateemail','EmailvalidationController@validateemail');