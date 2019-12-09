<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    public $table = 'preguntas';
    public $guarded = [];

    public function respuesta(){
        return $this->hasMany(Respuesta::class, 'id_pregunta');
    }
}
