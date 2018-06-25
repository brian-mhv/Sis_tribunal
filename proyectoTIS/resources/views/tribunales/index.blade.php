@extends ('layouts.master')
@section ('contenido')

<div class="box-body">
    <div class="row">
	    <div class="col-md-12">
                <h2>Tribunales</h2>
                <div class="box box-primary">
                </div>
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thread>
                    <tr class="success">
                      <th>ID</th>
                      <th>Proyecto</th>
                      <th>Profesional 1</th>
                      <th>Profesional 2</th>
                      <th>Profesional 3</th>
                      <th>Fecha de Defensa</th>
                      <th>NRO. HCC.</th>
                    </tr>
                    </thread>
                    <tbody>
                        <?php
                        foreach($tribunal as $rows) {?>
                    <tr>
                    
                        <td><?php echo $rows->idTribunal; ?></td>
                        <td><?php echo $rows->id_tesis; ?></td>
                        @foreach ($profesional as $prof)
                        @if ($prof->codigo == $rows->id_profesional1 || $prof->codigo == $rows->id_profesional2 || $prof->codigo == $rows->id_profesional3)
                            <td><?php echo $prof->nombre;?> <?php echo $prof->apellido_paterno;?> <?php echo $prof->apellido_materno;?> 
                            <a name="<?php echo $prof->codigo; ?>" href="../proyecto/<?php echo $rows->id_tesis; ?>$<?php echo $prof->codigo;?>"><i id="<?php echo $prof->codigo; ?>" class="fa fa-user-times"></i></a>
                            </td>
                        @endif
                        @endforeach
                        <td><?php echo $rows->fecha_defensa; ?></td>
                        <td><?php echo $rows->nro_hcc; ?></td>
                    </tr>
                    <?php }?>
                </tbody>
                </table>
                <br>
              </div>
            </div>
        </div>
    </div>
@stop