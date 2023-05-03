@extends('layouts.plantilla')
     
@section('content')
    <h1>Lista de Artista</h1>
    <div class="tablas">
      @empty($artists)
      No hay artistas registrados
      @endempty
      <form action="{{route('show-artist')}}" method="post" class="formulario">
        @csrf
        <select name="id">
            @foreach($artists as $artist) 
              <option value={{$artist->id}}>{{$artist->artistName}}</option>
            @endforeach
        </select>
        <div class="envio">
        <input type="submit" value="Enviar" />
        </div>
      </form>
    </div>
@endsection

