@extends ('layouts.master')
@section ('contenido')

<div class="box-body">
    <div class="row">
	    <div class="col-md-12">
                <h2>Tribunales</h2>
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
                        <?php
                        foreach($tribunal as $rows) {?>
                    <tr>
                    
                        <td><?php echo $rows->idTribunal; ?></td>
                        <td><?php echo $rows->id_tesis; ?></td>
                        @foreach ($profesional as $prof)
                        @if ($prof->codigo == $rows->id_profesional1 || $prof->codigo == $rows->id_profesional2 || $prof->codigo == $rows->id_profesional3)
                            <td><?php echo $prof->nombre;?> <?php echo $prof->apellido_paterno;?> <?php echo $prof->apellido_materno;?> 
                            <a href="../tesis/<?php echo $rows->id_tesis; ?>"><i id="<?php echo $prof->codigo; ?>" class="fa fa-exchange"></i></a>
                            <script>
                                
                                document.getElementById("<?php echo $prof->codigo; ?>").addEventListener("click", function( event ) {
                                // display the current click count inside the clicked div
                                    console.log("<?php echo $prof->codigo; ?>");
                                    document.getElementById("filtro").style= " ";
                                });
                            </script>
                            </td>
                        @endif
                        @endforeach
                        <td><?php echo $rows->fecha_defensa; ?></td>
                        <td>
                        @if($rows->estado == 1)
                        <span class="label label-success">Aprobado para defensa</span>
                        @endif
                        @if($rows->estado == 'Proceso de revision')
                        <span class="label label-warning">Proceso de Revision</span>
                        @endif
                        @if($rows->estado == 'finalizado')
                        <span class="label label-default">Proyeto Defendido</span>
                        @endif
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
                </table>
                <br>
              </div>

              <div id="filtro" style="display:none;">
                <form action="../tribunales/" method='GET'>
                    <input style="width:50%; background-position:center;" type='text' value="<?php echo $rows->id_tesis; ?>" name='area'>
                    <input type="submit" class="btn btn-primary" value="Buscar">
                </form>
              </div>

            </div>
        </div>
    </div>
@stop