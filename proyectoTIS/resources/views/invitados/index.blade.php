@extends ('layouts.master')
@section ('contenido')

<div class="box-body">
    <div class="row">
	    <div class="col-md-12">
                <h2>Invitados</h2>
                <div class="box box-primary">
                </div>
                <table class="table table-hover">
                    <thread>
                    <tr>
                        <td>ID</td>
                        <td>NOMBRE</td>
                        <td>APELLIDO P</td>
                        <td>APELLIDO M</td>
                        <td>CORREO</td>
                        <td>TITULO</td>
                    </tr>
                    </thread>
                    <tbody>
                        <?php

                        foreach($invitados as $rows) {?>
                    <tr>
                        <td><?php echo $rows->codigo; ?></td>
                        <td><?php echo $rows->nombre; ?></td>
                        <td><?php echo $rows->apellido_paterno; ?></td>
                        <td><?php echo $rows->apellido_materno; ?></td>
                        <td><?php echo $rows->correo; ?></td>
                        <td><?php echo $rows->titulo; ?></td>
                    </tr>
                    <?php }?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
@stop