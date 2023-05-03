@extends('layouts.plantilla')
     
@section('content')
    <h1>Crear Artista</h1>
    <div class="tablas">
    <form action="new-artist" method="post" class="formulario">
        @csrf 
        <div class="cajas">
            Nombre real:<input type="text" name="name">
        </div>
        <div class="cajas">
            Nombre artístico:<input type="text" name="artistName">
        </div>
        <div class="envio">
            <input type="submit" value="Enviar" />
        </div>
    </form>
</div>
@endsection