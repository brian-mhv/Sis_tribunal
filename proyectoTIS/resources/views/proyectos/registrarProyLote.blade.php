@extends ('layouts.master')

@section ('contenido')

<h2>Registrar 
    <small> Cargar Informacion </small>
</h2>
 

  <div class="container-fluid">                       
    <form  action="../tesis/" method="POST" role="form" enctype="multipart/form-data">
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
                    <!--####################################################################################-->

                    <div class="box box-primary"></div>

                          <div class="row">

                            <!--proyectos-->
                            <div class="col-sm-6">
                              <div class="box box-warning">
                                <div class="box-header with-border">

                                  <h3 class="box-title">Proyectos / Tesis</h3>
                                  <span class="label label-warning pull-right"><i class="fa fa-html5"></i></span>
                                </div>
                                <div class="bg-yellow disabled color-palette">
                                  <div class="modal-body">
                                  <div class="form-group">
                                    <label>Ingrese archivo .csv de los proyectos de grado</label>
                                    <input name="proyectos" type="file" placeholder="Ingrese el archivo que desea importar">
                                  </div>
                                </div>  
                                </div>
                                
                              </div> 
                            </div>
                            <!--Profesionales Tesis-->
                            <div class="col-sm-6">
                              <div class="box box-success">
                                <div class="box-header with-border">
                                  <h3 class="box-title">Profesionales e tesis</h3>
                                  <span class="label label-success pull-right"><i class="fa fa-html5"></i></span>
                                </div>
                                <div class="modal-body">
                                  <div class="form-group">
                                    <label>Ingrese archivo .csv de la tabla profesionales/tesis</label>
                                    <input name="proftesis" type="file" placeholder="Ingrese el archivo que desea importar">
                                  </div>
                                </div>
                              </div> 
                            </div>
                            <!--Estudiante tesis-->
                            <div class="col-sm-6">
                              <div class="box box-info">
                                <div class="box-header with-border">
                                  <h3 class="box-title">Estudiante e tesis</h3>
                                  <span class="label label-info pull-right"><i class="fa fa-html5"></i></span>
                                </div>
                                <div class="modal-body">
                                  <div class="form-group">
                                    <label>Ingrese archivo .csv de la tabla estudiantes/tesis</label>
                                    <input name="esttesis" type="file" placeholder="Ingrese el archivo que desea importar">            
                                  </div>
                                </div>
                              </div> 
                            </div>
                            <!--Area Tesiss-->
                            <div class="col-sm-6">
                              <div class="box box-danger">
                                <div class="box-header with-border">
                                  <h3 class="box-title">Area e tesis</h3>
                                  <span class="label label-danger pull-right"><i class="fa fa-html5"></i></span>
                                </div>
                                <div class="modal-body">
                                  <div class="form-group">
                                    <label>Ingrese archivo .csv de la tabla areas/tesis</label>
                                    <input name="areastesis" type="file" placeholder="Ingrese el archivo que desea importar">
                                    
                                </div>
                              </div> 
                            </div>
                            
                          </div> 
                    </div>  

                    <div class="form-group">
                      <a href="#dialogo" class="btn btn-primary" data-toggle="modal">Registrar</a>
                      <div class="modal fade" id="dialogo">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h4>Desea cargar datos</h4>
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

@endsection