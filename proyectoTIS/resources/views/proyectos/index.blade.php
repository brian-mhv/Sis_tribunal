@extends ('layouts.master')
@section ('contenido')

<div class="box-body">
    <div class="row">
                  <div class="col-md-12">

                <div class ="box-header with-border">
                <h2><i class ="fa fa-fw fa-list-ul"></i> - Lista de Proyectos</h2>
                    <div class="box-tools pull-right">
                        <div class="social-auth-links">                     
                          <a href="#reestablecer" class="btn btn-sm btn-info btn-flat" data-toggle="modal"><h5>Registrar por Lote [ <i class ="fa fa-fw fa-upload"> ]</i></h5></a><br>     
                      
                      <div class="modal fade" id="reestablecer">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="bg-teal color-palette">
                                    <div class="modal-header">
                                        <h3>Cargar informacion de los Proyecto/Tesis - <i class ="fa fa-fw fa-upload"></i></h3> 
                                        
                                    </div>    
                                </div>

                                <div class="modal-body">   

                                
                                     <div class="panel-header">
                                          <div class="box-header hidden-xs hidden-sm">
                                              
                                                  
                                              
                                              <form action="../tesis/" method="POST" role="form" enctype="multipart/form-data">

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
                                                      <!--input name="file" type="file" placeholder="Ingrese el archivo que desea importar"-->
                                                      <input name="proyectos" type="file" placeholder="Ingrese el archivo que desea importar">                                            

                                                       <p class="help-block">Solo se permite : "archivo.csv"</p>

                                                      
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <div class="modal-footer">     
                                                         <div class="box box-primary"></div>                                
                                                            <input type="submit" class="btn btn-sm btn-info btn-flat" value="Guardar">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                        </div>
                                                    </div>                                              
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

            <div class="panel-body">
                <form action="../tesis/" method="GET" role="form">
                    <input name="filtro" type="text" class="form-control" placeholder="Buscar proyecto">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </form>
            </div>    

                <div class="box box-primary">
                </div>
                <table class="table table-hover">
                    <tr class="success">
                        <td>ID</td>
                        <td>TUTOR</td>
                        <td>POSTULANTE</td>
                        <td>TITULO PROYECTO</td>
                        <td>MODALIDAD</td>
                        <td>ESTADO</td>
                        <td>TRIBUNAL</td>
                    </tr>
                    <tbody>
                        <?php
                        foreach($proyectos as $rows) {?>
                    <tr>
                        <td><?php echo $rows->codigo; ?></td>
                        <td><?php echo $rows->cod_prof;?> <?php echo $rows->apellido_paterno;?> <?php echo $rows->apellido_materno;?></td>
                        <td><?php echo $rows->cod_alumno;?> <?php echo $rows->apellido_pat;?> <?php echo $rows->apellido_mat;?></td>
                        <td style="width:30%"><?php echo $rows->nombre; ?></td>
                        <td><?php echo $rows->cod_modalidad; ?></td>
                        @if($rows->estado == 1)
                        <td><span class="label label-warning">Esperando Asignacion</span></td>
                        <td><a href="../tribunales/<?php echo $rows->codigo;?>" class="btn btn-primary">Asignar</a></td>
                        @endif
                        @if($rows->estado == 2)
                        <td><span  class="label label-success">Tribunal Asignado</span></td>
                        @endif
                        @if($rows->estado == 'finalizado')
                        <td><span class="label label-default">Proyecto Defendido</span></td>
                        @endif
                        
                    </tr>
                    <?php }?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
@stop