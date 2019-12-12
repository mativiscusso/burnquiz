<?php

namespace App\Http\Controllers;

use App\Pregunta;
use App\Respuesta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PreguntasController extends Controller
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
        return view('burnquiz.admin.preguntas', compact('preguntas','respuestas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('burnquiz.cargarpreguntas');  
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pregunta = new Pregunta;
        $respuesta = new Respuesta;

        $pregunta->pregunta = $request->pregunta;
        $pregunta->save();
        $preguntas = DB::table('preguntas')
                ->orderBy('id', 'desc')
                ->first();
        $respuesta->respuesta = $request->rta1;
        $respuesta->validacion = 'i';
        $respuesta->id_pregunta = $preguntas->id;
        $respuesta->save();
        $respuesta = new Respuesta;
        $respuesta->respuesta = $request->rta2;
        $respuesta->validacion = 'i';
        $respuesta->id_pregunta = $preguntas->id;
        $respuesta->save();
        $respuesta = new Respuesta;
        $respuesta->respuesta = $request->rtaC;
        $respuesta->validacion = 'c';
        $respuesta->id_pregunta = $preguntas->id;
        $respuesta->save();
        return view('burnquiz.cargarpreguntas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function show(Pregunta $pregunta)
    {
        $preguntas = Pregunta::where('pregunta', 'like', '%' . $pregunta . '%')->get();
        return view('index', compact('preguntas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $preguntas = Pregunta::findOrFail($id);
        $respuestas =Respuesta ::findOrFail($id);
        //dd($preguntas);
        return view('burnquiz.cargarpreguntas',compact('preguntas','respuestas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pregunta $pregunta)
    {
        $pregunta = Pregunta::find($request);

        $pregunta->name = 'pregunta';

        $pregunta->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pregunta::destroy($id);
        return view('index');
    }
}
