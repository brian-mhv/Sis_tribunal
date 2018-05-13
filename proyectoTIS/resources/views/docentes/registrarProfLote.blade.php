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
                  <h3 class="box-title">Impotar Docentes</h3>
                  <form class="form-inline pull-right row">
                      <ng-csv-import
                          content="csv.content"
                          material
                          md-button-class="col-md-2 btn btn-primary fa fa-upload"
                          md-input-class="col-md-9"
                          header="csv.header"
                          separator="csv.separator"
                          result="csv.result"
                          accept="csv.accept"
                          callback="$ctrl.loadContent">
                      </ng-csv-import>
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