@extends ('layouts.master')
@section ('contenido')

<h2>Registro 
    <small> Estudiante </small>
</h2>
<div class="box box-primary"></div>
<div class="container-fluid">                       

    <!--Añadir contenido-->
    <form id="form" action="/estudiantes" method="POST" role="form">
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
        <label>Correo Electronico</label>
        <input name="correo" type="text" class="form-control">
      </div>
      <div class="form-group">
        <label>Carrera</label>
          <select name="carrera" class="form-control">
          <?php foreach($carreras as $rows) {?>
          <option value="<?php echo $rows->codigo;?>">
          <?php echo($rows->nombre); ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="form-group">
        <label>Codigo Sis</label>
        <input name="sis" class="form-control">
      </div>
      <div class="form-group">
        <label>Carnet de Identidad</label>
        <input name="carnet" class="form-control">
      </div>
      <div class="form-group">
        <label>Telefono o Celular</label>
        <input name="telefono" class="form-control">
      </div>
      <div class="form-group">
        <label>Direccion</label>
        <input name="direccion" class="form-control">
      </div>
      <div class="form-group">
        <a href="#dialogo" class="btn btn-primary" data-toggle="modal">Registrar</a>
        <div class="modal fade" id="dialogo">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4>Desea registrar al estudiante?</h4>
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