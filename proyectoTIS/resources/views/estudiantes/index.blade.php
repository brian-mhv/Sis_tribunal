@extends ('layouts.master')
@section ('contenido')

<div class="box-body">
    <div class="row">
	    <div class="col-md-12">
                <h2>Estudiantes</h2>
                <div class="box box-primary">
                </div>
                <table class="table table-hover">
                    <thread>
                    <tr>
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
@stop