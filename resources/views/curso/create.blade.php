
@extends('layouts.app')


@section('content')

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('curso.index')}}">Inicio</a></li>
      <li class="breadcrumb-item active">Datos de Registro Crear</li>
    </ol>
  </nav>
  

@if (Session::has('message'))
<div class="alert alert-info">{{Session::get('message')}}</div>
@endif

<div class="card">
  <div class="card-header">
    <h2>Datos del registro</h2>
  </div>

  <div class="card-body">
      <form class="curso" method="POST" action="{{route('curso.store')}}">
  
      @csrf
{{$errors}}
                      <div class="form-group col-md-12">

                          <h3>Registro aspirante</h3>
                          <div class="form-row">

                      <div class="form-group col-md-4">
                        <label for="txtCodigo">Codigo de empleado</label>
                        <input type="text" id="txtCodigo" class="form-control" value="{{old('Codigo')}}" name="Codigo" maxlength="10" placeholder="Ingresa la Matricula"  required   onKeyPress="return soloNumeros(event)" onkeyup="soloNumeros(this);">
                        <p class="inputError">{{ $errors->first('Codigo') }}</p>
                       </div> 
                      </div>

                      <div class="form-row">

                      <div class="form-group col-md-4">
                        <label for="txtNombre">Nombre</label>
                        <input type="text" id="txtNombre" class="form-control" value="{{old('Nombre')}}" name="Nombre" placeholder="Ingresa Nombre"  required   onKeyPress="return soloLetras(event)" onkeyup="soloLetras(this);">
                        <p class="inputError">{{ $errors->first('Nombre') }}</p>
                      </div>       

                      <div class="form-group col-md-4">
                        <label for="txtapellidoP">Primer Apellido</label>
                        <input type="text" id="txtapellidoP" class="form-control" value="{{old('apellidoP')}}" name="apellidoP" placeholder="Ingresa el primer apellido"  required   onKeyPress="return soloLetras(event)" onkeyup="soloLetras(this);">
                        <p class="inputError">{{ $errors->first('apellidoP') }}</p>
                      </div>
                  
                      <div class="form-group col-md-4">
                        <label for="txtapellidoM">Segundo Apellido</label>
                        <input type="text" id="txtapellidoM" class="form-control" value="{{old('apellidoM')}}" name="apellidoM" placeholder="Ingresa el segundo apellido"  required   onKeyPress="return soloLetras(event)" onkeyup="soloLetras(this);">
                        <p class="inputError">{{ $errors->first('apellidoM') }}</p>
                      </div> 

                      <div class="form-group col-md-4">
                        <label for="txtareaLaboral">Area Laboral</label>
                        <input type="text" id="txtareaLaboral" class="form-control" value="{{old('areaLaboral')}}" name="areaLaboral" placeholder="Ingresa Area Laboral"  required   onKeyPress="return soloLetras(event)" onkeyup="soloLetras(this);">
                        <p class="inputError">{{ $errors->first('areaLaboral') }}</p>
                      </div>

                      <div class="form-group col-md-4">
                        <label for="txtpuesto">Puesto</label>
                        <input type="text" id="txtpuesto" class="form-control" value="{{old('puesto')}}" name="puesto" placeholder="Ingresa el puesto"  required   onKeyPress="return soloLetras(event)" onkeyup="soloLetras(this);">
                        <p class="inputError">{{ $errors->first('puesto') }}</p>
                      </div>                 

                      <div class="form-group col-md-4">
                        <label for="txtInstitucion">Institución</label>
                        <input type="text" id="txtInstitucion" class="form-control" value="{{old('Institucion')}}" name="Institucion" placeholder="Ingresa la Institución"  required   onKeyPress="return soloLetras(event)" onkeyup="soloLetras(this);">
                        <p class="inputError">{{ $errors->first('Institucion') }}</p>
                      </div> 
        </div>
    

    <hr><hr><br>
        

                  {{-- <div class="form-row">

                    <div class="form-group col-md-4">
                      <label for="txtcursoCap">Nombre del curso</label>
                      <input type="text" id="txtcursoCap" class="form-control" value="{{old('cursoCap')}}" name="cursoCap" placeholder="Ingresa el curso"  required   onKeyPress="return soloLetras(event)" onkeyup="soloLetras(this);">
                      <p class="inputError">{{ $errors->first('cursoCap') }}</p>
                    </div> 

                    <div class="form-group col-md-4">
                      <label for="txtNombreInstructor">Nombre del instructor</label>
                      <input type="text" id="txtNombreInstructor" class="form-control" value="{{old('NombreInstructor')}}" name="NombreInstructor" placeholder="Ingresa Nombre"  required   onKeyPress="return soloLetras(event)" onkeyup="soloLetras(this);">
                      <p class="inputError">{{ $errors->first('NombreInstructor') }}</p>
                    </div>

                       <div class="form-group col-md-6">
                        <label for="txtfechaInicial">Fecha Inicial</label>
                         <input type="date" name="txtfechaInicial" class="form-control" value="{{old('fechaInicial')}}" required>
                        <p class="inputError">{{ $errors->first('fechaInicial') }}</p>
                       </div>

                       <div class="form-group col-md-6">
                        <label for="txtfechaFinal">Fecha final</label>
                        <input type="date" name="txtfechaFinal" class="form-control" value="{{old('fechaFinal')}}" required>
                        <p class="inputError">{{ $errors->first('fechaFinal') }}</p>
                       </div>

                        <div class="form-group col-md-4">
                        <label for="txthoras">Horas del curso</label>
                        <input type="text" id="txthoras" class="form-control" value="{{old('horas')}}" name="horas" placeholder="Ingresa horas del curso"  required  onKeyPress="return soloNumeros(event)" onkeyup="soloNumeros(this); ">
                        <p class="inputError">{{ $errors->first('horas') }}</p>
                      </div> 
 --}}
                {{--   </div> --}}
            </div>   
        </div>

    
              <div class="d-flex justify-content-between mb-8"><label>
              <a class="btn btn-primary" role="button" href="{{route('curso.index')}}"><i class="fas fa-arrow-left"></i> Regresar</a></label>
              <div> <label><button type="submit" class="btn btn-primary"><i class="fas fa-save" id="btnComprobar" href="{{route('curso.index')}}"></i> Guardar y continuar</button></label>
                
          </div>
      </form>
@endsection
