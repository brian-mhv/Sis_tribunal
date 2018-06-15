@extends ('layouts.master')
@section ('contenido')

<div class="box box-primary">
</div>
              <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr class="success">
                      <th>ID</th>
                      <th>Proyecto</th>
                      <th>Profesional 1</th>
                      <th>Profesional 2</th>
                      <th>Profesional 3</th>
                      <th>Fecha de Defensa</th>
                      <th>Estado</th>
                    </tr>
                    <tbody>
                        <td><?php echo $tribunal->idTribunal; ?></td>
                        <td><?php echo $tribunal->id_tesis; ?></td>
                        <td><?php echo $tribunal->id_profesional1; ?></td>
                        <td><?php echo $tribunal->id_profesional2; ?></td>
                        <td><?php echo $tribunal->id_profesional3; ?></td>
                        <td><?php echo $tribunal->fecha_defensa; ?></td>

                    </tbody>

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
                                if($candidatos.length < 3){ 
                                                        
                                    $candidatos.push(<?php echo $prof->codigo; ?>);
                                    document.getElementById(<?php echo $prof->codigo; ?>).value = "Quitar";
                                    document.getElementById(<?php echo $prof->codigo; ?>).className = "btn btn-default";
                                    console.log($candidatos);
                                    if($candidatos.length == 3){
                                        document.getElementById("guardar").disabled = null;
                                        document.getElementById("candidato1").value = $candidatos[0];
                                        document.getElementById("candidato2").value = $candidatos[1];
                                        document.getElementById("candidato3").value = $candidatos[2];
                                    }
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
                            });
                        </script>
                    </tr>
                    @endforeach
                </tbody>
                </table>

@stop