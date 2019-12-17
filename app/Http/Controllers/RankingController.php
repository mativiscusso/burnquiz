<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Pregunta;
use App\Respuesta;
use App\User;

class RankingController extends Controller
{
    public function listar(){
        $usuarios = DB::table('users')->select('nombre', 'user', 'puntaje')->orderBy('puntaje', 'desc')->paginate(10);
        $puesto = 1;
        return view('burnquiz.ranking', compact('usuarios','puesto'));
    }
}
