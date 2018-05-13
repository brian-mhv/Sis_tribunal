@extends ('layouts.master')
@extends ('layouts.master')

@section ('contenido')
<h2>Registro 
    <small> Profesional - Docente </small>
</h2>
<div class="box box-primary"></div>
<div class="container-fluid">                       

    <form id="form" action="/docentes" method="POST" role="form">
        {{ csrf_field() }}
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
      <div class="form-group">
        <label>Nombres</label>
        <input name="nombre" class="form-control" placeholder="Introduzca el nombre">
      </div>
      <div class="form-group">
        <label>Apellido Paterno</label>
        <input name="apPat" class="form-control" placeholder="Introduzca apellido paterno">
      </div>
      <div class="form-group">
        <label>Apellido Materno</label>
        <input name="apMat" class="form-control" placeholder="Introduzca apellido materno">
      </div>
      <div class="form-group">
        <label>Carnet de Identidad</label>
        <input name="carnet" class="form-control" placeholder="Introduzca apellido materno">
      </div>
      <div class="form-group">
        <label>Correo Electronico</label>
        <input name="correo" type="text" class="form-control" placeholder="Introduzca el email">
      </div>
      <div class="form-group">
        <label>Carga Horaria</label>
        <select name="carga" class="form-control">
          <option value="Tiempo Completo">Tiempo Completo</option>
          <option value="Tiempo Parcial">Tiempo Parcial</option>
        </select>
      </div>
      <div class="form-group">
        <label>telefono</label>
        <input name="telefono" type="text" class="form-control" placeholder="Introduzca el telefono">
      </div>
      <div class="form-group">
        <label>Titulo</label>
        <select class="form-control" name="titulo">    
          <option value="1">Lic.</option>    
          <option value="2">Ing.</option>    
          <option value="3">Msc.</option>    
          <option value="4">Msc. Lic.</option>    
          <option value="5">Msc. Ing.</option>  
          <option value="6">Doc.</option>
        </select>
      </div>
      <div class="form-group">
        <label>Direccion</label>
        <input name="direccion" type="text" class="form-control" placeholder="Introduzca apellido materno">
      </div>
      <div class="form-group">
        <label for="sub-area">Area afin</label>
        <input class="form-control" id="sub-area">
      </div>
      <div class="form-group">
      <a href="#dialogo" class="btn btn-primary" data-toggle="modal">Registrar</a>
      <div class="modal fade" id="dialogo">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4>Desea registrar al docente?</h4>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                      <input type="submit" class="btn btn-primary" value="Guardar">
                  </div>
              </div>
          </div>
      </div>
      </div>
    </form>
</div>
@stop