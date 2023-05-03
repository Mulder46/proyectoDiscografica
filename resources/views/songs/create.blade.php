@extends('layouts.plantilla')
     
@section('content')
    <h1>Crear Canción</h1>
    <form action="new-song" method="post" class="formulario">
        @csrf 
        <div class="cajas">
            Título:<input type="text" name="title">
        </div>
        <div class="cajas">
            Género:<input type="text" name="genre">
        </div>
        <div class="cajas">
            Disco:<select name="disk_id">
                @foreach($disks as $disk) 
                  <option value={{$disk->id}}>{{$disk->title}}</option>
                  @endforeach
                </select>
        </div>
        <div class="envio">
            <input type="submit" value="Enviar" />
        </div>
    </form>
@endsection