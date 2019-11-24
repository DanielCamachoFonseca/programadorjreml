@extends('plantilla')

@section('content')
    <div class="row">
        <div class="col-md-7">       
         
                <h3 class="text-center mb-10">Agregar usuario</h3>
                @if(count($errors) > 0)
                    <div class="errors">
                        <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{route('store')}}" method="POST">
                    @csrf
                    

                    <div class="form-group">
                        <input type="text" name="nombre" id="nombre" value="{{old('nombre')}}" class="form-control" placeholder="Ingrese sus nombres" required>
                    </div>

                    <div class="form-group">
                        <input type="text" name="apellido" id="apellido" value="{{old('apellido')}}" class="form-control" placeholder="Ingrese sus apellidos" required>
                    </div>

                    <div class="form-group">
                        <input type="int" name="cedula" id="cedula" value="{{old('cedula')}}" class="form-control" placeholder="Ingrese sus cedula" value="{{old('cedula')}}" required>
                    </div>

                    <div class="form-group">
                        <input type="text" name="correo" id="correo" value="{{old('correo')}}" class="form-control" placeholder="Ingrese su correo" value="{{old('correo')}}" required>
                    </div>

                    <div class="form-group">
                        <input type="int" name="telefono" id="telefono" value="{{old('telefono')}}" class="form-control" placeholder="Ingrese su telefono" value="{{old('telefono')}}" required>
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Guardar usuario</button>
                </form>
                @if (session('agregar'))
                    <div class="alert alert-success mt-3">
                        {{session('agregar')}}
                    </div>
                @endif
          
        <br> 
        <br> 
        
        <table class="table mt-100" >
                <tr>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>C.C</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th>Fecha de registro</th>
                    <th>Fecha de modificacion</th>
                    <th></th>
                </tr>
                @foreach ($usuario as $item)
                    <tr>
                        <td>{{$item->nombre}}</td>
                        <td>{{$item->apellido}}</td>
                        <td>{{$item->cedula}}</td>
                        <td>{{$item->correo}}</td>
                        <td>{{$item->telefono}}</td>
                        <td>{{$item->created_at}}</td>
                        <td>{{$item->updated_at}}</td>
                        <td>
                            <a href="{{route('editar' , $item->id)}}" class="btn btn-warning">Editar</a>
                            <form action="{{route('eliminar', $item->id)}}" method="POST" class="d-inline p-2">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                        
                    </tr>
                @endforeach 
            </table>
            @if (session('eliminar'))
                 <div class="alert alert-success mt-3">
                    {{session('eliminar')}}
                </div>
            @endif
            {{$usuario->links()}}
        </div>  
    </div>

@endsection