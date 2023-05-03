@extends('layouts.plantilla')
     
@section('content')
    <h1>Crear Disco</h1>
    <form action="new-disk" method="post" class="formulario">
        @csrf 
        <div class="cajas">
            Título:<input type="text" name="title">
        </div>
        <div class="cajas">
            Año:<input type="text" name="year">
        </div>
        <div class="cajas">
            URL crátula:<input type="text" name="cover">
        </div>
        Artistas:
         @foreach($artists as $artist)
        <div class="cajas">
            <input type="checkbox" name="artista[]" value={{$artist->id}}>{{$artist->artistName}}
        </div>
        @endforeach 
        <div class="envio">
            <input type="submit" value="Enviar" />
        </div>
    </form>
@endsection