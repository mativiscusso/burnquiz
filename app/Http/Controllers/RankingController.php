<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use App\Ranking;

class RankingController extends Controller
{
    public function listar(){
        $usuarios = User::all();
        return view('burnquiz.ranking', compact('usuarios'));
    }
}
