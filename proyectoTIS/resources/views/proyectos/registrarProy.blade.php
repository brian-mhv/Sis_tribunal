@extends ('layouts.master')
@section ('contenido')
<h2>Registro 
    <small> Proyecto de Grado </small>
</h2>
<div class="box box-primary"></div>
<div class="container-fluid">                       
    <!--Añadir contenido-->
    <form id="form" action="/invitados" method="POST" role="form">
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
    <label>Titulo del Proyecto Final</label>
    <input name="proyecto" class="form-control" placeholder="Introduce titulo del proyecto">
  </div>
  <div class="form-group">
    <label>Nombre del Tutor</label>
    <input name="tutor" class="form-control" placeholder="Nombres del tutor del proyecto">
  </div>
  <div class="form-group">
    <label for="sub-area">Apellido paterno del tutor</label>
    <input name="appTutor" class="form-control">
  </div>
  <div class="form-group">
    <label for="sub-area">Apellido materno del tutor</label>
    <input name="apmTutor" class="form-control">
  </div>
  <div class="form-group">
    <label for="sub-area">Nombre del Postulante</label>
    <input name="postulante" class="form-control">
  </div>
  <div class="form-group">
    <label for="sub-area">Apellido paterno del postulante</label>
    <input name="appPost" class="form-control">
  </div>
  <div class="form-group">
    <label for="sub-area">Apellido materno del postulante</label>
    <input name"apmPost" class="form-control">
  </div>
  <div class="form-group">
    <label for="sub-area">Modalidad de Titulacion</label>
    <select name="modalidad" class="form-control">
        <option value="1">Trabajo Dirigido</option>
        <option value="2">Proyecto de Grado</option>
        <option value="3">Adscripcion</option>
        <option value="4">Proyecto de Investigacion (Tesis)</option>
        <option value="5">Excelencia</option>
    </select>
  </div>
  <div class="form-group">
    <label for="sub-area">Carrera</label>
    <select name="carrera" class="form-control">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
    </select>
  </div>
  <div class="form-group">
    <label for="sub-area">Areas</label>
    <select class="form-control">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
    </select>
  </div>
  <div class="form-group">
        <a href="#dialogo" class="btn btn-primary" data-toggle="modal">Registrar</a>
        <div class="modal fade" id="dialogo">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4>Desea registrar el proyecto?</h4>
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
    <!--Fin contenido-->

</div>
@endsection