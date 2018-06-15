@extends ('layouts.master')
@section ('contenido')

<div class="box-body">
    <div class="row">
        <div class="col-md-12">

             <div class ="box-header with-border">
                 <h2><i class ="fa fa-fw fa-list-ul"></i> - Lista de Estudiantes </h2>                
                     <div class="box-tools pull-right">
                        <div class="social-auth-links">                     
                            <a href="#reestablecer" class="btn btn-sm btn-info btn-flat" data-toggle="modal"><h5>Registrar por Lote [ <i class ="fa fa-fw fa-upload"> ]</i></h5></a><br>

                         <div class="modal fade" id="reestablecer">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="bg-teal color-palette">
                                        <div class="modal-header">
                                            <h3>Cargar informacion del Estudiante - <i class ="fa fa-fw fa-upload"></i></h3>
                                        </div>    
                                    </div>

                                    <div class="modal-body">   
                                        <div class="panel-header">
                                            <div class="box-header hidden-xs hidden-sm">
                                                
                                                <form action="../estudiantes/" method="POST" role="form" enctype="multipart/form-data">
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


                                                    <div class="form-group has-warning">
                                                        <label class="control-label" for="inputWarning"> <i class="fa fa-warning"></i> Advertencia !!!...</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <input name="file" type="file" placeholder="Ingrese el archivo que desea importar">
                                                        <p class="help-block">Solo se permite : "archivo.csv"</p>
                                                    </div>
                                                
                                                <div class="form-group">
                                                    <div class="modal-footer">     
                                                     <div class="box box-primary"></div>                                
                                                        <input type="submit" class="btn btn-sm btn-info btn-flat" value="Guardar">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                    </div>
                                                </div>
<!--cosas antes-->
                                                </form>
                                                </div>
                                            </div>                                     
                                        </div>
                               
                                    </div>
                                </div>
                            </div>
                       
                        </div>
                    </div>
            </div> 


                                                    <!--div class="form-group">
                                                      <input name="file" type="file" placeholder="Ingrese el archivo que desea importar">
                                                    </div>
                                                
                                                    <div class="form-group">
                                                      <a href="#dialogo" class="btn btn-primary" data-toggle="modal">Registrar</a>
                                                      <div class="modal fade" id="dialogo">
                                                          <div class="modal-dialog">
                                                              <div class="modal-content">
                                                                  <div class="modal-header">
                                                                      <h4>Desea registrar el lote de Estudiante?</h4>
                                                                  </div>
                                                                  <div class="modal-footer">
                                                                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                                      <input type="submit" class="btn btn-primary" value="Guardar">
                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </div>
                                                    </div>
                                                  
                                                  </form-->

                        <div class="box box-primary">
                        </div>
                        <table class="table table-hover">
                            <thread>
                            <tr class="bg-purple color-palette">
                                <td>ID</td>
                                <td>COD. SISS</td>
                                <td>NOMBRE</td>
                                <td>AP. PATERNO</td>
                                <td>AP. MATERNO</td>
                                <td>CORREO</td>
                            </tr>
                            </thread>
                            <tbody>
                                <?php

                                foreach($estudiantes as $rows) {?>
                            <tr>
                                <td><?php echo $rows->codigo; ?></td>
                                <td><?php echo $rows->cod_sis; ?></td>
                                <td><?php echo $rows->nombre; ?></td>
                                <td><?php echo $rows->apellido_pat; ?></td>
                                <td><?php echo $rows->apellido_mat; ?></td>
                                <td><?php echo $rows->correo; ?></td>
                            </tr>
                            <?php }?>
                        </tbody>
                        </table>
                    </div>  
                   </div>
            </div>


            </div>
        </div>
    </div>
@stop