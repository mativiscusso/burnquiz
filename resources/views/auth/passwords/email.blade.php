@extends('layouts.app')

@section('content')

@error('email')

@enderror


<h4 class="descripcion text-white card-body">Tu cotraseña fue reestablecida</h4>

@error('password')



@enderror

@endsection