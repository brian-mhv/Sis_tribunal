@extends ('layouts.master')

@section ('contenido')
<h2>Registrar
    <small>Cargar informacion del Profesional - Docente </small>
</h2>
<div class="box box-primary"></div>
<div class="container-fluid">                       

    <!--Añadir contenido-->
    <div class="panel-header">
              <div class="box-header hidden-xs hidden-sm">
                  <h3 class="box-title">Importar Docentes</h3>
                  <form class="form-control" action="../docentes/" method="POST" role="form" enctype="multipart/form-data">
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
                      <input name="file" type="file" placeholder="Ingrese el archivo que desea importar">
                    </div>
                
                    <div class="form-group">
                      <a href="#dialogo" class="btn btn-primary" data-toggle="modal">Registrar</a>
                      <div class="modal fade" id="dialogo">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h4>Desea registrar el lote de docentes?</h4>
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
      <div class="panel-body">
      <table class="table">
          <thead>
            <tr>
              <th>Email</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>john@example.com</td>
            </tr>
          </tbody>
        </table>
      </div>
    <!--Fin contenido-->

</div>
@endsection