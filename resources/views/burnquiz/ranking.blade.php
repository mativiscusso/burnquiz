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
      <th scope="col">Nombre</th>
      <th scope="col">Usuario</th>
      <th scope="col">Puntaje</th>
    </tr>
  </thead>
  
   <tbody>
   @foreach($usuarios as $user)
    <tr>
      <th scope="row">{{$puesto++}}</th>
      <td>{{$user->nombre}}</td>
      <td>{{$user->user}}</td>
      <td>{{$user->puntaje}}</td>
    </tr>
    @endforeach
   </tbody>
 
</table>
{{ $usuarios->links() }}

</div>
@endsection