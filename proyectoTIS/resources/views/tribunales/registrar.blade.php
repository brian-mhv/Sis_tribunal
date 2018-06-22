@extends ('layouts.master')
@section ('contenido')

<div class="box-body">
    <div class="row">
	    <div class="col-md-12">
                <h2>Proyecto
                    <small> <?php echo $proyecto[0]->codigo;?> </small>
                </h2>
                <div class="box box-primary">
                </div>
                <table class="table">
                    <thread>
                    <tr>
                        <td>CODIGO</td>
                        <td>TUTOR</td>
                        <td>POSTULANTE</td>
                        <td>ESTADO</td>
                        <td>MODALIDAD</td>
                        <td>AREAS</td>
                    </tr>
                    </thread>
                    <tbody>
                    <tr>
                        <td><?php echo $proyecto[0]->codigo; ?></td>
                        <td><?php echo $proyecto[0]->cod_prof;?> <?php echo $proyecto[0]->apellido_paterno;?> <?php echo $proyecto[0]->apellido_materno;?></td>
                        <td><?php echo $proyecto[0]->cod_alumno;?> <?php echo $proyecto[0]->apellido_pat;?> <?php echo $proyecto[0]->apellido_mat;?></td>
                        <td><?php echo $proyecto[0]->estado; ?></td>
                        <td><?php echo $proyecto[0]->cod_modalidad; ?></td>
                        <td>
                            @foreach($areas as $area)
                                <label><?php echo $area->nombre_area; ?></label><br>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
                </table>
                <form action="../tribunales/<?php echo $proyecto[0]->codigo;?>" method='GET'>
                    <input style="width:50%; background-position:center;" type='text' placeholder=' Buscar profesional por areas de especializacion' name='area'>
                    <input type="submit" class="btn btn-primary" value="Buscar">
                </form>
                
                @if($filter !== NULL)
                <h2><small> Profesionales Candidatos </small></h2>

                <form id="form" action="../tribunales/" method="POST" role="form">
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
                    
                    <div>
                        <input id="candidato1" type="hidden" name="candidato1">
                        <input id="candidato2" type="hidden" name="candidato2">
                        <input id="candidato3" type="hidden" name="candidato3">
                        <input type="hidden" name="tesis" value="<?php echo $proyecto[0]->codigo; ?>">
                        <label>Fecha de Defensa</label>
                        <input type="date" name="fecha" class="form-control"><br>
                        <label>Nro de Sesion del HCC</label>
                        <input type="text" name="hcc" class="form-control">
                    </div>

                    <div class="form-group">
                    <a><input type="submit" id="guardar" class="btn btn-primary right" disabled value="Guardar"></a>
                    </div>

                </form>
                                
                <div class="box box-primary">
                </div>
                <table class="table">
                    <thread>
                    <tr>
                        <td>ID</td>
                        <td>PROFESIONAL</td>
                        <td>CANT. TRIBUNALES</td>
                        <td>OPCION</td>
                    </tr>
                    </thread>
                    <tbody>
                    @foreach($filter as $prof)
                    <tr>
                        <td><?php echo $prof->codigo; ?></td>
                        <td><?php echo $prof->nombre;?> <?php echo $prof->apellido_paterno;?> <?php echo $prof->apellido_materno;?></td>
                        <td><?php echo $prof->id_profesional;?></td>
                        
                        <!--td> 
                        <div role="group" class="btn-group">
                          <button id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-outline-primary dropdown-toggle dropdown-menu-right"><i class="icon-cog3 icon-left"></i>Opciones</button>
                          <div aria-labelledby="btnGroupDrop1" class="dropdown-menu">
                            <a href="{{ url ('/vacation/aceptado')}}" class="dropdown-item">Añadir</a>
                            <a href="{{url('/vacation/deny')}}" class="dropdown-item">Quitar</a></div>
                          </div>
                         </div>
                       </td-->
                        <td><input class="btn btn-primary" type="submit" id="<?php echo $prof->codigo;?>" value="Añadir"></td>
                         <script>
                            $candidatos = [];
                            document.getElementById("<?php echo $prof->codigo; ?>").addEventListener("click", function( event ) {                        
                                /*if($candidatos.indexOf(<?php echo $prof->codigo; ?>) >= 0){
                                    $candidatos.pop(<?php echo $prof->codigo; ?>);
                                    document.getElementById(<?php echo $prof->codigo; ?>).value = "Añadir";
                                    document.getElementById(<?php echo $prof->codigo; ?>).className = "btn btn-primary";
                                    console.log($candidatos);
                                }*/
                                if($candidatos.length < 3 && $candidatos.indexOf(<?php echo $prof->codigo; ?>) < 0){ 
                                                        
                                    $candidatos.push(<?php echo $prof->codigo; ?>);
                                    document.getElementById(<?php echo $prof->codigo; ?>).value = "Quitar";
                                    document.getElementById(<?php echo $prof->codigo; ?>).className = "btn btn-default";
                                    console.log($candidatos);
                                }
                                else{
                                    if($candidatos.indexOf(<?php echo $prof->codigo; ?>) >= 0){
                                    $candidatos.pop(<?php echo $prof->codigo; ?>);
                                    document.getElementById(<?php echo $prof->codigo; ?>).value = "Añadir";
                                    document.getElementById(<?php echo $prof->codigo; ?>).className = "btn btn-primary";
                                    console.log($candidatos);
                                    }
                                    else{
                                        alert("Usted selecciono 3 profesionales.");
                                    }
                                }
                                if($candidatos.length == 3){
                                        document.getElementById("guardar").disabled = null;
                                        document.getElementById("candidato1").value = $candidatos[0];
                                        document.getElementById("candidato2").value = $candidatos[1];
                                        document.getElementById("candidato3").value = $candidatos[2];
                                    }
                                else{document.getElementById("guardar").disabled = 'disabled';}
                            });
                        </script>
                    </tr>
                    @endforeach
                </tbody>
                </table>
                
                @endif
            </div>
        </div>
    </div>
@stop
