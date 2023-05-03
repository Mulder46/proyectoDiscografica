@extends('layouts.plantilla')
     
@section('content')
    <h1>Lista de Canciones</h1>
    @empty($songs)
        No hay canciones registradas
    @endempty

    <a href={{route('new-song-form')}}><button>Nueva Canción</button></a>
        @foreach ($songs as $song)
        <form action={{route('editDeleteSong')}} method="post">
            
        <table class="tablas">
            <tr>
                
                <td><img src="{{ $song->cover }}" width="70"></td>
                <td><input type="hidden" name="idSong" value={{$song->songId}}><b>Canción:</b> {{ $song->song }} <br>del <b>albúm</b>  {{ $song->disco }} <br>de <b>genero</b>  {{ $song->genre }} </td>
                <td> <button type="submit" name="action" value="edit">Editar</button> </td>
        </tr>
        <tr>
            <td></td><td></td>
            <td><button type="submit" name="action" value="delete">Borrar</button>  </td>
        </tr>
            </tr>
        </table>
        </form>
        @endforeach
    
@endsection