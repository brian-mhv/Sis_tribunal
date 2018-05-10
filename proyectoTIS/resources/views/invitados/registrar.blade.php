@extends ('layouts.master')

@section ('contenido')
<h2>Registro 
    <small> Profesional - Invitado </small>
</h2>
<div class="box box-primary"></div>
<div class="container-fluid">                       

    <!--Añadir contenido-->
    <form role="form">
      <div class="form-group">
        <label>Nombres</label>
        <input class="form-control" placeholder="Introduzca el nombre">
      </div>
      <div class="form-group">
        <label>Apellido Paterno</label>
        <input class="form-control" placeholder="Introduzca apellido paterno">
      </div>
      <div class="form-group">
        <label>Apellido Materno</label>
        <input class="form-control" placeholder="Introduzca apellido materno">
      </div>
      <div class="form-group">
        <label>Correo Electronico</label>
        <input class="form-control" placeholder="Introduzca el correo">
      </div>
      <div class="form-group">
        <label>Titulo</label>
        <input class="form-control" placeholder="Titulo del profesional">
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