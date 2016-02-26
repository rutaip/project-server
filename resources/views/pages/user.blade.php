@extends('master')

@section('session_name')

    {{ $first }} {{ $last }}

@stop


@section('content')
<h1>Usuarios</h1>

<h2>Bienvenido: {{ $first }} {{ $last }}</h2>


<p>
Sitio de configuraciones

</p>

@stop