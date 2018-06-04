@extends ('layouts.master')

@section ('contenido')
<h2>Registrar Areas por Lote
    <small> Contenido </small>
</h2>
<div class="box box-primary"></div>
<div class="container-fluid">                       

    <!--Añadir contenido-->
    <div class="panel-header">
      <div class="box-header hidden-xs hidden-sm">
        <h3 class="box-title">Importar Areas</h3>
        <form action="ImportAreaController.php" method="POST" enctype="multipart/form-data">
            <center>
            <table>
                <tr>
                    <td class="letra" width="250"><strong>Subir Archivo CSV:</strong></td>  
                    <td><input type="file" name="foto" id="foto"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="enviar" value="SUBIR" class="boton"></td>
                </tr>            
                </table>
            </center>
        </form>  

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
              <th>Nombre</th>
              <th>Descripcion</th>
              <th>Sub-Areas</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>John</td>
              <td>Doe</td>
              <td>john@example.com</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <!--Fin contenido-->

</div>
@endsection