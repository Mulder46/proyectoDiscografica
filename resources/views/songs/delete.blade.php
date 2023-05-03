@extends('layouts.plantilla')
     
@section('content')
    <form class="tablas" action={{route('DeleteSong')}} method="post">
        <input type="hidden" name="id" value={{$song->id}}>
        <button type="submit" name="boton" value="confirmar">Confirmar</button>
        <button type="submit" name="boton" value="cancelar">cancelar</button>
    </form>

@endsection