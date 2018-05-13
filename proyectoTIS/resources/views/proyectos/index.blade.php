@extends ('layouts.master')
@section ('contenido')

<div class="box-body">
    <div class="row">
	    <div class="col-md-12">
                <h2>Proyectos</h2>
                <div class="box box-primary">
                </div>
                <table class="table">
                    <thread>
                    <tr>
                        <td>CODIGO</td>
                        <td>COD. TESIS</td>
                        <td>TITULO PROYECTO</td>
                        <td>TUTOR</td>
                        <td>POSTULANTE</td>
                        <td>CARRERA</td>
                        <td>AREAS</td>
                    </tr>
                    </thread>
                    <tbody>
                        <?php

                        foreach($proyectos as $rows) {?>
                    <tr>
                        <td><?php echo $rows->codigo; ?></td>
                        <td><?php echo $rows->codigo_tesis; ?></td>
                        <td><?php echo $rows->nombre; ?></td>
                        <td><?php echo $rows->descripcion; ?></td>
                        <td><?php echo $rows->estado; ?></td>
                        <td><?php echo $rows->dir_dorm; ?></td>
                        <td><?php echo $rows->obj_gral; ?></td>
                    </tr>
                    <?php }?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
@stop