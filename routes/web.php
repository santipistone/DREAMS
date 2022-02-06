<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DbController;
use App\Http\Controllers\PageController;

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


Route::get('/login', [DbController::class, 'showLogin']);

Route::get('/logout', [DbController::class, 'logout']);

Route::get('/home', [DbController::class, 'showLogin']);

Route::get('/', [DbController::class, 'showLogin']);

Route::post('/login',[DbController::class, 'postLogin']);

Route::get('/analytics', [PageController::class, 'getFarmerList']);

Route::get('/analytics/{id}', function ($id) {
    return PageController::getPoint($id);
});

Route::get('/sugg', [PageController::class, 'getSuggestion']);

Route::get('/direct/new', [DbController::class, 'getFarmerForDirect']);

Route::get('/direct', function () {
    return DbController::getDirectConnectionList();
});

Route::post('/ansDirect', [DbController::class, 'addMexToDirectConnection']);

Route::post('/newDirect', [DbController::class, 'createDirectConnection']);

Route::get('/direct/{id}', function ($id) {
    return DbController::getMexFromDirectConnection($id);
});

Route::get('/ticket', [DbController::class, 'ticketGesture']);

Route::get('/ticket/{id}', function ($id) {
    return DbController::visTicket($id);
});

Route::post('/ansTicket', [DbController::class, 'answerTicket']);
