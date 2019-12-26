@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h3>
        <p class="descripcion">RANKING DE USUARIOS</p>
    </h3>
</div>
<div class="container py-1">
    <table class="table table-hover">
  <thead>
  <tr class="table-warning">
      <th scope="col">#</th>
      <th scope="col">Usuario</th>
      <th scope="col">Puntaje</th>
    </tr>
  </thead>
  
   <tbody>
   @foreach($ranking as $key => $user)
    <tr>
      <th scope="row">{{++$a}}</th>
      <td>{{$ranking[$key]->usuario}}</td>
      <td>{{$ranking[$key]->puntaje}}</td>
    </tr>
    @endforeach
   </tbody>
 
</table>


</div>
@endsection