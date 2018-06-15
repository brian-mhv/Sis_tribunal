@extends ('layouts.master')
@section ('contenido')

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
                        <td id="tribunal"><?php echo $tribunal->idTribunal; ?></td>
                        <td id="tesis"><?php echo $tribunal->id_tesis; ?></td>
                        @foreach ($profesional as $prof)
                        @if ($prof->codigo == $tribunal->id_profesional1 || $prof->codigo == $tribunal->id_profesional2 || $prof->codigo == $tribunal->id_profesional3)
                            <td><?php echo $prof->nombre;?> <?php echo $prof->apellido_paterno;?> <?php echo $prof->apellido_materno;?></td>
                        @endif
                        @endforeach
                        <td><?php echo $tribunal->fecha_defensa; ?></td>
                        <td><span class="label label-warning">Esperando Asignacion</span></td>
                    </tbody>
                    </table>
                <br><br>
                    <div class="box box-primary">
                    </div>

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
                        <input id="trib" type="hidden" name="tribunal">
                        <input id="tes" type="hidden" name="tesis">
                        <input id="profesional" type="hidden" name="profesional" value="<?php echo $p; ?>">
                        <input id="newprof" type="hidden" name="newprof">
                    </div>

                    <div class="form-group">
                    <a><input type="submit" id="guardar" class="btn btn-primary right" disabled value="Guardar"></a>
                    </div>

                </form>

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
                                console.log(document.getElementById('tribunal').innerHTML);
                                console.log(document.getElementById('tesis').innerHTML);
                                if($candidatos.length == 0){ 
                                                        
                                    $candidatos.push(<?php echo $prof->codigo; ?>);
                                    document.getElementById(<?php echo $prof->codigo; ?>).value = "Quitar";
                                    document.getElementById(<?php echo $prof->codigo; ?>).className = "btn btn-default";
                                    console.log($candidatos);
                                    if($candidatos.length == 1){
                                        document.getElementById("guardar").disabled = null;
                                        document.getElementById("trib").value = document.getElementById('tribunal').innerHTML;
                                        document.getElementById("tes").value = document.getElementById('tribunal').innerHTML;
                                        document.getElementById("newprof").value = $candidatos[0];
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