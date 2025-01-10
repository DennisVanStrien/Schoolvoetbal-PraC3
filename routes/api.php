<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/user', [ApiController::class, 'users']);
Route::get('/teams', [ApiController::class, 'teams']);
Route::get('/tournaments', [ApiController::class, 'tournaments']);
Route::get('/games', [ApiController::class, 'games']);
Route::get('/tournamentteams', [ApiController::class, 'tournamentsTeams']);

Route::middleware('auth:sanctum')->get('/users', function (Request $request) {
    return $request->user();
});
