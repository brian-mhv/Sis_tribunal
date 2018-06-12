@extends ('layouts.master')

@section ('contenido')
<section class="content-header">
         
          <h1>
            Cantidad de Proyecto - <i class="fa fa-list-alt"></i>
         </h1>
         
        </section>
<div class="col-xs-12">
              <div class="box box-success">
                <div class="box-header">
                  <h3 class="box-title">Tribunal</h3>
                 <div class="box-tools">
                    <div class="input-group" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Buscar Profesional">
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr class="success">
                      <th>Codigo</th>
                      <th>Proyecto</th>
                      <th>Profesional 1</th>
                      <th>Profesional 2</th>
                      <th>Profesional 3</th>
                      <th>Fecha de Inicio</th>
                      <th>Fecha de Defensa</th>
                      <th>Estado</th>
                    </tr>
                    <tr>
                      <td>183</td>
                      <td>Base de Datos</td>
                        <td>Samuel Acha Perez</td>
                        <td>Felipe A M</td>
                        <td>Luis P M</td>
                        <td>19-12-2017</td>
                        <td>20-05-2018</td>
                      <td><span class="label label-success">Aprobado para defensa</span></td>
                    </tr>
                    <tr>
                      <td>219</td>
                      <td>Robotica</td>
                      <td>Samuel Acha Perez</td>
                        <td>Jaime G H</td>
                        <td>Critofer</td>
                        <td>05-05-2018</td>
                        <td>25-10-2018</td>
                      <td><span class="label label-warning">Proceso de Revision</span></td>
                      
                    </tr>
                    <tr>
                      <td>657</td>
                      <td>Cimone D F</td>
                      <td>Samuel Acha Perez</td>
                        <td>Tatiana Aparacio Yuja</td>
                        <td>Jhonny Arias Tapia</td>
                        <td>05-11-2017</td>
                        <td>15-05-2018</td>
                      <td><span class="label label-default">Proyeto Defendido</span></td>
                    </tr>
                    <tr>
                      <td>175</td>
                      <td>telemtaticos</td>
                       <td>Critian g b</td>
                        <td>Samuel Acha Perez</td>
                        <td>Jhonny Arias Tapia</td>
                        <td>05-02-2016</td>
                        <td>----</td>
                      <td><span class="label label-danger">Proyecto Suspendido</span></td>                     
                    </tr>
                  </table>
                </div><!-- /.box-body -->
                    
              </div><!-- /.box -->
            </div>
            <div class="social-auth-links">
                     
                      <a href="#reestablecer" data-toggle="modal"><h4>Ver Cantidad Total de Proyecto Profesional</h4></a><br>     
                      <div class="modal fade" id="reestablecer">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4>Cantidad de Proyecto Asignados</h4>
                                </div>
                                <div class="modal-body">
                                  <form>
                                    <div class="form-group">
                                      <table class="table table-hover">
                                                <tr class="success">
                                                  <th>Profesional</th>
                                                  <th>Cantidad Proyectos</th>
                                                  <th>Proyectos Activos</th>
                                                  <th>Proyectos Desactivos</th>
                                                  <th>Limete de Proyectos</th>
                                                  <th>Posible Tribunal</th>
                                                </tr>
                                                <tr>
                                                  <td>Samuel Acha Perez</td>
                                                  <td>4</td>
                                                  <td>2</td>
                                                <td>2</td> 
                                                  <td>5</td>                                        
                                                  <td><span class="label label-success">Habilitado</span></td>
                                              </table>
                                    </div>
                                    <div class="form-group">                                      
                                      <input type="submit" href="#dialogo" class="btn btn-primary" value="Volver" data-toggle="modal">
                                    </div>
                                  </form>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
@endsection