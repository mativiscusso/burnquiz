<?php


namespace App\Http\Controllers;

use App\Pregunta;
use App\Respuesta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JuegoController extends Controller
{

    public function traerDatos(){
        $pregunta = DB::table('preguntas')->first();
        $respuestas = DB::table('respuestas')->where('id_pregunta', '=', $pregunta->id)->get();
        return view('burnquiz.juego', compact('pregunta', 'respuestas'));
    }
    public function verificacion(Request $req){
        
        $respuesta = DB::table('respuestas')->where([
            ['id_pregunta', '=', $req['pregunta_id']],
            ['validacion', '=', 'c'],
        ])->get();
        foreach($respuesta as $rtaCorrecta);
        if ($req['rta'] == $rtaCorrecta->respuesta) { 
            $puntaje = session()->get('puntaje', 0);
            session(['puntaje' => ++$puntaje]);           
            $preguntaAnterior = $req['pregunta_id'];
            $preguntaAnterior++;
            $pregunta = DB::table('preguntas')->where('id', '=', $preguntaAnterior)->first();
            //dd($preguntaAnterior, $pregunta);
            $respuestas = DB::table('respuestas')->where('id_pregunta', '=', $pregunta->id)->get();
            //dd(session()->get('puntaje'));
            return view('burnquiz.juego', compact('pregunta', 'respuestas'));;
        } else return view('burnquiz.resultado');
  
        
    }
    public function proximo(Request $req){ 
        $preguntaAnterior = $req['id'];
        $pregunta = DB::table('preguntas')->where('id', '=', $preguntaAnterior + 1)->first();
        $respuestas = DB::table('respuestas')->where('id_pregunta', '=', $pregunta->id)->get();
        return view('burnquiz.juego', compact('pregunta', 'respuestas'));
    }
}

