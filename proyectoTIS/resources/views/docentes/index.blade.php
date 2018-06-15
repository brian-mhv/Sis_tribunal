@extends ('layouts.master')
@section ('contenido')

<div class="box-body">
    <div class="row">
	    <div class="col-md-12">
                <h2>Docentes</h2>
                <div class="box box-primary">
                </div>
                <table class="table table-hover">
                    <thread>
                    <tr>
                        <td>ID</td>
                        <td>NOMBRES</td>
                        <td>A. PATERNO</td>
                        <td>A. MATERNO</td>
                        <td>CORREO</td>
                        <td>CI</td>
                        <td>TELEFONO</td>
                        <td>DIRECCION</td>
                        <td>TITULO</td>
                    </tr>
                    </thread>
                    <tbody>
                        <?php
                        foreach($docentes as $rows) {?>
                    <tr>
                        <td><?php echo $rows->codigo; ?></td>
                        <td><?php echo $rows->nombre; ?></td>
                        <td><?php echo $rows->apellido_paterno; ?></td>
                        <td><?php echo $rows->apellido_materno; ?></td>
                        <td><?php echo $rows->correo; ?></td>
                        <td><?php echo $rows->ci; ?></td>
                        <td><?php echo $rows->telefono; ?></td>
                        <td><?php echo $rows->direccion; ?></td>
                        <td><?php echo $rows->titulo; ?></td>
                    </tr>
                    <?php }?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
@stop