@extends ('layouts.master')

@section ('contenido')
<h2>Registro 
    <small> Profesional - Invitado </small>
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
        <input name="correo" type="text" class="form-control" placeholder="Introduzca apellido materno">
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
      <label>Areas afin</label><a href="../areas/registrar"> <i class="fa fa-plus"> </i></a>
      <select name="area" class="form-control">
      <?php foreach($areas as $rows) {?>
          <option value="<?php echo $rows->idArea; ?>">
          <?php printf($rows->nombre_area);?></option>
      <?php } ?>
      </select>
    </div>
      <div class="form-group">
        <a href="#dialogo" class="btn btn-primary" data-toggle="modal">Registrar</a>
        <div class="modal fade" id="dialogo">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4>Desea registrar al profesional?</h4>
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