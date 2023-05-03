@extends('layouts.plantilla')
     
@section('content')
    <h1>Lista de canciones</h1>
    @empty($songs)
     No hay canciones registrados
    @endempty
    <form action="{{route('show-song')}}" method="post" class="formulario">
      @csrf
      <select name="song_id">
          @foreach($songs as $song) 
            <option value={{$song->id}}>{{$song->title}}</option>
          @endforeach
      </select>
      <div class="envio">
        <input type="submit" value="Enviar" />
  </div>
</form>
@endsection

