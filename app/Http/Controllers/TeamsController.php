<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        return view('teams.index')->with('teams',$teams);
    }

    public function create(){
        return view('teams.create');
   }

   public function store(Request $request){
       $newTeam = new Team();
       $newTeam->name = $request->name;
       $newTeam->save();

       return redirect()->route('teams.index');
   }
}
