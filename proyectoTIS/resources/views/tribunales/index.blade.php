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
                        @if ($prof->codigo == $rows->id_profesional1)
                            <td><?php echo $rows->id_profesional1; ?></td>
                        @endif
                        @endforeach
                        @foreach ($profesional as $prof)
                        @if ($prof->codigo == $rows->id_profesional2)
                            <td><?php echo $rows->id_profesional2; ?></td>
                        @endif
                        @endforeach
                        @foreach ($profesional as $prof)
                        @if ($prof->codigo == $rows->id_profesional3)
                            <td><?php echo $rows->id_profesional3; ?></td>
                        @endif
                        @endforeach
                        <td><?php echo $rows->fecha_defensa; ?></td>
                        <td><?php echo $rows->estado; ?></td>
                    </tr>
                    <?php }?>
                </tbody>
                </table>
              </div>
            </div>
        </div>
    </div>
@stop