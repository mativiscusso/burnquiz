<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use App\Ranking;

class RankingController extends Controller
{
    public function listar(){
        $ranking = Ranking::orderBy('puntaje', 'desc')->get();
        $a = 0;
        return view('burnquiz.ranking', compact('ranking', 'a'));
    }
}
