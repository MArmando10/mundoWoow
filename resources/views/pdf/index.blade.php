
@extends('layouts.app')


@section('content')

  {{-- <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
      <li class="breadcrumb-item active" aria-current="page">Datos clientes</li>
    </ol>
  </nav> --}}
  


<div class="col text-center">

    <h1 class="text-align"> Mundo WOOW </h1>
{{-- 
<a class="btn btn-secondary mb-5" href="{{ route('cliente.create') }}">Agregar cliente</a> --}}

       {{--  @if (Session::has('message'))
            <div class="alert alert-info">{{Session::get('message')}}</div>
        @endif --}}


        <br>
        @if(isset($curso))


<div class="table-responsive">
<table class="table table-striped" style="text-align:center">


    <thead class="thead-dark">
        <tr>
            <th scope="col">Nombre</th>
             <th scope="col">Apellido</th>
{{--             <th scope="col">Telefono</th>
            <th scope="col">Opciones</th> --}}
        </tr>

    </thead>

    <tbody>

        @foreach($curso as $u)
        <tr>

            <td>{{ $u->curso->Nombre }}</td>
            <td>{{ $u->curso->apellidoP }}</td>
            {{-- <td>{{ $u->Telefono }}</td> --}}
         {{--         <td>{{ $u->vendedor->NombreV }}</td>
            <td>{{ $u->cliente->NombreC }}</td>
            <td>{{ $u->producto->Compania }}</td> --}}

             <td>
                {{-- <form action="{{ route('cliente.destroy',$u->id)}}" method="post" id="destroy{{$u->id}}">
                    @csrf
                    @method('DELETE')

                 
                    <a class="btn-sm btn-info botonInput" href="{{ route('cliente.edit',$u->id) }}"><i class="far fa-edit"></i>Editar</a>
            

              
                  <button type="submit" class="btn-sm btn-danger " onclick="return confirmSweetAlertDestroy('Desactivar','Realmente quieres desactivar','warning','desactivado','Se desactivo.','destroy{{$u->id}}')"><i class="fas fa-user-slash"></i>Eliminar</button>

                    
                      <button type="button" class="btn-sm btn-success " onclick="return confirmSweetAlertDestroy('Activa','Realmente quieres activar?','warning','activado','Se activo.','destroy{{$u->id}}')"><i class="fas fa-user-check"></i>Activar</button>

                 </td>  

                

                </form> --}}


            </td>
        </tr>

        @endforeach

    </tbody>

</table>

        {{ $pdf->links() }}
</div>

@endif

@endsection
