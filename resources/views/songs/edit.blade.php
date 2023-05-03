

    @extends('layouts.plantilla')
     
    @section('content')
    
    <h1>Editar Canción</h1>
    <form action="{{route('updateSong')}}" method="post" class="formulario">
        @csrf
        <input type="hidden" name="id" value={{$song->id}}>
    <label>Canción</label>
    
      <div class="cajas">
            Titulo:<input type="text" name="title" value="{{$song->title}}">
      </div>
      <div class="cajas">
            género:<input type="text" name="genre" value="{{$song->genre}}">
      </div>
      
      <div class="cajas">
            Disco:<select name="disk_id">
                  <option value={{$disco->id}} name="id_disk">{{$disco->title}}</option>
                  @foreach($disks as $disk) 
                    <option value={{$disk->id}} name="id_disk">{{$disk->title}}</option>
                    @endforeach
                  </select>
      </div>
      <div class="envio">
            <input type="submit" value="Enviar" />
      </div>
    </form>
    @endsection
