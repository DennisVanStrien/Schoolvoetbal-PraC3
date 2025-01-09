<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use App\Models\User;
use App\Models\Team;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function goToDashboard()
    {
        $teams = Team::all();
        $tournaments = Tournament::all();
        return view('dashboard.index')->with(['teams' => $teams, 'tournaments' => $tournaments]);
    }
}
