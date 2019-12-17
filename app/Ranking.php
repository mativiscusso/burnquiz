<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Ranking extends Model
{
    public $table = 'ranking';

    public function usuario(){
    	return $this->belongTo(User::class, 'id_usuario');
    } 
}
