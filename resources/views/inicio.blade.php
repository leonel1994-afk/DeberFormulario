@extends('plantilla')

@section('content')
<div class="col-md-5">
    <h3 class="text-center mb-4">Formulario</h3>

    <form action="{{route('store')}}" method="POST">
        @csrf


        @if (count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors ->all() as $error)

                    <li>{{ $error }}</li>
                                        
                @endforeach
            </ul>
        </div>
        @endif


        <div class="form-group">
        <label> Nombre</label>
        <input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre')}}" placeholder="Nombre " >
        </div>

     

        <div class="form-group">
        <label>Apellido</label>
        <input type="text" name="apellido" id="apellido" class="form-control" value="{{old('apellido')}}" placeholder="Apellido " >
        </div>
        


        <div class="form-group">
            <label>Edad</label>
            <input type="text" name="edad" id="edad" class="form-control" value="{{old('edad')}}" placeholder="Edad" >
            </div>
          
           

            <div class="form-group">
                <label>Correo</label>
                <input type="email" name="correo" id="correo" class="form-control" value="{{old('correo')}}" placeholder="Correo" >
                </div>
              

                <div class="form-group">
                    <label>Contraseña</label>
                    <input type="password" name="contrasenia" id="contrasenia" class="form-control" value="{{old('contrasenia')}}" placeholder="Contraseña" >
                    </div>
                  

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>

    @if (session('agregar'))
        <div class="alert alert-success mt-3">
            {{session('agregar')}}
        </div>
    @endif
</div>

</br>

<div class="row">
        <div class="col-md-9">
            <table class="table">
                <tr>
                    
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Edad</th>
                    <th>Correo</th>
                    <th>Contraseña</th>
                    <th>Acciones</th>
                </tr>
               
                @foreach ($notas as $item)
                    <tr>
                       
                        <td>{{$item->nombre}}</td>
                        <td>{{$item->apellido}}</td>
                        <td>{{$item->edad}}</td>
                        <td>{{$item->correo}}</td>
                        <td>{{$item->contrasenia}}</td>
                        <td>
                            <a href="{{route('editar' , $item->id)}}" class="btn btn-warning">Editar</a>
                            <form action="{{route('eliminar' , $item->id)}}" method="POST" class="d-inline">
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
            {{$notas->links()}}
        </div>
        {{-- Fila formulario --}}
        
        {{-- Fin fila formulario --}}
    </div>
@endsection