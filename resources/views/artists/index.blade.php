@extends('layouts.plantilla')
     
@section('content')
    <h1>Lista de Artistas</h1>
    @empty($artists)
        No hay artistas registrados
    @endempty
    
         <a href={{route('new-artist-form')}}><button>Nuevo Artista</button></a>
     @foreach ($artists as $artist)
     <form action={{route('editDeleteArtist')}} method="post">
        @csrf
        <table class="tablas" >
        <tr>
            <td rowspan="3"> {{ $artist->name }} Alias:  {{ $artist->artistName }} </td>
            <input type="hidden" name="id" value={{$artist->id}}>
    
            <td> <button type="submit" name="action" value="edit">Editar</button> </td>
        </tr>
        <tr>
            <td><button type="submit" name="action" value="delete">Borrar</button>  </td>
        </tr>
        
    </table>
</form> 
        @endforeach
    
    
@endsection