@extends ('layouts.master')

@section ('contenido')
<h2>Registro 
    <small> Proyecto de Grado </small>
</h2>
<div class="box box-primary"></div>
<div class="container-fluid">                       

    <!--Añadir contenido-->
    <form role="form">
  <div class="form-group">
    <label>Titulo delProyecto final</label>
    <input class="form-control"
           placeholder="Introduce tu nombre">
  </div>
  <div class="form-group">
    <label>Nombre del tutor</label>
    <input type="file" class="form-control" placeholder="Descripcion">
  </div>
  <div class="form-group">
    <label for="sub-area">Apellido paterno del tutor</label>
    <input type="file" id="sub-area">
  </div>
  <div class="form-group">
    <label for="sub-area">Apellido materno del tutor</label>
    <input type="file" id="sub-area">
  </div>
  <div class="form-group">
    <label for="sub-area">Nombre del Postulante</label>
    <input type="file" id="sub-area">
  </div>
  <div class="form-group">
    <label for="sub-area">Apellido paterno del postulante</label>
    <input type="file" id="sub-area">
  </div>
  <div class="form-group">
    <label for="sub-area">Apellido materno del postulante</label>
    <input type="file" id="sub-area">
  </div>
  </div>
  <div class="form-group">
    <label for="sub-area">Objetivo del Proyecto</label>
    <select class="form-control">
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
    <label for="sub-area">Modalidad de Titulacion</label>
    <select class="form-control">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
    </select>
  </div>
  <div class="form-group">
    <label for="sub-area">Carrera</label>
    <select class="form-control">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
    </select>
  </div>
  <button type="submit" class="btn btn-default">Enviar</button>
</form>
    <!--Fin contenido-->

</div>
@endsection