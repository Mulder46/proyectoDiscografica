@extends('layouts.plantilla')
     
@section('content')
    <h1>Lista de Discos</h1>
    @empty($disks)
     No hay discos registrados
    @endempty
    <form action="{{route('show-disk')}}" method="post" class="formulario">
      @csrf
      <select name="id">
          @foreach($disks as $disk) 
            <option value={{$disk->id}}>{{$disk->title}}</option>
          @endforeach
      </select>
      <div class="envio">
        <input type="submit" value="Enviar" />
  </div>
</form>
@endsection

