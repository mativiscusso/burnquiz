<?php


namespace App\Http\Controllers;

use Auth;
use App\Ranking;
use App\Pregunta;
use App\Respuesta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JuegoController extends Controller
{

    public function traerDatos(){
        $pregunta = DB::table('preguntas')->first();
        $respuestas = DB::table('respuestas')->where('id_pregunta', '=', $pregunta->id)->get();
        $rand = range(0, 2);
        shuffle($rand);
        foreach ($rand as $val) {
            $random[] = $val;
        }
       /*  foreach($respuestas as $key => $respuesta){
            dd($respuestas[0]->respuesta);
        } */
        return view('burnquiz.juego', compact('pregunta', 'respuestas', 'random'));
    }
    public function verificacion(Request $req){
        
        $respuesta = DB::table('respuestas')->where([
            ['id_pregunta', '=', $req['pregunta_id']],
            ['validacion', '=', 'c'],
        ])->get();
        $rand = range(0, 2);
        shuffle($rand);
        foreach ($rand as $val) {
            $random[] = $val;
        }
        foreach($respuesta as $rtaCorrecta);
        if ($req['rta'] == $rtaCorrecta->respuesta) { 
            $puntaje = session()->get('puntaje', 0);
            session(['puntaje' => ++$puntaje]);           
            $preguntaAnterior = $req['pregunta_id'];
            $preguntaAnterior++;
            $pregunta = DB::table('preguntas')->where('id', '=', $preguntaAnterior)->first();
            $respuestas = DB::table('respuestas')->where('id_pregunta', '=', $pregunta->id)->get();
            return view('burnquiz.juego', compact('pregunta', 'respuestas', 'random'));;
        } else {
            $puntajeFinal = new Ranking;
            $puntajeFinal->id_usuario = Auth::user()->id;
            $puntajeFinal->puntaje = session()->get('puntaje');
            $puntajeFinal->save();
            return view('burnquiz.resultado');
        }
    }




    public function proximo(Request $req){ 
        $preguntaAnterior = $req['id'];
        $pregunta = DB::table('preguntas')->where('id', '=', $preguntaAnterior + 1)->first();
        $respuestas = DB::table('respuestas')->where('id_pregunta', '=', $pregunta->id)->get();
        //if($pregunta == null
        return view('burnquiz.juego', compact('pregunta', 'respuestas'));
    }
}

