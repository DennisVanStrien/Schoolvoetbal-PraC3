<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\TournamentController;
use App\Models\Tournament;
use Illuminate\Support\Facades\Route;

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
    return view('Homepage');
});

Route::get('/weddenschappen', function () {
    return view('Weddenschappen');
});

Route::get('/dashboard', [DashboardController::class, 'goToDashboard'])->middleware(['auth', 'verified'])->name('dashboard.index');

Route::get('/teams', [TeamsController::class, 'index'])->name('teams.index');
Route::get('/teams/create', [TeamsController::class, "create"])->name('team.create');
Route::post('/teams/create', [TeamsController::class, "store"])->name('team.store');

Route::get('/teams/edit/{team}', [TeamsController::class, "goToEditPage"])->name('teams.goToEditPage');
Route::post('/teams/edit/{team}/addPlayers', [TeamsController::class, 'addPlayers'])->name('teams.addPlayers');
Route::post('/teams/edit/{team}/DeletePlayers', [TeamsController::class, 'deletePlayer'])->name('teams.deletePlayer');
Route::delete('/teams/edit/{team}', [TeamsController::class, 'destroy'])->name('teams.destroy');

Route::get('/tournaments', [TournamentController::class, 'indexTournament'])->name('tournaments.index');
Route::get('/tournaments/create', [TournamentController::class, "goToCreatePage"])->name('goToTournamentCreate');
Route::post('/tournaments/create', [TournamentController::class, "createTournament"])->name('tournament.create');
Route::post('/tournaments/{tournament}/join', [TournamentController::class, 'joinTournament'])->name('tournament.team.create');





Route::get('/teams/toevoegen', [TeamsController::class, 'indexTeam'])->name('teams.indexTeams');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
