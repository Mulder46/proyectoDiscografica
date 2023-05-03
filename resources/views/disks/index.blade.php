@extends('layouts.plantilla')
     
@section('content')
    <h1>Lista de Discos</h1>
    @empty($disks)
        No hay discos registradas
    @endempty
    <form action="{{route('new-disk-formPre')}}" method="post">
        
        <button type="submit">Nuevo Disco</button>
    </form>
    

 
@foreach($disks as $disk)
<form action={{route('editDeleteDisk')}} method="post">
    @csrf
<table class="tablas">   
    <tr><ul>
        <li><td rowSpan="60"><img src="{{$disk->cover}}" width="200"></li>
            
             <li>    <button type="submit" name="action" value="edit">Editar</button> 
                <button type="submit" name="action" value="delete">Borrar</button> </li>
            </ul> </td>        
                
    </tr>
    <tr>
        <td >Título: {{$disk->disco}}</td>
    </tr>
    
        <td >Artistas:</td>
    </tr>
        
        @php
        $artistas = explode(",", $disk->artistas);
        @endphp

        @foreach($artistas as $artista)
        <tr><td>
            <ul>
            <li> {{$artista}}</li>
            </ul>
        </td></tr>
        @endforeach
        
    </tr>
    <tr>
        <td>Año: {{$disk->year}}</td>
        <input type="hidden" name="id" value={{$disk->diskId}}>
        
    </tr>
   
</table> 
</form> 
@endforeach
@endsection