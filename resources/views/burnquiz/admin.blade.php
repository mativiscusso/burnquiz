@extends('layouts.app')

@section('contenido')
<div class="container py-5 my-5">
<h2>PANEL DE CONTROL</h2>

<a href="/posteos/agregar"><button type="button" class="btn btn-primary btn-lg btn-block">Agregar Post</button></a><br>
<a href="/admin/posteos"><button type="button" class="btn btn-primary btn-lg btn-block">Listar Post</button></a><br>
<a href="/admin/comentarios"><button type="button" class="btn btn-primary btn-lg btn-block">Listar Comentarios</button></a><br>

</div>

@endsection