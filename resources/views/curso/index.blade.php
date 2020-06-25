
@extends('layouts.app')


@section('content')

<header class="row justify-content-between" >

<div class="col text-center">

    <h1>Sistema WOOW</h1>

    <div class="row col-12 form-control text-align">
    <br>
    
      <nav aria-label="breadcrumb" >
    <ol class="breadcrumb">
        <li class="breadcrumb-item active col-12" aria-current="page">Inicio</a></li>
    </ol>
  </nav>
  <br>
</div>

<div class="row col-12">

  <div class="btn-info col-12 form-control "  >

    <button  type="button" class="btn btn-second justify-content-between"><a href="{{route('curso.create')}}"> agregar aspirante </a></button>

  </div>
</div>
<br>
    <div class="form-group col-md-12 text-align">
    <a class="btn btn-danger" href="http://localhost/mundoWoow/public/pdf" download="curso">Download PDF lista Empleados</a>
    <br><br>
    <hr>
            </div>

</div>
<br><hr><br>

<div class="row">  
    <div class="col-12">

      <img src="img/mundo_woow.jpg " class="text-center" width="500">{{--imagen del proyecto--}}
      
     
<br><br><br>  <hr><hr> <br>
<div class="row" >
  <div class="form-group col-md-4">
     @if(!$anterior)
               <input type="text" class="form-control" name="apellidoP" placeholder="Buscar por apellido paterno" value="">
               </div>
               <div class="form-group col-md-4">
               <input type="text" class="form-control" name="apellidoM" placeholder="Buscar por apellido materno" value="">
             </div>
             <div class="form-group col-md-4">
               <input type="text" class="form-control" name="Nombre" placeholder="Buscar por nombre" value="">
             </div>
                
                @else
                <div class="form-group col-md-4">
                <input type="text" class="form-control" name="apellidoP" placeholder="Buscar por apellido" value="{{ (!$anterior['apellidoP']) ? '' : $anterior['apellidoP']}}">
                <input type="text" class="form-control" name="apellidoM" placeholder="Buscar por apellido" value="{{ (!$anterior['apellidoM']) ? '' : $anterior['apellidoM']}}">
                <input type="text" class="form-control" name="Nombre" placeholder="Buscar por nombre" value="{{ (!$anterior['Nombre']) ? '' : $anterior['Nombre']}}">
               </div>   
                @endif
                
                <div class="row col-12">
                   <div class="form-group col-md-12 text-center">
                <button type="submit" class="btn btn-primary">
                <i class="fas fa-search"></i> Buscar
                </button>
                <a href="{{route('curso.index')}}"><button type="button" class="btn btn-default">
                <i class="fas fa-broom"></i> Limpiar filtro
                </button></a>
              </div>
{{-- 
              <button type="submit" class="btn btn-primary">
                <i class="fas fa-search"></i> Buscar
                </button>
                <a href="{{route('desaparecidos.index')}}"><button type="button" class="btn btn-default">
                <i class="fas fa-broom"></i> Limpiar filtro
                </button></a>


 --}} 


                 <div class="table-responsive">
<table class="table table-striped" style="text-align:center">


    <thead class="thead-dark">
     
        <tr>
            <th scope="col">Codigo empleado</th>
            <th scope="col">Nombre</th>
            <th scope="col">Opciones</th>
        </tr>

    </thead>

    <tbody>

        @foreach($curso as $u)
        <tr>

            <td>{{ $u->Codigo }}</td>
            <td>{{ $u->Nombre }}</td>


                <td>
                <form action="{{ route('curso.destroy',$u->id)}}" method="post" id="destroy{{$u->id}}">
                    
                    @csrf
                    @method('DELETE')

                 
                    <a class="btn-sm btn-info botonInput" href="{{ route('curso.edit',$u->id) }}"><i class="far fa-edit"></i>Editar</a>
            

                  <button type="submit" class="btn-sm btn-danger " onclick="return confirmSweetAlertDestroy('Desactivar','Realmente quieres desactivar','warning','desactivado','Se desactivo.','destroy{{$u->id}}')"><i class="fas fa-user-slash"></i>Eliminar</button>

                    {{-- 
                      <button type="button" class="btn-sm btn-success " onclick="return confirmSweetAlertDestroy('Activa','Realmente quieres activar?','warning','activado','Se activo.','destroy{{$u->id}}')"><i class="fas fa-user-check"></i>Activar</button> --}}

                 </td>  

                </form>

            </td>
        </tr>

        @endforeach
           </tbody>

</table>



    {{ $curso->links() }}

</div>
                </div>
</div>

</header>

 

@endsection
