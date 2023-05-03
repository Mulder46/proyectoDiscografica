@extends('layouts.plantilla')
     
@section('content')

<h1>Datos del disco</h1>
<table>
    <tr>
        
        <td rowSpan="50"><img src="{{$disk[0]->cover}}" width="200"></td>
    </tr>
    <tr>
        <td>Título: {{$disk[0]->disco}}</td>
    </tr>
    <tr>
        <td>Artistas:</td>
    </tr>
        @foreach($artists as $artist)
        <tr>
            <td></td>
            <td> {{$artist->artista}}</td>
        </tr>
        @endforeach
    
    <tr>
        <td>Año: {{$disk[0]->year}}</td>
    </tr>
    
</table>  

@endsection