@extends('plant')

@section('content')

    <h3 class="text-center mb-3 pt-3">Editar el usuario {{$usuarioActualizar->id}}</h3>
    
    <form action="{{route('update', $usuarioActualizar->id)}}" method="POST">
        @method('PUT')
        @csrf

        <div class="form-group">
            <input type="text" name="nombre" id="nombre" value="{{$usuarioActualizar->nombre}}" class="form-control">
        </div>

        <div class="form-group">
            <input type="text" name="apellido" id="apellido" value="{{$usuarioActualizar->apellido}}" class="form-control">
        </div>

        <div class="form-group">
            <input type="int" name="cedula" id="cedula" value="{{$usuarioActualizar->cedula}}" class="form-control">
        </div>

        <div class="form-group">
            <input type="text" name="correo" id="correo" value="{{$usuarioActualizar->correo}}" class="form-control">
        </div>

        <div class="form-group">
            <input type="int" name="telefono" id="telefono" value="{{$usuarioActualizar->telefono}}" class="form-control">
        </div>

        <button type="submit" class="btn btn-warning btn-block">Editar Usuario</button>
    </form>
    @if (session('update'))
        <div class="alert alert-success mt-3">
            {{session('update')}}
        </div>        
    @endif
@endsection