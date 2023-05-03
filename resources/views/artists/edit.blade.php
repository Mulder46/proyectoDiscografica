

    @extends('layouts.plantilla')
     
    @section('content')
    <h1>Editar Artista</h1>
    <div class="tablas">
      <form action="{{route('updateArtist')}}" method="post" class="formulario">
            @csrf
      <label>Artista</label>     
            <div class="cajas">
                  <input type="hidden" name="id" value={{$artist->id}}>
                  Nombre real:<input type="text" name="name" value="{{$artist->artistName}}" >
            </div>
            <div class="cajas">
                  Nombre artístico:<input type="text" name="artistName"  value="{{$artist->name}}">
            </div>
            <div class="envio">
                  <input type="submit" value="Enviar" />
            </div>
      </form>
    </div>
    @endsection
