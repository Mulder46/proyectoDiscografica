@extends('layouts.plantilla')
     
@section('content')
    <form class="tablas" action={{route('DeleteDisk')}} method="post">
        <input type="hidden" name="id" value={{$Disk->id}}>
        <button type="submit" name="boton" value="confirmar">Confirmar</button>
        <button type="submit" name="boton" value="cancelar">cancelar</button>
    </form>

@endsection