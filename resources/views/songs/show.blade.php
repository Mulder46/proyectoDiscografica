@extends('layouts.plantilla')
     
@section('content')
<h1>Datos de la canción</h1>

<table>
    <tr>
        <td rowSpan="5"><img src="{{$song[0]->cover}}" width="200"></td>
    </tr>
    <tr>
        <td>Título: {{$song[0]->title}}</td>
    </tr>
    <tr>
        <td>Disco: {{$song[0]->disco}}</td>
    </tr>
    <tr>
        <td>Genero: {{$song[0]->genre}}</td>
    </tr>
    <tr>
        <td>Año: {{$song[0]->year}}</td>
    </tr>
    
</table>   
@endsection