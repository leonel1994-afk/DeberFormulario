@extends('plantilla')

@section('content')
<div class="col-md-5">
    <h3 class="text-center mb-4">Editar Usuario </h3>

    <form action="{{route('update' , $notaActualizar->id)}}" method="POST">
        
        @method('PUT')
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
                <label>Nombre</label>
            <input type="text" name="nombre" id="nombre" value="{{$notaActualizar->nombre}}" class="form-control">
        </div>

        <div class="form-group">
            <label>Apellido</label>
            <input type="text" name="apellido" id="apellido" value="{{$notaActualizar->apellido}}" class="form-control">
        </div>


        <div class="form-group">
            <label>Edad</label>
            
            <input type="text" name="edad" id="edad" value="{{$notaActualizar->edad}}" class="form-control">
        </div>


        <div class="form-group">
            <label>Correo</label>
            <input type="email" name="correo" id="correo" value="{{$notaActualizar->correo}}" class="form-control">
        </div>


        <div class="form-group">
            <label>Contraseña</label>
            <input type="password" name="contrasenia" id="contrasenia" value="{{$notaActualizar->contrasenia}}" class="form-control">
        </div>

 
        <button type="submit" class="btn btn-warning" >Editar Usuario</button>
    </form>
    @if (session('update'))
        <div class="alert alert-success mt-3">
            {{session('update')}}
        </div>
    @endif
    
    </br>
    <a href="{{route('inicio')}}" class="btn btn-info">Listar</a>
</div>
@endsection