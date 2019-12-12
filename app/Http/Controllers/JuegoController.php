<?php

use App\Pregunta;
use App\Respuesta;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JuegoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $preguntas = Pregunta::all();
        $respuestas = Respuesta::all();
        return view('burnquiz.index', compact('preguntas', 'respuestas'));
    }
}