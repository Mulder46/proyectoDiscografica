

    @extends('layouts.plantilla')
     
    @section('content')
    <h1>Editar Disco</h1>
    <form action="{{route('updateDisk')}}" method="post" class="formulario">
        @csrf
      <input type="hidden" name="disk_id" value={{$Disk->id}}>
      <div class="cajas">
            Título:<input type="text" name="title" value='{{$Disk->title}}'>
      </div>
      <div class="cajas">
            Año:<input type="text" name="year" value={{$Disk->year}}>
      </div>
      <div class="cajas">
            Url de la portada:<input type="text" name="cover" value={{$Disk->cover}}>
      </div>
      Artistas actuales:
      @foreach($artists as $artist)
      <div class="cajas">
          <input type="checkbox" name="artista[]" value={{$artist->id}} checked>{{$artist->artistName}}
      </div>
      @endforeach 
      Otros Artistas:
      @foreach($artistsNo as $artist)
      <div class="cajas">
          <input type="checkbox" name="artista[]" value={{$artist->id}} >{{$artist->artistName}}
      </div>
      @endforeach 

      <div class="envio">
            <input type="submit" value="Enviar" />
      </div>
    </form>
    @endsection
