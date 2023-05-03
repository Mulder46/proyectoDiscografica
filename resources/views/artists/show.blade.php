@extends('layouts.plantilla')
     
@section('content')
<h1>Datos del artista</h1>
<table class="tablas">
    <tr>
        <td>Nombre real: {{$artist->name}}</td>
    </tr>
    <tr>
        <td>Nombre artístico: {{$artist->artistName}}</td>
    </tr>
</table>   
@endsection